-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2023 at 08:21 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dapur_kenyang`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_website`
--

CREATE TABLE `header_website` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `slogan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_website`
--

INSERT INTO `header_website` (`id`, `id_produk`, `slogan`, `deskripsi`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 3, 'Kelezatan pisang dalam setiap gigitan!', 'Kelezatan pisang yang dibalut dalam tepung renyah, menciptakan camilan yang memukau untuk segala usia.', 1, '2023-12-02 07:28:36', '2023-12-07 02:29:20'),
(5, 7, 'Rahasia Kenikmatan: Tahu Isi, Kelezatan Tradisi', 'Paduan lembutnya tahu dengan rempah-rempah khas, menghadirkan cita rasa tradisional yang tak terlupakan dalam setiap suapannya.', 1, '2023-12-07 02:32:33', '2023-12-07 02:32:33');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id`, `id_produk`, `id_user`, `jumlah`, `created_at`, `updated_at`) VALUES
(27, 1, 1, 4, '2023-12-19 17:55:31', '2023-12-19 17:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` bigint UNSIGNED NOT NULL,
  `nomor_telepon` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tiktok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `alamat_jalan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `nomor_telepon`, `instagram`, `facebook`, `tiktok`, `id_user`, `created_at`, `updated_at`, `email`, `alamat`, `alamat_jalan`) VALUES
(1, '+6288258192639', 'https://instagram.com/dapur_kenyangg?igshid=OGQ5ZDc2ODk2ZA==', 'https://facebook.com/', '-', 1, NULL, '2023-12-16 08:39:43', 'juwitanurasriani@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3973.640441841479!2d119.41173783148402!3d-5.161414194815924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbee3a82ab664c3%3A0xb7b88d8a461c08a6!2sDapur%20Kenyang!5e0!3m2!1sid!2sid!4v1700711812773!5m2!1sid!2sid', 'Jl. Cendrawasih Asmat Barak V No.6, Mario, Kec. Mariso, Kota Makassar, Sulawesi Selatan 90131');

-- --------------------------------------------------------

--
-- Table structure for table `log_produk`
--

CREATE TABLE `log_produk` (
  `id` bigint UNSIGNED NOT NULL,
  `keterangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `harga_produk` int NOT NULL,
  `stok_produk` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2020_01_01_000001_create_password_resets_table', 1),
