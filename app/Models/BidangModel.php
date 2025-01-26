<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangModel extends Model
{
    protected $table      = 'bidang';
    protected $primaryKey = 'id_bidang';
    protected $allowedFields = ['nama', 'description'];

    public function getBidang($username = false)
    {
        if ($username == false) {
            return $this->findAll();
        }
        return $this->join('users', 'users.id_bidang=bidang.id_bidang')
            ->where(['username' => $username])
            ->first();
    }

    public function bidang($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id_bidang' => $id])
            ->first();
    }
}
