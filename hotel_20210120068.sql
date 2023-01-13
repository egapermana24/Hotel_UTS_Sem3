-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2022 at 12:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_20210120068`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(10) UNSIGNED NOT NULL,
  `kd_kamar` varchar(15) NOT NULL,
  `no_kamar` varchar(5) NOT NULL,
  `jenis` varchar(30) NOT NULL,
  `fasilitas` text NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `foto` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `kd_kamar`, `no_kamar`, `jenis`, `fasilitas`, `harga`, `stok`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'AAA', 'A01', 'Standard Room', 'Tempat Tidur, Shower', 150000, 44, '20221201220237.webp', '2022-12-01 14:43:23', '2022-12-01 15:06:58'),
(2, 'AAB', 'A02', 'Superior Room', 'Wifi, PS 5, Kulkas', 200000, 38, '20221201220606.webp', '2022-12-01 15:06:06', '2022-12-01 15:06:06'),
(3, 'AAC', 'A03', 'Deluxe Room', 'Kasur lebar, smart TV', 250000, 32, '20221201220806.webp', '2022-12-01 15:08:06', '2022-12-01 15:08:06'),
(4, 'AAD', 'A04', 'Twin Room', 'Dua Kasur, Komputer', 300000, 31, '20221201221003.webp', '2022-12-01 15:10:03', '2022-12-01 15:10:03'),
(5, 'AAE', 'A05', 'Single Room', 'AC, Kulkas, TV', 350000, 28, '20221201221156.webp', '2022-12-01 15:11:56', '2022-12-01 15:11:56'),
(6, 'AAF', 'A06', 'Double Room', 'Kamar Luas, kamar mandi luas', 400000, 25, '20221201221440.webp', '2022-12-01 15:14:40', '2022-12-01 15:14:40'),
(7, 'AAG', 'A07', 'Family Room', 'Tempat bermain anak, kasur banyak', 450000, 18, '20221201221638.webp', '2022-12-01 15:16:38', '2022-12-01 15:16:38'),
(8, 'AAH', 'A08', 'Junior Suite', 'Ramah anak, banyak permainan', 100000, 15, '20221201221827.webp', '2022-12-01 15:18:27', '2022-12-01 15:18:27'),
(9, 'AAI', 'A09', 'Suite Room', 'Wifi, PS 5, Mobil Remot', 450000, 8, '20221201222159.webp', '2022-12-01 15:21:59', '2022-12-01 15:21:59'),
(10, 'AAJ', 'A10', 'Presidential Suite', 'Spesial, Keren', 500000, 4, '20221201222338.webp', '2022-12-01 15:23:38', '2022-12-01 15:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_11_29_160805_tbl_kamar', 1),
(6, '2022_11_29_162429_tbl_reservasi', 1),
(7, '2022_11_30_154423_tbl_penginap', 1),
(8, '2022_12_01_035057_tbl_pengunjung', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penginap`
--

CREATE TABLE `penginap` (
  `id_penginap` int(10) UNSIGNED NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `lama_inap` int(11) NOT NULL,
  `nm_penginap` varchar(40) NOT NULL,
  `kd_kamar` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penginap`
--

INSERT INTO `penginap` (`id_penginap`, `tgl_masuk`, `tgl_keluar`, `lama_inap`, `nm_penginap`, `kd_kamar`, `jumlah`, `diskon`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
(1, '2022-12-03', '2022-12-07', 4, 'Agis', '4', 1, 0, 120000, 1320000, NULL, NULL),
(2, '2022-12-01', '2022-12-10', 9, 'Handika', '3', 3, 168750, 675000, 7256250, NULL, NULL),
(3, '2022-12-03', '2022-12-12', 9, 'Gina Fikria', '2', 4, 180000, 720000, 7740000, NULL, NULL),
(4, '2022-12-01', '2022-12-03', 2, 'Ega', '3', 5, 62500, 250000, 2687500, NULL, NULL),
(5, '2022-12-01', '2022-12-03', 2, 'Basari', '9', 2, 0, 180000, 1980000, NULL, NULL),
(6, '2022-12-02', '2022-12-03', 1, 'Bilqis', '1', 1, 0, 15000, 165000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id_pengunjung` int(10) UNSIGNED NOT NULL,
  `kd_penginap` int(11) NOT NULL,
  `kd_kamar` int(11) NOT NULL,
  `status` varchar(40) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengunjung`
--

INSERT INTO `pengunjung` (`id_pengunjung`, `kd_penginap`, `kd_kamar`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Check In', '2022-12-01 15:33:54', '2022-12-01 15:33:54'),
(2, 3, 4, 'Check Out', '2022-12-01 15:34:04', '2022-12-01 15:34:04'),
(4, 2, 3, 'Check In', '2022-12-01 15:34:27', '2022-12-01 15:34:27'),
(5, 4, 6, 'Check In', '2022-12-01 15:34:44', '2022-12-01 15:34:44'),
(6, 5, 9, 'Check Out', '2022-12-01 15:34:56', '2022-12-01 15:34:56'),
(7, 6, 5, 'Check Out', '2022-12-01 15:35:09', '2022-12-01 15:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(10) UNSIGNED NOT NULL,
  `tgl_reservasi` date NOT NULL,
  `nm_customer` varchar(40) NOT NULL,
  `kd_kamar` varchar(15) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` double NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `tgl_reservasi`, `nm_customer`, `kd_kamar`, `jumlah`, `diskon`, `pajak`, `total`, `created_at`, `updated_at`) VALUES
(1, '2022-12-02', 'Ega Permana', '2', 5, 25000, 100000, 1075000, NULL, NULL),
(2, '2022-12-15', 'Gina Fikria Sofha', '10', 1, 0, 50000, 550000, NULL, NULL),
(3, '2022-12-04', 'Handika Nur Fadli', '2', 3, 15000, 60000, 645000, NULL, NULL),
(4, '2022-12-03', 'Sugeng', '7', 2, 0, 90000, 990000, NULL, NULL),
(5, '2022-12-28', 'Lina', '4', 4, 30000, 120000, 1290000, NULL, NULL),
(6, '2022-12-03', 'Basari', '5', 1, 0, 35000, 385000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ega Permana', 'permanaega677@gmail.com', NULL, '$2a$12$dnLaahbCurd5NTNjyEHADuy718r7onE11V68ViMtMazDZ2OpMKMJ2', NULL, NULL, NULL);

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
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

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
-- Indexes for table `penginap`
--
ALTER TABLE `penginap`
  ADD PRIMARY KEY (`id_penginap`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `penginap`
--
ALTER TABLE `penginap`
  MODIFY `id_penginap` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id_pengunjung` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
