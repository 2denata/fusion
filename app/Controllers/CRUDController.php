<?php

namespace App\Controllers;

use App\Models\AlatModel;
use App\Models\RuanganModel;
use App\Models\BookingAlatMusikModel;
use App\Models\BookingRuanganModel;
use TCPDF;
use CodeIgniter\I18n\Time;


class CRUDController extends BaseController
{
    protected $modelAlat, $modelRuangan, $modelBookingAlat, $modelBookingRuangan;

    public function __construct()
    {
        $this->modelAlat = new AlatModel();
        $this->modelRuangan = new RuanganModel();
        $this->modelBookingAlat = new BookingAlatMusikModel();
        $this->modelBookingRuangan = new BookingRuanganModel();
    }

    public function admin()
    {
        // Ambil tahun untuk data rekap
        $tahun = Time::createFromDate()->toDateString();
        $tahun = explode("-", $tahun);
        $tahun = $tahun[0];   // ambil tahun sekarang

        // Jika login pakai admin, arahkan menu admin
        if (session()->has('admin')) {
            $data = [
                'tahun' => $tahun
            ];

            return view('ViewAdmin/home admin', $data);
        }
        return redirect()->to(base_url('login'));
    }

    public function cekRuangan()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }
        $data['ruangan'] = $this->modelRuangan->findAll();
        return view('ViewAdmin/cekRuangan', $data);
    }

    public function cekAlat()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }
        $data['alat'] = $this->modelAlat->findAll();
        return view('ViewAdmin/cekAlat', $data);
    }

    public function lihatAlat()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }
        $kode = $this->request->getVar('kode');
        $data['alat'] = $this->modelAlat->cek($kode);
        return view('ViewAdmin/spesifikasi', $data);
    }

    public function insertAlat()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }
        if (!$this->request->is('post')) {
            return view('ViewAdmin/insertAlat');
        }

        // Ambil gambar
        $imgAlat = $this->request->getFile('foto');
        $foto = $imgAlat->getName();

        // Generate kode acak dengan panjang 5
        $huruf = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $angka = '1234567890';
        $kodeAlat = substr(str_shuffle($huruf), 0, 2) . substr(str_shuffle($angka), 0, 3);

        $data =
            [
                'kode_alat' => $kodeAlat,
                'nama' => $this->request->getVar('nama'),
                'jenis' => $this->request->getVar('jenis'),
                'harga' => $this->request->getVar('harga'),
                'foto' => $foto,
                'status' => 'tidak dipinjam'
            ];

        $this->modelAlat->tambah($data);
        $imgAlat->move('img/alat');

        $pesan =
            [
                'pesan' => 'Data berhasil ditambah!',
                'link' => 'adminCekAlat'
            ];
        return view('ViewAdmin/sukses', $pesan);
    }

    public function updateAlat()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }
        $currentFoto = $this->request->getVar('currentFoto');
        $imgAlat = $this->request->getFile('foto');
        $foto = $imgAlat->getName();

        if ($foto == "") {
            $foto = $currentFoto;
        }

        $data =
            [
                'kode_alat' => $this->request->getVar('kodeAlat'),
                'nama' => $this->request->getVar('nama'),
                'jenis' => $this->request->getVar('jenis'),
                'harga' => $this->request->getVar('harga'),
                'foto' => $foto,
                'status' => $this->request->getVar('status'),
                'currentFoto' => $currentFoto
            ];

        $this->modelAlat->editAlat($data);
        if ($imgAlat->getName() != "") {
            $imgAlat->move('img/alat');
        }
        unlink("img/alat/" . $currentFoto);

        $pesan =
            [
                'pesan' => 'Data berhasil diupdate!',
                'link' => 'adminCekAlat'
            ];
        return view('ViewAdmin/sukses', $pesan);
    }

    public function hapusAlat()
    {
        // Jika login pakai admin, arahkan menu admin
        if (!session()->has('admin')) {
            return redirect()->to(base_url('login'));
        }

        $kodeAlat = $this->request->getVar('kodeAlat');

        $alat = $this->modelAlat->where('kode_alat', $kodeAlat)->first();
        unlink('img/alat/' . $alat['foto']);

        $this->modelAlat->delete($kodeAlat);
        $pesan =
            [
                'pesan' => 'Data berhasil dihapus!',
                'link' => 'adminCekAlat'
            ];
        return view('ViewAdmin/sukses', $pesan);
    }

    public function verifikasiBookingRuangan()
    {
        $kodeBookingRuangan = $this->request->getVar('kodeBookingRuangan');

        $periksa = $this->request->getVar('periksa');

        if ($periksa == 'verifikasi') {
            $this->modelBookingRuangan->update($kodeBookingRuangan, ['status_pembayaran' => 'Terverifikasi']);
        } else {
            $this->modelBookingRuangan->update($kodeBookingRuangan, ['status_pembayaran' => 'Ditolak']);
        }

        $pesan =
            [
                'pesan' => 'Berhasil verifikasi booking!',
                'link' => 'adminBookingRuangan'
            ];

        return view('ViewAdmin/sukses', $pesan);
    }

    public function batalkanBookingRuangan()
    {
        $kodeBookingRuangan = $this->request->getVar('kodeBookingRuangan');
        $this->modelBookingRuangan->update($kodeBookingRuangan, ['status_pembayaran' => 'Dibatalkan']);

        $pesan =
            [
                'pesan' => 'Booking berhasil dibatalkan!',
                'link' => 'adminBookingRuangan'
            ];

        return view('ViewAdmin/sukses', $pesan);
    }

    public function verifikasiBookingAlat()
    {
        $kodeBookingAlat = $this->request->getVar('kodeBookingAlat');

        $periksa = $this->request->getVar('periksa');

        if ($periksa == 'verifikasi') {
            $this->modelBookingAlat->update($kodeBookingAlat, ['status_pembayaran' => 'Terverifikasi']);
        } else {
            $this->modelBookingAlat->update($kodeBookingAlat, ['status_pembayaran' => 'Ditolak']);
        }

        $pesan =
            [
                'pesan' => 'Berhasil verifikasi booking!',
                'link' => 'adminBookingAlat'
            ];

        return view('ViewAdmin/sukses', $pesan);
    }

    public function batalkanBookingAlat()
    {
        $kodeBookingAlat = $this->request->getVar('kodeBookingAlat');
        $this->modelBookingAlat->update($kodeBookingAlat, ['status_pembayaran' => 'Dibatalkan']);

        $pesan =
            [
                'pesan' => 'Booking berhasil dibatalkan!',
                'link' => 'adminBookingAlat'
            ];

        return view('ViewAdmin/sukses', $pesan);
    }

    // laporan rekap bentuk pdf
    public function laporanPDF1()
    {
        $data = [
            'alat' => $this->modelAlat->findAll(),
            'ruangan' => $this->modelRuangan->findAll(),
            'bookRuangan' => $this->modelBookingRuangan->findAll(),
            'bookAlat' => $this->modelBookingAlat->findAll()
        ];

        $laporanBookingRuangan = view('PRINTPDF/laporanBookingRuangan', $data);
        $laporanBookingAlat = view('PRINTPDF/laporanBookingAlat', $data);
        $laporanAlat = view('PRINTPDF/laporanAlat', $data);

        // new PDF
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        $pdf->SetHeaderData(base_url("assets/img/logo.png"), 30, 'Fusion Studio', "Studio and Music Places", array(0, 64, 255), array(0, 64, 128));
        $pdf->AddPage();
        $pdf->writeHTML($laporanBookingRuangan);

        $pdf->AddPage();
        $pdf->writeHTML($laporanBookingAlat);

        $pdf->AddPage();
        $pdf->writeHTML($laporanAlat);

        $this->response->setContentType('application/pdf');



        $pdf->Output('Laporan Fusion.pdf', 'I');
    }

    public function laporanPDF()
    {
        // Set data-data laporan
        $tahun = $this->request->getVar('tahun');

        $bulan = $this->request->getVar('bulan');
        $bulanString = '';
        switch ($bulan) {
            case 1:
                $bulanString = 'Januari';
                break;
            case 2:
                $bulanString = 'Februari';
                break;
            case 3:
                $bulanString = 'Maret';
                break;
            case 4:
                $bulanString = 'April';
                break;    
            case 5:
                $bulanString = 'Mei';
                break;
            case 6:
                $bulanString = 'Juni';
                break;
            case 7:
                $bulanString = 'Juli';
                break;
            case 8:
                $bulanString = 'Agustus';
                break;
            case 9:
                $bulanString = 'September';
                break;
            case 10:
                $bulanString = 'Oktober';
                break;
            case 11:
                $bulanString = 'November';
                break;
            case 12:
                $bulanString = 'Desember';
                break;
        }

        /*---------------------------------------------- RUANG STUDIO -------------------------------------------- */
        $studio1 = $this->modelBookingRuangan
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa', 'SUM(durasi) AS durasi'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi',
                'kode_ruangan' => 'S1'
            ])
            ->first();
        $studio1_pendapatan = $studio1['pendapatan'];
        $studio1_pendapatan = "Rp. " . number_format((int)$studio1_pendapatan, 0, ',', '.');
        $studio1_jumlahSewa = $studio1['jumlahSewa'];
        $studio1_durasi = $studio1['durasi'];

        $studio2 = $this->modelBookingRuangan
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa', 'SUM(durasi) AS durasi'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi',
                'kode_ruangan' => 'S2'
            ])
            ->first();
        $studio2_pendapatan = $studio2['pendapatan'];
        $studio2_pendapatan = "Rp. " . number_format((int)$studio2_pendapatan, 0, ',', '.');
        $studio2_jumlahSewa = $studio2['jumlahSewa'];
        $studio2_durasi = $studio2['durasi'];

        $studioTotal = $this->modelBookingRuangan
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa', 'SUM(durasi) AS durasi'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ])
            ->first();
        $studioTotal_pendapatan = $studioTotal['pendapatan'];
        $studioTotal_pendapatan = "Rp. " . number_format((int) $studioTotal_pendapatan, 0, ',', '.');

        /*------------------------------------------- ALAT MUSIK -----------------------------------------------------*/

        // TOTAL
        $alatTotal = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ])
            ->first();
        $alatTotal_pendapatan = $alatTotal['pendapatan'];
        $alatTotal_pendapatan = "Rp. " . number_format((int) $alatTotal_pendapatan, 0, ',', '.');

        // GITAR
        $subQuery_gitar = $this->modelAlat->select('kode_alat')->where('jenis', 'Gitar')->get();
        $gitar_array = $subQuery_gitar->getResultArray();
        $gitar = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ]);
        if (!empty($gitar_array)) {
            $gitar->whereIn('kode_alat', array_column($subQuery_gitar->getResultArray(), 'kode_alat'));
            $gitar = $gitar->findAll();

            if (!empty($gitar)) {
                $gitar_pendapatan = $gitar[0]['pendapatan'];
                $gitar_pendapatan = "Rp. " . number_format((int)$gitar_pendapatan, 0, ',', '.');
                $gitar_jumlahSewa = $gitar[0]['jumlahSewa'];
            } else {
                $gitar_pendapatan = '-';
                $gitar_jumlahSewa = '-';
            }
        }

        // DRUM
        $subQuery_drum = $this->modelAlat->select('kode_alat')->where('jenis', 'Drum')->get();
        $drum_array = $subQuery_drum->getResultArray();
        $drum = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ]);
        if (!empty($drum_array)) {
            $drum->whereIn('kode_alat', array_column($subQuery_drum->getResultArray(), 'kode_alat'));
            $drum = $drum->findAll();

            if (!empty($drum)) {
                $drum_pendapatan = $drum[0]['pendapatan'];
                $drum_pendapatan = "Rp. " . number_format((int)$drum_pendapatan, 0, ',', '.');
                $drum_jumlahSewa = $drum[0]['jumlahSewa'];
            } else {
                $drum_pendapatan = '-';
                $drum_jumlahSewa = '-';
            }
        }

        // BASS
        $subQuery_bass = $this->modelAlat->select('kode_alat')->where('jenis', 'Bass')->get();
        $bass_array = $subQuery_bass->getResultArray();
        $bass = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ]);
        if (!empty($bass_array)) {
            $bass->whereIn('kode_alat', array_column($subQuery_bass->getResultArray(), 'kode_alat'));
            $bass = $bass->findAll();

            if (!empty($bass)) {
                $bass_pendapatan = $bass[0]['pendapatan'];
                $bass_pendapatan = "Rp. " . number_format((int)$bass_pendapatan, 0, ',', '.');
                $bass_jumlahSewa = $bass[0]['jumlahSewa'];
            } else {
                $bass_pendapatan = '-';
                $bass_jumlahSewa = '-';
            }
        }

        // PIANO
        $subQuery_piano = $this->modelAlat->select('kode_alat')->where('jenis', 'Piano')->get();
        $piano_array = $subQuery_piano->getResultArray();
        $piano = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ]);
        if (!empty($piano_array)) {
            $piano->whereIn('kode_alat', array_column($subQuery_piano->getResultArray(), 'kode_alat'));
            $piano = $piano->findAll();

            if (!empty($piano)) {
                $piano_pendapatan = $piano[0]['pendapatan'];
                $piano_pendapatan = "Rp. " . number_format((int)$piano_pendapatan, 0, ',', '.');
                $piano_jumlahSewa = $piano[0]['jumlahSewa'];
            } else {
                $piano_pendapatan = '-';
                $piano_jumlahSewa = '-';
            }
        }

        // AMPLI
        $subQuery_ampli = $this->modelAlat->select('kode_alat')->where('jenis', 'Ampli')->get();
        $ampli_array = $subQuery_ampli->getResultArray();
        $ampli = $this->modelBookingAlat
            ->select(['SUM(total_harga) AS pendapatan', 'COUNT(*) AS jumlahSewa'])
            ->where([
                'MONTH(tgl_pakai)' => $bulan,
                'YEAR(tgl_pakai)' => $tahun,
                'status_pembayaran' => 'Terverifikasi'
            ]);
        if (!empty($ampli_array)) {
            $ampli->whereIn('kode_alat', array_column($subQuery_ampli->getResultArray(), 'kode_alat'));
            $ampli = $ampli->findAll();

            if (!empty($ampli)) {
                $ampli_pendapatan = $ampli[0]['pendapatan'];
                $ampli_pendapatan = "Rp. " . number_format((int)$ampli_pendapatan, 0, ',', '.');
                $ampli_jumlahSewa = $ampli[0]['jumlahSewa'];
            } else {
                $ampli_pendapatan = '-';
                $ampli_jumlahSewa = '-';
            }
        }


        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Fusion Studio');
        $pdf->SetTitle('Laporan Bulanan');
        $pdf->SetSubject('Laporan Bulanan');
        $pdf->SetKeywords('Fusion, Laporan');


        $pdf->SetHeaderData(PDF_HEADER_LOGO, 20, 'Studio Fusion', 'Studio dan Alat Musik');

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('helvetica', 'B', 20);

        // add a page
        $pdf->AddPage();

        $pdf->Write(0, 'LAPORAN BULANAN RUANG STUDIO FUSION', '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', 'B', 17);

        $pdf->Write(0, 'Bulan : ' . $bulanString . ' ' . $tahun, '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 15);


        $tbl = <<<EOD
                    <table border="1" cellpadding="2" cellspacing="2">
                        <thead>
                            <tr style="background-color:#D3D3D3;color:#000;">
                                <td width="150" align="center"><b></b></td>
                                <td width="150" align="center"><b>Pendapatan</b></td>
                                <td width="150" align="center"><b>Jumlah Disewa</b></td>
                                <td width="150" align="center"><b>Durasi Sewa</b></td>
                            </tr>
                        </thead>

                            <tr>
                                <td width="150">Ruang 1</td>
                                <td width="150">$studio1_pendapatan</td>
                                <td width="150">$studio1_jumlahSewa kali</td>
                                <td width="150">$studio1_durasi jam</td>
                            </tr>
                            <tr>
                                <td width="150">Ruang 2</td>
                                <td width="150">$studio2_pendapatan</td>
                                <td width="150">$studio2_jumlahSewa kali</td>
                                <td width="150">$studio2_durasi jam</td>
                            </tr>
                    </table>
                    EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->SetFont('helvetica', 'B', 15);

        $pdf->Write(0, 'Total Pendapatan : ' . $studioTotal_pendapatan, '', 0, 'L', true, 0, false, false, 0);

        // add a page
        $pdf->AddPage();

        $pdf->SetFont('helvetica', 'B', 20);

        $pdf->Write(0, 'LAPORAN BULANAN ALAT MUSIK FUSION', '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', 'B', 17);

        $pdf->Write(0, 'Bulan : ' . $bulanString . ' ' . $tahun, '', 0, 'L', true, 0, false, false, 0);

        $pdf->SetFont('helvetica', '', 15);


        $tbl = <<<EOD
                    <table border="1" cellpadding="2" cellspacing="2">
                        <thead>
                            <tr style="background-color:#D3D3D3;color:#000;">
                                <td width="150" align="center"><b></b></td>
                                <td width="150" align="center"><b>Pendapatan</b></td>
                                <td width="150" align="center"><b>Jumlah Disewa</b></td>
                            </tr>
                        </thead>

                        <tr>
                            <td width="150">Gitar</td>
                            <td width="150">$gitar_pendapatan</td>
                            <td width="150">$gitar_jumlahSewa kali</td>

                        </tr>
                        <tr>
                            <td width="150">Bass</td>
                            <td width="150">$bass_pendapatan</td>
                            <td width="150">$bass_jumlahSewa kali</td>
                        </tr>
                        <tr>
                            <td width="150">Piano</td>
                            <td width="150">$piano_pendapatan</td>
                            <td width="150">$piano_jumlahSewa kali</td>
                        </tr>
                        <tr>
                            <td width="150">Drum</td>
                            <td width="150">$drum_pendapatan</td>
                            <td width="150">$drum_jumlahSewa kali</td>
                        </tr>
                        <tr>
                            <td width="150">Ampli</td>
                            <td width="150">$ampli_pendapatan</td>
                            <td width="150">$ampli_jumlahSewa kali</td>
                        </tr>
                    </table>
                EOD;

        $pdf->writeHTML($tbl, true, false, false, false, '');

        $pdf->SetFont('helvetica', 'B', 15);

        $pdf->Write(0, 'Total Pendapatan : ' . $alatTotal_pendapatan, '', 0, 'L', true, 0, false, false, 0);

        $this->response->setContentType('application/pdf');

        //Close and output PDF document
        $pdf->Output('Laporan.pdf', 'I');
    }
}
