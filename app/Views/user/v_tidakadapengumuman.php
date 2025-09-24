<?= $this->extend('templates/v_navbar'); ?>

<?= $this->section('contentuser'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <section class="bg-primary text-white text-center py-5">
                <div class="container">
                    <h1 class="display-4">Pengumuman Lolos Lamaran</h1>
                    <p class="lead">Berikut adalah hasil seleksi lamaran untuk posisi yang tersedia di Amin’s Project Teknologi Indonesia.</p>
                </div>
            </section>

            <!-- Pengumuman Section -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Hasil Seleksi Pelamar</h2>

                    <!-- Table for Accepted Applicants -->
                    <h1 class="text-center"> Belum Ada Pengumuman</h1>
                    <!-- Additional Information -->
                    <div class="alert alert-info" role="alert">
                        <strong>Catatan:</strong>
                        <ul>
                            <li>Jika Anda merasa telah lolos namun tidak tercantum di daftar ini, harap menghubungi tim HRD kami untuk klarifikasi lebih lanjut.</li>
                            <li><strong>Semangat!</strong> untuk yang belum lolos. Meskipun kali ini Anda belum berhasil, jangan menyerah! Kami mengapresiasi usaha Anda dan semoga sukses di kesempatan berikutnya. Terus berkembang dan berjuang!</li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?= $this->endSection(); ?>