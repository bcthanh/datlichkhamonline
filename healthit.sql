-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 01, 2021 lúc 04:53 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `healthit`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `realizada` tinyint(1) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sns` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  `especialidade` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `sintomas` text COLLATE utf8mb4_unicode_ci,
  `diagnostico` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `appointments`
--

INSERT INTO `appointments` (`id`, `realizada`, `name`, `sns`, `data`, `especialidade`, `user_id`, `sintomas`, `diagnostico`, `created_at`, `updated_at`) VALUES
(1, 0, 'Nguyen Van A', '0908088888', '2021-08-01 16:30:00', '534545345', 1, NULL, NULL, '2021-07-31 21:51:19', '2021-07-31 21:51:19'),
(2, 0, 'Nguyen Thi B', '0345345345', '2021-08-02 12:00:00', 'Dau dong - chong mat - Sot cao', 23, NULL, NULL, '2021-07-31 22:00:09', '2021-07-31 22:00:09'),
(3, 0, 'Le Tran Thi D', '09888332499', '2021-08-09 12:00:00', 'Bẹnh xương khớp', 23, NULL, NULL, '2021-07-31 22:05:10', '2021-07-31 22:05:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
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
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proficiencies`
--

CREATE TABLE `proficiencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_avatar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `proficiencies`
--

INSERT INTO `proficiencies` (`id`, `name`, `pro_avatar`, `created_at`, `updated_at`) VALUES
(2, 'Tim mạch', '1627742346.png', '2021-06-10 21:25:31', '2021-07-31 08:39:06'),
(3, 'Da liễu', '1627779636.png', '2021-06-10 21:25:31', '2021-07-31 19:00:36'),
(4, 'Nội tiết', '1627742389.png', '2021-06-10 21:25:31', '2021-07-31 08:39:49'),
(5, 'Nhi', '1627779848.png', '2021-06-10 21:25:31', '2021-07-31 19:04:08'),
(6, 'Thần kinh', '1627742403.png', '2021-06-10 21:25:31', '2021-07-31 08:40:03'),
(7, 'Giải phẩu thẩm mỹ', '1627779581.jpg', '2021-06-10 21:25:31', '2021-07-31 18:59:41'),
(8, 'Tai mũi họng', '1627779609.png', '2021-06-10 21:25:31', '2021-07-31 19:00:09'),
(9, 'Hô hấp', '1627780166.png', '2021-06-10 21:25:31', '2021-07-31 19:09:26'),
(10, 'Cơ xương khớp', '1627742422.png', '2021-06-10 21:25:32', '2021-07-31 08:40:22'),
(11, 'Gan tụy mật', '1627779942.png', '2021-06-10 21:25:32', '2021-07-31 19:05:42'),
(12, 'Mắt', '1627779882.png', '2021-06-10 21:25:32', '2021-07-31 19:04:42'),
(14, 'Phụ khoa', '1627779916.png', '2021-06-10 21:25:32', '2021-07-31 19:05:16'),
(15, 'Răng hàm mặt', '1627742445.png', '2021-06-10 21:25:32', '2021-07-31 08:40:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proficiency_user`
--

CREATE TABLE `proficiency_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `proficiency_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `proficiency_user`
--

