CREATE DATABASE  IF NOT EXISTS `barcode` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `barcode`;
-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: barcode
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `category_product`
--

DROP TABLE IF EXISTS `category_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `category_product` (
  `id_category` varchar(2) NOT NULL,
  `name_category` varchar(50) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category_product`
--

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` VALUES ('10','Bàn'),('11','Bảng'),('12','Ghế'),('13','Đồng_hồ'),('14','Tủ'),('15','Giá'),('16','Hộc'),('17','Kệ'),('18','Rèm'),('19','Vách'),('20','Máy_in'),('21','Máy_tính'),('22','Modul'),('23','Thực_hành'),('24','Quạt'),('25','Điều_hòa'),('26','Đèn'),('31','giấy'),('32','Bút'),('33','Chén');
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `full_information`
--

DROP TABLE IF EXISTS `full_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `full_information` (
  `product_group` varchar(2) DEFAULT NULL,
  `product_category` varchar(2) DEFAULT NULL,
  `product_name` varchar(3) DEFAULT NULL,
  `year_import` varchar(2) DEFAULT NULL,
  `item` varchar(4) DEFAULT NULL,
  `barcode` varchar(36) DEFAULT NULL,
  `product_information` text,
  `Warranty_Period` date DEFAULT NULL,
  `product_status` varchar(30) DEFAULT NULL,
  `units` varchar(3) DEFAULT NULL,
  KEY `product_status` (`product_status`),
  KEY `fk_product_category` (`product_category`),
  KEY `fk_product_name` (`product_name`),
  KEY `fk_year_import` (`year_import`),
  CONSTRAINT `fk_product_category` FOREIGN KEY (`product_category`) REFERENCES `category_product` (`id_category`),
  CONSTRAINT `fk_product_name` FOREIGN KEY (`product_name`) REFERENCES `product` (`id_product`),
  CONSTRAINT `fk_year_import` FOREIGN KEY (`year_import`) REFERENCES `year_import` (`id_year`),
  CONSTRAINT `full_information_ibfk_1` FOREIGN KEY (`product_status`) REFERENCES `status_product` (`status_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `full_information`
--

LOCK TABLES `full_information` WRITE;
/*!40000 ALTER TABLE `full_information` DISABLE KEYS */;
INSERT INTO `full_information` VALUES ('01','10','BLV','19','003','0110BLV19003','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BUN','20','004','0110BUN20004','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','005','0110BLV19005','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','006','0110BLV19006','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','007','0110BLV19007','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','008','0110BLV19008','áp tường bằng gỗ',NULL,'active',NULL),('02','21','PCT','21','001','0221PCT21001','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','002','0221PCT21002','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','003','0221PCT21003','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','004','0221PCT21004','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','005','0221PCT21005','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('01','10','BLV','19','003','0110BLV19003','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BUN','20','004','0110BUN20004','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','005','0110BLV19005','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','006','0110BLV19006','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','007','0110BLV19007','áp tường bằng gỗ',NULL,'active',NULL),('01','10','BLV','19','008','0110BLV19008','áp tường bằng gỗ',NULL,'active',NULL),('02','21','PCT','21','001','0221PCT21001','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','002','0221PCT21002','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','003','0221PCT21003','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','004','0221PCT21004','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL),('02','21','PCT','21','005','0221PCT21005','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive',NULL);
/*!40000 ALTER TABLE `full_information` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_update_full_information` AFTER UPDATE ON `full_information` FOR EACH ROW BEGIN
    INSERT INTO user_choices(
		product_group,
        product_category,
        product_name,
        year_import,
        item,
        product_information,
        Warranty_Period,
        product_status,
        units
        )
    VALUES (
		NEW.product_group,
        NEW.product_category,
        NEW.year_import,
        NEW.item,
        NEW.product_information,
        NEW.Warranty_Period,
        NEW.product_status,
        NEW.units);
        
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `group_product`
--

DROP TABLE IF EXISTS `group_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `group_product` (
  `id_group` varchar(2) NOT NULL,
  `name_group` varchar(50) NOT NULL,
  PRIMARY KEY (`id_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `group_product`
--

LOCK TABLES `group_product` WRITE;
/*!40000 ALTER TABLE `group_product` DISABLE KEYS */;
INSERT INTO `group_product` VALUES ('01','Nội_Thất'),('02','Điện_Tử'),('03','Thiết_Yếu');
/*!40000 ALTER TABLE `group_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id_item` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `id_product` varchar(3) NOT NULL,
  `name_product` varchar(255) NOT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES ('ACV','Thiết_bị'),('ADM','AC_Voltarmeter_AVM25R'),('BBX','bi'),('BFC','Foocmica'),('BLV','Làm_việc'),('BUN','Uống_nước'),('CSN','sứ'),('DAT','Led_âm_tường'),('DHN','Nhiệt_độ'),('DHT','Treo_tường'),('EFS','Multimeter 856'),('FMA','FM/AM Signal_Generator'),('GA4','A4'),('GDC','Cốc'),('GIN','Inox'),('GSF','Sofa'),('HDD','Di_động'),('KCS','Kenwood_102312347_CS-4025'),('KĐĐ','Để_đồ'),('LFM','Wow&Futtermeter-LFM3616'),('MIA','Hai_mặt'),('MTH','Mạch'),('OOS','Oscillscope_OS_5030'),('PCD','Đồng_bộ'),('PCT','Để_bàn'),('QCD','Cây'),('RCN','Cửa nhựa'),('THS','Hồ_sơ'),('VTT','Trang Trí');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status_product`
--

DROP TABLE IF EXISTS `status_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `status_product` (
  `status_product` varchar(50) NOT NULL,
  PRIMARY KEY (`status_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status_product`
--

LOCK TABLES `status_product` WRITE;
/*!40000 ALTER TABLE `status_product` DISABLE KEYS */;
INSERT INTO `status_product` VALUES ('active'),('inactive'),('maintenance');
/*!40000 ALTER TABLE `status_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_choices`
--

DROP TABLE IF EXISTS `user_choices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_choices` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `barcode` varchar(36) DEFAULT NULL,
  `product_group` varchar(2) DEFAULT NULL,
  `product_category` varchar(2) DEFAULT NULL,
  `product_name` varchar(3) DEFAULT NULL,
  `year_import` varchar(2) DEFAULT NULL,
  `item` varchar(3) DEFAULT NULL,
  `product_information` text,
  `Warranty_Period` date DEFAULT NULL,
  `product_status` varchar(30) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `units` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_choices`
--

LOCK TABLES `user_choices` WRITE;
/*!40000 ALTER TABLE `user_choices` DISABLE KEYS */;
INSERT INTO `user_choices` VALUES (1,'0110BLV19003','01','10','BLV','19','003','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(2,'0110BUN20004','01','10','BUN','20','004','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(3,'0110BLV19005','01','10','BLV','19','005','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(4,'0110BLV19006','01','10','BLV','19','006','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(5,'0110BLV19007','01','10','BLV','19','007','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(6,'0110BLV19008','01','10','BLV','19','008','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:29',NULL),(7,'0221PCT21001','02','21','PCT','21','001','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:29',NULL),(8,'0221PCT21002','02','21','PCT','21','002','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:29',NULL),(9,'0221PCT21003','02','21','PCT','21','003','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:29',NULL),(10,'0221PCT21004','02','21','PCT','21','004','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:29',NULL),(11,'0221PCT21005','02','21','PCT','21','005','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:29',NULL),(12,'0110BLV19003','01','10','BLV','19','003','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(13,'0110BUN20004','01','10','BUN','20','004','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(14,'0110BLV19005','01','10','BLV','19','005','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(15,'0110BLV19006','01','10','BLV','19','006','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(16,'0110BLV19007','01','10','BLV','19','007','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(17,'0110BLV19008','01','10','BLV','19','008','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(18,'0221PCT21001','02','21','PCT','21','001','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(19,'0221PCT21002','02','21','PCT','21','002','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(20,'0221PCT21003','02','21','PCT','21','003','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(21,'0221PCT21004','02','21','PCT','21','004','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(22,'0221PCT21005','02','21','PCT','21','005','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(23,'0110BLV19003','01','10','BLV','19','003','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(24,'0110BUN20004','01','10','BUN','20','004','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(25,'0110BLV19005','01','10','BLV','19','005','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(26,'0110BLV19006','01','10','BLV','19','006','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(27,'0110BLV19007','01','10','BLV','19','007','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(28,'0110BLV19008','01','10','BLV','19','008','áp tường bằng gỗ',NULL,'active','2024-12-20 06:49:37',NULL),(29,'0221PCT21001','02','21','PCT','21','001','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(30,'0221PCT21002','02','21','PCT','21','002','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(31,'0221PCT21003','02','21','PCT','21','003','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(32,'0221PCT21004','02','21','PCT','21','004','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL),(33,'0221PCT21005','02','21','PCT','21','005','Điện tử máy tính đồng bộ 2021 công nghệ thông tin ',NULL,'inactive','2024-12-20 06:49:37',NULL);
/*!40000 ALTER TABLE `user_choices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `year_import`
--

DROP TABLE IF EXISTS `year_import`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `year_import` (
  `id_year` varchar(2) NOT NULL,
  `year_import` varchar(4) NOT NULL,
  PRIMARY KEY (`id_year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `year_import`
--

LOCK TABLES `year_import` WRITE;
/*!40000 ALTER TABLE `year_import` DISABLE KEYS */;
INSERT INTO `year_import` VALUES ('08','2008'),('09','2009'),('10','2010'),('11','2011'),('12','2012'),('13','2013'),('14','2014'),('15','2015'),('16','2016'),('17','2017'),('18','2018'),('19','2019'),('20','2020'),('21','2021'),('22','2022'),('23','2023'),('24','2024');
/*!40000 ALTER TABLE `year_import` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'barcode'
--

--
-- Dumping routines for database 'barcode'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-20 18:51:10
