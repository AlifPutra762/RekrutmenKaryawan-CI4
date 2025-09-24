<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>

<main class="app-main">

    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="mb-3"> Form Ubah Data Pelamar</h1>
                <form action="pelamar/update/<?= $pelamar['id_pelamar']; ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <input type="hidden" name="slug" value="<?= $pelamar['slug']; ?>">
                    <input type="hidden" name="fotoLama" value="<?= $pelamar['foto_pelamar']; ?>">
                    <input type="hidden" name="cvLama" value="<?= $pelamar['cv_pelamar']; ?>">
                    <input type="hidden" name="portoLama" value="<?= $pelamar['portofolio_pelamar']; ?>">
                    <input type="hidden" name="dokumenLama" value="<?= $pelamar['dokumen_pendukung']; ?>">
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control  <?= session('errors') && isset(session('errors')['nama_pelamar']) ? 'is-invalid' : ''; ?>" id="nama" name="nama_pelamar" autofocus value="<?= (old('nama_pelamar')) ? old('nama_pelamar') : $pelamar['nama_pelamar']; ?>">
                            <?php if (session('errors') && isset(session('errors')['nama_pelamar'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['nama_pelamar']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors') && isset(session('errors')['email_pelamar']) ? 'is-invalid' : ''; ?>" id="email" name="email_pelamar" autofocus value="<?= (old('email_pelamar')) ? old('email_pelamar') : $pelamar['email_pelamar']; ?>">
                            <?php if (session('errors') && isset(session('errors')['email_pelamar'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['email_pelamar']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="nohp" class="col-sm-2 col-form-label">No. Handphone</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors') && isset(session('errors')['no_hp']) ? 'is-invalid' : ''; ?>" id="nohp" name="no_hp" autofocus value="<?= (old('no_hp')) ? old('no_hp') : $pelamar['no_hp']; ?>">
                            <?php if (session('errors') && isset(session('errors')['no_hp'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['no_hp']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="posisi" class="col-sm-2 col-form-label">Posisi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= session('errors') && isset(session('errors')['posisi']) ? 'is-invalid' : ''; ?>" id="posisi" name="posisi" autofocus value="<?= (old('posisi')) ? old('posisi') : $pelamar['posisi']; ?>">
                            <?php if (session('errors') && isset(session('errors')['posisi'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['posisi']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="cv_pelamar" class="col-sm-2 col-form-label">CV Pelamar</label>
                        <div class="col-sm-10">
                            <input class="form-control <?= session('errors') && isset(session('errors')['cv_pelamar']) ? 'is-invalid' : ''; ?>" id="cv_pelamar" name="cv_pelamar" autofocus value="<?= old('cv_pelamar'); ?>" type="file">
                            <?php if (session('errors') && isset(session('errors')['cv_pelamar'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['cv_pelamar']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="portofolio_pelamar" class="col-sm-2 col-form-label">Portofolio Pelamar</label>
                        <div class="col-sm-10">
                            <input class="form-control <?= session('errors') && isset(session('errors')['portofolio_pelamar']) ? 'is-invalid' : ''; ?>" id="portofolio_pelamar" name="portofolio_pelamar" autofocus value="<?= old('portofolio_pelamar'); ?>" type="file">
                            <?php if (session('errors') && isset(session('errors')['portofolio_pelamar'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['portofolio_pelamar']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="dokumen_pendukung" class="col-sm-2 col-form-label">Dokumen Pendukung</label>
                        <div class="col-sm-10">
                            <input class="form-control <?= session('errors') && isset(session('errors')['dokumen_pendukung']) ? 'is-invalid' : ''; ?>" id="dokumen_pendukung" name="dokumen_pendukung" autofocus value="<?= old('dokumen_pendukung'); ?>" type="file">
                            <?php if (session('errors') && isset(session('errors')['dokumen_pendukung'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['dokumen_pendukung']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="foto_pelamar" class="col-sm-2 col-form-label">Foto Diri</label>
                        <div class="col-sm-10">
                            <input class="form-control <?= session('errors') && isset(session('errors')['foto_pelamar']) ? 'is-invalid' : ''; ?>" id="foto_pelamar" name="foto_pelamar" autofocus value="<?= old('foto_pelamar'); ?>" type="file">
                            <?php if (session('errors') && isset(session('errors')['foto_pelamar'])): ?>
                                <div class="invalid-feedback">
                                    <?= esc(session('errors')['foto_pelamar']) ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </form>
            </div>
        </div>
    </div>
</main>

<?= $this->endSection(); ?>