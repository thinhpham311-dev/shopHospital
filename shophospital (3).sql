-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th2 21, 2020 lúc 01:58 AM
-- Phiên bản máy phục vụ: 5.7.28
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shophospital`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `account_id_user_index` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `id_user`, `username`, `password`, `right`, `created_at`, `updated_at`) VALUES
(1, 1, 'thinhpham', '$2y$10$HqZe03hRpTu68ddD2g4AKeZNTVmNEdGCyXNvS2khM856JDhMscEPC', 1, '2020-02-19 17:00:00', '2020-02-20 12:51:55'),
(31, 39, 'batong', '$2y$10$g1P5pqThJtNZAK.cIiIYMeECCJzTDwf8KCEtMzhCNCQQHr9Cbuxm.', 2, '2020-02-20 04:12:06', '2020-02-20 13:09:09'),
(32, 40, 'gltruong234', '$2y$10$lDFykmNf0BTrBu9COBqRi.oq.gpo5IMbfcbMt/Y2sJriwXzn9TgV2', 0, '2020-02-20 04:14:02', '2020-02-20 04:14:02'),
(34, 42, 'vykhoa111', '$2y$10$bwmQDyqHZzADX6xmV.7f0e.VzyerLrYcrsjAkH/xAe0NFEzS.CHMi', 0, '2020-02-20 10:20:58', '2020-02-20 10:20:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer_comment`
--

