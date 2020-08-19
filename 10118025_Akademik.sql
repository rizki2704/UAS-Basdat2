-- MySQL dump 10.13  Distrib 8.0.20, for Win64 (x86_64)
--
-- Host: localhost    Database: 10118025_akademik
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.11-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `dosen`
--

DROP TABLE IF EXISTS `dosen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dosen` (
  `NIP` varchar(12) NOT NULL,
  `NamaDosen` varchar(25) NOT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `agama` varchar(10) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dosen`
--

LOCK TABLES `dosen` WRITE;
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` VALUES ('221230012325','Henda','Bandung','Islam'),('221230023571','Kartika','Bandung','Islam'),('221230025423','Suryo','Bandung','Islam');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jurusan`
--

DROP TABLE IF EXISTS `jurusan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jurusan` (
  `KodeJurusan` varchar(2) NOT NULL,
  `NamaJurusan` varchar(40) NOT NULL,
  PRIMARY KEY (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jurusan`
--

LOCK TABLES `jurusan` WRITE;
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` VALUES ('01','Teknik Informatika'),('03','Teknik Elektro'),('04','Komputerisasi Akuntansi');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khs`
--

DROP TABLE IF EXISTS `khs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khs` (
  `idKhs` int(11) NOT NULL AUTO_INCREMENT,
  `NIM` varchar(8) NOT NULL,
  `KodeMK` varchar(6) NOT NULL,
  `nilai` char(1) NOT NULL,
  PRIMARY KEY (`idKhs`),
  KEY `NIM` (`NIM`),
  KEY `KodeMK` (`KodeMK`),
  CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`NIM`) REFERENCES `mahasiswa` (`NIM`),
  CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`KodeMK`) REFERENCES `matkul` (`KodeMK`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khs`
--

LOCK TABLES `khs` WRITE;
/*!40000 ALTER TABLE `khs` DISABLE KEYS */;
INSERT INTO `khs` VALUES (4,'10115001','IF2231','A'),(5,'10315001','IF1234','A');
/*!40000 ALTER TABLE `khs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `NIM` varchar(8) NOT NULL,
  `NamaMhs` varchar(25) NOT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `JenisKelamin` enum('L','P') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `KodeJurusan` varchar(2) NOT NULL,
  PRIMARY KEY (`NIM`),
  KEY `KodeJurusan` (`KodeJurusan`),
  CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`KodeJurusan`) REFERENCES `jurusan` (`KodeJurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES ('10115001','Wildan','Bandung','L','Islam','01'),('10115002','Dini','Bandung','P','Islam','01'),('10118024','Benno','Subang','L','Islam','01'),('10118025','Rizki Restu Illahi','Bandung','L','Islam','01'),('10315001','Danu','Bandung','L','Kristen','03');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matkul`
--

DROP TABLE IF EXISTS `matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `matkul` (
  `KodeMK` varchar(6) NOT NULL,
  `NamaMK` varchar(40) NOT NULL,
  `sks` int(11) NOT NULL,
  `NIP` varchar(12) NOT NULL,
  PRIMARY KEY (`KodeMK`),
  KEY `NIP` (`NIP`),
  CONSTRAINT `matkul_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `dosen` (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matkul`
--

LOCK TABLES `matkul` WRITE;
/*!40000 ALTER TABLE `matkul` DISABLE KEYS */;
INSERT INTO `matkul` VALUES ('IF1234','Basis Data',3,'221230012325'),('IF2222','Algoritma',4,'221230023571'),('IF2231','Pemrograman',4,'221230023571'),('TE1123','Fisika Terapan',5,'221230023571');
/*!40000 ALTER TABLE `matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1d66c0a7-e1d1-11ea-be27-fc4596ee464e','Rizki Restu','admin','admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-19 18:51:53
