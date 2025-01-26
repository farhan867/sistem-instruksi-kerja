<?php

namespace App\Controllers;

use \App\Models\DokumenIK;
use \App\Models\BidangModel;
use \App\Models\DataModel;

class User extends BaseController
{
    // protected $db, $builder;
    protected $data;
    protected $bidang;
    protected $revisi;

    public function __construct()
    {
        // $this->db      = \Config\Database::connect();
        // $this->builder = $this->db->table('users');
        $this->data = new DokumenIK();
        $this->bidang = new BidangModel();
        $this->revisi = new DataModel();
    }

    public function index()
    {
        if (user()->id_bidang) {
            // $query = $this->data->where(['status' => 'resmi'])->orderBy('updated_at', 'desc')->findAll();
            $data = [
                'menu' => 'Dashboard',
                'data' => $this->data->getIk(),
                'divisi' => $this->bidang->getBidang(user()->username),
                'request' => \Config\Services::request(),
            ];

            // $this->builder->select('users.id as userid, username, email, name');
            // $this->builder->join('auth_groups_users', 'auth_groups_users.user_id=users.id');
            // $this->builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id');
            // $query = $this->builder->get();

            // $data['users'] = $query->getResult();

            return view('user/index', $data);
        } else {
            session()->setFlashdata('pesan', 'Lengkapi Data Pribadi untuk menggaktifkan fitur');
            return redirect()->to('/profile');
        }
    }

    // public function dataIk()
    // {
    //     if ($this->request->isAJAX()) {
    //         $data = [
    //             'data' => $this->data->getIk()
    //         ];
    //         $output = view('user/ik', $data);
    //         echo json_encode($output);
    //     } else {
    //         throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Halaman tidak ditemukan');
    //     }
    // }


    public function cetak()
    {
        $data = [
            'data' => $this->data->getIk($this->request->getVar('slug')),
        ];
        return view('user/cetak', $data);
    }
    public function docx()
    {
    }
    public function pdf()
    {
    }




    public function bidang()
    {
        $bidang = $this->bidang->getBidang(user()->username);
        if (user()->id_bidang) {
            $data = [
                'menu' => $bidang['nama'],
                'data' => $this->data->ikBidang(),
                'divisi' => $bidang,
                'request' => \Config\Services::request(),
            ];
            return view('user/bidang', $data);
        } else {
            session()->setFlashdata('pesan', 'Pilih Bidang Anda untuk menampilkan Sub Menu Bidang');
            return redirect()->to('/profile');
        }
    }

    public function deleteik($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Dokumen IK  berhasil dihapus.');
        return redirect()->to('/bidang');
    }

    public function revisi($slug)
    {
        $ik = $this->data->ikBidang($slug);
        if ($ik['disetujui'] == user()->id_bidang && $ik['disusun'] == user()->jabatan) {
            $data = [
                'menu' => 'Revisi',
                'validation' => \Config\Services::validation(),
                'data' => $ik,
                'divisi' => $this->bidang->getBidang(user()->username),
                'request' => \Config\Services::request(),
            ];
            if (empty($data['data'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('judul Dokumen IK ' . $slug . ' tidak ditemukan.');
            }
            return view('user/revisi', $data);
        } else {
            return redirect()->to('/profile');
        }
    }

    public function update($id)
    {
        if (user()->id_bidang && user()->jabatan) {
            $revisi_lama = $this->data->ikBidang($this->request->getVar('slug'));
            if ($revisi_lama['revisi'] == $this->request->getVar('revisi')) {
                $rule_judul = 'is_unique[dokumen_ik.revisi]';
            } else {
                $rule_judul = 'required|is_unique[dokumen_ik.revisi]';
            }
            if (!$this->validate([
                'revisi' => [
                    'rules' => $rule_judul,
                    'errors' => [
                        'required' => 'Tabel Daftar Perubahan Dokumen jangan dihapus.',
                        'is_unique' => '{field} belum ditambahkan ke Daftar Perubahan Dokumen.',
                    ]
                ]
            ])) {
                // $validation = \Config\Services::validation();
                return redirect()->to('revisi/' . $this->request->getVar('slug'))->withInput();
            }


            $ik = $this->data->ikBidang($this->request->getVar('slug'));

            $this->revisi->save([
                'created_by' => user_id(),
                'judul' => $ik['judul'],
                'slug' => $this->request->getVar('slug'),
                'no_ik' => $ik['no_ik'],
                'status' => 'mrk',
                'tgl_ditetapkan' => $ik['tgl_ditetapkan'],
                'tgl_diperbarui' => $ik['tgl_diperbarui'],
                'tgl_terbit' => $ik['tgl_terbit'],
                'no_revisi' => $ik['no_revisi'],
                'revisi' => $this->request->getVar('revisi'),
                'tujuan' => $this->request->getVar('tujuan'),
                'ruang_lingkup' => $this->request->getVar('ckeditor1'),
                'definisi' => $this->request->getVar('definisi'),
                'terkait_pendukung' => $this->request->getVar('ckeditor3'),
                'terkait_referensi' => $this->request->getVar('ckeditor4'),
                'terkait_perizinan' => $this->request->getVar('ckeditor5'),
                'terkait_teknik' => $this->request->getVar('ckeditor6'),
                'detail_aktivitas' => $this->request->getVar('ckeditor7'),
                'sumber_sdm' => $this->request->getVar('ckeditor12'),
                'sumber_tools' => $this->request->getVar('ckeditor13'),
                'sumber_material' => $this->request->getVar('ckeditor14'),
                'risiko_identifikasi' => $this->request->getVar('ckeditor15'),
                'risiko_mitigasi' => $this->request->getVar('ckeditor16'),
                'parameter' => $this->request->getVar('ckeditor17'),
                'formulir' => $this->request->getVar('ckeditor8'),
                'lampiran' => $this->request->getVar('ckeditor9'),
            ]);

            $this->data->save([
                'id' => $id,
                'status' => 'REVISI'
            ]);

            session()->setFlashdata('pesan', 'Dokumen IK sedang dalam proses revisi.');
            return redirect()->to('/bidang');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }

    public function uploadImages()
    {
        if (user()->id_bidang && user()->jabatan) {
            $validated = $this->validate([
                'upload' => [
                    'uploaded[upload]',
                    'is_image[upload]',
                    'mime_in[upload,image/jpg,image/jpeg,image/png]',
                    'max_size[upload,1024]',
                ],
            ]);
            if ($validated) {
                $file = $this->request->getFile('upload');
                $fileName = $file->getRandomName();
                $writePath = './img';
                $file->move($writePath, $fileName);
                $data = [
                    "uploaded" => true,
                    "url" => base_url('img/' . $fileName),
                ];
            } else {
                $data = [
                    "uploaded" => false,
                    "error" => [
                        "message" => "image size max 1024 kb"
                    ],
                ];
            }
            return $this->response->setJSON($data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }
}
