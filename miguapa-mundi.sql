-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:33065
-- Generation Time: Sep 19, 2023 at 01:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miguapa-mundi`
--

-- --------------------------------------------------------

--
-- Table structure for table `alliances`
--

CREATE TABLE `alliances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alliances`
--

INSERT INTO `alliances` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'MercoSur', 'img/images/qRKqbiS4Ww7pgDG1hHXzM5gQPYY2kxHlgP4AUHhO.png', '2023-09-19 03:49:45', '2023-09-19 03:49:45'),
(2, 'BRICS', 'img/images/BvT9ELxen1mGFVMltI5uKC1FCk5XaDyTcP6hOaZj.png', '2023-09-19 04:06:45', '2023-09-19 04:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `in_offer` tinyint(1) NOT NULL,
  `minimum_offer_value` int(11) NOT NULL,
  `attractive_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `default_offer_value` int(11) NOT NULL,
  `user_owner_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `nick_name`, `color`, `flag`, `in_offer`, `minimum_offer_value`, `attractive_value`, `created_at`, `updated_at`, `default_offer_value`, `user_owner_id`) VALUES
(1, 'Colombia', 'polombia', '#000000', 'img/flags/XEdBglF1sT3YieHG1ChdJcCQqXjQQD60lItoewZj.jpg', 1, 80, 100, '2023-09-14 22:22:46', '2023-09-14 22:22:46', 100, 1),
(2, 'Francia', 'Segundo', '#932525', 'img/flags/TwbLvucwNh8pZCKPNzTGtLbwYccBLOYEPaYZCFep.jpg', 0, 300, 100, '2023-09-14 22:23:37', '2023-09-14 22:23:37', 120, 1),
(3, 'Venezuela', 'El país del petroleo', '#cf0707', 'img/flags/OF3QypNz9ZkFUhAx3570rN6uepALsyukl5aDTxpU.png', 0, 20, 100, '2023-09-14 22:24:13', '2023-09-14 22:24:13', 300, 1),
(4, 'Russia', 'Rasputin', '#833434', 'img/flags/EFwlWmWt5y4EJ9PI2bOm5TuDbT7nKgXfO4OVxLBj.png', 1, 1000, 100, '2023-09-19 03:41:50', '2023-09-19 03:41:50', 7954780, 2),
(5, 'Brazil', 'Ronaldu Nazariu', '#57db6d', 'img/flags/UOeQgXtL2SHlJTVYVqfLhZE0pr63kJgFB4hgJvhl.png', 1, 100, 50, '2023-09-19 03:44:29', '2023-09-19 03:44:29', 100, 3),
(6, 'Peru', 'Palomo cojo', '#ff0000', 'img/flags/jPh4GhHX8OrnPWiLM8ne8YkeA3A8rLq5uJZ23wCw.png', 1, 100, 4, '2023-09-19 03:46:25', '2023-09-19 03:46:25', 37, 2);

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
-- Table structure for table `financial_effects`
--

CREATE TABLE `financial_effects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `effect` int(11) NOT NULL,
  `news_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `financial_effects`
--

INSERT INTO `financial_effects` (`id`, `effect`, `news_id`, `created_at`, `updated_at`, `country_id`) VALUES
(1, 20, 1, NULL, NULL, 1),
(2, -30000, 1, NULL, NULL, 2),
(3, 25, 1, NULL, NULL, 3),
(4, 20, 2, NULL, NULL, 2),
(5, 5, 3, NULL, NULL, 1),
(6, -12, 3, NULL, NULL, 2),
(7, -13, 3, NULL, NULL, 3),
(8, -20, 6, '2023-09-18 23:25:41', NULL, 5),
(9, -45, 6, '2023-09-18 23:26:30', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `founder` tinyint(1) NOT NULL,
  `moderator` tinyint(1) NOT NULL,
  `is_accepted` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `alliance_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `founder`, `moderator`, `is_accepted`, `created_at`, `updated_at`, `country_id`, `alliance_id`) VALUES
