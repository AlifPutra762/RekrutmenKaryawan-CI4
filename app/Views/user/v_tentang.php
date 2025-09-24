<?= $this->extend('templates/v_navbar'); ?>

<?= $this->section('contentuser'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <!-- Header Section -->
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-12 col-sm-8 col-lg-6 text-center">
                    <img src="<?= base_url('amins-logo.png'); ?>" class="d-block mx-auto img-fluid rounded shadow" alt="" width="300" height="200" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h2 class="text-primary fw-bold lh-1 mb-3">AMINS PROJECT TEKNOLOGI INDOESIA</h2>
                    <p class="lead">Amin’s Project Teknologi Indonesia adalah sebuah bisnis yang bergerak dalam bidang, Software Developer, Riset Teknologi, Teknologi Informasi, Penjualan Perangkat Teknologi dan Multimedia Digital Creative yang berdiri pada tahun 2015. Seluruh bidang yang telah kami kerjakan dikemas dengan kreatif, ringan, namun sangat membantu dalam pengembangan bisnis serta perusahaan anda. Kami berkomitmen memberikan pelayanan sebaik mungkin demi hasil yang memuaskan.
                    </p>
                </div>
            </div>

            <!-- About Us Section -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Histori Kami</h2>
                    <p class="text-center">Amin’s Project Teknologi Indonesia adalah sebuah bisnis yang bergerak dalam bidang, Software Developer, Riset Teknologi, Teknologi Informasi, Penjualan Perangkat Teknologi dan Multimedia Digital Creative yang berdiri pada tahun 2015. Seluruh bidang yang telah kami kerjakan dikemas dengan kreatif, ringan, namun sangat membantu dalam pengembangan bisnis serta perusahaan anda. Kami berkomitmen memberikan pelayanan sebaik mungkin demi hasil yang memuaskan.</p>
                </div>
            </section>

            <!-- Vision and Mission Section -->
            <section class="bg-light py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h3>Visi</h3>
                            <p>Bekerja dengan hati adalah bekerja dengan menggunakan semua fasilitas yang dimiliki. Hati sebagai penggerak kehidupan akan besar sumbangannya untuk mendorong kami untuk bekerja lebih giat, keras, tak mudah menyerah dan cepat puas. Bekerja dalam kondisi psikologis yang mantap, doa yang istiqomah, hati tenang dan jiwa bersemangat dipastikan akan menghasilkan nilai lebih (value added) bagi capaian yang diharapkan.</p>
                        </div>
                        <div class="col-md-6">
                            <h3>Misi</h3>
                            <ul>
                                <li><strong>Amanah:</strong> Kami memegang teguh atas kepercayaan yang telah diberikan.</li>
                                <li><strong>Mutu:</strong> Kami terus berbenah untuk memberikan mutu produk serta pelayanan yang terbaik.</li>
                                <li><strong>Iman:</strong> Kami berpegang teguh atas keyakinan dan kepercayaan serta doa yang terus kita panjatkan.</li>
                                <li><strong>Nasionalis:</strong> Kami terus berkolaborasi dan bersinergi dengan sesama rekan kerja, Perusahaan, Birokrat, Lembaga, BUMN, dan masyarakat sekitar untuk memajukan negara Indonesia.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Services Section -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-4">Pelayanan Kami</h2>
                    <div class="row">
                        <!-- Service Cards -->
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-laptop display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Software Developer</h5>
                                    <p class="card-text">Kami merancang, mengelola, mengembangkan, menguji, hingga mengevaluasi perangkat lunak komputer dan mobile android/ios.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-check display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">IT Konsultan</h5>
                                    <p class="card-text">Membantu perusahaan, birokrasi atau perorangan untuk mengatasi masalah dan meningkatkan kinerja melalui teknologi.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-database display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Data Structuring</h5>
                                    <p class="card-text">Kami mengelola, menyimpan, dan mengatur data secara terstruktur pada sistem komputer atau database sehingga lebih mudah diakses.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-server display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Managed IT Services</h5>
                                    <p class="card-text">Layanan untuk mengelola sistem atau infrastruktur teknologi informasi yang mencakup pengelolaan dan pengembangan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-globe display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Web Development</h5>
                                    <p class="card-text">Layanan proses pembangunan, pengembangan dan pemeliharaan situs website serta sistem informasi sesuai dengan kebutuhan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-camera-reels display-4 text-primary mb-3"></i>
                                    <h5 class="card-title">Digital Creative</h5>
                                    <p class="card-text">Layanan yang bergerak dalam membuat strategi kreatif untuk membantu klien mencapai tujuan dengan proses kreatif di dalamnya.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>