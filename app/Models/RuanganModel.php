<?php

namespace App\Models;

use CodeIgniter\Model;

class RuanganModel extends Model
{
    protected $table = "ruang_studio";
    protected $allowedFields = ['kode_ruangan', 'harga', 'foto', 'status'];
    protected $primaryKey = 'kode_ruangan';

    public function tambah($data) {
        $this->insert([
            'kode_ruangan' => $data['kode_ruangan'],
            'harga' => $data['harga'],
            'foto' => $data['foto'],
            'status' => $data['status']
        ]);
    }

}