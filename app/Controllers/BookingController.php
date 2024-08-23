<?php

namespace App\Controllers;

use App\Models\BookingAlatMusikModel;
use App\Models\BookingRuanganModel;
use CodeIgniter\I18n\Time;

class BookingController extends BaseController
{
    protected $modelBookingAlat, $modelBookingRuangan;
    protected $modelAlatMusik;

    public function __construct()
    {
        $this->modelBookingAlat = new BookingAlatMusikModel();
        $this->modelBookingRuangan = new BookingRuanganModel();
    }

    public function tampilBookingAlat() 
    {
        $dataBookingAlat = $this->modelBookingAlat->tampilData();

        $data = 
        [
            'booking' => $dataBookingAlat
        ];

        return view('ViewAdmin/cekBookingAlat', $data);
    }

    public function tampilBookingRuangan()
    {
        $dataBookingRuangan = $this->modelBookingRuangan
                                ->select(['booking_ruangan.*', 'penyewa.no_hp', 'penyewa.nama'])
                                ->join('penyewa', 'penyewa.email = booking_ruangan.email')
                                ->findAll();
        $pesan_awal = 'pesanan bookingmu sudah dikonfirmasi ya!, mohon datang tepat waktu sebelum jam';
        $pesan = urlencode($pesan_awal);

        $data = 
        [
            'booking' => $dataBookingRuangan,
            'pesan' => $pesan
        ];
        return view('ViewAdmin/cekBookingRuangan', $data);
    }

    public function pageBookingRuangan() 
    {
        $durasi = count($this->request->getVar('jam'));
        $hargaAwal = $this->request->getVar('hargaAwal');

        $data = 
        [
            'email' => session()->get('username')['email'],
            'studio' => $this->request->getVar('studio'),
            'tgl_pakai' => $this->request->getVar('tgl_pakai'),
            'jam_pakai' => $this->request->getVar('jam')[0],
            'durasi' => $durasi,
            'total_harga' => $hargaAwal*$durasi
        ];
        return view('ViewPenyewa/bookingRuangan', $data);
    }
    

    public function pageBookingAlat()
    {
        $durasi = count($this->request->getVar('tanggal'));
        $hargaAwal = $this->request->getVar('hargaAwal');

        $bulan = $this->request->getVar('bulan');
        $tahun = $this->request->getVar('tahun');

        $bulanString = '';
        switch ($bulan) {
            case 1:
                $bulanString = 'Januari 2024';
                break;
            case 2:
                $bulanString = 'Februari 2024';
                break;
            case 12:
                $bulanString = 'Desember 2023';
                break;
        }

        $jenisAlat = $this->request->getVar('jenisAlat');
        $namaAlat = $this->request->getVar('namaAlat');
        $tgl_pakai = Time::createFromFormat('j-n-Y', $this->request->getVar('tanggal')[0]."-". $bulan . '-' . $tahun ,'Asia/Jakarta');
        $tgl_selesai = Time::createFromFormat('j-n-Y', $this->request->getVar('tanggal')[$durasi-1]."-". $bulan . '-' . $tahun ,'Asia/Jakarta');
        
        $data =
        [
            'email' => session()->get('username')['email'],
            'kodeAlat' => $this->request->getVar('kodeAlat'),
            'jenisAlat' => $jenisAlat,
            'namaAlat' => $namaAlat,
            'tanggal'=> $this->request->getVar('tanggal'),
            'tgl_pakai' => $tgl_pakai,
            'tgl_selesai' => $tgl_selesai,
            'durasi' => $durasi,
            'total_harga' => $hargaAwal*$durasi,
            'tahun' => $tahun,
            'bulanString' => $bulanString
        ];
        return view('ViewPenyewa/bookingAlatMusik', $data);
    }

    public function prosesBookingAlat() 
    {
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $angka = '1234567890';
        $kodeBooking = substr(str_shuffle($huruf), 0, 2) . substr(str_shuffle($angka), 0, 6);
        
        // Ambil gambar
        $imgAlat = $this->request->getFile('bukti_pembayaran');
        $bukti_pembayaran = $imgAlat->getName();

        $data =
        [
            'kode_booking_alat' => $kodeBooking,
            'email' => $this->request->getVar('email'),
            'bukti_pembayaran' => $bukti_pembayaran,
            'status_pembayaran' => 'Belum Diverifikasi',
            'kode_alat' => $this->request->getVar('kodeAlat'),
            'tgl_pesan' => Time::createFromDate()->format('Y-m-d'),
            'tgl_pakai' => $this->request->getVar('tgl_pakai'),
            'tgl_selesai' => $this->request->getVar('tgl_selesai'),
            'durasi' => $this->request->getVar('durasi'),
            'total_harga' => $this->request->getVar('total_harga'),
            'kode' => $kodeBooking
        ];

        $imgAlat->move('img/bukti_pembayaran');

        $this->modelBookingAlat->booking($data);
        return view('ViewPenyewa/suksesBooking', $data);
    }

    public function prosesBookingRuangan()
    {
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $angka = '1234567890';
        $kodeBooking = substr(str_shuffle($huruf), 0, 2) . substr(str_shuffle($angka), 0, 6);
        
        // Ambil gambar
        $imgAlat = $this->request->getFile('bukti_pembayaran');
        $bukti_pembayaran = $imgAlat->getName();

        $data =
        [
            'kode_booking_ruangan' => $kodeBooking,
            'bukti_pembayaran' => $bukti_pembayaran,
            'email' => $this->request->getVar('email'),
            'status_pembayaran' => 'Belum Diverifikasi',
            'kode_ruangan' => $this->request->getVar('studio'),
            'tgl_pesan' => Time::createFromDate()->format('Y-m-d'),
            'tgl_pembayaran' => Time::createFromDate()->format('Y-m-d'),
            'tgl_pakai' => $this->request->getVar('tgl_pakai'),
            'jam_pakai' => $this->request->getVar('jam_pakai'),
            'durasi' => $this->request->getVar('durasi'),
            'total_harga' => $this->request->getVar('total_harga'),
            'kode' => $kodeBooking
        ];

        $imgAlat->move('img/bukti_pembayaran');
        
        $this->modelBookingRuangan->booking($data);
        return view('ViewPenyewa/suksesBooking', $data);
    }
}
