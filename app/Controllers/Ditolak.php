<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelamarModel;
use App\Models\DitolakModel;
use CodeIgniter\HTTP\ResponseInterface;

class Ditolak extends BaseController
{

    protected $pelamarModel;
    protected $ditolakModel;

    public function __construct()
    {
        $this->pelamarModel = new PelamarModel();
        $this->ditolakModel = new DitolakModel();
    }

    public function index()
    {
        $data =
            ['tolak' => $this->ditolakModel->getDitolak()];
        // Ambil semua data pelamar diterima
        return view('admin/v_pelamarditolak', $data);
    }

    public function delete($id_pelamar)
    {
        $this->ditolakModel->find($id_pelamar);

        $this->ditolakModel->delete($id_pelamar);
        session()->setFlashdata('pesan_delete', "Data lamaran berhasil dihapus");
        return  redirect()->to('/pelamarditolak');
    }
}
