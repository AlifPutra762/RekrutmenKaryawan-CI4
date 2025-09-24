<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <div class="container">
        <h1 class="mt-4 mb-4 text-center">Detail Pelamar</h1>

        <!-- Button Kembali, Edit, dan Delete -->
        <div class="d-flex justify-content-start mb-4">
            <a href="/daftarpelamar" class="btn btn-secondary me-3">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Pelamar
            </a>

            <a href="/pelamar/edit/<?= $pelamar['slug']; ?>" class="btn btn-warning me-3">
                <i class="bi bi-pencil-square"></i> Edit
            </a>

            <form action="/pelamar/<?= $pelamar['id_pelamar']; ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>

        <!-- Card Detail Pelamar -->
        <div class="card mb-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="/foto_pelamar/<?= htmlspecialchars($pelamar['foto_pelamar'] ?? 'default.jpg', ENT_QUOTES, 'UTF-8'); ?>"
                        class="img-fluid rounded"
                        alt="<?= htmlspecialchars($pelamar['nama_pelamar'] ?? 'Foto Pelamar', ENT_QUOTES, 'UTF-8'); ?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="card-text"><strong>Nama Pelamar:</strong> <?= htmlspecialchars($pelamar['nama_pelamar'] ?? 'Data tidak tersedia', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>Email Pelamar:</strong> <?= htmlspecialchars($pelamar['email_pelamar'] ?? 'Data tidak tersedia', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>No. Handphone:</strong> <?= htmlspecialchars($pelamar['no_hp'] ?? 'Data tidak tersedia', ENT_QUOTES, 'UTF-8'); ?></p>
                        <p class="card-text"><strong>Posisi Dilamar:</strong> <?= htmlspecialchars($pelamar['posisi'] ?? 'Data tidak tersedia', ENT_QUOTES, 'UTF-8'); ?></p>
                    </div>
                </div>
            </div>
        </div>


        <!-- CV, Portofolio, dan Dokumen Pendukung -->
        <div class="row g-4">
            <!-- CV Pelamar -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="mb-0">CV Pelamar</h5>
                    </div>
                    <div class="card-body p-0">
                        <iframe
                            src="<?= base_url('cv_pelamar/' . $pelamar['cv_pelamar']); ?>"
                            width="100%"
                            height="500"
                            style="border: none;"
                            title="CV Pelamar">
                        </iframe>
                    </div>
                </div>
            </div>

            <!-- Portofolio Pelamar -->
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="mb-0">Portofolio Pelamar</h5>
                    </div>
                    <div class="card-body p-0">
                        <iframe
                            src="<?= base_url('portofolio_pelamar/' . $pelamar['portofolio_pelamar']); ?>"
                            width="100%"
                            height="500"
                            style="border: none;"
                            title="Portofolio Pelamar">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-3">
            <!-- Dokumen Pendukung -->
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="mb-0">Dokumen Pendukung</h5>
                    </div>
                    <div class="card-body p-0">
                        <iframe
                            src="<?= base_url('dokumen_pendukung/' . $pelamar['dokumen_pendukung']); ?>"
                            width="100%"
                            height="500"
                            style="border: none;"
                            title="Dokumen Pendukung">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>