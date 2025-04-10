-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2025 at 07:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esimprod2.0`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_seri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `merk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang_id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `limit` int NOT NULL,
  `sisa_limit` int NOT NULL,
  `foto` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `uuid`, `kode_barang`, `nama_barang`, `nomor_seri`, `merk`, `jenis_barang_id`, `status`, `deskripsi`, `qr_code`, `limit`, `sisa_limit`, `foto`, `created_at`, `updated_at`) VALUES
(7, '66d3cc54-27c6-410a-8753-701b5aee3fe8', 'U2JX3HLNTR5E', 'EOS 6D (N)', '028022002984', 'Canon', 1, 'tersedia', 'EOS 6 D (N) Body Only', '1734257206_qr.png', 5, 0, '1734308545.png', '2024-12-14 10:06:46', '2025-02-13 00:08:26'),
(8, '1293d528-7f5a-4efd-8190-392caaffa951', '6I7C90Z8NF4H', 'EOS 6D MARK II', 'JZY5E1ZL61G0YFZR0MUQ', 'Canon', 1, 'tersedia', NULL, '1734264359_qr.png', 5, 5, '1734308794.png', '2024-12-14 12:05:59', '2025-01-06 17:58:42'),
(9, '9defc3e0-4864-4cb1-8723-68f7fa78847d', '5D3YEAO6FP0S', 'EOS 6D (WG)', '038024000818', 'Canon', 1, 'tersedia', NULL, '1734264400_qr.png', 5, 4, '1734308605.png', '2024-12-14 12:06:40', '2025-02-01 03:00:44'),
(10, 'abbfb8f9-6aff-4a4c-b6db-54fa176ed6e9', 'RYI063Q87VOU', 'MIC RODE', 'CR0292639', 'RODE', 6, 'tersedia', NULL, '1734308782_qr.png', 5, 2, '1734308888.png', '2024-12-15 00:26:22', '2025-03-26 03:18:25'),
(11, '9fcb9946-7c6b-4d3a-bc13-1c4b084bb0d4', 'LP6RHQ25MDZ0', 'NIKON D800E', '2001368', 'Nikon', 1, 'tersedia', 'D800E, 7V-12V (2.5 A)', '1734309056_qr.png', 5, 4, '1734309056.png', '2024-12-15 00:30:56', '2025-01-22 06:49:15'),
(12, '9f207695-7572-41b8-b957-6faf77f75d8b', 'MNQV5ADR72LG', 'Lensa Tamron', '663764', 'TAMRON', 2, 'tersedia', 'Lensa TAMRON, 70-300mm, TELE MACRO(1:2), 62Ohm, A17', '1734309245_qr.png', 5, 5, '1734309245.png', '2024-12-15 00:34:05', '2025-01-22 07:33:14'),
(13, '665b8cf9-fe6c-4ab9-a347-8f0a342f7f5f', 'AEIKPSG2Z4RT', 'Baterai GO PRO', 'TS7SJNNVXA1CB5E8737Z', 'GO PRO', 8, 'tersedia', 'Rechargeable Li-ion Battery Pack, 3.7 V, 1180 mAH, 4.37 Wh', '1734309642_qr.png', 5, 5, '1734309655.png', '2024-12-15 00:40:42', '2025-01-22 08:34:31'),
(15, '705d0307-c3e3-458b-bbd8-3fe1fc2e2be0', 'W42YSR9JPQMO', 'LENSA MACRO PRO TAMA', '-', 'PRO TAMA', 2, 'tersedia', '72 mm, Macro', '1734309974_qr.png', 5, 5, '1734309974.png', '2024-12-15 00:46:14', '2025-01-22 07:26:03'),
(17, 'f9468723-9d57-485a-a098-47de5e8a1697', 'VL3TC52OKBMF', 'DRONE DJI MAVIC 2', '163CG9G', 'DJI', 5, 'tersedia', 'DJI MAVIC 2, Power : LiPo 3850mAH (15,4V), Model L1P', '1734310293_qr.png', 5, 5, '1734310293.png', '2024-12-15 00:51:33', '2025-01-22 07:38:18'),
(20, 'e9fabf56-713f-49b2-b24f-4b5c806da585', 'DN0IFE8LUVXK', 'SONY NXCAM', '0520139', 'SONY', 1, 'tersedia', 'HXR-NX3, PAL 7.2V, 20x Optical Zoom, Sony Lens G', '1734310651_qr.png', 5, 5, '1734310651.png', '2024-12-15 00:57:31', '2025-01-22 07:31:23'),
(21, 'e28bad72-6102-408b-813c-b25525de5a08', 'O4UHPBMSD2K1', 'Laptop Acer Aspire V5', 'NXM8ASN00233939A353400', 'Acer', 11, 'tersedia', 'SNID : 33923608534', '1734310922_qr.png', 5, 4, '1734310922.png', '2024-12-15 01:02:02', '2025-03-26 03:18:25'),
(22, '3d813a12-e881-48cd-933c-86f1f0e68ec9', 'WYQ0J5U694AL', 'Kamera BOLEX H16', '9NQEY5C1ZPFF3L38BCPK', 'BOLEX', 1, 'tersedia', NULL, '1734311159_qr.png', 5, 4, '1734311159.png', '2024-12-15 01:05:59', '2025-01-07 19:24:59'),
(23, '466d5cb0-78a3-42d1-8bda-0811e29c9307', 'PRD0INCK4ZE2', 'SD CARD 128 GB [1]', '1558OM2X1EVAG86UH105', 'Sandisk', 10, 'tersedia', 'SD Card Sandisk Extreme Pro 170mb/s Class 10', '1734317814_qr.png', 5, 4, '1734317815.png', '2024-12-15 02:56:56', '2025-02-01 03:00:44'),
(24, 'a3c18556-3999-40f2-b1df-becb48559fdc', 'F84W3ZQGBJLH', 'SD CARD 128 GB [2]', 'HLXNQDMO6AIQRRTXNYJF', 'Sandisk', 10, 'tersedia', 'SD Card Sandisk Extreme Pro 170mb/s Class 10', '1734317850_qr.png', 5, 5, '1734317850.png', '2024-12-15 02:57:30', '2024-12-15 07:26:28'),
(25, 'acff2450-f305-4d3e-8a72-a6f6aa79af02', '6Z0LMDKVYIS8', 'SD CARD 128 GB [3]', 'VET0Q5TSQ5H87B7D69EM', 'Sandisk', 10, 'tersedia', 'SD Card Sandisk Extreme Pro 170mb/s Class 10', '1734317879_qr.png', 5, 5, '1734317879.png', '2024-12-15 02:57:59', '2024-12-15 02:57:59'),
(26, '14985b6b-9807-4aab-a306-f465bf8e4c40', '2EJ6KUS1LNRW', 'Battery Pack [1]', 'CU1JUCJE448EI3S7DRUK', '-', 4, 'tersedia', 'Li-ion Battery Pack', '1734318205_qr.png', 5, 5, '1734318206.png', '2024-12-15 03:03:26', '2024-12-15 07:26:28'),
(27, '3c815215-1947-435c-afd8-c673502ce1c3', 'NFB9PJROLEIY', 'Battery Pack [2]', 'HONRCUKDLMAZSYWYLB5F', '-', 4, 'tersedia', 'Li-ion Battery Pack', '1734318236_qr.png', 5, 0, '1734318236.png', '2024-12-15 03:03:56', '2025-04-05 22:26:14'),
(28, '1db9a8e8-9b5b-4948-9d20-adb612b25aa9', 'A3QCHGZEJR42', 'Tripod SACHTLER', '75LXDJVWMS6Q1VV0SMNU', 'SACHTLER', 8, 'tersedia', 'Tripod SACHTLER', '1734318367_qr.png', 5, 5, '1734318367.png', '2024-12-15 03:06:07', '2025-01-22 07:20:11'),
(30, '4d5e9311-0035-490e-9ef2-a5be24c2a36b', 'JMKWA2X3E6BO', 'LENSA YONGNUO', '15018017', 'YONGNOU', 2, 'tersedia', 'LENSA YONGNUO 50MM', '1734318963_qr.png', 5, 3, '1734318963.png', '2024-12-15 03:16:03', '2025-02-27 06:46:31'),
(31, '31086fe6-2f3b-4938-ab87-13870b3310ef', 'BNWKM9UIR2XT', 'Perlengkapan GO PRO', 'HME34SHGFUB3NT8U0D5D', 'GO PRO', 3, 'tersedia', NULL, '1734319180_qr.png', 5, 3, '1734319180.png', '2024-12-15 03:19:40', '2025-01-22 08:34:18'),
(32, '4dda83cf-574d-44d4-8b69-ca97f4243c31', 'VQ09DBCXKE8Y', 'Baterai Kamera Canon [1]', '95DHMRY7SHO3DYV2ULJZ', 'Canon', 4, 'tersedia', NULL, '1734319364_qr.png', 5, 5, '1734319364.png', '2024-12-15 03:22:44', '2024-12-23 09:18:09'),
(33, 'b0c316a9-8087-4e8f-ae03-e29fd6aa6d2a', '6KR9N57O8PQT', 'Baterai Kamera Canon [2]', 'LVFRSJID9U1A0HZDGQQ3', 'Canon', 4, 'tersedia', NULL, '1734319413_qr.png', 5, 0, '1734319413.png', '2024-12-15 03:23:33', '2025-04-05 22:25:17'),
(34, 'e8d804a7-aa98-40cd-a647-8f9578cb6de1', 'POXSQK8E0CNI', 'Baterai Kamera Canon [3]', '15VSHWDX9DT5SSV84GCV', 'Canon', 4, 'tersedia', NULL, '1734319436_qr.png', 5, 0, '1734319436.png', '2024-12-15 03:23:56', '2025-04-05 22:26:23'),
(35, '0b357199-6607-42e1-9c1e-546e5638d58a', 'GIURT7M01VKB', 'Baterai Kamera Canon [4]', '1ANVBM2XLAPMN6O7HNDQ', 'Canon', 4, 'tersedia', NULL, '1734319459_qr.png', 5, 5, '1734319459.png', '2024-12-15 03:24:19', '2025-03-26 01:45:32'),
(36, '86c9da4f-18e4-42dd-8335-4fb2a5baff47', 'XRYQ8C90MBZ6', 'Baterai Kamera Canon [5]', '2NK6HWEAKSYK1R14Q8VY', 'Canon', 4, 'tersedia', NULL, '1734319531_qr.png', 5, 5, '1734319531.png', '2024-12-15 03:25:31', '2025-01-07 20:53:57'),
(37, '92b97e5e-2285-4e0f-9c97-84fdf5215188', 'EN32WX8T4OM0', 'Charger Baterai Kamera Canon [1]', '5N35EI5KXYAGXE9MU7XT', 'Canon', 8, 'tersedia', NULL, '1734319745_qr.png', 5, 5, '1734319745.png', '2024-12-15 03:29:05', '2025-02-07 01:24:44'),
(38, '696491a0-1d21-48d5-87c4-d8e608afdf70', '78G6UQSBLXDE', 'Charger Baterai Kamera Canon [2]', 'DQQM01U72N25OM9AY41F', 'Canon', 8, 'tersedia', NULL, '1734319789_qr.png', 5, 4, '1734319789.png', '2024-12-15 03:29:49', '2025-02-21 03:24:02'),
(39, 'febbaf78-0e26-42bf-9c2b-c3d79eb140d3', '10H2VP893IWD', 'Charger Baterai Kamera Canon [3]', 'LFLXZYE5Q2B90PO2C9SA', 'Canon', 8, 'tersedia', NULL, '1734319821_qr.png', 5, 4, '1734319821.png', '2024-12-15 03:30:21', '2025-02-27 06:46:31'),
(40, '94b35284-2eb7-41de-9317-22bc5cb223f7', 'LNPE1M9D3BCF', 'Nikon 18-200 mm', '42488697', 'Nikon', 2, 'tersedia', 'Nikon DX SWM VR ED IF Aspherical, 18-200 mm,', '1737529158_qr.png', 5, 5, '1737684925.jpg', '2025-01-22 06:59:18', '2025-01-24 02:15:25'),
(42, '159e2722-002b-4e11-98f5-368a7044b5f4', '92NWO0QU4T7L', 'SIGMA DG', '11091842', 'SIGMA', 2, 'tersedia', 'SIGMA for Nikon, LCF=86II,  86mm', '1737529472_qr.png', 5, 5, '1737684881.jpg', '2025-01-22 07:04:32', '2025-01-24 02:14:41'),
(43, '6469a3f9-1bde-4ae3-a697-9000adaec1f3', 'GMFH39PKAZWD', 'SONY ALPHA 7S III [1]', '4875932', 'SONY', 1, 'tersedia', '4K, SteadyShot INSIDE', '1737531904_qr.png', 5, 5, '1737543954.jpg', '2025-01-22 07:45:04', '2025-01-22 11:48:09'),
(44, 'ad986c20-6287-42fa-8670-0a95ac7b99b1', 'ZG9NF6CA0LUD', 'SONY ALPHA 7S III [2]', '4876023', 'SONY', 1, 'tersedia', '4K, SteadyShot Inside', '1737531976_qr.png', 5, 5, '1737543870.jpg', '2025-01-22 07:46:16', '2025-01-22 11:48:17'),
(45, 'cf96e07b-663e-4ed3-a9a6-e1348ce372fa', 'K21JDC9A6MS0', 'Lensa SONY FE 24-70 F2.8 GM', 'S01-2130258-7', 'SONY', 2, 'tersedia', 'SONY FE 2.8/24-70 GM, Type G, E-Mount', '1737532403_qr.png', 5, 5, '1737546715.jpg', '2025-01-22 07:53:23', '2025-01-22 11:51:55'),
(46, '43ef1416-1ef5-4ed9-bc78-11e149734d4d', 'JX4TYEPVKCR3', 'Lensa SONY FE50 MM FE1.4 ZA', 'S01-1820502-4', 'SONY', 2, 'tersedia', 'E-Mount, 35mm full range, 72mm', '1737532560_qr.png', 5, 5, '1737546794.jpg', '2025-01-22 07:56:00', '2025-01-22 11:53:14'),
(47, '42d9af35-6031-4080-aaef-13a28497427c', '4MKS8DJFY2GT', 'Lensa SONY FE 16-35 mm F.2.8 GM II', 'S01-1811458-E', 'SONY', 2, 'tersedia', 'E-Mount, 35mm full frame, 82mm', '1737532768_qr.png', 5, 5, '1737546820.jpg', '2025-01-22 07:59:28', '2025-01-22 11:53:40'),
(48, '849de5b0-cec1-4b76-a4bb-9bb4b8106bf0', '1ZHR3SQ6EUB7', 'Lensa FE 70-200 mm F2.8 GM OSS', 'S01-1958755-Q', 'SONY', 2, 'tersedia', 'E-Mount, 35 mm full frame, 77mm', '1737532880_qr.png', 5, 5, '1737545478.jpg', '2025-01-22 08:01:20', '2025-01-22 11:31:18'),
(49, 'a969c464-04c3-49ee-a446-e2668e670543', 'X2W1T7NKZPD0', 'SONY Battery Pack NP-FZ100 [1]', '20220519WDB', 'SONY', 4, 'tersedia', 'Kapasitas 16,4 Wh, 2280mAH/7.2V', '1737533126_qr.png', 5, 5, '1737545182.jpg', '2025-01-22 08:05:26', '2025-01-22 11:26:22'),
(50, '0d6ac666-c525-48a7-bdb4-64b26226d2ef', 'ROKNYMLIAP5D', 'SONY Battery Pack NP-FZ100 [2]', '20220907WEB', 'SONY', 4, 'tersedia', 'Kapasitas 16.4 Wh, 2280 mAh/7.2V', '1737533238_qr.png', 5, 5, '1737545175.jpg', '2025-01-22 08:07:18', '2025-01-22 11:26:15'),
(51, '3e95f4c2-4ed3-4730-bdde-f5009b698f62', '6UFDMOJGN1YZ', 'SONY Battery Pack NP-FZ100 [3]', '20230207WEB', 'SONY', 4, 'tersedia', 'Kapasitas 16.4 Wh, 2280 mAh/7.2V', '1737533375_qr.png', 5, 5, '1737545167.jpg', '2025-01-22 08:09:35', '2025-01-22 11:26:07'),
(52, '00ad431b-a9c3-4503-a68a-9d42f8e43f5d', 'RSVP41YO3JZC', 'SONY Battery Pack NP-FZ100 [4]', '20221018WEA', 'SONY', 4, 'tersedia', 'Kapasitas 16.4 Wh, 2280 mAh/7.2V', '1737533464_qr.png', 5, 5, '1737545149.jpg', '2025-01-22 08:11:04', '2025-01-22 11:25:49'),
(53, '17b917b3-5c28-44af-ae3a-67552c4ae9ae', 'CZBW41IU5G6S', 'SONY Battery Pack NP-FZ100 [5]', '20220907WEB', 'SONY', 4, 'tersedia', 'Kapasitas 16.4 Wh, 2280 mAh/7.2V', '1737533559_qr.png', 5, 5, '1737545062.jpg', '2025-01-22 08:12:39', '2025-01-22 11:24:22'),
(54, '93e91c50-311f-4888-b7cd-2eab9b852b15', 'YF1JZKNP9S73', 'SONY Battery Pack  NP-FZ100 [6]', '20211113WDB', 'SONY', 4, 'tersedia', 'Kapasitas 16.4 Wh, 2280 mAh/7.2V', '1737533621_qr.png', 5, 5, '1737544479.jpg', '2025-01-22 08:13:41', '2025-01-22 11:14:39'),
(55, 'c3663ba7-e973-47aa-a431-4df38641bd5a', '84QSOEU7H2XT', 'SONY Battery Charger BC-QZ1 [1]', '220455PA1007227', 'SONY', 8, 'tersedia', 'Quick Charger, Z series', '1737533807_qr.png', 5, 5, '1737545213.jpg', '2025-01-22 08:16:47', '2025-01-22 11:26:53'),
(56, 'ed6d0cf0-a3dc-4978-bdde-024dc4126ff5', 'TPLGQR20NFZW', 'SONY Battery Charger BC-QZ1 [2]', '22115PA1000120', 'SONY', 8, 'tersedia', 'Quick Charger, Z series', '1737533871_qr.png', 5, 5, '1737545222.jpg', '2025-01-22 08:17:51', '2025-01-22 11:27:02'),
(57, 'de2a8c93-a2ec-4bbb-b3e3-5f2f756b07d3', '8GYQLNSOD1W7', 'TASCAM DR-07X', '1980295', 'TASCAM', 6, 'tersedia', 'Stereo digital audio recorder and USB audio interface', '1737534047_qr.png', 5, 5, '1737544135.jpg', '2025-01-22 08:20:47', '2025-01-22 11:08:55'),
(58, 'cbd9f43e-2579-46a9-8f6e-9f9e92ac3db1', 'UY0R5P1FBNJH', 'CAMCORDER CANON XA65', '683629000160', 'CANON', 1, 'tersedia', '4K, 20x Optical zoom, Infrared', '1737534531_qr.png', 5, 5, '1737544182.jpg', '2025-01-22 08:28:51', '2025-01-22 11:09:42'),
(59, 'a3119dcd-3403-4e7c-b444-bc4e9e8922a8', 'USHRLZTQ35OA', 'Lampu ZHIYUN FIVERAY M40 [1]', '9020270C0010896', 'ZHIYUN', 12, 'tersedia', '40 W', '1737534730_qr.png', 5, 5, '1737543771.jpg', '2025-01-22 08:32:10', '2025-01-22 11:02:51'),
(60, '13a4c24e-898c-4ba4-af72-9ac94c4588ad', '0RPTMOZ7JSA1', 'Lampu ZHIYUN FIVERAY M40 [2]', '8FF02E0C0010081', 'ZHIYUN', 12, 'tersedia', '40 W', '1737534795_qr.png', 5, 5, '1737544105.jpg', '2025-01-22 08:33:15', '2025-01-22 11:08:25'),
(61, '21309dad-d522-4185-9668-dd4ddeee6fd9', 'Z7IKES5HRAJW', 'CAMCORDER PANASONIC AJ-PX230', 'A9TRA0010', 'PANASONIC', 1, 'tersedia', '7.2 V/12 V (19.5 W)', '1737535043_qr.png', 5, 5, '1737544206.jpg', '2025-01-22 08:37:23', '2025-01-22 11:10:06'),
(62, '5f0d18b8-ae50-4fa8-b38c-eb1d3dd25fa5', 'LQR6F8P24S1M', 'Lampu GODOX SL150III [1]', '22L00099062', 'GODOX', 12, 'tersedia', 'Power 160 W', '1737535267_qr.png', 5, 5, '1737543940.jpg', '2025-01-22 08:41:07', '2025-01-22 11:05:40'),
(63, 'a6b6aea3-aca0-420c-a5b8-5dcf383310d1', '2OKVLGDFHSC1', 'Lampu GODOX SL150III [2]', '22L00099060', 'GODOX', 12, 'tersedia', 'Power 160 W', '1737535486_qr.png', 5, 5, '1737543908.jpg', '2025-01-22 08:44:46', '2025-01-22 11:05:08'),
(64, '282a0c71-22ef-4a1a-8e91-28772e10864c', 'YBV1O9CE6Q03', 'Camera Handheld Set SENNHEISER [1]', '5092000092', 'SENNHEISER', 6, 'tersedia', 'Wireless, freq range D 780-822 MHz', '1737535701_qr.png', 5, 5, '1737545287.jpg', '2025-01-22 08:48:21', '2025-01-22 11:28:07'),
(65, '648699a9-7d10-4762-aebf-46cd2861a29a', 'PNRAHQ6UGI9M', 'Camera Handheld Set SENNHEISER [2]', '5441001176', 'SENNHEISER', 6, 'tersedia', 'Wireless, freq range B 626-668 MHz', '1737535787_qr.png', 5, 5, '1737545403.jpg', '2025-01-22 08:49:47', '2025-01-22 11:30:03'),
(66, '279a1365-4b57-4d27-ba5b-22cf35bb390c', 'QFW15CLNHBV7', 'Camera Handheld Set SENNHEISER [3]', '4029000033', 'SENNHEISER', 6, 'tersedia', 'Wireless, freq range C 734-776 MHz', '1737535930_qr.png', 5, 5, '1737545393.jpg', '2025-01-22 08:52:10', '2025-01-22 11:29:53'),
(67, 'd285f83c-ea28-4166-96e8-cd8c914115f0', 'XNKTWQ0MBPRZ', 'SOLITON 1', '-', 'SOLITON', 8, 'tersedia', NULL, '1738200646_qr.png', 10, 10, '1738327279.jpg', '2025-01-30 01:30:46', '2025-01-31 12:41:20'),
(68, '400ec383-550e-4985-a80e-0340cd2fa115', 'BH6L3TZPXD1U', 'SOLITON 2', '-', 'SOLITON', 8, 'tersedia', NULL, '1738200663_qr.png', 5, 5, '1738327191.jpg', '2025-01-30 01:31:03', '2025-01-31 12:39:52'),
(69, '37440d33-9826-4e2b-b76f-0295a6978920', '0WE5SQRL4D36', 'LENSA Canon 50mm, EF 50', '-', 'Canon', 2, 'tersedia', 'Canon 50mm, EF 50', '1738200766_qr.png', 10, 10, 'default.jpg', '2025-01-30 01:32:46', '2025-01-30 01:32:46'),
(70, '97e72077-6540-4106-b79f-3f49f4d6eb5e', 'P6W13X8GTC2Q', 'LENSA Canon UV, 75-300mm', '-', 'Canon', 2, 'tersedia', 'UV, 75-300mm', '1738200856_qr.png', 5, 5, 'default.jpg', '2025-01-30 01:34:16', '2025-01-30 01:34:16'),
(71, 'd290ff16-2873-42ab-8946-2afddc5460a5', 'NQ87MEWYIASF', 'LENSA TAMRON For CANON, 24-105 mm', '-', 'TAMRON', 2, 'tersedia', '24-105 mm', '1738200942_qr.png', 10, 10, '1738327393.jpg', '2025-01-30 01:35:42', '2025-01-31 12:43:14'),
(72, 'f284c784-62f9-4ca5-ad78-ed2cc37c6456', '6AFZHMK3V9S7', 'LENSA TAMRON, 17-35 mm', '-', 'TAMRON', 2, 'tersedia', '17-35 mm', '1738201036_qr.png', 5, 5, '1738327671.jpg', '2025-01-30 01:37:16', '2025-01-31 12:47:52'),
(73, '0e96d5fc-cab4-484b-a350-071d6f11c310', 'W9DSPK31HCGN', 'Clip On Set SENNHEISER [1]', '4120036210', 'SENNHEISER', 6, 'tersedia', 'SK100 G4, freq B 626-668 MHz', '1738201540_qr.png', 5, 5, '1738327567.jpg', '2025-01-30 01:45:40', '2025-01-31 12:46:08'),
(74, '056e8f3a-c3b9-46a3-98b4-fbb400610697', 'UQX30PV9TEL7', 'Clip On Set SENNHEISER [2]', '4067012725', 'SENNHEISER', 6, 'tersedia', 'SK100, FQ E 823-865 MHz', '1738201753_qr.png', 5, 5, '1738327534.jpg', '2025-01-30 01:49:13', '2025-01-31 12:45:35'),
(75, 'ffcc5da3-0cb3-4fea-8338-414841e536f6', 'CBQ329FVA4JT', 'Clip On Set SENNHEISER [3]', '4130036556', 'SENNHEISER', 6, 'tersedia', 'FREQ B 626-668 MHz, SK100 G4', '1738201881_qr.png', 5, 5, '1738327525.jpg', '2025-01-30 01:51:21', '2025-01-31 12:45:26'),
(76, '81a52c2d-4d9a-40ce-ad53-bd160ccf5be8', '5H2GC4TVF0BN', 'Lampu GODOX LF308', '20H00066496', 'GODOX', 12, 'tersedia', '18 W', '1738202208_qr.png', 5, 5, '1738329470.jpg', '2025-01-30 01:56:48', '2025-01-31 13:17:51'),
(77, 'ea7e8bf5-f2b7-41e0-bc53-92a2154d612e', 'SVOMFI5HACB3', 'NIKON Battery Charger MH25', '1110015450G', 'NIKON', 4, 'tersedia', NULL, '1738202448_qr.png', 5, 5, '1738328775.jpg', '2025-01-30 02:00:48', '2025-01-31 13:06:16'),
(78, '348fb7e5-2bec-48a0-a6a7-4d7673221836', '07UBNX48VIKH', 'DJI RS 3 PRO', '5DNDK8N0069J3R', 'DJI', 8, 'tersedia', 'Professional 3-axis Camera Stabilizer', '1738202852_qr.png', 5, 5, '1738329534.jpg', '2025-01-30 02:07:32', '2025-01-31 13:18:55'),
(79, 'ad305a36-98fe-46de-bdb8-5345e798c2fb', 'UP5VF40ILJ86', 'DJI AIR 2S', '3YTBJ9Q003054L', 'DJI', 5, 'tersedia', 'Air Drone', '1738203086_qr.png', 5, 5, '1738328014.jpg', '2025-01-30 02:11:26', '2025-01-31 12:53:35'),
(80, 'a9d6c61f-3cc3-4df6-a96b-b380761dcd70', 'J48OBH0ALRSQ', 'OPPO A5 2020', 'QCPH193311A08A7943', 'OPPO', 7, 'tersedia', '4GB RAM 128GB STORAGE', '1738204169_qr.png', 5, 5, '1738328023.jpg', '2025-01-30 02:29:29', '2025-01-31 12:53:44'),
(81, '6ebf7027-c65c-4203-901a-38586eace893', '6TWFVJ87KOIG', 'Baterai Canon LP-E6N', 'S/N ------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204352_qr.png', 5, 5, '1738327917.jpg', '2025-01-30 02:32:32', '2025-01-31 12:51:58'),
(82, 'b26b44cd-33db-40a5-8d3c-149af50c4adb', 'K2FTV851ZOJ3', 'Baterai Canon LP-E6H', 'S/N ------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204427_qr.png', 5, 5, '1738327770.jpg', '2025-01-30 02:33:47', '2025-01-31 12:49:31'),
(83, 'b176cbcc-1224-4fd5-a918-14356f36e0c7', 'RO7ETAPU1GF5', 'Baterai Canon LP-E6N (2)', 'S/N ---------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204527_qr.png', 4, 4, '1738327778.jpg', '2025-01-30 02:35:27', '2025-01-31 12:49:38'),
(84, '71b9fd95-3f95-49ed-b105-5020b6ced978', 'KUSGP27A61RQ', 'Baterai Canon LP-E6H (2)', 'S/N ---------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204600_qr.png', 4, 4, '1738327824.jpg', '2025-01-30 02:36:40', '2025-01-31 12:50:25'),
(85, '48d06fb5-3e3f-40ed-af33-8afd892579cd', 'FEO8WMNLR9Y7', 'Baterai Canon LP-E6[1]', 'S/N --------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204675_qr.png', 4, 4, '1738327833.jpg', '2025-01-30 02:37:55', '2025-01-31 12:50:34'),
(86, '2d657bb5-05b2-43b4-b02d-947f4898672c', '2GV8T0LQBJAR', 'Baterai Canon LP-E6 (2)', 'S/N ------------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204757_qr.png', 4, 4, '1738327841.jpg', '2025-01-30 02:39:17', '2025-01-31 12:50:42'),
(87, '0bb5fabb-96ec-412b-83bb-636d48150a14', 'XL6GCDHMF5W1', 'Baterai Canon LP-E6 (3)', 'S/N --------', 'Canon', 4, 'tersedia', 'Baterai Canon', '1738204807_qr.png', 4, 4, '1738327850.jpg', '2025-01-30 02:40:07', '2025-01-31 12:50:51'),
(88, '7920713b-4f11-4ec7-bf98-d26e9d778ef0', 'I405BER91WVX', 'Baterai FB-LP-E6+', 'S/N ------------', 'FB', 4, 'tersedia', 'Baterai FB', '1738204869_qr.png', 4, 4, 'default.jpg', '2025-01-30 02:41:09', '2025-01-30 02:41:09'),
(89, 'bbd76c34-3b2d-49fd-869d-264dcb9f76de', '6JEKWG9ZP7LB', 'Canon Battery Charger CG-800E', 'S/N ---------', 'Canon', 4, 'tersedia', NULL, '1738205154_qr.png', 4, 4, '1738328686.jpg', '2025-01-30 02:45:54', '2025-01-31 13:04:47'),
(90, 'da75ed0b-725f-4907-8624-eeac0f0a5473', 'ZHRA3UQ8V4EW', 'Video Light HR-5100A', 'S/N ----------', 'Video Light', 12, 'tersedia', 'LED Battery Video Light', '1738205283_qr.png', 4, 4, '1738328542.jpg', '2025-01-30 02:48:03', '2025-01-31 13:02:23'),
(91, '8ffe5685-ad12-49fd-8daa-1d9e0be6eede', 'EIO3NQG68YT5', 'Apature Amaran FI', 'S/N -----------', 'Apature', 12, 'tersedia', NULL, '1738205355_qr.png', 4, 4, '1738328486.jpg', '2025-01-30 02:49:15', '2025-01-31 13:01:27'),
(92, 'f9d070a1-0430-4e74-8688-3d29cfd9115f', 'GFNW87MBUH1J', 'GoPro Hero 8 Black', 'S/N -------', 'GoPro', 3, 'tersedia', 'Action Cam', '1738205512_qr.png', 5, 5, '1738328594.jpg', '2025-01-30 02:51:52', '2025-03-25 02:01:27'),
(93, 'faf165f8-bc00-47df-a8ec-db31548597dd', 'B3OK945CJR0N', 'ZHIYUN CRANE 3 LAB', 'S/N -------', 'ZHIYUN', 8, 'tersedia', NULL, '1738205670_qr.png', 5, 5, '1738328435.jpg', '2025-01-30 02:54:30', '2025-01-31 13:00:35');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catatan`
--

CREATE TABLE `catatan` (
  `id` bigint UNSIGNED NOT NULL,
  `isi_catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catatan`
--

INSERT INTO `catatan` (`id`, `isi_catatan`, `created_at`, `updated_at`) VALUES
(1, '<ul data-spread=\"false\" data-pm-slice=\"3 3 []\">\r\n<li>\r\n<p>Barang yang rusak atau hilang menjadi tanggung jawab peminjam.</p>\r\n</li>\r\n<li>\r\n<p>Keterlambatan pengembalian dapat dikenakan sanksi.</p>\r\n</li>\r\n<li>\r\n<p>Gunakan barang sesuai keperluan dan dengan hati-hati.</p>\r\n</li>\r\n</ul>', NULL, '2025-02-11 01:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id`, `uuid`, `kode_peminjaman`, `kode_barang`, `created_at`, `updated_at`) VALUES
(1, '1cf18aa2-bbed-4d7b-973d-7a3a3a093ca5', 'PMB-1738378844', 'PRD0INCK4ZE2', '2025-02-01 03:00:44', '2025-02-01 03:00:44'),
(2, '0606727b-5b01-46b0-af67-1c12dd4d4223', 'PMB-1738378844', 'GIURT7M01VKB', '2025-02-01 03:00:44', '2025-02-01 03:00:44'),
(3, 'ea0c4b34-6679-4194-9b6d-7bc178db05df', 'PMB-1738378844', '5D3YEAO6FP0S', '2025-02-01 03:00:44', '2025-02-01 03:00:44'),
(10, 'ba54127c-5a5a-4b9f-ab67-3c44e00dbfc1', 'PMB-1740638791', 'RYI063Q87VOU', '2025-02-27 06:46:31', '2025-02-27 06:46:31'),
(11, 'b2fbb200-6405-4141-acb0-adfbf630318d', 'PMB-1740638791', '6KR9N57O8PQT', '2025-02-27 06:46:31', '2025-02-27 06:46:31'),
(12, '2ca792f0-d122-4283-9562-ee36b58b1da3', 'PMB-1740638791', 'JMKWA2X3E6BO', '2025-02-27 06:46:31', '2025-02-27 06:46:31'),
(13, 'c439ef5b-17a3-44a2-a0ac-f6d2b1ee0ac8', 'PMB-1740638791', '10H2VP893IWD', '2025-02-27 06:46:31', '2025-02-27 06:46:31'),
(14, '4ac98965-9674-4f9a-9f36-73da3f0978c6', 'PMB-1742959105', 'NFB9PJROLEIY', '2025-03-26 03:18:25', '2025-03-26 03:18:25'),
(15, 'b711f16e-8108-463c-9591-a2a06a86ba04', 'PMB-1742959105', 'RYI063Q87VOU', '2025-03-26 03:18:25', '2025-03-26 03:18:25'),
(16, '8fea44f8-f51a-483b-8780-047b441a3d05', 'PMB-1742959105', 'POXSQK8E0CNI', '2025-03-26 03:18:25', '2025-03-26 03:18:25'),
(17, '10e77bbb-470c-4422-87da-9db7255c7519', 'PMB-1742959105', 'O4UHPBMSD2K1', '2025-03-26 03:18:25', '2025-03-26 03:18:25');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id`, `uuid`, `kode_pengembalian`, `kode_barang`, `deskripsi`, `status`, `created_at`, `updated_at`) VALUES
(1, '645db9f9-c287-491d-8a5b-d4ed3040be17', 'PG-1738378912', 'PRD0INCK4ZE2', 'lecet', 'rusak', '2025-02-01 03:01:52', '2025-02-01 03:02:05'),
(2, 'ac1fd14e-2fbd-4813-a371-ea1fbef17a26', 'PG-1738378912', 'GIURT7M01VKB', 'Barang Telah Dikembalikan', 'belum_dikembalikan', '2025-02-01 03:01:52', '2025-02-01 03:01:52'),
(3, 'a69af05a-fa66-4d2a-910f-c27e63389cfe', 'PG-1738378912', '5D3YEAO6FP0S', 'Barang Telah Dikembalikan', 'baik', '2025-02-01 03:01:53', '2025-02-01 03:01:53'),
(15, '40846f0e-b39a-4ebd-9250-ff0e9d917b28', 'PG-1740639035', 'RYI063Q87VOU', 'Barang Telah Dikembalikan', 'baik', '2025-02-27 06:50:35', '2025-02-27 06:50:35'),
(16, '7c5cbfc8-ed65-420e-a026-4df269c3bf45', 'PG-1740639035', '6KR9N57O8PQT', 'ketukar', 'belum_dikembalikan', '2025-02-27 06:50:35', '2025-02-27 06:51:32'),
(17, '22206dc2-22a9-4767-a687-974e59ad89d6', 'PG-1740639035', 'JMKWA2X3E6BO', 'Barang Telah Dikembalikan', 'baik', '2025-02-27 06:50:35', '2025-02-27 06:50:35'),
(18, '7228f979-7a99-44a1-899d-d38ed5de6f12', 'PG-1740639035', '10H2VP893IWD', 'lensa pecah', 'rusak', '2025-02-27 06:50:35', '2025-02-27 06:51:32'),
(19, 'b4f18ccc-f6ef-4d68-85b0-f0932691310b', 'PG-1742959380', 'NFB9PJROLEIY', 'MASIH TERPAKAI', 'belum_dikembalikan', '2025-03-26 03:23:00', '2025-03-26 03:23:42'),
(20, '3282e615-88ee-43b5-b79f-4a1423aa1683', 'PG-1742959380', 'RYI063Q87VOU', 'Barang Telah Dikembalikan', 'baik', '2025-03-26 03:23:00', '2025-03-26 03:23:00'),
(21, 'd4de4997-d355-4dc8-a843-b8fb06139ca6', 'PG-1742959380', 'POXSQK8E0CNI', 'MASIHH TERPAKAI', 'belum_dikembalikan', '2025-03-26 03:23:00', '2025-03-26 03:23:42'),
(22, '830998ff-549e-4c42-9982-85af1e0e1881', 'PG-1742959380', 'O4UHPBMSD2K1', 'Barang Telah Dikembalikan', 'baik', '2025-03-26 03:23:00', '2025-03-26 03:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `guidebook`
--

CREATE TABLE `guidebook` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guidebook`
--