INSERT INTO `proficiency_user` (`id`, `proficiency_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 5, 1, NULL, NULL),
(2, 3, 1, NULL, NULL),
(11, 2, 23, NULL, NULL),
(12, 4, 23, NULL, NULL),
(13, 9, 23, NULL, NULL),
(14, 2, 1, NULL, NULL),
(20, 9, 29, NULL, NULL),
(21, 14, 29, NULL, NULL),
(23, 14, 30, NULL, NULL),
(24, 2, 31, NULL, NULL),
(25, 3, 31, NULL, NULL),
(26, 4, 31, NULL, NULL),
(27, 5, 31, NULL, NULL),
(28, 6, 31, NULL, NULL),
(29, 7, 31, NULL, NULL),
(30, 8, 31, NULL, NULL),
(31, 9, 31, NULL, NULL),
(32, 10, 31, NULL, NULL),
(33, 11, 31, NULL, NULL),
(34, 12, 31, NULL, NULL),
(36, 14, 31, NULL, NULL),
(37, 15, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `profiles`
--

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bio` text,
  `clinic_name` varchar(100) DEFAULT NULL,
  `clinic_address` varchar(200) DEFAULT NULL,
  `education` text,
  `experience` text,
  `awards` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bio`, `clinic_name`, `clinic_address`, `education`, `experience`, `awards`, `created_at`, `updated_at`) VALUES
(1, 1, '2222', '2222', '2222', '2222222', '2222', '222223333', NULL, '2021-07-18 01:32:31'),
(2, 23, 'Basc si BBBBBb', 'Phong kham BBBB', '123 Tran Hung Dao', 'Thac si', 'BV Da Khoa QNgai', 'Hehehee', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', NULL, NULL),
(2, 'Helpdesk', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_users`
--

CREATE TABLE `role_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_users`
--

INSERT INTO `role_users` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(11, 1, 1, NULL, NULL),
(12, 2, 12, NULL, NULL),
(22, 2, 22, NULL, NULL),
(23, 1, 23, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `scheduletimings`
--

CREATE TABLE `scheduletimings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `day_in_week` int(11) NOT NULL,
  `starting_time` varchar(20) NOT NULL,
  `ending_time` varchar(20) NOT NULL,
  `open_for_day` int(11) DEFAULT NULL,
  `minutes_per_patient` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `scheduletimings`
--

INSERT INTO `scheduletimings` (`id`, `user_id`, `day_in_week`, `starting_time`, `ending_time`, `open_for_day`, `minutes_per_patient`, `created_at`, `updated_at`) VALUES
(27, 1, 5, '11:00', '21:00', NULL, 10, '2021-07-21 15:35:56', '2021-07-21 15:35:56'),
(33, 1, 3, '08:00', '10:00', NULL, 15, '2021-07-21 16:36:20', '2021-07-21 16:36:20'),
(34, 1, 3, '12:00', '14:30', NULL, 15, '2021-07-21 16:36:20', '2021-07-21 16:36:20'),
(39, 1, 6, '10:30', '14:30', NULL, 60, '2021-07-22 08:52:38', '2021-07-22 08:52:38'),
(43, 1, 4, '10:00', '11:30', NULL, 10, '2021-07-22 08:56:37', '2021-07-22 08:56:37'),
(44, 1, 1, '10:30', '21:00', NULL, 30, '2021-07-22 08:56:58', '2021-07-22 08:56:58'),
(45, 23, 0, '08:00', '11:30', NULL, 30, '2021-07-27 05:07:36', '2021-07-27 05:07:36'),
(48, 23, 3, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:09', '2021-07-27 05:08:09'),
(49, 23, 4, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:13', '2021-07-27 05:08:13'),
(50, 23, 5, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:18', '2021-07-27 05:08:18'),
(51, 23, 6, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:36', '2021-07-27 05:08:36'),
(52, 23, 6, '17:00', '20:00', NULL, 30, '2021-07-27 05:08:36', '2021-07-27 05:08:36'),
(53, 23, 1, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:46', '2021-07-27 05:08:46'),
(54, 23, 1, '17:00', '20:00', NULL, 30, '2021-07-27 05:08:46', '2021-07-27 05:08:46'),
(55, 23, 2, '12:00', '13:30', NULL, 30, '2021-07-27 05:08:51', '2021-07-27 05:08:51'),
(56, 23, 2, '17:00', '20:00', NULL, 30, '2021-07-27 05:08:51', '2021-07-27 05:08:51'),
(57, 1, 2, '09:00', '12:00', NULL, 30, '2021-07-28 02:53:29', '2021-07-28 02:53:29'),
(58, 1, 0, '07:00', '20:30', NULL, 15, '2021-07-29 04:12:03', '2021-07-29 04:12:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seg_social` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_in` time DEFAULT NULL,
  `hora_out` time DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `slug`, `seg_social`, `password`, `hora_in`, `hora_out`, `remember_token`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Bác sĩ A', 'doctor@healthit.com', 'bac-si-a', '0912121222', '$2y$10$t8bjfgt2dpvLLhzKbDGM6eBnVgvKt51rDF.oV2W.ychJKYdAhYZOm', NULL, NULL, NULL, '2021-06-10 21:25:35', '2021-07-18 02:19:04', 0),
(12, 'Nhân Viên Trực 1', 'nhanvien1@healthit.com', NULL, '45042432', '$2y$10$azqejBRyFLjhMPl5d01FvuUa4yNeoxSST2xdk7fE7tC2nYHjXyxA6', NULL, NULL, NULL, '2021-06-10 21:25:35', '2021-06-10 21:25:35', 1),
(22, 'Admin', 'admin@healthit.com', NULL, '23550695', '$2y$10$tkKgaDAN3zpkyUXlvnN4nOexw1Hgt8ycSksJLDLn0Qn3AVR8nrY9u', NULL, NULL, NULL, '2021-06-10 21:25:37', '2021-06-10 21:25:37', 1),
(23, 'Bác sĩ B', 'bacsiB@gmail.com', 'bac-si-b', '111111222', '$2y$10$04s4aJfvZ5hgPuAvnj1V9uDNYZdhGPNpgnsg85gpEHXL/fHJvqud6', '07:00:00', '20:00:00', NULL, '2021-06-18 03:16:59', '2021-07-12 04:15:09', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Chỉ mục cho bảng `proficiencies`
--
ALTER TABLE `proficiencies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `proficiency_user`
--
ALTER TABLE `proficiency_user`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `scheduletimings`
--
ALTER TABLE `scheduletimings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `proficiencies`
--
ALTER TABLE `proficiencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `proficiency_user`
--
ALTER TABLE `proficiency_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT cho bảng `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `role_users`
--
ALTER TABLE `role_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT cho bảng `scheduletimings`
--
ALTER TABLE `scheduletimings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
