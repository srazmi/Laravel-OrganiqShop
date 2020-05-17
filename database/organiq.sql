-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2020 at 10:38 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `organiq`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `state` varchar(30) COLLATE utf8_bin NOT NULL,
  `city` varchar(30) COLLATE utf8_bin NOT NULL,
  `postaddress` varchar(100) COLLATE utf8_bin NOT NULL,
  `postal_code` varchar(10) COLLATE utf8_bin NOT NULL,
  `telephone` varchar(20) COLLATE utf8_bin NOT NULL,
  `mobile` varchar(13) COLLATE utf8_bin NOT NULL,
  `transferee_name` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `state`, `city`, `postaddress`, `postal_code`, `telephone`, `mobile`, `transferee_name`, `user_id`) VALUES
(1, 'tehran', 'tehran', 'sabalan', '112233445', '4455667788', '09123456789', 'elham', 3),
(2, 'تهران', 'پاكدشت', 'سبلان', '12345678', '09128550798', '09128550798', 'رزمی', 3),
(3, 'تهران', 'پاكدشت', 'سبلان', '12345678', '09128550798', '09128550798', 'رزمی', 3),
(4, 'تهران', 'اكبرآباد', 'سبلان', '12345678', '09128550798', '09128550798', 'رزمی', 3);

-- --------------------------------------------------------

--
-- Table structure for table `backed_product`
--

