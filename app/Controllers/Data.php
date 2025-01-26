<?php

namespace App\Controllers;

use \App\Models\DataModel;
use \App\Models\BidangModel;
use \App\Models\DokumenIK;

class Data extends BaseController
{
    protected $data;
    protected $bidang;
    protected $dokumenIK;

    public function __construct()
    {
        $this->data = new DataModel();
        $this->bidang = new BidangModel();
        $this->dokumenIK = new DokumenIK();
    }
    public function index()
    {
        if (user()->id_bidang && user()->jabatan) {

            $data = [
                'menu' => 'Data',
                'data' => $this->data->getData(),
                'divisi' => $this->bidang->getBidang(user()->username),
                'request' => \Config\Services::request(),
            ];
            return view('data/index', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }

    public function create()
    {
        if (user()->id_bidang && user()->jabatan) {
            // session();
            $data = [
                'menu' => 'Create Dokumen IK',
                'validation' => \Config\Services::validation(),
                'divisi' => $this->bidang->getBidang(user()->username),
                'request' => \Config\Services::request(),
            ];
            return view('data/create', $data);
        } else {
            session()->setFlashdata('pesan', 'Lengkapi Data Pribadi untuk menggunakan fitur Create IK');
            return redirect()->to('/profile');
        }
    }

    public function save()
    {
        if (user()->id_bidang && user()->jabatan) {
            // Validasi Input
            if (!$this->validate([
                'judul' => [
                    'rules' => 'required|is_unique[dokumen_ik.judul]',
                    'errors' => [
                        'required' => '{field} tidak boleh kosong.',
                        'is_unique' => '{field} data ini sudah digunakan pada Dokumen IK.',
                    ]
                ]
            ])) {
                // $validation = \Config\Services::validation();
                return redirect()->to('/create')->withInput();
            }

            $slug = url_title($this->request->getVar('judul'), '-', true);
            $by = user_id();
            $this->data->save([
                'created_by' => $by,
                'judul' => $this->request->getVar('judul'),
                'slug' => $slug,
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

            session()->setFlashdata('pesan', 'data berhasil ditambah.');
            return redirect()->to('/data');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }

    public function edit($slug)
    {
        if (user()->id_bidang && user()->jabatan) {
            $this->slug = $slug;
            $data = [
                'menu' => 'Edit Data',
                'validation' => \Config\Services::validation(),
                'data' => $this->data->getData($slug),
                'slug' => $slug,
                'divisi' => $this->bidang->getBidang(user()->username),
                'request' => \Config\Services::request(),
            ];

            if (empty($data['data'])) {
                throw new \CodeIgniter\Exceptions\PageNotFoundException('judul data ' . $slug . ' tidak ditemukan.');
            }
            return view('data/edit', $data);
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }
    public function update($id)
    {
        if (user()->id_bidang && user()->jabatan) {
            $judul_lama = $this->data->getData($this->request->getVar('slug'));
            if ($judul_lama['no_ik']) {
                $revisi_lama = $this->dokumenIK->ikBidang($this->request->getVar('slug'));
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
                    return redirect()->to('data/' . $this->request->getVar('slug'))->withInput();
                }
                $judul = $judul_lama['judul'];
                $slug = $this->request->getVar('slug');
            } else {
                if ($judul_lama['judul'] == $this->request->getVar('judul')) {
                    $rule_judul = 'required';
                } else {
                    $rule_judul = 'required|is_unique[dokumen_ik.judul]';
                }
                if (!$this->validate([
                    'judul' => [
                        'rules' => $rule_judul,
                        'errors' => [
                            'required' => '{field} tidak boleh kosong.',
                            'is_unique' => '{field} data ini sudah digunakan pada Dokumen IK.',
                        ]
                    ]
                ])) {
                    // $validation = \Config\Services::validation();
                    return redirect()->to('data/' . $this->request->getVar('slug'))->withInput();
                }
                $judul = $this->request->getVar('judul');
                $slug = url_title($judul, '-', true);
            }

            $by = user_id();
            $this->data->save([
                'id' => $id,
                'created_by' => $by,
                'judul' => $judul,
                'slug' => $slug,
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

            session()->setFlashdata('pesan', 'data berhasil diubah.');
            return redirect()->to('/data');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }


    public function delete($id)
    {
        if (user()->id_bidang && user()->jabatan) {
            $this->data->delete($id);
            session()->setFlashdata('pesan', 'data  berhasil dihapus.');
            return redirect()->to('/data');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }

    public function batal()
    {
        if (user()->id_bidang && user()->jabatan) {
            $data = $this->data->getData($this->request->getVar('slug'));
            $this->data->delete($data['id']);
            $ik = $this->dokumenIK->ikBidang($data['slug']);
            $this->dokumenIK->save([
                'id' => $ik['id'],
                'status' => 'RESMI',
            ]);
            session()->setFlashdata('pesan', 'Dokumen IK batal di Revisi.');
            return redirect()->to('/data');
        } else {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
    }

    public function kirim($id)
    {
        if (user()->id_bidang && user()->jabatan) {
            $status = 'mrk';
            $this->data->save([
                'id' => $id,
                'status' => $status,
            ]);

            session()->setFlashdata('pesan', 'data berhasil dikirim.');
            return redirect()->to('/data');
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
    public function cetak()
    {
        $data = [
            'data' => $this->data->getData($this->request->getVar('slug')),
        ];
        if (empty($this->request->getVar('slug'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        // dd($this->request->getVar('slug'));
        return view('data/cetak', $data);
    }
    public function docx()
    {
    }
    public function pdf()
    {
    }
}
