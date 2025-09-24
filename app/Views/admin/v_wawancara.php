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
                            <h3 class="mb-0">Wawancara</h3>
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
                                Data Wawancara berhasil dihapus!
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('pesan_terima')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Wawancara diterima!
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('pesan_tolak')) : ?>
                            <div class="alert alert-success" role="alert">
                                Data Wawancara masuk daftar tolak!
                            </div>
                        <?php endif; ?>
                        <table class="table table-bordered text-center">
                            <thead class="table-info">
                                <tr>
                                    <th scope="col" class="align-middle">Nomor</th>
                                    <th scope="col" class="align-middle">Foto Pelamar</th>
                                    <th scope="col" class="align-middle">Nama Pelamar</th>
                                    <th scope="col" class="align-middle">Posisi Dilamar</th>
                                    <th scope="col" class="align-middle">Tanggal Wawancara</th>
                                    <th scope="col" class="align-middle">Waktu Wawancara</th>
                                    <th scope="col" class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 ?>
                            <?php foreach ($wawancara as $w) : ?>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="align-middle"><?= $i++; ?></th>
                                        <td class="align-middle">
                                            <img src="/foto_pelamar/<?= $w['foto_pelamar']; ?>" alt="" width="50" class="foto">
                                        </td>
                                        <td class="align-middle"><?= $w['nama_pelamar']; ?></td>
                                        <td class="align-middle"><?= $w['posisi']; ?></td>
                                        <td class="align-middle"><?= $w['tanggal']; ?></td>
                                        <td class="align-middle"><?= $w['waktu']; ?></td>
                                        <td class="align-middle text-center">
                                            <!-- Dropdown Aksi -->
                                            <div class="dropdown">
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="bi bi-gear"></i> Aksi
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <!-- Tombol Edit -->
                                                    <li>
                                                        <a href="#" class="dropdown-item text-warning" data-bs-toggle="modal" data-bs-target="#modalEdit<?= $w['id_pelamar']; ?>">
                                                            <i class="bi bi-pencil-square"></i> Edit
                                                        </a>
                                                    </li>

                                                    <!-- Tombol Terima -->
                                                    <li>
                                                        <a href="<?= base_url('wawancara/terima/' . $w['id_pelamar']); ?>" class="dropdown-item text-success">
                                                            <i class="bi bi-check-circle text-success"></i> Terima
                                                        </a>
                                                    </li>

                                                    <!-- Tombol Tolak -->
                                                    <li>
                                                        <a href="<?= base_url('wawancara/tolak/' . $w['id_pelamar']); ?>" class="dropdown-item text-danger">
                                                            <i class="bi bi-x-circle text-danger"></i> Tolak
                                                        </a>
                                                    </li>

                                                    <!-- Form Hapus Data -->
                                                    <li>
                                                        <form action="/wawancara/<?= $w['id_pelamar']; ?>" method="post" class="d-inline">
                                                            <?= csrf_field(); ?>
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Yakin ingin menghapus data?');">
                                                                <i class="bi bi-trash"></i> Hapus
                                                            </button>
                                                        </form>
                                                    </li>

                                                    <!-- Form Kirim Pesan -->
                                                    <li>
                                                        <form action="<?= base_url('/wawancara/sendterima/' . $w['id_pelamar']); ?>" method="get" class="d-inline">
                                                            <button type="submit" class="dropdown-item text-info">
                                                                <i class="bi bi-send"></i> Kirim Pesan
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                            <!-- Modal Edit -->
                                            <div class="modal fade" id="modalEdit<?= $w['id_pelamar']; ?>" tabindex="-1" aria-labelledby="modalEditLabel<?= $w['id_pelamar']; ?>" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalEditLabel<?= $w['id_pelamar']; ?>">Edit Tanggal dan Waktu Wawancara</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/wawancara/update/<?= $w['id_pelamar']; ?>" method="POST" enctype="multipart/form-data">
                                                                <?= csrf_field(); ?>
                                                                <div class="mb-3">
                                                                    <label for="tanggal" class="form-label">Tanggal</label>
                                                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                                                        value="<?= !empty($w['tanggal']) ? $w['tanggal'] : ''; ?>" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="waktu" class="form-label">Waktu</label>
                                                                    <input type="time" class="form-control" id="waktu" name="waktu"
                                                                        value="<?= !empty($w['waktu']) ? $w['waktu'] : ''; ?>" required>
                                                                </div>
                                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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