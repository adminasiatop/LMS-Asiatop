-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2024 at 04:53 AM
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
-- Database: `course`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `departemens`
--

CREATE TABLE `departemens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departemenCD` varchar(255) NOT NULL,
  `departemenName` varchar(255) NOT NULL,
  `divisiID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departemens`
--

INSERT INTO `departemens` (`id`, `departemenCD`, `departemenName`, `divisiID`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'Information Technology', 1, '2024-02-24 17:56:38', '2024-02-24 17:56:38'),
(2, 'GA', 'General Affair', 5, '2024-02-24 18:10:47', '2024-02-24 18:10:47'),
(3, 'HC', 'Human Capital', 5, '2024-02-24 18:11:37', '2024-02-24 18:11:37'),
(4, 'TM', 'Talent Management', 5, '2024-02-24 18:12:04', '2024-02-24 18:12:04'),
(5, 'FA', 'Finance', 6, '2024-02-25 19:19:08', '2024-02-25 19:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `divisis`
--

CREATE TABLE `divisis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisiCd` varchar(255) NOT NULL,
  `divisiName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisis`
--

INSERT INTO `divisis` (`id`, `divisiCd`, `divisiName`, `created_at`, `updated_at`) VALUES
(1, 'IT', 'Information Technology', '2024-02-24 01:55:34', '2024-02-24 01:55:34'),
(3, 'Comm', 'Commercial', '2024-02-24 01:59:57', '2024-02-24 01:59:57'),
(4, 'SCM', 'Supply Chain Management', '2024-02-24 02:01:24', '2024-02-24 02:01:24'),
(5, 'NonCom', 'Non Commercial edit', '2024-02-24 02:07:46', '2024-02-25 19:20:23'),
(6, 'FAAL', 'Finance Audit Accounting Legal', '2024-02-25 19:18:55', '2024-02-25 19:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `hirarkis`
--

CREATE TABLE `hirarkis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisiCD` varchar(255) NOT NULL,
  `departemenID` bigint(20) UNSIGNED NOT NULL,
  `urut` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `identifikasicoachings`
--

CREATE TABLE `identifikasicoachings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coachkaryawanID` bigint(20) UNSIGNED NOT NULL,
  `coacheekaryawanID` bigint(20) UNSIGNED NOT NULL,
  `tanggal` datetime NOT NULL,
  `permasalahan` varchar(255) DEFAULT NULL,
  `strategi` varchar(255) DEFAULT NULL,
  `rencana` varchar(255) DEFAULT NULL,
  `rekomendasi` varchar(255) DEFAULT NULL,
  `penilaian` varchar(255) DEFAULT NULL,
  `goal` varchar(255) DEFAULT NULL,
  `reality` varchar(255) DEFAULT NULL,
  `opsi` varchar(255) DEFAULT NULL,
  `will` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `identifikasicoachings`
--

INSERT INTO `identifikasicoachings` (`id`, `coachkaryawanID`, `coacheekaryawanID`, `tanggal`, `permasalahan`, `strategi`, `rencana`, `rekomendasi`, `penilaian`, `goal`, `reality`, `opsi`, `will`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2024-02-25 00:00:00', 'Permasalahan', 'Strategi', 'Rencana', NULL, NULL, 'Goal', 'Reality', 'Options', 'Will', '2024-02-24 23:05:57', '2024-02-24 23:05:57'),
(2, 6, 1, '2024-02-29 00:00:00', 'Birokrasi Kompleks', 'Bubarkan TKI', 'Improvisasi', NULL, NULL, 'Instalasi Maxindo', 'Menunggu TTD PKS', 'Melakukan Follow up ke Bagian Legal', 'Minggu ini', '2024-02-24 23:40:00', '2024-02-24 23:40:00');

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `divisiID` bigint(20) UNSIGNED NOT NULL,
  `departemenID` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `nik`, `nama`, `status`, `jabatan`, `divisiID`, `departemenID`, `created_at`, `updated_at`) VALUES
(1, '9102000', 'Berry Bahrum Wijaya', 'Aktif', 'Manager', 1, 1, '2024-02-24 19:26:51', '2024-02-24 23:11:45'),
(3, '9102001', 'Hardi Jaya Nugroho', 'Aktif', 'Supervisor', 1, 1, '2024-02-24 21:37:50', '2024-02-24 23:42:57'),
(6, '9102002', 'Bayu Wijaya', 'Aktif', 'General Manager', 1, 1, '2024-02-24 23:38:35', '2024-02-24 23:38:35'),
(7, '90120033', 'Noer Syamsi', 'Aktif', 'Staff', 1, 1, '2024-02-25 19:19:49', '2024-02-25 19:19:49');

-- --------------------------------------------------------


--
-- Indexes for table `departemens`
--
ALTER TABLE `departemens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departemens_divisiid_foreign` (`divisiID`);

--
-- Indexes for table `divisis`
--
ALTER TABLE `divisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hirarkis`
--
ALTER TABLE `hirarkis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identifikasicoachings`
--
ALTER TABLE `identifikasicoachings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `identifikasicoachings_coachkaryawanid_foreign` (`coachkaryawanID`),
  ADD KEY `identifikasicoachings_coacheekaryawanid_foreign` (`coacheekaryawanID`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_divisiid_foreign` (`divisiID`),
  ADD KEY `karyawans_departemenid_foreign` (`departemenID`);


--
-- AUTO_INCREMENT for table `departemens`
--
ALTER TABLE `departemens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `divisis`
--
ALTER TABLE `divisis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hirarkis`
--
ALTER TABLE `hirarkis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identifikasicoachings`
--
ALTER TABLE `identifikasicoachings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--


--
-- Constraints for table `departemens`
--
ALTER TABLE `departemens`
  ADD CONSTRAINT `departemens_divisiid_foreign` FOREIGN KEY (`divisiID`) REFERENCES `divisis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `identifikasicoachings`
--
ALTER TABLE `identifikasicoachings`
  ADD CONSTRAINT `identifikasicoachings_coacheekaryawanid_foreign` FOREIGN KEY (`coacheekaryawanID`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `identifikasicoachings_coachkaryawanid_foreign` FOREIGN KEY (`coachkaryawanID`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_departemenid_foreign` FOREIGN KEY (`departemenID`) REFERENCES `departemens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `karyawans_divisiid_foreign` FOREIGN KEY (`divisiID`) REFERENCES `divisis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
