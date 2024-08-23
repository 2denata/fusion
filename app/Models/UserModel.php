<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = "penyewa";
    protected $allowedFields = ['email', 'nama', 'password', 'no_hp'];
    protected $primaryKey = "email";

    public function login($data)
    {
        return $this->where(['email' => $data['email'], 'password' => $data['password']])->first();
    }

    public function daftar($data) {
        $this->insert([
            'no_hp'=> $data['no_hp'],
            'nama'=> $data['nama'],
            'email'=> $data['email'],
            'password'=> $data['password']
        ]);
    }
}