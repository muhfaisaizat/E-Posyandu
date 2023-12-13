-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 22, 2023 at 04:27 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-posyandu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `status_aktif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `password`, `nama`, `foto`, `status_aktif`) VALUES
('admin@gmail.com', 'admin', 'galuh', '6555cda2031e0.jpg', ''),
('aizat@gmail.com', 'aiz1234', 'Aizatganteng', NULL, ''),
('hgdhjsf', 'hfbjas', 'galuh', NULL, ''),
('hgsahjg', 'gashjd', 'hagdj', NULL, ''),
('xet@gmail.com', 'hhhh', 'zeetlas', NULL, ''),
('zeettlaass@gmail.com', '123', 'aiz', '655228da88218.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int NOT NULL,
  `idpesanmasuk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `idpesankirim` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pesan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `waktu` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `idpesanmasuk`, `idpesankirim`, `pesan`, `waktu`) VALUES
(4, '12345678765432', 'jdbsk', 'tes2baru', '2023-11-14 02:28:17'),
(10, '12345678765432', 'user@gmail.com', 'hihihi', '2023-11-14 03:21:51'),
(11, '12345678765432', 'user@gmail.com', 'sukses', '2023-11-14 03:35:36'),
(12, 'user@gmail.com', '12345678765432', 'masuk bidan', '2023-11-14 04:45:54'),
(13, '12345678765432', 'user@gmail.com', 'masuk boy', '2023-11-14 10:06:07'),
(14, '12345678765432', 'user@gmail.com', 'okee', '2023-11-14 10:31:38'),
(15, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-14 11:52:20'),
(16, 'user@gmail.com', '12345678765432', '', '2023-11-14 11:57:46'),
(17, 'user@gmail.com', '12345678765432', 'oke oke', '2023-11-14 11:58:05'),
(18, 'jdbsk', '12345678765432', 'masuk', '2023-11-14 12:23:15'),
(19, 'jdbsk', '12345678765432', 'oke', '2023-11-14 12:23:40'),
(33, 'user@gmail.com', '12345678765432', 'hdbhasdd', '2023-11-14 13:40:35'),
(35, 'user@gmail.com', '12345678765432', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-11-14 13:44:00'),
(36, 'user@gmail.com', '12345678765432', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2023-11-14 13:45:22'),
(37, '12345678765432', 'user@gmail.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n', '2023-11-14 13:45:44'),
(38, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 13:48:32'),
(39, 'user@gmail.com', '12345678765432', 'okee', '2023-11-14 13:51:08'),
(40, 'user@gmail.com', '12345678765432', 'pp', '2023-11-14 13:51:22'),
(41, 'user@gmail.com', '12345678765432', 'iiii', '2023-11-14 13:52:00'),
(42, 'user@gmail.com', '12345678765432', 'iiii', '2023-11-14 13:52:01'),
(43, 'user@gmail.com', '12345678765432', 'iiii', '2023-11-14 13:52:06'),
(44, 'user@gmail.com', '12345678765432', 'iiii', '2023-11-14 13:52:10'),
(45, 'jdbsk', '12345678765432', 'tes', '2023-11-14 13:54:30'),
(46, 'jdbsk', '12345678765432', 'tes', '2023-11-14 13:54:34'),
(47, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 13:54:46'),
(48, 'user@gmail.com', '12345678765432', 'mantap bu', '2023-11-14 13:57:08'),
(49, 'user@gmail.com', '12345678765432', 'yy', '2023-11-14 13:58:55'),
(50, 'user@gmail.com', '12345678765432', 'yyy', '2023-11-14 14:01:22'),
(51, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 14:02:39'),
(52, 'user@gmail.com', '12345678765432', 'hgahdgjh', '2023-11-14 14:02:52'),
(53, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 14:04:19'),
(54, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 14:04:46'),
(55, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 14:10:31'),
(56, 'user@gmail.com', '12345678765432', 'tesa', '2023-11-14 14:13:37'),
(57, 'user@gmail.com', '12345678765432', 'oii', '2023-11-14 14:17:50'),
(58, 'user@gmail.com', '12345678765432', 'oii', '2023-11-14 14:17:53'),
(59, 'user@gmail.com', '12345678765432', 'tes', '2023-11-14 14:21:51'),
(60, 'user@gmail.com', '12345678765432', 'testes', '2023-11-14 14:22:18'),
(61, 'user@gmail.com', '12345678765432', 'document.addEventListener(\"DOMContentLoaded\", function () {     var container = document.querySelector(\".chatbalasContainer\");     container.scrollTop = container.scrollHeight; });', '2023-11-14 14:22:40'),
(62, 'user@gmail.com', '12345678765432', 'document.addEventListener(\"DOMContentLoaded\", function () {     var container = document.querySelector(\".chatbalasContainer\");     container.scrollTop = container.scrollHeight; });', '2023-11-14 14:26:01'),
(63, 'user@gmail.com', '12345678765432', 'document.addEventListener(\"DOMContentLoaded\", function () {     var container = document.querySelector(\".chatbalasContainer\");     container.scrollTop = container.scrollHeight; });', '2023-11-14 14:26:09'),
(64, 'user@gmail.com', '12345678765432', 'hjgh', '2023-11-14 14:29:09'),
(65, 'user@gmail.com', '12345678765432', 'hjgh', '2023-11-14 14:29:14'),
(66, 'user@gmail.com', '12345678765432', 'hjgh', '2023-11-14 14:29:23'),
(67, 'user@gmail.com', '12345678765432', 'hjgh', '2023-11-14 14:29:25'),
(68, 'user@gmail.com', '12345678765432', 'hjgh', '2023-11-14 14:29:28'),
(69, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:29:47'),
(70, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:30:34'),
(71, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:31:01'),
(72, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:31:03'),
(73, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:31:04'),
(74, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:31:05'),
(75, 'user@gmail.com', '12345678765432', 'jkjkj', '2023-11-14 14:31:07'),
(76, 'user@gmail.com', '12345678765432', 'fsf', '2023-11-14 14:31:21'),
(77, 'user@gmail.com', '12345678765432', 'fsf', '2023-11-14 14:31:23'),
(78, 'user@gmail.com', '12345678765432', 'fsf', '2023-11-14 14:31:24'),
(79, 'user@gmail.com', '12345678765432', 'hjkhk', '2023-11-14 14:31:51'),
(80, 'user@gmail.com', '12345678765432', 'hjkhk', '2023-11-14 14:31:53'),
(81, 'user@gmail.com', '12345678765432', 'hjkhk', '2023-11-14 14:32:03'),
(82, 'user@gmail.com', '12345678765432', 'hjkhk', '2023-11-14 14:32:11'),
(83, 'user@gmail.com', '12345678765432', 'hjkhk', '2023-11-14 14:32:22'),
(84, 'user@gmail.com', '12345678765432', 'bhj', '2023-11-14 14:32:49'),
(85, 'user@gmail.com', '12345678765432', 'bhj', '2023-11-14 14:32:52'),
(86, 'user@gmail.com', '12345678765432', 'b nb', '2023-11-14 14:33:15'),
(87, 'user@gmail.com', '12345678765432', 'bjbk', '2023-11-14 14:34:12'),
(88, 'user@gmail.com', '12345678765432', 'hgbbhj', '2023-11-14 14:34:51'),
(89, 'user@gmail.com', '12345678765432', 'hgbbhj', '2023-11-14 14:35:04'),
(90, 'user@gmail.com', '12345678765432', 'hgbbhj', '2023-11-14 14:35:21'),
(91, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:40:52'),
(92, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:40:55'),
(93, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:40:58'),
(94, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:41:02'),
(95, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:41:14'),
(96, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:41:39'),
(97, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:41:43'),
(98, 'user@gmail.com', '12345678765432', 'tats', '2023-11-14 14:41:57'),
(99, 'user@gmail.com', '12345678765432', 'yuuii', '2023-11-14 14:44:47'),
(100, 'user@gmail.com', '12345678765432', 'gfh', '2023-11-14 14:46:05'),
(179, 'user@gmail.com', '12345678765432', 'gcjhasgcjhsa', '2023-11-14 14:57:34'),
(180, 'user@gmail.com', '12345678765432', 'gcjhasgcjhsa', '2023-11-14 14:57:47'),
(181, 'user@gmail.com', '12345678765432', 'asdbhjs', '2023-11-14 14:59:08'),
(182, 'user@gmail.com', '12345678765432', 'asdbhjs', '2023-11-14 14:59:15'),
(183, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 14:59:43'),
(184, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 14:59:48'),
(185, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 15:00:15'),
(186, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 15:00:19'),
(187, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 15:00:31'),
(188, 'user@gmail.com', '12345678765432', 'dhdukshaif', '2023-11-14 15:00:33'),
(189, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:02'),
(190, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:04'),
(191, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:06'),
(192, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:07'),
(193, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:09'),
(194, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:12'),
(195, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:13'),
(196, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:13'),
(197, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:14'),
(198, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:16'),
(199, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:20'),
(200, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:23'),
(201, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:25'),
(202, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:49'),
(203, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:01:51'),
(204, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:02:15'),
(205, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:02:34'),
(206, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:05:40'),
(207, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:05:50'),
(208, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:06:14'),
(209, 'user@gmail.com', '12345678765432', 'hskdjahfudshfiulhwefui', '2023-11-14 15:06:17'),
(210, 'user@gmail.com', '12345678765432', 'xgfxcrcrtcutyctu', '2023-11-14 15:06:24'),
(211, 'user@gmail.com', '12345678765432', 'xgfxcrcrtcutyctu', '2023-11-14 15:06:26'),
(212, 'user@gmail.com', '12345678765432', 'xgfxcrcrtcutyctu', '2023-11-14 15:06:30'),
(213, 'user@gmail.com', '12345678765432', 'xgfxcrcrtcutyctu', '2023-11-14 15:06:32'),
(214, 'user@gmail.com', '12345678765432', 'xgfxcrcrtcutyctu', '2023-11-14 15:06:33'),
(215, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:01'),
(216, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:03'),
(217, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:04'),
(218, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:07'),
(219, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:10'),
(220, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:11'),
(221, 'user@gmail.com', '12345678765432', 'fjyfuy', '2023-11-14 15:08:15'),
(222, 'user@gmail.com', '12345678765432', 'ggfh', '2023-11-14 15:08:34'),
(223, 'user@gmail.com', '12345678765432', 'ggfh', '2023-11-14 15:08:35'),
(224, 'user@gmail.com', '12345678765432', 'ggfh', '2023-11-14 15:08:37'),
(225, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:07'),
(226, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:11'),
(227, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:12'),
(228, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:14'),
(229, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:19'),
(230, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:25'),
(231, 'jdbsk', '12345678765432', 'oiii', '2023-11-14 15:12:30'),
(232, 'jdbsk', '12345678765432', 'shasdbah', '2023-11-14 15:14:02'),
(233, 'jdbsk', '12345678765432', 'shasdbah', '2023-11-14 15:14:08'),
(234, 'jdbsk', '12345678765432', 'shasdbah', '2023-11-14 15:14:23'),
(235, 'user@gmail.com', '12345678765432', 'dhkashd', '2023-11-14 15:16:33'),
(236, 'jdbsk', '12345678765432', 'bsad', '2023-11-14 15:16:45'),
(237, 'jdbsk', '12345678765432', 'abjhsd', '2023-11-14 15:17:19'),
(238, 'jdbsk', '12345678765432', 'asdasd', '2023-11-14 15:17:50'),
(239, 'jdbsk', '12345678765432', '21312', '2023-11-14 15:18:14'),
(240, 'jdbsk', '12345678765432', '21312', '2023-11-14 15:18:17'),
(241, 'jdbsk', '12345678765432', 'fasdfds', '2023-11-14 15:18:38'),
(242, 'jdbsk', '12345678765432', 'frewrq', '2023-11-14 15:19:04'),
(243, 'jdbsk', '12345678765432', 'hekfjhewkf', '2023-11-14 15:19:19'),
(244, 'jdbsk', '12345678765432', 'hekfjhewkf', '2023-11-14 15:19:40'),
(245, 'jdbsk', '12345678765432', 'hekfjhewkf', '2023-11-14 15:19:43'),
(246, 'jdbsk', '12345678765432', 'ewe', '2023-11-14 15:21:13'),
(247, 'jdbsk', '12345678765432', 'ewe', '2023-11-14 15:21:14'),
(248, 'jdbsk', '12345678765432', 'ewe', '2023-11-14 15:21:16'),
(249, 'jdbsk', '12345678765432', 'hwkjef', '2023-11-14 15:21:23'),
(252, 'user@gmail.com', '12345678765432', 'scroll-behavior: smooth;', '2023-11-14 15:43:21'),
(253, 'user@gmail.com', '12345678765432', 'scroll-behavior: smooth;', '2023-11-14 15:43:26'),
(254, 'user@gmail.com', '12345678765432', 'Ini memastikan bahwa fungsi untuk menghitung tinggi elemen baru dan gulir ke bawah dijalankan setelah data baru ditampilkan dalam elemen Anda. Penerapan setTimeout di sini membantu memastikan bahwa itu terjadi setelah tampilan data baru. Pastikan untuk mengganti /* Hitung tinggi elemen baru */ dengan logika yang sesuai untuk mengukur tinggi elemen baru.', '2023-11-14 15:44:01'),
(255, '12345678765432', 'user@gmail.com', 'huii', '2023-11-15 07:28:03'),
(256, '12345678765432', 'user@gmail.com', 'huii', '2023-11-15 07:28:10'),
(257, '12345678765432', 'user@gmail.com', 'mantap', '2023-11-15 07:28:33'),
(258, '12345678765432', 'user@gmail.com', 'huiii', '2023-11-15 07:29:00'),
(259, '12345678765432', 'user@gmail.com', 'huiii', '2023-11-15 07:29:03'),
(260, '12345678765432', 'user@gmail.com', 'huiii', '2023-11-15 07:29:04'),
(261, 'user@gmail.com', '12345678765432', 'ada apa ya ?', '2023-11-15 07:31:17'),
(262, '12345678765432', 'user@gmail.com', 'gak papa', '2023-11-15 07:31:46'),
(263, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:34:08'),
(264, '12345678765432', 'user@gmail.com', 'huii', '2023-11-15 07:37:00'),
(265, '12345678765432', 'user@gmail.com', 'huii', '2023-11-15 07:37:03'),
(266, '12345678765432', 'user@gmail.com', 'huii', '2023-11-15 07:37:07'),
(267, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:37:19'),
(268, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:37:22'),
(269, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:37:25'),
(270, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:37:54'),
(271, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:38:00'),
(272, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:38:03'),
(273, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:38:06'),
(274, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:38:24'),
(275, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:38:26'),
(276, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:52:54'),
(277, '12345678765432', 'user@gmail.com', 'okee', '2023-11-15 07:55:11'),
(278, '12345678765432', 'user@gmail.com', 'okee', '2023-11-15 07:55:26'),
(279, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:55:46'),
(280, '12345678765432', 'user@gmail.com', 'okee', '2023-11-15 07:55:54'),
(281, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:55:58'),
(282, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:56:54'),
(283, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:58:48'),
(284, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 07:59:09'),
(285, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 07:59:18'),
(286, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:10:27'),
(287, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:10:35'),
(288, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:15:47'),
(289, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:16:45'),
(290, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:16:48'),
(291, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:16:50'),
(292, 'user@gmail.com', '12345678765432', 'mantapppp', '2023-11-15 08:16:52'),
(293, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:16:59'),
(294, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:17:01'),
(295, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:17:03'),
(296, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:17:37'),
(297, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:17:39'),
(298, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:17:41'),
(299, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:17:45'),
(300, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:18:21'),
(301, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:18:24'),
(302, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:18:29'),
(303, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:18:31'),
(304, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:18:34'),
(305, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:18:54'),
(306, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:20:18'),
(307, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:21:22'),
(308, 'user@gmail.com', '12345678765432', 'okeee', '2023-11-15 08:21:24'),
(309, 'user@gmail.com', '12345678765432', 'oke', '2023-11-15 08:44:47'),
(310, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 08:45:02'),
(311, 'user@gmail.com', '12345678765432', 'oke', '2023-11-15 08:45:06'),
(312, '12345678765432', 'user@gmail.com', 'oke', '2023-11-15 09:01:20'),
(313, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:01:41'),
(314, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:04:59'),
(315, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:05:17'),
(316, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:19:23'),
(317, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:19:25'),
(318, 'user@gmail.com', '12345678765432', 'mantap', '2023-11-15 09:19:31'),
(319, 'user@gmail.com', '12345678765432', 'mantaphfvegjr', '2023-11-15 09:19:43'),
(320, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtb', '2023-11-15 09:19:51'),
(321, '12345678765432', 'user@gmail.com', 'tyhegdhngrn', '2023-11-15 09:20:03'),
(322, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuewhuwe', '2023-11-15 09:37:19'),
(323, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuewhuwe', '2023-11-15 09:37:23'),
(324, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuewhuwe', '2023-11-15 09:37:40'),
(325, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuewhuwe', '2023-11-15 09:37:47'),
(326, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuh', '2023-11-15 09:39:11'),
(327, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuhyyy', '2023-11-15 09:39:21'),
(328, 'user@gmail.com', '12345678765432', 'mantaphfvegjrvgtbthgbhtbuhuhyyyhh', '2023-11-15 09:39:36'),
(329, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:46:56'),
(330, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:47:00'),
(331, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:47:04'),
(332, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:47:25'),
(333, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:50:41'),
(334, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:50:44'),
(335, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:50:50'),
(336, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:50:54'),
(337, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:50:57'),
(338, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:51:06'),
(339, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:52:40'),
(340, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 09:52:45'),
(341, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:53:06'),
(342, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:57:10'),
(343, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:57:13'),
(344, '12345678765432', 'user@gmail.com', 'pp', '2023-11-15 09:57:14'),
(345, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:06'),
(346, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:09'),
(347, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:09'),
(348, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:09'),
(349, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:10'),
(350, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:10'),
(351, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:11'),
(352, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:11'),
(353, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:11'),
(354, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:11'),
(355, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:11'),
(356, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:12'),
(357, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:12'),
(358, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:12'),
(359, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:12'),
(360, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:12'),
(361, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:13'),
(362, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:13'),
(363, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:13'),
(364, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:13'),
(365, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:13'),
(366, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:14'),
(367, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:14'),
(368, '12345678765432', 'user@gmail.com', 'ashdfgf', '2023-11-15 10:07:14'),
(369, '12345678765432', 'user@gmail.com', 'd', '2023-11-15 10:07:28'),
(370, '12345678765432', 'user@gmail.com', 'dsad', '2023-11-15 10:09:06'),
(371, '12345678765432', 'user@gmail.com', 'dsad', '2023-11-15 10:09:08'),
(372, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 10:10:21'),
(373, 'user@gmail.com', '12345678765432', 'pp', '2023-11-15 10:10:24'),
(374, '12345678765432', 'user@gmail.com', 'gsdkasg', '2023-11-15 10:12:31'),
(375, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:12:47'),
(376, '12345678765432', 'user@gmail.com', 'hasjdka', '2023-11-15 10:30:27'),
(377, '12345678765432', 'user@gmail.com', 'jjj', '2023-11-15 10:33:20'),
(378, '12345678765432', 'user@gmail.com', 'xbhascjh', '2023-11-15 10:35:10'),
(379, '12345678765432', 'user@gmail.com', 'fvgfvhg', '2023-11-15 10:41:38'),
(380, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:47:42'),
(381, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:47:46'),
(382, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:47:49'),
(383, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:47:54'),
(384, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:48:14'),
(385, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:48:26'),
(386, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:48:30'),
(387, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:48:45'),
(388, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:48:54'),
(389, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:49:03'),
(390, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:49:06'),
(391, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:49:19'),
(392, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:49:35'),
(393, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:49:40'),
(394, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:50:19'),
(395, '12345678765432', 'user@gmail.com', 'ferfref', '2023-11-15 10:50:39'),
(396, 'user@gmail.com', '12345678765432', 'asdsa', '2023-11-15 10:51:16'),
(397, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:52:38'),
(398, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:52:56'),
(399, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:53:03'),
(400, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:53:09'),
(401, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:53:13'),
(402, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:53:19'),
(403, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:53:23'),
(404, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:53:44'),
(405, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:54:15'),
(406, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:54:19'),
(407, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:56:08'),
(408, '12345678765432', 'user@gmail.com', 'vcgh', '2023-11-15 10:56:32'),
(409, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:57:21'),
(410, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:57:48'),
(411, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:57:53'),
(412, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:57:58'),
(413, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:58:20'),
(414, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:58:36'),
(415, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:59:08'),
(416, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:59:17'),
(417, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 10:59:18'),
(418, '12345678765432', 'user@gmail.com', 'vcghsfe', '2023-11-15 10:59:47'),
(419, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:00:19'),
(420, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:00:27'),
(421, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:00:30'),
(422, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:00:32'),
(423, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:00:36'),
(424, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:00:45'),
(425, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:01:09'),
(426, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:14'),
(427, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:17'),
(428, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:20'),
(429, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:01:24'),
(430, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:01:26'),
(431, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:29'),
(432, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:35'),
(433, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:01:56'),
(434, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:02:04'),
(435, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:02:42'),
(436, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:02:50'),
(437, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:02:53'),
(438, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:02:56'),
(439, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:02:59'),
(440, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:03:02'),
(441, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:03:12'),
(442, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:03:17'),
(443, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:03:50'),
(444, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:03:53'),
(445, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:03:57'),
(446, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:04:02'),
(447, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:04:49'),
(448, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:04:53'),
(449, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:04:56'),
(450, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:05:59'),
(451, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:06:04'),
(452, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:06:39'),
(453, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:06:42'),
(454, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:06:44'),
(455, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:07:02'),
(456, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:07:13'),
(457, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:07:15'),
(458, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:07:18'),
(459, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:07:28'),
(460, '12345678765432', 'user@gmail.com', 'hdhsagd', '2023-11-15 11:07:34'),
(461, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:07:36'),
(462, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:26:49'),
(463, '12345678765432', 'user@gmail.com', '', '2023-11-15 11:26:52'),
(464, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:26:56'),
(465, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:27:04'),
(466, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:27:14'),
(467, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:27:50'),
(468, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:27:58'),
(469, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:28:03'),
(470, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:28:05'),
(471, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 11:28:12'),
(472, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:28:17'),
(473, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:48:49'),
(474, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:48:55'),
(475, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:49:03'),
(476, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:49:06'),
(477, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:50:51'),
(478, '12345678765432', 'user@gmail.com', 'fghf', '2023-11-15 11:51:10'),
(479, '12345678765432', 'user@gmail.com', 'ascsc', '2023-11-15 11:55:33'),
(480, '12345678765432', 'user@gmail.com', 'sa', '2023-11-15 11:57:10'),
(481, '12345678765432', 'user@gmail.com', 'sa', '2023-11-15 11:57:12'),
(482, '12345678765432', 'user@gmail.com', 'sa', '2023-11-15 11:57:54'),
(483, '12345678765432', 'user@gmail.com', 'sasadas', '2023-11-15 11:58:02'),
(484, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:27'),
(485, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:30'),
(486, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:33'),
(487, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:34'),
(488, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:36'),
(489, '12345678765432', 'user@gmail.com', 'adasd', '2023-11-15 11:58:38'),
(490, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 12:48:02'),
(491, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 12:48:06'),
(492, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 12:48:49'),
(493, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 12:48:53'),
(494, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:12:55'),
(495, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:12:58'),
(496, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:13:00'),
(497, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:13:17'),
(498, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:13:23'),
(499, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:13:25'),
(500, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:13:32'),
(501, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:13:36'),
(502, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:18:22'),
(503, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:18:23'),
(504, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:18:25'),
(505, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:18:27'),
(506, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:18:36'),
(507, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:19:16'),
(508, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:19:20'),
(509, '12345678765432', 'user@gmail.com', 'bchdsbchj', '2023-11-15 13:19:22'),
(510, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:34:41'),
(511, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:35:03'),
(512, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:35:05'),
(513, '12345678765432', 'user@gmail.com', 'gfh', '2023-11-15 13:37:12'),
(514, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:05'),
(515, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:06'),
(516, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:06'),
(517, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:06'),
(518, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:08'),
(519, '12345678765432', 'user@gmail.com', 'xhajsa', '2023-11-15 13:49:10'),
(520, '12345678765432', 'user@gmail.com', 'vcsah', '2023-11-15 13:49:37'),
(521, '12345678765432', 'user@gmail.com', 'vcsah', '2023-11-15 13:49:39'),
(522, '12345678765432', 'user@gmail.com', 'vcsah', '2023-11-15 13:49:41'),
(523, '12345678765432', 'user@gmail.com', 'vcsah', '2023-11-15 13:49:48'),
(524, '12345678765432', 'user@gmail.com', 'vcsah', '2023-11-15 13:49:50'),
(525, '12345678765432', 'user@gmail.com', 'fvgv', '2023-11-15 13:53:43'),
(526, '12345678765432', 'user@gmail.com', 'fvgv', '2023-11-15 13:53:46'),
(527, '12345678765432', 'user@gmail.com', 'gchg', '2023-11-15 13:56:00'),
(528, '12345678765432', 'user@gmail.com', 'gchg', '2023-11-15 13:56:02'),
(529, '12345678765432', 'user@gmail.com', 'dvcsd', '2023-11-15 13:56:28'),
(530, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:02'),
(531, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:04'),
(532, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:26'),
(533, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:29'),
(534, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:31'),
(535, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:34'),
(536, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:38'),
(537, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:42'),
(538, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:44'),
(539, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:47'),
(540, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:50'),
(541, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:52'),
(542, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:57:55'),
(543, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:57:58'),
(544, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:58:01'),
(545, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:58:05'),
(546, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:58:09'),
(547, 'user@gmail.com', '12345678765432', 'asdsabfhsdbf', '2023-11-15 13:58:11'),
(548, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 13:58:18'),
(549, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:58:23'),
(550, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:58:50'),
(551, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 13:58:52'),
(552, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 13:58:53'),
(553, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 13:58:55'),
(554, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:59:04'),
(555, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:59:05'),
(556, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:59:08'),
(557, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:59:11'),
(558, '12345678765432', 'user@gmail.com', 'hksdabcfuhfk', '2023-11-15 13:59:36'),
(559, '12345678765432', 'user@gmail.com', 'sa', '2023-11-15 14:00:01'),
(560, '12345678765432', 'user@gmail.com', 'scas', '2023-11-15 14:00:22'),
(561, '12345678765432', 'user@gmail.com', 'dsvsd', '2023-11-15 14:00:48'),
(562, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 14:00:57'),
(563, '12345678765432', 'user@gmail.com', 'dsvsd', '2023-11-15 14:01:02'),
(564, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 14:01:12'),
(565, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 14:01:14'),
(566, '12345678765432', 'user@gmail.com', 'dcsdc', '2023-11-15 14:01:51'),
(567, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 14:01:57'),
(568, 'user@gmail.com', '12345678765432', 'asdsabfhsdbfefwefewf', '2023-11-15 14:01:58'),
(569, '12345678765432', 'user@gmail.com', 'dcsdc', '2023-11-15 14:02:05'),
(570, '12345678765432', 'user@gmail.com', 'dcsdc', '2023-11-15 14:02:10'),
(571, 'user@gmail.com', '12345678765432', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:19:25'),
(572, '12345678765432', 'user@gmail.com', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:20:34'),
(573, '12345678765432', 'user@gmail.com', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:20:39'),
(574, '12345678765432', 'user@gmail.com', 'gjhsacsav', '2023-11-15 14:21:41'),
(575, '12345678765432', 'user@gmail.com', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:21:51'),
(576, 'user@gmail.com', '12345678765432', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:28:07'),
(577, 'user@gmail.com', '12345678765432', 'Paragraf 1: Seiring berkembangnya teknologi, dunia menjadi semakin terhubung dan bergerak dengan cepat. Komunikasi yang efisien melintasi batas-batas geografis telah memungkinkan kolaborasi global, mempercepat pertukaran informasi, dan membuka pintu bagi inovasi baru. Internet, sebagai tulang punggung digital, memberikan akses tak terbatas ke pengetahuan, memfasilitasi interaksi sosial, dan memberdayakan individu untuk menciptakan perubahan positif.  Paragraf 2: Di sisi lain, perubahan ini juga menghadirkan tantangan baru, seperti isu privasi online, perang informasi, dan dampak ekonomi digital. Teknologi yang canggih juga memicu perubahan dalam berbagai sektor, termasuk pekerjaan, pendidikan, dan bisnis. Oleh karena itu, penting bagi masyarakat untuk memahami dan mengelola dampak teknologi secara bijaksana agar dapat meraih manfaatnya sambil tetap melindungi nilai-nilai dan kepentingan masyarakat secara umum.', '2023-11-15 14:28:29'),
(578, 'user@gmail.com', '12345678765432', 'schjvbasjcjsahvc', '2023-11-15 14:29:46'),
(579, 'user@gmail.com', '12345678765432', 'schjvbasjcjsahvc', '2023-11-15 14:31:57'),
(580, 'user@gmail.com', '12345678765432', 'hhfjgfvj', '2023-11-15 16:15:58'),
(581, 'user@gmail.com', '12345678765432', 'hhfjgfvj', '2023-11-15 16:16:02'),
(582, 'user@gmail.com', '12345678765432', 'hhfjgfvj', '2023-11-15 16:16:05'),
(583, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 16:16:42'),
(584, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 16:16:44'),
(585, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 16:16:46'),
(586, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 16:16:48'),
(587, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 16:16:50'),
(588, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 22:36:38'),
(589, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 22:36:40'),
(590, 'user@gmail.com', '12345678765432', 'bh kjb', '2023-11-15 22:36:42'),
(591, 'user@gmail.com', '12345678765432', 'ghjh', '2023-11-15 22:55:37'),
(592, '12345678765432', 'user@gmail.com', 'bcjsbcsbc', '2023-11-15 23:15:12'),
(593, '12345678765432', 'user@gmail.com', 'hjb', '2023-11-15 23:59:52'),
(594, '12345678765432', 'user@gmail.com', 'bhjvjvyy', '2023-11-16 00:03:56'),
(595, '12345678765432', 'user@gmail.com', 'hdfkhfhe', '2023-11-16 00:07:19'),
(596, '12345678765432', 'user@gmail.com', 'fvtfvtyfty', '2023-11-16 00:11:57'),
(597, 'user@gmail.com', '12345678765432', 'fuyfufuf', '2023-11-16 00:14:07'),
(598, '12345678765432', 'user@gmail.com', 'vjhvjhvj', '2023-11-16 00:14:22'),
(599, '12345678765432', 'user@gmail.com', 'facdsffsdsf', '2023-11-16 00:15:52'),
(600, '12345678765432', 'user@gmail.com', 'xvasvxas', '2023-11-16 00:17:05'),
(601, '12345678765432', 'user@gmail.com', 'sfcsdfcsdf', '2023-11-16 00:24:27'),
(602, '12345678765432', 'user@gmail.com', 'sfcsdfcsdf', '2023-11-16 00:24:28'),
(603, '12345678765432', 'user@gmail.com', 'sfcsdfcsdf', '2023-11-16 00:26:23'),
(604, '12345678765432', 'user@gmail.com', 'sfcsdfcsdfvgv', '2023-11-16 00:41:01'),
(605, 'jdbsk', '12345678765432', 'vbhvhvbjh', '2023-11-16 01:09:47'),
(606, 'jdbsk', '12345678765432', 'vbhvhvbjh', '2023-11-16 01:09:49'),
(607, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:07'),
(608, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:15'),
(609, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:17'),
(610, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:41'),
(611, 'user@gmail.com', '12345678765432', 'vvjvj', '2023-11-16 01:10:45'),
(612, 'user@gmail.com', '12345678765432', 'vvjvj', '2023-11-16 01:10:47'),
(613, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:49'),
(614, '12345678765432', 'user@gmail.com', 'vhjvj', '2023-11-16 01:10:50'),
(615, '12345678765432', 'user@gmail.com', 'jjjj', '2023-11-16 03:20:37'),
(619, '12345678765432', 'user@gmail.com', 'bdhasbhdj', '2023-11-16 08:11:32'),
(620, 'user@gmail.com', '12345678765432', 'bdwhbehdw', '2023-11-16 08:12:03'),
(621, 'user@gmail.com', '12345678765432', 'cscs', '2023-11-16 08:12:37'),
(622, 'user@gmail.com', '12345678765432', 'cscs', '2023-11-16 08:12:40'),
(623, '12345678765432', 'user@gmail.com', 'sdcfdewdcwf', '2023-11-16 08:13:11'),
(624, '12345678765432', 'user@gmail.com', 'jhfjhvgjh', '2023-11-17 04:18:24'),
(625, 'user@gmail.com', '12345678765432', 'oke', '2023-11-20 01:31:07'),
(626, 'user@gmail.com', '12345678765432', '', '2023-11-20 01:34:28'),
(627, 'user@gmail.com', '12345678765432', 'oke', '2023-11-20 01:36:17'),
(628, 'user@gmail.com', '12345678765432', 'yoi', '2023-11-20 01:36:23'),
(629, 'user@gmail.com', '12345678765432', 'pagii kawan', '2023-11-20 03:02:16'),
(630, '12345678765432', 'user@gmail.com', 'pagii', '2023-11-20 03:03:10'),
(631, 'user@gmail.com', '12345678765432', 'gimana kabarnya', '2023-11-20 03:04:13'),
(632, '12345678765432', 'user@gmail.com', 'baik', '2023-11-20 03:04:25'),
(633, 'user@gmail.com', '12345678765432', 'sehat ya kan', '2023-11-20 03:04:36'),
(634, '12345678765432', 'user@gmail.com', 'sehat bu', '2023-11-20 03:04:47'),
(635, 'user@gmail.com', '12345678765432', 'oke', '2023-11-20 03:05:55'),
(636, '12345678765432', 'user@gmail.com', 'tes', '2023-11-20 03:18:36'),
(637, '12345678765432', 'user@gmail.com', 'jvnsdjv', '2023-11-20 03:18:39'),
(638, '12345678765432', 'user@gmail.com', 'dancok', '2023-11-20 03:18:58');

-- --------------------------------------------------------

--
-- Table structure for table `data_anak`
--

CREATE TABLE `data_anak` (
  `NIK` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_anak` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `usia` varchar(20) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `BBL` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_ibu` char(16) NOT NULL,
  `kd_pos` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_anak`
--

INSERT INTO `data_anak` (`NIK`, `nama_anak`, `tgl_lahir`, `tempat_lahir`, `usia`, `jenis_kelamin`, `BBL`, `id_ibu`, `kd_pos`) VALUES
('0987656789', 'hgj', '2023-08-01', 'jemberk', '3 bln', 'Laki-laki', '9k', '87437', 'kd0004'),
('1234565', 'bayi1', '2023-11-10', 'jember', '0 bln', 'Laki-laki', '2,5kg', '745172451872458', 'kd0002'),
('1234567890', 'galuh', '2023-10-05', 'jember', '1 bln', 'Perempuan', '9kg', '123456789123456', 'kd0001'),
('123456789123456', 'nanang', '2023-07-05', 'jember', '1 bln', 'Laki-laki', '10kg', '123456789123456', 'kd0001'),
('123456789123478', 'gtyuio', '2021-11-04', 'jember', '1 bln', 'Perempuan', '10kg', '532749873252', 'kd0005'),
('3224233333', '5thoke', '2018-11-09', 'jember', '5 th', 'Perempuan', '10kg', '87437', 'kd0004'),
('41217', 'aizat', '2023-01-02', 'tulungagung', '10 bln', 'Laki-laki', '100kg', '627432234', 'kd0003'),
('526536721', 'teskader', '2023-03-01', 'jember', '8 bln', 'Laki-laki', '10kg', '532749873252', 'kd0005'),
('643712561765535', 'fajar', '2023-11-07', 'jember', '1bln', 'Laki-laki', '10kg', '627432234', 'kd0003'),
('734872', 'gdfjvjda', '2022-07-05', 'jember', '1 th', 'Laki-laki', '10kg', '745172451872458', 'kd0002'),
('782743249873249', 'galuh', '2023-10-01', 'jemberk', '1 bln', 'Perempuan', '9kg', '532749873252', 'kd0005'),
('dfwe', '3thoke', '2020-11-09', 'jember', '3 th', 'Laki-laki', '10kg', 't4781240074823', 'kd0003');

-- --------------------------------------------------------

--
-- Table structure for table `data_bidan`
--

CREATE TABLE `data_bidan` (
  `NIP` char(18) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `No_telp` varchar(16) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `status_aktif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_bidan`
--

INSERT INTO `data_bidan` (`NIP`, `Nama`, `Alamat`, `No_telp`, `Email`, `Password`, `foto`, `status_aktif`) VALUES
('0967534554', 'gsafdg', 'dadf', '242121', 'te@gmail.com', '2134', NULL, 'offline'),
('12345678765432', 'eva', 'batokan,ngantru,tulungagung', '13456798765423', 'eva@gmail.com', 'eva123', '655c8f80ada3a.png', 'offline'),
('2341235', 'ef', 'q', 'ew', 'ww', 'w', NULL, 'offline'),
('5465', 'ftfy', 'hvjv', 'gfhh', 'gvhg', 'vgv', NULL, 'offline'),
('57647214', 'yoi', 'agsfjh', '26154624', 'sgfgs', 'vsfajh', NULL, 'offline'),
('61523652167', 'bfmff', 'sfsada', '2374982', 'bsfdhjbf', 'bafsjdhf', NULL, 'offline'),
('6217378632', 'anak', 'dbsvaj', '123', 'acs dbj', 'asc wer', NULL, 'offline'),
('625376', 'yoii', 'hjgb', '256', 'dh', 'fdg', NULL, 'offline'),
('64327423', 'dmsbn', 'adbfn', 'dbaf', 'afbd', 'vfdsah', NULL, 'offline'),
('87482749832', 'jsjfksdfh', 'fsbdafjdfb', '4234324', 'dsfads', 'sdgfsag', NULL, 'online');

-- --------------------------------------------------------

--
-- Table structure for table `data_ibu`
--

CREATE TABLE `data_ibu` (
  `NIK` char(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `suami` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `rt_rw` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `no_telp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kd_pos` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_ibu`
--

INSERT INTO `data_ibu` (`NIK`, `nama_ibu`, `suami`, `rt_rw`, `no_telp`, `kd_pos`) VALUES
('123456789123456', 'ayu', 'budi', '05/04', '123456789234', 'kd0001'),
('532749873252', 'neneng', 'bdvsahbj', '03/02', '329', 'kd0005'),
('627432234', 'bcvzbcx', 'nbczvxmnb', '03/02', 'nmbdfmsa', 'kd0003'),
('745172451872458', 'marni', 'ftft', '7627864', '02/01', 'kd0002'),
('87437', 'angel', 'dbvsajb', '02/01', '289729', 'kd0004'),
('t4781240074823', 'sdab', 'dhsbgkdsa', 'abvfjh', 'wgyfgew', 'kd0003');

-- --------------------------------------------------------

--
-- Table structure for table `data_ibumelahirkan`
--

CREATE TABLE `data_ibumelahirkan` (
  `idlahir` int NOT NULL,
  `nik_ibu` char(16) NOT NULL,
  `nama_bayi` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tgl_meninggalbayi` date DEFAULT NULL,
  `tgl_meninggalibu` date DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `kd_pos` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_ibumelahirkan`
--

INSERT INTO `data_ibumelahirkan` (`idlahir`, `nik_ibu`, `nama_bayi`, `tgl_lahir`, `tgl_meninggalbayi`, `tgl_meninggalibu`, `keterangan`, `kd_pos`) VALUES
(1, '123456789123456', 'gvghv', '2023-11-08', '2023-11-08', '2023-11-08', 'vhgv', 'kd0001'),
(3, '745172451872458', 'nanang', '2023-11-08', NULL, '2023-11-08', NULL, 'kd0002'),
(10, '627432234', 'bascbs', '2023-11-08', NULL, NULL, NULL, 'kd0003'),
(11, '532749873252', 'budiiianto', '2023-11-08', NULL, NULL, NULL, 'kd0005'),
(12, '532749873252', 'nanang', '2023-11-08', NULL, NULL, NULL, 'kd0005'),
(13, 't4781240074823', 'budiiianto', '2023-11-09', NULL, NULL, NULL, 'kd0003');

-- --------------------------------------------------------

--
-- Table structure for table `data_imunisasi`
--

CREATE TABLE `data_imunisasi` (
  `idimunisasi` int NOT NULL,
  `nik_anak` char(16) NOT NULL,
  `tgl_imunisasi` date NOT NULL,
  `imuni_dbr` varchar(50) NOT NULL,
  `plyan_dbr` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_imunisasi`
--

INSERT INTO `data_imunisasi` (`idimunisasi`, `nik_anak`, `tgl_imunisasi`, `imuni_dbr`, `plyan_dbr`) VALUES
(1, '782743249873249', '2023-11-09', 'bn', 'jgf'),
(3, '782743249873249', '2023-11-09', 'op', 'bhvhg'),
(5, '782743249873249', '2023-11-09', 'bn', 'hhhh'),
(6, '782743249873249', '2023-11-08', 'gf', 'yyyyy'),
(8, '123456789123478', '2023-11-09', 'ad', 'mbg'),
(12, '3224233333', '2023-11-07', 'm,', 'hhhh'),
(13, '123456789123456', '2023-11-09', 'op', NULL),
(14, '643712561765535', '2023-10-31', 'ad', NULL),
(15, '3224233333', '2023-11-15', 'op', 'uhuiii'),
(16, '643712561765535', '2023-11-16', 'gf', NULL),
(18, 'dfwe', '2023-11-09', 'gf', 'hhhh'),
(19, 'dfwe', '2023-11-09', 'cv', 'hhhh'),
(20, '3224233333', '2023-11-09', 'gf', 'gfhv'),
(21, 'dfwe', '2023-11-07', 'bn', NULL),
(22, '782743249873249', '2023-11-08', 'cv', NULL),
(23, '0987656789', '2023-11-02', 'ad', NULL);

--
-- Triggers `data_imunisasi`
--
DELIMITER $$
CREATE TRIGGER `ambilvaksin` AFTER INSERT ON `data_imunisasi` FOR EACH ROW BEGIN
UPDATE data_vaksin set data_vaksin.stok= data_vaksin.stok - 1
WHERE kd_vaksin = NEW.imuni_dbr;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `data_kader`
--

CREATE TABLE `data_kader` (
  `id_kader` char(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_kader` varchar(100) NOT NULL,
  `jabatan` text NOT NULL,
  `no_telp` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `bertugas_dipos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `status_aktif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_kader`
--

INSERT INTO `data_kader` (`id_kader`, `nama_kader`, `jabatan`, `no_telp`, `bertugas_dipos`, `email`, `password`, `foto`, `status_aktif`) VALUES
('kdr_0001', 'kader', 'hvjhv', 'gfhg', 'kd0003', 'kader1@gmail.com', 'kader', '655228a353506.jpg', 'offline'),
('kdr0002', 'jdnsjk', 'bhfjsd', '682743', 'kd0001', 'ger', 'user123', NULL, ''),
('kdr0003', 'sa', 'fewf', 'fsa', 'kd0001', 'fsa', 'fsa', NULL, ''),
('kdr0004', 'sad', 'asd', 'ad', 'kd0005', 'ads', 'asd', NULL, ''),
('kdr0005', 'fsdf', 'nsdm av', 'sdv mn', 'kd0004', 'assd', 'dfasf', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `data_penimbangan`
--

CREATE TABLE `data_penimbangan` (
  `idtimbang` int NOT NULL,
  `nik_anak` char(16) NOT NULL,
  `tgl_timbamg` date NOT NULL,
  `hasil_timbang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_penimbangan`
--

INSERT INTO `data_penimbangan` (`idtimbang`, `nik_anak`, `tgl_timbamg`, `hasil_timbang`) VALUES
(1, '782743249873249', '2023-11-08', '10kg'),
(3, 'dfwe', '2023-11-08', '12kg'),
(4, '3224233333', '2023-11-08', '135kg'),
(6, '123456789123456', '2023-11-09', '120kg'),
(18, '643712561765535', '2023-11-07', '10kg'),
(19, 'dfwe', '2023-11-07', '108kg'),
(20, '123456789123478', '2023-11-08', '10kg'),
(23, '3224233333', '2023-11-08', '15kg'),
(24, '643712561765535', '2023-11-09', '20kg'),
(25, '643712561765535', '2023-11-09', '20kg'),
(26, '3224233333', '2023-11-09', '21kg'),
(27, '0987656789', '2023-11-01', '14kg'),
(28, '782743249873249', '2023-11-09', '20kg'),
(29, '3224233333', '2023-11-10', '2,5kg'),
(30, '1234567890', '2023-11-22', '9kg'),
(31, '3224233333', '2023-11-10', '23kg'),
(32, '1234567890', '2023-11-10', '3kg'),
(33, '3224233333', '2023-11-10', '5,5kg');

-- --------------------------------------------------------

--
-- Table structure for table `data_posposyandu`
--

CREATE TABLE `data_posposyandu` (
  `kd_pos` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_posyandu` varchar(100) NOT NULL,
  `RT_RW` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lokasi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_posposyandu`
--

INSERT INTO `data_posposyandu` (`kd_pos`, `nama_posyandu`, `RT_RW`, `lokasi`) VALUES
('kd0001', 'Posyandu 1', 'sdfghj', 'bapaknfj'),
('kd0002', 'Posyandu 2', 'djsnf', 'bsfadb'),
('kd0003', 'Posyandu 3', '3/5', 'rumah bapak'),
('kd0004', 'Posyandu 4', '3/5', 'rumah bapak'),
('kd0005', 'Posyandu 5', '3/5', 'rumah bapak'),
('kd0006', 'Posyandu 6', '3/5', 'rumah bapak');

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE `data_user` (
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status_aktif` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`email`, `password`, `nama`, `foto`, `status_aktif`) VALUES
('ajskdj@gmail.com', '12345', 'hasdh', NULL, 'offline'),
('dshgfjhg@gmail.com', '3214', 'ndhfskh', NULL, 'offline'),
('ggdsagg@gmail.com', 'gfag', 'gdhajsgfdj', NULL, 'offline'),
('hay@gmail.com', 'hay123', 'hay', NULL, 'offline'),
('jabdfk', 'hhhh', 'jjj', 'dfg', 'fh'),
('jdbsk', '23442rwe', 'fbsfbhjs', 'tentangposyandu1.jpg', 'offline'),
('oke@gmail.com', 'oke123', 'okeee', NULL, 'offline'),
('okelah@gmail.com', 'oke123', 'okee', NULL, 'offline'),
('u@gmail.com', '12345', 'wefew', NULL, 'offline'),
('user@gmail.com', 'user123', 'aiz', '655ad08a85507.jpg', 'offline'),
('yahya@gmail.com', '123', 'yahya', NULL, 'offline'),
('yoi@gmail.com', 'yoi123', 'okeyoi', NULL, 'offline'),
('zeettlaass@gmail.com', 'aiz123456', 'hendarkum', NULL, 'offline');

-- --------------------------------------------------------

--
-- Table structure for table `data_vaksin`
--

CREATE TABLE `data_vaksin` (
  `kd_vaksin` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nama_vaksin` varchar(20) NOT NULL,
  `stok` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `data_vaksin`
--

INSERT INTO `data_vaksin` (`kd_vaksin`, `nama_vaksin`, `stok`) VALUES
('ad', 'vaksin1', 15),
('bn', 'vaksin2', 14),
('cv', 'vaksin3', 1),
('gf', 'vaksin4', 1),
('m,', 'vaksin5', 8),
('op', 'vaksin6', 1),
('p', 'vaksin7', 1),
('vb', 'vaksin8', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `id_ibu` (`id_ibu`),
  ADD KEY `kd_pos` (`kd_pos`);

--
-- Indexes for table `data_bidan`
--
ALTER TABLE `data_bidan`
  ADD UNIQUE KEY `NIP` (`NIP`);

--
-- Indexes for table `data_ibu`
--
ALTER TABLE `data_ibu`
  ADD UNIQUE KEY `NIK` (`NIK`),
  ADD KEY `kd_pos` (`kd_pos`);

--
-- Indexes for table `data_ibumelahirkan`
--
ALTER TABLE `data_ibumelahirkan`
  ADD PRIMARY KEY (`idlahir`),
  ADD KEY `nik_ibu` (`nik_ibu`),
  ADD KEY `kd_pos` (`kd_pos`);

--
-- Indexes for table `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  ADD PRIMARY KEY (`idimunisasi`),
  ADD KEY `nik_anak` (`nik_anak`),
  ADD KEY `imuni_dbr` (`imuni_dbr`);

--
-- Indexes for table `data_kader`
--
ALTER TABLE `data_kader`
  ADD UNIQUE KEY `id_kader` (`id_kader`),
  ADD KEY `bertugas_dipos` (`bertugas_dipos`);

--
-- Indexes for table `data_penimbangan`
--
ALTER TABLE `data_penimbangan`
  ADD PRIMARY KEY (`idtimbang`),
  ADD KEY `nik_anak` (`nik_anak`);

--
-- Indexes for table `data_posposyandu`
--
ALTER TABLE `data_posposyandu`
  ADD UNIQUE KEY `kd_pos` (`kd_pos`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD UNIQUE KEY `Email` (`email`);

--
-- Indexes for table `data_vaksin`
--
ALTER TABLE `data_vaksin`
  ADD UNIQUE KEY `kd_vaksin` (`kd_vaksin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=639;

--
-- AUTO_INCREMENT for table `data_ibumelahirkan`
--
ALTER TABLE `data_ibumelahirkan`
  MODIFY `idlahir` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  MODIFY `idimunisasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_penimbangan`
--
ALTER TABLE `data_penimbangan`
  MODIFY `idtimbang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_anak`
--
ALTER TABLE `data_anak`
  ADD CONSTRAINT `data_anak_ibfk_1` FOREIGN KEY (`id_ibu`) REFERENCES `data_ibu` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_anak_ibfk_2` FOREIGN KEY (`kd_pos`) REFERENCES `data_posposyandu` (`kd_pos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_ibu`
--
ALTER TABLE `data_ibu`
  ADD CONSTRAINT `data_ibu_ibfk_1` FOREIGN KEY (`kd_pos`) REFERENCES `data_posposyandu` (`kd_pos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_ibumelahirkan`
--
ALTER TABLE `data_ibumelahirkan`
  ADD CONSTRAINT `data_ibumelahirkan_ibfk_3` FOREIGN KEY (`nik_ibu`) REFERENCES `data_ibu` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_ibumelahirkan_ibfk_4` FOREIGN KEY (`kd_pos`) REFERENCES `data_posposyandu` (`kd_pos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_imunisasi`
--
ALTER TABLE `data_imunisasi`
  ADD CONSTRAINT `data_imunisasi_ibfk_3` FOREIGN KEY (`imuni_dbr`) REFERENCES `data_vaksin` (`kd_vaksin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_imunisasi_ibfk_4` FOREIGN KEY (`nik_anak`) REFERENCES `data_anak` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_kader`
--
ALTER TABLE `data_kader`
  ADD CONSTRAINT `data_kader_ibfk_1` FOREIGN KEY (`bertugas_dipos`) REFERENCES `data_posposyandu` (`kd_pos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_penimbangan`
--
ALTER TABLE `data_penimbangan`
  ADD CONSTRAINT `data_penimbangan_ibfk_3` FOREIGN KEY (`nik_anak`) REFERENCES `data_anak` (`NIK`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
