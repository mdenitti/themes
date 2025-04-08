-- -------------------------------------------------------------
-- TablePlus 6.3.2(586)
--
-- https://tableplus.com/
--
-- Database: themes
-- Generation Time: 2025-03-15 14:32:01.6070
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `category_event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int DEFAULT NULL,
  `event_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `cities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `continent` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `population` int DEFAULT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL,
  `known_for` text COLLATE utf8mb4_general_ci,
  `founded_year` int DEFAULT NULL,
  `is_capital` tinyint(1) DEFAULT '0',
  `annual_tourists` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `events` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `location_id` int DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `time` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `failed_jobs` (
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

CREATE TABLE `job_batches` (
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

CREATE TABLE `jobs` (
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

CREATE TABLE `locations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `capacity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sessions` (
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

CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'beach', '2025-03-14 21:58:10', '2025-03-14 21:58:10'),
(2, 'hike', '2025-03-14 21:58:10', '2025-03-14 21:58:10'),
(3, 'culture', '2025-03-14 21:58:10', '2025-03-14 21:58:10'),
(4, 'kids', '2025-03-14 21:58:10', '2025-03-14 21:58:10'),
(5, 'vip', '2025-03-14 21:58:10', '2025-03-14 21:58:10'),
(6, 'cruise', '2025-03-14 21:58:10', '2025-03-14 21:58:10');

