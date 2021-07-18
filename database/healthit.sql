-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 11:14 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthit`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `realizada` tinyint(1) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sns` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `especialidade` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sintomas` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diagnostico` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `realizada`, `name`, `sns`, `data`, `especialidade`, `user_id`, `sintomas`, `diagnostico`, `created_at`, `updated_at`) VALUES
(101, 1, 'XXXX', '222222', '2021-06-18 10:17:00', 0, 23, 'Đau thắt ngực', 'Nhồi máu cơ tim\r\nUống thuốc .....', '2021-06-18 03:18:25', '2021-06-18 03:52:02'),
(102, 0, 'Vo vo vo', '998888', '2021-06-25 18:57:00', 3, 24, NULL, NULL, '2021-06-23 20:00:46', '2021-06-24 01:51:08'),
(103, 0, 'te', '1111111111', '2021-06-25 16:34:00', 5, 24, NULL, NULL, '2021-06-24 01:35:12', '2021-06-24 01:35:12'),
(104, 0, 't56', '56546', '2021-06-26 17:03:00', 5, 24, NULL, NULL, '2021-06-25 02:03:51', '2021-06-25 02:03:51');

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
(3, '2017_05_11_200607_create_role_users_table', 1),
(4, '2017_05_11_200729_create_roles_table', 1),
(5, '2017_05_12_115258_create_appointments_table', 1),
(6, '2017_05_14_205016_create_proficiencies_table', 1),
(7, '2017_05_17_190450_create_proficiency_user_table', 1);

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
-- Table structure for table `proficiencies`
--

CREATE TABLE `proficiencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proficiencies`
--

INSERT INTO `proficiencies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Tim mạch', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(3, 'Da liễu', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(4, 'Nội tiết', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(5, 'Nhi', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(6, 'Thần kinh', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(7, 'Giải phẩu thẩm mỹ', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(8, 'Tai mũi họng', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(9, 'Hô hấp', '2021-06-10 21:25:31', '2021-06-10 21:25:31'),
(10, 'Cơ xương khớp', '2021-06-10 21:25:32', '2021-06-10 21:25:32'),
(11, 'Gan tụy mật', '2021-06-10 21:25:32', '2021-06-10 21:25:32'),
(12, 'Mắt', '2021-06-10 21:25:32', '2021-06-10 21:25:32'),
(13, 'Nội tổng quát', '2021-06-10 21:25:32', '2021-06-10 21:25:32'),
(14, 'Phụ khoa', '2021-06-10 21:25:32', '2021-06-10 21:25:32'),
(15, 'Răng hàm mặt', '2021-06-10 21:25:32', '2021-06-10 21:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `proficiency_user`
--

CREATE TABLE `proficiency_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `proficiency_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proficiency_user`
--

INSERT INTO `proficiency_user` (`id`, `proficiency_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 3, 1, NULL, NULL),
(11, 2, 23, NULL, NULL),
(12, 4, 23, NULL, NULL),
(13, 9, 23, NULL, NULL),
(14, 2, 1, NULL, NULL),
(15, 2, 24, NULL, NULL),
(16, 3, 24, NULL, NULL),
(17, 4, 24, NULL, NULL),
(18, 5, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', NULL, NULL),
(2, 'Helpdesk', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, NULL, NULL),
(12, 2, 12, NULL, NULL),
(22, 2, 22, NULL, NULL),
(23, 1, 23, NULL, NULL),
(24, 1, 24, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seg_social` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_in` time DEFAULT NULL,
  `hora_out` time DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `seg_social`, `password`, `hora_in`, `hora_out`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bác sĩ A', 'doctor@healthit.com', 58989208, '$2y$10$t8bjfgt2dpvLLhzKbDGM6eBnVgvKt51rDF.oV2W.ychJKYdAhYZOm', NULL, NULL, NULL, '2021-06-10 21:25:35', '2021-06-10 21:25:35'),
(12, 'Nhân Viên Trực 1', 'nhanvien1@healthit.com', 45042432, '$2y$10$azqejBRyFLjhMPl5d01FvuUa4yNeoxSST2xdk7fE7tC2nYHjXyxA6', NULL, NULL, NULL, '2021-06-10 21:25:35', '2021-06-10 21:25:35'),
(22, 'Admin', 'admin@healthit.com', 23550695, '$2y$10$tkKgaDAN3zpkyUXlvnN4nOexw1Hgt8ycSksJLDLn0Qn3AVR8nrY9u', NULL, NULL, NULL, '2021-06-10 21:25:37', '2021-06-10 21:25:37'),
(23, 'Bác sĩ B', 'congthanhbkit03@gmail.com', 111111222, '$2y$10$04s4aJfvZ5hgPuAvnj1V9uDNYZdhGPNpgnsg85gpEHXL/fHJvqud6', '07:00:00', '20:00:00', NULL, '2021-06-18 03:16:59', '2021-06-18 03:16:59'),
(24, 'Võ Hoàng Điệp', 'vohoangdiep@gmail.com', 99999, '$2y$10$zb.kY4NHB3TbiCFdw2yPFuYY2hea20x/jtpmruy1Kxc8OJDfOzILi', '08:22:00', '22:29:00', NULL, '2021-06-22 08:39:42', '2021-06-22 08:39:42'),
(25, 'Khách hàng tự book', 'noone@noo.com', 11111111, '', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
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
-- Indexes for table `proficiencies`
--
ALTER TABLE `proficiencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proficiencies_name_unique` (`name`);

--
-- Indexes for table `proficiency_user`
--
ALTER TABLE `proficiency_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_seg_social_unique` (`seg_social`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `proficiencies`
--
ALTER TABLE `proficiencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `proficiency_user`
--
ALTER TABLE `proficiency_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
