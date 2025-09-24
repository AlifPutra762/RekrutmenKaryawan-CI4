<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <div class="container">
        <div class="row">
            <div class="col">
                <a href="/daftarlowongan" class="btn btn-success my-3">Kembali ke Daftar Lowongan</a>
                <h2>Form Ubah Data Posisi</h2>
                <form action="posisi/update/<?= $posisi['id_posisi']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $posisi['slug']; ?>">
                    <div class="mb-3">
                        <label for="posisi" class="form-label">Posisi</label>
                        <input type="text" class="form-control <?= session('errors') && isset(session('errors')['posisi']) ? 'is-invalid' : ''; ?>" id="posisi" name="posisi" autofocus value="<?= (old('posisi')) ? old('posisi') : $posisi['posisi']; ?>">
                        <?php if (session('errors') && isset(session('errors')['posisi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors')['posisi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control <?= session('errors') && isset(session('errors')['deskripsi']) ? 'is-invalid' : ''; ?>"
                            id="deskripsi" name="deskripsi" autofocus><?= (old('deskripsi')) ? old('deskripsi') : $posisi['deskripsi']; ?></textarea>
                        <?php if (session('errors') && isset(session('errors')['deskripsi'])): ?>
                            <div class="invalid-feedback">
                                <?= esc(session('errors')['deskripsi']) ?>
                            </div>
                        <?php endif; ?>
                    </div>


                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>