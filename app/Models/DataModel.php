<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table      = 'data';
    protected $useTimestamps = true;
    protected $allowedFields = ['no_ik', 'revisi', 'no_revisi', 'tgl_ditetapkan', 'tgl_diperbarui', 'tgl_terbit', 'status', 'created_by', 'judul', 'slug', 'no_revisi', 'revisi', 'tujuan', 'ruang_lingkup', 'definisi', 'terkait_pendukung', 'terkait_referensi', 'terkait_perizinan', 'terkait_teknik', 'sumber_sdm', 'sumber_tools', 'sumber_material', 'risiko_identifikasi', 'risiko_mitigasi', 'parameter', 'detail_aktivitas', 'formulir', 'lampiran', 'pesan'];

    public function getData($slug = false)
    {
        if ($slug == false) {
            return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
                ->join('users', 'users.id=data.created_by')
                ->join('bidang', 'bidang.id_bidang=users.id_bidang')
                ->where(['data.status' => 'user'])
                ->where(['created_by' => user_id()])
                ->orderBy('data.updated_at', 'desc')
                ->findAll();
        }
        return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
            ->join('users', 'users.id=data.created_by')
            ->join('bidang', 'bidang.id_bidang=users.id_bidang')
            ->where(['created_by' => user_id()])
            ->where(['slug' => $slug])->first();
    }

    public function getMrk($slug = false)
    {
        if ($slug == false) {
            return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
                ->join('users', 'users.id=data.created_by')
                ->join('bidang', 'bidang.id_bidang=users.id_bidang')
                ->where(['data.status' => 'mrk'])->orderBy('data.updated_at', 'desc')->findAll();
        }
        return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
            ->join('users', 'users.id=data.created_by')
            ->join('bidang', 'bidang.id_bidang=users.id_bidang')
            ->where(['data.status' => 'mrk'])
            ->where(['slug' => $slug])->first();
    }

    public function getMmk($slug = false)
    {
        if ($slug == false) {
            return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
                ->join('users', 'users.id=data.created_by')
                ->join('bidang', 'bidang.id_bidang=users.id_bidang')
                ->where(['data.status' => 'mmk'])->orderBy('data.updated_at', 'desc')->findAll();
        }
        return $this->select('users.*, users.id as userid, data.*, data.id as id, bidang.*')
            ->join('users', 'users.id=data.created_by')
            ->join('bidang', 'bidang.id_bidang=users.id_bidang')
            ->where(['data.status' => 'mmk'])
            ->where(['slug' => $slug])->first();
    }
}
