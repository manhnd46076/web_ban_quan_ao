-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 16, 2024 at 03:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duan1`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_binh_luan` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_binh_luan` timestamp NOT NULL DEFAULT current_timestamp(),
  `ma_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`ma_binh_luan`, `ma_nguoi_dung`, `noi_dung`, `ngay_binh_luan`, `ma_san_pham`) VALUES
(18, 10, 'xấu quá vậy', '2024-04-16 01:09:16', 29),
(19, 3, 'Ôi trời ơi', '2024-04-16 01:11:25', 30),
(20, 3, 'Ôi trời ơi', '2024-04-16 01:11:58', 33),
(21, 3, 'Tâm hồn đẹp quá ????????', '2024-04-16 01:13:04', 35),
(22, 3, 'Cho mình địa chỉ mình xem trực tiếp được không ', '2024-04-16 01:14:04', 35);

-- --------------------------------------------------------

--
-- Table structure for table `bo_suu_tap_san_pham`
--

CREATE TABLE `bo_suu_tap_san_pham` (
  `ma_bo_suu_tap` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL,
  `anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bo_suu_tap_san_pham`
--

INSERT INTO `bo_suu_tap_san_pham` (`ma_bo_suu_tap`, `ma_san_pham`, `anh`) VALUES
(20, 15, 'collection/vngoods_469052_sub7.avif'),
(21, 15, 'collection/vngoods_469052_sub29.avif'),
(22, 16, 'collection/goods_467845_sub14.avif'),
(23, 16, 'collection/goods_467845_sub19.avif'),
(25, 16, 'collection/vngoods_467845_sub7.avif'),
(26, 16, 'collection/vngoods_467845_sub9.avif'),
(27, 18, 'collection/vngoods_69_468879.avif'),
(28, 18, 'collection/vngoods_468879_sub1.avif'),
(29, 18, 'collection/vngoods_468879_sub2.avif'),
(33, 19, 'collection/vngoods_465195_sub7.avif'),
(34, 20, 'collection/goods_467047_sub23.avif'),
(35, 20, 'collection/vngoods_31_467047.avif'),
(36, 20, 'collection/vngoods_467047_sub7.avif'),
(37, 21, 'collection/goods_470937_sub11.avif'),
(38, 21, 'collection/goods_470937_sub14.avif'),
(39, 21, 'collection/vngoods_51_470937.avif'),
(41, 22, 'collection/goods_450606_sub14.avif'),
(42, 22, 'collection/vngoods_450606_sub9.avif'),
(43, 23, 'collection/goods_465763_sub14.avif'),
(44, 23, 'collection/vngoods_03_465763.avif'),
(62, 24, 'collection/ugc_stylehint_uq_sg_photo_240327_1301362_c-600-800.png'),
(63, 24, 'collection/ugc_stylehint_uq_th_photo_240322_1298015_c-600-800.png'),
(64, 25, 'collection/goods_470722_sub17.avif'),
(65, 25, 'collection/goods_470722_sub23.avif'),
(67, 26, 'collection/240403083046_official_styling_120019004_c-600-800.png'),
(68, 26, 'collection/goods_468874001_sub14.avif'),
(69, 26, 'collection/goods_468874001_sub18.avif'),
(70, 27, 'collection/goods_465882_sub14.avif'),
(71, 27, 'collection/goods_465882_sub19.avif'),
(72, 27, 'collection/vngoods_465882_sub7.avif'),
(73, 27, 'collection/vngoods_465882_sub9.avif'),
(74, 28, 'collection/goods_471024_sub13.avif'),
(75, 28, 'collection/goods_471024_sub14.avif'),
(76, 28, 'collection/goods_471024_sub15.avif'),
(77, 30, 'collection/vngoods_467544_sub1.avif'),
(78, 31, 'collection/nau.avif'),
(79, 31, 'collection/vngoods_464823_sub1.avif'),
(80, 32, 'collection/den.avif'),
(81, 33, 'collection/1.avif'),
(82, 33, 'collection/2.avif'),
(84, 34, 'collection/3.avif'),
(85, 34, 'collection/4.avif'),
(86, 35, 'collection/2.avif'),
(87, 35, 'collection/den.avif'),
(88, 35, 'collection/hong.avif'),
(89, 35, 'collection/hong1.avif'),
(90, 35, 'collection/nau.avif'),
(91, 36, 'collection/d.avif'),
(92, 36, 'collection/nu.avif'),
(93, 36, 'collection/trangnu.avif'),
(94, 36, 'collection/x.avif'),
(95, 37, 'collection/2.avif'),
(96, 37, 'collection/ugc_stylehint_uq_sg_photo_240112_1250219_c-600-800.png'),
(97, 37, 'collection/ugc_stylehint_uq_th_photo_240209_1268922_c-600-800.png'),
(98, 37, 'collection/ugc_stylehint_uq_vn_photo_240110_1248656_c-600-800.png'),
(99, 37, 'collection/ugc_stylehint_uq_vn_photo_240122_1255933_c-600-800.png'),
(100, 37, 'collection/ugc_stylehint_uq_vn_photo_240407_1310481_c-600-800.png'),
(101, 38, 'collection/d.png'),
(102, 38, 'collection/h.png'),
(103, 38, 'collection/ugc_stylehint_uq_th_photo_240310_1289422_c-600-800.png'),
(104, 38, 'collection/x.png'),
(109, 40, 'collection/24021501111_official_styling_120018574_c-600-800.png'),
(110, 40, 'collection/24021501111_official_styling_120018579_c-600-800.png'),
(111, 40, 'collection/vngoods_21_468647.avif'),
(112, 40, 'collection/x.avif'),
(113, 41, 'collection/goods_468485_sub23.avif'),
(114, 41, 'collection/vngoods_468485_sub29.avif'),
(116, 39, 'collection/dm.avif'),
(117, 39, 'collection/h.png'),
(118, 39, 'collection/m.avif'),
(120, 39, 'collection/t.png'),
(121, 39, 'collection/x.png'),
(122, 42, 'collection/vngoods_09_464310.avif'),
(123, 29, 'collection/goods_467515_sub12.avif'),
(124, 29, 'collection/vngoods_56_467515.avif'),
(125, 29, 'collection/vngoods_467515_sub1.avif'),
(126, 29, 'collection/vngoods_467515_sub2.avif'),
(127, 29, 'collection/vngoods_467515_sub7.avif'),
(128, 43, 'collection/2.avif'),
(129, 43, 'collection/24013108461_official_styling_120018557_c-600-800.png'),
(131, 43, 'collection/m1x.avif'),
(132, 44, 'collection/goods_464334_sub14.avif'),
(133, 44, 'collection/goods_464334_sub17.avif'),
(134, 44, 'collection/goods_464334_sub18.avif'),
(135, 44, 'collection/goods_464334_sub23.avif'),
(136, 45, 'collection/m2.avif'),
(137, 45, 'collection/xmn.avif'),
(138, 45, 'collection/xn.avif'),
(139, 45, 'collection/xn1.avif');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_binh_luan`
--

CREATE TABLE `chi_tiet_binh_luan` (
  `ma_chi_tiet_binh_luan` int(11) NOT NULL,
  `ma_binh_luan` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) NOT NULL,
  `noi_dung` varchar(255) NOT NULL,
  `ngay_binh_luan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_binh_luan`
--

INSERT INTO `chi_tiet_binh_luan` (`ma_chi_tiet_binh_luan`, `ma_binh_luan`, `ma_nguoi_dung`, `noi_dung`, `ngay_binh_luan`) VALUES
(17, 18, 3, 'ngôn từ mất kiểm soát', '2024-04-16 01:15:49'),
(18, 18, 3, 'tao block mày nha mày', '2024-04-16 01:15:58');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_cong`
--

CREATE TABLE `chi_tiet_cong` (
  `ma_chi_tiet_cong` int(11) NOT NULL,
  `ten_chi_tiet_cong` varchar(255) NOT NULL,
  `ma_cong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_danh_muc`
--

CREATE TABLE `chi_tiet_danh_muc` (
  `ma_danh_muc` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_danh_muc`
--

INSERT INTO `chi_tiet_danh_muc` (`ma_danh_muc`, `ma_san_pham`) VALUES
(2, 25),
(1, 15),
(3, 15),
(1, 16),
(3, 16),
(1, 17),
(3, 17),
(1, 19),
(3, 19),
(1, 18),
(3, 18),
(5, 18),
(7, 18),
(5, 20),
(7, 20),
(6, 21),
(7, 21),
(6, 22),
(7, 22),
(5, 23),
(7, 23),
(5, 24),
(7, 24),
(7, 26),
(9, 26),
(7, 27),
(9, 27),
(2, 28),
(3, 28),
(1, 30),
(5, 30),
(2, 31),
(6, 31),
(1, 32),
(3, 32),
(5, 33),
(7, 33),
(3, 36),
(7, 36),
(6, 37),
(2, 38),
(6, 38),
(8, 35),
(10, 34),
(4, 41),
(8, 39),
(4, 42),
(1, 29),
(3, 29),
(5, 29),
(7, 29),
(8, 44),
(10, 44),
(10, 40),
(1, 45),
(4, 45),
(5, 45),
(8, 45),
(1, 43);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hang`
--

CREATE TABLE `chi_tiet_don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `ma_chi_tiet_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_don_hang`
--

INSERT INTO `chi_tiet_don_hang` (`id_don_hang`, `ma_chi_tiet_san_pham`, `so_luong`) VALUES
(26, 18, 1),
(27, 19, 1),
(28, 26, 1),
(29, 24, 1),
(30, 22, 1),
(31, 31, 1),
(32, 20, 1),
(33, 33, 1),
(34, 30, 1),
(35, 162, 1),
(36, 167, 1),
(37, 83, 1),
(38, 23, 1),
(39, 19, 1),
(40, 16, 1),
(41, 22, 1),
(42, 40, 1),
(43, 161, 1),
(44, 70, 1),
(45, 159, 1),
(46, 23, 1),
(47, 20, 1),
(48, 59, 1),
(49, 18, 1),
(50, 16, 1),
(51, 17, 1),
(52, 25, 1),
(53, 28, 1),
(54, 22, 1),
(55, 58, 1),
(56, 53, 1),
(57, 160, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hang`
--

CREATE TABLE `chi_tiet_gio_hang` (
  `ma_gio_hang` int(11) DEFAULT NULL,
  `ma_chi_tiet_san_pham` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_gio_hang`
--

INSERT INTO `chi_tiet_gio_hang` (`ma_gio_hang`, `ma_chi_tiet_san_pham`, `so_luong`) VALUES
(4, 41, 1),
(4, 24, 1),
(4, 160, 1),
(4, 53, 1),
(4, 161, 1),
(4, 163, 1),
(4, 18, 1),
(4, 104, 1),
(4, 164, 1),
(4, 21, 1),
(4, 44, 1),
(4, 48, 1),
(4, 45, 1),
(4, 162, 1),
(4, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_san_pham`
--

CREATE TABLE `chi_tiet_san_pham` (
  `ma_chi_tiet_san_pham` int(11) NOT NULL,
  `ma_san_pham` int(11) NOT NULL,
  `ma_kich_thuoc` int(11) DEFAULT NULL,
  `ma_mau_sac` int(11) DEFAULT NULL,
  `gia_bien_dong` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `anh_chi_tiet` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chi_tiet_san_pham`
--

INSERT INTO `chi_tiet_san_pham` (`ma_chi_tiet_san_pham`, `ma_san_pham`, `ma_kich_thuoc`, `ma_mau_sac`, `gia_bien_dong`, `so_luong`, `anh_chi_tiet`) VALUES
(16, 15, NULL, NULL, NULL, NULL, NULL),
(17, 16, NULL, NULL, NULL, NULL, NULL),
(18, 17, NULL, NULL, NULL, NULL, NULL),
(19, 18, NULL, NULL, NULL, NULL, NULL),
(20, 19, NULL, NULL, NULL, NULL, NULL),
(21, 20, NULL, NULL, NULL, NULL, NULL),
(22, 21, NULL, NULL, NULL, NULL, NULL),
(23, 22, NULL, NULL, NULL, NULL, NULL),
(24, 23, NULL, NULL, NULL, NULL, NULL),
(25, 24, NULL, NULL, NULL, NULL, NULL),
(26, 25, NULL, NULL, NULL, NULL, NULL),
(27, 26, NULL, NULL, NULL, NULL, NULL),
(28, 27, NULL, NULL, NULL, NULL, NULL),
(29, 28, NULL, NULL, NULL, NULL, NULL),
(30, 29, 1, 3, 20000, 19, 'detail_product/vngoods_06_467039.avif'),
(31, 29, 1, 5, 0, 19, 'detail_product/vngoods_467039_sub1.avif'),
(32, 29, 2, 3, 20000, 10, 'detail_product/vngoods_06_467039.avif'),
(33, 29, 2, 5, 55000, 9, 'detail_product/vngoods_467039_sub1.avif'),
(34, 29, 3, 3, 20000, 10, 'detail_product/vngoods_06_467039.avif'),
(35, 29, 3, 5, 10000, 10, 'detail_product/vngoods_467039_sub1.avif'),
(38, 30, 2, 1, 10000, 6, 'detail_product/vngoods_02_467544.avif'),
(39, 30, 2, 2, 15000, 10, 'detail_product/vngoods_09_467544.avif'),
(40, 30, 3, 1, 0, 9, 'detail_product/vngoods_467544_sub1.avif'),
(41, 30, 3, 2, 10000, 10, 'detail_product/vngoods_09_467544.avif'),
(42, 30, 4, 1, 10000, 10, 'detail_product/vngoods_02_467544.avif'),
(43, 30, 4, 2, 0, 8, 'detail_product/vngoods_09_467544.avif'),
(44, 31, 1, 2, 10000, 10, 'detail_product/den.avif'),
(45, 31, 1, 4, 10000, 7, 'detail_product/nau.avif'),
(46, 31, 1, 5, 0, 10, 'detail_product/vngoods_65_464823.avif'),
(47, 31, 2, 2, 10000, 10, 'detail_product/den.avif'),
(48, 31, 2, 4, 20000, 10, 'detail_product/nau.avif'),
(49, 31, 2, 5, 10000, 10, 'detail_product/vngoods_65_464823.avif'),
(50, 31, 3, 2, 10000, 12, 'detail_product/den.avif'),
(51, 31, 3, 4, 10000, 10, 'detail_product/nau.avif'),
(52, 31, 3, 5, 10000, 10, 'detail_product/vngoods_65_464823.avif'),
(53, 32, 2, 2, 10000, 9, 'detail_product/xam.avif'),
(54, 32, 2, 3, 10000, 3, 'detail_product/den.avif'),
(55, 32, 3, 2, 0, 10, 'detail_product/xam.avif'),
(56, 32, 3, 3, 0, 10, 'detail_product/den.avif'),
(57, 32, 4, 2, 30000, 10, 'detail_product/xam.avif'),
(58, 32, 4, 3, 10000, 9, 'detail_product/den.avif'),
(59, 33, 2, 1, 10000, 9, 'detail_product/240411083051_official_styling_120019124_c-600-800.png'),
(60, 33, 2, 2, 0, 7, 'detail_product/240322073033_official_styling_120018870_c-600-800.png'),
(61, 33, 2, 5, 10000, 10, 'detail_product/240322073034_official_styling_120018883_c-600-800.png'),
(62, 33, 3, 1, 10000, 10, 'detail_product/240411083051_official_styling_120019124_c-600-800.png'),
(63, 33, 3, 2, 10000, 10, 'detail_product/240322073033_official_styling_120018870_c-600-800.png'),
(64, 33, 3, 5, 10000, 10, 'detail_product/240322073034_official_styling_120018883_c-600-800.png'),
(65, 33, 4, 1, 0, 12, 'detail_product/240411083051_official_styling_120019124_c-600-800.png'),
(66, 33, 4, 2, 10000, 10, 'detail_product/240322073033_official_styling_120018870_c-600-800.png'),
(67, 33, 4, 5, 10000, 10, 'detail_product/240322073034_official_styling_120018883_c-600-800.png'),
(68, 34, 2, 5, 10000, 10, 'detail_product/5.avif'),
(69, 34, 2, 6, 0, 10, 'detail_product/1.avif'),
(70, 34, 3, 5, 10000, 6, 'detail_product/5.avif'),
(71, 34, 3, 6, 10000, 10, 'detail_product/1.avif'),
(72, 34, 4, 5, 0, 10, 'detail_product/5.avif'),
(73, 34, 4, 6, 10000, 10, 'detail_product/1.avif'),
(74, 35, 2, 1, 10000, 10, 'detail_product/trang.avif'),
(75, 35, 2, 2, 0, 10, 'detail_product/den.avif'),
(76, 35, 2, 4, 10000, 12, 'detail_product/nau.avif'),
(77, 35, 3, 1, 20000, 7, 'detail_product/trang.avif'),
(78, 35, 3, 2, 10000, 10, 'detail_product/den.avif'),
(79, 35, 3, 4, 15000, 10, 'detail_product/nau.avif'),
(80, 35, 4, 1, 10000, 10, 'detail_product/trang.avif'),
(81, 35, 4, 2, 0, 6, 'detail_product/den.avif'),
(82, 35, 4, 4, 10000, 10, 'detail_product/nau.avif'),
(83, 36, 2, 1, 10000, 8, 'detail_product/trang.avif'),
(84, 36, 2, 2, 0, 10, 'detail_product/d.avif'),
(85, 36, 2, 5, 10000, 12, 'detail_product/x.avif'),
(86, 36, 3, 1, 10000, 7, 'detail_product/trangnu.avif'),
(87, 36, 3, 2, 10000, 10, 'detail_product/d.avif'),
(88, 36, 3, 5, 0, 10, 'detail_product/x.avif'),
(89, 36, 4, 1, 10000, 10, 'detail_product/trangnu.avif'),
(90, 36, 4, 2, 10000, 6, 'detail_product/d.avif'),
(91, 36, 4, 5, 10000, 10, 'detail_product/x.avif'),
(92, 37, 2, 1, 10000, 9, 'detail_product/ugc_stylehint_uq_th_photo_240209_1268922_c-600-800.png'),
(93, 37, 2, 2, 20000, 10, 'detail_product/ugc_stylehint_uq_sg_photo_240112_1250219_c-600-800.png'),
(94, 37, 2, 4, 10000, 12, 'detail_product/ugc_stylehint_uq_vn_photo_240110_1248656_c-600-800.png'),
(95, 37, 2, 6, 10000, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240407_1310481_c-600-800.png'),
(96, 37, 3, 1, 10000, 7, 'detail_product/2.avif'),
(97, 37, 3, 2, 0, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240122_1255933_c-600-800.png'),
(98, 37, 3, 4, 10000, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240110_1248656_c-600-800.png'),
(99, 37, 3, 6, 10000, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240407_1310481_c-600-800.png'),
(100, 37, 4, 1, 0, 10, 'detail_product/2.avif'),
(101, 37, 4, 2, 10000, 6, 'detail_product/ugc_stylehint_uq_sg_photo_240112_1250219_c-600-800.png'),
(102, 37, 4, 4, 10000, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240110_1248656_c-600-800.png'),
(103, 37, 4, 6, 15000, 10, 'detail_product/ugc_stylehint_uq_vn_photo_240407_1310481_c-600-800.png'),
(104, 38, 2, 1, 10000, 9, 'detail_product/t.png'),
(105, 38, 2, 2, 10000, 10, 'detail_product/d.png'),
(106, 38, 2, 5, 0, 12, 'detail_product/ugc_stylehint_uq_th_photo_240310_1289422_c-600-800.png'),
(107, 38, 2, 6, 10000, 10, 'detail_product/h.png'),
(108, 38, 3, 1, 10000, 4, 'detail_product/t.png'),
(109, 38, 3, 2, 0, 10, 'detail_product/d.png'),
(110, 38, 3, 5, 10000, 10, 'detail_product/x.png'),
(111, 38, 3, 6, 10000, 10, 'detail_product/h.png'),
(112, 38, 4, 1, 15000, 10, 'detail_product/t.png'),
(113, 38, 4, 2, 10000, 6, 'detail_product/d.png'),
(114, 38, 4, 5, 20000, 10, 'detail_product/ugc_stylehint_uq_th_photo_240310_1289422_c-600-800.png'),
(115, 38, 4, 6, 10000, 10, 'detail_product/h.png'),
(116, 39, 1, 1, 10000, 9, 'detail_product/t.png'),
(117, 39, 1, 3, 10000, 10, 'detail_product/x.avif'),
(118, 39, 2, 1, 0, 4, 'detail_product/t.png'),
(119, 39, 2, 3, 10000, 10, 'detail_product/x.avif'),
(120, 39, 3, 1, 10000, 10, 'detail_product/t.png'),
(121, 39, 3, 3, 15000, 6, 'detail_product/x.avif'),
(122, 40, 1, 4, 10000, 9, 'detail_product/24021501111_official_styling_120018573_c-600-800.png'),
(123, 40, 1, 5, 10000, 10, 'detail_product/x.avif'),
(124, 40, 1, 6, 0, 10, 'detail_product/24021501111_official_styling_120018579_c-600-800.png'),
(125, 40, 2, 4, 10000, 4, 'detail_product/24021501111_official_styling_120018573_c-600-800.png'),
(126, 40, 2, 5, 10000, 6, 'detail_product/x.avif'),
(127, 40, 2, 6, 10000, 10, 'detail_product/24021501111_official_styling_120018579_c-600-800.png'),
(128, 40, 3, 4, 20000, 10, 'detail_product/24021501111_official_styling_120018573_c-600-800.png'),
(129, 40, 3, 5, 10000, 12, 'detail_product/x.avif'),
(130, 40, 3, 6, 10000, 10, 'detail_product/24021501111_official_styling_120018579_c-600-800.png'),
(131, 40, 4, 4, 0, 10, 'detail_product/24021501111_official_styling_120018573_c-600-800.png'),
(132, 40, 4, 5, 10000, 10, 'detail_product/x.avif'),
(133, 40, 4, 6, 0, 10, 'detail_product/24021501111_official_styling_120018579_c-600-800.png'),
(134, 41, NULL, NULL, NULL, NULL, NULL),
(141, 39, 2, 6, 10000, 12, 'detail_product/h.png'),
(142, 39, 3, 2, 0, 10, 'detail_product/x.png'),
(143, 42, 1, 1, 10000, 8, 'detail_product/t.avif'),
(144, 42, 2, 1, 0, 4, 'detail_product/t.avif'),
(145, 42, 3, 1, 10000, 10, 'detail_product/t.avif'),
(146, 42, 1, 2, 0, 10, 'detail_product/vngoods_09_464310.avif'),
(147, 42, 2, 2, 10000, 10, 'detail_product/vngoods_09_464310.avif'),
(148, 42, 3, 2, 10000, 6, 'detail_product/vngoods_09_464310.avif'),
(149, 42, 4, 2, 20000, 12, 'detail_product/vngoods_09_464310.avif'),
(150, 43, 2, 2, 10000, 8, 'detail_product/240307063125_official_styling_120018795_c-600-800.png'),
(151, 43, 2, 3, 0, 10, 'detail_product/m.avif'),
(152, 43, 2, 5, 10000, 12, 'detail_product/24013108461_official_styling_120018557_c-600-800.png'),
(153, 43, 3, 2, 0, 4, 'detail_product/240307063125_official_styling_120018795_c-600-800.png'),
(154, 43, 3, 3, 10000, 10, 'detail_product/m.avif'),
(155, 43, 3, 5, 10000, 10, 'detail_product/24013108461_official_styling_120018557_c-600-800.png'),
(156, 43, 4, 2, 0, 8, 'detail_product/240307063125_official_styling_120018795_c-600-800.png'),
(157, 43, 4, 3, 0, 6, 'detail_product/m.avif'),
(158, 43, 4, 5, 10000, 10, 'detail_product/24013108461_official_styling_120018557_c-600-800.png'),
(159, 44, NULL, NULL, NULL, NULL, NULL),
(160, 45, 1, 1, 0, 7, 'detail_product/x.avif'),
(161, 45, 1, 3, 10000, 9, 'detail_product/xmn.avif'),
(162, 45, 2, 1, 0, 3, 'detail_product/x.avif'),
(163, 45, 2, 3, 10000, 6, 'detail_product/xn.avif'),
(164, 45, 3, 1, 0, 8, 'detail_product/x.avif'),
(165, 45, 3, 3, 20000, 12, 'detail_product/xn1.avif'),
(166, 45, 4, 1, 10000, 10, 'detail_product/x.avif'),
(167, 45, 4, 3, 30000, 9, 'detail_product/xmn.avif');

-- --------------------------------------------------------

--
-- Table structure for table `cong`
--

CREATE TABLE `cong` (
  `ma_cong` int(11) NOT NULL,
  `ten_cong` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_danh_muc` int(11) NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `ma_loai` int(11) NOT NULL,
  `trang_thai` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`ma_danh_muc`, `ten_danh_muc`, `ma_loai`, `trang_thai`) VALUES
(1, 'Áo', 1, 1),
(2, 'Quần', 1, 1),
(3, 'Đồ mặc ngoài', 1, 1),
(4, 'Đồ mặc trong', 1, 1),
(5, 'Áo', 2, 1),
(6, 'Quần', 2, 1),
(7, 'Đồ mặc ngoài', 2, 1),
(8, 'Đồ mặc trong', 2, 1),
(9, 'Đầm - chân váy', 2, 1),
(10, 'Đồ mặc nhà', 2, 1),
(13, 'Danh muc cu', 1, 1),
(14, 'Danh muc cu', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `id_don_hang` int(11) NOT NULL,
  `ma_don_hang` varchar(255) DEFAULT NULL,
  `ma_nguoi_dung` int(11) DEFAULT NULL,
  `ho_va_ten` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(255) NOT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `ngay_dat` timestamp NULL DEFAULT NULL,
  `ngay_thanh_toan` timestamp NULL DEFAULT NULL,
  `ma_phuong_thuc` int(11) DEFAULT NULL,
  `ma_trang_thai` int(11) DEFAULT NULL,
  `ma_tinh_trang` int(11) DEFAULT NULL,
  `tong_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `don_hang`
--

INSERT INTO `don_hang` (`id_don_hang`, `ma_don_hang`, `ma_nguoi_dung`, `ho_va_ten`, `so_dien_thoai`, `dia_chi`, `ngay_dat`, `ngay_thanh_toan`, `ma_phuong_thuc`, `ma_trang_thai`, `ma_tinh_trang`, `tong_tien`) VALUES
(26, 'AS212289', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:08', '2024-04-15 00:31:59', 1, 2, 4, 489000),
(27, 'YZ168563', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:17', '2024-04-15 00:32:00', 1, 2, 4, 391000),
(28, 'YN169033', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:26', '2024-04-16 00:32:00', 1, 2, 4, 489000),
(29, 'IM656340', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:34', '2024-04-14 00:32:02', 1, 2, 4, 244000),
(30, 'GY781905', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:42', '2024-04-14 00:32:02', 1, 2, 4, 784000),
(31, 'LJ399153', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:28:51', '2024-04-13 00:32:04', 1, 2, 4, 489000),
(32, 'HP224704', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:01', '2024-04-15 00:32:05', 1, 2, 4, 489000),
(33, 'UQ560974', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:12', '2024-04-12 00:32:07', 1, 2, 4, 1029000),
(34, 'YA917577', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:20', '2024-04-11 00:32:08', 1, 2, 4, 509000),
(35, 'IB575371', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:27', '2024-04-10 00:32:09', 1, 2, 4, 244000),
(36, 'NB827491', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:35', '2024-04-12 12:32:11', 1, 2, 4, 274000),
(37, 'YG311413', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:41', '2024-04-15 00:32:12', 1, 2, 4, 401000),
(38, 'GA394457', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:29:50', '2024-04-12 00:32:13', 1, 2, 4, 784000),
(39, 'MS979541', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:13', '2024-04-16 00:35:17', 1, 2, 4, 391000),
(40, 'WC773882', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:23', '2024-04-16 00:35:18', 1, 2, 4, 489000),
(41, 'ZB258969', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:31', '2024-04-12 00:35:19', 1, 2, 4, 784000),
(42, 'XX454519', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:38', '2024-04-12 00:35:20', 1, 2, 4, 391000),
(43, 'VW146557', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:45', '2024-04-12 00:35:20', 1, 2, 4, 254000),
(44, 'JC261500', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:34:53', '2024-04-10 00:35:22', 1, 2, 4, 499000),
(45, 'KR137447', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:35:00', '2024-04-10 00:35:24', 1, 2, 4, 244000),
(46, 'YH505452', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:17', '2024-04-10 00:49:01', 1, 2, 4, 784000),
(47, 'GG65176', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:25', '2024-04-11 00:49:02', 1, 2, 4, 489000),
(48, 'EP789121', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:32', '2024-04-13 00:49:03', 1, 2, 4, 400000),
(49, 'RG742252', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:39', '2024-04-14 00:49:03', 1, 2, 4, 489000),
(50, 'EC543368', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:47', '2024-04-10 00:49:04', 1, 2, 4, 489000),
(51, 'GS164932', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:47:55', '2024-04-16 00:49:05', 1, 2, 4, 588000),
(52, 'IM778074', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:02', '2024-04-16 00:49:06', 1, 2, 4, 293000),
(53, 'GH870689', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:09', '2024-04-16 00:49:07', 1, 2, 4, 784000),
(54, 'QV496318', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:16', '2024-04-16 00:49:08', 1, 2, 4, 784000),
(55, 'QG100345', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:25', '2024-04-16 00:49:09', 1, 2, 4, 990000),
(56, 'SG617140', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:32', '2024-04-16 00:49:10', 1, 2, 4, 990000),
(57, 'IJ295433', 3, 'Nguyễn Văn Xếp', '0987456321', 'Nhà số A Phường B Quận C Thành phố Q', '2024-04-16 00:48:38', '2024-04-16 00:49:11', 1, 2, 4, 244000);

-- --------------------------------------------------------

--
-- Table structure for table `giam_gia`
--

CREATE TABLE `giam_gia` (
  `ma_giam_gia` int(11) NOT NULL,
  `giam_gia` int(11) NOT NULL,
  `ten_giam_gia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `giam_gia`
--

INSERT INTO `giam_gia` (`ma_giam_gia`, `giam_gia`, `ten_giam_gia`) VALUES
(1, 10, 'Giảm giá 10%'),
(2, 25, 'Giảm giá 25%'),
(3, 30, 'Giảm giá 30%'),
(4, 50, 'Giảm giá 50%');

-- --------------------------------------------------------

--
-- Table structure for table `gio_hang`
--

CREATE TABLE `gio_hang` (
  `ma_gio_hang` int(11) NOT NULL,
  `ma_nguoi_dung` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gio_hang`
--

INSERT INTO `gio_hang` (`ma_gio_hang`, `ma_nguoi_dung`) VALUES
(3, 1),
(2, 2),
(4, 3),
(6, 10),
(7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `kich_thuoc`
--

CREATE TABLE `kich_thuoc` (
  `ma_kich_thuoc` int(11) NOT NULL,
  `ten_kich_thuoc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kich_thuoc`
--

INSERT INTO `kich_thuoc` (`ma_kich_thuoc`, `ten_kich_thuoc`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL'),
(5, 'XXL'),
(6, 'XS');

-- --------------------------------------------------------

--
-- Table structure for table `loai`
--

CREATE TABLE `loai` (
  `ma_loai` int(11) NOT NULL,
  `ten_loai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loai`
--

INSERT INTO `loai` (`ma_loai`, `ten_loai`) VALUES
(1, 'Nam'),
(2, 'Nữ');

-- --------------------------------------------------------

--
-- Table structure for table `mau_sac`
--

CREATE TABLE `mau_sac` (
  `ma_mau_sac` int(11) NOT NULL,
  `ten_mau` varchar(255) NOT NULL,
  `ma_mau` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mau_sac`
--

INSERT INTO `mau_sac` (`ma_mau_sac`, `ten_mau`, `ma_mau`) VALUES
(1, 'Màu Trắng', '#FFFFFF'),
(2, 'Màu Đen', '#2F2E33'),
(3, 'Màu Xám', '#44454D'),
(4, 'Màu Nâu', '#473737'),
(5, 'Màu Xanh', '#ABBEFA'),
(6, 'Màu Hồng', '#C6AEB0');

-- --------------------------------------------------------

--
-- Table structure for table `nguoi_dung`
--

CREATE TABLE `nguoi_dung` (
  `ma_nguoi_dung` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mat_khau` varchar(255) NOT NULL,
  `quyen` int(1) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT 'users/avatar.jpg',
  `ho_va_ten` varchar(255) DEFAULT NULL,
  `dia_chi` varchar(255) DEFAULT NULL,
  `so_dien_thoai` varchar(255) DEFAULT NULL,
  `trang_thai` int(1) DEFAULT 1,
  `kich_hoat` tinyint(1) NOT NULL DEFAULT 0,
  `ma` int(11) DEFAULT NULL,
  `ngay_tao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nguoi_dung`
--

INSERT INTO `nguoi_dung` (`ma_nguoi_dung`, `email`, `mat_khau`, `quyen`, `anh_dai_dien`, `ho_va_ten`, `dia_chi`, `so_dien_thoai`, `trang_thai`, `kich_hoat`, `ma`, `ngay_tao`) VALUES
(1, 'abc@gmail.com', '123', 0, 'users/1-old.jpg', 'Nguyễn Văn A', 'Nhà số X Phường Y Quận Z Thành phố V', '0147852096', 1, 1, NULL, '2024-01-20'),
(2, 'def@gmail.com', '123', 1, 'users/d1.jpg', 'Nguyễn Thị N', 'Nhà số D Phường E Quận Q Thành phố T', '0369852014', 1, 1, NULL, '2024-01-21'),
(3, 'admin@gmail.com', 'a1', 1, 'users/d5.jpg', 'Nguyễn Văn Xếp', 'Nhà số A Phường B Quận C Thành phố Q', '0987456321', 1, 1, NULL, '2024-01-21'),
(10, 'hiepttph46123@gmail.com', '123', 0, 'users/avatar.jpg', 'Tạ Tuấn Hiệp', 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', '0954632512', 1, 1, 205600, '2024-01-22'),
(11, 'hiepttph46123@fpt.edu.vn', '123456', 1, 'users/avatar.jpg', 'Hiệp BBQ', 'Khu 2 - Hoàng Cương - Thanh Ba - Phú Thọ', '0923456789', 1, 1, 461235, '2024-01-22');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `ma_phuong_thuc` int(11) NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`ma_phuong_thuc`, `ten_phuong_thuc`) VALUES
(1, 'Thanh toán khi nhận hàng'),
(2, 'Ví điện tử Momo'),
(3, 'Ví điện tử VnPay'),
(4, 'Ví điện tử Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `ma_san_pham` int(11) NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `anh` varchar(255) NOT NULL,
  `mo_ta` text DEFAULT NULL,
  `trang_thai` int(11) NOT NULL,
  `luot_mua` int(11) DEFAULT 0,
  `gia` int(11) NOT NULL,
  `ma_giam_gia` int(11) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`ma_san_pham`, `ten_san_pham`, `anh`, `mo_ta`, `trang_thai`, `luot_mua`, `gia`, `ma_giam_gia`, `so_luong`) VALUES
(15, 'Áo Polo Vải Dry Pique Ngắn Tay (Tipping)', 'products/vngoods_69_469052.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Kết cấu mịn màng mang lại cảm giác tươi mát. Cổ áo trông tuyệt vời khi được cài nút hoặc cởi ra.   </span></p>', 1, 1, 489000, NULL, 6),
(16, 'Áo Sơ Mi Tay Lỡ Kẻ Sọc Dáng Rộng', 'products/vngoods_37_467845.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Đường cắt cỡ lớn, thư giãn. Túi vá thời trang và thiết thực.  </span></p>', 1, 3, 588000, NULL, 7),
(17, 'Áo Polo Vải Dry Pique Ngắn Tay (Kẻ Sọc)Áo Polo Vải Dry Pique Ngắn Tay (Kẻ Sọc)', 'products/vngoods_466816_sub7.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 5, 489000, NULL, 8),
(18, 'Áo Thun Dáng Rộng Kẻ Sọc Cổ Tròn Tay Lỡ', 'products/vngoods_69_468879.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 0, 391000, NULL, 5),
(19, 'Áo Polo Vải Dry Pique Ngắn Tay (Kẻ Sọc)', 'products/vngoods_00_465195.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 0, 489000, NULL, 8),
(20, 'Áo Thun Xếp Nếp Không Tay', 'products/vngoods_31_467047.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 0, 293000, NULL, 10),
(21, 'Quần Dài Vải Linen Pha Xếp Ly Ống Ôm Dần', 'products/vngoods_470937_sub8.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 0, 784000, NULL, 7),
(22, 'Quần Smart Pants Dài Đến Mắt Cá', 'products/vngoods_10_450606.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu cotton pha sang trọng. Công nghệ DRY khô nhanh mang lại cảm giác thoải mái, tươi mát.  </span></p>', 1, 0, 784000, NULL, 8),
(23, 'Áo Ba Lỗ Vải Gân Mềm', 'products/vngoods_465763_sub7.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Vải có gân cho vẻ ngoài tinh tế. Chiều dài vừa vặn và ôm sát tạo nên một kiểu dáng thon gọn tôn dáng.  </span></p>', 1, 0, 244000, NULL, 9),
(24, 'Áo Thun Dáng Mini Ngắn Tay', 'products/ugc_stylehint_uq_vn_photo_240325_1300240_c-600-800.png', '<p><span style=\"color: rgb(27, 27, 27);\">Đặc biệt nhỏ gọn phù hợp và chiều dài ngắn. Một kiểu dáng mang hơi hướng của thập niên 90.  </span></p>', 1, 0, 293000, NULL, 9),
(25, 'Quần Short Thể Thao Siêu Co Giãn', 'products/vngoods_69_470722.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Độ giãn đáng kinh ngạc để tự do di chuyển. Vải mịn và nhanh khô. </span></p>', 1, 0, 489000, NULL, 9),
(26, 'Chân Váy Dài Vải Denim', 'products/240403083046_official_styling_120019003_c-600-800.png', '<p><span style=\"color: rgb(27, 27, 27);\">Chất jean 100% cotton. Thiết kế cạp cao tạo hiệu ứng tôn dáng.  </span></p>', 1, 20, 784000, NULL, 10),
(27, 'Đầm Vải Cotton Ngắn Tay Có Thắt Lưng', 'products/vngoods_56_465882.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất jean 100% cotton. Thiết kế cạp cao tạo hiệu ứng tôn dáng. </span></p>', 1, 0, 784000, NULL, 9),
(28, 'Miracle Air Quần Dài Dáng Relax (AirSense Quần Dài Dáng Relaxed) (Vải Lai Cotton)', 'products/vngoods_69_471024.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Quần hiệu suất cao được làm bằng vải nhẹ, co giãn và nhanh khô. Với phần eo co giãn thoải mái.  </span></p>', 1, 13, 980000, NULL, 10),
(29, 'AIRism Cotton Áo Polo Gài Nút', 'products/vngoods_56_467515.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Nhẹ nhàng và mềm mại với vẻ ngoài giản dị. Thiết kế cổ áo mở cho phép dễ dàng layer.   </span></p>', 1, 30, 489000, NULL, NULL),
(30, 'DRY-EX Áo Thun Ngắn Tay', 'products/vngoods_02_467544.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Với chất liệu vải nhẹ tênh, thoáng mát. Kết hợp công nghệ khô nhanh DRY -EX giúp mang lại cảm giác thoải mái và tươi mới suốt ngày dài. </span></p>', 1, 6, 391000, NULL, NULL),
(31, 'AIRism Cotton Quần Easy Short`', 'products/vngoods_65_464823.avif', '<p><span style=\"color: rgb(27, 27, 27);\">100% bông SUPIMA® cao cấp. Phần thân và tay áo dài hơn một chút tạo cảm giác tôn dáng. </span></p>', 1, 2, 391000, NULL, NULL),
(32, 'Miracle Air Áo Khoác Kiểu Sơ Mi (AirSense Áo Khoác Kiểu Sơ Mi) (Wool Like)', 'products/xam.avif', '<p>Miracle Air Áo Khoác Kiểu Sơ Mi (AirSense Áo Khoác Kiểu Sơ Mi) (Wool Like) </p>', 1, 0, 980000, NULL, NULL),
(33, 'Áo Thun SUPIMA COTTON Cổ Tròn Ngắn Tay', 'products/vngoods_04_468503.avif', '<p><span style=\"color: rgb(27, 27, 27);\">100% bông SUPIMA® cao cấp. Phần thân và tay áo dài hơn một chút tạo cảm giác tôn dáng. </span></p>', 1, 7, 390000, NULL, NULL),
(34, 'Quần Dài Easy Pants', 'products/vngoods_21_468647.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Vải chảy và cắt. Hoàn hảo để thư giãn ở nhà hoặc mặc đi dạo quanh khu phố. </span></p>', 1, 1, 489000, NULL, NULL),
(35, 'Áo Ngực Không Gọng (3D Hold)', 'products/vngoods_50_464339.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Áo ngực nâng đỡ của chúng tôi giờ đây mềm mại hơn bao giờ hết. Mới được cập nhật với bốn móc. </span></p>', 1, 2, 489000, NULL, NULL),
(36, 'Áo Nỉ', 'products/trang.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất liệu vải nỉ tốt với lớp lót chống vón cục. Những thiết kế hiện đại được chúng tôi lấy cảm hứng từ kiểu dáng truyền thống. </span></p>', 1, 0, 391000, NULL, NULL),
(37, 'Quần Short Vải Linen Cotton', 'products/1.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Mềm mại, mát mẻ và dễ chịu. Kiểu dáng xếp nếp đơn đầy phong cách. </span></p>', 1, 0, 588000, NULL, NULL),
(38, 'Quần Jeans Dáng Suông Rộng', 'products/t.png', '<p><span style=\"color: rgb(27, 27, 27);\">Chiều rộng tôn dáng, đường cắt thẳng. Chất jeans 100% cotton mềm mại và thoải mái. </span></p>', 1, 0, 980000, NULL, NULL),
(39, 'AIRism Áo Không Tay', 'products/d.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chiều rộng tôn dáng, đường cắt thẳng. Chất jeans 100% cotton mềm mại và thoải mái. </span></p>', 1, 0, 244000, NULL, NULL),
(40, 'Quần Dài Easy Pants Vải Sọc Nhăn', 'products/goods_35_464333.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chiều rộng tôn dáng, đường cắt thẳng. Chất jeans 100% cotton mềm mại và thoải mái.  </span></p>', 1, 0, 489000, NULL, NULL),
(41, 'AIRism Quần Lót Boxer Brief Cạp Thấp', 'products/x.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chiều rộng tôn dáng, đường cắt thẳng. Chất jeans 100% cotton mềm mại và thoải mái.  </span></p>', 1, 0, 244000, NULL, 10),
(42, 'AIRism Áo Ba Lỗ Vải Mắt Lưới', 'products/t.avif', '<p><span style=\"color: rgb(27, 27, 27);\">[Sản phẩm không hỗ trợ đổi/trả nhằm đảm bảo chất lượng.] Chất liệu hiệu suất cao mang lại cảm giác thoải mái. Lưới thoáng khí.</span></p>', 1, 0, 244000, NULL, NULL),
(43, 'AIRism Cotton Áo Bra Cổ Thuyền Hai Dây', 'products/m.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Thiết kế cao hơn ở phía trước giúp bạn luôn cảm thấy vừa vặn an toàn. Áo hở lưng có cúp áo ngực tích hợp. </span></p>', 1, 0, 244000, NULL, NULL),
(44, 'Áo Ngực Không Gọng (Ultra Relax)', 'products/n.png', '<p><span style=\"color: rgb(27, 27, 27);\">Chất vải co giãn siêu mỏng và tấm đệm giúp nâng đỡ nhẹ nhàng. Thiết kế liền mạch giúp không bị lộ khi mặc áo. </span></p>', 1, 0, 244000, NULL, 9),
(45, 'AIRism Cotton Áo Thun Cổ Tròn', 'products/xn.avif', '<p><span style=\"color: rgb(27, 27, 27);\">Chất vải co giãn siêu mỏng và tấm đệm giúp nâng đỡ nhẹ nhàng. Thiết kế liền mạch giúp không bị lộ khi mặc áo. </span></p>', 1, 0, 244000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tinh_trang`
--

CREATE TABLE `tinh_trang` (
  `ma_tinh_trang` int(11) NOT NULL,
  `ten_tinh_trang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinh_trang`
--

INSERT INTO `tinh_trang` (`ma_tinh_trang`, `ten_tinh_trang`) VALUES
(1, 'Chờ xác nhận'),
(2, 'Đang đóng gói'),
(3, 'Đang vận chuyển'),
(4, 'Đơn thành công'),
(5, 'Đơn hủy');

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_thanh_toan`
--

CREATE TABLE `trang_thai_thanh_toan` (
  `ma_trang_thai` int(11) NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trang_thai_thanh_toan`
--

INSERT INTO `trang_thai_thanh_toan` (`ma_trang_thai`, `ten_trang_thai`) VALUES
(1, 'Chưa thanh toán'),
(2, 'Đã thanh toán');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_binh_luan`),
  ADD KEY `BinhLuan_NguoiDung` (`ma_nguoi_dung`),
  ADD KEY `BinhLuan_SanPham` (`ma_san_pham`);

--
-- Indexes for table `bo_suu_tap_san_pham`
--
ALTER TABLE `bo_suu_tap_san_pham`
  ADD PRIMARY KEY (`ma_bo_suu_tap`),
  ADD KEY `BoSuuTapSanPham_SanPham` (`ma_san_pham`);

--
-- Indexes for table `chi_tiet_binh_luan`
--
ALTER TABLE `chi_tiet_binh_luan`
  ADD PRIMARY KEY (`ma_chi_tiet_binh_luan`),
  ADD KEY `ChiTietBinhLuan_BinhLuan` (`ma_binh_luan`),
  ADD KEY `ChiTietBinhLuan_NguoiDung` (`ma_nguoi_dung`);

--
-- Indexes for table `chi_tiet_cong`
--
ALTER TABLE `chi_tiet_cong`
  ADD PRIMARY KEY (`ma_chi_tiet_cong`),
  ADD KEY `ChiTietCong_Cong` (`ma_cong`);

--
-- Indexes for table `chi_tiet_danh_muc`
--
ALTER TABLE `chi_tiet_danh_muc`
  ADD KEY `ChiTietDanhMuc_DanhMuc` (`ma_danh_muc`),
  ADD KEY `ChiTietDanhMuc_SanPham` (`ma_san_pham`);

--
-- Indexes for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD KEY `ChiTietDonHang_DonHang` (`id_don_hang`),
  ADD KEY `ChiTietDonHang_ChiTietSanPham` (`ma_chi_tiet_san_pham`);

--
-- Indexes for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD KEY `ChiTietGioHang_GioHang` (`ma_gio_hang`),
  ADD KEY `ChiTietGioHang_ChiTietSanPham` (`ma_chi_tiet_san_pham`);

--
-- Indexes for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD PRIMARY KEY (`ma_chi_tiet_san_pham`),
  ADD KEY `ChiTietSanPham_SanPham` (`ma_san_pham`),
  ADD KEY `ChiTietSanPham_KichThuoc` (`ma_kich_thuoc`),
  ADD KEY `ChiTietSanPham_MauSac` (`ma_mau_sac`);

--
-- Indexes for table `cong`
--
ALTER TABLE `cong`
  ADD PRIMARY KEY (`ma_cong`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_danh_muc`),
  ADD KEY `DanhMuc_Loai` (`ma_loai`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id_don_hang`);

--
-- Indexes for table `giam_gia`
--
ALTER TABLE `giam_gia`
  ADD PRIMARY KEY (`ma_giam_gia`);

--
-- Indexes for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`ma_gio_hang`),
  ADD KEY `GioHang_NguoiDung` (`ma_nguoi_dung`);

--
-- Indexes for table `kich_thuoc`
--
ALTER TABLE `kich_thuoc`
  ADD PRIMARY KEY (`ma_kich_thuoc`);

--
-- Indexes for table `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`ma_loai`);

--
-- Indexes for table `mau_sac`
--
ALTER TABLE `mau_sac`
  ADD PRIMARY KEY (`ma_mau_sac`);

--
-- Indexes for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  ADD PRIMARY KEY (`ma_nguoi_dung`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`ma_phuong_thuc`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`ma_san_pham`),
  ADD UNIQUE KEY `ten_san_pham` (`ten_san_pham`);

--
-- Indexes for table `tinh_trang`
--
ALTER TABLE `tinh_trang`
  ADD PRIMARY KEY (`ma_tinh_trang`);

--
-- Indexes for table `trang_thai_thanh_toan`
--
ALTER TABLE `trang_thai_thanh_toan`
  ADD PRIMARY KEY (`ma_trang_thai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `ma_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bo_suu_tap_san_pham`
--
ALTER TABLE `bo_suu_tap_san_pham`
  MODIFY `ma_bo_suu_tap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT for table `chi_tiet_binh_luan`
--
ALTER TABLE `chi_tiet_binh_luan`
  MODIFY `ma_chi_tiet_binh_luan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `chi_tiet_cong`
--
ALTER TABLE `chi_tiet_cong`
  MODIFY `ma_chi_tiet_cong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  MODIFY `ma_chi_tiet_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `cong`
--
ALTER TABLE `cong`
  MODIFY `ma_cong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `ma_danh_muc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id_don_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `giam_gia`
--
ALTER TABLE `giam_gia`
  MODIFY `ma_giam_gia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gio_hang`
--
ALTER TABLE `gio_hang`
  MODIFY `ma_gio_hang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kich_thuoc`
--
ALTER TABLE `kich_thuoc`
  MODIFY `ma_kich_thuoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loai`
--
ALTER TABLE `loai`
  MODIFY `ma_loai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mau_sac`
--
ALTER TABLE `mau_sac`
  MODIFY `ma_mau_sac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nguoi_dung`
--
ALTER TABLE `nguoi_dung`
  MODIFY `ma_nguoi_dung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  MODIFY `ma_phuong_thuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `ma_san_pham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tinh_trang`
--
ALTER TABLE `tinh_trang`
  MODIFY `ma_tinh_trang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `trang_thai_thanh_toan`
--
ALTER TABLE `trang_thai_thanh_toan`
  MODIFY `ma_trang_thai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `BinhLuan_NguoiDung` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`),
  ADD CONSTRAINT `BinhLuan_SanPham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`);

--
-- Constraints for table `bo_suu_tap_san_pham`
--
ALTER TABLE `bo_suu_tap_san_pham`
  ADD CONSTRAINT `BoSuuTapSanPham_SanPham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`);

--
-- Constraints for table `chi_tiet_binh_luan`
--
ALTER TABLE `chi_tiet_binh_luan`
  ADD CONSTRAINT `ChiTietBinhLuan_BinhLuan` FOREIGN KEY (`ma_binh_luan`) REFERENCES `binh_luan` (`ma_binh_luan`),
  ADD CONSTRAINT `ChiTietBinhLuan_NguoiDung` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);

--
-- Constraints for table `chi_tiet_cong`
--
ALTER TABLE `chi_tiet_cong`
  ADD CONSTRAINT `ChiTietCong_Cong` FOREIGN KEY (`ma_cong`) REFERENCES `cong` (`ma_cong`);

--
-- Constraints for table `chi_tiet_danh_muc`
--
ALTER TABLE `chi_tiet_danh_muc`
  ADD CONSTRAINT `ChiTietDanhMuc_DanhMuc` FOREIGN KEY (`ma_danh_muc`) REFERENCES `danh_muc` (`ma_danh_muc`),
  ADD CONSTRAINT `ChiTietDanhMuc_SanPham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`);

--
-- Constraints for table `chi_tiet_don_hang`
--
ALTER TABLE `chi_tiet_don_hang`
  ADD CONSTRAINT `ChiTietDonHang_ChiTietSanPham` FOREIGN KEY (`ma_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`ma_chi_tiet_san_pham`),
  ADD CONSTRAINT `ChiTietDonHang_DonHang` FOREIGN KEY (`id_don_hang`) REFERENCES `don_hang` (`id_don_hang`);

--
-- Constraints for table `chi_tiet_gio_hang`
--
ALTER TABLE `chi_tiet_gio_hang`
  ADD CONSTRAINT `ChiTietGioHang_ChiTietSanPham` FOREIGN KEY (`ma_chi_tiet_san_pham`) REFERENCES `chi_tiet_san_pham` (`ma_chi_tiet_san_pham`),
  ADD CONSTRAINT `ChiTietGioHang_GioHang` FOREIGN KEY (`ma_gio_hang`) REFERENCES `gio_hang` (`ma_gio_hang`);

--
-- Constraints for table `chi_tiet_san_pham`
--
ALTER TABLE `chi_tiet_san_pham`
  ADD CONSTRAINT `ChiTietSanPham_KichThuoc` FOREIGN KEY (`ma_kich_thuoc`) REFERENCES `kich_thuoc` (`ma_kich_thuoc`),
  ADD CONSTRAINT `ChiTietSanPham_MauSac` FOREIGN KEY (`ma_mau_sac`) REFERENCES `mau_sac` (`ma_mau_sac`),
  ADD CONSTRAINT `ChiTietSanPham_SanPham` FOREIGN KEY (`ma_san_pham`) REFERENCES `san_pham` (`ma_san_pham`);

--
-- Constraints for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD CONSTRAINT `DanhMuc_Loai` FOREIGN KEY (`ma_loai`) REFERENCES `loai` (`ma_loai`);

--
-- Constraints for table `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `GioHang_NguoiDung` FOREIGN KEY (`ma_nguoi_dung`) REFERENCES `nguoi_dung` (`ma_nguoi_dung`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
