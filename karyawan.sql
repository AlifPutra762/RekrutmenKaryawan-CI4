-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2025 at 04:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyawan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_activation_attempts`
--

CREATE TABLE `auth_activation_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_permissions`
--

CREATE TABLE `auth_groups_permissions` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups_users`
--

CREATE TABLE `auth_groups_users` (
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_logins`
--

CREATE TABLE `auth_logins` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `auth_logins`
--

INSERT INTO `auth_logins` (`id`, `ip_address`, `email`, `user_id`, `date`, `success`) VALUES
(2, '::1', 'admin123@gmail.com', 3, '2024-10-29 06:17:08', 1),
(3, '::1', 'admin123@gmail.com', 3, '2024-10-29 07:55:31', 1),
(4, '::1', 'admin123@gmail.com', 3, '2024-10-29 08:06:48', 1),
(5, '::1', 'admin123@gmail.com', 3, '2024-10-29 08:09:18', 1),
(6, '::1', 'admin123@gmail.com', 3, '2024-10-29 08:35:55', 1),
(7, '::1', 'admin123@gmail.com', 3, '2024-10-30 02:52:53', 1),
(8, '::1', 'admin123@gmail.com', 3, '2024-10-30 02:53:07', 1),
(9, '::1', 'admin123@gmail.com', 3, '2024-10-30 04:43:02', 1),
(10, '::1', 'admin123@gmail.com', 3, '2024-10-30 05:37:12', 1),
(11, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:19:02', 1),
(12, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:26:25', 1),
(13, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:26:49', 1),
(14, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:27:42', 1),
(15, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:35:48', 1),
(16, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:37:32', 1),
(17, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:46:43', 1),
(18, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:47:27', 1),
(19, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:47:55', 1),
(20, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:49:04', 1),
(21, '::1', 'admin123@gmail.com', 3, '2024-10-30 06:50:38', 1),
(22, '::1', 'admin123@gmail.com', 3, '2024-10-31 08:51:39', 1),
(23, '::1', 'admin123@gmail.com', 3, '2024-11-04 02:21:36', 1),
(24, '::1', 'admin123@gmail.com', 3, '2024-11-04 02:53:19', 1),
(25, '::1', 'admin123@gmail.com', 3, '2024-11-04 06:24:37', 1),
(26, '::1', 'admin123@gmail.com', 3, '2024-11-05 02:12:07', 1),
(27, '::1', 'admin123@gmail.com', 3, '2024-11-05 06:45:45', 1),
(28, '::1', 'admin123@gmail.com', 3, '2024-11-06 02:08:27', 1),
(29, '::1', 'admin123@gmail.com', 3, '2024-11-06 02:12:01', 1),
(30, '::1', 'admin123@gmail.com', 3, '2024-11-06 12:54:41', 1),
(31, '::1', 'admin123@gmail.com', 3, '2024-11-07 00:03:32', 1),
(32, '::1', 'admin123@gmail.com', 3, '2024-11-07 02:32:08', 1),
(33, '::1', 'admin123@gmail.com', 3, '2024-11-07 06:37:37', 1),
(34, '::1', 'admin123@gmail.com', 3, '2024-11-08 02:37:40', 1),
(35, '::1', 'admin123@gmail.com', 3, '2024-11-08 08:47:30', 1),
(36, '::1', 'admin123@gmail.com', 3, '2024-11-09 02:21:56', 1),
(37, '::1', 'admin123@gmail.com', 3, '2024-11-11 02:31:01', 1),
(38, '::1', 'admin123@gmail.com', 3, '2024-11-11 07:22:47', 1),
(39, '::1', 'admin123@gmail.com', 3, '2024-11-11 09:55:45', 1),
(40, '::1', 'admin123@gmail.com', 3, '2024-11-12 04:25:33', 1),
(41, '::1', 'admin123@gmail.com', 3, '2024-11-12 05:58:06', 1),
(42, '::1', 'admin123@gmail.com', 3, '2024-11-12 06:42:05', 1),
(43, '::1', 'admin123@gmail.com', 3, '2024-11-12 07:09:25', 1),
(44, '::1', 'admin123@gmail.com', 3, '2024-11-13 03:07:23', 1),
(45, '::1', 'admin123@gmail.com', 3, '2024-11-13 05:51:10', 1),
(46, '::1', 'admin123@gmail.com', 3, '2024-11-13 08:57:22', 1),
(47, '::1', 'admin123@gmail.com', 3, '2024-11-13 08:57:58', 1),
(48, '::1', 'admin123@gmail.com', 3, '2024-11-14 03:26:53', 1),
(49, '::1', 'admin123@gmail.com', 3, '2024-11-14 13:03:51', 1),
(50, '::1', 'admin123@gmail.com', 3, '2024-11-15 06:31:16', 1),
(51, '::1', 'admin123@gmail.com', 3, '2024-11-15 06:38:19', 1),
(52, '::1', 'admin123@gmail.com', 3, '2024-11-15 06:42:00', 1),
(53, '::1', 'admin123@gmail.com', 3, '2024-11-15 06:44:19', 1),
(54, '::1', 'admin123@gmail.com', 3, '2024-11-15 07:52:04', 1),
(55, '::1', 'admin123@gmail.com', 3, '2024-11-15 08:27:57', 1),
(56, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:13:10', 1),
(57, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:22:02', 1),
(58, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:23:11', 1),
(59, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:26:42', 1),
(60, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:29:17', 1),
(61, '::1', 'admin123@gmail.com', 3, '2024-11-16 06:39:24', 1),
(62, '::1', 'admin123@gmail.com', 3, '2024-11-16 13:22:26', 1),
(63, '::1', 'admin123@gmail.com', 3, '2024-11-18 02:12:25', 1),
(64, '::1', 'admin123@gmail.com', 3, '2024-11-18 04:16:54', 1),
(65, '::1', 'admin123@gmail.com', 3, '2024-11-18 04:22:59', 1),
(66, '::1', 'admin123@gmail.com', 3, '2024-11-19 02:27:23', 1),
(67, '::1', 'admin123@gmail.com', 3, '2024-11-19 05:33:59', 1),
(68, '::1', 'admin123@gmail.com', 3, '2024-11-19 07:29:26', 1),
(69, '::1', 'admin123@gmail.com', 3, '2024-11-20 02:28:00', 1),
(70, '::1', 'admin123@gmail.com', 3, '2024-11-20 02:28:25', 1),
(71, '::1', 'admin123@gmail.com', 3, '2024-11-20 09:31:23', 1),
(72, '::1', 'admin123@gmail.com', 3, '2024-11-20 10:51:28', 1),
(73, '::1', 'admin123@gmail.com', 3, '2024-11-21 06:05:21', 1),
(74, '::1', 'admin123@gmail.com', 3, '2024-11-22 04:05:42', 1),
(75, '::1', 'admin123@gmail.com', 3, '2024-11-22 07:10:46', 1),
(76, '::1', 'admin123@gmail.com', 3, '2024-11-22 08:15:41', 1),
(77, '::1', 'admin123@gmail.com', 3, '2024-11-22 22:20:45', 1),
(78, '::1', 'admin123@gmail.com', 3, '2024-11-23 00:49:57', 1),
(79, '::1', 'admin123@gmail.com', 3, '2024-11-25 03:37:28', 1),
(80, '::1', 'admin123@gmail.com', 3, '2024-12-11 16:31:55', 1),
(81, '::1', 'admin123@gmail.com', 3, '2024-12-14 13:25:40', 1),
(82, '::1', 'admin123@gmail.com', 3, '2024-12-14 13:30:57', 1),
(83, '::1', 'admin123@gmail.com', 3, '2024-12-14 13:36:58', 1),
(84, '::1', 'admin123@gmail.com', 3, '2024-12-18 09:14:53', 1),
(85, '::1', 'admin123@gmail.com', 3, '2024-12-26 14:40:13', 1),
(86, '::1', 'admin123@gmail.com', 3, '2024-12-26 17:59:24', 1),
(87, '::1', 'admin123@gmail.com', 3, '2024-12-27 02:06:02', 1),
(88, '::1', 'admin123@gmail.com', 3, '2025-01-02 05:31:29', 1),
(89, '::1', 'admin123@gmail.com', 3, '2025-01-04 09:53:34', 1),
(90, '::1', 'admin123@gmail.com', 3, '2025-02-04 07:46:06', 1),
(91, '::1', 'admin123@gmail.com', 3, '2025-02-04 07:50:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `auth_permissions`
--

CREATE TABLE `auth_permissions` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_reset_attempts`
--

CREATE TABLE `auth_reset_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `expires` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_users_permissions`
--

CREATE TABLE `auth_users_permissions` (
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0,
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2017-11-20-223112', 'Myth\\Auth\\Database\\Migrations\\CreateAuthTables', 'default', 'Myth\\Auth', 1730176529, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email_pelamar` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `cv_pelamar` varchar(255) NOT NULL,
  `portofolio_pelamar` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama_pelamar`, `slug`, `email_pelamar`, `no_hp`, `posisi`, `tanggal`, `waktu`, `cv_pelamar`, `portofolio_pelamar`, `dokumen_pendukung`, `foto_pelamar`, `created_at`, `updated_at`) VALUES
(80, 'Dzaki', 'dzaki', 'dzaki@gmail.com', '+6285141237650', 'Data Analsyt', NULL, NULL, '1735236537_01bd5f25fc24e7e74578.pdf', '1735236537_9a3d8f741747258b0ec5.pdf', '1735236537_272231a5755be8809f81.pdf', '1735236537_2191eaa3e68f97c6de47.png', '2024-12-26 18:08:57', '2024-12-26 18:08:57'),
(81, 'Dedi Gunawan', 'dedi-gunawan', 'dedi@gmail.com', '+6281466758150', 'Data Analsyt', NULL, NULL, '1735265974_6246d137b00d1336dd23.pdf', '1735265974_c481e025a463a5236a44.pdf', '1735265974_f3ee8134949299851b47.pdf', '1735265974_699b7b7e522653567c38.png', '2024-12-27 02:19:34', '2024-12-27 02:19:34'),
(82, 'Galuh', 'galuh', 'a@gmail.com', '+6281226289119', 'Data Analsyt', NULL, NULL, '1736840214_1c065a5a8b82dff45548.pdf', '1736840214_6cc6663e1d87d6a2b1cf.pdf', '1736840214_160a392f938c762718a1.pdf', '1736840214_24ca62cf9cb3dc23f65f.png', '2025-01-14 07:36:54', '2025-01-14 07:36:54');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar_diterima`
--

CREATE TABLE `pelamar_diterima` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email_pelamar` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `cv_pelamar` varchar(255) NOT NULL,
  `portofolio_pelamar` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar_diterima`
--

INSERT INTO `pelamar_diterima` (`id_pelamar`, `nama_pelamar`, `slug`, `email_pelamar`, `no_hp`, `posisi`, `tanggal`, `waktu`, `cv_pelamar`, `portofolio_pelamar`, `dokumen_pendukung`, `foto_pelamar`, `created_at`, `updated_at`) VALUES
(70, 'Dedi Gunawan', 'dedi-gunawan', 'dedi@gmail.com', '+6281466758150', 'Data Analsyt', '2024-12-27', '09:00:00', '1735265974_6246d137b00d1336dd23.pdf', '1735265974_c481e025a463a5236a44.pdf', '1735265974_f3ee8134949299851b47.pdf', '1735265974_699b7b7e522653567c38.png', '2024-12-27 02:22:01', '2024-12-27 02:22:01');

-- --------------------------------------------------------

--
-- Table structure for table `pelamar_ditolak`
--

CREATE TABLE `pelamar_ditolak` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email_pelamar` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `cv_pelamar` varchar(255) NOT NULL,
  `portofolio_pelamar` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelamar_ditolak`
--

INSERT INTO `pelamar_ditolak` (`id_pelamar`, `nama_pelamar`, `slug`, `email_pelamar`, `no_hp`, `posisi`, `tanggal`, `waktu`, `cv_pelamar`, `portofolio_pelamar`, `dokumen_pendukung`, `foto_pelamar`, `created_at`, `updated_at`) VALUES
(19, 'Dedi Gunawan', 'dedi-gunawan', 'dedi@gmail.com', '+6281466758150', 'Data Analsyt', NULL, NULL, '1735265974_6246d137b00d1336dd23.pdf', '1735265974_c481e025a463a5236a44.pdf', '1735265974_f3ee8134949299851b47.pdf', '1735265974_699b7b7e522653567c38.png', '2024-12-27 02:21:06', '2024-12-27 02:21:06');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `status` enum('on','off') DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `status`) VALUES
(1, 'off'),
(2, 'on');

-- --------------------------------------------------------

--
-- Table structure for table `posisi`
--

CREATE TABLE `posisi` (
  `id_posisi` int(11) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posisi`
--

INSERT INTO `posisi` (`id_posisi`, `posisi`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(2, 'Data Analsyt', 'data-analsyt', '<p><strong>Job Reqruitment :</strong></p><ol><li>Pria/Wanita</li><li>Pendidikan minimal SMA Sederajat</li><li>Jujur, Tekun, Disiplin, Taat Beribadah</li><li>Bertanggung jawab pada pekerjaan</li><li>Berkomunikasi dengan baik</li></ol><p><strong>Benefit :</strong></p><ol><li>Gaji Pokok</li><li>Bonus</li><li>Tunjangan</li><li>Makan Siang</li></ol><p>*Registrasi ditutup sewaktu-waktu apabila kuota terpenuhi</p>', NULL, '2024-11-16 16:51:22'),
(17, 'Accounting', 'accounting', '<p><strong>Job Reqruitment :</strong></p><ol><li>Pria/Wanita</li><li>Pendidikan minimal SMA Sederajat</li><li>Jujur, Tekun, Disiplin, Taat Beribadah</li><li>Bertanggung jawab pada pekerjaan</li><li>Berkomunikasi dengan baik</li></ol><p><strong>Benefit :</strong></p><ol><li>Gaji Pokok</li><li>Bonus</li><li>Tunjangan</li><li>Makan Siang</li></ol><p>*Registrasi ditutup sewaktu-waktu apabila kuota terpenuhi</p>', '2024-11-12 08:09:00', '2024-11-12 08:09:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `reset_hash` varchar(255) DEFAULT NULL,
  `reset_at` datetime DEFAULT NULL,
  `reset_expires` datetime DEFAULT NULL,
  `activate_hash` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `force_pass_reset` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password_hash`, `reset_hash`, `reset_at`, `reset_expires`, `activate_hash`, `status`, `status_message`, `active`, `force_pass_reset`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@gmail.com', 'admin', '$2y$10$uv9zfANhUI9dT04Bw7dJXe8zf6Kx2OFrwCDoIAanlYXgpzm5XLtLy', NULL, NULL, NULL, 'd0e7d7f18bf57bdc29404c7d130af222', NULL, NULL, 0, 0, '2024-10-29 05:21:29', '2024-10-29 05:21:29', NULL),
(2, 'alifputra070602@gmail.com', 'Alfi', '$2y$10$b/3JZbxR.Slmj8YXoWrcJubcDQZlBvFV.Y1mxYJSdD7hP43CnnkH.', NULL, NULL, NULL, '40ba1c17888ee927d93baa6572f4be67', NULL, NULL, 0, 0, '2024-10-29 05:28:02', '2024-10-29 05:28:02', NULL),
(3, 'admin123@gmail.com', 'username', '$2y$10$nUx1XlTg.oMLdTnqfSmXIellvPqr91/.gnuZRFK5lh.yJaG9k8HKW', NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, '2024-10-29 06:16:52', '2024-10-29 06:16:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wawancara`
--

CREATE TABLE `wawancara` (
  `id_pelamar` int(11) NOT NULL,
  `nama_pelamar` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `email_pelamar` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` time DEFAULT NULL,
  `cv_pelamar` varchar(255) NOT NULL,
  `portofolio_pelamar` varchar(255) NOT NULL,
  `dokumen_pendukung` varchar(255) NOT NULL,
  `foto_pelamar` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wawancara`
--

INSERT INTO `wawancara` (`id_pelamar`, `nama_pelamar`, `slug`, `email_pelamar`, `no_hp`, `posisi`, `tanggal`, `waktu`, `cv_pelamar`, `portofolio_pelamar`, `dokumen_pendukung`, `foto_pelamar`, `created_at`, `updated_at`) VALUES
(20, 'Dedi Gunawan', 'dedi-gunawan', 'dedi@gmail.com', '+6281466758150', 'Data Analsyt', '2024-12-27', '09:00:00', '1735265974_6246d137b00d1336dd23.pdf', '1735265974_c481e025a463a5236a44.pdf', '1735265974_f3ee8134949299851b47.pdf', '1735265974_699b7b7e522653567c38.png', NULL, NULL),
(21, 'Dzaki', 'dzaki', 'dzaki@gmail.com', '+6285141237650', 'Data Analsyt', NULL, NULL, '1735236537_01bd5f25fc24e7e74578.pdf', '1735236537_9a3d8f741747258b0ec5.pdf', '1735236537_272231a5755be8809f81.pdf', '1735236537_2191eaa3e68f97c6de47.png', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD KEY `auth_groups_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `group_id_permission_id` (`group_id`,`permission_id`);

--
-- Indexes for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD KEY `auth_groups_users_user_id_foreign` (`user_id`),
  ADD KEY `group_id_user_id` (`group_id`,`user_id`);

--
-- Indexes for table `auth_logins`
--
ALTER TABLE `auth_logins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `auth_tokens_user_id_foreign` (`user_id`),
  ADD KEY `selector` (`selector`);

--
-- Indexes for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD KEY `auth_users_permissions_permission_id_foreign` (`permission_id`),
  ADD KEY `user_id_permission_id` (`user_id`,`permission_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `pelamar_diterima`
--
ALTER TABLE `pelamar_diterima`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `pelamar_ditolak`
--
ALTER TABLE `pelamar_ditolak`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi`
--
ALTER TABLE `posisi`
  ADD PRIMARY KEY (`id_posisi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `wawancara`
--
ALTER TABLE `wawancara`
  ADD PRIMARY KEY (`id_pelamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_activation_attempts`
--
ALTER TABLE `auth_activation_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_logins`
--
ALTER TABLE `auth_logins`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `auth_permissions`
--
ALTER TABLE `auth_permissions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_reset_attempts`
--
ALTER TABLE `auth_reset_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `pelamar_diterima`
--
ALTER TABLE `pelamar_diterima`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `pelamar_ditolak`
--
ALTER TABLE `pelamar_ditolak`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posisi`
--
ALTER TABLE `posisi`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wawancara`
--
ALTER TABLE `wawancara`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_groups_permissions`
--
ALTER TABLE `auth_groups_permissions`
  ADD CONSTRAINT `auth_groups_permissions_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_groups_users`
--
ALTER TABLE `auth_groups_users`
  ADD CONSTRAINT `auth_groups_users_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `auth_groups` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `auth_users_permissions`
--
ALTER TABLE `auth_users_permissions`
  ADD CONSTRAINT `auth_users_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `auth_permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `auth_users_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
