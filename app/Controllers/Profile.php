<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\BidangModel;
use \Myth\Auth\Authorization\GroupModel;

define('_TITLE', 'Profile');
class Profile extends BaseController
{
    protected $user;
    protected $bidang;
    public function __construct()
    {
        $this->user = new UsersModel();
        $this->bidang = new BidangModel();
    }
    public function index()
    {
        $groupModel = new GroupModel();
        $data = [
            'menu' =>  _TITLE,
            'validation' => \Config\Services::validation(),
            'role' => $groupModel->findAll(),
            'bidang' => $this->bidang->getBidang(),
            'divisi' => $this->bidang->getBidang(user()->username),
            'user' => $this->user->getUser(user()->username),
            'request' => \Config\Services::request(),
        ];
        return view('user/profile', $data);
    }

    public function update($username)
    {
        $user = $this->user->getUser($username);
        if ($user['username'] == $this->request->getVar('username')) {
            $rule_user = 'required';
        } else {
            $rule_user = 'required|is_unique[users.username]';
        }
        if ($user['email'] == $this->request->getVar('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|is_unique[users.email]';
        }
        if (!$this->validate([
            'username' => [
                'rules' => $rule_user,
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} ini sudah digunakan.',
                ]
            ],
            'email' => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} ini sudah digunakan.',
                ]
            ],
            'profile_photo' => [
                'rules' => 'max_size[profile_photo,1024]|is_image[profile_photo]|mime_in[profile_photo,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar. MAX 1MB',
                    'is_image' => 'Yang anda pilih bukan gambar.',
                    'mime_in' => 'Yang anda pilih bukan gambar.',
                ]
            ]
        ])) {
            // $validation = \Config\Services::validation();
            session()->setFlashdata('gagal', 'Profile gagal diubah.');
            return redirect()->to('/profile')->withInput();
        }
        $profile = $this->request->getFile('profile_photo');
        if ($profile->getError() == 4) {
            $fileName = $this->request->getVar('fotoLama');
        } else {
            $profile->move('profileIMG');
            $fileName = $profile->getName();

            $profile_lama = $this->user->getUser($username);
            if ($profile_lama['user_image'] != 'default.png') {
                unlink('profileIMG/' . $profile_lama['user_image']);
            }
        }
        $bidangLama = $this->bidang->getBidang(user()->username);
        if ($bidangLama) {
            if ($this->request->getVar('bidang') == $bidangLama['nama']) {
                $bidang = user()->id_bidang;
            } else {
                $bidang = $this->request->getVar('bidang');
            }
        } else {
            if (is_numeric(trim($this->request->getVar('bidang'))) == TRUE) {
                $bidang = $this->request->getVar('bidang');
            } else {
                $bidang = NULL;
            }
        }

        $this->user->save([
            'id' => user_id(),
            'user_image' => $fileName,
            'fullname' => $this->request->getVar('fullname'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'id_bidang' => $bidang,
            'jabatan' => $this->request->getVar('jabatan'),
        ]);

        session()->setFlashdata('pesan', 'Profile berhasil diubah.');
        return redirect()->to('/profile');
    }

    public function ubahPassword()
    {
        $data = [
            'menu' =>  _TITLE,
            'validation' => \Config\Services::validation(),
            'divisi' => $this->bidang->getBidang(user()->username),
            'user' => $this->user->getUser(user()->username),
            'request' => \Config\Services::request(),
        ];
        return view('user/password', $data);
    }
    public function updatePassword($id)
    {
        if (!$this->validate([
            'password_lama' => 'required',
            'password_baru' => 'required|strong_password',
            'password_konfirmasi' => 'required|matches[password_baru]'
        ])) {
            session()->setFlashdata('gagal', 'Password gagal diubah.');
            return redirect()->to('/password')->withInput();
        } elseif (!password_verify(base64_encode(hash('sha384', $this->request->getVar('password_lama'), true)), user()->password_hash)) {
            session()->setFlashdata('gagal', 'Password Lama tidak sesuai.');
            return redirect()->to('/password')->withInput();
        } else {
            $this->user->save([
                'id' => $id,
                'password_hash' => \Myth\Auth\Password::hash($this->request->getVar('password_baru')),
            ]);
            return redirect()->to('logout');
        }
    }
}
