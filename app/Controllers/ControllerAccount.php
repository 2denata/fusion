<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\PihakStudioModel;


class ControllerAccount extends BaseController
{
    protected $modelUser, $modelAdmin;

    public function __construct()
    {
        $this->modelUser = new UserModel();
        $this->modelAdmin = new PihakStudioModel();
    }


    public function login()
    {
        // Jika user sudah login, arahkan ke home
        if (session()->has('username')) {
            return redirect()->to(base_url('/home'));
        } else if (session()->has('admin')) {
            return redirect()->to(base_url('/admin'));
        }

        // Kalau akses lewat link, tampilkan view
        if (!$this->request->is('post')) {
            return view('/ViewPenyewa/login');
        }

        $data = $this->request->getPost(['email', 'password']);

        // cek dulu jika login pakai data admin
        $cekAdmin = $this->modelAdmin->login($data);

        if ($cekAdmin > 0) {
            session()->set('admin', 'admin');
            return redirect()->to(base_url('admin'));
        }

        // Cek data di database
        $hasil = $this->modelUser->login($data);

        // Cek hasil pencarian di database
        if ($hasil > 0) {
            session()->set('username', $hasil);
            return redirect()->to(base_url('home'));
        } else {
            return redirect()->to(base_url('login'));
        }
    }

    public function signup()
    {
        
        session();
        // Jika user sudah login, arahkan ke home
        if (session()->has('username')) {
            return redirect()->to(base_url('/home'));
        }
        $data = 
        [
            'validation' => session()->getFlashdata('validation')
        ];

        return view('/ViewPenyewa/regis', $data);
    }

    public function prosesSignUp()
    {
        // VALIDATION
        helper('form');
        if (!$this->validate([
            'email' => [
                'rules' => 'required|is_unique[penyewa.email]|valid_email',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!',
                    'is_unique' => '{field} sudah terdaftar!',
                    'valid_email' => '{field} tidak valid!'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|is_unique[penyewa.no_hp]|max_length[14]|min_length[10]|integer',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!',
                    'is_unique' => '{field} sudah terdaftar!',
                    'max_length' => '{field} tidak boleh lebih dari 14 digit!',
                    'min_length' => '{field} tidak boleh kurang dari 10 digit!',
                    'integer' => '{field} hanya berisi angka!'
                ]
            ],
            'nama' => [
                'rules' => 'required|alpha_space',
                'errors' => '{field} tidak boleh kosong!',
                'alpha_space' => '{field} harus berupa angka'
            ]

        ])) {

            $validation = \Config\Services::validation();
            $data = 
            [
                'validation' => $validation
            ];
            return redirect()->to(base_url('signup'))->withInput()->with('validation', $validation);
        }

        $data = $this->request->getPost(['email', 'nama', 'no_hp', 'password',]);

        $this->modelUser->daftar($data);
        return view('ViewPenyewa/suksesRegis');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