DROP TABLE IF EXISTS `answer_comment`;
CREATE TABLE IF NOT EXISTS `answer_comment` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_comment` bigint(20) UNSIGNED NOT NULL,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answer_comment_id_comment_index` (`id_comment`),
  KEY `answer_comment_id_account_index` (`id_account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

DROP TABLE IF EXISTS `bill`;
CREATE TABLE IF NOT EXISTS `bill` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `date_order` date NOT NULL,
  `total` double NOT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bill_id_customer_index` (`id_customer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

DROP TABLE IF EXISTS `bill_detail`;
CREATE TABLE IF NOT EXISTS `bill_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bill` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bill_detail_id_bill_index` (`id_bill`),
  KEY `bill_detail_id_product_index` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color_product`
--

DROP TABLE IF EXISTS `color_product`;
CREATE TABLE IF NOT EXISTS `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color_product`
--

INSERT INTO `color_product` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'màu đỏ', 'do-600x600.jpg', '2020-02-16 17:00:00', '2020-02-20 07:12:50'),
(5, 'màu trắng', 'pexels-376723.jpg', '2020-02-18 01:53:37', '2020-02-20 07:16:01'),
(8, 'Màu vàng đồng', '8be28386162fef060f627267ab5881e9.jpg', '2020-02-20 03:50:31', '2020-02-20 07:18:14'),
(9, 'màu trắng', 'vang-600x600.jpg', '2020-02-20 03:50:58', '2020-02-20 07:18:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comment_id_account_index` (`id_account`),
  KEY `comment_id_product_index` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`),
  UNIQUE KEY `id_user_3` (`id_user`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `id_user`, `type`, `created_at`, `updated_at`) VALUES
(7, 41, 0, '2020-02-20 06:49:37', '2020-02-20 06:49:37'),
(8, 42, 0, '2020-02-20 10:20:58', '2020-02-20 10:20:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_product`
--

DROP TABLE IF EXISTS `image_product`;
CREATE TABLE IF NOT EXISTS `image_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `image_product_id_product_index` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_product`
--

INSERT INTO `image_product` (`id`, `id_product`, `image`, `created_at`, `updated_at`) VALUES
(1, 64, 'va1.png', '2020-02-19 17:00:00', '2020-02-19 17:00:00'),
(2, 64, '7mw5_download.jpg', '2020-02-20 15:18:39', '2020-02-20 15:18:39'),
(3, 64, 'KDrX_blue-eye-logo-01-.jpg', '2020-02-20 15:20:52', '2020-02-20 15:20:52'),
(5, 66, 't1Hg_download.jpg', '2020-02-21 01:25:44', '2020-02-21 01:25:44'),
(6, 66, 'cRu2_blue-eye-logo-01-.jpg', '2020-02-21 01:26:03', '2020-02-21 01:26:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_account` bigint(20) UNSIGNED NOT NULL,
  `id_taxonomy` bigint(20) UNSIGNED NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title_slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci,
  `post_content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_views` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_id_account_foreign` (`id_account`),
  KEY `posts_id_taxonomy_foreign` (`id_taxonomy`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `id_provide` bigint(20) NOT NULL,
  `unit_price` double NOT NULL,
  `id_color` bigint(20) UNSIGNED NOT NULL,
  `promotion_price` double NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inventory_number` bigint(20) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `describe` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `products_id_type_index` (`id_type`),
  KEY `id_color` (`id_color`),
  KEY `id_provide` (`id_provide`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `id_provide`, `unit_price`, `id_color`, `promotion_price`, `image`, `inventory_number`, `status`, `describe`, `created_at`, `updated_at`) VALUES
(59, 'Máy đo huyết áp cơ Spirit có ống nghe CK-111', 48, 1, 0, 1, 660000, '21546411770.nv.png', 3, 0, '<p>awda</p>', '2020-02-20 03:39:01', '2020-02-20 07:04:37'),
(60, 'Máy đo huyết áp điện tử bắp tay MediKare-DK79+', 48, 1, 780000, 1, 649000, 'dk391531207308.nv.jpg', 3, 0, '<p>ahbibfiawk</p>', '2020-02-20 03:40:18', '2020-02-20 03:40:18'),
(61, 'Máy đo huyết áp cổ tay MediKare-DK39 Plus + Máy Đo Đường Huyết Sapphire Plus', 48, 1, 1555000, 5, 799000, 'combo-dk39plus11541126771.nv.png', 3, 0, '<p>beifba</p>', '2020-02-20 03:41:46', '2020-02-20 03:41:46'),
(62, 'Máy đo huyết áp cơ Boso BS 90 - Mặt đồng hồ 60mm', 48, 1, 1380000, 5, 0, 'bs-901551067619.nv.png', 3, 0, '<p>audbaw</p>', '2020-02-20 03:43:44', '2020-02-20 03:43:44'),
(63, 'Máy Đo Đường Huyết Sapphire Plus Tặng Máy Đo Huyết Áp Cổ Tay MediKare-DK39 Plus', 42, 1, 1556000, 5, 799000, 'combo-dk39plus21541126918.nv.png', 3, 1, '<p>dvjjh</p>', '2020-02-20 03:53:01', '2020-02-20 03:53:01'),
(64, 'Máy xông khí dung Owgels WH-701', 43, 1, 850000, 5, 699000, 'who-7011499049498.nv.jpg', 6, 1, '<p>biabkawn</p>', '2020-02-20 03:54:17', '2020-02-20 03:54:17'),
(65, 'Vớ y khoa điều trị suy tĩnh mạch Medicale Soft - Art. M1170A', 44, 1, 830000, 9, 699000, '2070a1555398221.nv.png', 3, 1, '<p>ibifkaw</p>', '2020-02-20 03:56:00', '2020-02-20 03:56:00'),
(66, 'Đai lưng cột sống Dr.Kare K-BB-684', 45, 1, 630000, 8, 580000, '1-min-1-1556332251.nv.png', 3, 1, '<p>ubkbkw</p>', '2020-02-20 03:57:57', '2020-02-20 03:57:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `provider`
--

DROP TABLE IF EXISTS `provider`;
CREATE TABLE IF NOT EXISTS `provider` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `provider`
--

INSERT INTO `provider` (`id`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'MinhTam', '0125647212', 'Tp HCM', '2020-02-20 17:00:00', '2020-02-20 17:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taxonomy`
--

DROP TABLE IF EXISTS `taxonomy`;
CREATE TABLE IF NOT EXISTS `taxonomy` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_product`
--

DROP TABLE IF EXISTS `type_product`;
CREATE TABLE IF NOT EXISTS `type_product` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_product`
--

INSERT INTO `type_product` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(42, 'Máy đo đường huyết', '<p>naishid</p>', 'may-do-mo-trong-mau1495243148.nv.jpg', '2020-02-20 03:28:33', '2020-02-20 06:53:25'),
(43, 'Máy xông mũi họng', '<p>awdhha</p>', 'may-hut-dich-cam-tay-armoline-al-01-1-2-1573031981.nv.png', '2020-02-20 03:29:14', '2020-02-20 04:22:49'),
(44, 'Vớ y khoa', '<p>fafaw</p>', '21501532944670.nv.png', '2020-02-20 03:29:31', '2020-02-20 03:29:31'),
(45, 'Đai lưng cột sống', '<p>awfawf</p>', '1-min-1-1556332251.nv.png', '2020-02-20 03:29:57', '2020-02-20 03:29:57'),
(46, 'Máy trợ thính', '<p>asfawkd</p>', 'may-tro-thinh-min1564710193.nv.png', '2020-02-20 03:30:35', '2020-02-20 03:30:35'),
(47, 'Cân sức khỏe điện tử', '<p>adiwan</p>', 'boso31001568254062.nv.png', '2020-02-20 03:32:00', '2020-02-20 03:32:00'),
(48, 'Máy đo huyết áp 1', '<p>ahidha</p>', 'TSP.png', '2020-02-20 03:32:51', '2020-02-20 04:23:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `phone`, `image`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Trí Thịnh', 'Nữ', '0702895474', 'PEEN_blue-eye-logo-01-.jpg', 'Long Xuyên, An Giang', 'phamthinh30522@gmail.com', '2020-02-17 17:00:00', '2020-02-20 12:51:55'),
(2, 'Nguyễn Bá Tòng', 'nam', '0214574125', 'AV2.jpg', 'Long xuyên, An Giang', 'nbTong311@gmail.com', '2020-02-17 17:00:00', '2020-02-17 17:00:00'),
(3, 'Lâm Trường Giang', 'nam', '0214574156', 'AV3.jpg', 'Long xuyên, An Giang', 'ltGiang311@gmail.com', '2020-02-17 17:00:00', '2020-02-17 17:00:00'),
(33, 'Thiết bị xét nghiệm', 'Nam', '2093849302', 'sp2.jpg', 'acaef', 'ptthinh_17pm@agu.edu.vn', '2020-02-18 13:13:12', '2020-02-18 13:13:12'),
(34, 'Thiết bị xét nghiệm', 'Nam', '2093849302', 'sp1.jpg', 'aefae', 'phamthinh30522@gmail.com', '2020-02-18 13:41:08', '2020-02-18 13:41:08'),
(35, 'Thiết bị xét nghiệm', 'Nam', '2093849302', 'sp1.jpg', 'aefae', 'phamthinh30522@gmail.com', '2020-02-18 13:41:45', '2020-02-18 13:41:45'),
(36, 'm', 'Nam', '2093849302', 'sp1.jpg', 'afwafa', 'phamthinh30522@gmail.com', '2020-02-19 01:26:29', '2020-02-19 01:26:29'),
(37, 'màu đỏ 2', 'Nam', '2093849302', 'sp1.jpg', 'afafw', 'trinhpham1221@gmail.com', '2020-02-19 02:57:41', '2020-02-19 03:38:35'),
(39, 'Nguyễn Bá Tòng', 'Nam', '2093849302', 'XHWa_download.jpg', 'abkwa', 'batong123@gmail.com', '2020-02-20 04:12:06', '2020-02-20 13:09:09'),
(40, 'Lâm trường giang', 'Nam', '2093849302', 'AV.jpg', 'iaknknwa', 'ltgiang456@gmail.com', '2020-02-20 04:14:02', '2020-02-20 04:14:02'),
(41, 'm', 'Nam', '2093849302', 'nzDC_download.jpg', 'baibkaw', 'm123@gmail.com', '2020-02-20 06:49:37', '2020-02-20 06:49:37'),
(42, 'Vớ y khoa', 'Nam', '2093849302', 'Jblx_blue-eye-logo-01-.jpg', 'afwaw', 'vykhoa456@gmail.com', '2020-02-20 10:20:58', '2020-02-20 10:20:58'),
(43, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-20 12:33:03', '2020-02-20 12:33:03'),
(44, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-20 12:39:27', '2020-02-20 12:39:27'),
(45, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-20 12:41:21', '2020-02-20 12:41:21'),
(46, NULL, NULL, NULL, NULL, NULL, NULL, '2020-02-20 12:43:21', '2020-02-20 12:43:21');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `account_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `answer_comment`
--
ALTER TABLE `answer_comment`
  ADD CONSTRAINT `answer_comment_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `answer_comment_id_comment_foreign` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id`);

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `bill_detail_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bill_detail_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `comment_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `image_product`
--
ALTER TABLE `image_product`
  ADD CONSTRAINT `image_product_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_id_account_foreign` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `posts_id_taxonomy_foreign` FOREIGN KEY (`id_taxonomy`) REFERENCES `taxonomy` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_color`) REFERENCES `color_product` (`id`),
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
