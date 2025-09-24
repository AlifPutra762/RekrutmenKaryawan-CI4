<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\WawancaraModel;
use App\Models\PelamarModel;
use App\Models\DiterimaModel;
use App\Models\DitolakModel;
use CodeIgniter\HTTP\ResponseInterface;

class Wawancara extends BaseController
{
    protected $wawancaraModel;
    protected $pelamarModel;
    protected $diterimaModel;
    protected $ditolakModel;
    public function __construct()
    {
        $this->wawancaraModel = new WawancaraModel();
        $this->pelamarModel = new PelamarModel();
        $this->diterimaModel = new DiterimaModel();
        $this->ditolakModel = new DitolakModel();
    }
    public function index()
    {
        $data = [
            'wawancara' => $this->wawancaraModel->getWawancara(),  // Mengambil data pelamar yang diterima
        ];
        // Ambil semua data pelamar diterima
        return view('admin/v_wawancara', $data);
    }

    public function delete($id_pelamar)
    {
        $this->wawancaraModel->find($id_pelamar);

        $this->wawancaraModel->delete($id_pelamar);
        session()->setFlashdata('pesan_delete', "Data lamaran berhasil dihapus");
        return  redirect()->to('/wawancara');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'wawancara' => $this->wawancaraModel->getWawancara($slug)

        ];

        return view('admin/v_wawancara', $data);
    }

    public function update($id_pelamar)
    {
        // Mengambil data tanggal dan waktu dari input form
        $tanggal = $this->request->getVar('tanggal');
        $waktu = $this->request->getVar('waktu');

        // Validasi jika data yang diterima tidak kosong
        $this->wawancaraModel->save([
            'id_pelamar' => $id_pelamar,
            'tanggal' => $tanggal,
            'waktu' => $waktu,
        ]);

        // Setelah data berhasil disimpan, redirect ke halaman wawancara
        return redirect()->to('/wawancara');
    }

    public function terima($id)
    {
        // Load model pelamar
        $wawancaraModel = new wawancaraModel();

        // Load model pelamar diterima
        $diterimaModel = new DiterimaModel();


        // Ambil data pelamar berdasarkan ID
        $w = $wawancaraModel->find($id);

        if ($w) {
            // Siapkan data untuk disalin ke tabel pelamar_diterima
            $dataDiterima = [
                'nama_pelamar' => $w['nama_pelamar'],
                'email_pelamar' => $w['email_pelamar'],
                'slug' => $w['slug'],
                'no_hp' => $w['no_hp'],
                'posisi' => $w['posisi'],
                'tanggal' => $w['tanggal'],
                'waktu' => $w['waktu'],
                'cv_pelamar' => $w['cv_pelamar'],
                'portofolio_pelamar' => $w['portofolio_pelamar'],
                'dokumen_pendukung' => $w['dokumen_pendukung'],
                'foto_pelamar' => $w['foto_pelamar']
            ];

            // Insert data ke tabel pelamar_diterima
            $diterimaModel->save($dataDiterima);

            session()->setFlashdata('pesan_terima', "Lamaran diterima");
            // Redirect kembali ke halaman daftar pelamar dengan pesan sukses
            return redirect()->to('/wawancara')->with('success', 'Pelamar lolos tahap selanjutnya');
        }
    }

    public function tolak($id)
    {
        // Load model pelamar
        $wawancaraModel = new WawancaraModel();

        // Load model pelamar ditolak
        $ditolakModel = new DitolakModel(); // Pastikan ini model untuk tabel pelamar_ditolak

        // Ambil data pelamar berdasarkan ID
        $w = $wawancaraModel->find($id);

        if ($w) {
            // Siapkan data untuk disalin ke tabel pelamar_ditolak
            $dataDitolak = [
                'nama_pelamar' => $w['nama_pelamar'],
                'email_pelamar' => $w['email_pelamar'],
                'slug' => $w['slug'],
                'no_hp' => $w['no_hp'],
                'posisi' => $w['posisi'],
                'tanggal' => $w['tanggal'],
                'waktu' => $w['waktu'],
                'cv_pelamar' => $w['cv_pelamar'],
                'portofolio_pelamar' => $w['portofolio_pelamar'],
                'dokumen_pendukung' => $w['dokumen_pendukung'],
                'foto_pelamar' => $w['foto_pelamar']
            ];

            // Insert data ke tabel pelamar_ditolak
            $ditolakModel->save($dataDitolak);

            session()->setFlashdata('pesan_tolak', "Lamaran ditolak");

            // Redirect kembali ke halaman daftar pelamar dengan pesan sukses
            return redirect()->to('/wawancara')->with('success', 'Pelamar tidak lolos tahap selanjutnya');
        }
    }

    public function sendterima($id)
    {
        $wawancaraModel = new wawancaraModel();

        // Ambil data pelamar berdasarkan ID
        $pelamar = $wawancaraModel->find($id);

        // Validasi jika data tidak ditemukan
        if (!$pelamar) {
            return redirect()->to('/wawancara')->with('error', 'Data pelamar tidak ditemukan.');
        }

        // Ambil data pelamar
        $nama = $pelamar['nama_pelamar'];
        $noHp = $pelamar['no_hp'];
        $posisi = $pelamar['posisi'];
        $tanggal = $pelamar['tanggal'];
        $waktu = $pelamar['waktu'];

        // Buat pesan yang dipersonalisasi
        $message = "Halo $nama,
    
Selamat! Kami dengan senang hati menginformasikan bahwa Anda telah berhasil lolos tahap pemberkasan untuk posisi $posisi di perusahaan kami.
        
Tahap berikutnya adalah **wawancara** yang akan dilakukan secara langsung/online. Berikut detail jadwal wawancara Anda:
        
**Tanggal**: $tanggal  
**Waktu**: $waktu  
**Lokasi**: Zoom Meeting
        
Mohon untuk hadir tepat waktu dan membawa/mempersiapkan dokumen yang relevan jika diperlukan. Kami juga menyarankan untuk mengenakan pakaian formal dan mempersiapkan diri dengan baik untuk wawancara ini.
        
Jika Anda membutuhkan informasi lebih lanjut atau terdapat kendala, jangan ragu untuk menghubungi kami melalui kontak berikut: +62xxxxx
        
Kami berharap dapat segera bertemu Anda di tahap wawancara ini.
        
Salam hangat,  
Tim Rekrutmen AMIN'S PROJECT TEKNOLOGI INDONESIA";

        // Kirim pesan menggunakan helper
        $response = sendSingleWhatsAppMessage($noHp, $message);

        // Log hasil pengiriman
        if (!$response || strpos($response, 'error') !== false) {
            log_message('error', "Gagal mengirim pesan ke $noHp: $response");
        } else {
            log_message('info', "Berhasil mengirim pesan ke $noHp: $response");
        }

        return redirect()->to('/wawancara')->with('status', 'Pesan berhasil dikirim ke pelamar.');
    }
}
