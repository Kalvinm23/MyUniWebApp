-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2020 at 05:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myuniwebapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `created_at`, `updated_at`) VALUES
(13, 'Gibson', '2020-04-15 21:49:18', '2020-04-15 21:49:18'),
(14, 'Fender', '2020-04-15 21:49:53', '2020-04-15 21:49:53'),
(15, 'Rickenbacker', '2020-04-15 21:50:15', '2020-04-15 21:50:15'),
(16, 'Jackson', '2020-04-15 21:50:23', '2020-04-15 21:50:23'),
(17, 'VEGAS', '2020-04-15 21:50:44', '2020-04-15 21:50:44'),
(18, 'MAGIX', '2020-04-15 21:51:25', '2020-04-15 21:51:25'),
(19, 'Native Instruments', '2020-04-15 21:51:33', '2020-04-15 21:51:33');

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
(1, '2014_10_12_000000_create_users_table', 1),
(3, '2020_03_30_223043_create_user__details_table', 2),
(4, '2020_03_30_223043_create_userdetails_table', 3),
(5, '2020_03_30_223043_create_user_details_table', 4),
(6, '2020_03_30_234123_create_user_details_table', 5),
(20, '2020_03_31_091911_create_products_table', 6),
(21, '2020_03_31_092142_create_types_table', 6),
(22, '2020_03_31_092210_create_stocks_table', 6),
(23, '2020_03_31_092224_create_suppliers_table', 6),
(24, '2020_03_31_100320_create_brands_table', 6),
(25, '2020_03_31_161951_create_suppliers_table', 7),
(26, '2020_03_31_162240_create_suppliers_table', 8),
(27, '2020_04_01_175222_create_products_table', 9),
(28, '2020_04_01_180212_create_product_suppliers_table', 9),
(29, '2020_04_02_232407_create_products_table', 10),
(30, '2018_12_23_120000_create_shoppingcart_table', 11),
(32, '2020_03_31_091833_create_order_details_table', 11),
(35, '2020_03_31_091821_create_orders_table', 12),
(39, '2020_04_13_180016_create_supplier_order_details_table', 15),
(40, '2020_04_13_175931_create_supplier_orders_table', 16),
(41, '2014_10_12_100000_create_password_resets_table', 17),
(42, '2020_03_31_091902_create_product_reviews_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `payment_code`, `status`, `address`, `postcode`, `city`, `contact_number`, `tracking_code`, `created_at`, `updated_at`) VALUES
(16, 12, '2,009.00', '013121217S545684J', 1, 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', NULL, '2020-04-15 22:54:57', '2020-04-15 22:54:57'),
(17, 17, '2,720.00', '013121217S545684J', 1, '8 Evelyn Grove North', 'DN32 8LA', 'Grimsby', '07123456789', NULL, '2020-04-18 12:56:29', '2020-04-18 12:56:29'),
(18, 9, '2,009.00', '013121217S545684J', 1, '2 Anglesey Drive', 'DN40 1RE', 'Immingham', '07974667847', NULL, '2020-04-26 17:19:02', '2020-04-26 17:19:02'),
(19, 9, '2,720.00', '013121217S545684J', 1, '2 Anglesey Drive', 'DN40 1RE', 'Immingham', '07974667847', NULL, '2020-05-11 10:51:44', '2020-05-11 10:51:44'),
(20, 12, '3,889.00', '013121217S545684J', 3, 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', '9059495251484386', '2020-07-05 11:45:33', '2020-07-05 11:47:40'),
(21, 12, '3,199.00', '013121217S545684J', 3, 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', '9059495251484386', '2020-07-05 11:59:01', '2020-07-05 12:00:22'),
(22, 12, '3,889.00', '013121217S545684J', 1, 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', NULL, '2020-07-05 12:19:22', '2020-07-05 12:19:22'),
(23, 12, '2,889.00', '013121217S545684J', 3, 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', '9059495251484386', '2020-07-05 12:30:47', '2020-07-05 12:38:12');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(22, 16, 10, '2009.00', 1, '2020-04-15 22:54:57', '2020-04-15 22:54:57'),
(23, 17, 15, '2720.00', 1, '2020-04-18 12:56:29', '2020-04-18 12:56:29'),
(24, 18, 10, '2009.00', 1, '2020-04-26 17:19:02', '2020-04-26 17:19:02'),
(25, 19, 15, '2720.00', 1, '2020-05-11 10:51:44', '2020-05-11 10:51:44'),
(26, 20, 16, '2889.00', 1, '2020-07-05 11:45:33', '2020-07-05 11:45:33'),
(27, 20, 24, '1000.00', 1, '2020-07-05 11:45:33', '2020-07-05 11:45:33'),
(28, 21, 17, '2199.00', 1, '2020-07-05 11:59:01', '2020-07-05 11:59:01'),
(29, 21, 24, '1000.00', 1, '2020-07-05 11:59:01', '2020-07-05 11:59:01'),
(30, 22, 16, '2889.00', 1, '2020-07-05 12:19:22', '2020-07-05 12:19:22'),
(31, 22, 24, '1000.00', 1, '2020-07-05 12:19:22', '2020-07-05 12:19:22'),
(32, 23, 16, '2889.00', 1, '2020-07-05 12:30:47', '2020-07-05 12:30:47');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `supplier_id`, `type_id`, `price`, `image`, `brand_id`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(6, 'SG Junior - Vintage Cherry', 3, 1, '1399.00', 'Gibson1_1586991390.png', 13, 24, 1, '2020-04-15 21:56:30', '2020-07-05 12:34:49'),
(7, 'Les Paul Junior – Ebony', 3, 1, '1499.00', 'Gibson2_1586991458.png', 13, 50, 1, '2020-04-15 21:57:38', '2020-04-15 21:57:38'),
(8, '60s J-45 Original – Ebony', 3, 1, '2499.00', 'Gibson3_1586991561.png', 13, 10, 1, '2020-04-15 21:59:21', '2020-07-05 12:34:49'),
(9, 'VINTERA 60S JAGUAR MODIFIED HH', 4, 1, '929.00', 'Fender1_1586992276.png', 14, 3, 1, '2020-04-15 22:11:16', '2020-04-15 22:11:16'),
(10, 'AMERICAN ULTRA JAZZ BASS', 4, 1, '2009.00', 'fender2_1586992326.png', 14, 28, 1, '2020-04-15 22:12:06', '2020-04-26 17:19:02'),
(11, 'KINGMA BASS', 4, 1, '519.00', 'fender3_1586992369.png', 14, 6, 1, '2020-04-15 22:12:49', '2020-04-15 22:12:49'),
(12, 'Movie Studio 16 Suite', 5, 2, '100.00', 'VEGAS1_1586992478.png', 17, 4, 1, '2020-04-15 22:14:38', '2020-04-15 22:14:38'),
(13, 'Movie Studio 16 Platinum', 5, 2, '45.00', 'VEGAS2_1586992526.png', 17, 25, 1, '2020-04-15 22:15:26', '2020-07-05 11:18:12'),
(14, 'VEGAS Pro 17 Edit', 5, 2, '189.00', 'VEGAS3_1586992557.png', 17, 3, 1, '2020-04-15 22:15:57', '2020-04-15 22:15:57'),
(15, '360 Deluxe Thinline Fireglo', 6, 1, '2720.00', 'Rickenbacker1_1588635458.png', 15, 13, 2, '2020-04-15 22:20:06', '2020-07-05 11:18:03'),
(16, '660 Mapleglo', 6, 1, '2889.00', 'Rickenbacker2_1586992842.png', 15, 0, 2, '2020-04-15 22:20:42', '2020-07-05 12:32:07'),
(17, '330 Jetglo LH', 6, 1, '2199.00', 'Rickenbacker3_1586992966.png', 15, 5, 2, '2020-04-15 22:22:46', '2020-07-05 12:21:29'),
(18, 'PRO SERIES DINK, DK MODERN ASH HT7, EBONY FINGERBOARD, BAKED BLUE', 4, 1, '1299.00', 'Jackson1_1586993096.png', 16, 2, 1, '2020-04-15 22:24:56', '2020-04-15 22:25:52'),
(19, 'PRO SERIES SOLOIST, SL2, EBONY FINGERBOARD, RED MERCURY', 4, 1, '1000.00', 'Jackson2_1586993305.png', 16, 8, 1, '2020-04-15 22:28:25', '2020-04-15 22:28:25'),
(20, 'PRO SERIES RHOADS RR24Q, EBONY FINGERBOARD, TRANSPARENT PURPLE', 4, 1, '1000.00', 'Jackson3_1586993336.png', 16, 18, 1, '2020-04-15 22:28:56', '2020-04-15 22:28:56'),
(21, 'Music Maker 2020 Performer Edition', 5, 2, '169.00', 'MAGIX1_1586993427.png', 18, 30, 1, '2020-04-15 22:30:27', '2020-04-15 22:30:27'),
(22, 'Music Maker 2020 Premium Edition', 5, 2, '109.00', 'MAGIX2_1586993459.png', 18, 4, 1, '2020-04-15 22:30:59', '2020-04-15 22:30:59'),
(23, 'Music Maker 80s Edition', 5, 2, '40.00', 'MAGIX3_1586993488.png', 18, 30, 1, '2020-04-15 22:31:28', '2020-04-15 22:31:28'),
(24, 'Komplete 12 Ultimate', 3, 2, '1000.00', 'NativeInstruments1_1586993531.png', 19, 4, 1, '2020-04-15 22:32:11', '2020-07-05 12:19:22'),
(25, 'Komplete 12 Ultimate Collector\'s Edition', 3, 2, '1300.00', 'NativeInstruments2_1586993555.png', 19, 20, 1, '2020-04-15 22:32:35', '2020-04-15 22:32:35'),
(26, 'SESSION GUITARIST – ELECTRIC SUNBURST DELUXE', 3, 2, '129.00', 'NativeInstruments3_1586993577.png', 19, 21, 1, '2020-04-15 22:32:57', '2020-04-15 22:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `review` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `contract` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `contact_number`, `account_number`, `expiry_date`, `contract`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Supplier One', 'supplierone@gmail.com', '07123456789', '576812', '2021-04-15', 'Supplier One Contract_1586989090.pdf', 1, '2020-04-15 21:18:10', '2020-04-15 21:18:10'),
(4, 'Supplier Two', 'suppliertwo@gmail.com', '07456789123', '78935126', '2021-01-01', 'Supplier Two Contract_1586990220.pdf', 1, '2020-04-15 21:37:00', '2020-04-15 21:37:00'),
(5, 'Supplier Three', 'supplierthree@gmail.com', '07321564857', '1478256', '2022-02-02', 'Supplier Three Contract_1586990384.pdf', 1, '2020-04-15 21:39:44', '2020-04-15 21:39:44'),
(6, 'Supplier Four', 'supplierfour@gmail.com', '07852147963', '15975346', '0223-08-04', 'Supplier Four Contract_1586990442.pdf', 1, '2020-04-15 21:40:42', '2020-04-15 21:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_orders`
--

CREATE TABLE `supplier_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_orders`
--

INSERT INTO `supplier_orders` (`id`, `supplier_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 3, '2020-04-25 22:36:46', '2020-07-05 12:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_order_details`
--

CREATE TABLE `supplier_order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_order_details`
--

INSERT INTO `supplier_order_details` (`id`, `supplier_order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(11, 2, 6, 5, '2020-04-25 22:36:46', '2020-04-25 22:36:46'),
(12, 2, 8, 10, '2020-04-25 22:36:46', '2020-04-25 22:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Instrument', '2020-03-31 13:27:26', '2020-03-31 13:27:26'),
(2, 'Software', '2020-03-31 13:29:18', '2020-03-31 13:29:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `email_verified_at`, `password`, `permission`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, 'kalvin231995@gmail.com', NULL, '$2y$10$pFtjd9lHyfQfBeE6b4TtL.uB4jludKECNOt/Odb9ttuArZoxkvEJK', 2, 1, NULL, '2020-04-03 20:51:38', '2020-04-03 20:51:38'),
(12, 'customerone@gmail.com', NULL, '$2y$10$sWlwwqi4RANV2B0M/7SP9e6lPTNLsevHkxsztFcQIw0dtIrKgD3ae', 1, 1, NULL, '2020-04-15 20:39:18', '2020-07-05 12:38:25'),
(13, 'customertwo@gmail.com', NULL, '$2y$10$xCSJWeUO1.FJjIignr4SeuidEJuUEoYEK9HHXDoBGtgJ1k6grj7Sq', 1, 1, NULL, '2020-04-15 20:41:43', '2020-04-15 20:41:43'),
(14, 'customerthree@gmail.com', NULL, '$2y$10$z5tapzk4FWjgEXPEJi94Y.dThrvgUmEFuKEBlueKP1mhKlkPTRbUe', 1, 1, NULL, '2020-04-15 20:46:05', '2020-04-15 20:46:05'),
(15, 'customerfour@gmail.com', NULL, '$2y$10$bQQWYGfeHel7AAUchUJfoO.MF8bDaXrUQH7FLaNRtwiA3TAaVIjxi', 1, 1, NULL, '2020-04-15 20:47:40', '2020-04-15 20:47:40'),
(16, 'customerfive@gmail.com', NULL, '$2y$10$6TBLVUOeH6QB/RP4a6oswOLR/b3Mm9mZhpa8gFAg9LpQngoHVcKjS', 1, 1, NULL, '2020-04-15 20:49:02', '2020-04-15 20:49:02'),
(17, 'charlie@gmail.com', NULL, '$2y$10$BVZ6tns7BmOYKbrHhJWDF.xWwYWa9WWzGRxJpBGQ1O0aSQV9e1dj2', 1, 1, NULL, '2020-04-18 12:56:12', '2020-04-18 12:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `address`, `postcode`, `city`, `contact_number`, `created_at`, `updated_at`) VALUES
(2, 9, 'Kalvin', 'McKenna', '1995-05-23', '2 Anglesey Drive', 'DN40 1RE', 'Immingham', '07974667847', '2020-04-03 20:51:38', '2020-04-03 20:51:38'),
(4, 12, 'Customer', 'One', '2000-01-01', 'Weelsby Road 1', 'DN40 1RE', 'Grimsby', '07123456789', '2020-04-15 20:39:18', '2020-04-15 20:39:18'),
(5, 13, 'Customer', 'Two', '2000-01-01', 'Weelsby Road 2', 'Dn40 1BY', 'Cleethorpes', '07987654321', '2020-04-15 20:41:43', '2020-04-15 20:41:43'),
(6, 14, 'Customer', 'Three', '2002-02-02', 'Weelsby Road 3', 'DN32 5BE', 'Scunthorpe', '07456123789', '2020-04-15 20:46:05', '2020-04-15 20:46:05'),
(7, 15, 'Customer', 'Four', '1996-03-03', 'Weelsby Road 4', 'DN21 8SY', 'Barton', '07789654123', '2020-04-15 20:47:40', '2020-04-15 20:47:40'),
(8, 16, 'Customer', 'Five', '1990-05-05', 'Weelsby Road 5', 'AB12 5BE', 'Hull', '07879456231', '2020-04-15 20:49:02', '2020-04-15 20:49:02'),
(9, 17, 'Charlie', 'Edwards', '1998-10-06', '8 Evelyn Grove North', 'DN32 8LA', 'Grimsby', '07123456789', '2020-04-18 12:56:12', '2020-04-18 12:56:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`);

--
-- Indexes for table `supplier_orders`
--
ALTER TABLE `supplier_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_order_details`
--
ALTER TABLE `supplier_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `supplier_orders`
--
ALTER TABLE `supplier_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_order_details`
--
ALTER TABLE `supplier_order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
