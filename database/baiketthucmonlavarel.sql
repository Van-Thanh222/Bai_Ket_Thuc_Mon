-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 16, 2025 lúc 03:46 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `baiketthucmonlavarel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `unit_price` decimal(20,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `reply` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `reply`, `status`, `created_at`, `updated_at`) VALUES
(3, 'thanh2', 'levanthanhdz001@gmail.com', 'Tôi muốn mua xe trả góp bên bạn có dịch vụ nào hỏ trợ ko?', 'Có bên em hổ trợ tận tình và có nhiều dịch vụ lắm ạ', 1, '2025-04-15 07:37:52', '2025-04-15 07:43:17'),
(4, 'thanh', 'thanhle308205@gmail.com', 'thàasfsf', 'àgasfasfasfasf', 1, '2025-04-15 18:38:08', '2025-04-15 18:38:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `sao` tinyint(3) UNSIGNED NOT NULL COMMENT 'Đánh giá sao từ 1 đến 5',
  `danhgia` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`id`, `id_product`, `id_user`, `sao`, `danhgia`, `created_at`, `updated_at`) VALUES
(1, 5, 8, 4, 'khá ok', '2025-04-15 08:40:48', '2025-04-15 08:40:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_price` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `name`, `price`, `description`, `unit_price`, `created_at`, `updated_at`) VALUES
(2, '500k', 500000.00, 'Giảm 50k', 'VND', '2025-04-15 08:06:50', '2025-04-15 08:06:50'),
(3, 'Giảm 1Tr', 1000000.00, 'Giảm 1tr cho đơn hàng bất kỳ', 'VND', '2025-04-15 17:51:07', '2025-04-15 17:53:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `favourites`
--

CREATE TABLE `favourites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `favourites`
--

INSERT INTO `favourites` (`id`, `id_user`, `id_product`, `created_at`, `updated_at`) VALUES
(19, 8, 3, '2025-04-15 06:50:19', '2025-04-15 06:50:19'),
(20, 12, 3, '2025-04-15 18:27:29', '2025-04-15 18:27:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
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
-- Cấu trúc bảng cho bảng `job_batches`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_09_142000_create_product_types_table', 1),
(5, '2025_04_09_142001_create_trademarks_table', 1),
(6, '2025_04_09_142007_create_products_table', 1),
(7, '2025_04_09_143744_create_slides_table', 1),
(8, '2025_04_09_144447_create_discount_codes_table', 1),
(9, '2025_04_09_145311_create_favourites_table', 1),
(10, '2025_04_09_150104_create_orders_table', 1),
(11, '2025_04_09_150617_create_contacts_table', 1),
(12, '2025_04_09_151813_create_carts_table', 1),
(13, '2025_04_15_153128_create_danhgia_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_phone` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Original_price` decimal(20,2) NOT NULL,
  `Promotional_price` decimal(20,2) NOT NULL,
  `Total_Price` decimal(20,2) NOT NULL,
  `discount_code_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_price` decimal(20,2) DEFAULT 0.00,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `note` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_code`, `user_id`, `customer_name`, `customer_email`, `customer_phone`, `customer_address`, `product_id`, `product_name`, `quantity`, `Original_price`, `Promotional_price`, `Total_Price`, `discount_code_id`, `discount_price`, `status`, `note`, `created_at`, `updated_at`) VALUES
(17, 'ORD67FE6935E3294', 8, 'thanh', 'thanhle308205@gmail.com', '0987654321', 'Điện Bàn - Quảng Nam', 3, 'Toyota Camry 2.5Q', 1, 1500000000.00, 1450000000.00, 1450000000.00, NULL, 0.00, 3, 'xe đẹp', '2025-04-15 07:12:05', '2025-04-15 07:58:44'),
(18, 'ORD67FE6BF13F3FF', 8, 'thanh', 'thanhle308205@gmail.com', '0987654321', 'Điện Bàn - Quảng Nam', 3, 'Toyota Camry 2.5Q', 1, 1500000000.00, 1450000000.00, 1450000000.00, NULL, 0.00, 1, 'xe', '2025-04-15 07:23:45', '2025-04-15 07:23:45'),
(19, 'ORD67FE763E05341', 8, 'thanh', 'thanhle308205@gmail.com', '0987654321', 'Điện Bàn - Quảng Nam', 4, 'Honda CR-V G', 1, 1150000000.00, 1080000000.00, 1079500000.00, 2, 500000.00, 1, 'xe quá quá đẹp', '2025-04-15 08:07:42', '2025-04-15 08:07:42'),
(20, 'ORD67FF0881EE594', 12, 'thanh', 'thanhle308205@gmail.com', '0987654321', 'Điện Bàn - Quảng Nam', 3, 'Toyota Camry 2.5Q', 1, 1500000000.00, 1450000000.00, 1449500000.00, 2, 500000.00, 1, 'xe quá quá đẹp', '2025-04-15 18:31:45', '2025-04-15 18:31:45'),
(21, 'ORD67FF092F2ECEA', 12, 'thanh', 'thanhle308205@gmail.com', '0987654321', 'Điện Bàn - Quảng Nam', 3, 'Toyota Camry 2.5Q', 1, 1500000000.00, 1450000000.00, 1449500000.00, 2, 500000.00, 1, 'xe quá quá đẹp', '2025-04-15 18:34:39', '2025-04-15 18:34:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `id_trademark` bigint(20) UNSIGNED NOT NULL,
  `unit_price` decimal(20,2) NOT NULL,
  `price` decimal(20,2) NOT NULL,
  `promotion_price` decimal(20,2) DEFAULT NULL,
  `new` tinyint(1) NOT NULL DEFAULT 0,
  `top` tinyint(1) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `mileage` int(11) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `engine` varchar(255) DEFAULT NULL,
  `seats` int(11) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `id_type`, `id_trademark`, `unit_price`, `price`, `promotion_price`, `new`, `top`, `description`, `year`, `mileage`, `fuel_type`, `transmission`, `engine`, `seats`, `color`, `origin`, `condition`, `warranty`, `vin`, `created_at`, `updated_at`) VALUES
