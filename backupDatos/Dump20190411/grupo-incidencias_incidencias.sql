CREATE DATABASE  IF NOT EXISTS `grupo-incidencias` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci */;
USE `grupo-incidencias`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: grupo-incidencias
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `incidencias`
--

DROP TABLE IF EXISTS `incidencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incidencias` (
  `idinc` int(11) NOT NULL AUTO_INCREMENT,
  `idsol` int(11) NOT NULL,
  `idamb` int(11) NOT NULL,
  `idaul` int(11) NOT NULL,
  `idsub` int(11) NOT NULL,
  `idpri` int(11) NOT NULL,
  `idest` int(11) NOT NULL,
  `descripcion` blob NOT NULL,
  `email` tinyint(4) DEFAULT '0',
  `fechaemail` date DEFAULT NULL,
  PRIMARY KEY (`idinc`),
  KEY `fkidsol_idx` (`idsol`),
  KEY `fkidamb_idx` (`idamb`),
  KEY `fkidaul_idx` (`idaul`),
  KEY `fkidsub_idx` (`idsub`),
  KEY `fkidpri_idx` (`idpri`),
  CONSTRAINT `fkidamb` FOREIGN KEY (`idamb`) REFERENCES `ambitos` (`idamb`),
  CONSTRAINT `fkidaul` FOREIGN KEY (`idaul`) REFERENCES `aulas` (`idau`),
  CONSTRAINT `fkidpri` FOREIGN KEY (`idpri`) REFERENCES `prioridaes` (`idpri`),
  CONSTRAINT `fkidsol` FOREIGN KEY (`idsol`) REFERENCES `solicitantes` (`idsol`),
  CONSTRAINT `fkidsub` FOREIGN KEY (`idsub`) REFERENCES `subcategorias` (`idsubcat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incidencias`
--

LOCK TABLES `incidencias` WRITE;
/*!40000 ALTER TABLE `incidencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `incidencias` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-04-11 20:08:16
