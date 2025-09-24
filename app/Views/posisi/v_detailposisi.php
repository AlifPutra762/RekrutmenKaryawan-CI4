<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <a href="/daftarlowongan" class="btn btn-success">Kembali ke Daftar Lowongan</a>
                <h1 class="my-3">Detail Posisi</h1>
                <div class="card mb-3">
                    <h5 class="card-header"><?= $posisi['posisi']; ?></h5>
                    <div class="card-body">
                        <p class="card-text"><?= $posisi['deskripsi']; ?></p>
                    </div>
                </div>

                <a href="/posisi/edit/<?= $posisi['slug']; ?>" class="btn btn-warning">Edit</a>

                <form action="/posisi/<?= $posisi['id_posisi']; ?>" method="post" class="d-inline">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="_method" value="DELETE">
                    <button type="submit" class="btn btn-danger" onclick="return confirm ('Yakin ingin menghapus data?');">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>