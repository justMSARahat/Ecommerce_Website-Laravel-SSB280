-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 03:10 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssb280`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '0=Normal,1=Featured',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Active,2=Inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `image`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Honda', 'honda', NULL, NULL, 0, 1, '2021-03-02 09:42:28', '2021-03-02 09:42:28'),
(2, 'Daraz', 'daraz', NULL, NULL, 0, 1, '2021-03-02 09:42:35', '2021-03-02 09:42:35'),
(3, 'SSL Commerz', 'ssl-commerz', NULL, NULL, 0, 1, '2021-03-02 09:42:44', '2021-03-02 09:42:44'),
(4, 'Tencent', 'tencent', NULL, NULL, 0, 1, '2021-03-02 09:42:55', '2021-03-02 09:42:55');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` int(11) NOT NULL DEFAULT 0 COMMENT '0 Parent - any value for child',
  `icon_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '0=Normal,1=Featured',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=Pending, 1=active , 2=inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `image`, `is_parent`, `icon_tag`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Men\'s Shopping', 'mens-shopping', NULL, NULL, 0, NULL, 1, 1, '2021-03-02 09:37:44', '2021-03-02 09:37:44'),
(2, 'Women\'s Fashion', 'womens-fashion', NULL, NULL, 0, NULL, 1, 1, '2021-03-02 09:37:58', '2021-03-02 09:37:58'),
(3, 'Essentials', 'essentials', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:38:18', '2021-03-02 09:38:18'),
(4, 'Watches & Clock', 'watches-clock', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:38:28', '2021-03-02 09:38:28'),
(5, 'Cosmetics', 'cosmetics', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:38:42', '2021-03-02 09:38:42'),
(6, 'Jewelry', 'jewelry', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:38:55', '2021-03-02 09:38:55'),
(7, 'Gadgets', 'gadgets', NULL, NULL, 0, NULL, 1, 1, '2021-03-02 09:39:09', '2021-03-02 09:39:09'),
(8, 'Household', 'household', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:39:28', '2021-03-02 09:39:28'),
(9, 'Computer Accessories', 'computer-accessories', NULL, NULL, 0, NULL, 1, 1, '2021-03-02 09:39:41', '2021-03-02 09:39:41'),
(10, 'Home Decor', 'home-decor', NULL, NULL, 0, NULL, 0, 1, '2021-03-02 09:39:58', '2021-03-02 09:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM = Admin , USR for USER',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `email_verified_at`, `password`, `phone`, `image`, `address`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MSA Rahat', NULL, 'justshamsulalom1@gmail.com', NULL, '$2y$10$SjSfu2DsjTlQoZDlXMylgeVbxFbqx.fQNo/J3UAJfXfCvt/u8l6nG', '01756689907', NULL, NULL, 'USR', NULL, '2021-03-07 00:37:53', '2021-03-07 00:37:53');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `divisions_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `divisions_id`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', 1, '2021-03-04 04:53:07', '2021-03-04 04:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Sylhet', 1, '2021-03-04 04:52:57', '2021-03-04 04:52:57');

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
-- Table structure for table `home_sliders`
--

CREATE TABLE `home_sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_type` int(11) NOT NULL DEFAULT 0 COMMENT '1->Main Slider,2->Product Slider,3->Product Banner,4->all product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_sliders`
--

