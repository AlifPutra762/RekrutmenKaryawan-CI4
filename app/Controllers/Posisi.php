<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PosisiModel;
use CodeIgniter\HTTP\ResponseInterface;

class Posisi extends BaseController
{
    protected $posisiModel;

    public function __construct()
    {
        $this->posisiModel = new PosisiModel();
    }

    public function index()
    {
        //$posisi = $this->posisiModel->findAll();

        $data = [
            'posisi' => $this->posisiModel->getPosisi()
        ];

        return view('admin/v_daftarlowongan', $data);
    }

    public function detail($slug)
    {

        $data = [
            'posisi' => $this->posisiModel->getPosisi($slug)
        ];

        if (empty($data['posisi'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data Tidak Ditemukan');
        }

        return view('posisi/v_detailposisi', $data);
    }

    public function create()
    {
        session()->getFlashdata();
        $data = [
            'validation' => \Config\Services::validation()
        ];


        return view('posisi/v_tambahposisi', $data);
    }

    public function save()
    {

        $validation = \Config\Services::validation();

        $validation->setRules([
            'posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/posisi/v_tambahposisi')->withInput()->with('errors', $validation->getErrors());
        }

        $slug = url_title($this->request->getVar('posisi'), '-', true);
        $this->posisiModel->save([
            'posisi' => $this->request->getVar('posisi'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),

        ]);

        session()->setFlashdata('pesan_save_posisi', "Data Posisi berhasil ditambah");

        return redirect()->to('/daftarlowongan');
    }

    public function delete($id_posisi)
    {
        $this->posisiModel->delete($id_posisi);
        session()->setFlashdata('pesan_delete_posisi', "Data lamaran berhasil dihapus");
        return  redirect()->to('/daftarlowongan');
    }

    public function edit($slug)
    {

        $data = [
            'validation' => \Config\Services::validation(),
            'posisi' => $this->posisiModel->getPosisi($slug)

        ];

        return view('posisi/v_editposisi', $data);
    }

    public function update($id_posisi)
    {

        $validation = \Config\Services::validation();

        $validation->setRules([
            'posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
        ]);

        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/posisi/edit/' . $this->request->getVar('slug'))->withInput()->with('errors', $validation->getErrors());
        }

        $slug = url_title($this->request->getVar('posisi'), '-', true);
        $this->posisiModel->save([
            'id_posisi' => $id_posisi,
            'posisi' => $this->request->getVar('posisi'),
            'slug' => $slug,
            'deskripsi' => $this->request->getVar('deskripsi'),

        ]);

        session()->setFlashdata('pesan_update_posisi', "Data Posisi berhasil diubah");

        return redirect()->to('/daftarlowongan');
    }

    public function beranda()
    {
        //$posisi = $this->posisiModel->findAll();
        helper('text');

        $data = [
            'posisi' => $this->posisiModel->getPosisi()
        ];

        return view('user/v_beranda', $data);
    }
}
