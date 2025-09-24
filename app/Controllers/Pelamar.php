<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PelamarModel;
use App\Models\DiterimaModel;
use App\Models\DitolakModel;
use App\Models\PosisiModel;
use App\Models\WawancaraModel;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Validation;

helper('recaptcha_helper');

class Pelamar extends BaseController
{
    protected $pelamarModel;
    protected $diterimaModel;
    protected $ditolakModel;
    protected $posisiModel;
    protected $wawancaraModel;


    public  function __construct()
    {
        $this->pelamarModel = new PelamarModel();
        $this->diterimaModel = new DiterimaModel();
        $this->ditolakModel = new DitolakModel();
        $this->posisiModel = new PosisiModel();
        $this->wawancaraModel = new WawancaraModel();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $pelamar = $this->pelamarModel->search($keyword);
        } else {
            $pelamar = $this->pelamarModel;
        }

        //$pelamar = $this->pelamarModel->findAll();

        $data = [
            // 'pelamar' => $this->pelamarModel->getPelamar()
            'pelamar' => $pelamar->paginate(5),
            'pager' => $this->pelamarModel->pager,
            'currentPage' => $currentPage
        ];

        return view('admin/v_daftarpelamar', $data);
    }

    public function detail($slug)
    {
        //$pelamar = $this->pelamarModel->getPelamar($slug);
        $data = [
            'pelamar' => $this->pelamarModel->getPelamar($slug)
        ];

        if (empty($data['pelamar'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data Tidak Ditemukan');
        }


        return view('pelamar/v_detailpelamar', $data);
    }

    public function create()
    {
        session()->getFlashdata();
        $data = [
            'validation' => \Config\Services::validation(),
            'posisi' => $this->posisiModel->getPosisi()
        ];



        return view('pelamar/v_tambahpelamar', $data);
    }

    public function save()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pelamar' => [
                'label' => 'Nama',
                'rules' => 'required|is_unique[pelamar.nama_pelamar]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar. Gunakan nama lain.',
                ]
            ],
            'email_pelamar' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} harus berupa email yang valid',
                ]
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required|regex_match[/^\+62[0-9]*$/]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'regex_match' => '{field} harus dimulai dengan +62 dan hanya boleh berisi angka setelahnya',
                ]
            ],

            'posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'cv_pelamar' => [
                'label' => 'CV',
                'rules' => 'uploaded[cv_pelamar]|mime_in[cv_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file cv disini',
                    'mime_in' => 'File cv harus berupa pdf',
                    'max_size' => 'Ukuran file CV tidak boleh lebih dari 2 MB',
                ]
            ],
            'portofolio_pelamar' => [
                'label' => 'Portofolio',
                'rules' => 'uploaded[portofolio_pelamar]|mime_in[portofolio_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file portofolio disini',
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file portofolio tidak boleh lebih dari 2 MB',
                ]
            ],
            'dokumen_pendukung' => [
                'label' => 'Dokumen Pendukung',
                'rules' => 'uploaded[dokumen_pendukung]|mime_in[dokumen_pendukung,application/pdf]|max_size[dokumen_pendukung,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file portofolio disini',
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file Dokumen Pendukung tidak boleh lebih dari 2 MB',
                ]
            ],
            'foto_pelamar' => [
                'rules' => 'uploaded[foto_pelamar]|is_image[foto_pelamar]|mime_in[foto_pelamar,image/png,image/jpg,image/jpeg]|max_size[foto_pelamar,300]',
                'errors' => [
                    'uploaded' => 'Isikan foto disini',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                    'max_size' => 'Ukuran file foto pelamar tidak boleh lebih dari 300 KB',
                ]
            ],
        ]);


        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/pelamar/v_tambahpelamar')->withInput()->with('errors', $validation->getErrors());
        }

        //AMBIL FOTO
        $fileFoto = $this->request->getFile('foto_pelamar');

        //NAMA FILE RANDOM
        //PINDAHKAN FILE
        $namaFoto = $fileFoto->getRandomName();

        //AMBIL NAMA FILE 
        //PINDAHKAN FILE
        $fileFoto->move('foto_pelamar', $namaFoto);

        //CV
        $fileCV = $this->request->getFile('cv_pelamar');
        $namaCV = $fileCV->getRandomName();
        $fileCV->move('cv_pelamar', $namaCV);

        //Portofolio
        $fileprtfl = $this->request->getFile('portofolio_pelamar');
        $namaPrtfl = $fileprtfl->getRandomName();
        $fileprtfl->move('portofolio_pelamar', $namaPrtfl);

        //Dokumen Pendukung
        $filedkmn = $this->request->getFile('dokumen_pendukung');
        $namadkmn = $filedkmn->getRandomName();
        $filedkmn->move('dokumen_pendukung', $namadkmn);



        //if (!$this->validate([
        //  'nama_pelamar' => 'required|is_unique[pelamar.nama_pelamar]',
        //])) {

        //  $validation = \Config\Services::validation();


        //return redirect()->to('pelamar/v_tambahpelamar')->withInput()->with('validation', $validation);
        //}

        // Retrieve and sanitize the input
        $namaPelamar = $this->request->getVar('nama_pelamar');
        $emailPelamar = $this->request->getVar('email_pelamar');
        $noHp = $this->request->getVar('no_hp');
        $posisi = $this->request->getVar('posisi');
        $cv = $namaCV;
        $portofolio = $namaPrtfl;
        $dokumenPendukung = $namadkmn;
        $foto = $namaFoto;

        // Continue with slug generation and saving data
        $slug = url_title($namaPelamar, '-', true);

        $this->pelamarModel->save([
            'nama_pelamar' => $namaPelamar,
            'slug' => $slug,
            'email_pelamar' => $emailPelamar,
            'no_hp' => $noHp,
            'posisi' => $posisi,
            'cv_pelamar' => $cv,
            'portofolio_pelamar' => $portofolio,
            'dokumen_pendukung' => $dokumenPendukung,
            'foto_pelamar' => $foto
        ]);

        session()->setFlashdata('pesan_save', "Lamaran berhasil terkirim");

        return  redirect()->to('/daftarpelamar');
    }

    public function delete($id_pelamar)
    {
        $pelamar = $this->pelamarModel->find($id_pelamar);
        // Define the paths
        $fotoPath = 'foto_pelamar/' . $pelamar['foto_pelamar'];
        $cvPath = 'cv_pelamar/' . $pelamar['cv_pelamar'];
        $portofolioPath = 'portofolio_pelamar/' . $pelamar['portofolio_pelamar'];
        $dokumenPendukungPath = 'dokumen_pendukung/' . $pelamar['dokumen_pendukung'];

        // Check if file exists and is a file before unlinking
        if (is_file($fotoPath)) {
            unlink($fotoPath);
        }

        if (is_file($cvPath)) {
            unlink($cvPath);
        }

        if (is_file($portofolioPath)) {
            unlink($portofolioPath);
        }
        if (is_file($dokumenPendukungPath)) {
            unlink($dokumenPendukungPath);
        }
        $this->pelamarModel->delete($id_pelamar);
        session()->setFlashdata('pesan_delete', "Data lamaran berhasil dihapus");
        return  redirect()->to('/daftarpelamar');
    }

    public function edit($slug)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'pelamar' => $this->pelamarModel->getPelamar($slug)

        ];

        return view('pelamar/v_editpelamar', $data);
    }

    public function update($id_pelamar)
    {
        $validation = \Config\Services::validation();

        $pelamarLama = $this->pelamarModel->getPelamar($this->request->getVar('slug'));
        if ($pelamarLama['nama_pelamar'] == $this->request->getVar('nama_pelamar')) {
            $rule_nama_pelamar = 'required';
        } else {
            $rule_nama_pelamar = 'required|is_unique[pelamar.nama_pelamar]';
        }

        $validation->setRules([
            'nama_pelamar' => [
                'label' => 'Nama',
                'rules' => $rule_nama_pelamar,
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'email_pelamar' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} harus berupa email yang valid',
                ]
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required|regex_match[/^\+62[0-9]*$/]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'regex_match' => '{field} harus dimulai dengan +62 dan hanya boleh berisi angka setelahnya',
                ]
            ],

            'posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'cv_pelamar' => [
                'label' => 'CV',
                'rules' => 'mime_in[cv_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'mime_in' => 'File cv harus berupa pdf',
                    'max_size' => 'Ukuran file CV tidak boleh lebih dari 2 MB',
                ]
            ],
            'portofolio_pelamar' => [
                'label' => 'Portofolio',
                'rules' => 'mime_in[portofolio_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file portofolio tidak boleh lebih dari 2 MB',
                ]
            ],
            'dokumen_pendukung' => [
                'label' => 'Dokumen Pendukung',
                'rules' => 'mime_in[dokumen_pendukung,application/pdf]|max_size[dokumen_pendukung,2048]',
                'errors' => [
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file Dokumen Pendukung tidak boleh lebih dari 2 MB',
                ]
            ],
            'foto_pelamar' => [
                'rules' => 'is_image[foto_pelamar]|mime_in[foto_pelamar,image/png,image/jpg,image/jpeg]|max_size[foto_pelamar,300]',
                'errors' => [
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                    'max_size' => 'Ukuran file foto pelamar tidak boleh lebih dari 300 KB',
                ]
            ]
        ]);


        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/pelamar/edit/' . $this->request->getVar('slug'))->withInput()->with('errors', $validation->getErrors());
        }

        //AMBIL FOTO
        $fileFoto = $this->request->getFile('foto_pelamar');

        //CEK FOTO APAKAH MASIH FOTO LAMA
        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            //GENERATE NAMA FILE RANDOM
            $namaFoto = $fileFoto->getRandomName();
            //PINDAHKAN FILE FOTO
            $fileFoto->move('foto_pelamar', $namaFoto);
            //HAPUS FILE LAMA
            unlink('foto_pelamar/' . $this->request->getVar('fotoLama'));
        }

        //CV
        $fileCV = $this->request->getFile('cv_pelamar');

        if ($fileCV->getError() == 4) {
            // No new file was uploaded, so keep the old file name
            $namaCV = $this->request->getVar('cvLama');
        } else {
            // New file uploaded
            $namaCV = $fileCV->getRandomName();

            // Move the new file into the directory with the new random name
            $fileCV->move('cv_pelamar', $namaCV);

            // Delete the old file if it exists
            $oldFile = 'cv_pelamar/' . $this->request->getVar('cvLama');
            if (is_file($oldFile)) {
                unlink($oldFile);
            }
        }

        //PORTOFOLIO
        $filePorto = $this->request->getFile('portofolio_pelamar');
        if ($filePorto->getError() == 4) {
            $namaPorto = $this->request->getVar('portoLama');
        } else {
            $namaPorto = $filePorto->getRandomName();
            $filePorto->move('portofolio_pelamar', $namaPorto);
            $oldPorto = 'portofolio_pelamar/' . $this->request->getVar('portoLama');
            if (is_file($oldPorto)) {
                unlink($oldPorto);
            }
        }

        //DOKUMEN PENDUKUNG
        $fileDokumen = $this->request->getFile('dokumen_pendukung');
        if ($fileDokumen->getError() == 4) {
            $namaDokumen = $this->request->getVar('dokumenLama');
        } else {
            $namaDokumen = $fileDokumen->getRandomName();
            $fileDokumen->move('dokumen_pendukung', $namaDokumen);
            $oldDokumen = 'dokumen_pendukung/' . $this->request->getVar('dokumenLama');
            if (is_file($oldDokumen)) {
                unlink($oldDokumen);
            }
        }




        $namaPelamar = $this->request->getVar('nama_pelamar');
        $emailPelamar = $this->request->getVar('email_pelamar');
        $noHp = $this->request->getVar('no_hp');
        $posisi = $this->request->getVar('posisi');
        $cv = $this->request->getVar('cv_pelamar');
        $portofolio = $this->request->getVar('portofolio_pelamar');
        $foto = $this->request->getVar('foto_pelamar');

        // Continue with slug generation and saving data
        $slug = url_title($namaPelamar, '-', true);

        $this->pelamarModel->save([
            'id_pelamar' => $id_pelamar,
            'nama_pelamar' => $namaPelamar,
            'slug' => $slug,
            'email_pelamar' => $emailPelamar,
            'no_hp' => $noHp,
            'posisi' => $posisi,
            'cv_pelamar' => $namaCV,
            'portofolio_pelamar' => $namaPorto,
            'dokumen_pendukung' => $namaDokumen,
            'foto_pelamar' => $namaFoto
        ]);

        session()->setFlashdata('pesan_update', "Lamaran berhasil diubah");

        return  redirect()->to('/daftarpelamar');
    }

    public function wawancara($id)
    {
        // Load model pelamar
        $pelamarModel = new PelamarModel();

        // Load model pelamar diterima
        $wawancaraModel = new WawancaraModel();


        // Ambil data pelamar berdasarkan ID
        $pelamar = $pelamarModel->find($id);

        if ($pelamar) {
            // Siapkan data untuk disalin ke tabel pelamar_diterima
            $dataWawancara = [
                'nama_pelamar' => $pelamar['nama_pelamar'],
                'email_pelamar' => $pelamar['email_pelamar'],
                'slug' => $pelamar['slug'],
                'no_hp' => $pelamar['no_hp'],
                'posisi' => $pelamar['posisi'],
                'cv_pelamar' => $pelamar['cv_pelamar'],
                'portofolio_pelamar' => $pelamar['portofolio_pelamar'],
                'dokumen_pendukung' => $pelamar['dokumen_pendukung'],
                'foto_pelamar' => $pelamar['foto_pelamar']
            ];

            // Insert data ke tabel pelamar_diterima
            $wawancaraModel->save($dataWawancara);

            session()->setFlashdata('pesan_wawancara', "Data Pelamar masuk ke Data Wawancara");
            // Redirect kembali ke halaman daftar pelamar dengan pesan sukses
            return redirect()->to('/daftarpelamar')->with('success', 'Pelamar lolos tahap selanjutnya');
        }
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
        $pelamarModel = new PelamarModel();

        // Load model pelamar ditolak
        $ditolakModel = new DitolakModel(); // Pastikan ini model untuk tabel pelamar_ditolak

        // Ambil data pelamar berdasarkan ID
        $pelamar = $pelamarModel->find($id);

        if ($pelamar) {
            // Siapkan data untuk disalin ke tabel pelamar_ditolak
            $dataDitolak = [
                'nama_pelamar' => $pelamar['nama_pelamar'],
                'email_pelamar' => $pelamar['email_pelamar'],
                'slug' => $pelamar['slug'],
                'no_hp' => $pelamar['no_hp'],
                'posisi' => $pelamar['posisi'],
                'cv_pelamar' => $pelamar['cv_pelamar'],
                'portofolio_pelamar' => $pelamar['portofolio_pelamar'],
                'dokumen_pendukung' => $pelamar['dokumen_pendukung'],
                'foto_pelamar' => $pelamar['foto_pelamar']
            ];

            // Insert data ke tabel pelamar_ditolak
            $ditolakModel->save($dataDitolak);

            session()->setFlashdata('pesan_tolak', "Lamaran ditolak");

            // Redirect kembali ke halaman daftar pelamar dengan pesan sukses
            return redirect()->to('/daftarpelamar')->with('success', 'Pelamar tidak lolos tahap selanjutnya');
        }
    }

    public function sendterima()
    {
        $diterimaModel = new DiterimaModel();

        // Ambil data pelamar dari database
        $diterima = $diterimaModel->findAll();

        foreach ($diterima as $terima) {
            $nama = $terima['nama_pelamar'];
            $noHp = $terima['no_hp'];
            $posisi = $terima['posisi'];

            // Buat pesan yang dipersonalisasi
            $message = "Halo $nama,
Kami dari CV. AMINS PROJECT TEKNOLOGI INDONESIA dengan senang hati menginformasikan bahwa Anda telah diterima untuk posisi $posisi. Selamat atas pencapaiannya! 

Detail lebih lanjut mengenai jadwal orientasi dan dokumen yang perlu disiapkan akan kami kirimkan dalam waktu dekat. Jika ada pertanyaan, jangan ragu untuk menghubungi kami.

Terima kasih telah berminat bergabung dengan tim kami. Kami sangat antusias menyambut Anda disini.

Salam hangat,
Tim Rekrutmen AMIN'S PROJECT TEKNOLOGI INDONESIA";

            // Kirim pesan menggunakan helper
            $response = sendWhatsAppMessage($noHp, $message);

            log_message('info', "Respon API Fonnte untuk $noHp: $response");
        }

        return redirect()->to('/pelamarditerima')->with('status', 'Pesan berhasil dikirim ke semua pelamar.');
    }

    public function sendtolak()
    {
        $ditolakModel = new DitolakModel();

        // Ambil data pelamar dari database
        $diterima = $ditolakModel->findAll();

        foreach ($diterima as $terima) {
            $nama = $terima['nama_pelamar'];
            $noHp = $terima['no_hp'];
            $posisi = $terima['posisi'];

            // Buat pesan yang dipersonalisasi
            $message = "Halo $nama,

Terima kasih telah melamar di posisi $posisi di perusahaan kami. Kami menghargai minat dan usaha yang Anda tunjukkan selama proses seleksi.

Setelah melalui pertimbangan yang cermat, kami mohon maaf untuk memberitahukan bahwa Anda belum berhasil lolos ke tahap berikutnya. Meskipun demikian, kami sangat menghargai Anda dan berharap Anda tetap semangat dalam mencari kesempatan lain.

Terima kasih sekali lagi atas waktu dan perhatian yang telah Anda berikan.

Semoga sukses dalam pencarian karir Anda, dan jangan ragu untuk melamar kembali di kesempatan berikutnya.

Salam hangat,
Tim Rekrutmen AMIN'S PROJECT TEKNOLOGI INDONESIA";

            // Kirim pesan menggunakan helper
            $response = sendWhatsAppMessage($noHp, $message);

            log_message('info', "Respon API Fonnte untuk $noHp: $response");
        }

        return redirect()->to('/pelamarditolak')->with('status', 'Pesan berhasil dikirim ke semua pelamar.');
    }

    public function kirimLamaran()
    {
        session()->getFlashdata();
        $data = [
            'validation' => \Config\Services::validation(),
            'posisi' => $this->posisiModel->getPosisi()
        ];

        return view('user/v_kirimlamaran', $data);
    }

    public function simpanLamaran()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nama_pelamar' => [
                'label' => 'Nama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'email_pelamar' => [
                'label' => 'Email',
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'valid_email' => '{field} harus berupa email yang valid',
                ]
            ],
            'no_hp' => [
                'label' => 'Nomor HP',
                'rules' => 'required|regex_match[/^\+62[0-9]*$/]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'regex_match' => '{field} harus dimulai dengan +62 dan hanya boleh berisi angka setelahnya',
                ]
            ],

            'posisi' => [
                'label' => 'Posisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi',
                ]
            ],
            'cv_pelamar' => [
                'label' => 'CV',
                'rules' => 'uploaded[cv_pelamar]|mime_in[cv_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file cv disini',
                    'mime_in' => 'File cv harus berupa pdf',
                    'max_size' => 'Ukuran file CV tidak boleh lebih dari 2 MB',
                ]
            ],
            'portofolio_pelamar' => [
                'label' => 'Portofolio',
                'rules' => 'uploaded[portofolio_pelamar]|mime_in[portofolio_pelamar,application/pdf]|max_size[cv_pelamar,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file portofolio disini',
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file portofolio tidak boleh lebih dari 2 MB',
                ]
            ],
            'dokumen_pendukung' => [
                'label' => 'Dokumen Pendukung',
                'rules' => 'uploaded[dokumen_pendukung]|mime_in[dokumen_pendukung,application/pdf]|max_size[dokumen_pendukung,2048]',
                'errors' => [
                    'uploaded' => 'Isikan file portofolio disini',
                    'mime_in' => 'File portofolio harus berupa pdf',
                    'max_size' => 'Ukuran file Dokumen Pendukung tidak boleh lebih dari 2 MB',
                ]
            ],
            'foto_pelamar' => [
                'rules' => 'uploaded[foto_pelamar]|is_image[foto_pelamar]|mime_in[foto_pelamar,image/png,image/jpg,image/jpeg]|max_size[foto_pelamar,300]',
                'errors' => [
                    'uploaded' => 'Isikan foto disini',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar',
                    'max_size' => 'Ukuran file foto pelamar tidak boleh lebih dari 300 KB',
                ]
            ],
        ]);


        if (!$validation->run($this->request->getPost())) {
            return redirect()->to('/user/v_kirimlamaran')->withInput()->with('errors', $validation->getErrors());
        }

        // Ambil nomor HP dan validasi melalui API Fonnte
        $noHp = $this->request->getPost('no_hp');
        $isValidWhatsApp = $this->validateWhatsAppNumber($noHp);

        if (!$isValidWhatsApp) {
            return redirect()->to('/user/v_kirimlamaran')->withInput()->with('errors', [
                'no_hp' => 'Nomor hp tidak terdaftar di WhatsApp',
            ]);
        }

        //AMBIL FOTO
        $fileFoto = $this->request->getFile('foto_pelamar');

        //NAMA FILE RANDOM
        //PINDAHKAN FILE
        $namaFoto = $fileFoto->getRandomName();

        //AMBIL NAMA FILE 
        //PINDAHKAN FILE
        $fileFoto->move('foto_pelamar', $namaFoto);

        //CV
        $fileCV = $this->request->getFile('cv_pelamar');
        $namaCV = $fileCV->getRandomName();
        $fileCV->move('cv_pelamar', $namaCV);

        //Portofolio
        $fileprtfl = $this->request->getFile('portofolio_pelamar');
        $namaPrtfl = $fileprtfl->getRandomName();
        $fileprtfl->move('portofolio_pelamar', $namaPrtfl);

        //DOKUMEN PENDUKUNG
        $fileDkmn = $this->request->getFile('dokumen_pendukung');
        $namaDkmn = $fileDkmn->getRandomName();
        $fileDkmn->move('dokumen_pendukung', $namaDkmn);


        //if (!$this->validate([
        //  'nama_pelamar' => 'required|is_unique[pelamar.nama_pelamar]',
        //])) {

        //  $validation = \Config\Services::validation();


        //return redirect()->to('pelamar/v_tambahpelamar')->withInput()->with('validation', $validation);
        //}

        // Retrieve and sanitize the input
        $namaPelamar = $this->request->getVar('nama_pelamar');
        $emailPelamar = $this->request->getVar('email_pelamar');
        $noHp = $this->request->getVar('no_hp');
        $posisi = $this->request->getVar('posisi');
        $cv = $namaCV;
        $portofolio = $namaPrtfl;
        $dokumenPendukung = $namaDkmn;
        $foto = $namaFoto;

        // Continue with slug generation and saving data
        $slug = url_title($namaPelamar, '-', true);

        $this->pelamarModel->save([
            'nama_pelamar' => $namaPelamar,
            'slug' => $slug,
            'email_pelamar' => $emailPelamar,
            'no_hp' => $noHp,
            'posisi' => $posisi,
            'cv_pelamar' => $cv,
            'portofolio_pelamar' => $portofolio,
            'dokumen_pendukung' => $dokumenPendukung,
            'foto_pelamar' => $foto
        ]);

        // Ambil response reCAPTCHA dari POST
        $response = $this->request->getPost('g-recaptcha-response');

        // Secret Key Anda
        $secret_key = '6LeNtIYqAAAAAMfWN6Uv8sEGeDNvpmeF0UVu31N6';

        // Verifikasi reCAPTCHA
        if (!$response || !verify_recaptcha($secret_key, $response)) {
            return redirect()->back()->withInput()->with('errors', ['captcha' => 'Verifikasi reCAPTCHA gagal. Silakan coba lagi.']);
        }


        // Dapatkan ID pelamar yang baru saja disimpan
        $id = $this->pelamarModel->insertID();

        // Ambil data pelamar berdasarkan ID
        $pelamarModel = new pelamarModel();
        $pelamar = $pelamarModel->find($id);

        // Pastikan data pelamar berhasil ditemukan sebelum melanjutkan
        if ($pelamar) {
            $nama = $pelamar['nama_pelamar'];
            $noHp = $pelamar['no_hp'];
            $posisi = $pelamar['posisi'];

            // Buat pesan yang dipersonalisasi
            $message = "Halo $nama,

Terima kasih atas minat Anda untuk bergabung dengan AMIN'S PROJECT TEKNOLOGI INDONESIA. Kami dengan senang hati menginformasikan bahwa lamaran Anda untuk posisi $posisi telah berhasil kami terima.

Tim kami saat ini sedang melakukan proses peninjauan lamaran. Kami akan menghubungi Anda kembali melalui email atau telepon jika Anda lolos ke tahap berikutnya. 

Jika Anda membutuhkan informasi lebih lanjut atau memiliki pertanyaan, jangan ragu untuk menghubungi kami melalui kontak berikut: +62xxxxx.

Terima kasih atas perhatian Anda. Kami menghargai waktu dan usaha yang telah Anda luangkan untuk melamar di perusahaan kami.

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
        } else {
            // Jika data pelamar tidak ditemukan, log error
            log_message('error', "Data pelamar dengan ID $id tidak ditemukan.");
        }

        session()->setFlashdata('pesan_save', "Lamaran berhasil terkirim");

        return  redirect()->to('/');
    }

    private function validateWhatsAppNumber($noHp)
    {
        $curl = \Config\Services::curlrequest();
        $apiKey = 'NKo5H1vfA3YbC3NkzaVo';
        $apiUrl = 'https://api.fonnte.com/validate';

        try {
            $response = $curl->request('POST', $apiUrl, [
                'form_params' => [
                    'target' => $noHp,
                    'countryCode' => '62',
                ],
                'headers' => [
                    'Authorization' => $apiKey,
                ],
            ]);

            // Debug response API
            log_message('debug', "API Response: " . $response->getBody());

            // Validasi status respons
            if ($response->getStatusCode() === 200) {
                $result = json_decode($response->getBody(), true);

                // Periksa apakah decoding JSON berhasil
                if (json_last_error() !== JSON_ERROR_NONE) {
                    log_message('error', "JSON Decode Error: " . json_last_error_msg());
                    return false;
                }

                // Periksa apakah nomor ada di daftar "registered"
                return isset($result['registered']) && in_array($noHp, $result['registered']);
            }

            log_message('error', "Fonnte API Error: Unexpected HTTP status " . $response->getStatusCode());
            return false;
        } catch (\Exception $e) {
            log_message('error', "Fonnte API Exception: " . $e->getMessage());
            return false;
        }
    }
}