INSERT INTO `home_sliders` (`id`, `name`, `image`, `slide_type`, `created_at`, `updated_at`) VALUES
(4, 'Main', '553269553-2nd_row_Image_slider.jpg', 2, '2021-03-05 04:51:30', '2021-03-05 04:51:30'),
(5, 'Suh', '791259885-2nd_row_Image_slider.jpg', 2, '2021-03-05 04:51:39', '2021-03-05 04:51:39');

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
(4, '2020_12_12_105541_create_brands_table', 1),
(5, '2020_12_16_183618_create_categories_table', 1),
(6, '2020_12_23_093151_create_products_table', 1),
(7, '2021_01_05_083319_create_divisions_table', 1),
(8, '2021_01_05_083514_create_districts_table', 1),
(10, '2021_01_22_175140_create_carts_table', 1),
(11, '2021_01_23_053842_create_orders_table', 1),
(12, '2021_01_23_060940_create_payments_table', 1),
(13, '2021_01_31_071503_create_cache_table', 1),
(15, '2021_03_02_122651_create_customers_table', 1),
(16, '2021_01_07_094140_create_sliders_table', 2),
(18, '2021_03_05_091713_create_home_sliders_table', 3),
(22, '2021_03_02_075509_create_order_items_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `pricewithcoupon` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice`, `user_id`, `ip_address`, `name`, `last_name`, `email`, `phone`, `address`, `division_id`, `district_id`, `zip_code`, `message`, `amount`, `pricewithcoupon`, `payment_id`, `transaction_id`, `status`, `currency`, `created_at`, `updated_at`) VALUES
(10, '3984318', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b7d770eaf', 'Pending', 'BDT', NULL, NULL),
(11, '6733266', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b806e677f', 'Pending', 'BDT', NULL, NULL),
(12, '5789387', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b8506a3ea', 'Pending', 'BDT', NULL, NULL),
(13, '4986264', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b868438ef', 'Pending', 'BDT', NULL, NULL),
(14, '6542791', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b897f15a9', 'Pending', 'BDT', NULL, NULL),
(15, '4348041', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044b8b99e014', 'Pending', 'BDT', NULL, NULL),
(16, '7654193', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1100, 1100, NULL, '6044ba9bcf401', 'Pending', 'BDT', NULL, NULL),
(17, '2701941', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1500, 1500, NULL, '6044bfaa21289', 'Pending', 'BDT', NULL, NULL),
(18, '143080', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1500, 1500, NULL, '6044bfd14bb04', 'Pending', 'BDT', NULL, NULL),
(19, '4995088', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 1500, 1500, NULL, '6044c01d98aac', 'Pending', 'BDT', NULL, NULL),
(20, '1873715', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 400, 400, NULL, '6044c0f5265e9', 'Pending', 'BDT', NULL, NULL),
(21, '8692597', NULL, '127.0.0.1', 'MSA', 'Rahat', 'justshamsulalom@gmail.com', '+8801756689907', 'Subhanighat,Sylhet', 1, 1, '3100', '', 3200, 3200, NULL, '6044c1c35af3e', 'Pending', 'BDT', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `user_id`, `ip`, `invoice`, `order_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(3, NULL, '127.0.0.1', '1873715', 20, 3, 5, '2021-03-07 06:03:01', '2021-03-07 06:03:01'),
(4, NULL, '127.0.0.1', '8692597', 21, 3, 40, '2021-03-07 06:06:27', '2021-03-07 06:06:27');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `reguler_price` int(11) NOT NULL DEFAULT 0,
  `offer_price` int(11) DEFAULT NULL,
  `sku_code` int(11) DEFAULT NULL,
  `product_type` int(11) NOT NULL DEFAULT 0 COMMENT '0=>NEW,0>OLD',
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `is_featured` int(11) NOT NULL DEFAULT 0 COMMENT '0=>Normal,1=>featured',
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=>Pending,1=>active,2=>Inactive,3=>Disabled',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `short_desc`, `desc`, `tags`, `quantity`, `reguler_price`, `offer_price`, `sku_code`, `product_type`, `cat_id`, `brand_id`, `is_featured`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'AIR পার্সোনাল এয়ার কুলার QUICK & EASY WAY TO COOL AIR CONDITIONER', 'air-parsonal-eyar-kular-quick-easy-way-to-cool-air-conditioner', 'Air Personal Air Cooler Quick & Easy Way to Cool Air Conditioner- 5091 Enjoy Cool, Clean Air…Anywhere Introducing Arctic Air: The powerful, compact personal air cooler that pulls warm air from the room through its evaporative', 'প্রোডাক্টের বিবরণ : AIR পার্সোনাল এয়ার কুলার QUICK & EASY WAY TO COOL AIR CONDITIONER\r\nডিল কোড: ১২৬৯৩৩৬Description: Air Personal Air Cooler Quick & Easy Way to Cool Air Conditioner- 5091 Enjoy Cool, Clean Air…Anywhere Introducing Arctic Air: The powerful, compact personal air cooler that pulls warm air from the room through its evaporative water filter to fill any space with cool, clean comfortable air Arctic Air cools, humidifies, and purifies for better air Simply fill with water, plug it into any standard wall outlet or USB port and enjoy It runs up to 8 hours per fill Arctic Air is an evaporative air cooler that allows you to create your own personal climate The whisper-quiet fan and soothing night light make it perfect to use throughout the night for a comfortable sleep The built-in LED mood light can be set to any of its 7 color option, set to color-cycle mode or turned off with the touch of a button Running other air conditioners all day long can cost a lot of money and take up so much space Some of them even have to vent out a window, making it very inconvenient. Arctic A\r\nAIR পার্সোনাল এয়ার কুলার QUICK & EASY WAY TO COOL AIR CONDITIONER কিনুন বাংলাদেশের সেরা দামে ।', 'Fan', 20, 1700, 1500, 2540, 0, 7, 2, 1, 1, '1026025985_Shop_Product_Primary_Image.jpg', '2021-03-02 09:47:10', '2021-03-02 09:47:10'),
(2, 'ল্যাপটপ স্ট্যান্ড অ্যালুমিনিয়াম ফর এডজাস্টেবল স্ট্যান্ড', 'lzaptp-stzand-ozaluminiyam-fr-edjastebl-stzand', 'ব্র্যান্ডের নাম: WIWUঅ্যাপ্লিকেশন: ল্যাপটপরঙের নাম: সিলভার, গ্রেবৈশিষ্ট্য: ম্যাকবুকের জন্য ভাঁজযোগ্য এবং পোর্টেবল স্ট্যান্ডদৈর্ঘ্য: 225 মিমি ল্যাপটপ স্ট্যান্ডপ্রস্থ: 230 মিমি ল্যাপটপ সমর্থনউপাদান: অ্যালুমিনিয়াম স্ট্যান্ড\r\nল্যাপটপ স্ট্যান্ড অ্যালুমিনিয়াম ফর এডজাস্টেবল স্ট্যান্ড কিনুন বাংলাদেশের সেরা দামে ।', 'ব্র্যান্ডের নাম: WIWUঅ্যাপ্লিকেশন: ল্যাপটপরঙের নাম: সিলভার, গ্রেবৈশিষ্ট্য: ম্যাকবুকের জন্য ভাঁজযোগ্য এবং পোর্টেবল স্ট্যান্ডদৈর্ঘ্য: 225 মিমি ল্যাপটপ স্ট্যান্ডপ্রস্থ: 230 মিমি ল্যাপটপ সমর্থনউপাদান: অ্যালুমিনিয়াম স্ট্যান্ড\r\nল্যাপটপ স্ট্যান্ড অ্যালুমিনিয়াম ফর এডজাস্টেবল স্ট্যান্ড কিনুন বাংলাদেশের সেরা দামে ।', 'laptop', 20, 1100, NULL, 154205, 0, 9, 4, 1, 1, '1732223719_Shop_Product_Primary_Image.jpg', '2021-03-02 09:48:52', '2021-03-02 09:48:52'),
(3, 'Coffee কফি এন্ড টি হিটার', 'coffee-kfi-end-ti-hitar', 'Instant Coffee and Tea HeaterWater Heater as wellBoiled in 30 Seconds.Used it as boiling spoon.Long Lasting and SafeEasily PortableHigh Quality Product\r\nকফি এন্ড টি হিটার কিনুন বাংলাদে', 'Instant Coffee and Tea HeaterWater Heater as wellBoiled in 30 Seconds.Used it as boiling spoon.Long Lasting and SafeEasily PortableHigh Quality Product\r\nকফি এন্ড টি হিটার কিনুন বাংলাদে', 'coffie', 20, 150, 80, 154205, 0, 8, 2, 1, 1, '1144200777_Shop_Product_Primary_Image.jpg', '2021-03-02 09:50:26', '2021-03-02 09:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slide_type` int(11) NOT NULL DEFAULT 0 COMMENT '1->Main Slider,2->Product Slider,3->Product Banner,4->all product',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `top_text`, `subtitle`, `button_text`, `button_text_url`, `image`, `slide_type`, `created_at`, `updated_at`) VALUES
(1, 'Hello', 'Hello', 'Hello', 'Hello', 'Hello', '211482936-Home_Main_Slider_Image.jpg', 1, '2021-03-05 03:46:10', '2021-03-05 03:46:10'),
(4, 'Mens Shoe', 'New Arrivals', '40% Discount', '40% Discount', '40% Discount', '1544245609-Home_Main_Slider_Image.jpg', 3, '2021-03-05 04:52:57', '2021-03-05 04:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'ADM = Admin , USR for USER',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `image`, `address`, `utype`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MSA Rahat', 'justshamsulalom@gmail.com', NULL, '$2y$10$zdMBL8muIHSfyFBG6w0kfuZe5kmEQaYcTcM/nCQ9IkZxxwsHVUKm6', NULL, NULL, NULL, 'USR', NULL, '2021-03-02 09:37:25', '2021-03-02 09:37:25');

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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD UNIQUE KEY `cache_key_unique` (`key`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_divisions_id_foreign` (`divisions_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `home_sliders`
--
ALTER TABLE `home_sliders`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_slug_unique` (`slug`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_sliders`
--
ALTER TABLE `home_sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_divisions_id_foreign` FOREIGN KEY (`divisions_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
