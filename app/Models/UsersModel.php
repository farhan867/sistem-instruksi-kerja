<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table      = 'users';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_bidang', 'password_hash', 'jabatan', 'fullname', 'user_image', 'email', 'username'];


    public function getUser($username = false)
    {
        if ($username == false) {
            return $this->select('users.id as userid, group_id, id_bidang, jabatan, username, email, fullname, user_image, name')
                ->where('users.id <>', '30')
                ->where('username <>', user()->username)
                ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
                ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id')
                ->orderBy('updated_at', 'desc')
                ->findAll();
        }
        return $this->select('users.id as userid, group_id, id_bidang, jabatan, username, email, fullname, user_image, name')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id')
            ->where(['username' => $username])
            ->first();
    }

    public function by($id)
    {
        return $this->select('users.id as userid, group_id, id_bidang, jabatan, username, email, fullname, user_image, name')
            ->join('auth_groups_users', 'auth_groups_users.user_id=users.id')
            ->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id')
            ->where(['users.id' => $id])
            ->first();
    }
}
