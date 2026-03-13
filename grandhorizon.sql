-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2026 at 06:20 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grandhorizon`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id`, `judul`, `deskripsi`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 'Grand Horizon', 'smnssjnns\r\nsmksmkksm\r\nmsksmsks', 'fasilitas/H1ZyOZEQHCEf6iGlxpkzigtdrgLX2ILmRtHueLZr.png', '2026-03-10 21:25:30', '2026-03-11 22:52:53'),
(6, 'Grand Horizon', 'wllwll\r\nwllwllw\r\nwlwllw', 'fasilitas/Msdr9hl5oAr4p6WOMIgfAfWd0cr2mbNw2Vi15WV4.png', '2026-03-12 19:44:48', '2026-03-12 19:44:48'),
(7, 'mmmmm', 'qqqq\r\nqqqq\r\nqqqq', 'fasilitas/J7E7Vmp8kRBeEq0uqMcl09B8gDlmPpignPJQia9E.png', '2026-03-12 19:45:08', '2026-03-12 19:45:08');

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_perumahans`
--

CREATE TABLE `fasilitas_perumahans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_fasilitas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitas_perumahans`
--

INSERT INTO `fasilitas_perumahans` (`id`, `nama_fasilitas`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Keamanan rumah', 'fasilitas_perumahan/1A972O80PTPjeOYAlV0AFH9GTT4xLY3sSRao5MD3.jpg', '2026-03-05 22:46:36', '2026-03-05 22:46:36'),
(2, 'Keamanan rumah 3', 'fasilitas_perumahan/WNVyoTZtgHuDc42Egl1OYxzB7z1XmWz3m3Sy2n60.jpg', '2026-03-05 22:53:53', '2026-03-05 22:53:53');

-- --------------------------------------------------------

--
-- Table structure for table `footers`
--

CREATE TABLE `footers` (
  `id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fb_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tw_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ig_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biaya_items` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footers`
--

INSERT INTO `footers` (`id`, `address`, `phone`, `email`, `copyright`, `fb_name`, `fb_url`, `tw_name`, `tw_url`, `ig_name`, `ig_url`, `biaya_judul`, `biaya_items`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'wmmmwmw', '077777777777', 'admin@gmail.com', '© 2025 GRAND HORIZON', 'wmmwm', 'https://instagram.com', 'wmmwmw', 'https://instagram.com', 'Grand 1', 'https://instagram.com', 'Biaya Pemesanan Mulai 3 Juta', '[\"Cicilan ringan\",\"GRATIS 1 unit AC\",\"Hadiah menarik lainnya GRATIS\",\"PPN GRATIS\",\"KPR GRATIS\",\"DP GRATIS\",\"GRATIS biaya surat-surat\"]', 0, '2026-03-10 00:21:07', '2026-03-11 23:07:02'),
(2, 'Jl. Sirsak', '082345678', 'admin@gmail.com', '© 2025 GRAND HORIZON', NULL, NULL, NULL, NULL, 'Grand 1', NULL, 'Biaya Pemesanan Mulai 3 Juta', '[\"Cicilan ringan\",\"GRATIS 1 unit AC\",\"Hadiah menarik lainnya GRATIS\",\"PPN GRATIS\",\"KPR GRATIS\",\"DP GRATIS\",\"GRATIS biaya surat-surat\",\"Cicilan ringan\"]', 0, '2026-03-11 19:59:53', '2026-03-11 23:07:02'),
(3, 'Jl', '09999999999', 'admin@gmail.com', '© 2025 GRAND HORIZON', 'youtube', 'https://youtube.com', NULL, NULL, NULL, NULL, 'Biaya Pemesanan Mulai 3 Juta', '[\"Cicilan ringan\",\"GRATIS 1 unit AC\",\"Hadiah menarik lainnya GRATIS\",\"PPN GRATIS\",\"KPR GRATIS\",\"DP GRATIS\",\"GRATIS biaya surat-surat\",\"Cicilan ringan 2\"]', 0, '2026-03-11 22:58:14', '2026-03-11 23:07:02'),
(4, 'Jl', '066666666666666', 'admin@gmail.com', '© 2025 GRAND HORIZON', 'Facebook', NULL, 'X', 'https://x.com', 'Ig', 'https://instagram.com', 'Biaya Pemesanan Mulai 3 Juta', '[\"Cicilan ringan\",\"GRATIS 1 unit AC\",\"Hadiah menarik lainnya GRATIS\",\"PPN GRATIS\",\"KPR GRATIS\",\"DP GRATIS\",\"GRATIS biaya surat-surat\"]', 0, '2026-03-11 22:59:15', '2026-03-11 23:07:02'),
(5, 'Jl', '077777777777', 'admin@gmail.com', 'GRAND HORIZON', 'Facebook', 'https://youtube.com', 'X', 'https://x.com', 'Grand 1', 'https://instagram.com', 'Biaya Pemesanan Mulai 3 Juta', '[\"Cicilan ringan\",\"GRATIS 1 unit AC\",\"Hadiah menarik lainnya GRATIS\",\"PPN GRATIS\",\"KPR GRATIS\",\"DP GRATIS\",\"GRATIS biaya surat-surat\"]', 1, '2026-03-11 23:07:02', '2026-03-11 23:07:02');

