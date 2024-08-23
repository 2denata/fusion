<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('ViewPenyewa/index');
    }

    public function asdf()
    {
        return view('ViewPenyewa/sukses');
    }
}
