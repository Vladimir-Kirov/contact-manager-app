-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24 яну 2018 в 17:31
-- Версия на сървъра: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact-manager-db`
--

-- --------------------------------------------------------

--
-- Структура на таблица `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `contacts`
--

INSERT INTO `contacts` (`id`, `group_id`, `name`, `company`, `email`, `phone`, `address`, `created_at`, `updated_at`, `photo`) VALUES
(1, 2, 'Milen Shangov', 'Shangov Ltd.', 'milen_sh@abv.bg', '+359 896 445 999', 'city Sofia, bul Bulgaria 144', '2018-01-24 14:02:03', '2018-01-24 14:02:03', 'milen_shangov.jpg'),
(2, 2, 'Petko - Peter Collins', 'Collins Ltd.', 'peter@gmail.com', '+359 896 758 324', 'city Plovdiv, bul. Marica 132', '2018-01-24 14:07:31', '2018-01-24 14:07:48', 'Petko.jpg'),
(3, 3, 'Peter Tomov', 'LS Ltd.', 'peter_tomov@gmail.com', '+359 896 664 728', 'city Plovdiv, bul. Vasil Aprilov 186', '2018-01-24 14:12:12', '2018-01-24 14:12:12', 'peter_tomov.jpg'),
(4, 1, 'Dimiter Kirov', 'Kirov Ltd.', 'd_kirov@gmail.com', '+359 896 677 232', 'city Plovdiv, bul. Nikola Vapcarov 32', '2018-01-24 14:14:20', '2018-01-24 14:14:20', 'dimiter.JPG'),
(5, 2, 'Zlatka Pandeva', 'Pandeva Ltd.', 'zlatka_pandeva@gmail.com', '+359 896 554 832', 'city Plovdiv, bul Vasil Aprilov 222', '2018-01-24 14:16:21', '2018-01-24 14:16:21', 'zlatka_pandeva.jpg'),
(6, 4, 'Denica Luzanova', 'Lss Ltd.', 'd-luzanova@abv.bg', '+359 897 654 722', 'city Sofia, bul Bulgaria 134', '2018-01-24 14:23:49', '2018-01-24 14:23:49', 'denica_luzanova.jpg'),
(7, 1, 'Vladimir Kirov', 'Kirov Ltd.', 'vladikirov@gmail.com', '+359 896 482 336', 'city Plovdiv, street Skopie 44', '2018-01-24 14:27:09', '2018-01-24 14:27:09', 'vladimir_kirov.jpg');

-- --------------------------------------------------------

--
-- Структура на таблица `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Family', '2018-01-24 14:00:19', '2018-01-24 14:00:19'),
(2, 'Friends', '2018-01-24 14:00:19', '2018-01-24 14:00:19'),
(3, 'Clients', '2018-01-24 14:00:19', '2018-01-24 14:00:19'),
(4, 'Colleagues', '2018-01-24 14:23:40', '2018-01-24 14:23:40');

-- --------------------------------------------------------

--
-- Структура на таблица `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(26, '2014_10_12_000000_create_users_table', 1),
(27, '2014_10_12_100000_create_password_resets_table', 1),
(28, '2017_09_10_150554_create_groups_table', 1),
(29, '2017_09_11_133527_create_contacts_table', 1),
(30, '2017_10_20_183529_add_photo_to_contacts_table', 1);

-- --------------------------------------------------------

--
-- Структура на таблица `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'vladikirov@gmail.com', 'Vladimir', '$2y$10$4OvVgx232GXL0bganx1RQufXNbPaWBToElJbLRsAzNwNMS942BGju', NULL, '2018-01-24 14:00:54', '2018-01-24 14:00:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_group_id_foreign` (`group_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
