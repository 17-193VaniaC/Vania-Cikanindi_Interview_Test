-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2022 at 03:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveltest`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(8, '2022_07_27_074828_create_presensi_table', 2),
(11, '2022_07_27_120842_create_perizinan_table', 3);

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
-- Table structure for table `perizinan`
--

CREATE TABLE `perizinan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_presensi` int(10) UNSIGNED NOT NULL,
  `jenis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perizinan`
--

INSERT INTO `perizinan` (`id`, `id_presensi`, `jenis`, `approved`) VALUES
(32, 4252705310, 'izin', 0),
(33, 2971067681, 'izin', 0),
(34, 2803896969, 'izin', 0),
(35, 878867310, 'sakit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `presensi`
--

CREATE TABLE `presensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jam_keluar` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `presensi`
--

INSERT INTO `presensi` (`id`, `id_user`, `status`, `tanggal`, `jam_masuk`, `jam_keluar`) VALUES
(878867310, '14021', 'alpha', '2022-08-19', '2022-07-28 13:01:27', NULL),
(2803896969, '14021', 'alpha', '2022-07-31', '2022-07-28 09:04:41', NULL),
(2971067681, '14021', 'alpha', '2022-07-30', '2022-07-28 09:04:24', NULL),
(4252705310, '2003', 'alpha', '2022-07-28', '2022-07-28 01:41:41', '2022-07-27 18:41:41'),
(4266989025, '2003', 'hadir', '2022-07-27', '2022-07-27 17:02:43', '2022-07-27 10:02:43'),
(4266989026, '14021', 'hadir', '2022-07-28', '2022-07-28 09:04:11', '2022-07-28 02:04:11'),
(4266989027, '21021', 'hadir', '2022-07-28', '2022-07-28 13:21:56', '2022-07-28 06:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_masuk` int(4) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fungsional` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `struktural` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `tahun_masuk`, `email`, `email_verified_at`, `password`, `fungsional`, `struktural`, `remember_token`, `created_at`, `updated_at`) VALUES
('0002', 'Admin2', 2000, 'test@gmail.com', NULL, '$2y$10$Doak/efqxqbtmyr5NnoRQ.V0cPTfZBdbOJLGwNALvb6YUFxLabC0i', '02', 'manajer', NULL, '2022-07-26 22:19:41', '2022-07-26 22:19:41'),
('09011', 'Staff', 2009, 'staff@gmail.com', NULL, '$2y$10$301aVAlnliO2QDQHszZ2fuYgQweZ/8lFRtJi4WD8zeR013cJb3yQ2', '01', 'staff', NULL, '2022-07-27 21:13:41', '2022-07-27 21:13:41'),
('11021', 'AdminStaff', 2011, 'adminstaff@gmail.com', NULL, '$2y$10$cQNAYFrIo74.icmFq89bbOzUWhAXErAKwiWgUAk0RhKaKUhyEduYq', '02', 'staff', NULL, '2022-07-27 21:14:43', '2022-07-27 21:14:43'),
('11031', '1111', 2011, 'test512@gmail.com', NULL, '$2y$10$EOzpf2FEr3RCXlOc767drOJydwheoB5x8nTzupQDA8WzFIQtWJlSq', '03', 'manajer', NULL, '2022-07-26 23:41:34', '2022-07-28 06:04:24'),
('12031', 'Halo', 2012, '1212@gmail.com', NULL, '$2y$10$QkMYnIppYgwCMziqNbqPLusflVdUtsYOQycsciW9ThOoAljIoPNYG', '03', 'staff', NULL, '2022-07-26 23:43:40', '2022-07-26 23:43:40'),
('14021', 'ManajerAdmin', 2014, 'ma@gmail.com', NULL, '$2y$10$qCmJ.nUoYBsMZcKpDSpwFOpuIHz2cB776vsTvtaFPaHxrNZUuyPrC', '02', 'manajer', NULL, '2022-07-27 20:46:55', '2022-07-27 20:46:55'),
('2003', 'Admin4', 2020, 'test3@gmail.com', NULL, '$2y$10$Dg9MCGceYvAh2jAjTSy9CuCWXW4KPzYl98DuBJVA1TudpaJ8uTcZm', '03', 'team leader', 'FPEgVrTR0YyghYOghxrtGVy37PCIyUAqjky7GgezqwEnxFbzOv7F59Woewl2', '2022-07-26 22:28:59', '2022-07-26 22:28:59'),
('2102', 'Admin4', 2021, 'test2@gmail.com', NULL, '$2y$10$BPVMxpq7iZlhWg4IsGmYl.hXr5Qwt0bVwCsy1noRmJlvJUG4p3tsq', '02', 'staff', NULL, '2022-07-26 22:26:55', '2022-07-26 22:26:55'),
('21021', 'Manajer', 2021, 'manajer@gmail.com', NULL, '$2y$10$eyf3AqziQNRvbFPMRxt59.9faMHT8sFUKavHwdc8gt423Dcsooru2', '01', 'manajer', NULL, '2022-07-27 21:01:46', '2022-07-27 21:01:46'),
('2202', 'Admin3', 2022, 'test1@gmail.com', NULL, '$2y$10$mVELYub8oijhS3kI2tQmJ.RH9g8LV5eA0MjVOdK2Xk.UguezdHspm', '02', 'manajer', NULL, '2022-07-26 22:25:53', '2022-07-26 22:25:53');

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
-- Indexes for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perizinan_id_presensi_foreign` (`id_presensi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `presensi_id_user_foreign` (`id_user`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `perizinan`
--
ALTER TABLE `perizinan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4266989028;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `perizinan`
--
ALTER TABLE `perizinan`
  ADD CONSTRAINT `perizinan_id_presensi_foreign` FOREIGN KEY (`id_presensi`) REFERENCES `presensi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `presensi`
--
ALTER TABLE `presensi`
  ADD CONSTRAINT `presensi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
