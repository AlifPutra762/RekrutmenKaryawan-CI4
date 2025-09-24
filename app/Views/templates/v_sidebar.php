<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>

    <!-- Primary Meta Tags -->
    <meta name="author" content="ColorlibHQ">
    <meta name="description" content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords" content="bootstrap 5, admin dashboard, free admin template, colorlibhq, vanilla js">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/dist/css/adminlte.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <!-- Header -->
        <nav class="app-header navbar navbar-expand bg-body">
            <div class="container-fluid">
                <!-- Navbar Toggle -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                </ul>
                <!-- User Menu -->
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="<?= base_url(); ?>/assets/dist/assets/img/user2-160x160.jpg" class="user-image rounded-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline">Admin</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <li>
                                <a href="/logout" class="dropdown-item text-danger" style="font-size: 18px;">
                                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Sidebar -->
        <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
            <div class="sidebar-brand">
                <a href="" class="brand-link">
                    <img src="<?= base_url(); ?>/assets/dist/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow">
                    <span class="brand-text fw-light">Admin</span>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu">
                        <li class="nav-item">
                            <a href="/dashboard" class="nav-link <?= (uri_string() == 'dashboard') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-house-fill"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daftarpelamar" class="nav-link <?= (uri_string() == 'daftarpelamar') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-person-fill-add"></i>
                                <p>Daftar Pelamar</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/wawancara" class="nav-link <?= (uri_string() == 'wawancara') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-clipboard-check"></i>
                                <p>Wawancara</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelamarditerima" class="nav-link <?= (uri_string() == 'pelamarditerima') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-person-fill-check"></i>
                                <p>Pelamar Diterima</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/pelamarditolak" class="nav-link <?= (uri_string() == 'pelamarditolak') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-person-fill-x"></i>
                                <p>Pelamar Ditolak</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/daftarlowongan" class="nav-link <?= (uri_string() == 'daftarlowongan') ? 'active' : ''; ?>">
                                <i class="nav-icon bi bi-person-workspace"></i>
                                <p>Daftar Lowongan</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <?= $this->renderSection('contentadmin'); ?>

        <!-- Footer -->
        <footer class="app-footer">
            <strong>Copyright &copy; 2024</strong>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>/assets/dist/js/adminlte.min.js"></script>

    <script type="importmap">
        {
				"imports": {
					"ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.3.1/ckeditor5.js",
					"ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.3.1/"
				}
			}
		</script>

    <script type="module">
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph,
            Heading,
            List,
            Link,
            BlockQuote,
            Alignment,
            Underline,
            Highlight
        } from 'ckeditor5';

        ClassicEditor
            .create(document.querySelector('#deskripsi'), {
                plugins: [
                    Essentials, Bold, Italic, Font, Paragraph, Heading, List, Link, BlockQuote,
                    Alignment, Underline, Highlight
                ],
                toolbar: [
                    'undo', 'redo', '|',
                    'bold', 'italic', 'underline', 'highlight', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', '|',
                    'alignment', '|',
                    'numberedList', 'bulletedList', '|',
                    'link', 'blockQuote', '|',
                    'heading', '|',
                    'indent', 'outdent', '|',
                    'removeFormat'
                ]
            });
    </script>
</body>

</html>