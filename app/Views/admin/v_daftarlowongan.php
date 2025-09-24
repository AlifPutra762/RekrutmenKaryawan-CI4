<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <div class="container">
        <div class="row">

            <!-- Begin: Dashboard Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Title on the left -->
                        <div class="col-sm-6">
                            <h3 class="mb-0">Daftar Lowongan</h3>
                        </div>
                        <!-- Button on the right -->
                        <div class="col-sm-6 text-end">
                            <a href="posisi/v_tambahposisi" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for the Table -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan_save_posisi')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Posisi berhasil ditambah
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('pesan_delete_posisi')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Posisi berhasil dihapus
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('pesan_update_posisi')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Posisi berhasil diubah
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered text-center table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">Nomor</th>
                                    <th scope="col" class="align-middle">Posisi</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($posisi as $p): ?>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $i++; ?></th>
                                        <td class="align-middle"><?= $p['posisi']; ?></td>
                                        <td class="align-middle">
                                            <a href="/daftarlowongan/<?= $p['slug']; ?>" class="btn btn-info">Detail</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>