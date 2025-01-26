<?php

namespace App\Controllers;

use \App\Models\UsersModel;
use \App\Models\BidangModel;
use \App\Models\DokumenIK;
use \Myth\Auth\Authorization\GroupModel;

class Admin extends BaseController
{
    protected $usersModel;
    protected $bidang;
    protected $ik;

    public function __construct()
    {

        $this->usersModel = new UsersModel();
        $this->bidang = new BidangModel();
        $this->ik = new DokumenIK();
    }

    public function index()
    {
        $data = [
            'menu' => 'User List',
            'users' => $this->usersModel->getUser(),
            'divisi' => $this->bidang->getBidang(user()->username),
            'request' => \Config\Services::request(),
        ];
        return view('admin/index', $data);
    }
    public function editUser($username)
    {
        $groupModel = new GroupModel();
        $data = [
            'menu' => 'Edit',
            'validation' => \Config\Services::validation(),
            'users' => $this->usersModel->getUser($username),
            'bidang' => $this->bidang->getBidang($username),
            'role' => $groupModel->findAll(),
            'divisi' => $this->bidang->getBidang(user()->username),
            'request' => \Config\Services::request(),
        ];
        if (empty($data['users'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException($username . ' tidak ditemukan.');
        }

        return view('admin/editUser', $data);
    }

    public function update()
    {
        if (empty($this->request->getVar('username'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('user tidak ditemukan.');
        }
        $data = $this->usersModel->getUser($this->request->getVar('username'));
        if ($this->request->getVar('role') == $data['name']) {
            $userId = $data['userid'];
            $groupId = $data['group_id'];
        } else {
            $userId = $data['userid'];
            $groupId = $this->request->getVar('role');
        }
        $groupModel = new GroupModel();
        $groupModel->removeUserFromAllGroups(intval($userId));

        $groupModel->addUserToGroup(intval($userId), intval($groupId));
        session()->setFlashdata('pesan', 'user  berhasil diupdate.');

        return redirect()->to('/admin');
    }
    public function delete($username)
    {
        $profile_lama = $this->usersModel->getUser($username);
        if ($profile_lama['user_image'] != 'default.png') {
            unlink('profileIMG/' . $profile_lama['user_image']);
        }
        $this->usersModel->delete($profile_lama['userid']);
        session()->setFlashdata('pesan', 'user berhasil dihapus.');
        return redirect()->to('/admin');
    }

    public function addbidang()
    {
        $data = [
            'menu' => 'Add Bidang',
            'bidang' => $this->bidang->bidang(),
            'divisi' => $this->bidang->getBidang(user()->username),
            'request' => \Config\Services::request(),
            'validation' => \Config\Services::validation(),
        ];
        return view('admin/addbidang', $data);
    }

    public function add()
    {
        if (!$this->validate([
            'bidang' => [
                'rules' => 'required|is_unique[bidang.nama]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong.',
                    'is_unique' => '{field} sudah ada.',
                ]
            ]
        ])) {
            session()->setFlashdata('gagal', 'bidang gagal ditambah.');
            return redirect()->to('/addbidang')->withInput();
        }
        $this->bidang->save([
            'nama' => $this->request->getVar('bidang'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('pesan', 'bidang berhasil ditambah.');
        return redirect()->to('/addbidang');
    }

    public function delbidang($id)
    {

        // try {
        if ($this->bidang->delete($id)) {
            session()->setFlashdata('pesan', 'Bidang  berhasil dihapus.');
            return redirect()->to('/addbidang');
        } else {
            // } catch (\Exception $e) {
            session()->setFlashdata('gagal', 'Bidang ini masih menyimpan Dokumen IK');
            return redirect()->to('/addbidang');
        }
    }

    public function deleteik($id)
    {
        $this->ik->delete($id);
        session()->setFlashdata('pesan', 'Dokumen IK  berhasil dihapus.');
        return redirect()->to('/');
    }

    public function ubah()
    {
        if (empty($this->request->getVar('id'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('bidang tidak ditemukan.');
        }
        $this->bidang->save([
            'id_bidang' => $this->request->getVar('id'),
            'nama' => $this->request->getVar('bidang'),
            'description' => $this->request->getVar('description'),
        ]);
        session()->setFlashdata('pesan', 'Bidang  berhasil diubah.');
        return redirect()->to('/addbidang');
    }

    public function reset()
    {
        if (empty($this->request->getVar('username'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('user tidak ditemukan.');
        }
        $data = $this->usersModel->getUser($this->request->getVar('username'));
        $this->usersModel->save([
            'id' => $data['userid'],
            'password_hash' => \Myth\Auth\Password::hash($data['username']),
        ]);
        session()->setFlashdata('pesan', 'Password berhasil direset menjadi username account');
        return redirect()->to('admin/' . $data['username']);
    }
}
