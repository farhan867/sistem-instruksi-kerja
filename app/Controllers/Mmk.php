<?php

namespace App\Controllers;

use \App\Models\DataModel;
use \App\Models\DokumenIK;
use \App\Models\UsersModel;
use \App\Models\BidangModel;

class Mmk extends BaseController
{
    protected $data;
    protected $dokumenIK;
    protected $user;
    protected $bidang;

    public function __construct()
    {

        $this->data = new DataModel();
        $this->dokumenIK = new DokumenIK();
        $this->user = new UsersModel();
        $this->bidang = new BidangModel();
    }

    public function index()
    {

        // $query = $this->data->where(['status' => 'menunggu'])->findAll();
        $query = $this->data->getMmk();
        $data = [
            'menu' => 'Dashboard',
            'data' => $query,
            'divisi' => $this->bidang->getBidang(user()->username),
            'request' => \Config\Services::request(),
        ];
        return view('mmk/index', $data);
    }

    public function approve()
    {

        $data = $this->data->getMmk($this->request->getVar('slug'));
        $created_by = $this->user->by($data['created_by']);


        if ($data['no_ik']) {
            $ik = $this->dokumenIK->ikBidang($this->request->getVar('slug'));
            if ($ik['no_ik'] == $this->request->getVar('no_ik')) {
                $rule_no_ik = 'required';
            } else {
                $rule_no_ik = 'required|is_unique[dokumen_ik.no_ik]';
            }
            if (!$this->validate([
                'no_ik' => [
                    'rules' => $rule_no_ik,
                    'errors' => [
                        'required' => '{field} dokumen boleh kosong.',
                        'is_unique' => '{field} dokumen ini sudah digunakan.',
                    ]
                ]
            ])) {
                session()->setFlashdata('gagal', 'No ini sudah digunakan oleh dokumen IK lain.');
                return redirect()->to('/mmk')->withInput();
            }

            $orgDate = date('d-m-Y');
            $date = str_replace('-', '/', $orgDate);

            if ($ik['no_revisi'] == '-') {
                $no_revisi = '01';
            } else {
                $num = $ik['no_revisi'];
                $int = (int)$num;
                $no_revisi = sprintf("%02d", $int + 1);
            }

            $this->dokumenIK->save([
                'id' => $ik['id'],
                'created_by' => $data['created_by'],
                'disusun' => $created_by['jabatan'],
                'disetujui' => $created_by['id_bidang'],
                'tgl_diperbarui' => $date,
                'tgl_terbit' => $date,
                'no_revisi' => $no_revisi,
                'no_ik' => $this->request->getVar('no_ik'),
                'status' => 'RESMI',
                'revisi' => $data['revisi'],
                'tujuan' => $data['tujuan'],
                'ruang_lingkup' => $data['ruang_lingkup'],
                'definisi' => $data['definisi'],
                'terkait_pendukung' => $data['terkait_pendukung'],
                'terkait_referensi' => $data['terkait_referensi'],
                'terkait_perizinan' => $data['terkait_perizinan'],
                'terkait_teknik' => $data['terkait_teknik'],
                'detail_aktivitas' => $data['detail_aktivitas'],
                'sumber_sdm' => $data['sumber_sdm'],
                'sumber_tools' => $data['sumber_tools'],
                'sumber_material' => $data['sumber_material'],
                'risiko_identifikasi' => $data['risiko_identifikasi'],
                'risiko_mitigasi' => $data['risiko_mitigasi'],
                'parameter' => $data['parameter'],
                'formulir' => $data['formulir'],
                'lampiran' => $data['lampiran'],
            ]);
        } else {

            // Validasi Input
            if (!$this->validate([
                'no_ik' => [
                    'rules' => 'required|is_unique[dokumen_ik.no_ik]',
                    'errors' => [
                        'required' => '{field} dokumen tidak boleh kosong.',
                        'is_unique' => '{field} dokumen ini sudah digunakan.',
                    ]
                ]
            ])) {
                // $validation = \Config\Services::validation();
                session()->setFlashdata('gagal', 'No ini sudah digunakan oleh dokumen IK lain.');
                return redirect()->to('/mmk')->withInput();
            }

            $orgDate = date('d-m-Y');
            $date = str_replace('-', '/', $orgDate);
            // $newDate = date("Y-m-d", strtotime($date));
            $this->dokumenIK->save([
                'no_ik' => $this->request->getVar('no_ik'),
                'status' => 'RESMI',
                'created_by' => $data['created_by'],
                'tgl_ditetapkan' => $date,
                'tgl_diperbarui' => '-',
                'tgl_terbit' => $date,
                'no_revisi' => '-',
                'revisi' => $data['revisi'],
                'disetujui' => $created_by['id_bidang'],
                'slug' => $this->request->getVar('slug'),
                'judul' => $data['judul'],
                'disusun' => $created_by['jabatan'],
                'tujuan' => $data['tujuan'],
                'ruang_lingkup' => $data['ruang_lingkup'],
                'definisi' => $data['definisi'],
                'terkait_pendukung' => $data['terkait_pendukung'],
                'terkait_referensi' => $data['terkait_referensi'],
                'terkait_perizinan' => $data['terkait_perizinan'],
                'terkait_teknik' => $data['terkait_teknik'],
                'detail_aktivitas' => $data['detail_aktivitas'],
                'sumber_sdm' => $data['sumber_sdm'],
                'sumber_tools' => $data['sumber_tools'],
                'sumber_material' => $data['sumber_material'],
                'risiko_identifikasi' => $data['risiko_identifikasi'],
                'risiko_mitigasi' => $data['risiko_mitigasi'],
                'parameter' => $data['parameter'],
                'formulir' => $data['formulir'],
                'lampiran' => $data['lampiran'],
            ]);
        }
        if (empty($this->request->getVar('slug'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        $this->data->delete($data['id']);
        session()->setFlashdata('pesan', 'dokumen IK berhasil ditambah.');
        return redirect()->to('/mmk');
    }
    public function perbaiki()
    {
        $this->data->save([
            'id' => $this->request->getVar('id'),
            'status' => 'user',
            'pesan' => $this->request->getVar('pesan'),
        ]);
        if (empty($this->request->getVar('id'))) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('halaman tidak ditemukan.');
        }
        return redirect()->to('/mmk');
    }

    public function cetak()
    {
        $data = [
            'data' => $this->data->getMmk($this->request->getVar('slug')),
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