INSERT INTO `guidebook` (`id`, `uuid`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c55f24ea-5a33-4f5f-b947-811883780046', '1737377602.pdf', 'used', '2025-01-20 12:53:22', '2025-03-25 13:18:31');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `uuid`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, '9f679c46-2cfb-4b5a-9f77-fa34abadf897', 'Technical Director (TD)', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(2, 'd950f553-b3b5-409a-acc7-a60afc3b4bc7', 'Petugas Khusus', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(3, 'eae118b1-63b0-4159-ba77-295207c962fc', 'Administrator', '2024-12-26 16:38:11', '2024-12-26 16:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenis_barang`
--

INSERT INTO `jenis_barang` (`id`, `uuid`, `jenis_barang`, `created_at`, `updated_at`) VALUES
(1, '0c0c56d6-8ff2-45b7-9067-95451a69f3cb', 'Kamera', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(2, '4f68e354-c339-4760-b1cb-3a54364b67ee', 'Lensa', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(3, '6597d2e9-9e65-492e-95a4-20f25c70553a', 'Action Cam', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(4, 'df758baa-e723-49a3-ac90-47740370d085', 'Baterai', '2024-12-26 16:38:11', '2024-12-26 16:38:11'),
(5, 'd6b4ccba-7aa6-4165-a486-b9858476d155', 'Drone', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(6, '2757ecbb-3649-487f-8dca-b15cadc3590f', 'Mikropon', '2024-12-26 16:38:12', '2025-01-22 08:29:47'),
(7, 'c31dc3c7-dfcc-48fa-9b2d-baac0672b30b', 'Smartphone', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(8, 'ad6d171e-efac-4c4a-8d2f-8a776366d9c7', 'Perlengkapan', '2024-12-26 16:38:12', '2025-01-22 08:30:02'),
(9, '985a29df-cf9e-4f34-8d6c-372ce82889d3', 'Komunikasi', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(10, 'fb8906af-5b28-4daa-ba50-e3493138c4f5', 'Memori', '2024-12-26 16:38:12', '2025-01-22 08:30:10'),
(11, 'fb924501-f7b0-4754-91f1-351b0b961d0e', 'Laptop', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(12, 'a0f4e777-f99a-488d-8fbf-fd9d2a5f9f07', 'Lampu', '2025-01-22 08:30:23', '2025-01-22 08:30:23');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `waktu_login` timestamp NOT NULL,
  `gambar` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id`, `id_user`, `waktu_login`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-01-20 06:23:14', '678debd21eeaf.jpg', '2025-01-20 06:23:14', '2025-01-20 06:23:14'),
(2, 1, '2025-01-20 06:26:38', '678dec9e0e818.jpg', '2025-01-20 06:26:38', '2025-01-20 06:26:38'),
(3, 1, '2025-01-20 11:20:44', '678e318cb720e.jpg', '2025-01-20 11:20:44', '2025-01-20 11:20:44'),
(4, 1, '2025-01-22 00:53:36', '6790419019852.jpg', '2025-01-22 00:53:36', '2025-01-22 00:53:36'),
(5, 1, '2025-01-22 06:39:19', '679092970709f.jpg', '2025-01-22 06:39:19', '2025-01-22 06:39:19'),
(6, 1, '2025-01-22 06:42:32', '67909358ed32e.jpg', '2025-01-22 06:42:32', '2025-01-22 06:42:32'),
(7, 1, '2025-01-22 11:00:16', '6790cfc08e78a.jpg', '2025-01-22 11:00:16', '2025-01-22 11:00:16'),
(8, 1, '2025-01-24 01:25:29', '6792ec0907906.jpg', '2025-01-24 01:25:29', '2025-01-24 01:25:29'),
(9, 1, '2025-01-24 06:33:23', '6793343375301.jpg', '2025-01-24 06:33:23', '2025-01-24 06:33:23'),
(10, 1, '2025-01-24 07:10:45', '67933cf580dab.jpg', '2025-01-24 07:10:45', '2025-01-24 07:10:45'),
(11, 1, '2025-01-24 07:14:10', '67933dc2c4e07.jpg', '2025-01-24 07:14:10', '2025-01-24 07:14:10'),
(12, 1, '2025-01-24 07:22:47', NULL, '2025-01-24 07:22:47', '2025-01-24 07:22:47'),
(15, 1, '2025-01-27 10:33:51', '6797610f21c4c.jpg', '2025-01-27 10:33:51', '2025-01-27 10:33:51'),
(16, 1, '2025-01-27 10:36:03', '67976193dbc4d.jpg', '2025-01-27 10:36:03', '2025-01-27 10:36:03'),
(18, 1, '2025-01-30 01:02:45', '679acfb579a45.jpg', '2025-01-30 01:02:45', '2025-01-30 01:02:45'),
(19, 1, '2025-01-31 11:56:39', '679cba7766f37.jpg', '2025-01-31 11:56:39', '2025-01-31 11:56:39'),
(21, 1, '2025-01-31 12:30:02', '679cc24abd6b3.jpg', '2025-01-31 12:30:02', '2025-01-31 12:30:02'),
(22, 1, '2025-01-31 14:34:14', '679cdf6675c14.jpg', '2025-01-31 14:34:14', '2025-01-31 14:34:14'),
(23, 1, '2025-01-31 14:41:02', '679ce0fec962d.jpg', '2025-01-31 14:41:02', '2025-01-31 14:41:02'),
(25, 1, '2025-02-01 03:02:23', '679d8ebf2d3cc.jpg', '2025-02-01 03:02:23', '2025-02-01 03:02:23'),
(31, 1, '2025-02-03 03:36:24', '67a039b880a6e.jpg', '2025-02-03 03:36:24', '2025-02-03 03:36:24'),
(32, 1, '2025-02-07 00:57:57', '67a55a958b17c.jpg', '2025-02-07 00:57:57', '2025-02-07 00:57:57'),
(34, 1, '2025-02-09 00:04:55', '67a7f12788110.jpg', '2025-02-09 00:04:55', '2025-02-09 00:04:55'),
(36, 1, '2025-02-11 00:16:31', '67aa96df1bdde.jpg', '2025-02-11 00:16:31', '2025-02-11 00:16:31'),
(37, 1, '2025-02-11 00:27:39', '67aa997bea164.jpg', '2025-02-11 00:27:39', '2025-02-11 00:27:39'),
(38, 1, '2025-02-11 01:12:44', '67aaa40c7dbf0.jpg', '2025-02-11 01:12:44', '2025-02-11 01:12:44'),
(39, 1, '2025-02-11 06:03:47', '67aae84366ac4.jpg', '2025-02-11 06:03:47', '2025-02-11 06:03:47'),
(40, 1, '2025-02-12 00:32:01', '67abec0124389.jpg', '2025-02-12 00:32:01', '2025-02-12 00:32:01'),
(41, 1, '2025-02-12 03:26:03', '67ac14cb6f9c6.jpg', '2025-02-12 03:26:03', '2025-02-12 03:26:03'),
(42, 1, '2025-02-13 00:02:33', '67ad3699e64ab.jpg', '2025-02-13 00:02:33', '2025-02-13 00:02:33'),
(43, 1, '2025-02-13 02:12:39', '67ad55177845e.jpg', '2025-02-13 02:12:39', '2025-02-13 02:12:39'),
(44, 1, '2025-02-13 05:41:34', '67ad860e2fb13.jpg', '2025-02-13 05:41:34', '2025-02-13 05:41:34'),
(45, 1, '2025-02-16 22:50:11', '67b26ba36911a.jpg', '2025-02-16 22:50:11', '2025-02-16 22:50:11'),
(46, 1, '2025-02-17 00:47:41', '67b2872cece64.jpg', '2025-02-17 00:47:41', '2025-02-17 00:47:41'),
(49, 1, '2025-02-19 06:24:12', '67b5790ccc32a.jpg', '2025-02-19 06:24:12', '2025-02-19 06:24:12'),
(50, 1, '2025-02-19 06:32:44', '67b57b0c49d73.jpg', '2025-02-19 06:32:44', '2025-02-19 06:32:44'),
(51, 1, '2025-02-19 06:33:26', '67b57b360476c.jpg', '2025-02-19 06:33:26', '2025-02-19 06:33:26'),
(52, 1, '2025-02-19 06:42:39', '67b57d5f98780.jpg', '2025-02-19 06:42:39', '2025-02-19 06:42:39'),
(53, 1, '2025-02-19 12:06:44', '67b5c95442991.jpg', '2025-02-19 12:06:44', '2025-02-19 12:06:44'),
(54, 1, '2025-02-19 12:08:29', '67b5c9bdb4c8b.jpg', '2025-02-19 12:08:29', '2025-02-19 12:08:29'),
(56, 1, '2025-02-19 14:15:26', '67b5e77ed40f9.jpg', '2025-02-19 14:15:26', '2025-02-19 14:15:26'),
(57, 1, '2025-02-19 14:33:01', '67b5eb9d1d762.jpg', '2025-02-19 14:33:01', '2025-02-19 14:33:01'),
(58, 1, '2025-02-19 15:27:10', '67b5f84e4ea38.jpg', '2025-02-19 15:27:10', '2025-02-19 15:27:10'),
(59, 1, '2025-02-21 01:20:20', '67b7d4d4796c7.jpg', '2025-02-21 01:20:20', '2025-02-21 01:20:20'),
(61, 1, '2025-02-21 02:00:40', '67b7de48b4f0c.jpg', '2025-02-21 02:00:40', '2025-02-21 02:00:40'),
(65, 1, '2025-02-22 13:08:13', '67b9cc3d0d83e.jpg', '2025-02-22 13:08:13', '2025-02-22 13:08:13'),
(67, 1, '2025-02-23 13:14:16', '67bb1f2850506.jpg', '2025-02-23 13:14:16', '2025-02-23 13:14:16'),
(69, 1, '2025-02-23 13:26:42', '67bb2212620ef.jpg', '2025-02-23 13:26:42', '2025-02-23 13:26:42'),
(70, 1, '2025-02-24 00:12:30', '67bbb96e82494.jpg', '2025-02-24 00:12:30', '2025-02-24 00:12:30'),
(72, 1, '2025-02-24 01:24:42', '67bbca5a7b6df.jpg', '2025-02-24 01:24:42', '2025-02-24 01:24:42'),
(73, 1, '2025-02-24 01:51:20', '67bbd098e40c6.jpg', '2025-02-24 01:51:20', '2025-02-24 01:51:20'),
(74, 1, '2025-02-24 12:17:22', '67bc6352864b7.jpg', '2025-02-24 12:17:22', '2025-02-24 12:17:22'),
(78, 1, '2025-02-27 05:21:23', '67bff653a0b06.jpg', '2025-02-27 05:21:23', '2025-02-27 05:21:23'),
(79, 1, '2025-02-27 06:42:41', '67c0096189c49.jpg', '2025-02-27 06:42:41', '2025-02-27 06:42:41'),
(81, 1, '2025-02-27 06:52:09', '67c00b99a3a08.jpg', '2025-02-27 06:52:09', '2025-02-27 06:52:09'),
(82, 1, '2025-03-20 04:22:37', '67db980d9bdec.jpg', '2025-03-20 04:22:37', '2025-03-20 04:22:37'),
(83, 1, '2025-03-23 06:47:15', '67dfae7376f94.jpg', '2025-03-23 06:47:15', '2025-03-23 06:47:15'),
(84, 1, '2025-03-25 02:00:11', '67e20e2b07c4d.jpg', '2025-03-25 02:00:11', '2025-03-25 02:00:11'),
(85, 1, '2025-03-25 13:17:56', '67e2ad0495bfa.jpg', '2025-03-25 13:17:56', '2025-03-25 13:17:56'),
(86, 1, '2025-03-26 01:40:29', '67e35b0d1d999.jpg', '2025-03-26 01:40:29', '2025-03-26 01:40:29'),
(88, 1, '2025-03-26 01:48:30', '67e35ceeb7712.jpg', '2025-03-26 01:48:30', '2025-03-26 01:48:30'),
(89, 1, '2025-03-26 01:55:06', '67e35e7a7d7bc.jpg', '2025-03-26 01:55:06', '2025-03-26 01:55:06'),
(90, 1, '2025-03-26 01:55:34', '67e35e96102d8.jpg', '2025-03-26 01:55:34', '2025-03-26 01:55:34'),
(93, 1, '2025-03-26 02:00:04', '67e35fa4d94b9.jpg', '2025-03-26 02:00:04', '2025-03-26 02:00:04'),
(95, 1, '2025-03-26 03:25:58', '67e373c6585ea.jpg', '2025-03-26 03:25:58', '2025-03-26 03:25:58'),
(96, 1, '2025-04-02 02:45:57', '67eca4e5e2778.jpg', '2025-04-02 02:45:57', '2025-04-02 02:45:57'),
(97, 1, '2025-04-05 21:50:30', '67f1a5a629ecf.jpg', '2025-04-05 21:50:30', '2025-04-05 21:50:30'),
(98, 19, '2025-04-07 04:55:27', '67f35abf4843c.jpg', '2025-04-07 04:55:27', '2025-04-07 04:55:27'),
(99, 1, '2025-04-07 04:56:06', '67f35ae62b3f2.jpg', '2025-04-07 04:56:06', '2025-04-07 04:56:06'),
(100, 19, '2025-04-07 08:23:54', '67f38b9a88630.jpg', '2025-04-07 08:23:54', '2025-04-07 08:23:54'),
(101, 1, '2025-04-07 11:58:51', '67f3bdfbc5218.jpg', '2025-04-07 11:58:51', '2025-04-07 11:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_11_17_120946_create_jabatan_table', 1),
(2, '0001_01_01_000000_create_users_table', 1),
(3, '0001_01_01_000001_create_cache_table', 1),
(4, '0001_01_01_000002_create_jobs_table', 1),
(5, '2024_10_24_020418_create_jenis_barang_table', 1),
(6, '2024_10_24_020444_create_barang_table', 1),
(7, '2024_11_04_001540_create_peruntukan_table', 1),
(8, '2024_11_04_002537_create_perawatan_table', 1),
(9, '2024_11_04_002636_create_peminjaman_table', 1),
(10, '2024_11_04_002709_create_pengembalian_table', 1),
(11, '2024_11_05_061543_create_detail_peminjaman_table', 1),
(12, '2024_11_05_061552_create_detail_pengembalian_table', 1),
(13, '2024_12_22_182303_create_log_table', 1),
(14, '2024_12_27_083246_create_catatan_table', 1),
(15, '2025_01_20_134343_create_guidebook_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('akmalrahim376@gmail.com', '$2y$12$BFiCOjnpWB7QFehltrIPj.xxzH.Cijo0fXdy2.tME1GWs4fYTgAri', '2025-02-24 01:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peruntukan_id` bigint UNSIGNED NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `qr_code` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `uuid`, `kode_peminjaman`, `nomor_surat`, `nomor_peminjaman`, `peruntukan_id`, `tanggal_penggunaan`, `tanggal_peminjaman`, `tanggal_kembali`, `qr_code`, `peminjam`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c1815042-aa3e-4145-b854-3d5baf1167d4', 'PMB-1738378844', 'SRT-001', 'PMJ-202502-01', 6, '2025-02-01', '2025-02-01', '2025-02-10', '1738378844_qr.png', 'Maireza', 'Selesai', '2025-02-01 03:00:44', '2025-02-01 03:01:52'),
(4, '9dc77e4d-b1c4-4b2c-bd80-a2475a7f20d6', 'PMB-1740638791', 'surattest01', 'PMJ-202502-02', 9, '2025-02-27', '2025-02-27', '2025-03-06', '1740638791_qr.svg', 'User Tester', 'Selesai', '2025-02-27 06:46:31', '2025-02-27 06:50:35'),
(5, '19883bf6-ee60-4262-b2cd-17dc05d6fd03', 'PMB-1742959105', 'SURAT TUGAS 1', 'PMJ-202503-01', 2, '2025-03-26', '2025-03-26', '2025-03-28', '1742959105_qr.svg', 'Maireza', 'Selesai', '2025-03-26 03:18:25', '2025-03-26 03:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_peminjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `peminjam` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `uuid`, `kode_pengembalian`, `kode_peminjaman`, `tanggal_kembali`, `peminjam`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c0e045c1-e013-4da0-b760-225354c8b1d1', 'PG-1738378912', 'PMB-1738378844', '2025-02-01', 'Maireza', 'Lengkap', '2025-02-01 03:01:52', '2025-02-01 03:01:53'),
(6, 'b87ca3e3-9c35-4563-ada2-1fc7cde81f79', 'PG-1740639035', 'PMB-1740638791', '2025-02-27', 'User Tester', 'Tidak Lengkap', '2025-02-27 06:50:35', '2025-02-27 06:50:35'),
(7, '3d40231c-99b8-449e-a03e-60cd04e9075a', 'PG-1742959380', 'PMB-1742959105', '2025-03-26', 'Maireza', 'Tidak Lengkap', '2025-03-26 03:23:00', '2025-03-26 03:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_perawatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peruntukan`
--

CREATE TABLE `peruntukan` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peruntukan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peruntukan`
--

INSERT INTO `peruntukan` (`id`, `uuid`, `peruntukan`, `created_at`, `updated_at`) VALUES
(1, '3714cba4-b71c-4edd-993a-4e84fc5a654b', 'Inspirasi Indonesia', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(2, 'ac4f4507-bb9c-406e-9fbd-a8c0aabfc77c', 'Pesona Indonesia', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(3, '62853ead-d1ab-494f-8170-d0dcb38cbfb2', 'Anak Indonesia', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(4, '66328ae1-a97b-49d0-9a1a-91335cb66182', 'Jejak Islam', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(5, '6857f954-cb13-43c1-bcc1-04fbe9bf4b83', 'Potensi Banua', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(6, '92fa4944-bfbc-4d5b-b093-0e963e304b20', 'Lensa Olahraga', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(7, '6ffa997f-c308-4db2-b695-2338fbcc8779', 'Live Cross', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(8, 'fc4a3aaf-c3e6-4fe8-93a6-f9faaec794b6', 'Dangdut Keliling', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(9, 'b93b98c0-b2fc-4acb-ab02-690b6609e785', 'Reformasi Birokrasi', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(10, '6bfc9ab6-d3b0-425c-8904-88dcb78c052e', 'Hari yang Berkah', '2024-12-26 16:38:12', '2024-12-26 16:38:12'),
(13, 'a8d16d2c-de5b-4262-80eb-f6d92cd2f24c', 'Lainnya', '2025-03-26 02:06:42', '2025-03-26 02:06:42');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jJTFV7584j9GbU43A8GWzu8HYZGj9I4ObE6SCpSi', 19, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il9mbGFzaCI7YToyOntzOjM6Im5ldyI7YTowOnt9czozOiJvbGQiO2E6MDp7fX1zOjY6Il90b2tlbiI7czo0MDoibFJ1aWpUZ2UwaGlHNGlpOW1SbDVpczZydUMzS1I4TXRQNkI3MTJadSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZXJhd2F0YW4vYmFyYW5nLWJlbHVtLWRpa2VtYmFsaWthbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE5O3M6MTY6InBhc3N3b3JkVmVyaWZpZWQiO2I6MTt9', 1744017037),
('tYfJOqKO5AUnJmgfkn44wGBUyzq8nwBTbc7hFAix', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoidVlCRmU5dEpZT003amxVaUVYZ1JiZVJqYWxkRTRzekhSMmJGdXZCdiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW5nZW1iYWxpYW4iO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTY6InBhc3N3b3JkVmVyaWZpZWQiO2I6MTt9', 1744028245);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nomor_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_id` bigint UNSIGNED NOT NULL,
  `qr_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `nama_lengkap`, `kode_user`, `email`, `nip`, `nomor_hp`, `jabatan_id`, `qr_code`, `role`, `email_verified_at`, `password`, `foto`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '6224d1fd-14f3-4857-885a-3be2adad362d', 'Superadmin', 'USR061224', 'akmalrahim376@gmail.com', '1992345657435123', '089234898765', 1, '1735259891_qr.png', 'superadmin', NULL, '$2y$12$TfzJEvrLGEgqsGHqkn8iweCK2S9U655VfTAV6YZxrpc73Pi5Thh6e', '1743563516.jpg', 'aVz3X8Cy3sKNiNy1QPB3GiXMrOEvYZSiVd7qFAVDmD2Eur5LW40B0K0PfqNM', '2024-12-26 16:38:11', '2025-04-02 03:11:57'),
(19, 'fdd7e00e-26c2-40e9-b12d-e0c243e28597', 'Superadmin ESIMPROD', 'USR68284', 'tvriweb@gmail.com', '199125653821', '081352680699', 1, '1743890223_qr.svg', 'superadmin', NULL, '$2y$12$sTvlKyapbQgZ5RiXwsI6ium9GCurvg1Msx1Ar8MEPfcrHx9NpsW3y', NULL, NULL, '2025-04-05 21:57:04', '2025-04-05 21:57:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barang_kode_barang_unique` (`kode_barang`),
  ADD KEY `barang_jenis_barang_id_foreign` (`jenis_barang_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `catatan`
--
ALTER TABLE `catatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_peminjaman_kode_peminjaman_foreign` (`kode_peminjaman`),
  ADD KEY `detail_peminjaman_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pengembalian_kode_pengembalian_foreign` (`kode_pengembalian`),
  ADD KEY `detail_pengembalian_kode_barang_foreign` (`kode_barang`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guidebook`
--
ALTER TABLE `guidebook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_id_user_foreign` (`id_user`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `peminjaman_kode_peminjaman_unique` (`kode_peminjaman`),
  ADD KEY `peminjaman_peruntukan_id_foreign` (`peruntukan_id`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pengembalian_kode_pengembalian_unique` (`kode_pengembalian`),
  ADD KEY `pengembalian_kode_peminjaman_foreign` (`kode_peminjaman`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `perawatan_kode_perawatan_unique` (`kode_perawatan`);

--
-- Indexes for table `peruntukan`
--
ALTER TABLE `peruntukan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_kode_user_unique` (`kode_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nip_unique` (`nip`),
  ADD KEY `users_jabatan_id_foreign` (`jabatan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `catatan`
--
ALTER TABLE `catatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guidebook`
--
ALTER TABLE `guidebook`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peruntukan`
--
ALTER TABLE `peruntukan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_jenis_barang_id_foreign` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barang` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD CONSTRAINT `detail_peminjaman_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_peminjaman_kode_peminjaman_foreign` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`) ON DELETE CASCADE;

--
-- Constraints for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD CONSTRAINT `detail_pengembalian_kode_barang_foreign` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`) ON DELETE CASCADE,
  ADD CONSTRAINT `detail_pengembalian_kode_pengembalian_foreign` FOREIGN KEY (`kode_pengembalian`) REFERENCES `pengembalian` (`kode_pengembalian`) ON DELETE CASCADE;

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_peruntukan_id_foreign` FOREIGN KEY (`peruntukan_id`) REFERENCES `peruntukan` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_kode_peminjaman_foreign` FOREIGN KEY (`kode_peminjaman`) REFERENCES `peminjaman` (`kode_peminjaman`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_jabatan_id_foreign` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
