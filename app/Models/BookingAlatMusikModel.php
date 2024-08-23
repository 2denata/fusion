<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingAlatMusikModel extends Model
{
    protected $table = "booking_alat";
    protected $allowedFields = ['kode_booking_alat', 'email', 'bukti_pembayaran', 'status_pembayaran',
                            	'kode_alat', 'tgl_pesan', 'tgl_pakai', 'tgl_selesai', 'durasi', 'total_harga'];
    protected $primaryKey = 'kode_booking_alat';

    public function cekJadwalAlat($kodeAlat, $bulan) {
        return $this
        ->select(['penyewa.nama', 'booking_alat.*', 'DAY(tgl_pakai) AS tanggal'])
        ->join('penyewa', 'penyewa.email = booking_alat.email')
        ->where(['kode_alat' => $kodeAlat, 'MONTH(tgl_pakai)' => $bulan, 'status_pembayaran' => 'Terverifikasi'])
        ->findAll();
    }

    public function tampilData() 
    {
        return $this->findAll();
    }

    public function booking($data) {
        $this->insert([
            'kode_booking_alat' => $data['kode_booking_alat'],
            'email' => $data['email'],
            'bukti_pembayaran' => $data['bukti_pembayaran'],
            'status_pembayaran' => $data['status_pembayaran'],
            'kode_alat' => $data['kode_alat'],
            'tgl_pesan' => $data['tgl_pesan'],
            'tgl_pakai' => $data['tgl_pakai'],
            'tgl_selesai' => $data['tgl_selesai'],
            'durasi' => $data['durasi'],
            'total_harga' => $data['total_harga']
        ]);
    }
}