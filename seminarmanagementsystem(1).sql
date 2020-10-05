-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 06:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seminarmanagementsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission_statuses`
--

CREATE TABLE `admission_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_statuses`
--

INSERT INTO `admission_statuses` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Very Interested', 1, '2020-03-09 01:00:00', NULL),
(2, 'Interested', 1, '2020-03-09 01:00:00', NULL),
(3, 'Not Interested', 1, '2020-03-09 01:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `initial` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `status`, `initial`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 1, 'Web Design', '2020-03-05 05:40:07', '2020-03-05 05:43:51'),
(3, 'Web Developing', 1, 'Web Developing', '2020-03-05 05:41:44', '2020-03-05 05:41:44'),
(4, 'Python', 1, 'Python', '2020-03-05 05:41:55', '2020-03-05 05:41:55'),
(5, 'Laravel', 1, '', '2020-03-05 05:42:26', '2020-03-05 05:42:26'),
(6, 'Java', 1, '', '2020-03-08 11:54:27', '2020-03-08 11:54:27'),
(7, 'PHP', 1, '', '2020-03-08 11:54:43', '2020-03-08 11:54:43'),
(10, 'C++', 1, '', '2020-03-08 11:55:20', '2020-03-08 11:55:20'),
(11, 'Java Script', 1, '', '2020-03-08 11:55:45', '2020-03-08 11:55:45'),
(12, 'Grapic Design', 1, '', '2020-03-08 11:56:01', '2020-03-08 11:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_03_091531_create_user_roles_table', 2),
(5, '2014_10_12_000000_create_users_table', 3),
(7, '2020_03_05_090320_create_courses_table', 4),
(9, '2020_03_05_115245_create_teachers_table', 5),
(14, '2020_03_09_070911_create_admission_statuses_table', 7),
(17, '2020_03_07_203526_create_seminars_table', 9),
(18, '2020_03_09_071341_create_students_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`id`, `code`, `title`, `date`, `time`, `course`, `teacher_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(7, 'DIU-PHP-7', 'php workshop', '11/05/2020', '9:30 AM', 'PHP', 2, 'php-workshop_2020-09-16.jpg', 1, '2020-03-11 06:38:12', '2020-09-16 11:29:01'),
(8, 'DIU-Laravel-8', 'Laravel Workshop', '09/25/2020', '11:00 AM', 'Laravel', 1, 'laravel-workshop_2020-09-16.png', 1, '2020-03-11 06:39:13', '2020-09-16 11:28:00'),
(9, 'DIU-Python-9', 'Python Programming Workshop', '11/05/2020', '10:00 AM', 'Python', 3, 'python-programming-workshop_2020-09-16.jpg', 1, '2020-03-11 06:40:10', '2020-09-16 11:26:43'),
(10, 'DIU-Grapic Design-10', 'Grapic Design Seminar', '09/30/2020', '2:10 PM', 'Grapic Design', 6, 'grapic-design-seminar_2020-09-16.jpg', 1, '2020-03-11 06:41:42', '2020-09-16 11:25:00'),
(11, 'DIU-Web Developing-11', 'Web Developing Workshop', '10/01/2020', '11:40 AM', 'Web Developing', 3, 'web-developing-workshop_2020-09-16.jpg', 1, '2020-03-11 06:42:09', '2020-09-16 11:23:28'),
(12, 'DIU-Web Design-12', 'Web Design new workshop', '09/18/2020', '9:00 AM', 'Web Design', 2, 'web-design-new-workshop_2020-09-16.jpg', 1, '2020-03-11 06:42:57', '2020-09-16 11:21:55'),
(13, 'DIU-Web Developing-13', 'Programming with laravel 8', '09/16/2020', '10:30 AM', 'Web Developing', 6, 'programming-with-laravel-8_2020-09-16.png', 1, '2020-09-16 11:19:57', '2020-09-16 11:19:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seminar_id` int(11) NOT NULL,
  `admission_status` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `phone`, `image`, `seminar_id`, `admission_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shohel Rana', 'gsshohel1314@gmail.com', 1234334455, 'shohel-rana_2020-03-11.jpg', 12, 1, 0, '2020-03-11 07:13:14', '2020-03-11 07:13:14'),
(31, 'erwer', 'ass@gmail.com', 1234334455, 'erwer_2020-03-11.jpg', 11, 1, 0, '2020-03-11 12:24:45', '2020-03-11 12:24:45'),
(51, 'Almas Khan', 'almas@gmail.com', 1234334455, 'almas-khan_2020-03-12.jpg', 12, 1, 0, '2020-03-12 02:50:29', '2020-03-12 02:50:29'),
(63, 'Shohel Rana', 'gsshohel1314@gmail.com', 1234334455, 'shohel-rana_2020-03-12.jpg', 11, 1, 0, '2020-03-12 06:46:35', '2020-03-12 06:46:35'),
(64, 'shaid', 'shaid@gmail.com', 1234334455, 'shaid_2020-03-12.jpg', 12, 1, 0, '2020-03-12 06:48:00', '2020-03-12 06:48:00'),
(65, 'Shohel Rana', 'gsshohel1314@gmail.com', 1234334455, 'shohel-rana_2020-03-12.jpg', 10, 1, 0, '2020-03-12 06:48:30', '2020-03-12 06:48:30'),
(66, 'Almas Khan', 'almas@gmail.com', 1234334455, 'almas-khan_2020-03-12.jpg', 10, 2, 0, '2020-03-12 06:49:12', '2020-03-12 06:49:12'),
(67, 'sadf', 'addg@g.com', 1766445566, 'sadf_2020-03-12.jpg', 10, 2, 0, '2020-03-12 06:50:14', '2020-03-12 06:50:14'),
(68, 'grtertertert', 'rtreterterte@g.c', 1723559950, 'grtertertert_2020-03-12.jpg', 12, 1, 0, '2020-03-12 06:52:32', '2020-03-12 06:52:32'),
(69, 'Shohel Rana', 'gsshohel1314@gmail.com', 1234334455, 'shohel-rana_2020-03-13.jpg', 7, 2, 0, '2020-03-13 05:24:26', '2020-03-13 05:24:26'),
(70, 'Shohel Rana', 'ggsshohel1314@gmail.com', 145778866, 'shohel-rana_2020-06-23.png', 11, 1, 0, '2020-06-23 09:24:27', '2020-06-23 20:33:49'),
(71, 'student', 'student@gmail.com', 1213998877, 'student_2020-09-16.jpg', 8, 1, 0, '2020-09-16 11:39:25', '2020-09-16 11:39:25');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `course_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `email`, `phone`, `image`, `status`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Raihan Uddin', 'raihan@gmail.com', 1723445544, 'raihan-uddin_2020-03-05.jpg', 1, '3', '2020-03-05 07:03:21', '2020-03-05 08:17:08'),
(2, 'Nasim Kobir', 'nasim@gmail.com', 1766445566, 'nasim-kobir_2020-03-05.jpg', 1, '1', '2020-03-05 07:04:53', '2020-03-05 08:17:40'),
(3, 'Shohel Rana', 'gsshohel1314@gmail.com', 12345678, 'shohel-rana_2020-03-05.jpg', 1, '5', '2020-03-05 07:10:05', '2020-03-11 06:19:49'),
(6, 'Masud Rana', 'masud@gmail.com', 1234334455, 'masud-rana_2020-03-05.jpg', 1, '3', '2020-03-05 08:08:59', '2020-03-05 08:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role_id`, `image`, `status`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Shohel Rana', 'gsshohel1314@gmail.com', 1, 'shohel-rana_2020-03-03.jpg', 1, NULL, '$2y$10$whFj/npcsCDJlZKNxmdLRuknV8pPwqO53nQVWsmVhe4IL7RIioXRG', 'bAiX6QOqzuUFbv2ORCNmoqQ3CIvgnDCCrNUuk5W7Yi9ibAPK2n6eNhF9xFkr', '2020-03-03 04:37:13', '2020-03-13 08:06:49', NULL),
(2, 'Nasim Kobir', 'nasim@gmail.com', 2, 'nasim-kobir_2020-03-03.jpg', 1, NULL, '$2y$10$qqgxbj/zZnCddwMCMKYYiOuPgUWj8HbvU6nnfmEY58ubnprz46XK6', NULL, '2020-03-03 04:56:38', '2020-03-03 04:56:38', NULL),
(3, 'Sagor Banik', 'sagor@gmail.com', 3, 'sagor-banik_2020-03-03.jpg', 1, NULL, '$2y$10$QqvCafrAhA1arfAybUVTKeDyhqAKXhYaxHdtYJIrItTkFISLL3D8a', NULL, '2020-03-03 05:05:54', '2020-03-04 04:09:18', NULL),
(4, 'Raihan Uddin', 'raihan@gmail.com', 1, 'raihan-uddin_2020-03-03.png', 0, NULL, '$2y$10$CVbbthonrANtIPgKuqPNguRzy4.RGIIclNnj810Y46G8GXnAMhQmS', NULL, '2020-03-03 05:12:16', '2020-03-04 09:06:54', NULL),
(5, 'Almas Khan', 'almas@gmail.com', 3, 'almas-khan_2020-03-05.png', 0, NULL, '$2y$10$hC9cWhW/Yynjpdgql7tnX.5AV8X3hZdyHmjeGnK3YrWfRvTOPxpy.', NULL, '2020-03-03 05:17:48', '2020-03-05 07:52:19', NULL),
(6, 'Masud Rana', 'masud@gmail.com', 2, 'masud-rana_2020-03-03.jpg', 1, NULL, '$2y$10$4zOwSlGRzyfEkAzj6Comn.l6gTUpXkdbwgifeKFdM9QsLx30sqv1u', NULL, '2020-03-03 05:20:15', '2020-03-04 08:05:07', '2020-03-04 08:05:07'),
(8, 'Basir Uddin', 'basir@gmail.com', 3, 'basir-uddin_2020-03-03.jpg', 0, NULL, '$2y$10$0CMEDmdkbdKKSwdtXeSgAOKpy3iRSzH6bEkwqkni8oO4JtJfrjXVu', NULL, '2020-03-03 06:44:01', '2020-03-04 08:03:36', '2020-03-04 08:03:36'),
(15, 'Shaid', 'shaid@gmail.com', 3, 'shaid_2020-03-10.jpg', 0, NULL, '$2y$10$AyekTtve2/YDcUq4Ujj85.Z4w64NLRbAj83OliYP6XoB2mfb7HEnK', NULL, '2020-03-10 11:31:42', '2020-03-10 11:31:42', NULL),
(16, 'Mozid', 'mozid@gmail.com', 3, 'mozid_2020-03-10.jpg', 0, NULL, '$2y$10$hvO7JdKCg65zthgTFGQDmuUXGWJhId/kesSlb0b9JZryWs4tC4JnC', NULL, '2020-03-10 11:34:09', '2020-03-10 11:34:09', NULL),
(17, 'Kobir', 'kobir@gmail.com', 3, 'kobir_2020-03-10.jpg', 0, NULL, '$2y$10$ljV/1nY78Dba6kelOTLdZem5FWrptTAofd1Vckz0tLaXibkgFGTYC', NULL, '2020-03-10 12:12:14', '2020-03-10 12:12:14', NULL),
(18, 'Topu', 'topu@gmail.com', 3, 'topu_2020-03-11.jpg', 0, NULL, '$2y$10$UXjiFbKYkxSc2s/SKgc4N.V3hgSvhwXNTLFWQlnzARYxbCBmkW7QO', NULL, '2020-03-10 23:29:58', '2020-03-10 23:29:58', NULL),
(19, 'Topu', 'topuuuu@gmail.com', 3, 'topu_2020-03-11.jpg', 0, NULL, '$2y$10$q/YxuvGTzHorrw2eNf9GK.rQ1RtD9GvagE.m1C32mEBmBPGSbPU6.', NULL, '2020-03-10 23:33:29', '2020-03-10 23:33:29', NULL),
(20, 'Topu', 'topuuuu111@gmail.com', 3, 'topu_2020-03-11.jpg', 0, NULL, '$2y$10$be1HGtRI6jU9/oLvHp2EeecF3EPeoFOo6l2l6WNHKogMoG5BkgfjS', NULL, '2020-03-10 23:38:13', '2020-03-10 23:38:13', NULL),
(21, 'aaaa', 'aaa@g.com', 3, 'aaaa_2020-03-11.jpg', 0, NULL, '$2y$10$kqKpF1Vx0gHZevVyJv47uObfHAZYPxjKg/f.H3Ffj9hJROXplRURi', NULL, '2020-03-10 23:43:24', '2020-03-10 23:43:24', NULL),
(22, 'aaaa', 'ami@gmail.com', 3, 'aaaa_2020-03-11.jpg', 0, NULL, '$2y$10$ixAma2v27rOl.oXRWOIo3ep7U1CD0ui4xrV6hMMSrFtMun2Q/0YZ2', NULL, '2020-03-10 23:46:31', '2020-03-10 23:46:31', NULL),
(23, 'tumi', 'tumi@gmail.com', 3, 'tumi_2020-03-11.jpg', 0, NULL, '$2y$10$FJpl2O/LdojT3cG4OS8bYOcZi.RCJOAKW8mrPym9E9VLuxClJ5j5y', NULL, '2020-03-10 23:58:42', '2020-03-10 23:58:42', NULL),
(24, 'Johir', 'johir@gmail.com', 3, 'johir_2020-03-11.jpg', 0, NULL, '$2y$10$RliVt9V/KckeK05u0GdKPOd4Z3nAFkpLEPtl2aIx90Lq5qwx5CVHS', NULL, '2020-03-11 01:17:06', '2020-03-11 01:17:06', NULL),
(25, 'Johir', 'johirrr@gmail.com', 3, 'johir_2020-03-11.jpg', 0, NULL, '$2y$10$/GL20sFv42nqq0AguCzOW.wEWjNZarAk.ZsSqxqXbk3GRk0EZqaFu', NULL, '2020-03-11 01:18:15', '2020-03-11 01:18:15', NULL),
(26, 'Johir', 'johiriii@gmail.com', 3, 'johir_2020-03-11.jpg', 0, NULL, '$2y$10$00M/wdgXUiwXBfC2HmyOC.8p9Od5QZTeGH6rkwDFHaN5hwXJWqGBa', NULL, '2020-03-11 01:19:43', '2020-03-11 01:19:43', NULL),
(27, 'Johir', 'johirislam@gmail.com', 3, 'johir_2020-03-11.jpg', 1, NULL, '$2y$10$II9EuXp/wZTxD0kTfXYGn.Hhuvxdwkilde71MiBbNqeASMcZN.3PK', NULL, '2020-03-11 01:20:56', '2020-03-11 04:25:22', NULL),
(28, 'wwww', 'w@g.com', 3, 'wwww_2020-03-11.jpg', 1, NULL, '$2y$10$0j6.Qvx1ClVjNtIA0Ewo8.Jth3tNGadLl8pFkIZqKUt7mzd/pLI7u', NULL, '2020-03-11 01:26:31', '2020-09-15 19:56:20', NULL),
(29, 'borson', 'borson@gmail.com', 3, 'borson_2020-03-14.jpg', 0, NULL, '$2y$10$EzbPYXfg.3.AcSX3HpkFZepI6FlYvDzXZ.FPy3mwniFkFT4nPANMS', NULL, '2020-03-14 00:42:48', '2020-03-14 00:42:48', NULL),
(30, 'Rafi', 'rafi@gmail.com', 1, 'rafi_2020-09-16.jpg', 0, NULL, '$2y$10$wFtCxpiOORxYRmdekrFS0OGEZw73ahgCBbprsll54GutusTECiQB.', NULL, '2020-09-16 10:38:50', '2020-09-16 10:38:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, '2020-03-03 00:00:00', NULL),
(2, 'Teacher', 1, '2020-03-03 00:00:00', NULL),
(3, 'Student', 1, '2020-03-03 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admission_statuses`
--
ALTER TABLE `admission_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_roles_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admission_statuses`
--
ALTER TABLE `admission_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
