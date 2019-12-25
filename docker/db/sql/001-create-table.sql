-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3308
-- Thời gian đã tạo: Th12 25, 2019 lúc 02:15 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tudiensgt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_11_070733_create_tbl_admin_table', 1),
(5, '2019_12_11_071048_create_tbl_admin_table', 2),
(6, '2019_12_12_033404_create_tbl_wordtype_dictonary', 3),
(7, '2019_12_12_033557_create_tbl_alphabet_dictonary', 3),
(8, '2019_12_12_034213_create_tbl_dictonary', 3),
(9, '2019_12_12_035724_create_tbl_admin_table', 4),
(10, '2019_12_12_081346_create_tbl_dictionary_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Hoang', '096202113', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_alphabet`
--

DROP TABLE IF EXISTS `tbl_alphabet`;
CREATE TABLE IF NOT EXISTS `tbl_alphabet` (
  `alphabet_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alphabet_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alphabet_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `alphabet_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`alphabet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_alphabet`
--

INSERT INTO `tbl_alphabet` (`alphabet_id`, `alphabet_name`, `alphabet_desc`, `alphabet_status`, `created_at`, `updated_at`) VALUES
(4, 'F', '<p>Food</p>', 0, NULL, NULL),
(5, 'G', '<p>Game</p>', 0, NULL, NULL),
(6, 'M', '<p>Music</p>', 0, NULL, NULL),
(7, 'A', '<p>1</p>', 0, NULL, NULL),
(8, 'B', '<p>2</p>', 0, NULL, NULL),
(9, 'C', '<p>3</p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dictionary`
--

DROP TABLE IF EXISTS `tbl_dictionary`;
CREATE TABLE IF NOT EXISTS `tbl_dictionary` (
  `dictionary_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dictionary_name_eng` text COLLATE utf8_unicode_ci NOT NULL,
  `dictionary_name_vn` text COLLATE utf8_unicode_ci NOT NULL,
  `dictionary_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `dictionary_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dictionary_status` int(11) NOT NULL,
  `alphabet_id` int(11) NOT NULL,
  `wordtype_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`dictionary_id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dictionary`
--

INSERT INTO `tbl_dictionary` (`dictionary_id`, `dictionary_name_eng`, `dictionary_name_vn`, `dictionary_desc`, `dictionary_image`, `dictionary_status`, `alphabet_id`, `wordtype_id`, `created_at`, `updated_at`) VALUES
(1, 'Cake', 'Bánh ngọt', '<p>/keɪk/</p>', 'Cake77.jpg', 0, 4, 5, NULL, '2019-12-24 04:20:23'),
(2, 'Biscuit', 'Bánh quy', '<p>/ˈbɪskɪt/</p>', 'Biscuit81.jpg', 0, 4, 5, NULL, '2019-12-24 04:20:11'),
(3, 'Bread', 'Bánh mì', '<p>/bred/</p>', 'Bread31.jpg', 0, 4, 5, NULL, '2019-12-24 04:20:01'),
(4, 'Butterr', 'Bơ', '<p>/ˈbʌtə(r)/</p>', 'Butter80.jpg', 0, 4, 5, NULL, '2019-12-24 04:19:46'),
(5, 'Cheese', 'Pho mát', '<p>/tʃiːz/</p>', 'Cheese23.jpg', 0, 4, 5, NULL, '2019-12-24 04:19:35'),
(6, 'catch', 'ném và bắt bóng', '<p>/k&aelig;tʃ/</p>', 'catch29.jpg', 0, 5, 6, NULL, '2019-12-24 04:19:25'),
(7, 'hide-and-seek', 'trốn tìm', '<p>/ˌhaɪd ən ˈsiːk/</p>', 'hide-and-seek75.jpg', 0, 5, 6, NULL, '2019-12-24 04:19:13'),
(8, 'hopscotch', 'nhảy lò cò', '<p>/ˈhɑːpskɑːtʃ/</p>', 'hopscotch47.jpg', 0, 5, 6, NULL, '2019-12-24 04:19:02'),
(9, 'marbles', 'bắn bi', '<p>/ˈmɑːbl/</p>', 'marbles81.jpg', 0, 5, 6, NULL, '2019-12-24 04:18:52'),
(10, 'tug-of-war', 'kéo co', '<p>I like&nbsp;tug-of-war</p>', 'tug-of-war20.jpg', 0, 5, 6, NULL, '2019-12-24 04:18:43'),
(11, 'audience', 'khán giả', '<p>/ˈɔːdiəns/</p>', 'audience21.jpg', 0, 6, 7, NULL, '2019-12-24 04:18:36'),
(12, 'bassist', 'nhạc công guitar bass', '<p>&nbsp;/ˈbeɪsɪst/</p>', 'bassist99.jpg', 0, 6, 7, NULL, '2019-12-24 04:18:26'),
(13, 'beat', 'nhịp, phách', '<p>/biːt/</p>', 'beat39.jpg', 0, 6, 7, NULL, '2019-12-24 04:18:14'),
(14, 'cassette player', 'máy nghe băng', '<p>/kəˈset ˈpleɪər/</p>', 'cassette player30.jpg', 0, 6, 7, NULL, '2019-12-24 04:18:03'),
(15, 'cassette', 'băng cát-xéc', '<p>cassette /kəˈset/băng c&aacute;t-x&eacute;c</p>', 'cassette8.jpg', 0, 9, 7, NULL, '2019-12-21 23:46:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wordtype`
--

DROP TABLE IF EXISTS `tbl_wordtype`;
CREATE TABLE IF NOT EXISTS `tbl_wordtype` (
  `wordtype_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `wordtype_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wordtype_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `wordtype_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`wordtype_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_wordtype`
--

INSERT INTO `tbl_wordtype` (`wordtype_id`, `wordtype_name`, `wordtype_desc`, `wordtype_status`, `created_at`, `updated_at`) VALUES
(7, 'Music', '<p>Nhạc</p>', 0, NULL, NULL),
(5, 'Food', '<p>Thức Ăn</p>', 0, NULL, NULL),
(6, 'Game', '<p>Chơi Game</p>', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
