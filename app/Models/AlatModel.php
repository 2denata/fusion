<?php

namespace App\Models;

use CodeIgniter\Model;

class AlatModel extends Model
{
    protected $table = "alat_musik";
    protected $allowedFields = ['kode_alat', 'nama', 'jenis', 'harga', 'foto', 'status'];
    protected $primaryKey = 'kode_alat';
    
    public function tambah($data) {
        $this->insert([
            'kode_alat' => $data['kode_alat'],
            'nama' => $data['nama'],
            'jenis' => $data['jenis'], 
            'harga' => $data['harga'],
            'foto' => $data['foto'],
            'status' => $data['status']
        ]);
    }

    public function editAlat($data) {
        $this->save([
            'kode_alat' => $data['kode_alat'],
            'nama' => $data['nama'],
            'jenis' => $data['jenis'], 
            'harga' => $data['harga'],
            'foto' => $data['foto'],
            'status' => $data['status']
        ]);
    }

    public function cari($data) {
        return $this->where(['jenis' => $data])->findAll();
    }

    public function cek($kode) {
        return $this->where(['kode_alat' => $kode])->findAll();
    }
}