(3, 'Toyota Camry 2.5Q', 'image/1744704618_camry-25q-2023-801676347002.jpg', 2, 11, 1300000000.00, 1500000000.00, 1450000000.00, 1, 0, 'Sedan hạng D sang trọng, vận hành êm ái.', '2024', 0, 'Xăng', 'Tự động', '2.5L I4', 5, 'Đen', 'Nhật Bản', 'Mới 100%', '5 năm hoặc 150.000 km', 'JTNB11HK7K3012345', '2025-04-15 01:10:18', '2025-04-15 01:10:29'),
(4, 'Honda CR-V G', 'image/1744704866_images (2).jpg', 2, 4, 1000000000.00, 1150000000.00, 1080000000.00, 0, 1, 'SUV 7 chỗ, tiết kiệm nhiên liệu, bền bỉ.', '2024', 0, 'Xăng', 'CVT', '1.5L Turbo', 7, 'Trắng', 'Nhật Bản', 'Mới', '3 năm hoặc 100.000 km', 'MRHRW1850NP012345', '2025-04-15 01:14:26', '2025-04-15 01:14:41'),
(5, 'Hyundai Tucson Diesel', 'image/1744705522_hyundai-tucson-feature-03.jpg', 3, 5, 880000000.00, 1030000000.00, 980000000.00, 1, 1, 'SUV hạng C với động cơ diesel mạnh mẽ.', '2024', 0, 'Dầu', 'Tự động 8 cấp', '2.0L Diesel', 5, 'Đen', 'Hàn Quốc', 'Mới', '5 năm', 'KNAER81AML1123456', '2025-04-15 01:25:22', '2025-04-15 01:25:22'),
(6, 'Kia Seltos 1.4 Turbo', 'image/1744705699_tải xuống (1).jpg', 2, 6, 720000000.00, 750000000.00, 0.00, 1, 1, 'SUV cỡ nhỏ thiết kế trẻ trung, phù hợp đô thị.', '2024', 0, 'Xăng', 'Ly hợp kép 7 cấp', '1.4L Turbo', 5, 'xanh nước biển', 'Hàn Quốc', 'Mới', '5 năm', 'KNAER81AML1123456', '2025-04-15 01:28:19', '2025-04-15 01:29:11'),
(7, 'Ford Ranger Wildtrak 2.0', 'image/1744706353_ford-ranger-wildtrak-4x4-9081668659260.jpg', 2, 7, 1050000000.00, 1200000000.00, 1150000000.00, 0, 0, 'Bán tải mạnh mẽ, đa dụng, dẫn động 4x4.', '2024', 0, 'Dầu', 'Tự động 10 cấp', '2.0L Bi-Turbo', 5, 'Đen', 'Mỹ', 'Mới', '5 năm', 'MNAUMFF80PW123456', '2025-04-15 01:39:13', '2025-04-15 01:42:48'),
(8, 'VinFast Lux A2.0 Plus', 'image/1744706555_vinfast-lux-a-2_0-mau-white.png', 1, 8, 900000000.00, 1200000000.00, 1000000000.00, 1, 1, 'Sedan thương hiệu Việt, thiết kế sang trọng.', '2024', 0, 'Điện', 'Tự động 8 cấp', '2.0L Turbo', 5, 'Bạc', 'Việt Nam', 'Mới', '5 năm', 'RLGVFA2P3P0123456', '2025-04-15 01:42:35', '2025-04-15 01:42:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Xe Điện', 'Xe chạy bằng điện, bảo vệ môi trường', 'image/1744703388_10_8.d7f7c73a.jpg', '2025-04-15 00:49:48', '2025-04-15 00:49:48'),
(2, 'Xe Xăng', 'Xe dùng xăng để vận hành động cơ khí đốt', 'image/1744703464_ảnh 3.jpg', '2025-04-15 00:51:04', '2025-04-15 00:51:04'),
(3, 'Xe dầu', 'Động cơ dầu diesel', 'image/1744703657_top-10-chiec-xe-chay-dau-tot-nhat.jpg', '2025-04-15 00:54:17', '2025-04-15 00:54:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
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
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('QPHrUiTvqFYVhopFMPzM2voG1RDpN9YbOgGzWFkY', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36 Edg/135.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiQ0J2NG9NN0xKd29veU42QkFFSVVTWU1xTk5PMVp6U2Ewb2VOZDJvaiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO30=', 1744767680);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `image`, `name`, `created_at`, `updated_at`) VALUES
(1, '1744504583.jpg', 's', '2025-04-12 17:36:23', '2025-04-12 17:36:23'),
(2, '1744504599.jpg', 's', '2025-04-12 17:36:39', '2025-04-12 17:36:39'),
(3, '1744504612.jpg', 's', '2025-04-12 17:36:52', '2025-04-12 17:36:52'),
(4, '1744504623.jpg', 's', '2025-04-12 17:37:03', '2025-04-12 17:37:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trademarks`
--

CREATE TABLE `trademarks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `describe` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trademarks`
--

INSERT INTO `trademarks` (`id`, `name`, `avatar`, `describe`, `created_at`, `updated_at`) VALUES
(4, 'Honda', 'image/1744703833_images.png', 'Nhật Bản – tiết kiệm nhiên liệu, dễ sửa chữa', '2025-04-15 00:57:13', '2025-04-15 00:57:13'),
(5, 'Hyundai', 'image/1744703946_Hyundai_logo.jpg', 'Hàn Quốc – giá tốt, option nhiều', '2025-04-15 00:59:06', '2025-04-15 00:59:06'),
(6, 'Kia', 'image/1744704009_logo-kia-va-lich-su-hinh-thanh-tu-1944-5.webp', 'Hàn Quốc – thiết kế trẻ trung, giá mềm', '2025-04-15 01:00:09', '2025-04-15 01:00:09'),
(7, 'Ford', 'image/1744704102_tải xuống.jpg', 'Mỹ – mạnh mẽ, nhất là xe bán tải', '2025-04-15 01:01:42', '2025-04-15 01:01:42'),
(8, 'VinFast', 'image/1744704160_logo-vinfast-inkythuatso-21-11-08-55.jpg', 'Việt Nam – thương hiệu nội địa', '2025-04-15 01:02:40', '2025-04-15 01:02:40'),
(9, 'Mercedes-Benz', 'image/1744704209_logo-mercedes-inkythuatso-3-01-11-09-10-56.jpg', 'Đức – xe sang, đẳng cấp', '2025-04-15 01:03:29', '2025-04-15 01:03:29'),
(10, 'BMW', 'image/1744704247_y-nghia-logo-bmw.jpg', 'Đức – thể thao, trải nghiệm lái cao cấp', '2025-04-15 01:04:07', '2025-04-15 01:04:07'),
(11, 'Toyota', 'image/1744703768_y-nghia-logo-toyota.jpg', 'Nhật Bản – nổi tiếng với độ bền và giữ giá', '2025-04-15 00:56:08', '2025-04-15 00:56:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `role`, `address`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(8, 'thanh đẹp trai số 1', 'levanthanhdz001@gmail.com', NULL, '$2y$12$zBabOkHLYBKqjjF.Xn9EF.m31IyV7tqEUlNnkDeeue43hOaOpbJh2', '0987654321', 'admin', 'Street Address', '1744729365_images (3).jpg', NULL, '2025-04-14 16:01:10', '2025-04-15 08:03:50'),
(12, 'thanh', 'thanhle308205@gmail.com', NULL, '$2y$12$dlJ2Qn80GcpaQdx1jZ/51eXKIJgkr2w0HBOGlcJrWnBdX.S5F/Y1i', '0123456789', 'user', 'Điện Bàn - Quảng Nam', '1744732871_silde1.jpg', NULL, '2025-04-15 09:01:11', '2025-04-15 18:37:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danhgia_id_product_foreign` (`id_product`),
  ADD KEY `danhgia_id_user_foreign` (`id_user`);

--
-- Chỉ mục cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `favourites_id_user_id_product_unique` (`id_user`,`id_product`),
  ADD KEY `favourites_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_discount_code_id_foreign` (`discount_code_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`),
  ADD KEY `products_id_trademark_foreign` (`id_trademark`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `favourites`
--
ALTER TABLE `favourites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `trademarks`
--
ALTER TABLE `trademarks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `danhgia_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `favourites`
--
ALTER TABLE `favourites`
  ADD CONSTRAINT `favourites_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `favourites_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_discount_code_id_foreign` FOREIGN KEY (`discount_code_id`) REFERENCES `discount_codes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_trademark_foreign` FOREIGN KEY (`id_trademark`) REFERENCES `trademarks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `product_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
