-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 18, 2025 at 06:23 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id_category` varchar(4) NOT NULL,
  `name_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id_category`, `name_category`) VALUES
('10', 'Bàn'),
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
-- Table structure for table `full_information`
--

CREATE TABLE `full_information` (
  `product_group` varchar(4) NOT NULL,
  `product_category` varchar(4) NOT NULL,
  `product_name` varchar(3) NOT NULL,
  `year_import` varchar(4) NOT NULL,
  `item` varchar(4) NOT NULL,
  `barcode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_information` text DEFAULT NULL,
  `Warranty_Period` date DEFAULT NULL,
  `product_status` varchar(50) NOT NULL,
  `units` varchar(3) DEFAULT NULL,
  `old_unit` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `full_information`
--

INSERT INTO `full_information` (`product_group`, `product_category`, `product_name`, `year_import`, `item`, `barcode`, `product_information`, `Warranty_Period`, `product_status`, `units`, `old_unit`, `note`) VALUES
('01', '10', 'ACV', 'A01', '0001', '0110ACVA010001', 'test scan', '2025-04-27', 'active', 'CNT', 'LKT', 'test ghi chu'),
('01', '10', 'ACV', 'A01', '0005', '0110ACVA010005', 'rwer', '2025-05-06', 'active', 'KOT', 'NaN', ''),
('01', '10', 'ACV', 'A01', '0006', '0110ACVA010006', 'werwewrsdefsdfsvxcqwr353453', '2025-05-07', 'Dispose', 'LKT', NULL, ''),
('01', '10', 'ACV', 'A03', '0001', '0110ACVA030001', 'test100', '2025-05-11', 'active', 'NaN', NULL, ''),
('01', '10', 'ACV', 'A04', '0001', '0110ACVA040001', 'aaa', '2025-05-14', 'maintenance', 'CNT', 'NaN', ''),
('01', '10', 'BLV', 'A01', '0002', '0110BLVA010002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT', NULL, NULL),
('01', '10', 'BLV', 'A01', '0003', '0110BLVA010003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'KOT', NULL, NULL),
('01', '10', 'BLV', 'A01', '0004', '0110BLVA010004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', 'LKT', NULL, NULL),
('01', '10', 'BLV', 'A01', '0005', '0110BLVA010005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT', NULL, NULL),
('01', '10', 'BLV', 'A01', '0006', '0110BLVA010006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'CNT', NULL, NULL),
('01', '10', 'BLV', 'A01', '0007', '0110BLVA010007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC', NULL, NULL),
('01', '10', 'BLV', 'A01', '0008', '0110BLVA010008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC', NULL, NULL),
('01', '10', 'BLV', 'A01', '0009', '0110BLVA010009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', 'QHC', NULL, NULL),
('01', '10', 'BLV', 'A01', '0010', '0110BLVA010010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', 'YCT', 'CNT', ''),
('01', '10', 'BLV', 'A17', '0011', '0110BLVA170011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'Dispose', 'CNT', NULL, NULL),
('02', '21', 'ADM', 'A08', '0001', '0221ADMA080001', 'test thêm tài sản', '2025-05-12', 'active', 'NaN', NULL, ''),
('02', '21', 'PCD', 'A15', '0001', '0221PCDA150001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCD', 'A15', '0002', '0221PCDA150002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCD', 'A15', '0003', '0221PCDA150003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCD', 'A15', '0004', '0221PCDA150004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCD', 'A15', '0005', '0221PCDA150005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0001', '0221PCTA150001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0002', '0221PCTA150002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0003', '0221PCTA150003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0004', '0221PCTA150004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0005', '0221PCTA150005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '21', 'PCT', 'A15', '0006', '0221PCTA150006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', 'CNT', NULL, NULL),
('02', '23', 'ACV', 'A17', '0001', '0223ACVA170001', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT', NULL, NULL),
('02', '23', 'ACV', 'A17', '0002', '0223ACVA170002', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT', NULL, NULL),
('02', '23', 'ACV', 'A17', '0003', '0223ACVA170003', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT', NULL, NULL),
('02', '23', 'ACV', 'A17', '0004', '0223ACVA170004', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT', NULL, NULL),
('02', '23', 'ACV', 'A17', '0005', '0223ACVA170005', 'AC Voltameter AVM25R', '2026-06-30', 'active', 'CNT', NULL, NULL),
('02', '23', 'ADM', 'A17', '0001', '0223ADMA170001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT', NULL, NULL),
('02', '23', 'ADM', 'A17', '0002', '0223ADMA170002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT', NULL, NULL),
('02', '23', 'ADM', 'A17', '0003', '0223ADMA170003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', 'CNT', NULL, NULL),
('02', '23', 'ADM', 'A17', '0004', '0223ADMA170004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'maintenance', 'CNT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0001', '0326DATA170001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0002', '0326DATA170002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0003', '0326DATA170003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0004', '0326DATA170004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'CNT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0005', '0326DATA170005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC', NULL, NULL),
('03', '26', 'DAT', 'A17', '0006', '0326DATA170006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC', NULL, NULL),
('03', '26', 'DAT', 'A17', '0007', '0326DATA170007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QHC', NULL, NULL),
('03', '26', 'DAT', 'A17', '0008', '0326DATA170008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0009', '0326DATA170009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0010', '0326DATA170010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0011', '0326DATA170011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'KOT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0012', '0326DATA170012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0013', '0326DATA170013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0014', '0326DATA170014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0015', '0326DATA170015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'QTD', NULL, NULL),
('03', '26', 'DAT', 'A17', '0016', '0326DATA170016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0017', '0326DATA170017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0018', '0326DATA170018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'YCT', NULL, NULL),
('03', '26', 'DAT', 'A17', '0019', '0326DATA170019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'TCN', NULL, NULL),
('03', '26', 'DAT', 'A17', '0020', '0326DATA170020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', 'TCN', NULL, NULL),
('03', '33', 'BLV', 'A03', '0001', '0333BLVA030001', '124124', '2332-12-31', 'active', 'KOT', NULL, ''),
('10', '33', 'VTT', 'A01', '0001', '1033VTTA010001', 'test', '2025-05-18', 'active', 'CNT', NULL, '');

--
-- Triggers `full_information`
--
DELIMITER $$
CREATE TRIGGER `after_delete_full_information` AFTER DELETE ON `full_information` FOR EACH ROW BEGIN
    INSERT IGNORE INTO user_choices (
        barcode, product_group, product_category, product_name, 
        year_import, item, product_information, Warranty_Period, 
        product_status, created_at, units, note
    )
    VALUES (
        OLD.barcode, OLD.product_group, OLD.product_category, OLD.product_name, 
        OLD.year_import, OLD.item, OLD.product_information, OLD.Warranty_Period, 
        OLD.product_status, NOW(), OLD.units, OLD.note
    );
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_full_information` AFTER INSERT ON `full_information` FOR EACH ROW INSERT INTO user_choices (barcode, product_group, product_category, product_name, year_import, item, product_information, Warranty_Period, product_status, units, note)
VALUES (NEW.barcode, NEW.product_group, NEW.product_category, NEW.product_name, NEW.year_import, NEW.item, NEW.product_information, NEW.Warranty_Period, NEW.product_status, NEW.units, NEW.note)
$$
DELIMITER ;
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
DELIMITER $$
CREATE TRIGGER `before_unit_update` BEFORE UPDATE ON `full_information` FOR EACH ROW BEGIN
    IF OLD.units <> NEW.units THEN
        SET NEW.old_unit = OLD.units;
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `group_product`
--