-- --------------------------------------------------------

--
-- Table structure for table `hero_sections`
--

CREATE TABLE `hero_sections` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjudul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekstombol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hero_sections`
--

INSERT INTO `hero_sections` (`id`, `judul`, `subjudul`, `alamat`, `gambar`, `tekstombol`, `created_at`, `updated_at`) VALUES
(1, 'Grand Horizon 2', 'Perumahan Modern dan Nyaman untuk keluarga', 'Jl. Raya Cilegon, Drangong, Taktakan Serang, Kota Serang, Banten 42162 REAL ESTATE INDONESIA (REI)', 'hero/RfQE2ulrAgy5JwEfrVTroaRHxObJlA98hFl604wx.png', 'Lihat Selengkapnya', '2026-03-05 22:46:25', '2026-03-12 21:41:45');

-- --------------------------------------------------------

--
-- Table structure for table `hubungi_kamis`
--

CREATE TABLE `hubungi_kamis` (
  `id` bigint UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT '0',
  `teks_tombol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_tombol` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hubungi_kamis`
--

INSERT INTO `hubungi_kamis` (`id`, `user`, `no_hp`, `email`, `tanggal`, `pesan`, `is_read`, `teks_tombol`, `link_tombol`, `created_at`, `updated_at`) VALUES
(1, 'grandhorizon', '0888888888', 'admin@gmail.com', '2026-03-06', 'aaaaaaaaaaaaaaaaaaaaa', 0, NULL, NULL, '2026-03-05 22:49:20', '2026-03-05 22:49:20'),
(2, 'grandhorizon', '0888888888', 'admin@gmail.com', '2026-03-09', 'bbbbbbbbbbbbbbbbbbb', 0, NULL, NULL, '2026-03-08 23:59:19', '2026-03-08 23:59:19'),
(3, 'm,anamnn', '987777777777', 'snjnjsn@gmail.com', '2026-03-27', 'qppqppqpqp', 0, NULL, NULL, '2026-03-09 00:00:08', '2026-03-09 00:00:08'),
(4, 'grandhorizon', '08888888889', 'admin@gmail.com', '2026-03-11', 'xwteetryytutuut', 1, NULL, NULL, '2026-03-11 00:04:31', '2026-03-11 00:06:53'),
(5, 'grandhorizon', '0888888888', 'admin@gmail.com', '2026-03-12', 'ppppppppppp', 0, NULL, NULL, '2026-03-11 23:09:11', '2026-03-11 23:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keunggulans`
--

CREATE TABLE `keunggulans` (
  `id` bigint UNSIGNED NOT NULL,
  `teks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` enum('fitur','sosmed') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fitur',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keunggulans`
--

INSERT INTO `keunggulans` (`id`, `teks`, `icon`, `link`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'llllll', 'icons/EoIP2xYE8Q9Ul8DfFes2HlWDHs2CMIIKokX4ppiM.png', NULL, 'fitur', '2026-03-09 23:06:02', '2026-03-09 23:06:02'),
(2, 'vcccccc', 'icons/ieh3eMfz5jlQECiRMq6wnf71I1Zj1XtPRYYHv2Vo.png', NULL, 'fitur', '2026-03-09 23:06:02', '2026-03-09 23:06:02'),
(3, 'fffff', 'icons/ieyOUBZCOzsQzPUxACjmidE1DfN3TlCsB7rQS2eB.png', NULL, 'fitur', '2026-03-09 23:06:02', '2026-03-09 23:06:02');

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_03_03_060856_create_hero_sections_table', 1),
(5, '2026_03_03_061533_create_tentangs_table', 1),
(6, '2026_03_03_061725_create_fasilitas_table', 1),
(7, '2026_03_03_061825_create_testimonis_table', 1),
(8, '2026_03_03_062051_create_tipe_rumahs_table', 1),
(9, '2026_03_03_062314_create_hubungi_kamis_table', 1),
(10, '2026_03_03_062423_create_profiles_table', 1),
(11, '2026_03_05_115345_change_harga_to_string_in_tipe_rumahs_table', 1),
(12, '2026_03_05_142225_create_fasilitas_perumahans_table', 1),
(13, '2026_03_05_142851_create_testimoni_perumahans_table', 1),
(14, '2026_03_05_142953_create_footers_table', 1),
(15, '2026_03_10_032607_ubah_link_map_jadi_text', 2),
(16, '2026_03_10_033222_create_keunggulans_table', 3),
(17, '2026_03_10_041125_add_icon_to_keunggulans_table', 4),
(18, '2026_03_10_042243_update_tables_for_final_footer', 5),
(19, '2026_03_10_033944_create_footers_table', 6),
(20, '2026_03_10_060428_add_biaya_to_footers_table', 6),
(21, '2026_03_11_061825_add_is_read_to_hubungi_kamis_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_whatsapp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `logo`, `deskripsi`, `link_whatsapp`, `no_hp`, `no_telp`, `email`, `twitter`, `facebook`, `instagram`, `link_map`, `created_at`, `updated_at`) VALUES
(1, 'profile/fh7ob5QfD2yLxvoqnJSDNKbfyC4ZhFWxgm9GjHfa.png', 'mnmnmnmn', 'mmmmmmmmmm', '08888888889', NULL, 'poo@gmail.com', 'twitter.com', 'facebook.com', 'instagram.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15840.344897611709!2d109.65203905!3d-6.9991274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7021f1a9c89769%3A0x3e7de0be95a044c4!2sMasjid%20Almubarok!5e0!3m2!1sid!2sid!4v1773112851973!5m2!1sid!2sid', '2026-03-09 20:20:12', '2026-03-09 21:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('77ApJ4yBDxenDUzo8i2TaEU5mZ4BMZWfIOQNQugn', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidHNweXRsRXBVdHhCN3lSQUdGSEZ6ZkN4R3luMnBvMFJFc1NCM0xZTCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1773376992),
('OtttLqsnwjJMyQ9OackqChSG3dPltX1uEdX1MiuE', 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Mobile Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiV2lIRnBaUTNXd1VsWXpTZEp4WVVEM0FRaWttSzRHaTduMVVnQzFGdCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9mYXNpbGl0YXMiO3M6NToicm91dGUiO3M6MTU6ImZhc2lsaXRhcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1773377043);

-- --------------------------------------------------------

--
-- Table structure for table `tentangs`
--

CREATE TABLE `tentangs` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjudul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekstombol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul_unggulan_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_unggulan_1` text COLLATE utf8mb4_unicode_ci,
  `logo_unggulan_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_unggulan_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_unggulan_2` text COLLATE utf8mb4_unicode_ci,
  `logo_unggulan_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_unggulan_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_unggulan_3` text COLLATE utf8mb4_unicode_ci,
  `logo_unggulan_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_unggulan_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc_unggulan_4` text COLLATE utf8mb4_unicode_ci,
  `logo_unggulan_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tentangs`
--

INSERT INTO `tentangs` (`id`, `judul`, `subjudul`, `gambar`, `deskripsi`, `logo`, `tekstombol`, `judul_unggulan_1`, `desc_unggulan_1`, `logo_unggulan_1`, `judul_unggulan_2`, `desc_unggulan_2`, `logo_unggulan_2`, `judul_unggulan_3`, `desc_unggulan_3`, `logo_unggulan_3`, `judul_unggulan_4`, `desc_unggulan_4`, `logo_unggulan_4`, `created_at`, `updated_at`) VALUES
(1, 'Tentang Grand Horizon 2', 'Grand Horizon adalah kawasan perumahan modern yang menawarkan hunian nyaman, aman, dan cocok untuk keluarga.', 'tentang/PonGsQSSSJd7m8CZaYrAgMvmcW8XgaFIQ52fVIvc.png', 'Berlokasi strategis dan mudah diakses, perumahan ini dekat dengan berbagai fasilitas umum seperti sekolah, pusat perbelanjaan, rumah sakit, dan akses transportasi.', 'mmmm.jpg', 'Lihat Selengkapnya', 'Legalitas Terjamin 1', 'Semua dokumen dan perizinan lengkap serta resmi.', 'tentang/keunggulan/UJnXaEsDsdbxhD5Dk9ncYonJFsNTds3oT1Qkq3Ol.png', 'Kredit Mudah', 'Proses pembiayaan mudah dan cicilan terjangkau.', 'tentang/keunggulan/L8a8bqoznBCtoVCSCZajfkpEsfUISzpI9HHbrUNm.png', 'Bebas Banjir', 'Lokasi aman dari genangan dan banjir.', 'tentang/keunggulan/RfR7TDjFw435RHM8rcHin0gOLYu8Xoa4pYbr2l4f.svg', 'Lokasi Mudah di Akses', 'Mudah diakses dan dekat dengan fasilitas umum.', 'tentang/keunggulan/T0g7VFcvsHbNqFVq0ptBFOy2ALtGfUAUO0liRxOO.png', NULL, '2026-03-12 21:42:14');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint UNSIGNED NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `rating`, `pesan`, `user`, `profile`, `created_at`, `updated_at`) VALUES
(1, 2.0, 'anskksks', 'grandhorizon', '1773202899_Rectangle 57.png', '2026-03-10 21:21:39', '2026-03-10 21:21:39'),
(2, 4.0, 'apapaooaooaoaa', 'assiaooaipapa', '1773285275_79137.png', '2026-03-11 20:14:35', '2026-03-11 20:14:35');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni_perumahans`
--

CREATE TABLE `testimoni_perumahans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_klien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` int NOT NULL DEFAULT '5',
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tipe_rumahs`
--

CREATE TABLE `tipe_rumahs` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_tipe_rumah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas_bangunan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cicilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kamar_tidur` int NOT NULL,
  `kamar_mandi` int NOT NULL,
  `garasi` int NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tekstombol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipe_rumahs`
--

INSERT INTO `tipe_rumahs` (`id`, `nama_tipe_rumah`, `luas_bangunan`, `harga`, `cicilan`, `kamar_tidur`, `kamar_mandi`, `garasi`, `gambar`, `tekstombol`, `created_at`, `updated_at`) VALUES
(1, 'Tipe Horizon VIP', 'LT 55m LB 55m', 'Rp 1,5miliar - 2,1miliar', 'Cicilan mulai 5jt-an', 3, 3, 2, 'tiperumah/f3mk8s4GvW8fjqWFI6AwtHyu7MoHkhuXCIJYEJHL.png', 'CEK KETERSEDIAAN UNIT', '2026-03-08 19:51:34', '2026-03-08 19:51:34'),
(2, 'Tipe Horizon VVIP', 'LT 70m LB 65m', 'Rp 1,9miliar - 2,7miliar', 'Cicilan mulai 7jt an', 5, 5, 4, 'tiperumah/znMwVvECoI6w29TBkv1pMPwqFHGR50WD4QigJT8Y.png', 'CEK KETERSEDIAAN UNIT', '2026-03-08 19:52:44', '2026-03-08 19:52:44'),
(3, 'Tipe Horizon VVIPp', 'LT 70m LB 65m', 'Rp 1,9miliar - 2,7miliarr', 'Cicilan mulai 7jt an', 9, 7, 6, 'tiperumah/zRzxsAsbOJ8ReIAes7yAoo6piWykP4ioWWfPktpX.png', 'CEK KETERSEDIAAN UNIT', '2026-03-08 23:58:20', '2026-03-12 19:38:52'),
(5, 'Tipe Horizon VVIP0 1', 'LT 55m LB 55m', 'Rp 1,9miliar - 2,9miliar', 'Cicilan mulai 7jt an', 3, 3, 3, 'tiperumah/ktSs4PyBNOkkHfyGNuKio1V2RGF9THuDWHXcngps.jpg', 'CEK KETERSEDIAAN UNIT', '2026-03-12 19:39:31', '2026-03-12 21:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Grand Horizon', 'admin@gmail.com', NULL, '$2y$12$VuvLezKJ4M8ifiZIGdq9Iu1tWcI/7h9PENLx.m2lZfjTTKyI4FSMe', NULL, '2026-03-05 22:45:41', '2026-03-05 22:45:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fasilitas_perumahans`
--
ALTER TABLE `fasilitas_perumahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footers`
--
ALTER TABLE `footers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hero_sections`
--
ALTER TABLE `hero_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keunggulans`
--
ALTER TABLE `keunggulans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tentangs`
--
ALTER TABLE `tentangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni_perumahans`
--
ALTER TABLE `testimoni_perumahans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipe_rumahs`
--
ALTER TABLE `tipe_rumahs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `fasilitas_perumahans`
--
ALTER TABLE `fasilitas_perumahans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `footers`
--
ALTER TABLE `footers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hero_sections`
--
ALTER TABLE `hero_sections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keunggulans`
--
ALTER TABLE `keunggulans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tentangs`
--
ALTER TABLE `tentangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimoni_perumahans`
--
ALTER TABLE `testimoni_perumahans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipe_rumahs`
--
ALTER TABLE `tipe_rumahs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
