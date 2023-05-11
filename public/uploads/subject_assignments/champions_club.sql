-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3310
-- Generation Time: May 09, 2023 at 05:21 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `champions_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@website.com', NULL, '$2y$10$3SD3e7cNFLkNbDtxCoX7vOD3S1nsguNCbNYexCODJUYwMyYs4hMM2', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_date` date DEFAULT NULL,
  `session_no` int(11) DEFAULT NULL,
  `membership_details_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attend` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 >> abcent ,1>>active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `session_date`, `session_no`, `membership_details_id`, `child_id`, `attend`, `created_at`, `updated_at`) VALUES
(1, '2023-04-30', 11, 1, 1, '0', NULL, '2023-04-29 21:21:25'),
(2, '2023-05-03', 12, 1, 1, '1', NULL, '2023-04-30 17:08:19'),
(3, '2023-05-07', 13, 1, 1, '0', NULL, '2023-04-30 17:08:19'),
(4, '2023-05-10', 14, 1, 1, '1', NULL, '2023-04-30 17:08:19'),
(5, '2023-05-14', 15, 1, 1, '0', NULL, '2023-04-29 21:21:25'),
(6, '2023-05-17', 16, 1, 1, '1', NULL, '2023-04-29 21:21:25'),
(7, '2023-05-21', 17, 1, 1, '0', NULL, NULL),
(8, '2023-05-24', 18, 1, 1, '1', NULL, '2023-04-29 21:21:25'),
(9, '2023-02-06', 2, 5, 5, '0', NULL, NULL),
(10, '2023-02-13', 4, 5, 5, '0', NULL, NULL),
(11, '2023-02-20', 6, 5, 5, '0', NULL, NULL),
(12, '2023-02-27', 8, 5, 5, '0', NULL, NULL),
(13, '2023-03-06', 10, 5, 5, '0', NULL, NULL),
(14, '2023-02-05', 1, 5, 5, '0', NULL, NULL),
(15, '2023-02-12', 3, 5, 5, '0', NULL, NULL),
(16, '2023-02-19', 5, 5, 5, '0', NULL, NULL),
(17, '2023-02-26', 7, 5, 5, '0', NULL, NULL),
(18, '2023-03-05', 9, 5, 5, '0', NULL, NULL),
(19, '2023-06-05', 1, 43, 44, '0', '2023-05-01 21:28:35', '2023-05-01 21:28:35'),
(20, '2023-05-08', 1, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(21, '2023-05-11', 2, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(22, '2023-05-15', 3, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(23, '2023-05-18', 4, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(24, '2023-05-22', 5, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(25, '2023-05-25', 6, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(26, '2023-05-29', 7, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(27, '2023-06-01', 8, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(28, '2023-06-05', 9, 53, 54, '0', '2023-05-01 21:45:29', '2023-05-01 21:45:29'),
(29, '2023-05-08', 1, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(30, '2023-05-11', 2, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(31, '2023-05-15', 3, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(32, '2023-05-18', 4, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(33, '2023-05-22', 5, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(34, '2023-05-25', 6, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(35, '2023-05-29', 7, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(36, '2023-06-01', 8, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(37, '2023-06-05', 9, 54, 55, '0', '2023-05-01 21:53:27', '2023-05-01 21:53:27'),
(38, '2023-05-08', 1, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(39, '2023-05-11', 2, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(40, '2023-05-15', 3, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(41, '2023-05-18', 4, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(42, '2023-05-22', 5, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(43, '2023-05-25', 6, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(44, '2023-05-29', 7, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(45, '2023-06-01', 8, 55, 56, '0', '2023-05-01 21:54:08', '2023-05-01 21:54:08'),
(46, '2023-05-08', 1, 56, 57, '0', NULL, NULL),
(47, '2023-05-11', 2, 56, 57, '0', NULL, NULL),
(48, '2023-05-15', 3, 56, 57, '0', NULL, NULL),
(49, '2023-05-18', 4, 56, 57, '0', NULL, NULL),
(50, '2023-05-22', 5, 56, 57, '0', NULL, NULL),
(51, '2023-05-25', 6, 56, 57, '0', NULL, NULL),
(52, '2023-05-29', 7, 56, 57, '0', NULL, NULL),
(53, '2023-06-01', 8, 56, 57, '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `branch_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_map` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `master_branch` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1 , 0',
  `working_hours_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `working_hours_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_master_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_master_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_details_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_details_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports_text_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sports_text_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_text_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_text_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `services_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_text_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_text_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_text_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_text_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `news_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `about_master_en`, `about_master_ar`, `about_details_en`, `about_details_ar`, `about_video`, `sports_title_en`, `sports_title_ar`, `sports_text_en`, `sports_text_ar`, `services_text_en`, `services_text_ar`, `services_title_en`, `services_title_ar`, `membership_text_en`, `membership_text_ar`, `membership_title_en`, `membership_title_ar`, `news_text_en`, `news_text_ar`, `news_title_en`, `news_title_ar`, `created_at`, `updated_at`) VALUES
(1, 'about_master_en', 'about_master_ar', 'about_details_en', 'about_details_ar', 'about_video', 'sports_title_en', 'sports_title_ar', 'sports_text_en', 'sports_text_ar', 'services_text_en', 'services_text_ar', 'services_title_en', 'services_title_ar', 'membership_text_en', 'membership_text_ar', 'membership_title_en', 'membership_title_ar', 'news_text_en', 'news_text_ar', 'news_title_en', 'news_title_ar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cups`
--

CREATE TABLE `cups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `day_news`
--

CREATE TABLE `day_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `en_day` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ar_day` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `day_news`
--

INSERT INTO `day_news` (`id`, `en_day`, `ar_day`, `created_at`, `updated_at`) VALUES
(1, 'Monday', 'الاثنين', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(2, 'Tuesday', 'الثلاثاء', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(3, 'Wednesday', 'الاربعاء', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(4, 'Thursday', 'الخميس', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(5, 'Friday', 'الجمعة', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(6, 'Saturday', 'السبت', '2023-04-28 14:24:58', '2023-04-28 14:24:58'),
(7, 'Sunday', 'الاحد', '2023-04-28 14:24:58', '2023-04-28 14:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `general_services`
--

CREATE TABLE `general_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membership_details`
--

CREATE TABLE `membership_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sport_days_id` bigint(20) UNSIGNED DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `fees` double(8,2) DEFAULT NULL,
  `user_comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_details`
--

INSERT INTO `membership_details` (`id`, `invoice_id`, `child_id`, `sport_id`, `sport_days_id`, `start_date`, `end_date`, `fees`, `user_comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '2023-04-29', '2023-05-29', 500.00, NULL, NULL, NULL),
(2, 2, 2, 2, 2, '2023-05-01', '2023-06-01', 300.00, NULL, NULL, NULL),
(3, 3, 3, 1, 1, '2023-05-01', '2023-06-01', 1000.00, 'first', NULL, NULL),
(4, 4, 4, 2, 2, '2023-06-01', '2023-07-01', 300.00, 'second', NULL, NULL),
(5, 5, 5, 2, 2, '2023-02-04', '2023-03-04', 300.00, NULL, NULL, NULL),
(17, 17, 18, 2, 2, '2023-05-07', '2023-06-07', 300.00, NULL, NULL, NULL),
(43, 43, 44, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(44, 44, 45, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(46, 46, 47, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(47, 47, 48, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(48, 48, 49, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(49, 49, 50, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(50, 50, 51, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(51, 51, 52, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(52, 52, 53, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(53, 53, 54, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(54, 54, 55, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(55, 55, 56, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL),
(56, 56, 57, 2, 2, '2023-05-07', '2023-06-02', 300.00, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `membership_invoices`
--

CREATE TABLE `membership_invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `order_total` double(8,2) DEFAULT NULL,
  `vat_perc` double(8,2) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `invoice_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 >> cart ,1>>complete',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `membership_invoices`
--

INSERT INTO `membership_invoices` (`id`, `invoice_date`, `order_total`, `vat_perc`, `user_id`, `invoice_status`, `created_at`, `updated_at`) VALUES
(1, '2023-04-24', 500.00, 14.00, 1, '1', NULL, NULL),
(2, '2023-04-30', 342.00, 0.14, 1, '0', NULL, NULL),
(3, '2023-04-30', NULL, 0.14, 1, '0', NULL, NULL),
(4, '2023-04-30', 1482.00, 0.14, 1, '0', NULL, NULL),
(5, '2023-02-01', 342.00, 0.14, 1, '0', NULL, NULL),
(17, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(43, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(44, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(46, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(47, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(48, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(49, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(50, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(51, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(52, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(53, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(54, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(55, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL),
(56, '2023-05-01', 342.00, 0.14, 1, '0', NULL, NULL);

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
(1, '2014_09_22_155823_create_admins_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_03_18_152622_create_companies_table', 1),
(7, '2023_03_18_152817_create_cups_table', 1),
(8, '2023_03_18_152949_create_slider_images_table', 1),
(9, '2023_03_18_153009_create_general_services_table', 1),
(10, '2023_03_18_153032_create_sports_table', 1),
(11, '2023_03_18_153101_create_services_table', 1),
(12, '2023_03_18_153212_create_news_events_table', 1),
(13, '2023_03_18_153233_create_social_links_table', 1),
(14, '2023_03_18_153312_create_sponsors_table', 1),
(15, '2023_03_18_153349_create_branches_table', 1),
(16, '2023_04_28_155003_add_data_to_sports_table', 2),
(17, '2023_04_28_155553_create_user_childrens_table', 2),
(18, '2023_04_28_155615_create_membership_invoices_table', 2),
(19, '2023_04_28_155630_create_membership_details_table', 2),
(20, '2023_04_28_155646_create_sports_days_table', 2),
(21, '2023_04_28_155702_create_attendances_table', 2),
(22, '2023_04_28_155718_create_day_news_table', 2),
(23, '2023_04_28_161309_relations', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_events`
--

CREATE TABLE `news_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  `brief_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brief_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider_images`
--

CREATE TABLE `slider_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default_slider.jpg',
  `title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `overview_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_subtitle_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_subtitle_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider_images`
--

INSERT INTO `slider_images` (`id`, `image`, `title_en`, `title_ar`, `subtitle_en`, `subtitle_ar`, `overview_en`, `overview_ar`, `nav_title_en`, `nav_title_ar`, `nav_subtitle_en`, `nav_subtitle_ar`, `created_at`, `updated_at`) VALUES
(2, 'default_slider.jpg', 'school choice', 'الشهادة الاولى', 'bbb', 'الشهادة', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل', 'test', 'اختبار', 'Nav-SubTitle', 'عنوان فرعى', '2023-03-28 17:20:27', '2023-03-28 17:20:27'),
(3, '64309f933ef7asafe.webp', 'الشهادة الثانية', 'الشهادة الثانية', 'bbb', 'الشهادة', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s,', 'لوريم إيبسوم طريقة لكتابة النصوص في النشر والتصميم الجرافيكي تستخدم بشكل شائع لتوضيح الشكل المرئي للمستند أو الخط دون الاعتماد على محتوى ذي معنى. يمكن استخدام لوريم إيبسوم قبل', 'test', 'اختبار', 'Nav-SubTitle', 'عنوان فرعى', '2023-04-07 20:56:19', '2023-04-07 20:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instgram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `instgram`, `youtube`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'facebook', 'twitter', 'instgram', 'youtube', 'linkedin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

CREATE TABLE `sports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_title_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_title_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_subtitle_en` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_subtitle_ar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_overview_en` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sport_overview_ar` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `membership_fees` double(8,2) DEFAULT NULL,
  `membership_en_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `membership_ar_notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`id`, `sport_title_en`, `sport_title_ar`, `sport_subtitle_en`, `sport_subtitle_ar`, `sport_image`, `sport_overview_en`, `sport_overview_ar`, `created_at`, `updated_at`, `membership_fees`, `membership_en_notes`, `membership_ar_notes`) VALUES
(1, 'xx', 'yy', 'ww', 'qq', NULL, 'ss', 'ee', '2023-04-28 15:10:19', '2023-04-28 18:30:17', 1000.00, 'yy', 'bb'),
(2, 'swimming', 'سباحه', 'swimming', 'سباحه', NULL, 'swimming', 'swimming', '2023-04-30 17:12:57', '2023-04-30 17:12:57', 300.00, 'test', 'اختبار');

-- --------------------------------------------------------

--
-- Table structure for table `sports_days`
--

CREATE TABLE `sports_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sport_id` bigint(20) UNSIGNED DEFAULT NULL,
  `firstday_id` bigint(20) UNSIGNED DEFAULT NULL,
  `secondday_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sport_time` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sports_days`
--

INSERT INTO `sports_days` (`id`, `sport_id`, `firstday_id`, `secondday_id`, `sport_time`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 3, '12:15:00', '2023-04-28 18:30:17', '2023-04-28 18:37:47'),
(2, 2, 1, 4, '18:00:00', '2023-04-30 17:13:21', '2023-04-30 17:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sabreen', 'sabreenm312@gmail.com', NULL, '$2y$10$yPkaqZHkvsJEzWkRIMhmZuwfGsdlhqvXy/Oj75sgBEDd.g2LOveJ6', 0, NULL, '2023-03-29 16:22:07', '2023-03-29 16:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `user_childrens`
--

CREATE TABLE `user_childrens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `personal_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` double(8,2) DEFAULT NULL,
  `width` double(8,2) DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_relationship` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_childrens`
--

INSERT INTO `user_childrens` (`id`, `name`, `birthdate`, `personal_image`, `birth_image`, `height`, `width`, `level`, `user_id`, `user_relationship`, `created_at`, `updated_at`) VALUES
(1, 'mazen', '2023-04-18', NULL, NULL, 150.00, 35.00, 1, 1, NULL, NULL, NULL),
(2, 'zein', '2016-03-30', 'C:\\xampp\\tmp\\phpB794.tmp', 'C:\\xampp\\tmp\\phpB795.tmp', 130.00, 40.00, 2, 1, NULL, NULL, NULL),
(3, 'mariam', '2015-01-30', 'C:\\xampp\\tmp\\php555.tmp', 'C:\\xampp\\tmp\\php556.tmp', 160.00, 66.00, 1, 1, NULL, NULL, NULL),
(4, 'aysel', '2020-06-30', 'C:\\xampp\\tmp\\php557.tmp', 'C:\\xampp\\tmp\\php558.tmp', 130.00, 37.00, 2, 1, NULL, NULL, NULL),
(5, 'zyad', '2023-02-03', '63da7b37861b8WhatsApp Image 2023-04-15 at 00.07.21 (1).jpeg', '63da7b37f16b8WhatsApp Image 2023-04-15 at 00.07.21.jpeg', 150.00, 45.00, 2, 1, NULL, NULL, NULL),
(18, 'momen', '2023-05-04', '645041d3e19cbWhatsApp Image 2023-04-15 at 00.07.17.jpeg', '645041d462eb8WhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', 120.00, 44.00, 1, 1, NULL, NULL, NULL),
(44, 'momen', '2023-05-03', '64504b2230021WhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504b22b4d11WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(45, 'momen', '2023-05-03', '64504b70e144fWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504b71771ebWhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(47, 'momen', '2023-05-03', '64504bf570729WhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504bf600397WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(48, 'momen', '2023-05-03', '64504c77d647aWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504c7881beeWhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(49, 'momen', '2023-05-03', '64504ce01c69fWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504ce0ae389WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(50, 'momen', '2023-05-03', '64504d1e928dbWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504d1f241a7WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(51, 'momen', '2023-05-03', '64504d6c6a650WhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504d6d02247WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(52, 'momen', '2023-05-03', '64504e3a3cddaWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504e3aca27aWhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(53, 'momen', '2023-05-03', '64504eb3e1fd6WhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504eb47619bWhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(54, 'momen', '2023-05-03', '64504f18494faWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '64504f18dc328WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(55, 'momen', '2023-05-03', '645050f660d4aWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '645050f6efaa1WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(56, 'momen', '2023-05-03', '6450511f0c19dWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '6450511f9b823WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL),
(57, 'momen', '2023-05-03', '645051f6b446cWhatsApp Image 2023-04-15 at 00.07.17 (2).jpeg', '645051f743971WhatsApp Image 2023-04-15 at 00.07.17.jpeg', 140.00, 40.00, 1, 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_membership_details_id_foreign` (`membership_details_id`),
  ADD KEY `attendances_child_id_foreign` (`child_id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cups`
--
ALTER TABLE `cups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_news`
--
ALTER TABLE `day_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_services`
--
ALTER TABLE `general_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_details`
--
ALTER TABLE `membership_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_details_invoice_id_foreign` (`invoice_id`),
  ADD KEY `membership_details_child_id_foreign` (`child_id`),
  ADD KEY `membership_details_sport_id_foreign` (`sport_id`),
  ADD KEY `membership_details_sport_days_id_foreign` (`sport_days_id`);

--
-- Indexes for table `membership_invoices`
--
ALTER TABLE `membership_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `membership_invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_events`
--
ALTER TABLE `news_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_images`
--
ALTER TABLE `slider_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports`
--
ALTER TABLE `sports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sports_days`
--
ALTER TABLE `sports_days`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sports_days_sport_id_foreign` (`sport_id`),
  ADD KEY `sports_days_firstday_id_foreign` (`firstday_id`),
  ADD KEY `sports_days_secondday_id_foreign` (`secondday_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_childrens`
--
ALTER TABLE `user_childrens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_childrens_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cups`
--
ALTER TABLE `cups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `day_news`
--
ALTER TABLE `day_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_services`
--
ALTER TABLE `general_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membership_details`
--
ALTER TABLE `membership_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `membership_invoices`
--
ALTER TABLE `membership_invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider_images`
--
ALTER TABLE `slider_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sports`
--
ALTER TABLE `sports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sports_days`
--
ALTER TABLE `sports_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_childrens`
--
ALTER TABLE `user_childrens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `user_childrens` (`id`),
  ADD CONSTRAINT `attendances_membership_details_id_foreign` FOREIGN KEY (`membership_details_id`) REFERENCES `membership_details` (`id`);

--
-- Constraints for table `membership_details`
--
ALTER TABLE `membership_details`
  ADD CONSTRAINT `membership_details_child_id_foreign` FOREIGN KEY (`child_id`) REFERENCES `user_childrens` (`id`),
  ADD CONSTRAINT `membership_details_invoice_id_foreign` FOREIGN KEY (`invoice_id`) REFERENCES `membership_invoices` (`id`),
  ADD CONSTRAINT `membership_details_sport_days_id_foreign` FOREIGN KEY (`sport_days_id`) REFERENCES `sports_days` (`id`),
  ADD CONSTRAINT `membership_details_sport_id_foreign` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);

--
-- Constraints for table `membership_invoices`
--
ALTER TABLE `membership_invoices`
  ADD CONSTRAINT `membership_invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sports_days`
--
ALTER TABLE `sports_days`
  ADD CONSTRAINT `sports_days_firstday_id_foreign` FOREIGN KEY (`firstday_id`) REFERENCES `day_news` (`id`),
  ADD CONSTRAINT `sports_days_secondday_id_foreign` FOREIGN KEY (`secondday_id`) REFERENCES `day_news` (`id`),
  ADD CONSTRAINT `sports_days_sport_id_foreign` FOREIGN KEY (`sport_id`) REFERENCES `sports` (`id`);

--
-- Constraints for table `user_childrens`
--
ALTER TABLE `user_childrens`
  ADD CONSTRAINT `user_childrens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
