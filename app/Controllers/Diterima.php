<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelamarModel;
use App\Models\DiterimaModel;
use CodeIgniter\HTTP\ResponseInterface;

namespace App\Controllers;

use App\Models\PelamarModel;
use App\Models\DiterimaModel;
use App\Models\PengumumanModel;

class Diterima extends BaseController
{
    protected $pelamarModel;
    protected $diterimaModel;
    protected $pengumuman;

    public function __construct()
    {
        $this->pelamarModel = new PelamarModel();
        $this->diterimaModel = new DiterimaModel();
        $this->pengumuman = new PengumumanModel();
    }

    public function index()
    {
        $data = [
            'terima' => $this->diterimaModel->getDiterima(),  // Mengambil data pelamar yang diterima
        ];
        // Ambil semua data pelamar diterima
        return view('admin/v_pelamarditerima', $data);
    }

    public function delete($id_pelamar)
    {
        $this->diterimaModel->find($id_pelamar);

        $this->diterimaModel->delete($id_pelamar);
        session()->setFlashdata('pesan_delete', "Data lamaran berhasil dihapus");
        return  redirect()->to('/pelamarditerima');
    }

    public function pengumuman()
    {

        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $terima = $this->diterimaModel->search($keyword);
        } else {
            $terima = $this->diterimaModel;
        }

        $data = [
            // 'terima' => $this->diterimaModel->getDiterima(), // Mengambil data pelamar yang diterima
            'terima' => $terima->paginate(5),
            'pager' => $this->diterimaModel->pager,
            'currentPage' => $currentPage
        ];
        // Ambil semua data pelamar diterima
        return view('user/v_pengumuman', $data);
    }
}
