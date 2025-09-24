<?php

namespace App\Controllers;

class Home extends BaseController
{
    //public function index(): string
    //{
    //   return view('welcome_message');
    //}



    public function tentang()
    {
        echo view('user/v_tentang');
    }

    public function pengumuman()
    {
        echo view('user/v_pengumuman');
    }
}