CREATE TABLE `group_product` (
  `id_group` varchar(4) NOT NULL,
  `name_group` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `group_product`
--

INSERT INTO `group_product` (`id_group`, `name_group`) VALUES
('01', 'Nội Thất'),
('02', 'Điện Tử'),
('03', 'Thiết Yếu '),
('10', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id_product` varchar(3) NOT NULL,
  `name_product` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
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
-- Table structure for table `status_product`
--

CREATE TABLE `status_product` (
  `status_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_product`
--

INSERT INTO `status_product` (`status_product`) VALUES
('active'),
('Dispose'),
('inactive'),
('maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `thongbao`
--

CREATE TABLE `thongbao` (
  `id` int(11) NOT NULL,
  `mota` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `Xac_nhan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thongbao`
--

INSERT INTO `thongbao` (`id`, `mota`, `date`, `barcode`, `Xac_nhan`) VALUES
(21, 'hong loa', '2025-05-08', '0110ACVA010004', NULL),
(23, 'hong', '2025-05-12', '0110BLVA010010', 'Đã sử lý'),
(24, 'fsdafsd', '2025-05-12', '0223ADMA170004', 'Đã sử lý'),
(25, 'lớp KOT làm hỏng chân bàn', '2025-05-12', '0110ACVA040001', 'Đã sử lý'),
(26, 'áda', '2025-05-12', '0110ACVA010006', 'Đã sử lý'),
(27, 'twoibtewing', '2025-05-12', '0110ACVA010006', 'Chưa sử lý'),
(28, 'sdgsdhsgdhfsgdhfhgdhf\r\n', '2025-05-12', '0110BLVA010004', 'Đã sử lý'),
(29, 'hong chan', '2025-05-12', '0110ACVA010001', 'Chưa sử lý'),
(30, 'demo bao cao', '2025-05-12', '0110ACVA010001', 'Chưa sử lý'),
(31, 'hong chim', '2025-05-17', '0110ACVA040001', 'Đã sử lý');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id_units` varchar(3) NOT NULL,
  `units` varchar(40) DEFAULT NULL,
  `priority` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id_units`, `units`, `priority`) VALUES
('CNT', 'Công Nghệ Thông Tin', 1),
('KOT', 'Kỹ Thuật Ô Tô', 1),
('LKT', 'Luật', 1),
('NaN', 'Chưa phân lớp', 0),
('QHC', 'Quan Hệ Công Chúng Và Truyền Thông', 1),
('QTD', 'Quản Trị Kinh Doanh', 1),
('TCN', 'Tài Chính Ngân Hàng', 1),
('YCT', 'Y Học Cổ Truyền', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_account`
--

CREATE TABLE `user_account` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `units` varchar(255) NOT NULL,
  `use_role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_account`
--

INSERT INTO `user_account` (`id`, `name`, `username`, `user_password`, `units`, `use_role`) VALUES
(13, 'Hà Văn Đoàn', 'admin', '123456', 'CNT', 'admin'),
(14, 'Nguyễn Thị Mỹ Linh', 'user', '123456', 'CNT', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user_choices`
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `units` varchar(3) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_choices`
--

INSERT INTO `user_choices` (`Id`, `barcode`, `product_group`, `product_category`, `product_name`, `year_import`, `item`, `product_information`, `Warranty_Period`, `product_status`, `created_at`, `units`, `note`) VALUES
(1, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(2, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(3, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(4, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(5, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(6, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:29', NULL, NULL),
(7, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL, NULL),
(8, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL, NULL),
(9, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL, NULL),
(10, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL, NULL),
(11, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:29', NULL, NULL),
(12, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(13, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(14, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(15, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(16, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(17, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(18, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(19, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(20, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(21, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(22, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(23, '0110BLV19003', '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(24, '0110BUN20004', '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(25, '0110BLV19005', '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(26, '0110BLV19006', '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(27, '0110BLV19007', '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(28, '0110BLV19008', '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-20 06:49:37', NULL, NULL),
(29, '0221PCT21001', '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(30, '0221PCT21002', '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(31, '0221PCT21003', '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(32, '0221PCT21004', '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(33, '0221PCT21005', '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-20 06:49:37', NULL, NULL),
(34, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(35, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(36, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(37, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(38, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(39, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(40, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(41, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(42, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(43, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(44, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(45, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(46, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(47, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(48, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(49, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(50, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 10:37:49', NULL, NULL),
(51, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(52, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(53, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(54, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(55, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 10:37:49', NULL, NULL),
(56, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(57, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(58, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(59, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(60, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(61, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(62, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(63, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(64, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(65, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(66, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(67, NULL, '01', '10', 'BLV', '19', '003', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(68, NULL, '01', '10', 'BUN', '20', '004', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(69, NULL, '01', '10', 'BLV', '19', '005', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(70, NULL, '01', '10', 'BLV', '19', '006', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(71, NULL, '01', '10', 'BLV', '19', '007', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(72, NULL, '01', '10', 'BLV', '19', '008', 'áp tường bằng gỗ', NULL, 'active', '2024-12-30 11:05:07', NULL, NULL),
(73, NULL, '02', '21', 'PCT', '21', '001', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(74, NULL, '02', '21', 'PCT', '21', '002', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(75, NULL, '02', '21', 'PCT', '21', '003', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(76, NULL, '02', '21', 'PCT', '21', '004', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(77, NULL, '02', '21', 'PCT', '21', '005', 'Điện tử máy tính đồng bộ 2021 công nghệ thông tin ', NULL, 'inactive', '2024-12-30 11:05:07', NULL, NULL),
(78, NULL, '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(79, NULL, '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(80, NULL, '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'KOT', NULL),
(81, NULL, '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'LKT', NULL),
(82, NULL, '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(83, NULL, '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(84, NULL, '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(85, NULL, '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(86, NULL, '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(87, NULL, '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(88, NULL, '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:05:07', 'CNT', NULL),
(89, NULL, '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(90, NULL, '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(91, NULL, '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(92, NULL, '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(93, NULL, '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(94, NULL, '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(95, NULL, '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(96, NULL, '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(97, NULL, '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(98, NULL, '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(99, NULL, '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(100, NULL, '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(101, NULL, '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(102, NULL, '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(103, NULL, '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(104, NULL, '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(105, NULL, '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(106, NULL, '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QHC', NULL),
(107, NULL, '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT', NULL),
(108, NULL, '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT', NULL),
(109, NULL, '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QKT', NULL),
(110, NULL, '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'KOT', NULL),
(111, NULL, '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD', NULL),
(112, NULL, '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD', NULL),
(113, NULL, '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD', NULL),
(114, NULL, '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'QTD', NULL),
(115, NULL, '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT', NULL),
(116, NULL, '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT', NULL),
(117, NULL, '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'YCT', NULL),
(118, NULL, '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'TCN', NULL),
(119, NULL, '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:05:07', 'TCN', NULL),
(120, NULL, '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(121, NULL, '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(122, NULL, '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(123, NULL, '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(124, NULL, '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(125, NULL, '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(126, NULL, '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(127, NULL, '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:05:07', 'CNT', NULL),
(128, NULL, '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:05:07', 'CNT', NULL),
(129, NULL, '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(130, NULL, '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(131, NULL, '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'KOT', NULL),
(132, NULL, '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'LKT', NULL),
(133, NULL, '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(134, NULL, '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(135, NULL, '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(136, NULL, '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(137, NULL, '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(138, NULL, '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(139, NULL, '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:14:13', 'CNT', NULL),
(140, NULL, '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(141, NULL, '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(142, NULL, '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(143, NULL, '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(144, NULL, '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(145, NULL, '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(146, NULL, '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(147, NULL, '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(148, NULL, '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(149, NULL, '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(150, NULL, '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(151, NULL, '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(152, NULL, '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(153, NULL, '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(154, NULL, '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(155, NULL, '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(156, NULL, '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(157, NULL, '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QHC', NULL),
(158, NULL, '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT', NULL),
(159, NULL, '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT', NULL),
(160, NULL, '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QKT', NULL),
(161, NULL, '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'KOT', NULL),
(162, NULL, '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD', NULL),
(163, NULL, '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD', NULL),
(164, NULL, '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD', NULL),
(165, NULL, '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'QTD', NULL),
(166, NULL, '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT', NULL),
(167, NULL, '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT', NULL),
(168, NULL, '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'YCT', NULL),
(169, NULL, '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'TCN', NULL),
(170, NULL, '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:14:13', 'TCN', NULL),
(171, NULL, '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(172, NULL, '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(173, NULL, '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(174, NULL, '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(175, NULL, '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(176, NULL, '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(177, NULL, '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(178, NULL, '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:14:13', 'CNT', NULL),
(179, NULL, '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:14:13', 'CNT', NULL),
(180, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(181, '0110BLVA010002', '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(182, '0110BLVA010003', '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'KOT', NULL),
(183, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'LKT', NULL),
(184, '0110BLVA010005', '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(185, '0110BLVA010006', '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(186, '0110BLVA010007', '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(187, '0110BLVA010008', '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(188, '0110BLVA010009', '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(189, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(190, '0110BLVA170011', '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:16:06', 'CNT', NULL),
(191, '0221PCDA150001', '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(192, '0221PCDA150002', '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(193, '0221PCDA150003', '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(194, '0221PCDA150004', '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(195, '0221PCDA150005', '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(196, '0221PCTA150001', '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(197, '0221PCTA150002', '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(198, '0221PCTA150003', '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(199, '0221PCTA150004', '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(200, '0221PCTA150005', '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(201, '0221PCTA150006', '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(202, '0326DATA170001', '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(203, '0326DATA170002', '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(204, '0326DATA170003', '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(205, '0326DATA170004', '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(206, '0326DATA170005', '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(207, '0326DATA170006', '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(208, '0326DATA170007', '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QHC', NULL),
(209, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT', NULL),
(210, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT', NULL),
(211, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QKT', NULL),
(212, '0326DATA170011', '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'KOT', NULL),
(213, '0326DATA170012', '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD', NULL),
(214, '0326DATA170013', '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD', NULL),
(215, '0326DATA170014', '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD', NULL),
(216, '0326DATA170015', '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'QTD', NULL),
(217, '0326DATA170016', '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT', NULL),
(218, '0326DATA170017', '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT', NULL),
(219, '0326DATA170018', '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'YCT', NULL),
(220, '0326DATA170019', '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'TCN', NULL),
(221, '0326DATA170020', '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:16:06', 'TCN', NULL),
(222, '0223ACVA170001', '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(223, '0223ACVA170002', '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(224, '0223ACVA170003', '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(225, '0223ACVA170004', '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(226, '0223ACVA170005', '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(227, '0223ADMA170001', '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(228, '0223ADMA170002', '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(229, '0223ADMA170003', '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:16:06', 'CNT', NULL),
(230, '0223ADMA170004', '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:16:06', 'CNT', NULL),
(231, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(232, '0110BLVA010002', '01', '10', 'BLV', 'A01', '0002', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(233, '0110BLVA010003', '01', '10', 'BLV', 'A01', '0003', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'KOT', NULL),
(234, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'LKT', NULL),
(235, '0110BLVA010005', '01', '10', 'BLV', 'A01', '0005', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(236, '0110BLVA010006', '01', '10', 'BLV', 'A01', '0006', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(237, '0110BLVA010007', '01', '10', 'BLV', 'A01', '0007', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(238, '0110BLVA010008', '01', '10', 'BLV', 'A01', '0008', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(239, '0110BLVA010009', '01', '10', 'BLV', 'A01', '0009', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(240, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(241, '0110BLVA170011', '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'inactive', '2024-12-30 11:36:13', 'CNT', NULL),
(242, '0221PCDA150001', '02', '21', 'PCD', 'A15', '0001', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(243, '0221PCDA150002', '02', '21', 'PCD', 'A15', '0002', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(244, '0221PCDA150003', '02', '21', 'PCD', 'A15', '0003', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(245, '0221PCDA150004', '02', '21', 'PCD', 'A15', '0004', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(246, '0221PCDA150005', '02', '21', 'PCD', 'A15', '0005', 'để bàn-đồng bộ HP M01-F209D', '2027-08-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(247, '0221PCTA150001', '02', '21', 'PCT', 'A15', '0001', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(248, '0221PCTA150002', '02', '21', 'PCT', 'A15', '0002', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(249, '0221PCTA150003', '02', '21', 'PCT', 'A15', '0003', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(250, '0221PCTA150004', '02', '21', 'PCT', 'A15', '0004', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(251, '0221PCTA150005', '02', '21', 'PCT', 'A15', '0005', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(252, '0221PCTA150006', '02', '21', 'PCT', 'A15', '0006', 'Main H310 Gigai5 8400, RAM 8G ', '2025-03-14', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(253, '0326DATA170001', '03', '26', 'DAT', 'A17', '0001', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(254, '0326DATA170002', '03', '26', 'DAT', 'A17', '0002', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(255, '0326DATA170003', '03', '26', 'DAT', 'A17', '0003', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(256, '0326DATA170004', '03', '26', 'DAT', 'A17', '0004', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(257, '0326DATA170005', '03', '26', 'DAT', 'A17', '0005', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(258, '0326DATA170006', '03', '26', 'DAT', 'A17', '0006', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(259, '0326DATA170007', '03', '26', 'DAT', 'A17', '0007', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QHC', NULL),
(260, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT', NULL),
(261, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT', NULL),
(262, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QKT', NULL),
(263, '0326DATA170011', '03', '26', 'DAT', 'A17', '0011', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'KOT', NULL),
(264, '0326DATA170012', '03', '26', 'DAT', 'A17', '0012', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD', NULL),
(265, '0326DATA170013', '03', '26', 'DAT', 'A17', '0013', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD', NULL),
(266, '0326DATA170014', '03', '26', 'DAT', 'A17', '0014', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD', NULL),
(267, '0326DATA170015', '03', '26', 'DAT', 'A17', '0015', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'QTD', NULL),
(268, '0326DATA170016', '03', '26', 'DAT', 'A17', '0016', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT', NULL),
(269, '0326DATA170017', '03', '26', 'DAT', 'A17', '0017', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT', NULL),
(270, '0326DATA170018', '03', '26', 'DAT', 'A17', '0018', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'YCT', NULL),
(271, '0326DATA170019', '03', '26', 'DAT', 'A17', '0019', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'TCN', NULL),
(272, '0326DATA170020', '03', '26', 'DAT', 'A17', '0020', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2024-12-30 11:36:13', 'TCN', NULL),
(273, '0223ACVA170001', '02', '23', 'ACV', 'A17', '0001', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(274, '0223ACVA170002', '02', '23', 'ACV', 'A17', '0002', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(275, '0223ACVA170003', '02', '23', 'ACV', 'A17', '0003', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(276, '0223ACVA170004', '02', '23', 'ACV', 'A17', '0004', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(277, '0223ACVA170005', '02', '23', 'ACV', 'A17', '0005', 'AC Voltameter AVM25R', '2026-06-30', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(278, '0223ADMA170001', '02', '23', 'ADM', 'A17', '0001', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(279, '0223ADMA170002', '02', '23', 'ADM', 'A17', '0002', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(280, '0223ADMA170003', '02', '23', 'ADM', 'A17', '0003', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'active', '2024-12-30 11:36:13', 'CNT', NULL),
(281, '0223ADMA170004', '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'inactive', '2024-12-30 11:36:13', 'CNT', NULL),
(282, '0326DATA170010', '03', '26', 'DAT', 'A17', '0010', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD', NULL),
(283, '0326DATA170009', '03', '26', 'DAT', 'A17', '0009', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD', NULL),
(284, '0326DATA170008', '03', '26', 'DAT', 'A17', '0008', 'Đèn Led âm trần màu trắng, kích thước 60x60cm', '2025-08-27', 'active', '2025-01-01 05:39:06', 'QTD', NULL),
(285, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'active', '2025-05-06 03:36:46', 'KOT', NULL),
(286, '0110BLVA010001', '01', '10', 'BLV', 'A01', '0001', 'G?,kï¿½ch th??c 120x60cm', '2025-03-02', 'active', '2025-05-06 03:56:36', 'KOT', NULL),
(287, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'qwe', '2025-05-14', 'active', '2025-05-06 04:00:10', 'CNT', NULL),
(288, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-06 04:11:23', 'NaN', NULL),
(289, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-06 04:11:32', 'NaN', NULL),
(290, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-06 04:12:01', 'CNT', NULL),
(291, '0110ACVA010003', '01', '10', 'ACV', 'A01', '0003', 'qwqtqfv', '2025-05-12', 'active', '2025-05-06 04:15:12', 'NaN', NULL),
(292, '0110ACVA010005', '01', '10', 'ACV', 'A01', '0005', 'rwer', '2025-05-06', 'active', '2025-05-06 04:56:42', 'NaN', ''),
(293, '0110ACVA010005', '01', '10', 'ACV', 'A01', '0005', 'rwer', '2025-05-06', 'active', '2025-05-06 04:57:03', 'KOT', NULL),
(294, '0110ACVA010003', '01', '10', 'ACV', 'A01', '0003', 'qwqtqfv', '2025-05-12', 'active', '2025-05-06 04:57:24', 'NaN', NULL),
(295, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'test33', '2025-04-27', 'active', '2025-05-08 13:56:17', 'NaN', ''),
(296, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-08 13:56:46', 'CNT', NULL),
(297, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-08 13:57:00', 'LKT', NULL),
(298, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-08 14:41:54', 'LKT', NULL),
(299, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-08 14:46:03', 'LKT', NULL),
(300, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'test33', '2025-04-27', 'active', '2025-05-08 14:47:26', 'NaN', ''),
(301, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-08 14:48:44', 'LKT', NULL),
(302, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'werwewrsdefsdfsvxcqwr353453', '2025-05-07', 'active', '2025-05-08 14:48:56', 'LKT', ''),
(303, '0110ACVA010004', '01', '10', 'ACV', 'A01', '0004', 'fghf', '2025-05-21', 'active', '2025-05-08 16:02:33', 'NaN', ''),
(304, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'qwe', '2025-05-14', 'maintenance', '2025-05-12 01:49:29', 'CNT', NULL),
(305, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-12 03:20:03', 'LKT', NULL),
(306, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test', '2025-04-27', 'active', '2025-05-12 03:20:15', 'CNT', NULL),
(307, '0223ADMA170004', '02', '23', 'ADM', 'A17', '0004', 'Automatic Distortion Meter Shibasoku', '2026-02-05', 'maintenance', '2025-05-12 03:32:39', 'CNT', NULL),
(308, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', '2025-05-12 03:33:01', 'CNT', NULL),
(309, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'werwewrsdefsdfsvxcqwr353453', '2025-05-07', 'maintenance', '2025-05-12 03:56:48', 'LKT', NULL),
(310, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'aaa', '2025-05-14', 'maintenance', '2025-05-12 07:04:23', 'CNT', NULL),
(311, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', '2025-05-12 07:06:13', 'LKT', NULL),
(312, '0110BLVA010010', '01', '10', 'BLV', 'A01', '0010', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', '2025-05-12 07:11:52', 'YCT', NULL),
(313, '0110ACVA030001', '01', '10', 'ACV', 'A03', '0001', 'test100', '2025-05-11', 'active', '2025-05-12 09:57:58', 'NaN', ''),
(314, '0110BLVA170011', '01', '10', 'BLV', 'A17', '0011', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'Dispose', '2025-05-12 10:54:41', 'CNT', NULL),
(315, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'werwewrsdefsdfsvxcqwr353453', '2025-05-07', 'inactive', '2025-05-12 15:11:37', 'LKT', NULL),
(316, '0110ACVA010006', '01', '10', 'ACV', 'A01', '0006', 'werwewrsdefsdfsvxcqwr353453', '2025-05-07', 'Dispose', '2025-05-12 15:11:42', 'LKT', NULL),
(317, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'aaa', '2025-05-14', 'active', '2025-05-12 15:11:46', 'CNT', NULL),
(318, '0110ACVA010001', '01', '10', 'ACV', 'A01', '0001', 'test scan', '2025-04-27', 'active', '2025-05-12 15:13:01', 'CNT', NULL),
(319, '0221ADMA080001', '02', '21', 'ADM', 'A08', '0001', 'test thêm tài sản', '2025-05-12', 'active', '2025-05-12 15:15:02', 'NaN', ''),
(320, '0333BLVA030001', '03', '33', 'BLV', 'A03', '0001', '124124', '2332-12-31', 'inactive', '2025-05-14 09:07:15', 'KOT', ''),
(321, '0110BLVA010004', '01', '10', 'BLV', 'A01', '0004', 'Gỗ,kích thước 120x60cm', '2025-03-02', 'maintenance', '2025-05-14 09:08:14', 'LKT', NULL),
(322, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'aaa', '2025-05-14', 'maintenance', '2025-05-14 09:08:26', 'CNT', NULL),
(323, '0110ACVA040001', '01', '10', 'ACV', 'A04', '0001', 'aaa', '2025-05-14', 'maintenance', '2025-05-17 03:05:44', 'CNT', NULL),
(324, '0333BLVA030001', '03', '33', 'BLV', 'A03', '0001', '124124', '2332-12-31', 'inactive', '2025-05-17 05:45:14', 'KOT', NULL),
(325, '0333BLVA030001', '03', '33', 'BLV', 'A03', '0001', '124124', '2332-12-31', 'active', '2025-05-17 05:45:19', 'KOT', NULL),
(326, '1033VTTA010001', '10', '33', 'VTT', 'A01', '0001', 'test', '2025-05-18', 'active', '2025-05-18 03:52:31', 'CNT', '');

-- --------------------------------------------------------

--
-- Table structure for table `year_import`
--

CREATE TABLE `year_import` (
  `id_year` varchar(3) NOT NULL,
  `year_import` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `year_import`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `full_information`
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
-- Indexes for table `group_product`
--
ALTER TABLE `group_product`
  ADD PRIMARY KEY (`id_group`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `status_product`
--
ALTER TABLE `status_product`
  ADD PRIMARY KEY (`status_product`);

--
-- Indexes for table `thongbao`
--
ALTER TABLE `thongbao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id_units`);

--
-- Indexes for table `user_account`
--
ALTER TABLE `user_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_choices`
--
ALTER TABLE `user_choices`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `year_import`
--
ALTER TABLE `year_import`
  ADD PRIMARY KEY (`id_year`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `thongbao`
--
ALTER TABLE `thongbao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `user_account`
--
ALTER TABLE `user_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_choices`
--
ALTER TABLE `user_choices`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=327;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `full_information`
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
