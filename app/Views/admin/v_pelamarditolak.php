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
                            <h3 class="mb-0">Pelamar Ditolak</h3>
                        </div>
                        <!-- Button on the right -->
                        <div class="col-sm-6 text-end">
                            <a href="<?= base_url('pelamar/sendtolak') ?>"
                                class="btn btn-primary"
                                onclick="return confirm('Apakah Anda yakin ingin mengirim pesan ke semua pelamar?')">
                                Kirim Pesan
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card for the Table -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan_delete')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Pelamar berhasil dihapus!
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered text-center">
                            <thead class="table-danger">
                                <tr>
                                    <th scope="col" class="align-middle">Nomor</th>
                                    <th scope="col" class="align-middle">Foto Pelamar</th>
                                    <th scope="col" class="align-middle">Nama Pelamar</th>
                                    <th scope="col" class="align-middle">Posisi Dilamar</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($tolak as $tlk) : ?>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $i++; ?></th>
                                        <td class="align-middle">
                                            <img src="/foto_pelamar/<?= $tlk['foto_pelamar']; ?>" alt="" width="50" class="foto">
                                        </td>
                                        <td class="align-middle"><?= $tlk['nama_pelamar']; ?></td>
                                        <td class="align-middle"><?= $tlk['posisi']; ?></td>
                                        <td class="align-middle">
                                            <form action="/ditolak/<?= $tlk['id_pelamar']; ?>" method="post">
                                                <?= csrf_field(); ?>
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus data?');">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>