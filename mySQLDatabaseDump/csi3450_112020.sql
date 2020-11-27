CREATE DATABASE  IF NOT EXISTS `csi3450` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `csi3450`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: localhost    Database: csi3450
-- ------------------------------------------------------
-- Server version	8.0.22

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
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `company` (
  `COMPANY_ID` int NOT NULL AUTO_INCREMENT,
  `COMPANY_NAME` varchar(45) NOT NULL,
  PRIMARY KEY (`COMPANY_ID`),
  UNIQUE KEY `COMPANY_ID_UNIQUE` (`COMPANY_ID`),
  UNIQUE KEY `COMPANY_NAME_UNIQUE` (`COMPANY_NAME`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (2,'Belstaff'),(4,'Burberry'),(6,'Canada Goose'),(5,'Supreme'),(3,'Uniqlo'),(1,'Weiss');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designer`
--

DROP TABLE IF EXISTS `designer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `designer` (
  `DESIGNER_ID` int NOT NULL AUTO_INCREMENT,
  `DESIGNER_FNAME` varchar(45) NOT NULL,
  `DESIGNER_LNAME` varchar(45) NOT NULL,
  PRIMARY KEY (`DESIGNER_ID`),
  UNIQUE KEY `DESIGNER_ID_UNIQUE` (`DESIGNER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designer`
--

LOCK TABLES `designer` WRITE;
/*!40000 ALTER TABLE `designer` DISABLE KEYS */;
INSERT INTO `designer` VALUES (1,'John','Smith'),(2,'Bob','Smith'),(3,'John','Green'),(4,'Hank','Green'),(5,'Mr','Clean'),(6,'Mike','Tyson');
/*!40000 ALTER TABLE `designer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `designer_has_company`
--

DROP TABLE IF EXISTS `designer_has_company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `designer_has_company` (
  `DESIGNER_ID` int NOT NULL,
  `COMPANY_ID` int NOT NULL,
  PRIMARY KEY (`DESIGNER_ID`,`COMPANY_ID`),
  KEY `COMPANY_ID_idx` (`COMPANY_ID`),
  CONSTRAINT `COMPANY_CID` FOREIGN KEY (`COMPANY_ID`) REFERENCES `company` (`COMPANY_ID`),
  CONSTRAINT `DESIGNER_CID` FOREIGN KEY (`DESIGNER_ID`) REFERENCES `designer` (`DESIGNER_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `designer_has_company`
--

LOCK TABLES `designer_has_company` WRITE;
/*!40000 ALTER TABLE `designer_has_company` DISABLE KEYS */;
INSERT INTO `designer_has_company` VALUES (6,1),(5,2),(3,4),(2,5),(4,5),(1,6);
/*!40000 ALTER TABLE `designer_has_company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory` (
  `INVENTORY_ID` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`INVENTORY_ID`),
  UNIQUE KEY `INVENTORY_ID_UNIQUE` (`INVENTORY_ID`),
  CONSTRAINT `SHOP_ID` FOREIGN KEY (`INVENTORY_ID`) REFERENCES `shop` (`SHOP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory`
--

LOCK TABLES `inventory` WRITE;
/*!40000 ALTER TABLE `inventory` DISABLE KEYS */;
INSERT INTO `inventory` VALUES (1);
/*!40000 ALTER TABLE `inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `login` (
  `LOGIN_ID` int NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(15) NOT NULL,
  `PASSWORD` varchar(45) NOT NULL,
  `EMAIL` varchar(45) NOT NULL,
  `ADMIN` int NOT NULL,
  PRIMARY KEY (`LOGIN_ID`),
  UNIQUE KEY `LOGIN_ID_UNIQUE` (`LOGIN_ID`),
  UNIQUE KEY `USERNAME_UNIQUE` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (1,'test','password','test@test.com',0),(2,'admintest','password','tester@test.com',1);
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `PRODUCT_ID` int NOT NULL AUTO_INCREMENT,
  `PRODUCT_NAME` varchar(45) NOT NULL,
  `PRODUCT_PRICE` int NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`),
  UNIQUE KEY `PRODUCT_ID_UNIQUE` (`PRODUCT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (3,'reversible quilt-finish coat',1500),(4,'herringbone double-breasted coat',3192),(5,'belted-waist midl trench coat',734),(6,'circle him parka coat',1552),(7,'performa quilted coat',1942),(8,'belted-waist long trench coat',3250),(9,'buckle-strap leather coat',6285),(10,'oversized hooded trench coat',265),(11,'single-breasted belted-waist coat',760),(12,'single-breasted belted-waist coat',332),(13,'hooded button-up raincoat',116),(14,'hooded belted padded coat',1685),(15,'detachable-sleeve puffer coat',2345),(28,'alpaca coat',1299),(29,'red rain coat',279),(30,'yellow rain coat',799),(31,'blue rain coat',999),(32,'pruple rain coat',1299);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_has_designer`
--

DROP TABLE IF EXISTS `products_has_designer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products_has_designer` (
  `PRODUCT_ID` int NOT NULL,
  `DESIGNER_ID` int NOT NULL,
  PRIMARY KEY (`PRODUCT_ID`,`DESIGNER_ID`),
  KEY `DESIGNER_ID_idx` (`DESIGNER_ID`),
  CONSTRAINT `DESIGNER_PID` FOREIGN KEY (`DESIGNER_ID`) REFERENCES `designer` (`DESIGNER_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `PRODUCT_ID` FOREIGN KEY (`PRODUCT_ID`) REFERENCES `products` (`PRODUCT_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_has_designer`
--

LOCK TABLES `products_has_designer` WRITE;
/*!40000 ALTER TABLE `products_has_designer` DISABLE KEYS */;
INSERT INTO `products_has_designer` VALUES (3,5),(4,5),(5,5),(6,5),(7,5),(8,5),(9,5),(10,5),(11,5),(12,5),(13,5),(14,5),(15,5),(29,5),(30,5),(31,5),(32,5),(28,6);
/*!40000 ALTER TABLE `products_has_designer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop` (
  `SHOP_ID` int NOT NULL AUTO_INCREMENT,
  `SHOP_NAME` varchar(30) NOT NULL,
  PRIMARY KEY (`SHOP_ID`),
  UNIQUE KEY `SHOP_ID_UNIQUE` (`SHOP_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES (1,'CSI 3450\'s Coats');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-20 23:23:34
