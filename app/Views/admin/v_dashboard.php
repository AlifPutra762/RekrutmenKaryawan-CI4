<?= $this->extend('templates/v_sidebar'); ?>

<?= $this->section('contentadmin'); ?>
<!--begin::App Main-->
<main class="app-main"> <!--begin::App Content Header-->
    <div class="app-content-header"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Dashboard</h3>
                </div>
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content"> <!--begin::Container-->
        <div class="container-fluid"> <!--begin::Row-->
            <div class="row"> <!--begin::Col-->
                <div class="col-lg-3 col-6"> <!-- Begin::Small Box Widget 1 -->
                    <div class="small-box text-bg-primary">
                        <div class="inner">
                            <h3><?= $jumlahPelamar; ?></h3>
                            <p>Daftar Pelamar</p>
                        </div>
                        <!-- House icon representing "Daftar Pelamar" -->
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M8 3.293l5 5V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8.293l5-5z" />
                        </svg>
                        <a href="/daftarpelamar" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div> <!-- End::Col -->


                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 2-->
                    <div class="small-box text-bg-success">
                        <div class="inner">
                            <h3><?= $jumlahDiterima; ?></h3>
                            <p>Pelamar Diterima</p>
                        </div>
                        <!-- Checkmark icon representing "Pelamar Diterima" -->
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M12.293 4.293a1 1 0 0 0-1.414 0L6 9.586 4.707 8.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l6-6a1 1 0 0 0 0-1.414z" />
                        </svg>
                        <a href="/pelamarditerima" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div>
                </div> <!--end::Col-->

                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 3-->
                    <div class="small-box text-bg-danger">
                        <div class="inner">
                            <h3><?= $jumlahDitolak; ?></h3>
                            <p>Pelamar Ditolak</p>
                        </div>
                        <!-- X (Reject) icon representing "Pelamar Ditolak" -->
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 6.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 7l2.647 2.646a.5.5 0 0 1-.708.708L8 7.707 5.354 10.354a.5.5 0 0 1-.708-.708L7.293 7 4.646 4.354a.5.5 0 0 1 0-.708z" />
                        </svg>
                        <a href="/pelamarditolak" class="text-white small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div> <!--end::Small Box Widget 3-->
                </div> <!--end::Col-->

                <div class="col-lg-3 col-6"> <!--begin::Small Box Widget 4-->
                    <div class="small-box text-bg-info">
                        <div class="inner text-white">
                            <h3><?= $jumlahPosisi; ?></h3>
                            <p>Daftar Lowongan</p>
                        </div>
                        <!-- Clipboard icon representing "Daftar Lowongan Pekerjaan" -->
                        <svg class="small-box-icon" fill="currentColor" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path d="M9 2a1 1 0 0 1 1 1v11a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h5zM5 3v11h4V3H5z" />
                        </svg>
                        <a href="/daftarlowongan" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                            More info <i class="bi bi-link-45deg"></i>
                        </a>
                    </div> <!--end::Small Box Widget 4-->
                </div> <!--end::Col-->
            </div> <!--end::Row-->
        </div> <!--end::Container-->
    </div> <!--end::App Content-->
</main> <!--end::App Main-->

<?= $this->endSection(); ?>