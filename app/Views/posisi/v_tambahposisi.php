<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/daftarlowongan" class="btn btn-success my-3">Kembali ke Daftar Lowongan</a>
                <h2>Form Tambah Data Posisi</h2>
                <form action="<?= base_url('posisi/save'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" placeholder="Contoh : Admin" class="form-control <?= session('errors') && isset(session('errors')['posisi']) ? 'is-invalid' : ''; ?>" id="posisi" name="posisi" autofocus value="<?= old('posisi'); ?>">
                        <?php if (session('errors') && isset(session('errors')['posisi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors')['posisi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea placeholder="Beri deskripsi" class="form-control <?= session('errors') && isset(session('errors')['deskripsi']) ? 'is-invalid' : ''; ?>"
                            id="deskripsi" name="deskripsi" autofocus><?= old('deskripsi'); ?></textarea>
                        <?php if (session('errors') && isset(session('errors')['deskripsi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors')['deskripsi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>