(3, '2020_01_01_000002_create_failed_jobs_table', 1),
(4, '2020_01_01_000004_create_users_table', 1),
(5, '2023_11_27_013035_create_products_table', 1),
(6, '2023_11_29_152416_create_testimonis_table', 2),
(7, '2023_11_29_162445_log_produk', 2),
(8, '2023_11_30_144453_create_testimoni_table', 3),
(9, '2023_11_30_160255_create_kontaks_table', 4),
(10, '2023_12_02_123115_create_header_websites_table', 5),
(11, '2023_12_03_052723_add_alamat_and_email_column_to_kontak_table', 6),
(12, '2023_12_03_053741_create_tentang_kamis_table', 7),
(13, '2023_12_10_173350_create_carts_table', 8),
(14, '2023_12_13_064048_create_table_user_login', 8),
(15, '2023_12_14_113833_create_keranjang_table', 9),
(16, '2023_12_15_131212_create_transaksis_table', 10),
(17, '2023_12_15_131642_create_detail_transaksis_table', 10),
(18, '2023_12_16_122146_change_alamat_kontak_column', 10),
(19, '2023_12_16_123112_add_alamat_jalan_column_to_kontak_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint UNSIGNED NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar_produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga_produk` int NOT NULL,
  `stok_produk` int DEFAULT NULL,
  `deskripsi_produk` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar_produk`, `harga_produk`, `stok_produk`, `deskripsi_produk`, `created_at`, `updated_at`) VALUES
(1, 'Jalangkote', 'produk/4HBZAcl2P7yFyjwZUdIma0tsII0xHxLMzDJ1YKFt.png', 2000, 212, 'Kelezatan tradisional yang disajikan dengan sentuhan modern dalam setiap gigitannya.', '2023-11-30 06:54:45', '2023-12-16 06:18:09'),
(2, 'Bakwan', 'produk/jLJv7N0f4jau3ffrUZZ3iAnSPYHxYhXtzd1MdFk3.png', 2000, 122, 'Paduan sempurna antara beragam sayuran segar dan rempah-rempah, menciptakan kenikmatan camilan yang tak terlupakan.', '2023-11-30 06:55:27', '2023-12-16 06:17:41'),
(3, 'Pisang Nugget', 'produk/cfAvHjkXT33Q5W4IY8SDkMLONqUsazv19dhmhibY.png', 2000, 255, 'Kombinasi sempurna antara krispi luar biasa dan kenikmatan manis pisang yang lembut dalam setiap sajian.', '2023-11-30 06:56:23', '2023-12-16 05:28:30'),
(7, 'Tahu Isi', 'produk/urLv9arkU5mL2qok3bNbayTyIKKoxtVv7bU4TaHs.png', 1000, 80, 'Paduan lembutnya tahu dengan isi rempah-rempah yang khas, menciptakan cita rasa yang menggoda selera dalam setiap gigitannya.', '2023-12-06 22:24:48', '2023-12-16 06:22:03'),
(8, 'Risol', 'produk/KMcjpOwQJPJKtBjJuzJhlAKJz1Yb4cfYKP1CHUke.png', 2000, 100, 'Kelezatan kulit renyah dengan isian lembut, disempurnakan dengan sentuhan mayo yang memikat selera.', '2023-12-06 22:27:28', '2023-12-16 06:21:16'),
(11, 'Roti Kukus', 'produk/kALOFwhme8ti9l6jKmgEbl8og0Z4xMDiC7nCjkjc.png', 2000, 150, 'Kelembutan roti yang disajikan dengan aroma dan cita rasa yang memikat, membuat setiap suapan menjadi pengalaman yang tak terlupakan.', '2023-12-06 22:30:42', '2023-12-16 06:21:40'),
(14, 'Kue Lapis', 'produk/58RS930ZnqHgNe3V38WTYmJbZBbi8KzOsTOKbBxy.png', 2000, 50, 'Sajian berlapis dengan paduan rasa manis dan aroma rempah yang memikat, menghadirkan harmoni cita rasa dalam setiap lapisannya.', '2023-12-07 02:57:19', '2023-12-16 06:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentang_kami`
--

INSERT INTO `tentang_kami` (`id`, `judul`, `deskripsi`, `foto`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'Bersama Chef Elmer Chocolatier', 'Dapur Kenyang bersama chef Elmer Chocolatier. PT Federal Food Internusa merupakan perusahaan yang memproduksi berbagai produk cokelat dan bahan baku bakery. Perusahaan ini berdiri sejak tahun 2005 dan berlokasi di Cikupa, Tangerang.', 'tentang-kami/CiO9QBH9mmbuN0SfzpRyUOiPY4tMSuyi4G5YMYbb.jpg', 1, '2023-12-02 22:23:43', '2023-12-02 22:23:43'),
(3, 'Bersama Owner Yotta', 'Dapur Kenyang bersama Adryan Yudhistira Purwanto selaku CEO sekaligus Owner Yotta.Yotta merupakan salah satu brand lokal asal Makassar, Sulawesi Selatan. Yotta adalah merek minuman modern yang terjun dalam usaha minuman olahan susu.', 'tentang-kami/BcPVdKHlsfjgg00mXIZYrm3YWdzAOTJV7IeS1gw1.jpg', 1, '2023-12-02 22:24:47', '2023-12-02 22:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skor_bintang` smallint NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `nama`, `skor_bintang`, `deskripsi`, `foto`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 'Cipung', 4, 'Pisang gorengnya crispy di luar, lembut di dalam, dan sempurna untuk menghadirkan kenikmatan tradisional dalam setiap gigitannya.', 'testimoni/IYztx84Ip234XsJTUvCMRlbvhsoHEIXkW4LD4bUp.jpg', 1, '2023-11-30 06:58:17', '2023-12-16 06:22:51'),
(4, 'Mark Smith', 5, 'Saya amat terkesan dengan kebersihan dan kualitas bahan baku yang digunakan. Rasanya autentik dan tiada duanya.', 'testimoni/k8HUDknIWdF1uSfmaTU3BwEO0kmuXVmGGDM9Uv5l.jpg', 1, '2023-12-07 02:50:25', '2023-12-16 06:24:52'),
(6, 'CoolUsername', 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'testimoni/CdssIrC3lMNSZ2EjbGW7AH98OiJYJlQz2Sn6xFPf.jpg', 1, '2023-12-16 05:55:31', '2023-12-16 06:26:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` int UNSIGNED NOT NULL,
  `total` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `total`, `created_at`, `updated_at`) VALUES
(6, 1, 20000, '2023-12-16 10:21:06', '2023-12-16 10:21:06'),
(7, 1, 12000, '2023-12-16 11:17:28', '2023-12-16 11:17:28'),
(8, 1, 20000, '2023-12-16 11:20:56', '2023-12-16 11:20:56'),
(9, 1, 8000, '2023-12-16 12:00:09', '2023-12-16 12:00:09'),
(10, 1, 8000, '2023-12-19 16:57:07', '2023-12-19 16:57:07'),
(11, 1, 0, '2023-12-19 16:57:14', '2023-12-19 16:57:14'),
(12, 1, 0, '2023-12-19 16:57:18', '2023-12-19 16:57:18'),
(13, 1, 0, '2023-12-19 16:57:18', '2023-12-19 16:57:18'),
(14, 1, 48000, '2023-12-19 17:28:37', '2023-12-19 17:28:37'),
(15, 1, 6000, '2023-12-19 17:30:05', '2023-12-19 17:30:05'),
(16, 1, 16000, '2023-12-19 17:32:16', '2023-12-19 17:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` bigint UNSIGNED NOT NULL,
  `id_transaksi` bigint UNSIGNED NOT NULL,
  `id_produk` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `id_transaksi`, `id_produk`, `jumlah`, `created_at`, `updated_at`) VALUES
(9, 6, 2, 4, '2023-12-16 10:21:06', '2023-12-16 10:21:06'),
(10, 6, 1, 4, '2023-12-16 10:21:06', '2023-12-16 10:21:06'),
(11, 6, 14, 2, '2023-12-16 10:21:06', '2023-12-16 10:21:06'),
(12, 7, 2, 2, '2023-12-16 11:17:28', '2023-12-16 11:17:28'),
(13, 7, 1, 1, '2023-12-16 11:17:28', '2023-12-16 11:17:28'),
(14, 7, 14, 3, '2023-12-16 11:17:28', '2023-12-16 11:17:28'),
(15, 8, 2, 5, '2023-12-16 11:20:56', '2023-12-16 11:20:56'),
(16, 8, 8, 2, '2023-12-16 11:20:56', '2023-12-16 11:20:56'),
(17, 8, 3, 3, '2023-12-16 11:20:56', '2023-12-16 11:20:56'),
(18, 9, 1, 4, '2023-12-16 12:00:09', '2023-12-16 12:00:09'),
(19, 10, 1, 3, '2023-12-19 16:57:07', '2023-12-19 16:57:07'),
(20, 10, 14, 1, '2023-12-19 16:57:07', '2023-12-19 16:57:07'),
(21, 14, 2, 24, '2023-12-19 17:28:37', '2023-12-19 17:28:37'),
(22, 15, 2, 3, '2023-12-19 17:30:05', '2023-12-19 17:30:05'),
(23, 16, 2, 8, '2023-12-19 17:32:16', '2023-12-19 17:32:16');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `first_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner` tinyint(1) NOT NULL DEFAULT '0',
  `photo_path` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `owner`, `photo_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John', 'Doe', 'johndoe@example.com', '2023-11-30 05:38:28', '$2y$10$A4KptxLP09BJw8flRL6Dl.NNRAYz0JBY..fRl307Fe5Tl7n8HxsZe', 1, NULL, '6fkXD6KAuZivmzrW6uVXy2zUi0CaXeURUFqB7Y0l4r997vFUVAjan29gVv6d', '2023-11-30 05:38:28', '2023-12-05 22:44:41'),
(9, 'Gordon', 'Ramsay', 'gordonramsay@example.com', '2023-12-05 22:50:44', '$2y$10$T03tr0ejBQ1Scz9Y7ImX9.Ea//Lw2O6vxUytKJTN11G3yhzvSUbYe', 0, NULL, NULL, '2023-12-05 22:50:45', '2023-12-05 22:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `nama`, `email`, `password`, `confir`, `created_at`, `updated_at`) VALUES
(1, 'juni', 'juni@example.com', '$2y$10$YBEhpoqa4i2rmFvYC8hlTu/Isf.eJ0jONXGu1n81Q9GQ74sGDyhTi', '$2y$10$YlioFY8fEmK6FN8gtqShFuxDMQpsSmgJEsaHNBjRV66uvLFizFehm', NULL, NULL),
(2, 'edgar', 'edgar@example.com', '$2y$10$hmkxfj52SqL8YE7eXzjZhOoGVraFDMBB72KTJZhgOijUebt/q7i0W', '$2y$10$IXvw3bPGk4KwZgh.jubrSOOxp/wPOH.F5hxv4Ao2NtDSaFUCgHtBu', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `header_website`
--
ALTER TABLE `header_website`
  ADD PRIMARY KEY (`id`),
  ADD KEY `header_website_id_produk_foreign` (`id_produk`),
  ADD KEY `header_website_id_user_foreign` (`id_user`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjang_id_produk_foreign` (`id_produk`),
  ADD KEY `keranjang_id_user_foreign` (`id_user`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kontak_id_user_foreign` (`id_user`);

--
-- Indexes for table `log_produk`
--
ALTER TABLE `log_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_produk_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tentang_kami_id_user_foreign` (`id_user`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimoni_id_user_foreign` (`id_user`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_id_user_foreign` (`id_user`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_detail_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `header_website`
--
ALTER TABLE `header_website`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_produk`
--
ALTER TABLE `log_produk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `header_website`
--
ALTER TABLE `header_website`
  ADD CONSTRAINT `header_website_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `header_website_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user_login` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `kontak`
--
ALTER TABLE `kontak`
  ADD CONSTRAINT `kontak_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `log_produk`
--
ALTER TABLE `log_produk`
  ADD CONSTRAINT `log_produk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;

--
-- Constraints for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD CONSTRAINT `tentang_kami_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD CONSTRAINT `testimoni_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user_login` (`id_user`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