INSERT INTO `category_event` (`id`, `category_id`, `event_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 2),
(5, 3, 2),
(6, 2, 2),
(7, 3, 3),
(8, 1, 3),
(9, 1, 4),
(10, 2, 4),
(11, 2, 5),
(12, 3, 5),
(13, 4, 6),
(14, 2, 6);

INSERT INTO `cities` (`id`, `name`, `country`, `continent`, `population`, `latitude`, `longitude`, `known_for`, `founded_year`, `is_capital`, `annual_tourists`, `created_at`, `updated_at`) VALUES
(1, 'Tokyo', 'Japan', 'Asia', 37400000, 35.6762000, 139.6503000, 'Technology, food, anime, fashion, and being the world\'s largest urban area', 1457, 1, 15, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(2, 'Paris', 'France', 'Europe', 11100000, 48.8566000, 2.3522000, 'Art, fashion, cuisine, the Eiffel Tower, and romantic atmosphere', 52, 1, 19, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(3, 'New York City', 'United States', 'North America', 18800000, 40.7128000, -74.0060000, 'Financial center, diverse culture, Broadway, skyline, and Central Park', 1624, 0, 14, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(4, 'Rio de Janeiro', 'Brazil', 'South America', 13500000, -22.9068000, -43.1729000, 'Carnival, beaches, Christ the Redeemer statue, and natural setting', 1565, 0, 5, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(5, 'Cairo', 'Egypt', 'Africa', 20900000, 30.0444000, 31.2357000, 'Ancient pyramids, Egyptian Museum, and Nile River', 969, 1, 6, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(6, 'Sydney', 'Australia', 'Oceania', 5300000, -33.8688000, 151.2093000, 'Sydney Opera House, Harbour Bridge, beaches, and quality of life', 1788, 0, 4, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(7, 'Istanbul', 'Turkey', 'Asia/Europe', 15500000, 41.0082000, 28.9784000, 'Straddling two continents, historic architecture, and bazaars', 660, 0, 13, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(8, 'Rome', 'Italy', 'Europe', 4300000, 41.9028000, 12.4964000, 'Ancient ruins, Vatican City, cuisine, and Renaissance art', -753, 1, 10, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(9, 'Kyoto', 'Japan', 'Asia', 1500000, 35.0116000, 135.7681000, 'Traditional culture, temples, gardens, and geisha districts', 794, 0, 8, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(10, 'Barcelona', 'Spain', 'Europe', 5600000, 41.3851000, 2.1734000, 'Gaudí architecture, beaches, La Rambla, and Catalan culture', 218, 0, 9, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(11, 'Cape Town', 'South Africa', 'Africa', 4500000, -33.9249000, 18.4241000, 'Table Mountain, beaches, winelands, and cultural diversity', 1652, 1, 3, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(12, 'Venice', 'Italy', 'Europe', 260000, 45.4408000, 12.3155000, 'Canals, gondolas, architecture, and no cars', 421, 0, 20, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(13, 'Singapore', 'Singapore', 'Asia', 5700000, 1.3521000, 103.8198000, 'Cleanliness, modernity, multiculturalism, and food', 1819, 1, 18, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(14, 'Marrakech', 'Morocco', 'Africa', 1000000, 31.6295000, -7.9811000, 'Medina, souks, gardens, and vibrant culture', 1062, 0, 3, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(15, 'San Francisco', 'United States', 'North America', 4700000, 37.7749000, -122.4194000, 'Golden Gate Bridge, tech industry, hills, and liberal culture', 1776, 0, 4, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(16, 'Cusco', 'Peru', 'South America', 430000, -13.5320000, -71.9675000, 'Incan ruins, gateway to Machu Picchu, and colonial architecture', 1100, 0, 2, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(17, 'Prague', 'Czech Republic', 'Europe', 2200000, 50.0755000, 14.4378000, 'Medieval architecture, Charles Bridge, and beer culture', 885, 1, 8, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(18, 'Dubai', 'United Arab Emirates', 'Asia', 3300000, 25.2048000, 55.2708000, 'Futuristic architecture, luxury shopping, and desert landscape', 1833, 0, 16, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(19, 'Quebec City', 'Canada', 'North America', 800000, 46.8139000, -71.2080000, 'French heritage, walled old town, and European feel', 1608, 0, 5, '2025-03-11 10:12:12', '2025-03-11 10:12:12'),
(20, 'Amsterdam', 'Netherlands', 'Europe', 2500000, 52.3676000, 4.9041000, 'Canals, cycling culture, museums, and progressive policies', 1275, 1, 9, '2025-03-11 10:12:12', '2025-03-11 10:12:12');

INSERT INTO `events` (`id`, `name`, `description`, `location_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'Tropical Paradise Getaway', 'A week-long escape to the Maldives with luxury villas and snorkeling.', 1, '2025-06-15 00:00:00', '10:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(2, 'Alaskan Wilderness Adventure', 'Explore the untouched beauty of Alaska with guided hikes and glacier visits.', 2, '2025-07-10 00:00:00', '09:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(3, 'European Grand Tour', 'Visit Paris, Rome, and Barcelona in a 10-day cultural journey.', 3, '2025-08-05 00:00:00', '08:30', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(4, 'African Safari Expedition', 'Experience the thrill of a safari in the Serengeti with expert guides.', 4, '2025-09-12 00:00:00', '07:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(5, 'Japan Cherry Blossom Tour', 'Enjoy the stunning sakura season in Tokyo and Kyoto.', 1, '2025-04-01 00:00:00', '10:30', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(6, 'Caribbean Cruise Escape', 'Sail through the Caribbean islands with all-inclusive luxury.', 2, '2025-11-20 00:00:00', '17:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(7, 'Himalayan Trekking Experience', 'Conquer the Everest Base Camp with a 14-day guided trek.', 3, '2025-10-05 00:00:00', '06:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(8, 'Australia Outback Exploration', 'Discover the rugged beauty of the Australian Outback.', 4, '2025-05-25 00:00:00', '11:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(9, 'Santorini Romantic Retreat', 'A perfect getaway for couples with sunset views and fine dining.', 1, '2025-07-01 00:00:00', '18:30', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(10, 'Amazon Rainforest Expedition', 'Explore the heart of the Amazon with expert biologists.', 2, '2025-03-25 00:00:00', '07:45', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(11, 'New York City Lights', 'A 5-day city tour of the Big Apple with Broadway and Times Square.', 3, '2025-12-10 00:00:00', '09:30', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(12, 'Dubai Luxury Experience', 'Enjoy world-class shopping, dining, and desert adventures.', 4, '2025-06-20 00:00:00', '15:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(13, 'Iceland Northern Lights Tour', 'Chase the Aurora Borealis and explore volcanic landscapes.', 1, '2025-02-15 00:00:00', '22:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(14, 'Machu Picchu Heritage Trail', 'Hike the Inca Trail to the breathtaking ruins of Machu Picchu.', 2, '2025-09-05 00:00:00', '05:30', '2025-03-14 21:34:06', '2025-03-14 21:34:06'),
(15, 'Canadian Rockies Adventure', 'A road trip through Banff and Jasper National Parks.', 3, '2025-08-18 00:00:00', '08:00', '2025-03-14 21:34:06', '2025-03-14 21:34:06');

INSERT INTO `locations` (`id`, `name`, `address`, `capacity`, `created_at`, `updated_at`) VALUES
(1, 'Conference Room A', 'Thor Park', 50, '2025-03-10 15:20:09', '2025-03-10 15:20:09'),
(2, 'Lecture Hall', 'C-mine', 200, '2025-03-10 15:20:09', '2025-03-10 15:20:09'),
(3, 'Meeting Room B', 'Corda Campus', 20, '2025-03-10 15:20:09', '2025-03-10 15:20:09'),
(4, 'Study Room', '321 Campus Dr', 25, '2025-03-10 14:39:03', '2025-03-10 14:46:50');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5H0bdOiSG03b5BxylnqQ52cCtqUMYZ8MshzzlwJX', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRUhnZGx6bldyaUU5SzhQZlk0elBCRmZWd1JCVTUzenZDeFlvTE9XVyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741776691),
('cXnLrGhIP0BL8MP5O7mtlAlxvLiMQDYeLIia4fFo', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRmI4RWRyVkYyQ3dBZDI2WjRZSTQ0YnFYNEFCZ3VBaEdkS1BPdnMzMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741895710),
('sXmdqsfAJi2oGiZZwv7JGcxdDnbki1fXjsvLUlRv', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk5ZQTdSMVBpZXdqWEE4RElmaVNabkNpUWRHTTNRN09HeWt6NU00RiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZWdpc3RlciI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741776396),
('urEUZDB1s2aLP0UBqavy3g316LoIJfGrzYeuSoro', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaklzRGlQbTc1WWVhZUx1cVpXVENRM1o4dGtpb0VkOEJ2UklXWmR4ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1741894424),
('VLUfHUmeTJ75z7g60QJjhuBGWP9yDJmTrNFr3zSb', NULL, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Mobile Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiY2NEbjdTYmlwaXdSdnlRY3FmTUN3dTBKMlNJWU9rYjVJd0RVbUo2VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaXRpZXMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1741986569);

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Massimo De Nittis', 'mas@mas.com', NULL, '$2y$12$PEpBz7plN//WuNkJRwOHu.xVWu4jgWYmQ5Gjezu4agkcg1I0f8Q0e', NULL, '2025-03-11 18:48:47', '2025-03-11 18:48:47'),
(2, 'Massimo De Nittis', 'mas@mas.com2', NULL, '$2y$12$JpGg3OAhkczso8vlhg.ntebKhpkAWNMN0osrLSZ8WLKKeuTR2E7k.', NULL, '2025-03-11 18:49:18', '2025-03-11 18:49:18'),
(3, 'Massimo', 'massimo2@test.com', NULL, '$2y$12$w2MeSd2DUCUDYTB4s4fMS.l2wQ60MxpGnwsDOZTkhggOb13kQJgwm', NULL, '2025-03-12 10:51:31', '2025-03-12 10:51:31');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;