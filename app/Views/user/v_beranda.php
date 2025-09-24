<?= $this->extend('templates/v_navbar'); ?>

<?= $this->section('contentuser'); ?>

<div class="container my-5">
    <?php if (session()->getFlashdata('pesan_save')) : ?>
        <div class="alert alert-success" role="alert">
            Lamaran berhasil terkirim
        </div>
    <?php endif; ?>
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-12 col-sm-8 col-lg-6 text-center">
            <img src="<?= base_url('amins-logo.png'); ?>" class="d-block mx-auto img-fluid rounded shadow" alt="" width="300" height="200" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h2 class="text-primary fw-bold lh-1 mb-3">Selamat datang di Amin's Project Teknologi Indonesia</h2>
            <p class="lead">Temukan lowongan pekerjaan yang sesuai dengan passion kamu dan bergabunglah bersama kami untuk masa depan yang lebih baik.</p>
        </div>
    </div>

    <div class="container mt-5">
        <h3 class="text-center mb-4 text-secondary">Lowongan Pekerjaan</h3>
        <?php foreach ($posisi as $pss) : ?>
            <!-- Card -->
            <a href="#" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#modal<?= $pss['id_posisi']; ?>">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><?= $pss['posisi']; ?></h5>
                    </div>
                    <div class="card-body">
                        <p class="card-text text-muted">
                            <?= word_limiter($pss['deskripsi'], 10); ?>
                        </p>
                    </div>
                </div>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="modal<?= $pss['id_posisi']; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $pss['id_posisi']; ?>" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?= $pss['id_posisi']; ?>"><?= $pss['posisi']; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $pss['deskripsi']; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<?= $this->endSection(); ?>