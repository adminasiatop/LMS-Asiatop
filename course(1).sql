-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 11:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

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

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `series_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cnc`
--

CREATE TABLE `cnc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cnc_proses`
--

CREATE TABLE `cnc_proses` (
  `id` varchar(255) NOT NULL,
  `nama_coachee` varchar(255) NOT NULL,
  `jabatan_coachee` varchar(255) NOT NULL,
  `tanggal_pelaksanaan` varchar(255) NOT NULL,
  `nama_coach` varchar(255) NOT NULL,
  `jabatan_coach` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `reality` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `will` varchar(255) NOT NULL,
  `permasalahan` varchar(255) NOT NULL,
  `strategi` varchar(255) NOT NULL,
  `rencana_improvement` varchar(255) NOT NULL,
  `rekomendasi` varchar(255) NOT NULL,
  `penilaian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coachings`
--

CREATE TABLE `coachings` (
  `id` bigint(20) NOT NULL,
  `coachkaryawanID` bigint(20) NOT NULL,
  `coacheekaryawanID` bigint(20) NOT NULL,
  `tanggal` date NOT NULL,
  `topik` varchar(255) NOT NULL,
  `point` varchar(255) NOT NULL,
  `indikator` varchar(255) NOT NULL,
  `improvement` varchar(255) NOT NULL,
  `support` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `reality` varchar(255) NOT NULL,
  `opsi` varchar(255) NOT NULL,
  `will` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `coachings`
--

INSERT INTO `coachings` (`id`, `coachkaryawanID`, `coacheekaryawanID`, `tanggal`, `topik`, `point`, `indikator`, `improvement`, `support`, `goal`, `reality`, `opsi`, `will`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-03-04', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', 'test', '2024-03-03 23:41:37', '2024-03-03 23:41:37'),
(2, 1, 8, '2024-03-06', 'Topik Coaching', 'Poin-poin utama yang dibahas', 'Indikator Keberhasilan/Target', 'Area Improvement', 'Support System', 'Goal', 'Reality', 'Options', 'Will', '2024-03-06 00:04:46', '2024-03-06 00:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `counselings`
--

CREATE TABLE `counselings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coachkaryawanID` bigint(20) UNSIGNED NOT NULL,
  `coacheekaryawanID` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `topikkonseling` varchar(255) NOT NULL,
  `responsekonseling` varchar(255) NOT NULL,
  `fukonseling` varchar(255) NOT NULL,
  `targetkonseling` varchar(255) NOT NULL,
  `hasilkonseling` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counselings`
--

INSERT INTO `counselings` (`id`, `coachkaryawanID`, `coacheekaryawanID`, `tanggal`, `topikkonseling`, `responsekonseling`, `fukonseling`, `targetkonseling`, `hasilkonseling`, `summary`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-03-04', 'test', 'test', 'test', 'test', 'ptesto', 'test', '2024-03-03 19:57:06', '2024-03-03 23:28:08'),
(2, 1, 8, '2024-03-06', 'Topik conseling', 'Respon Counsele', 'Follow Up', 'Target', 'Hasil', 'Summary', '2024-03-06 00:06:34', '2024-03-06 00:06:34');

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
-- Table structure for table `form_coaching`
--

CREATE TABLE `form_coaching` (
  `id` varchar(255) NOT NULL,
  `nama_coache` varchar(255) NOT NULL,
  `jabatan_coache` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `nama_coach` varchar(255) NOT NULL,
  `jabatan_coach` varchar(255) NOT NULL,
  `jumlah_pertemuan` varchar(255) NOT NULL,
  `perioede_coaching` varchar(255) NOT NULL,
  `goal` varchar(255) NOT NULL,
  `reality` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL,
  `will` varchar(255) NOT NULL,
  `topic_coaching` varchar(255) NOT NULL,
  `point_dibahas` varchar(255) NOT NULL,
  `indikator_keberhasilan` varchar(255) NOT NULL,
  `area_improvement` varchar(255) NOT NULL,
  `support_system` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `form_conseling`
--

CREATE TABLE `form_conseling` (
  `id` varchar(255) NOT NULL,
  `nama_counsele` varchar(255) NOT NULL,
  `jabatan_counsele` varchar(255) NOT NULL,
  `nama_konselor` varchar(255) NOT NULL,
  `jabatan_konselor` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `topik_counseling` varchar(255) NOT NULL,
  `respon_counsele` varchar(255) NOT NULL,
  `follow_up` varchar(255) NOT NULL,
  `kriteria_keberhasilan` varchar(255) NOT NULL,
  `target` varchar(255) NOT NULL,
  `hasil` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `tanggal` date NOT NULL,
  `permasalahan` varchar(255) DEFAULT NULL,
  `strategi` varchar(255) DEFAULT NULL,
  `rencana` varchar(255) DEFAULT NULL,
  `r_coaching` int(11) DEFAULT NULL,
  `r_enhancement` int(11) DEFAULT NULL,
  `r_mentoring` int(11) DEFAULT NULL,
  `r_counseling` int(11) DEFAULT NULL,
  `r_meeting` int(11) DEFAULT NULL,
  `r_clinic` int(11) DEFAULT NULL,
  `p_leadership` int(11) NOT NULL,
  `p_developforothers` int(11) NOT NULL,
  `p_timemanagement` int(11) NOT NULL,
  `p_transferknowledge` int(11) NOT NULL,
  `p_monitoringlaporanteam` int(11) NOT NULL,
  `p_idealhabits` int(11) NOT NULL,
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

INSERT INTO `identifikasicoachings` (`id`, `coachkaryawanID`, `coacheekaryawanID`, `tanggal`, `permasalahan`, `strategi`, `rencana`, `r_coaching`, `r_enhancement`, `r_mentoring`, `r_counseling`, `r_meeting`, `r_clinic`, `p_leadership`, `p_developforothers`, `p_timemanagement`, `p_transferknowledge`, `p_monitoringlaporanteam`, `p_idealhabits`, `goal`, `reality`, `opsi`, `will`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-02-25', 'Permasalahan', 'Strategi', 'Rencana', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 'Goal', 'Reality', 'Options', 'Will', '2024-02-24 23:05:57', '2024-03-05 04:26:52'),
(2, 6, 1, '2024-02-29', 'Birokrasi Kompleks', 'Bubarkan TKI', 'Improvisasi', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 'Instalasi Maxindo', 'Menunggu TTD PKS', 'Melakukan Follow up ke Bagian Legal', 'Minggu ini', '2024-02-24 23:40:00', '2024-02-24 23:40:00'),
(3, 6, 1, '2024-02-26', 'Belum ada proses bisnis yang jelas', 'Merumuskan strategi atau proses bisnis yang akan dibuat oleh system LMS', 'Meeting dengan tim HC selaku user interval seminggu sekali di hari jumat', NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 0, 'Implementasi LMS', 'Dalam proses Desain', 'Memberikan arahan', 'Membuat timeline', '2024-02-25 21:13:14', '2024-02-25 21:13:14'),
(31, 1, 7, '2024-03-06', 'Permasalahan yang di hadapi Coachee', 'Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee', 'Rencana Improvement yang akan dilakukan', 1, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, 0, 'Goal', 'Reality', 'Options', 'Will', '2024-03-06 00:25:44', '2024-03-06 00:25:44'),
(32, 1, 1, '2024-03-06', 'Permasalahan yang di hadapi Coachee', 'Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee', 'Rencana Improvement yang akan dilakukan', 1, NULL, NULL, NULL, 1, NULL, 0, 0, 0, 0, 0, 0, 'Goal', 'Reality', 'Options', 'Will', '2024-03-06 00:26:32', '2024-03-06 00:26:32'),
(33, 1, 1, '2024-03-07', 'Permasalahan yang di hadapi Coachee', 'Strategi/Tindakan jangka pendek yang sudah dilakukan oleh Coachee', 'Rencana Improvement yang akan dilakukan', NULL, NULL, NULL, NULL, NULL, NULL, 3, 2, 1, 2, 3, 2, 'Goal', 'Reality', 'Options', 'Will', '2024-03-06 00:31:30', '2024-03-06 00:31:47');

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
(7, '9119929', 'Noer Syamsy', 'Aktif', 'Staff', 1, 1, '2024-02-25 19:19:49', '2024-02-29 01:24:11'),
(8, '9118299', 'Kamaludin Noviyanto', 'Aktif', 'Staff', 1, 1, '2024-02-29 01:42:06', '2024-02-29 01:42:19'),
(9, '500001', 'Panji Ahmad', 'Akitf', 'Staff', 1, 1, '2024-02-29 23:34:08', '2024-02-29 23:34:08');

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
(5, '2022_04_26_072833_create_permission_tables', 1),
(6, '2022_04_26_135213_create_tags_table', 1),
(7, '2022_04_26_155538_create_series_table', 1),
(8, '2022_04_27_010628_create_series_tag_table', 1),
(9, '2022_04_27_064029_create_videos_table', 1),
(10, '2022_04_29_155514_create_carts_table', 1),
(11, '2022_04_30_034346_create_transactions_table', 1),
(12, '2022_04_30_124114_create_transaction_details_table', 1),
(13, '2024_02_21_065149_create_sessions_table', 2),
(15, '2024_02_21_071347_create_cnc', 3),
(16, '2024_02_26_042840_create_coachings_table', 4),
(17, '2024_03_02_055218_create_events_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 9118297),
(2, 'App\\Models\\User', 9118298),
(2, 'App\\Models\\User', 9118299),
(2, 'App\\Models\\User', 9118300),
(2, 'App\\Models\\User', 9119929),
(2, 'App\\Models\\User', 9119930);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rekomendasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekomendasi`
--

INSERT INTO `rekomendasi` (`id`, `rekomendasi`) VALUES
(1, 'Coaching one on one'),
(2, 'Training Enhancement'),
(3, 'Join Field Work (Mentoring)'),
(4, 'Counseling'),
(5, 'Meeting'),
(6, 'Sales Clinic');

-- --------------------------------------------------------

--
-- Table structure for table `rekomendasi_tag`
--

CREATE TABLE `rekomendasi_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identifikasi_id` bigint(20) UNSIGNED NOT NULL,
  `rekomendasi_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2024-02-20 21:10:57', '2024-02-20 21:10:57'),
(2, 'member', 'web', '2024-02-20 21:10:57', '2024-02-20 21:10:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `user_id`, `name`, `slug`, `cover`, `level`, `status`, `description`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 'Satu', 'satu', 'xTWH2CUkQKHwh8ZyR2bKMQF9r9gcErrO4QYhfRTl.jpg', 'Advanced', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius viverra elit eget egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sollicitudin, enim ut ultrices pretium, diam felis molestie purus, a egestas ligula velit sit amet tellus. In cursus magna vitae diam ullamcorper pharetra. Phasellus et pellentesque lorem, nec interdum justo. In auctor, nunc sit amet vestibulum sagittis, purus justo facilisis augue, blandit eleifend sapien orci eu leo. Donec iaculis augue sit amet turpis blandit aliquam. Nam in ligula id enim venenatis molestie at at quam. Nullam id molestie ante. Donec porta vitae mi rutrum sagittis. Nulla aliquet dui sit amet orci maximus, sit amet imperdiet ipsum tempor. Phasellus eget tempor est. Sed placerat scelerisque porta. Nunc fermentum turpis quam, sit amet feugiat massa tempor non.\r\n\r\nSuspendisse elementum velit elit, non euismod magna tincidunt vel. Proin ultrices sodales sem ac sodales. Duis mattis dui est, viverra convallis lacus aliquet id. Quisque vitae dignissim eros, id sollicitudin mauris. Fusce convallis bibendum rutrum. Ut gravida, elit et porta dictum, nisi dolor egestas lectus, et eleifend libero purus ut quam. Etiam rhoncus at ligula at cursus. Vivamus eu hendrerit lacus, vitae porta elit. Nunc convallis sapien ac purus feugiat aliquet.\r\n\r\nSed velit ante, bibendum quis auctor quis, vehicula ut massa. Praesent ornare condimentum sem eu malesuada. Maecenas fringilla leo vel eros scelerisque condimentum. Vestibulum a feugiat tellus. Maecenas ut luctus diam. Aliquam hendrerit est ut ex feugiat congue. Fusce eu tempor ante.\r\n\r\nMorbi aliquet rhoncus lobortis. Nunc commodo, augue quis elementum auctor, diam metus consequat lacus, et elementum justo neque nec quam. Nullam cursus suscipit eros, at porta purus. Duis hendrerit aliquam nunc, id eleifend ex dictum in. Integer eget molestie ex. Sed venenatis enim sit amet ipsum malesuada luctus. Morbi ac rhoncus turpis, eget aliquam sapien. Cras mauris leo, maximus suscipit justo eget, dapibus faucibus metus. Proin ornare fermentum erat ut porta.\r\n\r\nNullam convallis, risus et hendrerit vehicula, nisi ante sollicitudin lectus, vel bibendum risus ante ac diam. Etiam id sem scelerisque, varius felis in, varius ante. Maecenas in elit placerat massa rutrum hendrerit. Nam ultrices, nulla non lacinia porttitor, dui est lacinia lacus, in iaculis nisl felis id neque. Vivamus non nulla tellus. Quisque bibendum, ante mollis faucibus sodales, lectus nisi imperdiet urna, at pulvinar mauris lorem sed nisi. Vivamus finibus egestas neque et fermentum.', 0, '2024-03-04 02:34:05', '2024-03-05 04:04:59'),
(3, 1, 'Dua', 'dua', 'fyosIuj7j4hjslYyMx0SDdB5GJ3Cwkkc9opxYwkL.png', 'Intermediate', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius viverra elit eget egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sollicitudin, enim ut ultrices pretium, diam felis molestie purus, a egestas ligula velit sit amet tellus. In cursus magna vitae diam ullamcorper pharetra. Phasellus et pellentesque lorem, nec interdum justo. In auctor, nunc sit amet vestibulum sagittis, purus justo facilisis augue, blandit eleifend sapien orci eu leo. Donec iaculis augue sit amet turpis blandit aliquam. Nam in ligula id enim venenatis molestie at at quam. Nullam id molestie ante. Donec porta vitae mi rutrum sagittis. Nulla aliquet dui sit amet orci maximus, sit amet imperdiet ipsum tempor. Phasellus eget tempor est. Sed placerat scelerisque porta. Nunc fermentum turpis quam, sit amet feugiat massa tempor non.\r\n\r\nSuspendisse elementum velit elit, non euismod magna tincidunt vel. Proin ultrices sodales sem ac sodales. Duis mattis dui est, viverra convallis lacus aliquet id. Quisque vitae dignissim eros, id sollicitudin mauris. Fusce convallis bibendum rutrum. Ut gravida, elit et porta dictum, nisi dolor egestas lectus, et eleifend libero purus ut quam. Etiam rhoncus at ligula at cursus. Vivamus eu hendrerit lacus, vitae porta elit. Nunc convallis sapien ac purus feugiat aliquet.\r\n\r\nSed velit ante, bibendum quis auctor quis, vehicula ut massa. Praesent ornare condimentum sem eu malesuada. Maecenas fringilla leo vel eros scelerisque condimentum. Vestibulum a feugiat tellus. Maecenas ut luctus diam. Aliquam hendrerit est ut ex feugiat congue. Fusce eu tempor ante.\r\n\r\nMorbi aliquet rhoncus lobortis. Nunc commodo, augue quis elementum auctor, diam metus consequat lacus, et elementum justo neque nec quam. Nullam cursus suscipit eros, at porta purus. Duis hendrerit aliquam nunc, id eleifend ex dictum in. Integer eget molestie ex. Sed venenatis enim sit amet ipsum malesuada luctus. Morbi ac rhoncus turpis, eget aliquam sapien. Cras mauris leo, maximus suscipit justo eget, dapibus faucibus metus. Proin ornare fermentum erat ut porta.\r\n\r\nNullam convallis, risus et hendrerit vehicula, nisi ante sollicitudin lectus, vel bibendum risus ante ac diam. Etiam id sem scelerisque, varius felis in, varius ante. Maecenas in elit placerat massa rutrum hendrerit. Nam ultrices, nulla non lacinia porttitor, dui est lacinia lacus, in iaculis nisl felis id neque. Vivamus non nulla tellus. Quisque bibendum, ante mollis faucibus sodales, lectus nisi imperdiet urna, at pulvinar mauris lorem sed nisi. Vivamus finibus egestas neque et fermentum.', 0, '2024-03-04 02:37:31', '2024-03-05 04:04:54'),
(4, 0, 'Tiga', 'tiga', 'UUmkZCsiKODgc0O4W0Qpc1WN1BnnttUwGn93BORm.png', 'Beginner', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque varius viverra elit eget egestas. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec sollicitudin, enim ut ultrices pretium, diam felis molestie purus, a egestas ligula velit sit amet tellus. In cursus magna vitae diam ullamcorper pharetra. Phasellus et pellentesque lorem, nec interdum justo. In auctor, nunc sit amet vestibulum sagittis, purus justo facilisis augue, blandit eleifend sapien orci eu leo. Donec iaculis augue sit amet turpis blandit aliquam. Nam in ligula id enim venenatis molestie at at quam. Nullam id molestie ante. Donec porta vitae mi rutrum sagittis. Nulla aliquet dui sit amet orci maximus, sit amet imperdiet ipsum tempor. Phasellus eget tempor est. Sed placerat scelerisque porta. Nunc fermentum turpis quam, sit amet feugiat massa tempor non.\r\n\r\nSuspendisse elementum velit elit, non euismod magna tincidunt vel. Proin ultrices sodales sem ac sodales. Duis mattis dui est, viverra convallis lacus aliquet id. Quisque vitae dignissim eros, id sollicitudin mauris. Fusce convallis bibendum rutrum. Ut gravida, elit et porta dictum, nisi dolor egestas lectus, et eleifend libero purus ut quam. Etiam rhoncus at ligula at cursus. Vivamus eu hendrerit lacus, vitae porta elit. Nunc convallis sapien ac purus feugiat aliquet.\r\n\r\nSed velit ante, bibendum quis auctor quis, vehicula ut massa. Praesent ornare condimentum sem eu malesuada. Maecenas fringilla leo vel eros scelerisque condimentum. Vestibulum a feugiat tellus. Maecenas ut luctus diam. Aliquam hendrerit est ut ex feugiat congue. Fusce eu tempor ante.\r\n\r\nMorbi aliquet rhoncus lobortis. Nunc commodo, augue quis elementum auctor, diam metus consequat lacus, et elementum justo neque nec quam. Nullam cursus suscipit eros, at porta purus. Duis hendrerit aliquam nunc, id eleifend ex dictum in. Integer eget molestie ex. Sed venenatis enim sit amet ipsum malesuada luctus. Morbi ac rhoncus turpis, eget aliquam sapien. Cras mauris leo, maximus suscipit justo eget, dapibus faucibus metus. Proin ornare fermentum erat ut porta.\r\n\r\nNullam convallis, risus et hendrerit vehicula, nisi ante sollicitudin lectus, vel bibendum risus ante ac diam. Etiam id sem scelerisque, varius felis in, varius ante. Maecenas in elit placerat massa rutrum hendrerit. Nam ultrices, nulla non lacinia porttitor, dui est lacinia lacus, in iaculis nisl felis id neque. Vivamus non nulla tellus. Quisque bibendum, ante mollis faucibus sodales, lectus nisi imperdiet urna, at pulvinar mauris lorem sed nisi. Vivamus finibus egestas neque et fermentum.', 0, '2024-03-04 02:38:00', '2024-03-05 04:04:47'),
(5, 1, 'Empat', 'empat', 'k8s7e8oKpqS2cuUy654iJx1C15r2mxMvGEGQ5UOm.jpg', 'Advanced', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus gravida ultricies felis, in sagittis odio rutrum at. Proin a egestas eros. Vestibulum egestas bibendum nisl, in bibendum leo cursus et. Phasellus a consectetur lorem. Morbi aliquet, libero ut fermentum finibus, massa quam congue urna, quis efficitur eros felis a augue. In hac habitasse platea dictumst. Sed sagittis lectus vitae rutrum sodales. Mauris consectetur semper elit, ac tristique augue condimentum a. Morbi euismod ex urna, scelerisque condimentum sapien rhoncus sed. Phasellus finibus dapibus nulla, non tempor nunc pharetra id. Donec consectetur efficitur erat quis tincidunt. Cras lacinia dignissim mauris ut semper.\r\n\r\nAenean vel sapien nec felis bibendum iaculis in in purus. Praesent at lacus magna. Nunc maximus orci eget tempor imperdiet. Fusce vitae nisi ante. Aenean placerat ligula rutrum dui lobortis, sodales commodo sapien fringilla. Sed imperdiet sapien egestas libero convallis, et condimentum sapien rhoncus. Morbi non magna erat. Nunc pharetra ex ut vehicula varius. Integer neque nisi, imperdiet eu pretium aliquet, pretium id ipsum.\r\n\r\nVivamus feugiat nisi metus, sed aliquam velit tincidunt et. Vestibulum id ipsum euismod, rhoncus lorem quis, fermentum diam. Maecenas sit amet auctor dui, vitae volutpat urna. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In hac habitasse platea dictumst. Phasellus felis magna, laoreet non posuere vel, varius non nisi. Fusce non nisi quam. Ut ullamcorper, orci et rhoncus vulputate, magna felis cursus velit, a auctor augue nulla nec elit. Fusce sodales velit dui, eget ullamcorper augue molestie non. Vivamus fringilla turpis viverra mauris molestie pulvinar. Mauris tristique cursus nulla et tincidunt.\r\n\r\nDonec auctor magna placerat leo congue tristique. Donec sodales laoreet varius. Ut iaculis, sapien sit amet cursus dapibus, est turpis feugiat eros, sit amet accumsan diam ligula id eros. Sed vitae urna vel turpis semper rhoncus. Integer vitae orci faucibus, maximus turpis in, rutrum turpis. Nulla venenatis ullamcorper mi id sagittis. Donec sed volutpat turpis. Ut facilisis vitae tellus accumsan pellentesque. Vivamus vehicula sapien ut sem rhoncus, vitae ultrices purus eleifend. Nunc hendrerit quis nulla interdum bibendum. Vestibulum et dui sem. Cras imperdiet nisl tellus, sit amet congue lorem lacinia eget.\r\n\r\nEtiam dignissim erat a congue vehicula. Aenean euismod egestas leo, id dapibus nisi dapibus ultricies. Quisque gravida iaculis augue id pharetra. Etiam convallis nisi vel dictum auctor. Mauris scelerisque tincidunt est, ut egestas mauris pharetra volutpat. Aliquam tempor faucibus suscipit. Duis a nisl id nibh fermentum dapibus ac a nisl. Sed eget tortor nisl. Vestibulum mi odio, euismod vitae varius non, rutrum in nibh. Praesent auctor, enim sit amet feugiat commodo, sapien nibh vulputate urna, sit amet pellentesque velit urna id tellus. Duis vel eros odio. Etiam fermentum risus eget bibendum dignissim.', 0, '2024-03-05 04:04:22', '2024-03-05 04:04:22'),
(6, 1, 'test', 'test', 'zqx3nuObxZVI3kiKMzS4jbsym1IfSHMvnaUz33ZC.jpg', 'Advanced', 1, 'test', 0, '2024-03-06 00:51:15', '2024-03-06 00:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `series_tag`
--

CREATE TABLE `series_tag` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series_id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `series_tag`
--

INSERT INTO `series_tag` (`id`, `series_id`, `tag_id`) VALUES
(26, 2, 1),
(27, 2, 2),
(28, 2, 3),
(29, 2, 4),
(30, 2, 5),
(31, 3, 2),
(32, 3, 1),
(33, 3, 3),
(34, 3, 4),
(35, 3, 5),
(36, 4, 2),
(37, 4, 3),
(38, 5, 2),
(39, 5, 3),
(40, 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `slug`, `color`, `created_at`, `updated_at`) VALUES
(1, 'Training On Boarding', 'laravel', 'green', '2024-02-20 21:10:57', '2024-02-21 02:45:52'),
(2, 'Training Internal', 'react-js', 'orange', '2024-02-20 21:10:57', '2024-02-21 02:46:55'),
(3, 'Soft Skill', 'tailwind-css', 'dark cyan', '2024-02-20 21:10:57', '2024-02-21 02:47:05'),
(4, 'Hard Skills', 'bootstrap', 'teal', '2024-02-20 21:10:57', '2024-02-21 02:47:23'),
(5, 'Leadership', 'vue-js', 'azure', '2024-02-20 21:10:57', '2024-02-21 02:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `full_name`, `position`, `status`, `created_at`, `updated_at`) VALUES
(4, 9118298, 'Kuyang', 'admin', 1, '2024-03-05 02:22:30', '2024-03-05 02:22:30'),
(5, 9118298, 'Kuyang', 'admin', 1, '2024-03-05 02:30:41', '2024-03-05 02:30:41'),
(6, 9118299, 'Kamal', 'Staff', 1, '2024-03-05 02:50:15', '2024-03-05 02:50:15'),
(7, 9119929, 'Syamsy', 'Staff', 1, '2024-03-05 03:38:18', '2024-03-05 03:38:18'),
(8, 9120010, 'Berry Bahrum Wijaya', 'Managet', 1, '2024-03-06 18:11:25', '2024-03-06 18:11:25'),
(9, 9120010, 'Berry Bahrum', 'Mgr', 1, '2024-03-07 02:23:05', '2024-03-07 02:23:05'),
(10, 9120010, 'Berry Bahrum', 'Mgr', 1, '2024-03-07 02:32:34', '2024-03-07 02:32:34'),
(11, 9120010, 'Berry Bahrum', 'Mgr', 1, '2024-03-07 02:35:26', '2024-03-07 02:35:26'),
(12, 9120010, 'Berry Bahrum', 'Mgr', 1, '2024-03-07 02:35:41', '2024-03-07 02:35:41'),
(13, 9120010, 'Berry Bahrum', 'Mgr', 1, '2024-03-07 02:36:55', '2024-03-07 02:36:55'),
(14, 9120010, 'Berry Bahrum Wijaya', 'Mgr', 1, '2024-03-07 02:46:00', '2024-03-07 02:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `series_id` bigint(20) UNSIGNED NOT NULL,
  `grand_total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `series_id`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 0, '2024-03-03 21:09:06', '2024-03-03 21:09:06'),
(2, 2, 7, 0, '2024-03-03 21:10:21', '2024-03-03 21:10:21'),
(3, 3, 2, 0, '2024-03-04 21:55:27', '2024-03-04 21:55:27'),
(4, 3, 3, 0, '2024-03-04 21:55:27', '2024-03-04 21:55:27'),
(5, 3, 4, 0, '2024-03-04 21:55:27', '2024-03-04 21:55:27'),
(6, 4, 2, 0, '2024-03-05 02:22:30', '2024-03-05 02:22:30'),
(7, 5, 3, 0, '2024-03-05 02:30:41', '2024-03-05 02:30:41'),
(8, 5, 4, 0, '2024-03-05 02:30:41', '2024-03-05 02:30:41'),
(9, 6, 2, 0, '2024-03-05 02:50:15', '2024-03-05 02:50:15'),
(10, 7, 2, 0, '2024-03-05 03:38:18', '2024-03-05 03:38:18'),
(11, 8, 3, 0, '2024-03-06 18:11:25', '2024-03-06 18:11:25'),
(12, 9, 2, 0, '2024-03-07 02:23:05', '2024-03-07 02:23:05'),
(13, 13, 2, 0, '2024-03-07 02:36:55', '2024-03-07 02:36:55'),
(14, 14, 2, 0, '2024-03-07 02:46:00', '2024-03-07 02:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nik` varchar(8) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nik`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'IT Application & Development', '0', 'admin@asiatop.co.id', NULL, '$2y$10$TacloHKyjq4eDfmbekPzueffXl3XHtPIdZnzf.Za7tvBfT5DDQcIG', NULL, NULL, '2024-02-20 21:10:57', '2024-02-20 21:10:57'),
(9118297, 'Hardi Jaya Nugraha', '0', 'it-spvapplication@asiatop.co.id', NULL, '$2y$10$TacloHKyjq4eDfmbekPzueffXl3XHtPIdZnzf.Za7tvBfT5DDQcIG', NULL, NULL, '2024-02-20 21:10:57', '2024-02-20 21:10:57'),
(9118298, 'Berry Bahrum Wijaya', '9118298', 'man-mis@asiatop.co.id', NULL, '$2y$10$pRiO9jkkgCSnYvqYPyECbOW79kJgNYtTB0JqiUMi86toJXGEnsY8a', NULL, NULL, '2024-02-21 02:11:02', '2024-02-29 03:32:00'),
(9118299, 'kamal', '9118299', 'kamal@asiatop.co.id', NULL, '$2y$10$cBRx17wx/2CgEDTgvUFFCuSRSN1IuCPmsYzdbZSw3UUMpcbRpby8G', NULL, NULL, '2024-03-04 03:11:58', '2024-03-04 03:11:58'),
(9119929, 'Syamsy', '9119929', 'analisinapulau@asiatop.co.id', NULL, '$2y$10$5tbdQfDJLRWPx.BZND1lyuQgJl8GJhKNOjp5x/BfhaM/gnGIsdtaC', NULL, NULL, '2024-03-05 03:14:23', '2024-03-05 03:14:23'),
(9119930, 'berry', '', 'it@asiatop.co.id', NULL, '$2y$10$FCAH4YFjt6/hYnYlYLQeA.XYkK2fVf66O0ALguGiJ0NYZZo40neq6', NULL, NULL, '2024-03-06 18:10:31', '2024-03-07 02:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `series_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `episode` int(11) NOT NULL,
  `intro` tinyint(1) NOT NULL DEFAULT 0,
  `duration` time NOT NULL,
  `video_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `series_id`, `event_id`, `name`, `slug`, `episode`, `intro`, `duration`, `video_code`, `created_at`, `updated_at`) VALUES
(4, 2, 0, '1. Intro - Belajar Laravel', '1-intro-belajar-laravel', 1, 0, '14:22:00', 'https://www.youtube.com/watch?v=HqAMb6kqlLs&list=PLFIM0718LjIWiihbBIq-SWPU6b6x21Q_2&ab_channel=WebProgrammingUNPAS', '2024-03-05 02:56:54', '2024-03-05 02:56:54'),
(6, 3, 0, 'Laravel 2', 'laravel-2', 1, 0, '12:22:00', 'https://www.youtube.com/watch?v=0g7HqfsCX4Y', '2024-03-05 03:18:50', '2024-03-05 03:18:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_series_id_foreign` (`series_id`);

--
-- Indexes for table `cnc`
--
ALTER TABLE `cnc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coachings`
--
ALTER TABLE `coachings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counselings`
--
ALTER TABLE `counselings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coachings_coachkaryawanid_foreign` (`coachkaryawanID`),
  ADD KEY `coachings_coacheekaryawanid_foreign` (`coacheekaryawanID`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `karyawans_departemenid_foreign` (`departemenID`),
  ADD KEY `nik_user_foreign` (`nik`(8));

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekomendasi_tag`
--
ALTER TABLE `rekomendasi_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series_tag`
--
ALTER TABLE `series_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `series_tag_series_id_foreign` (`series_id`),
  ADD KEY `series_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_series_id_foreign` (`series_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `nik_karyawan_foreign` (`nik`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_series_id_foreign` (`series_id`),
  ADD KEY `videos_event_id_foreign` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `cnc`
--
ALTER TABLE `cnc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coachings`
--
ALTER TABLE `coachings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `counselings`
--
ALTER TABLE `counselings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `identifikasicoachings`
--
ALTER TABLE `identifikasicoachings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rekomendasi_tag`
--
ALTER TABLE `rekomendasi_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `series_tag`
--
ALTER TABLE `series_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9119931;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `counselings`
--
ALTER TABLE `counselings`
  ADD CONSTRAINT `coachings_coacheekaryawanid_foreign` FOREIGN KEY (`coacheekaryawanID`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `coachings_coachkaryawanid_foreign` FOREIGN KEY (`coachkaryawanID`) REFERENCES `karyawans` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `series_tag`
--
ALTER TABLE `series_tag`
  ADD CONSTRAINT `series_tag_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `series_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_series_id_foreign` FOREIGN KEY (`series_id`) REFERENCES `series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
