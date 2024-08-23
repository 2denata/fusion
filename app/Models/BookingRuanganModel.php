<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingRuanganModel extends Model
{
    protected $table = "booking_ruangan";
    protected $allowedFields = ['kode_booking_ruangan', 'email', 'bukti_pembayaran', 'status_pembayaran', 'kode_ruangan', 'tgl_pesan', 
                                'tgl_pembayaran', 'tgl_pakai', 'jam_pakai', 'durasi', 'total_harga'];
    protected $primaryKey = 'kode_booking_ruangan';

    public function cekJadwal($data) {
        return $this
        ->select(['penyewa.nama', 'booking_ruangan.*'])
        ->join('penyewa', 'penyewa.email = booking_ruangan.email')
        ->where(['tgl_pakai' => $data['tanggal'], 'kode_ruangan' => $data['studio']])
        ->findAll();
    }

    public function tampilData() 
    {
        return $this->findAll();
    }

    public function booking($data) {
        $this->insert([
            'kode_booking_ruangan' => $data['kode_booking_ruangan'],
            'email' => $data['email'],
            'bukti_pembayaran' => $data['bukti_pembayaran'],
            'status_pembayaran' => $data['status_pembayaran'],
            'kode_ruangan' => $data['kode_ruangan'],
            'tgl_pesan' => $data['tgl_pesan'],
            'tgl_pembayaran' => $data['tgl_pembayaran'],
            'tgl_pakai' => $data['tgl_pakai'],
            'jam_pakai' => $data['jam_pakai'],
            'durasi' => $data['durasi'],
            'total_harga' => $data['total_harga']
        ]);
    }

}