CREATE TABLE `backed_product` (
  `factor_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `baskets`
--

CREATE TABLE `baskets` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `num` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT curdate(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `baskets`
--

INSERT INTO `baskets` (`id`, `product_id`, `user_id`, `num`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '3', NULL, NULL),
(90, 0, 1, '1', '2020-05-13 04:26:06', NULL),
(91, 3, 4, '2', '2020-05-15 08:43:28', NULL),
(92, 0, 4, '1', '2020-05-15 08:46:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `persian_name` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `persian_name`) VALUES
(1, 'dry-fruits', 'آجیل و خشکبار'),
(2, 'sour-delicious', 'خوشمزه های ترش'),
(3, 'sweet-delicious', 'خوشمزه های شیرین'),
(4, 'adviye', 'ادویه ها'),
(5, 'chashny', 'چاشنی ها'),
(6, 'drink', 'عرقیات'),
(7, 'dry-vegteble', 'سبزی های خشک'),
(8, 'hobubat', 'حبوبات');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commentable_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `fileimage` text COLLATE utf8_bin DEFAULT NULL,
  `commentable_type` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `commentable_id`, `comment`, `created_at`, `updated_at`, `deleted_at`, `fileimage`, `commentable_type`, `score`, `state`) VALUES
(9, 2, 1, 'من از این محصول خرید کردم و از کیفیتش خیلی راضی هستم. حتما این محصول رو بهتون توصیه می کنم. واقعا فوق العاده است.', NULL, NULL, NULL, NULL, 'App\\Model\\Product', NULL, 1),
(10, 3, 1, ',jbjhbgljg khlugyuygjuh', NULL, '2020-05-02 21:05:42', NULL, NULL, 'App\\Model\\Product', 5, 1),
(11, 2, 0, 'من از این محصول خرید کردم و از کیفیتش خیلی راضی هستم. حتما این محصول رو بهتون توصیه می کنم. واقعا فوق العاده است.', NULL, NULL, NULL, NULL, 'App\\Model\\Product', NULL, 1),
(12, 3, 0, 'من از این سایت خرید کردم و از کیفیتش خیلی راضی هستم. حتما این محصول رو بهتون توصیه می کنم. واقعا فوق العاده است.', NULL, '2020-05-06 13:41:44', NULL, NULL, 'App\\Model\\Product', 3, 3),
(13, 3, 0, 'کیفیت محصولات این سایت عالی است. از خرید خود لذت خواهید برد.', '2020-05-06 13:29:18', '2020-05-06 13:29:18', NULL, NULL, NULL, NULL, 3),
(14, 3, 0, 'کیفیت محصولات این سایت عالی است. از خرید خود لذت خواهید برد.', '2020-05-06 13:38:20', '2020-05-06 13:38:20', NULL, NULL, NULL, NULL, 3),
(15, 3, 0, 'کیفیت محصولات این سایت عالی است. از خرید خود لذت خواهید برد.', '2020-05-06 13:39:04', '2020-05-06 13:39:04', NULL, NULL, NULL, NULL, 3),
(16, 3, 0, 'mjhvj hftfdjyrdredytdcjgvf;.t7g', '2020-05-06 13:41:55', '2020-05-06 13:41:55', NULL, NULL, NULL, NULL, 1),
(17, 3, 2, 'کیفبت محصولات عالی است.', '2020-05-06 19:07:02', '2020-05-06 19:07:02', NULL, NULL, NULL, NULL, 3),
(18, 3, 0, 'کیفیتش حرف نداره', '2020-05-11 21:14:05', '2020-05-11 21:14:05', NULL, NULL, 'App\\Model\\Product', NULL, 3),
(19, 3, 0, 'عالیییییییی', '2020-05-11 21:15:18', '2020-05-11 21:15:18', NULL, NULL, 'App\\Model\\Product', NULL, 2),
(20, 3, 5, 'lkz dfkj vadjf aijsdfiAEJROIJFa\'epirjEUa \n \'EORIH FAOEIRHF\n A\'EPIRHFAOEIHRF', '2020-05-11 21:19:28', '2020-05-11 21:19:28', NULL, NULL, 'App\\Model\\Posts', NULL, 1),
(21, 3, 5, 'ig ;iugiytg8t67uyzdkjfvba/KDJvbf', '2020-05-11 21:20:22', '2020-05-11 21:20:22', NULL, NULL, 'App\\Model\\Posts', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment_status`
--

CREATE TABLE `comment_status` (
  `id` int(11) NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment_status`
--

INSERT INTO `comment_status` (`id`, `name`) VALUES
(1, 'تایید نشده'),
(2, 'صفحه محصول'),
(3, 'صفحه سایت');

-- --------------------------------------------------------

--
-- Table structure for table `factor`
--

CREATE TABLE `factor` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sum` double NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `address_id` int(11) DEFAULT NULL,
  `ptype_id` int(11) NOT NULL DEFAULT 1,
  `factorstate_id` int(11) NOT NULL DEFAULT 1,
  `sendstate_id` int(11) NOT NULL DEFAULT 1,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `factor`
--

INSERT INTO `factor` (`id`, `user_id`, `sum`, `created_at`, `address_id`, `ptype_id`, `factorstate_id`, `sendstate_id`, `updated_at`) VALUES
(1, 3, 50000, '2020-05-10 15:48:54', 1, 1, 2, 2, NULL),
(2, 2, 40000, '2020-05-10 15:48:54', 1, 1, 1, 1, NULL),
(3, 1, 100000, '2020-05-10 15:48:54', 1, 1, 2, 2, NULL),
(4, 1, 100000, '2020-05-10 15:48:54', 1, 1, 2, 2, NULL),
(5, 2, 200000, '2020-05-10 15:48:54', 1, 1, 2, 2, NULL),
(6, 2, 50000, '2020-05-10 15:48:54', 1, 1, 2, 2, NULL),
(8, 3, 1100000, '2020-05-10 15:40:43', NULL, 1, 1, 1, '2020-05-10 15:40:43'),
(9, 3, 1100000, '2020-05-10 15:41:59', NULL, 1, 1, 1, '2020-05-10 15:41:59'),
(10, 3, 1100000, '2020-05-10 15:42:17', NULL, 1, 1, 1, '2020-05-10 15:42:17'),
(11, 3, 1100000, '2020-05-10 15:48:37', NULL, 1, 1, 1, '2020-05-10 15:48:37'),
(12, 3, 950000, '2020-05-10 20:17:48', NULL, 1, 1, 1, '2020-05-10 20:17:48'),
(13, 3, 1610000, '2020-05-10 20:19:58', NULL, 1, 1, 1, '2020-05-10 20:19:58'),
(14, 3, 1610000, '2020-05-10 20:22:38', NULL, 1, 1, 1, '2020-05-10 20:22:38'),
(15, 3, 1610000, '2020-05-10 20:33:14', NULL, 1, 1, 1, '2020-05-10 20:33:14'),
(16, 3, 1610000, '2020-05-10 20:38:42', NULL, 1, 1, 1, '2020-05-10 20:38:42'),
(17, 3, 1610000, '2020-05-10 20:41:43', NULL, 1, 1, 1, '2020-05-10 20:41:43'),
(18, 3, 1610000, '2020-05-10 21:03:08', NULL, 1, 1, 1, '2020-05-10 21:03:08'),
(38, 3, 270000, '2020-05-11 07:33:59', NULL, 1, 1, 1, '2020-05-11 07:33:59'),
(39, 3, 270000, '2020-05-11 07:44:03', NULL, 1, 1, 1, '2020-05-11 07:44:03'),
(40, 3, 270000, '2020-05-11 07:49:58', NULL, 1, 1, 1, '2020-05-11 07:49:58'),
(41, 3, 270000, '2020-05-11 07:51:51', NULL, 1, 1, 1, '2020-05-11 07:51:51'),
(42, 3, 270000, '2020-05-11 07:53:14', NULL, 1, 1, 1, '2020-05-11 07:53:14'),
(43, 3, 270000, '2020-05-11 07:55:00', NULL, 1, 1, 1, '2020-05-11 07:55:00'),
(44, 3, 270000, '2020-05-11 07:58:51', NULL, 1, 1, 1, '2020-05-11 07:58:51'),
(45, 4, 270000, '2020-05-11 08:00:18', NULL, 1, 1, 1, '2020-05-11 08:00:18'),
(46, 3, 270000, '2020-05-11 08:02:05', NULL, 1, 1, 1, '2020-05-11 08:02:05'),
(47, 3, 270000, '2020-05-11 08:03:24', NULL, 1, 1, 1, '2020-05-11 08:03:24'),
(48, 3, 270000, '2020-05-11 08:13:41', NULL, 1, 1, 1, '2020-05-11 08:13:41'),
(49, 3, 270000, '2020-05-11 08:18:23', NULL, 1, 1, 1, '2020-05-11 08:18:23'),
(50, 3, 270000, '2020-05-11 08:21:12', NULL, 1, 1, 1, '2020-05-11 08:21:12'),
(51, 3, 270000, '2020-05-11 08:29:33', NULL, 1, 1, 1, '2020-05-11 08:29:33'),
(52, 3, 670000, '2020-05-11 12:38:38', NULL, 1, 1, 1, '2020-05-11 12:38:38'),
(53, 3, 670000, '2020-05-12 07:47:06', NULL, 1, 1, 1, '2020-05-12 07:47:06'),
(54, 3, 100000, '2020-05-12 09:59:21', NULL, 1, 1, 1, '2020-05-12 09:59:21'),
(55, 1, 220000, '2020-05-13 05:57:27', NULL, 1, 1, 1, '2020-05-13 05:57:27'),
(56, 1, 220000, '2020-05-13 06:02:07', NULL, 1, 1, 1, '2020-05-13 06:02:07'),
(57, 1, 220000, '2020-05-13 06:02:25', NULL, 1, 1, 1, '2020-05-13 06:02:25'),
(58, 1, 220000, '2020-05-13 06:03:05', NULL, 1, 1, 1, '2020-05-13 06:03:05'),
(59, 1, 220000, '2020-05-13 06:19:51', NULL, 1, 1, 1, '2020-05-13 06:19:51'),
(60, 1, 220000, '2020-05-13 06:22:02', NULL, 1, 1, 1, '2020-05-13 06:22:02'),
(61, 1, 220000, '2020-05-13 06:23:24', NULL, 1, 1, 1, '2020-05-13 06:23:24'),
(62, 1, 220000, '2020-05-13 06:25:10', NULL, 1, 1, 1, '2020-05-13 06:25:10'),
(63, 1, 220000, '2020-05-13 06:26:25', NULL, 1, 1, 1, '2020-05-13 06:26:25'),
(64, 1, 220000, '2020-05-13 06:27:50', NULL, 1, 1, 1, '2020-05-13 06:27:50'),
(65, 4, 0, '2020-05-11 06:08:28', NULL, 1, 1, 1, '2020-05-11 06:08:28'),
(66, 4, 0, '2020-05-11 06:08:28', NULL, 1, 1, 1, '2020-05-11 06:08:28'),
(67, 4, 0, '2020-05-15 08:03:48', NULL, 1, 1, 1, '2020-05-15 08:03:48'),
(68, 3, 100000, '2020-05-16 06:23:12', 2, 1, 1, 1, '2020-05-16 06:23:12'),
(69, 3, 100000, '2020-05-16 06:36:28', 3, 1, 1, 1, '2020-05-16 06:36:28'),
(70, 3, 100000, '2020-05-16 07:29:55', 1, 1, 1, 1, '2020-05-16 07:29:55'),
(71, 3, 100000, '2020-05-16 07:35:38', 1, 1, 1, 1, '2020-05-16 07:35:38'),
(72, 3, 100000, '2020-05-16 07:45:36', 1, 1, 1, 1, '2020-05-16 07:45:36'),
(73, 3, 100000, '2020-05-16 07:51:45', 1, 1, 1, 1, '2020-05-16 07:51:45'),
(74, 3, 100000, '2020-05-16 07:52:27', 1, 1, 1, 1, '2020-05-16 07:52:27'),
(75, 3, 100000, '2020-05-16 07:53:22', 1, 1, 1, 1, '2020-05-16 07:53:22'),
(76, 3, 100000, '2020-05-16 07:56:26', 1, 1, 1, 1, '2020-05-16 07:56:26'),
(77, 3, 100000, '2020-05-16 07:58:22', 1, 1, 1, 1, '2020-05-16 07:58:22'),
(78, 3, 100000, '2020-05-16 08:00:40', 1, 1, 1, 1, '2020-05-16 08:00:40'),
(79, 3, 100000, '2020-05-16 08:01:28', 1, 1, 1, 1, '2020-05-16 08:01:28'),
(80, 3, 100000, '2020-05-16 08:06:22', 1, 1, 1, 1, '2020-05-16 08:06:22'),
(81, 3, 100000, '2020-05-16 08:09:23', 1, 1, 1, 1, '2020-05-16 08:09:23'),
(82, 3, 130000, '2020-05-16 08:24:01', 4, 1, 1, 1, '2020-05-16 08:24:01');

-- --------------------------------------------------------

--
-- Table structure for table `factor_product`
--

CREATE TABLE `factor_product` (
  `product_id` int(11) NOT NULL,
  `factor_id` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `factor_product`
--

INSERT INTO `factor_product` (`product_id`, `factor_id`, `num`, `created_at`, `updated_at`) VALUES
(0, 1, 3, NULL, NULL),
(0, 13, 13, '2020-05-10 20:19:58', '2020-05-10 20:19:58'),
(0, 14, 13, '2020-05-10 20:22:39', '2020-05-10 20:22:39'),
(0, 15, 13, '2020-05-10 20:33:14', '2020-05-10 20:33:14'),
(0, 38, 1, '2020-05-11 07:33:59', '2020-05-11 07:33:59'),
(0, 39, 6, '2020-05-11 07:44:03', '2020-05-11 07:44:03'),
(0, 40, 6, '2020-05-11 07:49:58', '2020-05-11 07:49:58'),
(0, 41, 6, '2020-05-11 07:51:51', '2020-05-11 07:51:51'),
(0, 42, 6, '2020-05-11 07:53:14', '2020-05-11 07:53:14'),
(0, 43, 6, '2020-05-11 07:55:00', '2020-05-11 07:55:00'),
(0, 44, 6, '2020-05-11 07:58:51', '2020-05-11 07:58:51'),
(0, 45, 6, '2020-05-11 08:00:18', '2020-05-11 08:00:18'),
(0, 46, 6, '2020-05-11 08:02:05', '2020-05-11 08:02:05'),
(0, 47, 6, '2020-05-11 08:03:24', '2020-05-11 08:03:24'),
(0, 48, 6, '2020-05-11 08:13:41', '2020-05-11 08:13:41'),
(0, 49, 6, '2020-05-11 08:18:23', '2020-05-11 08:18:23'),
(0, 50, 6, '2020-05-11 08:21:12', '2020-05-11 08:21:12'),
(0, 51, 6, '2020-05-11 08:29:33', '2020-05-11 08:29:33'),
(0, 52, 6, '2020-05-11 12:38:38', '2020-05-11 12:38:38'),
(0, 53, 3, '2020-05-12 07:47:06', '2020-05-12 07:47:06'),
(0, 54, 1, '2020-05-12 09:59:21', '2020-05-12 09:59:21'),
(0, 55, 1, '2020-05-13 05:57:27', '2020-05-13 05:57:27'),
(0, 56, 1, '2020-05-13 06:02:07', '2020-05-13 06:02:07'),
(0, 57, 1, '2020-05-13 06:02:25', '2020-05-13 06:02:25'),
(0, 58, 1, '2020-05-13 06:03:05', '2020-05-13 06:03:05'),
(0, 59, 1, '2020-05-13 06:19:51', '2020-05-13 06:19:51'),
(0, 60, 1, '2020-05-13 06:22:02', '2020-05-13 06:22:02'),
(0, 61, 1, '2020-05-13 06:23:24', '2020-05-13 06:23:24'),
(0, 62, 1, '2020-05-13 06:25:10', '2020-05-13 06:25:10'),
(0, 63, 1, '2020-05-13 06:26:25', '2020-05-13 06:26:25'),
(0, 64, 1, '2020-05-13 06:27:50', '2020-05-13 06:27:50'),
(0, 68, 1, '2020-05-16 06:23:12', '2020-05-16 06:23:12'),
(0, 69, 1, '2020-05-16 06:36:28', '2020-05-16 06:36:28'),
(0, 70, 1, '2020-05-16 07:29:55', '2020-05-16 07:29:55'),
(0, 71, 1, '2020-05-16 07:35:38', '2020-05-16 07:35:38'),
(0, 72, 1, '2020-05-16 07:45:36', '2020-05-16 07:45:36'),
(0, 73, 1, '2020-05-16 07:51:45', '2020-05-16 07:51:45'),
(0, 74, 1, '2020-05-16 07:52:27', '2020-05-16 07:52:27'),
(0, 75, 1, '2020-05-16 07:53:22', '2020-05-16 07:53:22'),
(0, 76, 1, '2020-05-16 07:56:26', '2020-05-16 07:56:26'),
(0, 77, 1, '2020-05-16 07:58:22', '2020-05-16 07:58:22'),
(0, 78, 1, '2020-05-16 08:00:40', '2020-05-16 08:00:40'),
(0, 79, 1, '2020-05-16 08:01:28', '2020-05-16 08:01:28'),
(0, 80, 1, '2020-05-16 08:06:22', '2020-05-16 08:06:22'),
(0, 81, 1, '2020-05-16 08:09:23', '2020-05-16 08:09:23'),
(0, 82, 1, '2020-05-16 08:24:01', '2020-05-16 08:24:01'),
(1, 4, 5, NULL, NULL),
(1, 5, 4, NULL, NULL),
(1, 14, 14, '2020-05-10 20:22:39', '2020-05-10 20:22:39'),
(1, 15, 14, '2020-05-10 20:33:15', '2020-05-10 20:33:15'),
(1, 38, 4, '2020-05-11 07:33:59', '2020-05-11 07:33:59'),
(1, 39, 5, '2020-05-11 07:44:04', '2020-05-11 07:44:04'),
(1, 40, 5, '2020-05-11 07:49:58', '2020-05-11 07:49:58'),
(1, 41, 5, '2020-05-11 07:51:51', '2020-05-11 07:51:51'),
(1, 42, 5, '2020-05-11 07:53:14', '2020-05-11 07:53:14'),
(1, 43, 5, '2020-05-11 07:55:00', '2020-05-11 07:55:00'),
(1, 44, 5, '2020-05-11 07:58:51', '2020-05-11 07:58:51'),
(1, 45, 5, '2020-05-11 08:00:18', '2020-05-11 08:00:18'),
(1, 46, 5, '2020-05-11 08:02:05', '2020-05-11 08:02:05'),
(1, 47, 5, '2020-05-11 08:03:24', '2020-05-11 08:03:24'),
(1, 48, 5, '2020-05-11 08:13:41', '2020-05-11 08:13:41'),
(1, 49, 5, '2020-05-11 08:18:24', '2020-05-11 08:18:24'),
(1, 50, 5, '2020-05-11 08:21:13', '2020-05-11 08:21:13'),
(1, 51, 5, '2020-05-11 08:29:33', '2020-05-11 08:29:33'),
(1, 52, 5, '2020-05-11 12:38:38', '2020-05-11 12:38:38'),
(1, 53, 5, '2020-05-12 07:47:06', '2020-05-12 07:47:06'),
(1, 55, 3, '2020-05-13 05:57:27', '2020-05-13 05:57:27'),
(1, 56, 3, '2020-05-13 06:02:07', '2020-05-13 06:02:07'),
(1, 57, 3, '2020-05-13 06:02:25', '2020-05-13 06:02:25'),
(1, 58, 3, '2020-05-13 06:03:05', '2020-05-13 06:03:05'),
(1, 59, 3, '2020-05-13 06:19:51', '2020-05-13 06:19:51'),
(1, 60, 3, '2020-05-13 06:22:02', '2020-05-13 06:22:02'),
(1, 61, 3, '2020-05-13 06:23:24', '2020-05-13 06:23:24'),
(1, 62, 3, '2020-05-13 06:25:10', '2020-05-13 06:25:10'),
(1, 63, 3, '2020-05-13 06:26:25', '2020-05-13 06:26:25'),
(1, 64, 3, '2020-05-13 06:27:50', '2020-05-13 06:27:50'),
(3, 2, 7, NULL, NULL),
(3, 6, 11, NULL, NULL),
(3, 54, 1, '2020-05-12 09:59:21', '2020-05-12 09:59:21'),
(3, 68, 1, '2020-05-16 06:23:12', '2020-05-16 06:23:12'),
(3, 69, 1, '2020-05-16 06:36:28', '2020-05-16 06:36:28'),
(3, 70, 1, '2020-05-16 07:29:55', '2020-05-16 07:29:55'),
(3, 71, 1, '2020-05-16 07:35:38', '2020-05-16 07:35:38'),
(3, 72, 1, '2020-05-16 07:45:36', '2020-05-16 07:45:36'),
(3, 73, 1, '2020-05-16 07:51:45', '2020-05-16 07:51:45'),
(3, 74, 1, '2020-05-16 07:52:27', '2020-05-16 07:52:27'),
(3, 75, 1, '2020-05-16 07:53:22', '2020-05-16 07:53:22'),
(3, 76, 1, '2020-05-16 07:56:26', '2020-05-16 07:56:26'),
(3, 77, 1, '2020-05-16 07:58:22', '2020-05-16 07:58:22'),
(3, 78, 1, '2020-05-16 08:00:40', '2020-05-16 08:00:40'),
(3, 79, 1, '2020-05-16 08:01:28', '2020-05-16 08:01:28'),
(3, 80, 1, '2020-05-16 08:06:22', '2020-05-16 08:06:22'),
(3, 81, 1, '2020-05-16 08:09:23', '2020-05-16 08:09:23'),
(3, 82, 2, '2020-05-16 08:24:01', '2020-05-16 08:24:01'),
(4, 3, 10, NULL, NULL),
(4, 4, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factor_state`
--

CREATE TABLE `factor_state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `factor_state`
--

INSERT INTO `factor_state` (`id`, `name`) VALUES
(1, 'پرداخت نشده'),
(2, 'پرداخت شده');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `persian_name` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `persian_name`) VALUES
(1, 'female', 'خانم'),
(2, 'male', 'آقا');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `disk` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `directory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aggregate_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `payment_gateway`
--

CREATE TABLE `payment_gateway` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `payment_gateway`
--

INSERT INTO `payment_gateway` (`id`, `name`) VALUES
(1, 'زرین پال');

-- --------------------------------------------------------

--
-- Table structure for table `peyment_type`
--

CREATE TABLE `peyment_type` (
  `id` int(11) NOT NULL,
  `type` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `peyment_type`
--

INSERT INTO `peyment_type` (`id`, `type`) VALUES
(1, 'کارت بانکی');

-- --------------------------------------------------------

--
-- Table structure for table `photoes`
--

CREATE TABLE `photoes` (
  `id` int(11) NOT NULL,
  `imageable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `imageable_type` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `path` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `photoes`
--

INSERT INTO `photoes` (`id`, `imageable_id`, `imageable_type`, `path`, `created_at`, `updated_at`) VALUES
(1, 0, 'App\\Model\\Product', 'assets/images/gerdoo.jpg', NULL, NULL),
(2, 2, 'App\\Model\\Product', 'assets/images/banner_img3.png', NULL, NULL),
(3, 3, 'App\\Model\\Product', 'assets/images/zaferan.jpg', NULL, NULL),
(4, 4, 'App\\Model\\Product', 'assets/images/golab.jfif', NULL, NULL),
(5, 4, 'App\\Model\\Product', 'assets/images/banner_img3.png', NULL, NULL),
(6, 0, 'App\\Model\\Product', 'assets/images/gerdoo5.jpg', NULL, NULL),
(7, 0, 'App\\Model\\Product', 'assets/images/gerdoo4.png', NULL, NULL),
(8, 0, 'App\\Model\\Product', 'assets/images/gerdoo3.png', NULL, NULL),
(9, 3, 'App\\User', 'assets/images/client_img1.jpg', NULL, NULL),
(10, 1, 'App\\User', 'assets/images/client_img2.jpg', NULL, NULL),
(12, 5, 'App\\Model\\Posts', 'assets/images/blog_small_img2.jpg', '2020-05-05 00:00:00', NULL),
(13, 6, 'App\\Model\\Posts', 'assets/images/gerdoo1.jpg', '2020-05-06 00:00:00', NULL),
(14, 7, 'App\\Model\\Posts', 'assets/images/badam.jpg', '2020-05-06 00:00:00', NULL),
(15, 8, 'App\\Model\\Posts', 'assets/images/peste.jpg', '2020-05-06 00:00:00', NULL),
(16, 0, 'App\\Model\\Product', 'assets/images/gerdoo6.jpg', NULL, NULL),
(17, 0, 'App\\Model\\Product', 'assets/images/gerdoo6.jpg', '2020-05-10 10:59:13', NULL),
(18, 1, 'App\\Model\\Product', 'assets/images/badam.jpg', NULL, NULL),
(19, 5, 'App\\Model\\Product', 'assets/images/blog_img4.jpg\r\n', NULL, NULL),
(20, 24, 'App\\Model\\Posts', 'assets/images/posts/a5f47e09b561116b0bc41485b446eec3.jpg', '2020-05-13 20:53:48', '2020-05-13 20:53:48'),
(21, 25, 'App\\Model\\Posts', 'assets/images/posts/badam.jpg', '2020-05-13 20:56:11', '2020-05-15 15:12:32'),
(22, 26, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:04:03', '2020-05-13 21:04:03'),
(23, 27, 'App\\Model\\Posts', 'assets/images/posts/a5f47e09b561116b0bc41485b446eec3.jpg', '2020-05-13 21:04:34', '2020-05-13 21:04:34'),
(24, 28, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:08:50', '2020-05-13 21:08:50'),
(25, 29, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:09:44', '2020-05-13 21:09:44'),
(26, 30, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:10:31', '2020-05-13 21:10:31'),
(27, 31, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:11:45', '2020-05-13 21:11:45'),
(28, 32, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:21:16', '2020-05-13 21:21:16'),
(29, 33, 'App\\Model\\Posts', 'assets/images/posts/6eca32e443a4e54099764f516f189ff1.jpg', '2020-05-13 21:24:25', '2020-05-13 21:24:25'),
(30, 34, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:26:03', '2020-05-13 21:26:03'),
(31, 35, 'App\\Model\\Posts', 'assets/images/posts/a5f47e09b561116b0bc41485b446eec3.jpg', '2020-05-13 21:27:51', '2020-05-13 21:27:51'),
(32, 36, 'App\\Model\\Posts', 'assets/images/posts/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-13 21:32:05', '2020-05-13 21:32:05'),
(33, 1, 'App\\Model\\Slides', 'assets/images/banner_bg.jpg', '2020-05-13 21:09:44', '2020-05-13 21:09:44'),
(34, 1, 'App\\Model\\Slides', 'assets/images/banner_img3.png', '2020-05-14 00:00:00', '2020-05-14 00:00:00'),
(35, 1, 'App\\Model\\Slides', 'assets/images/banner_img3.png', '2020-05-14 00:00:00', '2020-05-14 00:00:00'),
(36, 1, 'App\\Model\\Slides', 'assets/images/banner_img3.png', '2020-05-14 00:00:00', '2020-05-14 00:00:00'),
(37, 5, 'App\\Model\\Slides', 'assets/images/slides/47e30e8d920c2821f240989a64336d58.jpg', '2020-05-14 07:43:40', '2020-05-14 07:43:40'),
(38, 6, 'App\\Model\\Slides', 'assets/images/slides/47e30e8d920c2821f240989a64336d58.jpg', '2020-05-14 07:44:39', '2020-05-14 07:44:39'),
(39, 7, 'App\\Model\\Slides', 'assets/images/slides/47e30e8d920c2821f240989a64336d58.jpg', '2020-05-14 07:46:25', '2020-05-14 07:46:25'),
(40, 8, 'App\\Model\\Slides', 'assets/images/slides/a5f47e09b561116b0bc41485b446eec3.jpg', '2020-05-14 07:56:28', '2020-05-14 07:56:28'),
(41, 9, 'App\\Model\\Slides', 'assets/images/slides/c62b59cf3472a74e58dbc2cf518f488e.jpg', '2020-05-14 07:57:05', '2020-05-14 07:57:05'),
(42, 10, 'App\\Model\\Slides', 'assets/images/slides/47e30e8d920c2821f240989a64336d58.jpg', '2020-05-14 08:19:41', '2020-05-14 08:19:41'),
(43, 11, 'App\\Model\\Slides', 'assets/images/slides/a5f47e09b561116b0bc41485b446eec3.jpg', '2020-05-14 08:45:01', '2020-05-14 08:45:01'),
(44, 12, 'App\\Model\\Slides', 'assets/images/slides/6eca32e443a4e54099764f516f189ff1.jpg', '2020-05-15 10:07:52', '2020-05-15 10:07:52'),
(45, 13, 'App\\Model\\Slides', 'assets/images/slides/6eca32e443a4e54099764f516f189ff1.jpg', '2020-05-15 12:16:21', '2020-05-15 12:16:21'),
(46, 14, 'App\\Model\\Slides', 'assets/images/slides/6eca32e443a4e54099764f516f189ff1.jpg', '2020-05-15 12:20:52', '2020-05-15 12:20:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `content_one` text COLLATE utf8_persian_ci DEFAULT NULL,
  `created_at` date DEFAULT curdate(),
  `updated_at` date DEFAULT curdate(),
  `content_blockqotoe` text COLLATE utf8_persian_ci DEFAULT NULL,
  `content_two` text COLLATE utf8_persian_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `content_one`, `created_at`, `updated_at`, `content_blockqotoe`, `content_two`, `category_id`) VALUES
(6, 1, 'خواص و فواید گردو', 'یکی از پرخاصیت ترین مغزها\r\nخوردن گردو فواید بسیاری برای سلامتی انسان دارد، کاهش بیماری های قلبی، پیشگیری از سرطان و بهبود عملکرد مغز از فواید گردو است.گردوها برای پوست و بدن واقعاً عالی هستند و برای همین بسیاری از برندهای مراقبت از پوست و زیبایی محصولاتی شامل گردو دارند، چون غنی از مواد مغذی هستند که برای کارهای عادی زیبایی ما مفید هستند. .', '2020-05-06', '2020-05-11', 'گردوها همچنین برای مراقبت از مو عالی می باشند و بسیاری از شامپوها شامل عصاره های گردو و روغن گردو هستند چون مو را سالم نگه می دارند و آن ها را براق می کنند ', 'اما این تنها خواص گردو نیست که در این بخش از سلامت نمناک به آن خواهیم پرداخت.\r\nویتامین ها و مواد معدنی موجود در گردو\r\nگردو منبع خوبی از برخی ویتامین ها و مواد معدنی است. از جمله ی آنها می توان به موارد زیر اشاره کرد:\r\n\r\nویتامین B6: این ویتامین به تقویت دستگاه ایمنی و سلامت دستگاه عصبی کمک می کند. کمبود این ویتامین باعث کم خونی (آنمی) می شود.\r\n\r\nمس: مس موجود در گردو از مواد معدنی مفیدی است که موجب تقویت سلامت قلب ، بهبود به عملکرد دستگاه ایمنی بدن، استخوان ها و اعصاب نیز از سایر وظایف این ماده ی معدنی است.\r\n\r\nاسید فولیک: با عنوان فولات و ویتامین B9 نیز شناخته می شود و کمبود این ویتامین در دوران بارداری باعث تولد نوزاد ناقص می شود.\r\n\r\nویتامین E: گردو محتوی مقدار زیادی از این شکل ویتامین E است که برای مبارزه بدن با سرطان نیاز است.\r\n\r\nفسفر: نزدیک به 1٪ بدن ما را فسفر تشکیل می دهد. این ماده ی معدنی به طور عمده در استخوان ها یافت می شود و اهمیت خاصی در بدن دارند.\r\n\r\nمنگنز: بیشترین مقدار این ماده ی معدنی مهم در مغزها، غلات کامل، میوه ها و سبزیجات یافت می شود', 1),
(7, 3, 'خواص و فواید بادام', 'خواص و فواید شگفت انگیز بادام و روغن این میوه مفید برای پوست، مو و سلامتی\r\nهمه ما شنیده ایم، که بادام دارای خواص زیبایی و مزایای تغذیه ای خوبی است اما، چه چیزی می تواند پوست را زیباتر کند؟ تعداد بسیار کمی از مردم از مزایای پوستی بادام خبر دارند درحالیکه ', '2020-05-06', '2020-05-08', 'بادام را در کشورهای آسیایی به عنوان تقویت کننده پوست و مو می شناسند و از سالیان دور و دراز مصرف آن برای زیبایی پوست و مو توصیه می شده است .', 'اما این تنها بخش مهم خواص بادام و روغن آن نیست که این میوه برای سلامتی کلی نیز کاربرد دارد چنانچه در ادامه این بخش از سلامت نمناک می خوانید می توان با مصرف بادام بدن را در برابر بیماری هایی همچون سرطان و دیابت مقاوم ساخت', 1),
(8, 2, 'خواص پسته', '\r\nپسته یکی از اعضای مهم و ثابت آجیل ایرانی است که میزان پتاسیم آن با این جثه کوچک برابر با پتاسیم پرتقال است و به علت داشتن مواد مغذی از اهمیت بسیاری برخوردار است. ', '2020-05-06', '2020-05-09', 'پسته یکی از اعضای مهم و ثابت آجیل ایرانی است که میزان پتاسیم آن با این جثه کوچک برابر با پتاسیم پرتقال است و به علت داشتن مواد مغذی از اهمیت بسیاری برخوردار است.', 'استان کرمان و شهرستان رفسنجان، مراکز اصلی تولید پسته در ایران بشمار می آیند. پسته،عضو ثابت آجیل با وجود جثه کوچک خود سرشار از منابع مفید و مغذی برای سلامتی انسان است ؛ در ادامه این بخش از سلامت نمناک خواص مفید و دارویی این میوه به همراه مضرات آن را بررسی خواهیم کرد.\r\nانواع پسته\r\nچهار نوع پسته در ایران تولید می شود :فندقی، کله قوچی، اکبری و احمد آقایی\r\nفواید و خواص دارویی پسته\r\nجوشانده پوست درخت پسته برای برطرف کردن خارش اعضای تناسلی زنان مفید است.\r\nجوشانده پوست و برگ درخت پسته برای رفع درد و خارش مقعد مفید است.\r\nمغز پسته به علت داشتن آهن خون ساز است و آنهایی که مبتلا به کم خونی هستند باید حتما روزانه مقداری پسته بخورند.\r\nخوردن پسته نیروی جنسی را تقویت می کند.\r\nمغز و ذهن را تقویت می کند.\r\nپسته معده را تقویت می کند.\r\nبرای تسکین سرفه مفید است.\r\nبرای آرامش قلب و آرام کردن اعصاب مفید است.\r\nبرای باز کردن مجاری کبد مصرف پسته توصیه می شود.\r\nاسهال معمولی و اسهال خونی را درمان می کند.\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `number` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `created_at` date DEFAULT curdate(),
  `updated_at` date DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `category_id`, `number`, `price`, `unit`, `created_at`, `updated_at`) VALUES
(0, 'گردو', 'کاملا ارگانیک', 1, 162, 70000, 1, '2020-05-06', '2020-05-06'),
(1, 'بادام', 'کاملا طبیعی و ارگانیک', 1, 363, 50000, 1, '2020-05-06', '2020-05-06'),
(2, 'عسل طبیعی', 'کاملا طبیعی از دشتهای سرسبز لویین', 3, 300, 95000, 1, '2020-05-06', '2020-05-06'),
(3, 'زعفران', 'خوشرنگ و خوش عطر محصولی از دست های سرسبز لویین', 4, 1997, 30000, 2, '2020-05-06', '2020-05-06'),
(4, 'گلاب', 'گلاب طبیعی و سالم از گل های خوش عطر محمدی مزرعه سپیدپروار', 6, 1010, 10000, 3, '2020-05-06', '2020-05-06'),
(5, 'شیره انگور سیاه', 'این یک شیره مرغوب و طبیعی است', 3, 100, 30000, 1, '2020-05-06', '2020-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rateable_id` int(11) DEFAULT NULL,
  `rateable_type` int(11) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `rateable_id`, `rateable_type`, `rate`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 0, NULL, 1, '2020-04-25', '2020-04-25', 3),
(2, 1, NULL, 1, '2020-04-25', '2020-04-25', 3),
(3, 0, NULL, 1, '2020-04-25', '2020-04-25', 3),
(4, 1, NULL, 1, '2020-04-28', '2020-04-28', 3),
(5, 0, NULL, 1, '2020-04-28', '2020-04-28', 3),
(6, 1, NULL, 1, '2020-04-28', '2020-04-28', 3),
(7, 0, NULL, 1, '2020-04-28', '2020-04-28', 3),
(8, 3, NULL, 1, '2020-04-29', '2020-04-29', 3),
(9, 3, NULL, 1, '2020-04-29', '2020-04-29', 3),
(10, 3, NULL, 1, '2020-04-29', '2020-04-29', 3),
(11, 3, NULL, 1, '2020-04-29', '2020-04-29', 3),
(12, 3, NULL, 1, '2020-04-29', '2020-04-29', 3),
(13, 0, NULL, 1, '2020-04-29', '2020-04-29', 3),
(14, 1, NULL, 1, '2020-05-06', '2020-05-06', 3),
(15, 0, NULL, 1, '2020-05-15', '2020-05-15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'guest');

-- --------------------------------------------------------

--
-- Table structure for table `roles_user`
--

CREATE TABLE `roles_user` (
  `user_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `roles_user`
--

INSERT INTO `roles_user` (`user_id`, `roles_id`) VALUES
(1, 2),
(2, 2),
(3, 2),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `send_state`
--

CREATE TABLE `send_state` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `send_state`
--

INSERT INTO `send_state` (`id`, `name`) VALUES
(1, 'ارسال نشده'),
(2, 'در حال ارسال');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `created_at`, `updated_at`) VALUES
(11, 'سرکه سیب', '2020-05-14 04:15:01', '2020-05-14 04:15:01'),
(12, 'سرکه سیب', '2020-05-15 05:37:52', '2020-05-15 05:37:52'),
(13, 'سرکه سیب', '2020-05-15 07:46:21', '2020-05-15 07:46:21'),
(14, 'سرکه سیب', '2020-05-15 07:50:52', '2020-05-15 07:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `category_id`) VALUES
(1, 'بادام', 1),
(2, 'گردو', 1),
(3, 'پسته', 1),
(4, 'برگه زردآلو', 1),
(5, 'لواشک آلو', 2),
(6, 'عسل طبیعی', 3),
(7, 'زعفران', 4),
(8, 'رب گوجه', 5),
(9, 'گلاب', 6),
(10, 'نعنا', 7),
(11, 'نخود', 8),
(12, 'عدس', 8);

-- --------------------------------------------------------

--
-- Table structure for table `taggables`
--

CREATE TABLE `taggables` (
  `id` int(11) NOT NULL,
  `tags_id` int(11) DEFAULT NULL,
  `taggable_id` int(11) DEFAULT NULL,
  `taggable_type` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `taggables`
--

INSERT INTO `taggables` (`id`, `tags_id`, `taggable_id`, `taggable_type`) VALUES
(1, 1, 0, 'App\\Model\\Product'),
(2, 2, 5, 'App\\Model\\Posts'),
(3, 2, 0, 'App\\Model\\Product'),
(4, 5, 0, 'App\\Model\\Product'),
(5, 11, 0, 'App\\Model\\Product'),
(6, 1, 1, 'App\\Model\\Product'),
(7, 2, 1, 'App\\Model\\Product'),
(8, 6, 1, 'App\\Model\\Product'),
(9, 11, 1, 'App\\Model\\Product'),
(10, 2, 3, 'App\\Model\\Product');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'سلامتی و زیبایی', '2020-05-06 05:09:07', '2020-05-06 05:09:07'),
(2, 'ارگانیک', '2020-05-05 15:00:00', '2020-05-06 05:10:39'),
(4, 'پوست و مو', '2020-05-05 15:00:00', '2020-05-06 05:12:30'),
(5, 'خواص گردو', '2020-05-05 15:00:00', '2020-05-06 05:12:31'),
(6, 'خواص بادام', '2020-05-05 15:00:00', '2020-05-06 05:12:31'),
(7, 'خواص توت فرنگی', '2020-05-05 15:00:00', '2020-05-06 05:12:32'),
(8, 'زیبایی', '2020-05-05 15:00:00', '2020-05-06 05:12:33'),
(9, 'سلامتی', '2020-05-05 15:00:00', '2020-05-06 05:12:33'),
(10, 'خواص پسته', '2020-05-05 15:00:00', '2020-05-06 05:12:33'),
(11, 'آجیل و خشکبار', '2020-05-05 15:00:00', '2020-05-06 05:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `factor_id` int(11) NOT NULL,
  `price` varchar(20) COLLATE utf8_bin NOT NULL,
  `peygiri_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `paymentgateway_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `factor_id`, `price`, `peygiri_code`, `paymentgateway_id`, `created_at`, `updated_at`) VALUES
(3, 81, '100000', '12345678', 1, '2020-05-16 03:39:33', '2020-05-16 03:39:33'),
(4, 82, '130000', '12345678', 1, '2020-05-16 03:54:15', '2020-05-16 03:54:15');

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `name`) VALUES
(1, 'کیلو'),
(2, 'مثقال'),
(3, 'لیتر');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `registerdate` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8_bin DEFAULT NULL,
  `logindate` varchar(13) COLLATE utf8_bin DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `email_verified_at` date DEFAULT NULL,
  `remember_token` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `path` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `email`, `registerdate`, `mobile`, `logindate`, `gender_id`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `path`) VALUES
(1, 'sara', NULL, '$2y$10$jraaw1moH0kU8VOEBlmfZOhnza5GoOwblh9.OB2.TQImhZsP6dl4S', 'sararazmi@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'ali', NULL, '$2y$10$HrHH13317MXl6bsLEkS6Duv1W8XZbm57stS08pymGFDYxBdMRflDe', 'isabel@example.org', NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'elham', NULL, '$2y$10$tdymMz2gj2ivvBA4zdCGeu/31f0S6E4CQ29JCBYgHHdY1cRZnErGq', 'elham.razmi@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'samaneh', NULL, '$2y$10$8PTgxZpF7eYIgfyh.I1wiuRoKfBagOWheGMUQ5.W52cfNYDhsmwgu', 'samaneh.razmi@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_address_users` (`user_id`);

--
-- Indexes for table `backed_product`
--
ALTER TABLE `backed_product`
  ADD PRIMARY KEY (`factor_id`,`product_id`),
  ADD KEY `fk_backed_product_product` (`product_id`);

--
-- Indexes for table `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_baskets` (`product_id`),
  ADD KEY `idx_baskets_0` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_users` (`user_id`),
  ADD KEY `fk_comment_product` (`commentable_id`),
  ADD KEY `fk_comments_comment_status` (`state`);

--
-- Indexes for table `comment_status`
--
ALTER TABLE `comment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factor`
--
ALTER TABLE `factor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_factor_address` (`address_id`),
  ADD KEY `fk_factor_peyment_type` (`ptype_id`),
  ADD KEY `fk_factor_factor_state` (`factorstate_id`),
  ADD KEY `fk_factor_send_state` (`sendstate_id`);

--
-- Indexes for table `factor_product`
--
ALTER TABLE `factor_product`
  ADD PRIMARY KEY (`product_id`,`factor_id`),
  ADD KEY `fk_factorproduct_factor` (`factor_id`);

--
-- Indexes for table `factor_state`
--
ALTER TABLE `factor_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_disk_directory_filename_extension_unique` (`disk`,`directory`,`filename`,`extension`),
  ADD KEY `media_disk_directory_index` (`disk`,`directory`),
  ADD KEY `media_aggregate_type_index` (`aggregate_type`);

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
-- Indexes for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peyment_type`
--
ALTER TABLE `peyment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photoes`
--
ALTER TABLE `photoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_users` (`user_id`),
  ADD KEY `fk_posts_category` (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_product_category` (`category_id`),
  ADD KEY `fk_products_unit` (`unit`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_user`
--
ALTER TABLE `roles_user`
  ADD PRIMARY KEY (`user_id`,`roles_id`),
  ADD KEY `fk_users_role_role` (`roles_id`);

--
-- Indexes for table `send_state`
--
ALTER TABLE `send_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_subcategory` (`category_id`);

--
-- Indexes for table `taggables`
--
ALTER TABLE `taggables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaction_factor` (`factor_id`),
  ADD KEY `fk_transaction_payment_gateway` (`paymentgateway_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_users_gender` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `comment_status`
--
ALTER TABLE `comment_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `factor`
--
ALTER TABLE `factor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `factor_state`
--
ALTER TABLE `factor_state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_gateway`
--
ALTER TABLE `payment_gateway`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `photoes`
--
ALTER TABLE `photoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `taggables`
--
ALTER TABLE `taggables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `fk_address_users_0` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `backed_product`
--
ALTER TABLE `backed_product`
  ADD CONSTRAINT `fk_backed_product_factor` FOREIGN KEY (`factor_id`) REFERENCES `factor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_backed_product_product_0` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `baskets`
--
ALTER TABLE `baskets`
  ADD CONSTRAINT `fk_baskets_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_baskets_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_comment_status` FOREIGN KEY (`state`) REFERENCES `comment_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comments_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factor`
--
ALTER TABLE `factor`
  ADD CONSTRAINT `fk_factor_factor_state_0` FOREIGN KEY (`factorstate_id`) REFERENCES `factor_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factor_peyment_type_0` FOREIGN KEY (`ptype_id`) REFERENCES `peyment_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factor_send_state_0` FOREIGN KEY (`sendstate_id`) REFERENCES `send_state` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `factor_product`
--
ALTER TABLE `factor_product`
  ADD CONSTRAINT `fk_factorproduct_factor_0` FOREIGN KEY (`factor_id`) REFERENCES `factor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_factorproduct_product` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_posts_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_category_0` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_products_unit` FOREIGN KEY (`unit`) REFERENCES `unit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles_user`
--
ALTER TABLE `roles_user`
  ADD CONSTRAINT `fk_roles_user_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_roles_user_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `fk_subcategory_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `fk_transaction_factor_0` FOREIGN KEY (`factor_id`) REFERENCES `factor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaction_payment_gateway_0` FOREIGN KEY (`paymentgateway_id`) REFERENCES `payment_gateway` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_genders` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
