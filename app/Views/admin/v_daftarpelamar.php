<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<main class="app-main">
    <!-- Begin: Dashboard Header -->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <!-- Title on the left -->
                <div class="col-sm-6">
                    <h3 class="mb-0">Daftar Pelamar</h3>
                </div>
                <!-- Button on the right -->
                <div class="col-sm-6 text-end">
                    <a href="pelamar/v_tambahpelamar" class="btn btn-primary">Tambah Data</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Begin: Alert Messages -->
    <div class="container-fluid mb-3">
        <?php if (session()->getFlashdata('pesan_save')) : ?>
            <div class="alert alert-success" role="alert">
                Lamaran berhasil terkirim
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_delete')) : ?>
            <div class="alert alert-success" role="alert">
                Data Lamaran berhasil dihapus
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_update')) : ?>
            <div class="alert alert-success" role="alert">
                Data Lamaran berhasil diubah
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_wawancara')) : ?>
            <div class="alert alert-success" role="alert">
                Data Lamaran masuk ke Data Wawancara
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_terima')) : ?>
            <div class="alert alert-success" role="alert">
                Lamaran diterima
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('pesan_tolak')) : ?>
            <div class="alert alert-success" role="alert">
                Lamaran ditolak
            </div>
        <?php endif; ?>
    </div>

    <!-- Begin: Card for Table Content -->
    <div class="card mx-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama atau posisi pelamar.." name="keyword">
                    <button class="btn btn-outline-secondary" type="submit" name="submit">Cari</button>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table table-bordered text-center table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th scope="col" class="align-middle">Nomor</th>
                            <th scope="col" class="align-middle">Foto</th>
                            <th scope="col" class="align-middle">Nama</th>
                            <th scope="col" class="align-middle">No. Hp</th>
                            <th scope="col" class="align-middle">Posisi</th>
                            <th scope="col" class="align-middle">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 + (5 * ($currentPage - 1)) ?>
                        <?php foreach ($pelamar as $plmr) : ?>
                            <tr>
                                <th scope="row" class="align-middle"><?= $i++; ?></th>
                                <td class="align-middle">
                                    <img src="/foto_pelamar/<?= $plmr['foto_pelamar']; ?>" alt="Foto Pelamar" width="50">
                                </td>
                                <td class="align-middle"><?= $plmr['nama_pelamar']; ?></td>
                                <td class="align-middle"><?= $plmr['no_hp']; ?></td>
                                <td class="align-middle"><?= $plmr['posisi']; ?></td>
                                <td class="align-middle">
                                    <!-- Detail Button with Popover -->
                                    <a href="<?= base_url('daftarpelamar/' . $plmr['slug']); ?>" class="btn btn-info btn-sm"
                                        data-bs-toggle="popover" title="Detail" data-bs-content="Lihat detail pelamar">
                                        <i class="bi bi-eye"></i>
                                    </a>

                                    <!-- Wawancara Button with Popover -->
                                    <a href="<?= base_url('pelamar/wawancara/' . $plmr['id_pelamar']); ?>" class="btn btn-success btn-sm"
                                        data-bs-toggle="popover" title="Wawancara" data-bs-content="Jadwalkan wawancara dengan pelamar">
                                        <i class="bi bi-clipboard-check"></i>
                                    </a>

                                    <!-- Tolak Button with Popover -->
                                    <a href="<?= base_url('pelamar/tolak/' . $plmr['id_pelamar']); ?>" class="btn btn-danger btn-sm"
                                        data-bs-toggle="popover" title="Tolak" data-bs-content="Tolak pelamar ini dari proses">
                                        <i class="bi bi-x-circle"></i>
                                    </a>
                                </td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links() ?>
            </div>
        </div>
    </div>
</main>


<?= $this->endSection(); ?>