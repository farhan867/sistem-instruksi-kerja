<?php

namespace App\Models;

use CodeIgniter\Model;

class DokumenIK extends Model
{
    protected $table      = 'dokumen_ik';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_ik', 'status', 'created_by', 'tgl_ditetapkan', 'tgl_diperbarui', 'tgl_terbit', 'disetujui', 'judul', 'slug', 'disusun', 'no_revisi', 'revisi', 'tujuan', 'ruang_lingkup', 'definisi', 'terkait_pendukung', 'terkait_referensi', 'terkait_perizinan', 'terkait_teknik', 'sumber_sdm', 'sumber_tools', 'sumber_material', 'risiko_identifikasi', 'risiko_mitigasi', 'parameter', 'detail_aktivitas', 'formulir', 'lampiran'];

    public function getIk($slug = false)
    {
        if ($slug == false) {
            return $this->join('bidang', 'bidang.id_bidang=dokumen_ik.disetujui')
                ->where(['status' => 'RESMI'])
                ->orderBy('updated_at', 'desc')->findAll();
        }
        return $this->join('bidang', 'bidang.id_bidang=dokumen_ik.disetujui')
            ->where(['status' => 'RESMI'])
            ->where(['slug' => $slug])->first();
    }
    public function ikBidang($slug = false)
    {
        if ($slug == false) {
            return $this->join('bidang', 'bidang.id_bidang=dokumen_ik.disetujui')
                ->where(['disetujui' => user()->id_bidang])
                ->orderBy('updated_at', 'desc')->findAll();
        }
        return $this->join('bidang', 'bidang.id_bidang=dokumen_ik.disetujui')
            ->where(['slug' => $slug])->first();
    }
}
