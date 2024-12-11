-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for laravelecommerce
CREATE DATABASE IF NOT EXISTS `laravelecommerce` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `laravelecommerce`;

-- Dumping structure for table laravelecommerce.brands
CREATE TABLE IF NOT EXISTS `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brands_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.brands: ~6 rows (approximately)
INSERT INTO `brands` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
	(9, 'Sony', 'sony', '1733468317.png', '2024-12-05 23:58:37', '2024-12-05 23:58:37'),
	(10, 'Samsung', 'samsung', '1733468336.png', '2024-12-05 23:58:56', '2024-12-05 23:58:56'),
	(11, 'Microsoft', 'microsoft', '1733470262.png', '2024-12-06 00:31:02', '2024-12-06 00:31:02'),
	(13, 'Apple', 'apple', '1733473891.png', '2024-12-06 01:31:31', '2024-12-06 01:31:31'),
	(14, 'HTC', 'htc', '1733473915.png', '2024-12-06 01:31:55', '2024-12-06 01:31:55'),
	(15, 'Nokia', 'nokia', '1733473939.png', '2024-12-06 01:32:19', '2024-12-06 01:32:19');

-- Dumping structure for table laravelecommerce.cache
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.cache: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.cache_locks
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.cache_locks: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.carts
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `base_total_price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.carts: ~0 rows (approximately)
INSERT INTO `carts` (`id`, `user_id`, `base_total_price`, `total_price`, `created_at`, `updated_at`, `deleted`) VALUES
	(2, 1, 91000000.00, 88270000.00, '2024-12-10 00:35:10', '2024-12-10 03:44:36', 1),
	(3, 1, 13000000.00, 12610000.00, '2024-12-10 20:28:13', '2024-12-10 20:28:13', 0),
	(4, 2, 9999999.00, 9999999.00, '2024-12-11 01:13:58', '2024-12-11 01:14:12', 1);

-- Dumping structure for table laravelecommerce.cart_items
CREATE TABLE IF NOT EXISTS `cart_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.cart_items: ~0 rows (approximately)
INSERT INTO `cart_items` (`id`, `cart_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
	(1, 2, 1, 7, '2024-12-10 00:35:10', '2024-12-10 03:44:36'),
	(2, 3, 1, 1, '2024-12-10 20:28:13', '2024-12-10 20:28:13'),
	(3, 4, 2, 1, '2024-12-11 01:13:58', '2024-12-11 01:13:58');

-- Dumping structure for table laravelecommerce.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.categories: ~4 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Phone', 'phone', '2024-12-06 02:02:04', '2024-12-06 02:02:04'),
	(2, 'Laptop', 'laptop', '2024-12-06 02:02:16', '2024-12-06 02:02:16'),
	(3, 'Tablet', 'tablet', '2024-12-06 02:02:45', '2024-12-06 02:02:45'),
	(4, 'TV', 'tv', '2024-12-06 02:02:52', '2024-12-06 02:02:52');

-- Dumping structure for table laravelecommerce.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.jobs
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.jobs: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.job_batches
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.job_batches: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.migrations: ~9 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(4, '0001_01_01_000000_create_users_table', 1),
	(5, '0001_01_01_000001_create_cache_table', 1),
	(6, '0001_01_01_000002_create_jobs_table', 1),
	(7, '2024_12_06_033856_create_brands_table', 2),
	(8, '2024_12_06_083623_create_categories_table', 3),
	(9, '2024_12_06_090417_create_products_table', 4),
	(10, '2024_12_10_035636_create_carts_table', 5),
	(11, '2024_12_10_035647_create_cart_items_table', 5),
	(12, '2024_12_10_041144_update_users_table', 5),
	(13, '2024_12_10_111741_create_orders_table', 6),
	(14, '2024_12_10_111748_create_order_items_table', 6),
	(15, '2024_12_10_122619_update_cart_table', 7);

