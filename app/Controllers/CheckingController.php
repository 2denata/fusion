<?php

namespace App\Controllers;

use App\Models\AlatModel;
use App\Models\BookingRuanganModel;
use App\Models\BookingAlatMusikModel;
use App\Models\RuanganModel;


class CheckingController extends BaseController
{
    protected $bookingRuanganModel, $bookingAlatModel;
    protected $alatMusikModel, $ruanganModel;

    public function __construct()
    {
        $this->bookingRuanganModel = new BookingRuanganModel();
        $this->alatMusikModel = new AlatModel();
        $this->bookingAlatModel = new BookingAlatMusikModel();
        $this->ruanganModel = new RuanganModel();
    }

    public function home()
    {
        // Jika user sudah login, arahkan ke home
        if (!session()->has('username')) {
            return redirect()->to(base_url('login'));
        }

        $data = 
        [
            'nama' => session()->get('username')
        ];
        return view('ViewPenyewa/home', $data);
    }

    public function cekJadwal()
    {
        // mencegah user cek langsung lewat link
        if (!$this->request->is('post')) {
            return redirect()->to(base_url('home'));
        }
        $keyword = $this->request->getVar(['studio', 'tanggal']);
        $hasil = $this->bookingRuanganModel->cekJadwal($keyword);
        $hargaAwal = $this->ruanganModel->select('harga')->where('kode_ruangan', $this->request->getVar('studio'))->first();
        $data =
            [
                'jadwal' => $hasil,
                'title' => 'Cek Jadwal Studio | Fusion',
                'tgl_pakai' => $this->request->getVar('tanggal'),
                'studio' => $this->request->getVar('studio'),
                'hargaAwal' => $hargaAwal
            ];
        return view('ViewPenyewa/cekJadwal', $data);
    }

    public function cariAlat() 
    {
        $jenis = $this->request->getVar('jenisAlat');
        $hasil = $this->alatMusikModel->cari($jenis);
        
        return view('ViewPenyewa/cekJadwal', $hasil);
        
    }

    public function alatMusik() 
    {
        
        $alat = $this->request->getVar('jenis');
        $data = 
        [
            'nama' => session()->get('username'),
            'alat' => $this->alatMusikModel->cari($alat),
            'jenis' => $alat
        ];
        return view('ViewPenyewa/alatMusik', $data);
    }

    public function cekJadwalAlat()
    {
        // mencegah user cek langsung lewat link
        if (!$this->request->is('post')) {
            return redirect()->to(base_url('home'));
        }
        
        $kodeAlat = $this->request->getVar('kodeAlat');
        $bulan = $this->request->getVar('bulan');
        
        $bulanString ='';
        $dataTanggal = 0;

        switch ($bulan) {
            case 1:
                $bulanString = 'Januari 2024';
                $dataTanggal = 30;
                $tahun = 2024;
                break;
            case 2:
                $bulanString = 'Februari 2024';
                $dataTanggal = 29;
                $tahun = 2024;
                break;
            case 12:
                $bulanString = 'Desember 2023';
                $dataTanggal = 31;
                $tahun = 2023;
                break;
        }

        $hasil = $this->bookingAlatModel->cekJadwalAlat($kodeAlat, $bulan);

        $hargaAwal = $this->alatMusikModel->select('harga')->where('kode_alat', $this->request->getVar('kodeAlat'))->first();
        $jenisAlat = $this->request->getVar('jenisAlat');
        $namaAlat = $this->request->getVar('namaAlat');
        

        $data =
            [
                'jadwal' => $hasil,
                'bulan' => $bulan,
                'kodeAlat' => $kodeAlat,
                'title' => 'Cek Jadwal Studio | Fusion',
                'hargaAwal' => $hargaAwal,
                'jenisAlat' => $jenisAlat,
                'namaAlat' => $namaAlat,
                'bulanString' => $bulanString,
                'dataTanggal' => $dataTanggal,
                'tahun' => $tahun
            ];
        return view('ViewPenyewa/cekJadwalAlat', $data);
    }
}