(1, 1, 1, 1, '2023-09-19 03:49:45', '2023-09-19 03:49:45', 1, 1),
(2, 0, 0, 1, '2023-09-19 03:49:55', '2023-09-19 03:58:55', 2, 1),
(3, 0, 0, NULL, '2023-09-19 04:00:28', '2023-09-19 04:00:28', 3, 1),
(4, 1, 1, 1, '2023-09-19 04:06:45', '2023-09-19 04:06:45', 5, 2),
(5, 0, 0, NULL, '2023-09-19 04:08:15', '2023-09-19 04:08:15', 4, 2);

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_09_02_193310_create_countries_table', 1),
(7, '2023_09_02_203931_create_members_table', 1),
(8, '2023_09_02_204755_create_news_table', 1),
(9, '2023_09_02_212650_create_alliances_table', 1),
(10, '2023_09_02_221645_add_columns_to_members_table', 1),
(11, '2023_09_05_215717_create_financial_effects_table', 1),
(12, '2023_09_06_160510_create_offers_table', 1),
(13, '2023_09_06_163233_add_columns_to_countries_table', 1),
(14, '2023_09_06_164540_add_column_to_financial_effects_table', 1),
(15, '2023_09_10_191420_add_columns_to_users_table', 1),
(16, '2023_09_12_020430_change_is_accepted_in_members_table', 1),
(17, '2023_09_12_025518_add_columns_to_users_table', 1),
(18, '2023_09_14_173148_rename_column_effect_to_financial_effects_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'gian me mira', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus officiis beatae amet quas dolores quia deleniti non? Placeat nulla quasi voluptatum, tempore eius quibusdam magni repellendus alias tenetur dignissimos mollitia.\r\n\r\nLorem ipsum dolor sit, ', '2023-09-14 22:19:56', '2023-09-14 22:19:56'),
(2, 'J ALVAREZ Ultimo concierto en EAFIT', 'J ALVAREZ cae de balcon despues de clase de estadistica', '2023-09-14 22:20:31', '2023-09-14 22:20:31'),
(3, 'Histrograma', 'yvgbhn iunkwf iwn iowd', '2023-09-14 22:20:49', '2023-09-14 22:20:49'),
(4, 'Nadie sabe nada', 'Vive la vida :D', '2023-09-14 22:21:08', '2023-09-19 03:48:02'),
(5, 'El efecto del niño', 'iree inw efin woeinf o', '2023-09-14 22:21:18', '2023-09-19 03:47:36'),
(6, 'Empieza la 4ta guerra mundial', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque ipsum provident, unde accusamus assumenda minus doloribus illum ullam mollitia voluptatum illo, aspernatur officia itaque beatae aliquid vel ratione earum nobis!', '2023-09-19 04:11:14', '2023-09-19 04:11:14');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` text NOT NULL,
  `price` int(11) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `user_offeror_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `status`, `price`, `country_id`, `user_offeror_id`, `created_at`, `updated_at`) VALUES
(2, 'SENT', 10000, 5, 2, '2023-09-19 03:52:34', '2023-09-19 03:52:34'),
(3, 'SENT', 50, 3, 2, '2023-09-19 03:53:04', '2023-09-19 03:53:04'),
(4, 'SENT', 3000, 1, 2, '2023-09-19 03:53:24', '2023-09-19 03:53:24'),
(5, 'SENT', 200, 6, 1, '2023-09-19 03:54:30', '2023-09-19 03:54:30'),
(6, 'SENT', 1001, 4, 3, '2023-09-19 04:04:48', '2023-09-19 04:04:48'),
(7, 'SENT', 1002, 4, 3, '2023-09-19 04:05:33', '2023-09-19 04:05:33');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `budget` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `nationality`, `budget`, `role`) VALUES
(1, 'Miguel Angel Calvache Giraldo', 'calvache116@gmail.com', NULL, '$2y$10$ExEQYf2AnS6v2yXZx3bzjuB9c6psqELowxlXTkThhNg8tRaUEnjha', NULL, '2023-09-13 19:34:19', '2023-09-13 19:34:19', 'miguelcg02', 'colombian', 10000000, 1),
(2, 'Juan Felipe', 'juanfe@gmail.com', NULL, '$2y$10$uCND6snxmQ3AONrKOd0zoekmQYzlav8DE33qZu3P00Ekiej8/CqEy', NULL, '2023-09-18 17:53:00', '2023-09-18 17:53:00', 'juanfe123', 'Argentinian', 100000000, 0),
(3, 'Tomas', 'tomas@gmail.com', NULL, '$2y$10$mI0XAYJNaCNM1EeToqFzc.1BrXA6aON5lGWXVxv8UhpqDftU7pnXO', NULL, '2023-09-18 18:38:42', '2023-09-18 18:38:42', 'tomas123', 'Anguillan', 100000, 0),
(4, 'super admin', 'admin@miguapa.com', NULL, '$2y$10$a7YO36Bc.cix7zuX0qe0gu3H3FJp1Sc4s9dcuMhd0QdxrcmCo6p5e', NULL, '2023-09-19 04:14:59', '2023-09-19 04:14:59', 'admin', 'Colombian', 100000000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alliances`
--
ALTER TABLE `alliances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `countries_user_owner_id_foreign` (`user_owner_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `financial_effects`
--
ALTER TABLE `financial_effects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `financial_effects_news_id_foreign` (`news_id`),
  ADD KEY `financial_effects_country_id_foreign` (`country_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `members_country_id_foreign` (`country_id`),
  ADD KEY `members_alliance_id_foreign` (`alliance_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_country_id_foreign` (`country_id`),
  ADD KEY `offers_user_offeror_id_foreign` (`user_offeror_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT for table `alliances`
--
ALTER TABLE `alliances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `financial_effects`
--
ALTER TABLE `financial_effects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `countries`
--
ALTER TABLE `countries`
  ADD CONSTRAINT `countries_user_owner_id_foreign` FOREIGN KEY (`user_owner_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `financial_effects`
--
ALTER TABLE `financial_effects`
  ADD CONSTRAINT `financial_effects_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `financial_effects_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`);

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_alliance_id_foreign` FOREIGN KEY (`alliance_id`) REFERENCES `alliances` (`id`),
  ADD CONSTRAINT `members_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `offers_user_offeror_id_foreign` FOREIGN KEY (`user_offeror_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
