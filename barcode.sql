-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 17, 2025 lúc 08:39 AM
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
-- Cơ sở dữ liệu: `barcode`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id_category` varchar(4) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id_category`, `name_category`) VALUES
('10', 'Bàn'),
('11', 'Bảng'),
('12', 'Ghế'),
('13', 'Đồng hồ'),
('14', 'Tủ'),
('15', 'Giá'),
('16', 'Hộc'),
('17', 'Kệ'),
('18', 'Rèm'),
('19', 'Vách'),
('20', 'Máy in'),
('21', 'Máy tính'),
('22', 'Modul'),
('23', 'Thực hành'),
('24', 'Quạt'),
('25', 'Điều hòa'),
('26', 'Đèn'),
('31', 'giấy'),
('32', 'Bút'),
('33', 'Chén');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `full_information`
--

CREATE TABLE `full_information` (
  `product_group` varchar(4) NOT NULL,
  `product_category` varchar(4) NOT NULL,
  `product_name` varchar(3) NOT NULL,
  `year_import` varchar(4) NOT NULL,
  `item` varchar(4) NOT NULL,
  `barcode` varchar(36) NOT NULL DEFAULT uuid(),
  `product_information` text DEFAULT NULL,
  `Warranty_Period` date DEFAULT NULL,
  `product_status` varchar(50) NOT NULL,
  `units` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `full_information`
--

INSERT INTO `full_information` (`product_group`, `product_category`, `product_name`, `year_import`, `item`, `barcode`, `product_information`, `Warranty_Period`, `product_status`, `units`) VALUES
('01', '10', 'BLV', 'A01', '0001', '0110BLVA010001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT'),
('01', '10', 'BLV', 'A01', '0002', '0110BLVA010002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT'),
('01', '10', 'BLV', 'A01', '0003', '0110BLVA010003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'KOT'),
('01', '10', 'BLV', 'A01', '0004', '0110BLVA010004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'LKT'),
('01', '10', 'BLV', 'A01', '0005', '0110BLVA010005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT'),
('01', '10', 'BLV', 'A01', '0006', '0110BLVA010006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT'),
('01', '10', 'BLV', 'A01', '0007', '0110BLVA010007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC'),
('01', '10', 'BLV', 'A01', '0008', '0110BLVA010008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC'),
('01', '10', 'BLV', 'A01', '0009', '0110BLVA010009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC'),
('01', '10', 'BLV', 'A01', '0010', '0110BLVA010010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT'),
('01', '10', 'BLV', 'A17', '0011', '0110BLVA170011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', 'CNT'),
('02', '21', 'PCD', 'A15', '0001', '0221PCDA150001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT'),
('02', '21', 'PCD', 'A15', '0002', '0221PCDA150002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT'),
('02', '21', 'PCD', 'A15', '0003', '0221PCDA150003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT'),
('02', '21', 'PCD', 'A15', '0004', '0221PCDA150004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT'),
('02', '21', 'PCD', 'A15', '0005', '0221PCDA150005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0001', '0221PCTA150001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0002', '0221PCTA150002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0003', '0221PCTA150003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0004', '0221PCTA150004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0005', '0221PCTA150005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '21', 'PCT', 'A15', '0006', '0221PCTA150006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT'),
('02', '23', 'ACV', 'A17', '0001', '0223ACVA170001', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT'),
('02', '23', 'ACV', 'A17', '0002', '0223ACVA170002', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT'),
('02', '23', 'ACV', 'A17', '0003', '0223ACVA170003', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT'),
('02', '23', 'ACV', 'A17', '0004', '0223ACVA170004', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT'),
('02', '23', 'ACV', 'A17', '0005', '0223ACVA170005', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT'),
('02', '23', 'ADM', 'A17', '0001', '0223ADMA170001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT'),
('02', '23', 'ADM', 'A17', '0002', '0223ADMA170002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT'),
('02', '23', 'ADM', 'A17', '0003', '0223ADMA170003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT'),
('02', '23', 'ADM', 'A17', '0004', '0223ADMA170004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', 'CNT'),
('03', '26', 'DAT', 'A17', '0001', '0326DATA170001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT'),
('03', '26', 'DAT', 'A17', '0002', '0326DATA170002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT'),
('03', '26', 'DAT', 'A17', '0003', '0326DATA170003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT'),
('03', '26', 'DAT', 'A17', '0004', '0326DATA170004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT'),
('03', '26', 'DAT', 'A17', '0005', '0326DATA170005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC'),
('03', '26', 'DAT', 'A17', '0006', '0326DATA170006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC'),
('03', '26', 'DAT', 'A17', '0007', '0326DATA170007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC'),
('03', '26', 'DAT', 'A17', '0008', '0326DATA170008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0009', '0326DATA170009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0010', '0326DATA170010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0011', '0326DATA170011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'KOT'),
('03', '26', 'DAT', 'A17', '0012', '0326DATA170012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0013', '0326DATA170013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0014', '0326DATA170014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0015', '0326DATA170015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD'),
('03', '26', 'DAT', 'A17', '0016', '0326DATA170016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT'),
('03', '26', 'DAT', 'A17', '0017', '0326DATA170017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT'),
('03', '26', 'DAT', 'A17', '0018', '0326DATA170018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT'),
('03', '26', 'DAT', 'A17', '0019', '0326DATA170019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'TCN'),
('03', '26', 'DAT', 'A17', '0020', '0326DATA170020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'TCN');

--
-- Bẫy `full_information`
--
DELIMITER $$
CREATE TRIGGER `after_update_full_information` AFTER UPDATE ON `full_information` FOR EACH ROW begin
			insert into user_choices(
				product_group,
                product_category,
                product_name,
                year_import,
                item,
                barcode,
                product_information,
                product_status,
                Warranty_Period,
                units
                )
			values(
				NEW.product_group,
                NEW.product_category,
                NEW.product_name,
                NEW.year_import,
                NEW.item,
                NEW.barcode,
                NEW.product_information,
                NEW.product_status,
                NEW.Warranty_Period,
                NEW.units
            );
		END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_product`
--

CREATE TABLE `group_product` (
  `id_group` varchar(4) NOT NULL,
  `name_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `group_product`
--

INSERT INTO `group_product` (`id_group`, `name_group`) VALUES
('01', 'Nội Thất'),
('02', 'Điện Tử'),
('03', 'Thiết Yếu ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item`
--

CREATE TABLE `item` (
  `id_item` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` varchar(3) NOT NULL,
  `name_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_product`) VALUES
('ACV', 'Thiết bị'),
('ADM', 'AC Voltarmeter AVM25R'),
('BBX', 'bi'),
('BFC', 'Foocmica'),
('BLV', 'Làm việc'),
('BUN', 'Uống nước'),
('CSN', 'sứ'),
('DAT', 'Led Âm Tường'),
('DHN', 'Nhiệt Độ'),
('DHT', 'Treo Tường'),
('EFS', 'Multimeter 856'),
('FMA', 'FM/AM Signal Generator'),
('GA4', 'A4'),
('GDC', 'Cốc'),
('GIN', 'Inox'),
('GSF', 'Sofa'),
('HDD', 'Di Động'),
('KCS', 'Kenwood 102312347_CS-4025'),
('KĐĐ', 'Để Đồ'),
('LFM', 'Wow & Futtermeter-LFM3616'),
('MIA', 'Hai Mặt'),
('MTH', 'Mạch'),
('OOS', 'Oscillscope OS 5030'),
('PCD', 'Đồng Bộ'),
('PCT', 'Để Bàn'),
('QCD', 'Cây'),
('RCN', 'Cửa Nhựa'),
('THS', 'Hồ Sơ'),
('VTT', 'Trang Trí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `status_product`
--

CREATE TABLE `status_product` (
  `status_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `status_product`
--

INSERT INTO `status_product` (`status_product`) VALUES
('active'),
('inactive'),
('maintenance');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `units`
--

CREATE TABLE `units` (
  `id_units` varchar(3) NOT NULL,
  `units` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `units`
--

INSERT INTO `units` (`id_units`, `units`) VALUES
('CNT', 'Công Nghệ Thông Tin'),
('KOT', 'Kỹ Thuật Ô Tô'),
('LKT', 'Luật'),
('QHC', 'Quan Hệ Công Chúng Và Truyền Thông'),
('QTD', 'Quản Trị Kinh Doanh'),
('TCN', 'Tài Chính Ngân Hàng'),
('YCT', 'Y Học Cổ Truyền');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `units` varchar(255) NOT NULL,
  `use_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_account`
--

INSERT INTO `user_account` (`id`, `username`, `user_password`, `units`, `use_role`) VALUES
(1, 'admin1', 'admin123', 'CNT', 'Admin'),
(2, 'user1', 'user123', 'KOT', 'User'),
(3, 'admin2', 'securepass', 'LKT', 'Admin'),
(4, 'user2', 'pass456', 'QHC', 'User'),
(5, 'admin3', 'strongpass', 'CNT', 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_choices`
--

CREATE TABLE `user_choices` (
  `Id` int(11) NOT NULL,
  `barcode` varchar(36) DEFAULT NULL,
  `product_group` varchar(4) DEFAULT NULL,
  `product_category` varchar(4) DEFAULT NULL,
  `product_name` varchar(3) DEFAULT NULL,
  `year_import` varchar(4) DEFAULT NULL,
  `item` varchar(4) DEFAULT NULL,
  `product_information` text DEFAULT NULL,
  `Warranty_Period` date DEFAULT NULL,
  `product_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `units` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_choices`
--

INSERT INTO `user_choices` (`Id`, `barcode`, `product_group`, `product_category`, `product_name`, `year_import`, `item`, `product_information`, `Warranty_Period`, `product_status`, `created_at`, `units`) VALUES
(1, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(2, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(3, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(4, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(5, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(6, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL),
(7, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL),
(8, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL),
(9, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL),
(10, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL),
(11, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL),
(12, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(13, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(14, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(15, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(16, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(17, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(18, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(19, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(20, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(21, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(22, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(23, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(24, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(25, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(26, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(27, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(28, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL),
(29, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(30, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(31, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(32, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(33, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL),
(34, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(35, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(36, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(37, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(38, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(39, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(40, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(41, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(42, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(43, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(44, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(45, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(46, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(47, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(48, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(49, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(50, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL),
(51, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(52, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(53, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(54, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(55, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL),
(56, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(57, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(58, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(59, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(60, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(61, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(62, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(63, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(64, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(65, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(66, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(67, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(68, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(69, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(70, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(71, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(72, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL),
(73, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(74, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(75, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(76, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(77, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL),
(78, NULL, '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT'),
(79, NULL, '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT'),
(80, NULL, '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'KOT'),
(81, NULL, '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'LKT'),
(82, NULL, '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT'),
(83, NULL, '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT'),
(84, NULL, '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC'),
(85, NULL, '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC'),
(86, NULL, '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC'),
(87, NULL, '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT'),
(88, NULL, '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:05:07', 'CNT'),
(89, NULL, '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(90, NULL, '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(91, NULL, '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(92, NULL, '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(93, NULL, '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(94, NULL, '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(95, NULL, '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(96, NULL, '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(97, NULL, '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(98, NULL, '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(99, NULL, '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT'),
(100, NULL, '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT'),
(101, NULL, '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT'),
(102, NULL, '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT'),
(103, NULL, '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT'),
(104, NULL, '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC'),
(105, NULL, '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC'),
(106, NULL, '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC'),
(107, NULL, '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT'),
(108, NULL, '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT'),
(109, NULL, '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT'),
(110, NULL, '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'KOT'),
(111, NULL, '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD'),
(112, NULL, '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD'),
(113, NULL, '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD'),
(114, NULL, '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD'),
(115, NULL, '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT'),
(116, NULL, '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT'),
(117, NULL, '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT'),
(118, NULL, '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'TCN'),
(119, NULL, '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'TCN'),
(120, NULL, '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT'),
(121, NULL, '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT'),
(122, NULL, '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT'),
(123, NULL, '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT'),
(124, NULL, '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT'),
(125, NULL, '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(126, NULL, '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(127, NULL, '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT'),
(128, NULL, '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:05:07', 'CNT'),
(129, NULL, '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT'),
(130, NULL, '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT'),
(131, NULL, '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'KOT'),
(132, NULL, '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'LKT'),
(133, NULL, '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT'),
(134, NULL, '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT'),
(135, NULL, '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC'),
(136, NULL, '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC'),
(137, NULL, '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC'),
(138, NULL, '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT'),
(139, NULL, '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:14:13', 'CNT'),
(140, NULL, '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(141, NULL, '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(142, NULL, '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(143, NULL, '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(144, NULL, '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(145, NULL, '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(146, NULL, '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(147, NULL, '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(148, NULL, '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(149, NULL, '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(150, NULL, '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT'),
(151, NULL, '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT'),
(152, NULL, '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT'),
(153, NULL, '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT'),
(154, NULL, '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT'),
(155, NULL, '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC'),
(156, NULL, '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC'),
(157, NULL, '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC'),
(158, NULL, '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT'),
(159, NULL, '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT'),
(160, NULL, '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT'),
(161, NULL, '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'KOT'),
(162, NULL, '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD'),
(163, NULL, '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD'),
(164, NULL, '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD'),
(165, NULL, '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD'),
(166, NULL, '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT'),
(167, NULL, '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT'),
(168, NULL, '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT'),
(169, NULL, '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'TCN'),
(170, NULL, '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'TCN'),
(171, NULL, '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT'),
(172, NULL, '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT'),
(173, NULL, '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT'),
(174, NULL, '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT'),
(175, NULL, '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT'),
(176, NULL, '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(177, NULL, '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(178, NULL, '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT'),
(179, NULL, '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:14:13', 'CNT'),
(180, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT'),
(181, '0110BLVA010002', '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT'),
(182, '0110BLVA010003', '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'KOT'),
(183, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'LKT'),
(184, '0110BLVA010005', '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT'),
(185, '0110BLVA010006', '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT'),
(186, '0110BLVA010007', '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC'),
(187, '0110BLVA010008', '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC'),
(188, '0110BLVA010009', '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC'),
(189, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT'),
(190, '0110BLVA170011', '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:16:06', 'CNT'),
(191, '0221PCDA150001', '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(192, '0221PCDA150002', '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(193, '0221PCDA150003', '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(194, '0221PCDA150004', '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(195, '0221PCDA150005', '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(196, '0221PCTA150001', '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(197, '0221PCTA150002', '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(198, '0221PCTA150003', '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(199, '0221PCTA150004', '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(200, '0221PCTA150005', '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(201, '0221PCTA150006', '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT'),
(202, '0326DATA170001', '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT'),
(203, '0326DATA170002', '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT'),
(204, '0326DATA170003', '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT'),
(205, '0326DATA170004', '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT'),
(206, '0326DATA170005', '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC'),
(207, '0326DATA170006', '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC'),
(208, '0326DATA170007', '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC'),
(209, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT'),
(210, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT'),
(211, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT'),
(212, '0326DATA170011', '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'KOT'),
(213, '0326DATA170012', '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD'),
(214, '0326DATA170013', '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD'),
(215, '0326DATA170014', '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD'),
(216, '0326DATA170015', '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD'),
(217, '0326DATA170016', '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT'),
(218, '0326DATA170017', '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT'),
(219, '0326DATA170018', '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT'),
(220, '0326DATA170019', '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'TCN'),
(221, '0326DATA170020', '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'TCN'),
(222, '0223ACVA170001', '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT'),
(223, '0223ACVA170002', '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT'),
(224, '0223ACVA170003', '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT'),
(225, '0223ACVA170004', '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT'),
(226, '0223ACVA170005', '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT'),
(227, '0223ADMA170001', '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(228, '0223ADMA170002', '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(229, '0223ADMA170003', '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT'),
(230, '0223ADMA170004', '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:16:06', 'CNT'),
(231, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT'),
(232, '0110BLVA010002', '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT'),
(233, '0110BLVA010003', '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'KOT'),
(234, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'LKT'),
(235, '0110BLVA010005', '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT'),
(236, '0110BLVA010006', '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT'),
(237, '0110BLVA010007', '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC'),
(238, '0110BLVA010008', '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC'),
(239, '0110BLVA010009', '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC'),
(240, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT'),
(241, '0110BLVA170011', '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:36:13', 'CNT'),
(242, '0221PCDA150001', '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(243, '0221PCDA150002', '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(244, '0221PCDA150003', '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(245, '0221PCDA150004', '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(246, '0221PCDA150005', '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(247, '0221PCTA150001', '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(248, '0221PCTA150002', '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(249, '0221PCTA150003', '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(250, '0221PCTA150004', '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(251, '0221PCTA150005', '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(252, '0221PCTA150006', '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT'),
(253, '0326DATA170001', '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT'),
(254, '0326DATA170002', '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT'),
(255, '0326DATA170003', '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT'),
(256, '0326DATA170004', '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT'),
(257, '0326DATA170005', '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC'),
(258, '0326DATA170006', '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC'),
(259, '0326DATA170007', '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC'),
(260, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT'),
(261, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT'),
(262, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT'),
(263, '0326DATA170011', '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'KOT'),
(264, '0326DATA170012', '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD'),
(265, '0326DATA170013', '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD'),
(266, '0326DATA170014', '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD'),
(267, '0326DATA170015', '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD'),
(268, '0326DATA170016', '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT'),
(269, '0326DATA170017', '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT'),
(270, '0326DATA170018', '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT'),
(271, '0326DATA170019', '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'TCN'),
(272, '0326DATA170020', '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'TCN'),
(273, '0223ACVA170001', '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT'),
(274, '0223ACVA170002', '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT'),
(275, '0223ACVA170003', '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT'),
(276, '0223ACVA170004', '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT'),
(277, '0223ACVA170005', '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT'),
(278, '0223ADMA170001', '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(279, '0223ADMA170002', '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(280, '0223ADMA170003', '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT'),
(281, '0223ADMA170004', '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:36:13', 'CNT'),
(282, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD'),
(283, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD'),
(284, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `year_import`
--

CREATE TABLE `year_import` (
  `id_year` varchar(3) NOT NULL,
  `year_import` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `year_import`
--

INSERT INTO `year_import` (`id_year`, `year_import`) VALUES
('A01', '2008'),
('A02', '2009'),
('A03', '2010'),
('A04', '2011'),
('A05', '2012'),
('A06', '2013'),
('A07', '2014'),
('A08', '2015'),
('A09', '2016'),
('A10', '2017'),
('A11', '2018'),
('A12', '2019'),
('A13', '2020'),
('A14', '2021'),
('A15', '2022'),
('A16', '2023'),
('A17', '2024');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `full_information`
--
ALTER TABLE `full_information`
  ADD PRIMARY KEY (`barcode`),
  ADD KEY `fk_product_category` (`product_category`),
  ADD KEY `fk_product_name` (`product_name`),
  ADD KEY `fk_year_import` (`year_import`),
  ADD KEY `fk_units` (`units`),
  ADD KEY `fk_product_group` (`product_group`),
  ADD KEY `fk_status` (`product_status`);

--
-- Chỉ mục cho bảng `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`id_group`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `status_product`
--
ALTER TABLE `status_product`
  ADD PRIMARY KEY (`status_product`);

--
-- Chỉ mục cho bảng `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_units`);

--
-- Chỉ mục cho bảng `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_choices`
--
ALTER TABLE `user_choices`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `year_import`
--
ALTER TABLE `year_import`
  ADD PRIMARY KEY (`id_year`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `user_choices`
--
ALTER TABLE `user_choices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=285;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `full_information`
--
ALTER TABLE `full_information`
  ADD CONSTRAINT `fk_product_category` FOREIGN KEY (`product_category`) REFERENCES `category_product` (`id_category`),
  ADD CONSTRAINT `fk_product_group` FOREIGN KEY (`product_group`) REFERENCES `group_product` (`id_group`),
  ADD CONSTRAINT `fk_product_name` FOREIGN KEY (`product_name`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`product_status`) REFERENCES `status_product` (`status_product`),
  ADD CONSTRAINT `fk_units` FOREIGN KEY (`units`) REFERENCES `units` (`id_units`),
  ADD CONSTRAINT `fk_year_import` FOREIGN KEY (`year_import`) REFERENCES `year_import` (`id_year`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