-- Dumping structure for table laravelecommerce.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `snapToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.orders: ~0 rows (approximately)
INSERT INTO `orders` (`id`, `user_id`, `total_price`, `order_status`, `shipping_address`, `payment_status`, `created_at`, `updated_at`, `snapToken`) VALUES
	(10, 1, 12610000.00, 'delivered', 'Jln. Wahid Hasyim No. 43 Yogyakarta', 'paid', '2024-12-10 20:48:53', '2024-12-11 00:29:55', '44325132-1f9b-47ad-8c5c-6d83ee517a69'),
	(11, 1, 12610000.00, 'pending', 'Jln. Wahid Hasyim No. 43 Yogyakarta', 'pending', '2024-12-10 20:52:20', '2024-12-10 20:52:21', 'a1d26a41-4977-4236-a9b2-12feb51820e9'),
	(12, 2, 9999999.00, 'shipped', 'Jl. Ambarawa Yogyakarta', 'paid', '2024-12-11 01:14:11', '2024-12-11 01:15:07', 'fc507228-40a9-4e5a-a223-7406142bfdc9');

-- Dumping structure for table laravelecommerce.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.order_items: ~0 rows (approximately)
INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `qty`, `price`, `total_price`, `created_at`, `updated_at`) VALUES
	(4, 10, 1, 1, 12610000.00, 12610000.00, '2024-12-10 20:48:53', '2024-12-10 20:48:53'),
	(5, 11, 1, 1, 12610000.00, 12610000.00, '2024-12-10 20:52:20', '2024-12-10 20:52:20'),
	(6, 12, 2, 1, 9999999.00, 9999999.00, '2024-12-11 01:14:11', '2024-12-11 01:14:11');

-- Dumping structure for table laravelecommerce.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table laravelecommerce.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_1` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `sale_price` decimal(15,2) NOT NULL,
  `stocks` int unsigned NOT NULL DEFAULT '0',
  `product_status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint unsigned DEFAULT NULL,
  `brand_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  KEY `products_brand_id_foreign` (`brand_id`),
  CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.products: ~1 rows (approximately)
