<?php

namespace App\Models;

use CodeIgniter\Model;

class PihakStudioModel extends Model
{
    protected $table = "pihak_studio";
    protected $allowedFields = ['username', 'password'];
    protected $primaryKey = 'username';

    public function login($data)
    {
        return $this->where(['username' => $data['email'], 'password' => $data['password']])->first();
    }

}