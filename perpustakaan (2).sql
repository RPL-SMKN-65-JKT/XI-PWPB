-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2023 pada 01.25
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_code` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tanggal_terbit` varchar(255) NOT NULL,
  `halaman` varchar(255) NOT NULL,
  `bahasa` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'in stock',
  `deskripsi` varchar(255) NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `book_code`, `title`, `slug`, `cover`, `penulis`, `penerbit`, `tanggal_terbit`, `halaman`, `bahasa`, `status`, `deskripsi`, `classification_id`, `type_id`, `created_at`, `updated_at`, `deleted_at`, `pdf`) VALUES
(5, '97816257', 'Jujutsu Kaisen', 'jujutsu-kaisen', 'Jujutsu Kaisen, Vol. 1-1700581301.png', 'Gege Akutami', 'VIZ Media', '2019-12-03', '191', 'indonesia', ' in stock', 'Yūji Itadori adalah seorang siswa SMA dengan atletisitas yang tidak wajar yang tinggal di Sendai bersama kakeknya.', 1, 1, '2023-11-21 08:41:41', '2023-12-09 09:16:02', NULL, NULL),
(6, '276827639', 'Tata Surya', 'tata-surya', 'Tata Surya-1701183858.png', 'Harper Russo', 'VIZ Media', '2023-11-28', '140', 'Indonesiaa', ' in stock', 'tata surya kumpulan benda langit', 2, 2, '2023-11-28 08:04:18', '2023-12-09 09:28:20', NULL, NULL),
(7, '7865365', 'Beyond the inspiration', 'beyond-the-inspiration', 'Beyond the inspiration-1701184260.png', 'Felix Siaw', 'Khalifah press', '2023-11-28', '120', 'indonesia', ' in stock', 'Beyond the inspiration', 2, 2, '2023-11-28 08:11:00', '2023-12-09 09:28:28', NULL, NULL),
(9, '64546', 'Loneliness', 'loneliness', 'Loneliness-1701341258.png', 'Alvi Syahrin', 'VIZ Media', '2023-11-30', '130', 'inggris', ' in stock', 'Loneliness is my best friend', 2, 2, '2023-11-30 03:47:39', '2023-12-09 09:29:54', NULL, NULL),
(10, '9656578', 'Menggapai', 'menggapai', 'Menggapai-1701341413.png', 'Phylis Schwaiger', 'pelangi', '2023-11-30', '123', 'Indonesia', ' in stock', 'menggapai', 1, 2, '2023-11-30 03:50:13', '2023-12-10 12:14:59', NULL, NULL),
(11, '4213131', 'Attack on titan', 'attack-on-titan', 'Attack on titan-1701351233.png', 'Hajime Isayama', 'VIZ Media', '2023-11-30', '123', 'Indonesiaa', ' in stock', 'attack on titan', 1, 1, '2023-11-30 06:20:25', '2023-12-09 09:28:00', NULL, NULL),
(12, '1231231', 'Anak Penghafal Al-Qur\'an', 'anak-penghafal-al-qur-an', 'Anak Penghafal Al-Qur\'an-1701351460.png', 'Marselina Zaliyanti', 'VIZ Media', '2023-11-30', '123', 'indonesia', 'not in stock', 'seorang anak penghafal al quran', 2, 2, '2023-11-30 06:37:40', '2023-12-09 09:31:42', NULL, NULL),
(13, '9776960', 'Violet Evergarden', 'violet-evergarden', 'Violet Evergarden-1701351584.png', 'Kana Akatsuki', 'VIZ Media', '2023-11-30', '123', 'jepang', 'not in stock', 'Violet Evergarden', 1, 1, '2023-11-30 06:39:44', '2023-12-10 12:17:01', NULL, NULL),
(14, '12324532', 'Kedamaian', 'kedamaian', 'Kedamaian-1701351656.png', 'Riki Santo', 'VIZ Media', '2023-11-30', '176', 'Indonesia', 'not in stock', 'Buku kisah Kedamaian', 2, 2, '2023-11-30 06:40:56', '2023-12-10 12:33:34', NULL, NULL),
(15, '765672', 'Demon Slayer', 'demon-slayer', 'Demon Slayer-1701353678.png', 'Koyoharu Gotoge', 'VIZ Media', '2023-11-30', '76595823', 'jepang', 'not in stock', 'Tanjiro', 1, 1, '2023-11-30 07:14:38', '2023-11-30 07:14:38', NULL, NULL),
(16, '96639534', 'Jujutsu Kaisen Vol 2', 'jujutsu-kaisen-vol-2', 'Jujutsu Kaisen Vol 2-1701362873.png', 'Gege Akutami', 'VIZ Media', '2023-11-30', '134', 'Indonesia', 'not in stock', 'jujutsu Kaisen', 1, 1, '2023-11-30 09:47:53', '2023-12-09 21:47:18', NULL, NULL),
(17, '67860987', 'Dunia Sophie', 'dunia-sophie', 'Dunia Sophie-1702224321.png', 'Jostein Gaarder', 'mizan', '2023-12-10', '192', 'Indonesia', 'not in stock', 'Sebuah novel filsafat', 1, 2, '2023-12-10 09:05:21', '2023-12-10 12:02:37', NULL, ''),
(18, '987894723', 'TO KILL A MOCKINGBIRD', 'to-kill-a-mockingbird', 'TO KILL A MOCKINGBIRD-1702224840.jpg', 'Harper Lee', 'J. B. Lippincott & Co., 1960.', '2006-03-01', '442', 'Indonesia', 'not in stock', 'Tatkala hampir berusia tiga belas tahun, tangan abangku,\r\nJem, patah di bagian siku. Setelah sembuh, dan ketakutan', 1, 2, '2023-12-10 09:14:00', '2023-12-10 12:01:02', NULL, 'TO KILL A MOCKINGBIRD-1702224840.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_category`
--

CREATE TABLE `book_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `book_category`
--

INSERT INTO `book_category` (`id`, `book_id`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 5, 9, NULL, NULL),
(10, 5, 10, NULL, NULL),
(11, 5, 12, NULL, NULL),
(12, 6, 7, NULL, NULL),
(13, 6, 9, NULL, NULL),
(14, 7, 7, NULL, NULL),
(18, 9, 4, NULL, NULL),
(19, 9, 7, NULL, NULL),
(20, 10, 4, NULL, NULL),
(21, 10, 7, NULL, NULL),
(23, 11, 9, NULL, NULL),
(24, 11, 10, NULL, NULL),
(25, 11, 11, NULL, NULL),
(26, 12, 7, NULL, NULL),
(27, 12, 8, NULL, NULL),
(28, 13, 4, NULL, NULL),
(29, 13, 5, NULL, NULL),
(30, 13, 12, NULL, NULL),
(31, 14, 7, NULL, NULL),
(32, 14, 9, NULL, NULL),
(33, 15, 10, NULL, NULL),
(34, 15, 11, NULL, NULL),
(35, 16, 10, NULL, NULL),
(36, 16, 11, NULL, NULL),
(37, 16, 12, NULL, NULL),
(38, 17, 7, NULL, NULL),
(39, 17, 8, NULL, NULL),
(40, 17, 9, NULL, NULL),
(41, 18, 7, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Comic', 'comic', NULL, '2023-11-20 17:07:52', '2023-11-20 17:07:52'),
(2, 'Novel', 'novel', NULL, '2023-11-20 17:07:57', '2023-11-20 17:07:57'),
(3, 'Fiction', 'fiction', NULL, '2023-12-10 02:00:15', '2023-12-10 02:00:15'),
(4, 'Fantasy', 'Fantasy', NULL, NULL, NULL),
(5, 'Romance', 'romance', NULL, '2023-11-30 03:38:20', NULL),
(6, 'Non Fiction', 'non fiction', NULL, '2023-11-20 17:08:09', '2023-11-20 17:08:09'),
(7, 'Inspiration', 'Inspiration', NULL, NULL, NULL),
(8, 'Religious', 'Religious', NULL, NULL, NULL),
(9, 'Mystery', 'Mystery', NULL, NULL, NULL),
(10, 'Action', 'Action', NULL, NULL, NULL),
(11, 'Thriller', 'Thriller', NULL, NULL, NULL),
(12, 'School', 'School', NULL, NULL, NULL),
(13, 'Horror', 'Horror', NULL, NULL, NULL),
(14, 'Western', 'Western', NULL, NULL, NULL),
(15, 'sport', 'sport', '2023-11-24 17:37:20', '2023-11-24 17:37:20', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `classification`
--

CREATE TABLE `classification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `classification`
--

INSERT INTO `classification` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'fiksi', NULL, NULL),
(2, 'non fiksi', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_15_141305_create_classification_table', 1),
(6, '2022_11_16_002447_create_types_table', 1),
(7, '2023_08_27_143049_create_roles_table', 1),
(8, '2023_08_27_145811_add_role_id_to_users_table', 1),
(9, '2023_08_28_122635_create_categories_table', 1),
(10, '2023_08_28_123042_create_books_table', 1),
(11, '2023_08_28_123358_create_book_category_table', 1),
(12, '2023_08_28_124845_create_rent_logs_table', 1),
(13, '2023_10_18_034547_add_slug_column_to_categories_table', 1),
(14, '2023_10_18_044843_change_slug_column_into_nullable_in_categories_table', 1),
(15, '2023_10_18_074927_add_soft_delete_column_to_categories_table', 1),
(16, '2023_11_14_160309_add_soft_delete_to_books_table', 1),
(17, '2023_11_21_162436_add_slug_to_users_table', 2),
(18, '2023_12_10_153503_add_pdf_to_books_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rent_logs`
--

CREATE TABLE `rent_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `rent_date` date NOT NULL,
  `return_date` date NOT NULL,
  `actual_return_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rent_logs`
--

INSERT INTO `rent_logs` (`id`, `user_id`, `book_id`, `rent_date`, `return_date`, `actual_return_date`, `created_at`, `updated_at`) VALUES
(1, 6, 5, '2023-12-09', '2023-12-16', '2023-12-17', '2023-12-09 09:16:02', '2023-12-09 09:16:02'),
(2, 4, 11, '2023-12-09', '2023-12-16', '2023-12-12', '2023-12-09 09:28:00', '2023-12-09 09:28:00'),
(3, 4, 6, '2023-12-09', '2023-12-16', '2023-12-10', '2023-12-09 09:28:20', '2023-12-10 08:06:27'),
(4, 4, 7, '2023-12-09', '2023-12-16', '2023-12-16', '2023-12-09 09:28:28', '2023-12-09 09:28:28'),
(7, 4, 14, '2023-12-09', '2023-12-16', '2023-12-10', '2023-12-09 10:02:09', '2023-12-10 12:32:34'),
(8, 12, 16, '2023-12-10', '2023-12-17', NULL, '2023-12-09 21:47:18', '2023-12-09 21:47:18'),
(9, 4, 18, '2023-12-10', '2023-12-17', NULL, '2023-12-10 12:01:02', '2023-12-10 12:01:02'),
(10, 4, 17, '2023-12-10', '2023-12-17', NULL, '2023-12-10 12:02:37', '2023-12-10 12:02:37'),
(11, 3, 10, '2023-12-10', '2023-12-17', '2023-12-10', '2023-12-10 12:14:59', '2023-12-10 12:24:44'),
(12, 3, 13, '2023-12-10', '2023-12-17', '2023-12-10', '2023-12-10 12:17:01', '2023-12-10 12:19:53'),
(13, 3, 14, '2023-12-10', '2023-12-17', NULL, '2023-12-10 12:33:34', '2023-12-10 12:33:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'petugas', NULL, NULL),
(3, 'client', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `classification_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `types`
--

INSERT INTO `types` (`id`, `name`, `classification_id`, `created_at`, `updated_at`) VALUES
(1, 'comic', 1, NULL, NULL),
(2, 'novel', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `TempatLahir` varchar(255) NOT NULL,
  `TanggalLahir` varchar(255) NOT NULL,
  `nomorTlp` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `slug`, `profile_image`, `email`, `password`, `address`, `TempatLahir`, `TanggalLahir`, `nomorTlp`, `created_at`, `updated_at`, `role_id`) VALUES
(1, 'Amare Maliq Aradhana', 'mare', 'mare', 'mare_1702197963.jpg', 'amare.santoso@gmail.com', '$2y$10$1o6hw6jyzYRNpx1mHeR4guLRu6soUIevasShtOQBUqs/ap4IkZG8.', 'pondok bambu', 'jakarta', '2006-08-03', '+6287872025271', '2023-11-20 17:05:36', '2023-12-10 01:59:44', 1),
(2, 'zikryandri riedwan', 'ijik bilek lala aw', 'ijik-bilek-lala-aw', 'ijik bilek lala xixixi_1700705759.JPG', 'zikry@gmail.com', '$2y$10$Gp0Heq4wA7wlYvsEV4nchOmZnnfLiVutlBGK.D3Y6yINvyBhvnW.G', 'cipinang', 'jakarta', '2023-11-21', '+62658658', '2023-11-21 05:55:17', '2023-12-10 00:52:33', 2),
(3, 'Anandita Nayla Atha', 'dita', 'dita', 'dita_1700706254.JPG', 'anandita@gmail.com', '$2y$10$cSlqZu.hPNmrFiFwC8dMv.Zl4EtQk3jUwyA.YlpGL7aSOAPsyKiIe', 'Halim', 'jakarta', '2023-11-21', '+624676588', '2023-11-21 09:43:19', '2023-11-22 19:24:14', 3),
(4, 'Caesaro Kanahaya Widodo', 'aro', 'aro', 'aro_1700706278.JPG', 'caesaro@gmail.com', '$2y$10$GL28k/eK/f0CBvTKNjR3duF6ZCRVmu6l/p4UZuPMqUSLa8YdVgFna', 'Curug', 'jakarta', '2023-11-21', '+6257665785', '2023-11-21 09:44:53', '2023-12-10 11:59:48', 3),
(5, 'natasya ramadhani', 'aya', 'aya', 'aya_1700706321.JPG', 'natasya@gmail.com', '$2y$10$3sOUJhojT/C2H6fFzHq5ge0HlZ7et6JSkfYZIIJy0HLVpfgIH7uI.', 'tebet', 'jakarta', '2023-11-22', '+628343434', '2023-11-22 03:44:07', '2023-12-10 02:37:30', 2),
(6, 'fitri aryani', 'Tia', 'tia', 'Tia_1700706338.JPG', 'fitri@gmail.com', '$2y$10$9DX8nGZL.7m77PGujUoQl.D/tf1w77fXkdzzQZ1gELTUhmq1qWW22', 'cipinang', 'jakarta', '2023-11-22', '+353534', '2023-11-22 03:47:55', '2023-12-10 02:39:58', 3),
(7, 'Alan pratama rusfi', 'Alan', 'alan', 'Alan_1700650712.jpg', 'alan@gmail.com', '$2y$10$E4xF64eZ5CWh7fy300qSz.0lt2BC385lCYUa7h3dtqy9OOkfScXt6', 'bekasi', 'jakarta', '2023-11-22', '+62874663', '2023-11-22 03:58:32', '2023-12-10 02:40:16', 3),
(11, 'fikri aidil setiansyah', 'bdel 1', 'bdel-1', 'bdel_1700651728.png', 'aidil@gmail.com', '$2y$10$P3.QmReKFqDFIOS8UeJil.d36X2C4al0hDM17vsCJCPx6RXnOJAge', 'cipinang', 'jakarta', '2023-11-22', '+62876486473', '2023-11-22 04:15:28', '2023-12-10 02:40:30', 3),
(12, 'achmad surya saputra', 'aidil', 'aidil', 'aidil_1700652150.jpg', 'surya@gmail.com', '$2y$10$8tqd2.GlmoQRE82k.sel.eQcBdoL5PK9GjPwbfftaEDiJt4JUQaWu', 'cawang', 'jakarta', '2023-11-22', '+62876486473', '2023-11-22 04:22:30', '2023-12-10 02:40:49', 3),
(14, 'Fathul Bari', 'fbariaja', 'fbariaja', 'fbariaja_1700652801.jpg', 'bari@gmail.com', '$2y$10$hsevilvAoEEtESK0Sa.qwO8dJ2VpnOIi1Q.dEgjcVrVR0xk3FJiPS', 'kampung melayu', 'jakarta', '2023-11-22', '+628343434', '2023-11-22 04:33:21', '2023-12-10 02:41:01', 3),
(15, 'kevin aulia reynaldi', 'epin', 'epin', 'epin_1700696886.jpeg', 'kepin@gmail.com', '$2y$10$txZ33aD42QmhAyBLubS/Tu/XPt51PUKTNCd5yplSZI4AYz82Qn.tG', 'cawang', 'jakarta', '2023-11-23', '+62976769', '2023-11-22 16:48:06', '2023-11-22 16:48:06', 3),
(17, 'Aqiilah irsalina ahmad', 'qilo', 'qilo', 'qilo_1700705493.jpg', 'aqiilah@gmail.com', '$2y$10$tN20QyMrDwBjqRvjiNyAPOnGKQGj0aQXpRO91kMkw//HB0i4MNpYS', 'kampung melayu', 'jakarta', '2023-11-23', '+627867860', '2023-11-22 19:11:33', '2023-12-10 02:41:11', 3),
(18, 'Pratama Ridho', 'ido', 'ido', 'ido_1702201172.jpg', 'ridho@gmail.com', '$2y$10$oIJz.wN7rpjU9aFfyLv6P.w61m1xmwcOudVkfEamRG7PEUS7x6hxG', 'cakung', 'cakung', '2005-11-30', '+62876486473', '2023-12-10 02:39:32', '2023-12-10 02:39:32', 3);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_classification_id_foreign` (`classification_id`),
  ADD KEY `books_type_id_foreign` (`type_id`);

--
-- Indeks untuk tabel `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_category_book_id_foreign` (`book_id`),
  ADD KEY `book_category_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `classification`
--
ALTER TABLE `classification`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_logs_user_id_foreign` (`user_id`),
  ADD KEY `rent_logs_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `types_classification_id_foreign` (`classification_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `book_category`
--
ALTER TABLE `book_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `classification`
--
ALTER TABLE `classification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classification` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `books_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `book_category`
--
ALTER TABLE `book_category`
  ADD CONSTRAINT `book_category_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `book_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `rent_logs`
--
ALTER TABLE `rent_logs`
  ADD CONSTRAINT `rent_logs_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `rent_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `types`
--
ALTER TABLE `types`
  ADD CONSTRAINT `types_classification_id_foreign` FOREIGN KEY (`classification_id`) REFERENCES `classification` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