INSERT INTO `products` (`id`, `name`, `slug`, `description_1`, `description_2`, `price`, `sale`, `sale_price`, `stocks`, `product_status`, `image`, `images`, `category_id`, `brand_id`, `created_at`, `updated_at`) VALUES
	(1, 'Iphone 15', 'iphone-15', 'iPhone 15 menghadirkan Dynamic Island, kamera Utama 48 MP, dan USB-C — semuanya dalam desain aluminium dan kaca berwarna yang tangguh.', 'DYNAMIC ISLAND HADIR DI IPHONE 15 — Dynamic Island menampilkan gelembung pemberitahuan dan Aktivitas Langsung — jadi Anda tidak melewatkannya saat melakukan hal lain. Anda dapat melihat siapa yang menelepon, memeriksa status penerbangan Anda, dan banyak lagi.\r\n    DESAIN INOVATIF — iPhone 15 dilengkapi dengan desain aluminium dan kaca berwarna yang tangguh. Tahan cipratan, air, dan debu. Bagian depan Ceramic Shield lebih tangguh dibandingkan kaca ponsel pintar mana pun. Dan layar Super Retina XDR 6,1″ hingga 2x lebih terang di bawah sinar matahari dibandingkan iPhone 14.\r\n    KAMERA UTAMA 48 MP DENGAN TELEFOTO 2X — Kamera Utama 48 MP mengambil gambar dengan resolusi super tinggi. Jadi kini semakin mudah untuk mengambil foto yang memukau dengan detail menakjubkan. Telefoto berkualitas optik 2x memungkinkan Anda mengambil gambar close-up yang sempurna.\r\n    GENERASI BARU MODE POTRET — Ambil gambar dengan lebih banyak detail dan warna. Ketuk untuk mengalihkan fokus antara subjek — bahkan setelah Anda mengambil gambar.\r\n    CHIP A16 BIONIC SUPER BERTENAGA — Chip super cepat mendukung beragam fitur canggih seperti fotografi komputasional, transisi Dynamic Island yang lancar, dan Isolasi Suara untuk panggilan telepon. Dan A16 Bionic sangat efisien dalam membantu menghadirkan kekuatan baterai sepanjang hari yang menakjubkan.\r\n    KONEKTIVITAS USB-C — Konektor USB-C memungkinkan Anda mengisi daya Mac atau iPad dengan kabel yang sama dengan yang Anda gunakan untuk mengisi daya iPhone 15. Anda bahkan dapat menggunakan iPhone 15 untuk mengisi daya Apple Watch atau AirPods.\r\n    FITUR KESELAMATAN PENTING — Dengan Deteksi Tabrakan, iPhone bisa mendeteksi kecelakaan mobil yang parah dan melakukan panggilan bantuan saat Anda tak bisa.\r\n    DIDESAIN UNTUK MEMBUAT PERUBAHAN — iPhone dilengkapi dengan perlindungan privasi yang membantu Anda tetap memegang kendali atas data. Terbuat dari lebih banyak material daur ulang untuk meminimalkan dampak lingkungan. Dan memiliki fitur bawaan yang menjadikan iPhone lebih mudah diakses oleh semua orang.\r\n    DILENGKAPI DENGAN GARANSI APPLECARE — Setiap iPhone dilengkapi dengan garansi terbatas selama satu tahun dan dukungan teknis gratis hingga 90 hari.', 13000000.00, 3, 12610000.00, 15, 'active', '1733729037.webp', '1733728848-1.webp,1733728848-2.webp,1733728848-3.webp', 1, 13, '2024-12-07 00:28:41', '2024-12-11 01:13:22'),
	(2, 'Iphone 13', 'iphone-13', 'Iphone 13 Green', 'Iphone 13 Green wIth better quality', 9999999.00, 0, 9999999.00, 9, 'active', '1733904793.webp', '1733904793-1.webp,1733904793-2.webp,1733904793-3.webp', 1, 13, '2024-12-11 01:13:13', '2024-12-11 01:15:07');

-- Dumping structure for table laravelecommerce.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.sessions: ~1 rows (approximately)
INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('J0qI68o3G1JdqS96xEPj8SXJVMKptC7TUfYTZVSN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:133.0) Gecko/20100101 Firefox/133.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiWFJEZkpCSVVYNEhyT0w4ZEw1NFBKZ1ltdDdFdnFLWng0NTBqZ05yMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxOToiY2FydF90b3RhbF9xdWFudGl0eSI7czoxOiIxIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czo0MDoiaHR0cDovL2xhcmF2ZWxlY29tbWVyY2UudGVzdC9hZG1pbi9vcmRlciI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzMzOTA0OTMyO319', 1733904946);

-- Dumping structure for table laravelecommerce.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USER',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table laravelecommerce.users: ~1 rows (approximately)
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `phone`, `address`, `post_code`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Dwi Tsalis', 'dwitsalis@gmail.com', NULL, '$2y$12$SHhDP9C4hOnWnnpbNCvL8errfLmJKqGq0MF3/ZjB4gpJizrAPNUyi', 'ADMIN', '089123456789', 'Jln. Wahid Hasyim No. 43 Yogyakarta', '555555', 'yOTtE1T9f3rOchLIoYv0jPb2Iz1Vki111hTkNiqmSdugtmcpTMuFHWl0ii0S', '2024-12-05 18:31:28', '2024-12-05 18:31:28'),
	(2, 'Alex', 'alex@mail.com', NULL, '$2y$12$2uMRn/vUrDOkRJsFphFbFOT5V8wxILSjYKgMLRHOSTwFyoGzTRHJq', 'CUSTOMER', '088987654321', 'Jl. Ambarawa Yogyakarta', '55555', NULL, '2024-12-11 00:48:33', '2024-12-11 00:48:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
