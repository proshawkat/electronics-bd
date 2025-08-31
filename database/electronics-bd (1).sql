-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2025 at 05:03 AM
-- Server version: 10.5.27-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `electronics-bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `created_by`, `created_at`, `updated_at`) VALUES
(2, 'Bd', 'bd', 1, 2, '2025-08-19 08:44:30', '2025-08-23 09:14:27'),
(3, 'China', 'china', 1, 2, '2025-08-19 08:44:36', '2025-08-23 09:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-general_settings', 'O:25:\"App\\Models\\GeneralSetting\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:16:\"general_settings\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:15:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"hello\";s:4:\"logo\";s:39:\"uploads/settings/1755961703_brand-1.jpg\";s:5:\"email\";s:17:\"shawkat@gmail.com\";s:7:\"address\";s:8:\"asdfasdf\";s:5:\"phone\";s:9:\"345345435\";s:12:\"second_phone\";s:10:\"3453453453\";s:8:\"facebook\";s:32:\"https://www.radioelectricbd.com/\";s:7:\"youtube\";s:32:\"https://www.radioelectricbd.com/\";s:7:\"twitter\";s:32:\"https://www.radioelectricbd.com/\";s:9:\"instagram\";s:32:\"https://www.radioelectricbd.com/\";s:8:\"whatsapp\";s:32:\"https://www.radioelectricbd.com/\";s:10:\"google_map\";s:27:\"https://www.google.com/maps\";s:10:\"created_at\";s:19:\"2025-08-23 14:55:04\";s:10:\"updated_at\";s:19:\"2025-08-23 16:35:02\";}s:11:\"\0*\0original\";a:15:{s:2:\"id\";i:1;s:4:\"name\";s:5:\"hello\";s:4:\"logo\";s:39:\"uploads/settings/1755961703_brand-1.jpg\";s:5:\"email\";s:17:\"shawkat@gmail.com\";s:7:\"address\";s:8:\"asdfasdf\";s:5:\"phone\";s:9:\"345345435\";s:12:\"second_phone\";s:10:\"3453453453\";s:8:\"facebook\";s:32:\"https://www.radioelectricbd.com/\";s:7:\"youtube\";s:32:\"https://www.radioelectricbd.com/\";s:7:\"twitter\";s:32:\"https://www.radioelectricbd.com/\";s:9:\"instagram\";s:32:\"https://www.radioelectricbd.com/\";s:8:\"whatsapp\";s:32:\"https://www.radioelectricbd.com/\";s:10:\"google_map\";s:27:\"https://www.google.com/maps\";s:10:\"created_at\";s:19:\"2025-08-23 14:55:04\";s:10:\"updated_at\";s:19:\"2025-08-23 16:35:02\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:12:{i:0;s:4:\"name\";i:1;s:4:\"logo\";i:2;s:5:\"email\";i:3;s:7:\"address\";i:4;s:5:\"phone\";i:5;s:12:\"second_phone\";i:6;s:8:\"facebook\";i:7;s:7:\"youtube\";i:8;s:7:\"twitter\";i:9;s:9:\"instagram\";i:10;s:8:\"whatsapp\";i:11;s:10:\"google_map\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}', 1756537416),
('laravel-cache-menu_categories', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:5:{i:0;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:10:\"Components\";s:4:\"slug\";s:10:\"components\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:45:40\";s:10:\"updated_at\";s:19:\"2025-08-23 15:11:16\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:2;s:4:\"name\";s:10:\"Components\";s:4:\"slug\";s:10:\"components\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:45:40\";s:10:\"updated_at\";s:19:\"2025-08-23 15:11:16\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:2:{i:0;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:11:\"Optocoupler\";s:4:\"slug\";s:11:\"optocoupler\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:45:28\";s:10:\"updated_at\";s:19:\"2025-08-23 15:13:13\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:1;s:4:\"name\";s:11:\"Optocoupler\";s:4:\"slug\";s:11:\"optocoupler\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:45:28\";s:10:\"updated_at\";s:19:\"2025-08-23 15:13:13\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:7:\"MOSFETs\";s:4:\"slug\";s:7:\"mosfets\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:46:56\";s:10:\"updated_at\";s:19:\"2025-08-23 15:13:32\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:3;s:4:\"name\";s:7:\"MOSFETs\";s:4:\"slug\";s:7:\"mosfets\";s:6:\"status\";i:1;s:9:\"parent_id\";i:2;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:46:56\";s:10:\"updated_at\";s:19:\"2025-08-23 15:13:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:22:\"Arduino & Raspberry PI\";s:4:\"slug\";s:20:\"arduino-raspberry-pi\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:49:50\";s:10:\"updated_at\";s:19:\"2025-08-23 15:10:52\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:5;s:4:\"name\";s:22:\"Arduino & Raspberry PI\";s:4:\"slug\";s:20:\"arduino-raspberry-pi\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:49:50\";s:10:\"updated_at\";s:19:\"2025-08-23 15:10:52\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:7;s:4:\"name\";s:7:\"Sensors\";s:4:\"slug\";s:7:\"sensors\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-23 15:11:32\";s:10:\"updated_at\";s:19:\"2025-08-23 15:11:32\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:7;s:4:\"name\";s:7:\"Sensors\";s:4:\"slug\";s:7:\"sensors\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-23 15:11:32\";s:10:\"updated_at\";s:19:\"2025-08-23 15:11:32\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:1:{i:0;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:21:\"Temperature/ Humidity\";s:4:\"slug\";s:20:\"temperature-humidity\";s:6:\"status\";i:1;s:9:\"parent_id\";i:7;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:47:21\";s:10:\"updated_at\";s:19:\"2025-08-23 15:12:07\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:4;s:4:\"name\";s:21:\"Temperature/ Humidity\";s:4:\"slug\";s:20:\"temperature-humidity\";s:6:\"status\";i:1;s:9:\"parent_id\";i:7;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-18 13:47:21\";s:10:\"updated_at\";s:19:\"2025-08-23 15:12:07\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:8;s:4:\"name\";s:9:\"Amplifier\";s:4:\"slug\";s:9:\"amplifier\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-25 03:50:37\";s:10:\"updated_at\";s:19:\"2025-08-25 03:50:37\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:8;s:4:\"name\";s:9:\"Amplifier\";s:4:\"slug\";s:9:\"amplifier\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-25 03:50:37\";s:10:\"updated_at\";s:19:\"2025-08-25 03:50:37\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:19:\"App\\Models\\Category\":33:{s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:10:\"categories\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:19:\"preventsLazyLoading\";b:0;s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:28:\"\0*\0escapeWhenCastingToString\";b:0;s:13:\"\0*\0attributes\";a:8:{s:2:\"id\";i:9;s:4:\"name\";s:4:\"Lapm\";s:4:\"slug\";s:4:\"lapm\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-25 03:54:00\";s:10:\"updated_at\";s:19:\"2025-08-25 03:54:00\";}s:11:\"\0*\0original\";a:8:{s:2:\"id\";i:9;s:4:\"name\";s:4:\"Lapm\";s:4:\"slug\";s:4:\"lapm\";s:6:\"status\";i:1;s:9:\"parent_id\";N;s:10:\"created_by\";i:2;s:10:\"created_at\";s:19:\"2025-08-25 03:54:00\";s:10:\"updated_at\";s:19:\"2025-08-25 03:54:00\";}s:10:\"\0*\0changes\";a:0:{}s:11:\"\0*\0previous\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:17:\"\0*\0classCastCache\";a:0:{}s:21:\"\0*\0attributeCastCache\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:1:{s:8:\"children\";O:39:\"Illuminate\\Database\\Eloquent\\Collection\":2:{s:8:\"\0*\0items\";a:0:{}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:27:\"\0*\0relationAutoloadCallback\";N;s:26:\"\0*\0relationAutoloadContext\";N;s:10:\"timestamps\";b:1;s:13:\"usesUniqueIds\";b:0;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:11:\"\0*\0fillable\";a:5:{i:0;s:4:\"name\";i:1;s:4:\"slug\";i:2;s:6:\"status\";i:3;s:9:\"parent_id\";i:4;s:10:\"created_by\";}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}s:28:\"\0*\0escapeWhenCastingToString\";b:0;}', 2071709487);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `status`, `parent_id`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Optocoupler', 'optocoupler', 1, 2, 2, '2025-08-18 07:45:28', '2025-08-23 09:13:13'),
(2, 'Components', 'components', 1, NULL, 2, '2025-08-18 07:45:40', '2025-08-23 09:11:16'),
(3, 'MOSFETs', 'mosfets', 1, 2, 2, '2025-08-18 07:46:56', '2025-08-23 09:13:32'),
(4, 'Temperature/ Humidity', 'temperature-humidity', 1, 7, 2, '2025-08-18 07:47:21', '2025-08-23 09:12:07'),
(5, 'Arduino & Raspberry PI', 'arduino-raspberry-pi', 1, NULL, 2, '2025-08-18 07:49:50', '2025-08-23 09:10:52'),
(7, 'Sensors', 'sensors', 1, NULL, 2, '2025-08-23 09:11:32', '2025-08-23 09:11:32'),
(8, 'Amplifier', 'amplifier', 1, NULL, 2, '2025-08-24 21:50:37', '2025-08-24 21:50:37'),
(9, 'Lapm', 'lapm', 1, NULL, 2, '2025-08-24 21:54:00', '2025-08-24 21:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sdf', 'asdf', 'asdf@gmailcom', '$2y$12$sVoMLPDzKDNvq53PYMz64.7cqnKbpU.m40ZQeuJ2X83DtQxL7O0uu', '01457865425', NULL, '2025-08-26 07:49:43', '2025-08-26 07:49:43'),
(2, 'shawkat', 'ali', 'shawkat@gmail.com', '$2y$12$c1neyuTKwlpj15o.Z2Qyr.l8YWT0n8loV5nc8KDUg7PLcrp4jYDJe', '8801744724905', NULL, '2025-08-26 08:03:15', '2025-08-26 08:03:15'),
(3, 'ali', 'ali', 'ali@gmail.com', '$2y$12$8wsXasN3a0SuNnmz8sLNhu.phcAgH5S2POOPjDhDMMa2t0.kH6JgW', '+8801744724905', NULL, '2025-08-26 08:19:20', '2025-08-26 08:19:20'),
(4, 'asdf', 'asdfasdf', 'shawkatali@gmail.com', '$2y$12$8CtEFbsFyFs.UhJSf.pAPOaUPE7pp/K72qXOZosOrHEdfQg6rREP6', '01745482455', NULL, '2025-08-26 08:29:46', '2025-08-26 08:29:46');

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
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` char(11) DEFAULT NULL,
  `second_phone` char(11) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `google_map` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `name`, `logo`, `email`, `address`, `phone`, `second_phone`, `facebook`, `youtube`, `twitter`, `instagram`, `whatsapp`, `google_map`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'uploads/settings/1755961703_brand-1.jpg', 'shawkat@gmail.com', 'asdfasdf', '345345435', '3453453453', 'https://www.radioelectricbd.com/', 'https://www.radioelectricbd.com/', 'https://www.radioelectricbd.com/', 'https://www.radioelectricbd.com/', 'https://www.radioelectricbd.com/', 'https://www.google.com/maps', '2025-08-23 08:55:04', '2025-08-23 10:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_11_164114_create_permission_tables', 2),
