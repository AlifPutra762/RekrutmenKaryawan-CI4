<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Dashboard extends BaseController
{

    public function index()
    {
        // Ambil jumlah pelamar dari berbagai tabel
        $pelamarModel = new \App\Models\PelamarModel();
        $diterimaModel = new \App\Models\DiterimaModel();
        $ditolakModel = new \App\Models\DitolakModel();
        $posisi = new \App\Models\PosisiModel();

        $jumlahPelamar = $pelamarModel->countAll();
        $jumlahDiterima = $diterimaModel->countAll();
        $jumlahDitolak = $ditolakModel->countAll();
        $jumlahPosisi = $posisi->countAll();

        // Kirim data jumlah pelamar, diterima, ditolak, dan posisi ke view
        return view('admin/v_dashboard', [
            'jumlahPelamar' => $jumlahPelamar,
            'jumlahDiterima' => $jumlahDiterima,
            'jumlahDitolak' => $jumlahDitolak,
            'jumlahPosisi' => $jumlahPosisi
        ]);
    }
}
