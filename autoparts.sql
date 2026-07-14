-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2026 at 11:38 PM
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
-- Database: `autoparts`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
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
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Site Administrator', 'admin@example.com', NULL, '$2y$12$Ti5r3yduEfJLmBJeXQs3tumVmghanIYfbE2.xykbxQGvum3YkwbnK', NULL, '2026-07-06 17:00:30', '2026-07-06 17:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 'Alternators', 'alternators', 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(2, 'Starters', 'starters', 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(3, 'Motors', 'motors', 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(4, 'Generators', 'generators', 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(5, 'Components', 'components', 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(6, 'Accessories', 'accessories', 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35');

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
-- Table structure for table `main_categories`
--

CREATE TABLE `main_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `main_categories`
--

INSERT INTO `main_categories` (`id`, `department_id`, `name`, `slug`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alternator Assemblies', 'alternator-assemblies', 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(2, 1, 'Premium OE Brands (A-D)', 'premium-oe-brands-a-d', 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(3, 1, 'High Output Brands (D-J)', 'high-output-brands-d-j', 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(4, 1, 'Global Logistics Labels (L-M)', 'global-logistics-labels-l-m', 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(5, 1, 'Industrial Specialist Labels (S-W)', 'industrial-specialist-labels-s-w', 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(16, 5, 'Armatures and Parts', 'armatures-and-parts', 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(17, 5, 'Bearings and Related Parts', 'bearings-and-related-parts', 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(18, 5, 'Bolts and Screws', 'bolts-and-screws', 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(19, 5, 'Boots', 'boots', 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(20, 5, 'Brush Holders and Parts', 'brush-holders-and-parts', 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(21, 5, 'Brushes and Brush Kits', 'brushes-and-brush-kits', 5, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(22, 5, 'Bushings and Bushing Kits', 'bushings-and-bushing-kits', 6, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(23, 5, 'Capacitors, Condensers, Resistors and Accessories', 'capacitors-condensers-resistors-and-accessories', 7, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(24, 5, 'Center Supports', 'center-supports', 8, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(25, 5, 'Collars, Retainers and Kits', 'collars-retainers-and-kits', 9, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(26, 5, 'Connectors', 'connectors', 10, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(27, 5, 'Covers, Cover Bands and Shields', 'covers-cover-bands-and-shields', 11, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(28, 5, 'Diodes and Trios', 'diodes-and-trios', 12, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(29, 5, 'Drain Tubes', 'drain-tubes', 13, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(30, 5, 'Drives, Clutches and Parts', 'drives-clutches-and-parts', 14, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(31, 5, 'Electronic Control Products', 'electronic-control-products', 15, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(32, 5, 'Fans and Baffles', 'fans-and-baffles', 16, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(33, 5, 'Field Coil Retainers', 'field-coil-retainers', 17, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(34, 5, 'Field Coils', 'field-coils', 18, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(35, 5, 'Gaskets', 'gaskets', 19, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(36, 5, 'Grommets', 'grommets', 20, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(37, 5, 'Housings', 'housings', 21, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(38, 5, 'Insulators', 'insulators', 22, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(39, 5, 'Keys', 'keys', 23, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(40, 5, 'Leads', 'leads', 24, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(41, 5, 'Miscellaneous Hardware', 'miscellaneous-hardware', 25, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(42, 5, 'Nuts', 'nuts', 26, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(43, 5, 'Oil Cups, Pads and Wicks', 'oil-cups-pads-and-wicks', 27, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(44, 5, 'O-Rings', 'o-rings', 28, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(45, 5, 'Other Components', 'other-components', 29, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(46, 5, 'Pins and Rivets', 'pins-and-rivets', 30, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(47, 5, 'Plugs', 'plugs', 31, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(48, 5, 'Pulley Parts', 'pulley-parts', 32, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(49, 5, 'Pulleys', 'pulleys', 33, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(50, 5, 'Rectifiers', 'rectifiers', 34, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(51, 5, 'Regulators and Parts', 'regulators-and-parts', 35, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(52, 5, 'Repair Kits', 'repair-kits', 36, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(53, 5, 'Rotors and Rotor Parts', 'rotors-and-rotor-parts', 37, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(54, 5, 'Seals', 'seals', 38, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(55, 5, 'Shift Levers and Supports', 'shift-levers-and-supports', 39, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(56, 5, 'Shop Supplies', 'shop-supplies', 40, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(57, 5, 'Solenoids and Parts', 'solenoids-and-parts', 41, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(58, 5, 'Spacers and Mounting Bushings', 'spacers-and-mounting-bushings', 42, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(59, 5, 'Stators', 'stators', 43, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(60, 5, 'Studs', 'studs', 44, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(61, 5, 'Tools and Equipment', 'tools-and-equipment', 45, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(62, 5, 'Washers', 'washers', 46, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(63, 5, 'Seal Kits', 'seal-kits', 47, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(64, 5, 'Wiper Motors', 'wiper-motors', 48, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(65, 6, 'Alarms & Alert Elements', 'alarms-alert-elements', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(66, 6, 'Fuel & Delivery Core', 'fuel-delivery-core', 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(67, 6, 'Lighting & Shop Stock', 'lighting-shop-stock', 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(68, 6, 'Switches & Toolboards', 'switches-toolboards', 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(69, 6, 'Circuitry & High Wear Items', 'circuitry-high-wear-items', 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35');

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
(4, '2026_07_02_194449_create_normalized_catalog_tables', 2),
(5, '2026_07_02_203137_add_featured_fields_to_subcategories_table', 3),
(6, '2026_07_04_005833_create_admins_table', 4),
(7, '2026_07_09_214354_create_quotations_tables', 5),
(8, '2026_07_10_233915_add_image_url_to_products_table', 6);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `part_number` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `type_description` varchar(255) NOT NULL,
  `specifications` text NOT NULL,
  `warehouse_status` varchar(255) NOT NULL DEFAULT 'In Stock',
  `stock_qty` int(11) NOT NULL DEFAULT 0,
  `price` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `subcategory_id`, `part_number`, `image_url`, `type_description`, `specifications`, `warehouse_status`, `stock_qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'JN-1-5441', 'https://www.jnelectric.com/product-images/AEP%20Product%20Images/DEN-210-1122_1_Z.jpg?resizeid=26&resizeh=800&resizew=800', 'Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 24, 349.50, '2026-07-06 17:00:34', '2026-07-13 17:35:41'),
(2, 2, 'JN-2-1564', NULL, 'Alternator and Starter Conversion Kits - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 19, 733.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(3, 3, 'JN-3-1258', NULL, 'Alternator Conversion Kits - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 14, 395.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(4, 4, 'JN-4-3422', NULL, 'American Power Systems Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 17, 255.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(5, 5, 'JN-5-2764', NULL, 'Arrowhead Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 16, 130.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(6, 6, 'JN-6-1347', NULL, 'Balmar Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 17, 254.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(7, 7, 'JN-7-4612', NULL, 'Bosch Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 6, 658.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(8, 8, 'JN-8-5739', NULL, 'C.E. Niehoff Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 11, 773.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(9, 9, 'JN-9-6758', NULL, 'Delco Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 17, 437.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(10, 10, 'JN-10-2317', NULL, 'Denso Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 23, 873.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(11, 11, 'JN-11-5516', NULL, 'Denso High Output Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 13, 593.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(12, 12, 'JN-12-2312', NULL, 'Electrodyne Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 8, 697.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(13, 13, 'JN-13-4150', NULL, 'HD Power Solutions Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 2, 172.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(14, 14, 'JN-14-6999', NULL, 'Hitachi Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 23, 357.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(15, 15, 'JN-15-3055', NULL, 'J&N Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 5, 639.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(16, 16, 'JN-16-4087', NULL, 'JANNCO Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 6, 757.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(17, 17, 'JN-17-4334', NULL, 'Leece Neville Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 7, 603.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(18, 18, 'JN-18-9569', NULL, 'Magneton Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 6, 371.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(19, 19, 'JN-19-2853', NULL, 'Mahle Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 25, 233.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(20, 20, 'JN-20-2884', NULL, 'Marelli Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 4, 253.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(21, 21, 'JN-21-1082', NULL, 'Mitsubishi Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 11, 213.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(22, 22, 'JN-22-7233', NULL, 'Nikko Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 5, 154.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(23, 23, 'JN-23-2960', NULL, 'Sawafuji Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 21, 425.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(24, 24, 'JN-24-2647', NULL, 'Valeo Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 7, 189.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(25, 25, 'JN-25-4503', NULL, 'Wilson Alternators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 16, 531.50, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(71, 71, 'JN-71-2124', NULL, 'Starter Armatures - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 29, 547.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(72, 72, 'JN-72-8891', NULL, 'Alternator Armatures - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 33, 502.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(74, 74, 'JN-74-3279', NULL, 'Core Windings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 32, 584.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(75, 75, 'JN-75-6151', NULL, 'Ball Bearings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 42, 291.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(76, 76, 'JN-76-3342', NULL, 'Needle Bearings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 24, 128.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(77, 77, 'JN-77-9155', NULL, 'Sealed Bearings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 9, 252.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(78, 78, 'JN-78-4848', NULL, 'Tolerance Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 21, 533.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(79, 79, 'JN-79-4969', NULL, 'Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 75.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(80, 80, 'JN-80-1850', NULL, 'Housing Bolts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 21, 323.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(81, 81, 'JN-81-3750', NULL, 'Thru Bolts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 38, 414.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(82, 82, 'JN-82-3558', NULL, 'Terminal Screws - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 178.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(83, 83, 'JN-83-2700', NULL, 'Mounting Hardware Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 185.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(84, 84, 'JN-84-1134', NULL, 'Solonoid Boots - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 37, 51.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(85, 85, 'JN-85-2627', NULL, 'Terminal Insulator Boots - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 26, 154.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(86, 86, 'JN-86-7686', NULL, 'Weatherproof Rubber Boots - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 6, 123.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(87, 87, 'JN-87-1055', NULL, 'Starter Brush Holders - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 30, 163.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(88, 88, 'JN-88-6489', NULL, 'Alternator Brush Holders - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 26, 214.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(89, 89, 'JN-89-5971', NULL, 'Holder Springs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 17, 637.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(90, 90, 'JN-90-9552', NULL, 'Insulators - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 228.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(91, 91, 'JN-91-6430', NULL, 'Carbon Brushes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 42, 516.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(92, 92, 'JN-92-1087', NULL, 'Copper Brushes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 356.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(93, 93, 'JN-93-4275', NULL, 'Heavy Duty Fleet Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 43, 492.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(94, 94, 'JN-94-9767', NULL, 'Assortment Packs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 16, 602.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(95, 95, 'JN-95-1149', NULL, 'Bronze Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 17, 134.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(96, 96, 'JN-96-9613', NULL, 'Oilless Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 9, 212.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(97, 97, 'JN-97-3581', NULL, 'Starter Drive End Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 29, 424.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(98, 98, 'JN-98-8462', NULL, 'Radio Noise Capacitors - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 6, 101.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(99, 99, 'JN-99-2200', NULL, 'Ignition Condensers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 35, 109.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(100, 100, 'JN-100-4621', NULL, 'Ballast Resistors - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 6, 64.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(101, 101, 'JN-101-3623', NULL, 'Center Support Bearings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 14, 194.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(102, 102, 'JN-102-6208', NULL, 'Housing Center Brackets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 14, 312.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(103, 103, 'JN-103-9917', NULL, 'Structural Shims - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 25, 211.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(104, 104, 'JN-104-7594', NULL, 'Stop Collars - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 302.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(105, 105, 'JN-105-9924', NULL, 'Thrust Washers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 17, 383.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(106, 106, 'JN-106-8463', NULL, 'Retaining Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 22, 281.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(107, 107, 'JN-107-5624', NULL, 'Snap Ring Packs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 293.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(108, 108, 'JN-108-9635', NULL, 'Wire Terminals - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 550.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(109, 109, 'JN-109-7742', NULL, 'Wiring Harness Plugs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 522.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(110, 110, 'JN-110-5619', NULL, 'Multi-Pin Adapters - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 21, 46.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(111, 111, 'JN-111-3296', NULL, 'Crimp Sockets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 19, 170.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(112, 112, 'JN-112-9227', NULL, 'Starter Band Covers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 19, 54.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(113, 113, 'JN-113-9833', NULL, 'Alternator End Covers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 24, 214.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(114, 114, 'JN-114-8381', NULL, 'Debris Splash Shields - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 25, 583.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(115, 115, 'JN-115-9877', NULL, 'Button Diodes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 35, 329.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(116, 116, 'JN-116-5552', NULL, 'Diode Trios - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 7, 184.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(117, 117, 'JN-117-3798', NULL, 'Press-Fit Diodes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 28, 266.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(118, 118, 'JN-118-8335', NULL, 'Isolation Diodes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 13, 153.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(119, 119, 'JN-119-7435', NULL, 'Rubber Drain Vents - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 14, 531.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(120, 120, 'JN-120-2247', NULL, 'Housing Weep Tubes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 44, 59.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(121, 121, 'JN-121-1231', NULL, 'Breather Tubes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 373.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(122, 122, 'JN-122-4717', NULL, 'Starter Drives - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 427.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(123, 123, 'JN-123-5558', NULL, 'Overrunning Alternator Clutches (OAC) - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 12, 144.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(124, 124, 'JN-124-5620', NULL, 'Pulley Clutches - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 14, 370.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(125, 125, 'JN-125-5103', NULL, 'Ignition Modules - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 574.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(126, 126, 'JN-126-2751', NULL, 'Control Sensors - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 344.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(127, 127, 'JN-127-9432', NULL, 'Voltage Sensor Modules - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 38, 60.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(128, 128, 'JN-128-3157', NULL, 'Internal Alternator Fans - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 16, 276.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(129, 129, 'JN-129-8832', NULL, 'External Cooling Fans - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 46, 339.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(130, 130, 'JN-130-3940', NULL, 'Air Flow Baffles - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 39, 549.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(131, 131, 'JN-131-5841', NULL, 'Coil Pole Shoes - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 14, 185.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(132, 132, 'JN-132-2470', NULL, 'Retaining Screws - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 48, 642.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(133, 133, 'JN-133-4689', NULL, 'Shoe Wedges - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 24, 312.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(134, 134, 'JN-134-8422', NULL, '12V Starter Field Coils - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 16, 427.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(135, 135, 'JN-135-9997', NULL, '24V Field Coils - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 18, 83.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(136, 136, 'JN-136-1931', NULL, 'Heavy Duty Copper Coils - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 441.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(137, 137, 'JN-137-4510', NULL, 'Housing Gaskets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 9, 118.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(138, 138, 'JN-138-9336', NULL, 'Solenoid Gasket Seals - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 550.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(139, 139, 'JN-139-5983', NULL, 'O-Ring Gasket Packs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 25, 516.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(140, 140, 'JN-140-6700', NULL, 'Rubber Wire Grommets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 549.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(141, 141, 'JN-141-1825', NULL, 'Insulation Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 5, 326.95, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(142, 142, 'JN-142-2145', NULL, 'Firewall Grommet Packs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 20, 415.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(143, 143, 'JN-143-3040', NULL, 'Drive End Housings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 47, 307.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(145, 145, 'JN-145-5252', NULL, 'Alternator Front Frames - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 6, 331.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(146, 146, 'JN-146-3659', NULL, 'Terminal Post Insulators - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 27, 350.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(147, 147, 'JN-147-1351', NULL, 'Mica Segments - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 17, 158.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(148, 148, 'JN-148-3577', NULL, 'Bakelite Spacers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 280.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(149, 149, 'JN-149-6660', NULL, 'Woodruff Keys - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 16, 205.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(150, 150, 'JN-150-2931', NULL, 'Drive Shaft Keys - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 56.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(151, 151, 'JN-151-4756', NULL, 'Square Key Stock - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 19, 415.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(152, 152, 'JN-152-5464', NULL, 'Brush Lead Wires - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 462.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(153, 153, 'JN-153-6933', NULL, 'Solenoid Ground Leads - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 50, 615.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(154, 154, 'JN-154-1934', NULL, 'Flexible Copper Straps - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 263.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(155, 155, 'JN-155-3312', NULL, 'Lock Washers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 13, 585.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(156, 156, 'JN-156-4505', NULL, 'Hex Nuts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 560.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(157, 157, 'JN-157-1339', NULL, 'Snap Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 27, 258.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(158, 158, 'JN-158-2300', NULL, 'Rivets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 644.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(159, 159, 'JN-159-8898', NULL, 'Spacer Plugs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 50, 440.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(160, 160, 'JN-160-3112', NULL, 'Pulley Nuts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 15, 503.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(161, 161, 'JN-161-8292', NULL, 'Terminal Stud Nuts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 15, 320.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(162, 162, 'JN-162-5622', NULL, 'Flange Nuts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 24, 199.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(163, 163, 'JN-163-9476', NULL, 'Locking Nuts - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 32, 309.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(164, 164, 'JN-164-8754', NULL, 'Sintered Bronze Wicks - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 15, 466.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(165, 165, 'JN-165-9681', NULL, 'Spring Loaded Oil Cups - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 29, 230.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(166, 166, 'JN-166-7544', NULL, 'Lubrication Felt Pads - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 29, 480.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(167, 167, 'JN-167-1416', NULL, 'High Temp Viton O-Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 44, 332.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(168, 168, 'JN-168-1961', NULL, 'Solenoid O-Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 34, 260.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(169, 169, 'JN-169-5059', NULL, 'Sealing Ring Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 41, 442.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(170, 170, 'JN-170-8959', NULL, 'Ground Straps - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 18, 76.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(171, 171, 'JN-171-1868', NULL, 'Spacer Sleeves - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 35, 88.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(172, 172, 'JN-172-3885', NULL, 'Specialty Fasteners - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 49, 507.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(173, 173, 'JN-173-2208', NULL, 'Roll Pins - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 27, 305.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(174, 174, 'JN-174-2844', NULL, 'Dowel Pins - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 8, 520.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(175, 175, 'JN-175-9945', NULL, 'Solid Copper Rivets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 8, 501.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(176, 176, 'JN-176-8773', NULL, 'Clevis Pins - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 5, 295.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(177, 177, 'JN-177-3330', NULL, 'Housing Core Plugs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 49, 381.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(178, 178, 'JN-178-5882', NULL, 'Welch Plugs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 43, 494.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(179, 179, 'JN-179-2073', NULL, 'Rubber Access Plugs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 20, 380.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(180, 180, 'JN-180-7852', NULL, 'Pulley Spacers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 48, 386.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(181, 181, 'JN-181-2939', NULL, 'Lock Washers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 23, 293.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(182, 182, 'JN-182-9423', NULL, 'Decoupler Springs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 285.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(183, 183, 'JN-183-8719', NULL, 'Solid V-Belt Pulleys - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 165.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(184, 184, 'JN-184-3099', NULL, 'Serpentine Multi-Groove Pulleys - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 42, 367.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(185, 185, 'JN-185-1457', NULL, 'Clutch Pulleys - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 33, 509.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(186, 186, 'JN-186-5706', NULL, 'Heavy Duty Rectifiers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 9, 48.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(188, 188, 'JN-188-4854', NULL, 'Alternator Diode Plates - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 18, 429.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(192, 192, 'JN-192-2192', NULL, 'Starter Rebuild Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 26, 71.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(193, 193, 'JN-193-7572', NULL, 'Alternator Overhaul Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 38, 233.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(195, 195, 'JN-195-8587', NULL, 'Alternator Rotors - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 39, 215.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(196, 196, 'JN-196-5681', NULL, 'Slip Rings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 264.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(197, 197, 'JN-197-4044', NULL, 'Rotor Shaft Segments - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 31, 55.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(198, 198, 'JN-198-2522', NULL, 'Shaft Oil Seals - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 30, 535.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(199, 199, 'JN-199-6598', NULL, 'Grease Retainers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 599.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(200, 200, 'JN-200-2586', NULL, 'High Temp V-Seals - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 15, 329.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(201, 201, 'JN-201-3315', NULL, 'Starter Shift Forks - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 5, 46.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(202, 202, 'JN-202-6703', NULL, 'Plunger Pins - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 38, 290.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(203, 203, 'JN-203-2083', NULL, 'Lever Pivot Pins - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 7, 449.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(204, 204, 'JN-204-3871', NULL, 'Electrical Tape - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 26, 617.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(205, 205, 'JN-205-6779', NULL, 'Cable Ties - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 7, 310.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(206, 206, 'JN-206-4847', NULL, 'Contact Cleaner - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 36, 389.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(207, 207, 'JN-207-1044', NULL, 'Dielectric Grease - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 50, 611.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(208, 208, 'JN-208-8734', NULL, 'Starter Solenoids - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 41, 120.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(209, 209, 'JN-209-5035', NULL, 'Solenoid Caps - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 17, 291.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(210, 210, 'JN-210-6861', NULL, 'Contact Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 8, 606.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(211, 211, 'JN-211-6777', NULL, 'Plungers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 37, 90.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(212, 212, 'JN-212-1036', NULL, 'Spool Spacers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 610.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(213, 213, 'JN-213-2563', NULL, 'Mounting Ear Bushings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 50, 504.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(214, 214, 'JN-214-5403', NULL, 'Alignment Sleeves - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 32, 381.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(215, 215, 'JN-215-8038', NULL, '12V Alternator Stators - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 45, 151.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(216, 216, 'JN-216-5594', NULL, '24V Stator Windings - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 10, 53.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(217, 217, 'JN-217-2809', NULL, 'High Output Core Loops - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 5, 499.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(218, 218, 'JN-218-3435', NULL, 'Terminal Studs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 24, 470.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(219, 219, 'JN-219-5305', NULL, 'Housing Thru Studs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 42, 74.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(220, 220, 'JN-220-2504', NULL, 'Mounting Stud Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 47, 437.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(221, 221, 'JN-221-2329', NULL, 'Pulley Pullers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 8, 619.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(222, 222, 'JN-222-6198', NULL, 'Test Benches - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 47, 148.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(223, 223, 'JN-223-1142', NULL, 'Terminal Crimping Tools - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 47, 437.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(224, 224, 'JN-224-9645', NULL, 'Thrust Washers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 15, 335.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(225, 225, 'JN-225-6286', NULL, 'Fiber Insulating Washers - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 28, 499.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(226, 226, 'JN-226-2706', NULL, 'Wave Springs - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 40, 163.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(227, 227, 'JN-227-8339', NULL, 'Complete Gasket Overhaul Sets - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 18, 394.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(228, 228, 'JN-228-3451', NULL, 'Hydro-Boost Seal Kits - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 50, 572.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(229, 229, 'JN-229-9136', NULL, '12V Wiper Motors - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 35, 618.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(230, 230, 'JN-230-5264', NULL, '24V Heavy Duty Marine Wiper Assemblies - Premium Rebuild Unit', 'Industrial Grade Fitment Requirements Meta Track Data.', 'In Stock', 38, 393.95, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(231, 231, 'JN-231-4981', NULL, 'Alarms and Horns - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 15, 859.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(232, 232, 'JN-232-2440', NULL, 'Armatures and Parts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 24, 714.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(233, 233, 'JN-233-7572', NULL, 'Batteries and Battery Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 8, 625.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(234, 234, 'JN-234-8691', NULL, 'Battery Chargers and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 7, 844.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(235, 235, 'JN-235-3615', NULL, 'Blower/Fan Motors and Wheels - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 6, 717.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(236, 236, 'JN-236-2512', NULL, 'Boxes, Tape and Packaging Supplies - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 19, 807.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(237, 237, 'JN-237-1070', NULL, 'Cameras and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 17, 660.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(238, 238, 'JN-238-2450', NULL, 'Carburetors, Kits and Parts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 3, 178.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(239, 239, 'JN-239-8002', NULL, 'Connectors - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 16, 693.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(240, 240, 'JN-240-4043', NULL, 'Converters and Equalizers - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 17, 601.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(241, 241, 'JN-241-2411', NULL, 'Distributors, Kits and Parts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 19, 471.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(242, 242, 'JN-242-7947', NULL, 'Electronic Control Products - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 7, 538.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(243, 243, 'JN-243-7486', NULL, 'Fuel Pumps and Related Parts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 18, 176.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(244, 244, 'JN-244-6200', NULL, 'Fuses, Fuse Holders and Fuse Links - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 8, 448.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(245, 245, 'JN-245-6763', NULL, 'Gauges - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 3, 747.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(246, 246, 'JN-246-2882', NULL, 'Inverters - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 3, 840.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(247, 247, 'JN-247-1520', NULL, 'Isolators and Separators - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 22, 178.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(248, 248, 'JN-248-3463', NULL, 'Junction Blocks and Brackets - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 13, 603.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(249, 249, 'JN-249-7069', NULL, 'Light Bulbs and Sealed Beams - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 9, 662.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(250, 250, 'JN-250-8785', NULL, 'Lighting Products and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 22, 873.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(251, 251, 'JN-251-9234', NULL, 'Miscellaneous Parts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 3, 405.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(252, 252, 'JN-252-9822', NULL, 'Paint - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 15, 185.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(253, 253, 'JN-253-7921', NULL, 'Plugs, Sockets and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 24, 680.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(254, 254, 'JN-254-5683', NULL, 'Relays - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 19, 446.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(255, 255, 'JN-255-4257', NULL, 'Shop Supplies - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 9, 612.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(256, 256, 'JN-256-6267', NULL, 'Switches and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 11, 307.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(257, 257, 'JN-257-5934', NULL, 'Terminal Kits - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 6, 428.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(258, 258, 'JN-258-3572', NULL, 'Thread Repair - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 15, 874.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(259, 259, 'JN-259-7432', NULL, 'Tools and Equipment - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 22, 345.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(260, 260, 'JN-260-5798', NULL, 'Warning Lights and Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 13, 127.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(261, 261, 'JN-261-7364', NULL, 'Window Lift Motors and Gear Kits - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 12, 622.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(262, 262, 'JN-262-2284', NULL, 'Wire Accessories - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 25, 831.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(263, 263, 'JN-263-5554', NULL, 'Wire and Cable - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 25, 420.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(264, 264, 'JN-264-1075', NULL, 'C&E Holdings - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 5, 224.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(265, 265, 'JN-265-2996', NULL, 'Catalogs - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 15, 205.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(266, 266, 'JN-266-1509', NULL, 'Circuit Breakers - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 15, 376.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(267, 267, 'JN-267-7847', NULL, 'Heat Shrink - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 7, 782.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(268, 268, 'JN-268-8160', NULL, 'Interparts - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 4, 735.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(269, 269, 'JN-269-9846', NULL, 'Oxygen Sensors - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 25, 425.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(270, 270, 'JN-270-1035', NULL, 'Spark Plugs - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 19, 512.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(271, 271, 'JN-271-8985', NULL, 'Supersprox - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 10, 190.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(272, 272, 'JN-272-1118', NULL, 'Terminals - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 10, 723.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(273, 273, 'JN-273-7464', NULL, 'Wiper Blades - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 23, 454.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(274, 274, 'JN-274-7951', NULL, 'All Balls Racing - Heavy Duty Component', '12-24 Volt System Match Operations Requirements Profile Setup.', 'In Stock', 10, 141.50, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(277, 1, 'JN-4040', NULL, 'Heavy', 'sadsad', 'Out of Stock', 0, 20.00, '2026-07-13 18:36:55', '2026-07-13 18:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `quotations`
--

CREATE TABLE `quotations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `quoted_total` decimal(10,2) DEFAULT NULL,
  `customer_notes` text DEFAULT NULL,
  `admin_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotations`
--

INSERT INTO `quotations` (`id`, `user_id`, `status`, `quoted_total`, `customer_notes`, `admin_notes`, `created_at`, `updated_at`) VALUES
(2, 1, 'approved', 1780.00, 'All parts should be delivered once', 'Approved', '2026-07-10 18:17:47', '2026-07-10 18:19:49'),
(3, 1, 'approved', 350.00, 'No', 'Approved Updated', '2026-07-10 19:01:27', '2026-07-10 19:18:13');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_items`
--

CREATE TABLE `quotation_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quotation_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `quotation_items`
--

INSERT INTO `quotation_items` (`id`, `quotation_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 2, 350.00, '2026-07-10 18:17:47', '2026-07-10 18:19:49'),
(5, 2, 2, 1, 720.00, '2026-07-10 18:17:47', '2026-07-10 18:19:49'),
(6, 3, 1, 1, 350.00, '2026-07-10 19:01:27', '2026-07-10 19:02:35');

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
('4m3VeBunhxe4ZsVl1u7GvCMcmsXerKeC0RYPCNlL', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNDBEcmh4RmRrVHhPbzBydEs3MWJPZzNhSXh0dWlyeFNXcTM2MnF5ZyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI3OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4iO3M6NToicm91dGUiO3M6MTU6ImFkbWluLmRhc2hib2FyZCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImNhcnQiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1784065017);

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `main_category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT 0,
  `featured_image_url` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `main_category_id`, `name`, `slug`, `is_featured`, `featured_image_url`, `sort_order`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alternators', 'alternators', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-13 17:36:29'),
(2, 1, 'Alternator and Starter Conversion Kits', 'alternator-and-starter-conversion-kits', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(3, 1, 'Alternator Conversion Kits', 'alternator-conversion-kits', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(4, 1, 'American Power Systems Alternators', 'american-power-systems-alternators', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(5, 2, 'Arrowhead Alternators', 'arrowhead-alternators', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(6, 2, 'Balmar Alternators', 'balmar-alternators', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(7, 2, 'Bosch Alternators', 'bosch-alternators', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(8, 2, 'C.E. Niehoff Alternators', 'ce-niehoff-alternators', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(9, 2, 'Delco Alternators', 'delco-alternators', 0, NULL, 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(10, 2, 'Denso Alternators', 'denso-alternators', 0, NULL, 5, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(11, 3, 'Denso High Output Alternators', 'denso-high-output-alternators', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(12, 3, 'Electrodyne Alternators', 'electrodyne-alternators', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(13, 3, 'HD Power Solutions Alternators', 'hd-power-solutions-alternators', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(14, 3, 'Hitachi Alternators', 'hitachi-alternators', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(15, 3, 'J&N Alternators', 'jn-alternators', 0, NULL, 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(16, 3, 'JANNCO Alternators', 'jannco-alternators', 0, NULL, 5, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(17, 4, 'Leece Neville Alternators', 'leece-neville-alternators', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(18, 4, 'Magneton Alternators', 'magneton-alternators', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(19, 4, 'Mahle Alternators', 'mahle-alternators', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(20, 4, 'Marelli Alternators', 'marelli-alternators', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(21, 4, 'Mitsubishi Alternators', 'mitsubishi-alternators', 0, NULL, 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(22, 4, 'Nikko Alternators', 'nikko-alternators', 0, NULL, 5, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(23, 5, 'Sawafuji Alternators', 'sawafuji-alternators', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(24, 5, 'Valeo Alternators', 'valeo-alternators', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(25, 5, 'Wilson Alternators', 'wilson-alternators', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(71, 16, 'Starter Armatures', 'starter-armatures', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Armatures-700x700.jpg', 0, '2026-07-06 17:00:34', '2026-07-14 16:22:28'),
(72, 16, 'Alternator Armatures', 'alternator-armatures', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Armatures-700x700.jpg', 1, '2026-07-06 17:00:34', '2026-07-14 16:22:48'),
(74, 16, 'Core Windings', 'core-windings', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(75, 17, 'Ball Bearings', 'ball-bearings', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(76, 17, 'Needle Bearings', 'needle-bearings', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(77, 17, 'Sealed Bearings', 'sealed-bearings', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(78, 17, 'Tolerance Rings', 'tolerance-rings', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(79, 17, 'Bushings', 'bushings', 0, NULL, 4, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(80, 18, 'Housing Bolts', 'housing-bolts', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(81, 18, 'Thru Bolts', 'thru-bolts', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(82, 18, 'Terminal Screws', 'terminal-screws', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(83, 18, 'Mounting Hardware Kits', 'mounting-hardware-kits', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(84, 19, 'Solonoid Boots', 'solonoid-boots', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(85, 19, 'Terminal Insulator Boots', 'terminal-insulator-boots', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(86, 19, 'Weatherproof Rubber Boots', 'weatherproof-rubber-boots', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(87, 20, 'Starter Brush Holders', 'starter-brush-holders', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(88, 20, 'Alternator Brush Holders', 'alternator-brush-holders', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(89, 20, 'Holder Springs', 'holder-springs', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(90, 20, 'Insulators', 'insulators', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(91, 21, 'Carbon Brushes', 'carbon-brushes', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(92, 21, 'Copper Brushes', 'copper-brushes', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(93, 21, 'Heavy Duty Fleet Kits', 'heavy-duty-fleet-kits', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(94, 21, 'Assortment Packs', 'assortment-packs', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(95, 22, 'Bronze Bushings', 'bronze-bushings', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(96, 22, 'Oilless Bushings', 'oilless-bushings', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(97, 22, 'Starter Drive End Bushings', 'starter-drive-end-bushings', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(98, 23, 'Radio Noise Capacitors', 'radio-noise-capacitors', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(99, 23, 'Ignition Condensers', 'ignition-condensers', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(100, 23, 'Ballast Resistors', 'ballast-resistors', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(101, 24, 'Center Support Bearings', 'center-support-bearings', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(102, 24, 'Housing Center Brackets', 'housing-center-brackets', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(103, 24, 'Structural Shims', 'structural-shims', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(104, 25, 'Stop Collars', 'stop-collars', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(105, 25, 'Thrust Washers', 'thrust-washers', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(106, 25, 'Retaining Rings', 'retaining-rings', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(107, 25, 'Snap Ring Packs', 'snap-ring-packs', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(108, 26, 'Wire Terminals', 'wire-terminals', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Terminals-700x700.jpg', 0, '2026-07-06 17:00:34', '2026-07-14 16:23:11'),
(109, 26, 'Wiring Harness Plugs', 'wiring-harness-plugs', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(110, 26, 'Multi-Pin Adapters', 'multi-pin-adapters', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(111, 26, 'Crimp Sockets', 'crimp-sockets', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(112, 27, 'Starter Band Covers', 'starter-band-covers', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(113, 27, 'Alternator End Covers', 'alternator-end-covers', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(114, 27, 'Debris Splash Shields', 'debris-splash-shields', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(115, 28, 'Button Diodes', 'button-diodes', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(116, 28, 'Diode Trios', 'diode-trios', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(117, 28, 'Press-Fit Diodes', 'press-fit-diodes', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(118, 28, 'Isolation Diodes', 'isolation-diodes', 0, NULL, 3, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(119, 29, 'Rubber Drain Vents', 'rubber-drain-vents', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(120, 29, 'Housing Weep Tubes', 'housing-weep-tubes', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(121, 29, 'Breather Tubes', 'breather-tubes', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(122, 30, 'Starter Drives', 'starter-drives', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(123, 30, 'Overrunning Alternator Clutches (OAC)', 'overrunning-alternator-clutches-oac', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(124, 30, 'Pulley Clutches', 'pulley-clutches', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(125, 31, 'Ignition Modules', 'ignition-modules', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(126, 31, 'Control Sensors', 'control-sensors', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(127, 31, 'Voltage Sensor Modules', 'voltage-sensor-modules', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(128, 32, 'Internal Alternator Fans', 'internal-alternator-fans', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(129, 32, 'External Cooling Fans', 'external-cooling-fans', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(130, 32, 'Air Flow Baffles', 'air-flow-baffles', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(131, 33, 'Coil Pole Shoes', 'coil-pole-shoes', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(132, 33, 'Retaining Screws', 'retaining-screws', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(133, 33, 'Shoe Wedges', 'shoe-wedges', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(134, 34, '12V Starter Field Coils', '12v-starter-field-coils', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(135, 34, '24V Field Coils', '24v-field-coils', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(136, 34, 'Heavy Duty Copper Coils', 'heavy-duty-copper-coils', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(137, 35, 'Housing Gaskets', 'housing-gaskets', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(138, 35, 'Solenoid Gasket Seals', 'solenoid-gasket-seals', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(139, 35, 'O-Ring Gasket Packs', 'o-ring-gasket-packs', 0, NULL, 2, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(140, 36, 'Rubber Wire Grommets', 'rubber-wire-grommets', 0, NULL, 0, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(141, 36, 'Insulation Bushings', 'insulation-bushings', 0, NULL, 1, '2026-07-06 17:00:34', '2026-07-06 17:00:34'),
(142, 36, 'Firewall Grommet Packs', 'firewall-grommet-packs', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(143, 37, 'Drive End Housings', 'drive-end-housings', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Housings-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(145, 37, 'Alternator Front Frames', 'alternator-front-frames', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(146, 38, 'Terminal Post Insulators', 'terminal-post-insulators', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(147, 38, 'Mica Segments', 'mica-segments', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(148, 38, 'Bakelite Spacers', 'bakelite-spacers', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(149, 39, 'Woodruff Keys', 'woodruff-keys', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(150, 39, 'Drive Shaft Keys', 'drive-shaft-keys', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(151, 39, 'Square Key Stock', 'square-key-stock', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(152, 40, 'Brush Lead Wires', 'brush-lead-wires', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(153, 40, 'Solenoid Ground Leads', 'solenoid-ground-leads', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(154, 40, 'Flexible Copper Straps', 'flexible-copper-straps', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(155, 41, 'Lock Washers', 'lock-washers', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(156, 41, 'Hex Nuts', 'hex-nuts', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(157, 41, 'Snap Rings', 'snap-rings', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(158, 41, 'Rivets', 'rivets', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(159, 41, 'Spacer Plugs', 'spacer-plugs', 0, NULL, 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(160, 42, 'Pulley Nuts', 'pulley-nuts', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(161, 42, 'Terminal Stud Nuts', 'terminal-stud-nuts', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(162, 42, 'Flange Nuts', 'flange-nuts', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(163, 42, 'Locking Nuts', 'locking-nuts', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(164, 43, 'Sintered Bronze Wicks', 'sintered-bronze-wicks', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(165, 43, 'Spring Loaded Oil Cups', 'spring-loaded-oil-cups', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(166, 43, 'Lubrication Felt Pads', 'lubrication-felt-pads', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(167, 44, 'High Temp Viton O-Rings', 'high-temp-viton-o-rings', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(168, 44, 'Solenoid O-Rings', 'solenoid-o-rings', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(169, 44, 'Sealing Ring Kits', 'sealing-ring-kits', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(170, 45, 'Ground Straps', 'ground-straps', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(171, 45, 'Spacer Sleeves', 'spacer-sleeves', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(172, 45, 'Specialty Fasteners', 'specialty-fasteners', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(173, 46, 'Roll Pins', 'roll-pins', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(174, 46, 'Dowel Pins', 'dowel-pins', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(175, 46, 'Solid Copper Rivets', 'solid-copper-rivets', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(176, 46, 'Clevis Pins', 'clevis-pins', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(177, 47, 'Housing Core Plugs', 'housing-core-plugs', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(178, 47, 'Welch Plugs', 'welch-plugs', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(179, 47, 'Rubber Access Plugs', 'rubber-access-plugs', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(180, 48, 'Pulley Spacers', 'pulley-spacers', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(181, 48, 'Lock Washers', 'lock-washers', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(182, 48, 'Decoupler Springs', 'decoupler-springs', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(183, 49, 'Solid V-Belt Pulleys', 'solid-v-belt-pulleys', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(184, 49, 'Serpentine Multi-Groove Pulleys', 'serpentine-multi-groove-pulleys', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(185, 49, 'Clutch Pulleys', 'clutch-pulleys', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(186, 50, 'Heavy Duty Rectifiers', 'heavy-duty-rectifiers', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rectifiers-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(188, 50, 'Alternator Diode Plates', 'alternator-diode-plates', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(192, 52, 'Starter Rebuild Kits', 'starter-rebuild-kits', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(193, 52, 'Alternator Overhaul Kits', 'alternator-overhaul-kits', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(195, 53, 'Alternator Rotors', 'alternator-rotors', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rotors-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(196, 53, 'Slip Rings', 'slip-rings', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(197, 53, 'Rotor Shaft Segments', 'rotor-shaft-segments', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(198, 54, 'Shaft Oil Seals', 'shaft-oil-seals', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(199, 54, 'Grease Retainers', 'grease-retainers', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(200, 54, 'High Temp V-Seals', 'high-temp-v-seals', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(201, 55, 'Starter Shift Forks', 'starter-shift-forks', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(202, 55, 'Plunger Pins', 'plunger-pins', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(203, 55, 'Lever Pivot Pins', 'lever-pivot-pins', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(204, 56, 'Electrical Tape', 'electrical-tape', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(205, 56, 'Cable Ties', 'cable-ties', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(206, 56, 'Contact Cleaner', 'contact-cleaner', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(207, 56, 'Dielectric Grease', 'dielectric-grease', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(208, 57, 'Starter Solenoids', 'starter-solenoids', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Solenoids-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(209, 57, 'Solenoid Caps', 'solenoid-caps', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(210, 57, 'Contact Kits', 'contact-kits', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(211, 57, 'Plungers', 'plungers', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(212, 58, 'Spool Spacers', 'spool-spacers', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(213, 58, 'Mounting Ear Bushings', 'mounting-ear-bushings', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(214, 58, 'Alignment Sleeves', 'alignment-sleeves', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(215, 59, '12V Alternator Stators', '12v-alternator-stators', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Stators-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(216, 59, '24V Stator Windings', '24v-stator-windings', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(217, 59, 'High Output Core Loops', 'high-output-core-loops', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(218, 60, 'Terminal Studs', 'terminal-studs', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(219, 60, 'Housing Thru Studs', 'housing-thru-studs', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(220, 60, 'Mounting Stud Kits', 'mounting-stud-kits', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(221, 61, 'Pulley Pullers', 'pulley-pullers', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(222, 61, 'Test Benches', 'test-benches', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(223, 61, 'Terminal Crimping Tools', 'terminal-crimping-tools', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(224, 62, 'Thrust Washers', 'thrust-washers', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(225, 62, 'Fiber Insulating Washers', 'fiber-insulating-washers', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(226, 62, 'Wave Springs', 'wave-springs', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(227, 63, 'Complete Gasket Overhaul Sets', 'complete-gasket-overhaul-sets', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(228, 63, 'Hydro-Boost Seal Kits', 'hydro-boost-seal-kits', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(229, 64, '12V Wiper Motors', '12v-wiper-motors', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(230, 64, '24V Heavy Duty Marine Wiper Assemblies', '24v-heavy-duty-marine-wiper-assemblies', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(231, 65, 'Alarms and Horns', 'alarms-and-horns', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(232, 65, 'Armatures and Parts', 'armatures-and-parts', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Armatures-700x700.jpg', 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(233, 65, 'Batteries and Battery Accessories', 'batteries-and-battery-accessories', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(234, 65, 'Battery Chargers and Accessories', 'battery-chargers-and-accessories', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(235, 65, 'Blower/Fan Motors and Wheels', 'blowerfan-motors-and-wheels', 0, NULL, 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(236, 65, 'Boxes, Tape and Packaging Supplies', 'boxes-tape-and-packaging-supplies', 0, NULL, 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(237, 65, 'Cameras and Accessories', 'cameras-and-accessories', 0, NULL, 6, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(238, 66, 'Carburetors, Kits and Parts', 'carburetors-kits-and-parts', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(239, 66, 'Connectors', 'connectors', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(240, 66, 'Converters and Equalizers', 'converters-and-equalizers', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(241, 66, 'Distributors, Kits and Parts', 'distributors-kits-and-parts', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(242, 66, 'Electronic Control Products', 'electronic-control-products', 0, NULL, 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(243, 66, 'Fuel Pumps and Related Parts', 'fuel-pumps-and-related-parts', 0, NULL, 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(244, 66, 'Fuses, Fuse Holders and Fuse Links', 'fuses-fuse-holders-and-fuse-links', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Fuses-700x700.jpg', 6, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(245, 66, 'Gauges', 'gauges', 0, NULL, 7, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(246, 66, 'Inverters', 'inverters', 0, NULL, 8, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(247, 67, 'Isolators and Separators', 'isolators-and-separators', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(248, 67, 'Junction Blocks and Brackets', 'junction-blocks-and-brackets', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(249, 67, 'Light Bulbs and Sealed Beams', 'light-bulbs-and-sealed-beams', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(250, 67, 'Lighting Products and Accessories', 'lighting-products-and-accessories', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(251, 67, 'Miscellaneous Parts', 'miscellaneous-parts', 0, NULL, 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(252, 67, 'Paint', 'paint', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Paint-700x700.jpg', 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(253, 67, 'Plugs, Sockets and Accessories', 'plugs-sockets-and-accessories', 0, NULL, 6, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(254, 67, 'Relays', 'relays', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Relays-700x700.jpg', 7, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(255, 67, 'Shop Supplies', 'shop-supplies', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Shop-Supplies-700x700.jpg', 8, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(256, 68, 'Switches and Accessories', 'switches-and-accessories', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Switches-700x700.jpg', 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(257, 68, 'Terminal Kits', 'terminal-kits', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(258, 68, 'Thread Repair', 'thread-repair', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(259, 68, 'Tools and Equipment', 'tools-and-equipment', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(260, 68, 'Warning Lights and Accessories', 'warning-lights-and-accessories', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Lights-700x700.jpg', 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(261, 68, 'Window Lift Motors and Gear Kits', 'window-lift-motors-and-gear-kits', 0, NULL, 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(262, 68, 'Wire Accessories', 'wire-accessories', 0, NULL, 6, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(263, 68, 'Wire and Cable', 'wire-and-cable', 0, NULL, 7, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(264, 68, 'C&E Holdings', 'ce-holdings', 0, NULL, 8, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(265, 69, 'Catalogs', 'catalogs', 0, NULL, 0, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(266, 69, 'Circuit Breakers', 'circuit-breakers', 0, NULL, 1, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(267, 69, 'Heat Shrink', 'heat-shrink', 0, NULL, 2, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(268, 69, 'Interparts', 'interparts', 0, NULL, 3, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(269, 69, 'Oxygen Sensors', 'oxygen-sensors', 0, NULL, 4, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(270, 69, 'Spark Plugs', 'spark-plugs', 0, NULL, 5, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(271, 69, 'Supersprox', 'supersprox', 0, NULL, 6, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(272, 69, 'Terminals', 'terminals', 1, 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Terminals-700x700.jpg', 7, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(273, 69, 'Wiper Blades', 'wiper-blades', 0, NULL, 8, '2026-07-06 17:00:35', '2026-07-06 17:00:35'),
(274, 69, 'All Balls Racing', 'all-balls-racing', 0, NULL, 9, '2026-07-06 17:00:35', '2026-07-06 17:00:35');

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
(1, 'Test User', 'test@example.com', '2026-07-02 14:53:24', '$2y$12$9lHshcX.sjJc2iJ4mDZNpOOw29Yg0tdfMljZBkFyN2BImcHbFhbrO', 'I3cfh8kjpDZrFWKbKUmS6jGJh5jEJsCssJIuaOHFg2iP36iByGRrcdFzxdGm', '2026-07-02 14:53:25', '2026-07-02 14:53:25');

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
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`),
  ADD UNIQUE KEY `departments_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `main_categories_department_id_slug_unique` (`department_id`,`slug`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_part_number_unique` (`part_number`),
  ADD KEY `products_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `quotations`
--
ALTER TABLE `quotations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotations_user_id_foreign` (`user_id`),
  ADD KEY `quotations_status_index` (`status`);

--
-- Indexes for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quotation_items_quotation_id_foreign` (`quotation_id`),
  ADD KEY `quotation_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subcategories_main_category_id_slug_unique` (`main_category_id`,`slug`),
  ADD KEY `subcategories_is_featured_index` (`is_featured`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `main_categories`
--
ALTER TABLE `main_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT for table `quotations`
--
ALTER TABLE `quotations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quotation_items`
--
ALTER TABLE `quotation_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `main_categories`
--
ALTER TABLE `main_categories`
  ADD CONSTRAINT `main_categories_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotations`
--
ALTER TABLE `quotations`
  ADD CONSTRAINT `quotations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotation_items`
--
ALTER TABLE `quotation_items`
  ADD CONSTRAINT `quotation_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quotation_items_quotation_id_foreign` FOREIGN KEY (`quotation_id`) REFERENCES `quotations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_main_category_id_foreign` FOREIGN KEY (`main_category_id`) REFERENCES `main_categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