(7, '2025_08_18_112252_create_brands_table', 3),
(8, '2025_08_18_112316_create_categories_table', 3),
(9, '2025_08_18_145825_create_products_table', 4),
(10, '2025_08_23_063011_create_product_galleries_table', 4),
(11, '2025_08_23_121322_create_general_settings_table', 5),
(12, '2025_08_25_133548_create_customers_table', 6),
(13, '2025_08_26_141602_create_newsletters_table', 7),
(14, '2025_08_29_050546_create_tags_table', 8),
(15, '2025_08_29_052845_add_rating_and_tag_id_to_products_table', 9),
(16, '2025_08_29_101355_change_tag_id_to_json_in_products_table', 10),
(17, '2025_08_30_052349_create_sliders_table', 11);

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
(1, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `customer_id`, `email`, `created_at`, `updated_at`) VALUES
(1, 3, 'ali@gmail.com', '2025-08-26 08:19:21', '2025-08-26 08:19:21');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'manage users', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(2, 'manage products', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(3, 'manage orders', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(4, 'view reports', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `stock_status` tinyint(1) NOT NULL DEFAULT 1,
  `is_featured` tinyint(1) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sale_price` decimal(8,2) NOT NULL,
  `rating` decimal(3,2) NOT NULL DEFAULT 0.00,
  `tag_id` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`tag_id`)),
  `original_price` decimal(8,2) DEFAULT NULL,
  `first_image_url` varchar(255) NOT NULL,
  `second_image_url` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `product_code`, `model`, `description`, `stock_status`, `is_featured`, `quantity`, `sale_price`, `rating`, `tag_id`, `original_price`, `first_image_url`, `second_image_url`, `category_id`, `sub_category_id`, `brand_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '2N6292 NPN Transistor', '2n6292-npn-transistor', 'asdf', 'asdf', '<p>asdfasdf&nbsp;2N6292 NPN Transistor</p>', 1, 1, 340, 43.00, 0.00, NULL, 43.00, 'uploads/products/1755947420_1226.jpg', 'uploads/products/1755947420_f9b5a98a-b892-4b42-8ba1-f8d2c196edd1.jpg', 5, 4, 2, 1, '2025-08-23 00:50:19', '2025-08-23 05:25:35'),
(2, 'A2212 1400KV Brushless Outrunner BLDC Motor', 'a2212-1400kv-brushless-outrunner-bldc-motor', '645', 'CBD-1542', '<h3 class=\"title module-title block-title\" style=\"font-family: &quot;IBM Plex Sans&quot;; font-weight: 700; color: rgb(48, 56, 65); margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; position: relative; padding: 0px; text-transform: uppercase; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-width: 0px; overflow: visible; text-overflow: initial; width: 603.312px; order: -2;\">Description</h3><div class=\"block-wrapper\" style=\"-webkit-box-flex: 1; flex: 1 1 0%; display: flex; -webkit-box-orient: vertical; -webkit-box-direction: normal; flex-direction: column; width: 603.312px; border-radius: inherit; color: rgb(51, 51, 51); font-family: &quot;IBM Plex Sans&quot;;\"><div class=\"block-content  block-description\" style=\"position: relative; border-radius: inherit; column-count: initial; column-gap: 20px; column-rule-width: 1px; column-rule-style: solid;\"><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">These are the best low price drone motors available in the market. The uniqueness of this BLDC Motor lies in low cost and highly satisfying performance on the fly.<br style=\"height: 1px; display: block;\"></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">The A2212 10T 1400KV Brushless Motor for Drone is best compatible or used with SimonK 30A ESC and 1045 Propeller Set.&nbsp;<span style=\"font-weight: 700;\">CityTechBD</span></p><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; text-align: justify; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">This 1400KV brushless motor is equipped with a solid metal case which makes it reliable and durable. The A2212 10T Motor comes with a pre-soldered good-quality connector for a fast and direct connection between ESC and the motor.<span style=\"font-weight: 700;\">&nbsp;CityTechBD</span></p><h5 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin: 10px 0px; font-size: 14px; text-align: justify;\">Application :</h5><ol style=\"margin-bottom: 10px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: none;\">Drones</li><li style=\"list-style: none;\">Quadcopters</li><li style=\"list-style: none;\">Multirotor</li><li style=\"list-style: none;\">RC Airplanes</li><li style=\"list-style: none;\">UAV</li></ol><h4 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin: 10px 0px; font-size: 18px; text-transform: uppercase;\">Features :</h4><ol style=\"margin-bottom: 10px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px;\"><li style=\"list-style: none;\">The steel design&nbsp;is capable of withstanding competitional conditions.</li><li style=\"list-style: none;\">Lightweight design makes them suitable for a wide range of Quadcopter and Hexacopter Frames.</li><li style=\"list-style: none;\">Compact size.&nbsp;<span style=\"font-weight: 700;\">CityTechBD&nbsp;</span></li><li style=\"list-style: none;\">Offers great performance and value for money.</li><li style=\"list-style: none;\">Smooth throttle response for best RC experience.</li></ol><table dir=\"ltr\" border=\"1\" cellspacing=\"0\" cellpadding=\"0\" style=\"border-spacing: 0px; border-collapse: inherit; background-color: transparent; margin-bottom: 0px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-size: 14px; border-width: 1px !important; border-style: solid !important; border-color: rgb(221, 221, 221) !important;\"><colgroup><col width=\"242\"><col width=\"249\"></colgroup><tbody><tr><td colspan=\"2\" rowspan=\"1\" style=\"padding: 10px 15px; border-right-width: 0px; border-left-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important;\">General Specification</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Model</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">A2212 10T</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Motor KV (RPM/V)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">1400</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Compatible LiPo Batteries</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">2S ~ 3S</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Shaft Diameter (mm)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">3.17</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Current Handling Capacity (A)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">16</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Max. Efficiency Current (A)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">6 ~ 12</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">No-Load Current (mA)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">700</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Maximum Efficiency</td><td style=\"padding: 10px 15px; border-right-width: 0px; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">0.8</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Length (mm)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">27.5</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Weight (gm)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">72</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Width (mm)</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">27</td></tr><tr><td style=\"padding: 10px 15px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-bottom-width: 0px !important;\">Shipment Weight</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px !important; border-color: rgb(221, 221, 221) !important; border-left-width: 0px !important;\">0.078 kg</td></tr><tr><td style=\"padding: 10px 15px; border-bottom-width: 0px; border-left-width: 0px; border-right-width: 0px !important; border-color: rgb(221, 221, 221) !important;\">Shipment Dimensions</td><td style=\"padding: 10px 15px; border-right-width: 0px; border-bottom-width: 0px; border-left-width: 0px !important; border-color: rgb(221, 221, 221) !important;\">12 × 6 × 5 cm</td></tr></tbody></table><h4 style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif; font-weight: 700; line-height: 1.1; color: rgb(51, 51, 51); margin: 10px 0px; font-size: 18px; text-transform: uppercase;\">Package Includes :</h4><p style=\"margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-size: 14px; font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, sans-serif;\">1 x A2212 10T 1400Kv Brushless Motor for Drone<br style=\"height: 1px; display: block;\">1 x Prop Adapter<br style=\"height: 1px; display: block;\">A Motor Holder (X-type) and&nbsp;set of screws.&nbsp;<span style=\"font-weight: 700;\">CityTechBD&nbsp;</span></p></div></div>', 1, 1, 23, 23.00, 0.00, NULL, 32.00, 'uploads/products/1755947341_982uMDnvLgJqdh5ptzYyFXhKSQIj9LAraTt585eE.png', 'uploads/products/1755947341_AIJ6660jkHdskR8HWuc1XWcwzoluSiCZBe2fzbLv.png', 5, 4, 2, 1, '2025-08-23 00:57:04', '2025-08-23 05:09:01'),
(3, 'sadf 527', 'sadf-527', 'asdf54645645646 527', 'sadf 527', '<p>sdaf asdf asdf sadf&nbsp;527</p>', 1, 0, 43527, 527.00, 0.00, '[1, 2]', 527.00, 'uploads/products/1755947553_MKj10MbUE96gfcUKfIbQSFNK82YL4sTcwqkIy7HN.png', 'uploads/products/1755947553_FpyYhvebj0L7Vcw6opylRl5Y5oBnRrsB686nmvZ1.jpg', 2, 3, 3, 1, '2025-08-23 01:23:47', '2025-08-23 05:12:33'),
(5, 'asdf-787', 'asdf-787', 'asdfasdf-34', '34435w', '<p>asdfafsd</p>', 1, 0, 43, 43.00, 0.00, '[1]', 43.00, 'uploads/products/1755934396_CllAlGbYXPqIuoMRzAU4zeXXhbifZDi44i5GtAFh.png', 'uploads/products/1755934396_e2m2b15htTfaGA1rI2NTbqSEMeg8LnHDWwcKXhNr.png', 2, 3, 3, 1, '2025-08-23 01:33:16', '2025-08-23 05:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `original_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `original_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'uploads/products/T4UOTCd1yajFXuMSCR2ItdC91sJ5EiKBKHTvUJpI.jpg', '2025-08-23 00:50:19', '2025-08-23 00:50:19'),
(2, 1, 'uploads/products/HfmFRrdsYfh7w6ErVxlZpSPdrt6CiDZiGhigWwfo.jpg', '2025-08-23 00:50:19', '2025-08-23 00:50:19'),
(3, 2, 'uploads/products/GLdydLkUInQ0qQsmHQ5sIYExS3k1K3xvZOEIhMtN.jpg', '2025-08-23 00:57:04', '2025-08-23 00:57:04'),
(4, 2, 'uploads/products/ZrOK3H9nEvZpVCeJe1cmX6CZSEtp9o96kx5Rxn8h.jpg', '2025-08-23 00:57:04', '2025-08-23 00:57:04'),
(5, 3, 'uploads/products/4hajIiLd0KvssTPFRxJMzF2N8tdDVkbLCKgtZJ6z.jpg', '2025-08-23 01:23:47', '2025-08-23 01:23:47'),
(6, 3, 'uploads/products/XjI1dq6N1nUASVlK0Wa6dWKEnK7mpcoJU13zfoWd.jpg', '2025-08-23 01:23:47', '2025-08-23 01:23:47'),
(7, 5, 'uploads/products/1755934396_360_F_575668898_05nhhqdSNoUtbnNcupJyRcDONlibzSHr.jpg', '2025-08-23 01:33:16', '2025-08-23 01:33:16'),
(8, 2, 'uploads/products/1755947341_Ny549IJ0rXjCUNlUcLZoqSOB7deEPc0cqh7f2lcx.png', '2025-08-23 05:09:01', '2025-08-23 05:09:01'),
(9, 2, 'uploads/products/1755947341_zWsvC34rz1Iqzk4dwXPfYcUJv7z8zHEuWazzJz3j.png', '2025-08-23 05:09:01', '2025-08-23 05:09:01'),
(10, 1, 'uploads/products/1755947420_pexels-valeriya-965990.jpg', '2025-08-23 05:10:20', '2025-08-23 05:10:20'),
(11, 1, 'uploads/products/1755947420_pexels-valeriya-1961791.jpg', '2025-08-23 05:10:20', '2025-08-23 05:10:20'),
(12, 3, 'uploads/products/1755947553_q935phefuDLlL255b2Ts9fOn8BjbfnqQYpirr16w.png', '2025-08-23 05:12:33', '2025-08-23 05:12:33'),
(13, 3, 'uploads/products/1755947553_suQZfCV1eG7JDVyDHvEUlDUGjWcz3b67P2eAqUXJ.png', '2025-08-23 05:12:33', '2025-08-23 05:12:33');

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
(1, 'admin', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(2, 'manager', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(3, 'salesman', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18'),
(4, 'customer', 'web', '2025-08-11 10:57:18', '2025-08-11 10:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(3, 3),
(4, 1),
(4, 2);

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('24kFe5oGRojajVX6y3sqIniVlKB8LrdONx35i8y9', 2, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZFhZVzRRVHJzVjFvVXI1bG1tcXRkakJvdVU5NE1RNVpxa1FFY2hzWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDY6Imh0dHA6Ly9sb2NhbGhvc3QvZWxlY3Ryb25pY3MtYmQvYWRtaW4vY3VzdG9tZXIiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1756535364),
('oF6kzD9HXKUwIAj9EHNrE7MovT9FyEEwa71TYvys', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTGoxdkY1YmQzaENrOTVCM2pqbWI0d25RQlVJaUdVZW9yYU42RTJicSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzk6Imh0dHA6Ly9sb2NhbGhvc3QvZWxlY3Ryb25pY3MtYmQvY29udGFjdCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1756537072);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image_url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `link`, `image_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'asfasf', 'asd', 'uploads/sliders/1756532611_arduino-mega-2560-r3-960x400.jpeg', 1, '2025-08-29 23:43:31', '2025-08-29 23:57:25'),
(2, 'asdf', 'asdfasdf', 'uploads/sliders/1756532757_e2m2b15htTfaGA1rI2NTbqSEMeg8LnHDWwcKXhNr.png', 1, '2025-08-29 23:45:57', '2025-08-29 23:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '#sdf', NULL, NULL),
(2, '#sadf', NULL, NULL);

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
(1, 'shawkat', 'shawkat@gmail.com', NULL, '$2y$12$.8Y/oHsBvCtmLxJHJSGUrOnbf3u6cu..uXI7URFBUkNHmH68Dgh8a', NULL, '2025-08-11 10:45:23', '2025-08-11 10:45:23'),
(2, 'ali', 'shawkatali527@gmail.com', NULL, '$2y$12$PMkFO79y55TNsbmisHM1vOSnLJAKSxlpbM5ammrQCAr3YXQdHsW2G', NULL, '2025-08-11 15:40:04', '2025-08-11 15:40:04'),
(3, 'manager', 'manager@gmail.com', NULL, '$2y$12$K0sNVIVTEwNTeQK4QHKw/u5cEqwOLR47IDZbWy1/.eI.BlTIsqrA.', NULL, '2025-08-11 15:41:43', '2025-08-11 15:41:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_slug_unique` (`slug`),
  ADD KEY `brands_created_by_foreign` (`created_by`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `categories_created_by_foreign` (`created_by`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
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
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletters_email_unique` (`email`),
  ADD KEY `newsletters_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

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
-- Constraints for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD CONSTRAINT `newsletters_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
