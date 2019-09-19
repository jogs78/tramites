-- MySQL dump 10.13  Distrib 5.6.44, for Linux (x86_64)
--
-- Host: localhost    Database: isc_tramites2
-- ------------------------------------------------------
-- Server version	5.6.44-cll-lve

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
-- Table structure for table `historico`
--

DROP TABLE IF EXISTS `historico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tramite_seguir` varchar(255) NOT NULL DEFAULT '',
  `quien` int(10) unsigned NOT NULL,
  `lugar` int(11) NOT NULL,
  `momento` timestamp NULL DEFAULT NULL,
  `direccion` enum('ENTRADA','SALIDA') DEFAULT NULL,
  PRIMARY KEY (`id`,`tramite_seguir`,`quien`,`lugar`),
  KEY `fk_historico_lugar1` (`lugar`),
  KEY `fk_historico_users1` (`quien`),
  KEY `fk_historico_tramites1` (`tramite_seguir`),
  CONSTRAINT `fk_historico_lugar1` FOREIGN KEY (`lugar`) REFERENCES `lugar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_historico_users1` FOREIGN KEY (`quien`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `historico`
--

LOCK TABLES `historico` WRITE;
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` VALUES (1,'1',17,4,'2019-09-04 06:01:53','ENTRADA');
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lugar`
--

DROP TABLE IF EXISTS `lugar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lugar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`Descripcion`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lugar`
--

LOCK TABLES `lugar` WRITE;
/*!40000 ALTER TABLE `lugar` DISABLE KEYS */;
INSERT INTO `lugar` VALUES (1,'Jefatura de Sistemas Y Computación'),(2,'Dirección'),(3,'Subdirección'),(4,'Secretaria de Sistemas y Computación'),(5,'Recursos humanos'),(6,'Coordinación'),(7,'Recursos Financieros'),(8,'División de estudios profesionales'),(10,'Planeación');
/*!40000 ALTER TABLE `lugar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tramite`
--

DROP TABLE IF EXISTS `tramite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tramite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pendiente','Finalizado','') NOT NULL DEFAULT 'Pendiente',
  `creo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`creo`,`nombre`) USING BTREE,
  KEY `fk_tramite_users1_idx` (`creo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tramite`
--

LOCK TABLES `tramite` WRITE;
/*!40000 ALTER TABLE `tramite` DISABLE KEYS */;
INSERT INTO `tramite` VALUES (1,'Trámite 1','2019-09-03 20:38:39','Pendiente',1),(2,'Trámite 2','2019-09-03 20:38:50','Pendiente',1),(3,'Trámite 3','2019-09-03 20:39:00','Pendiente',1),(4,'Trámite 4','2019-09-03 20:41:47','Pendiente',2),(5,'Trámite 5','2019-09-03 20:42:09','Pendiente',1),(6,'Trámite 6','2019-09-03 20:42:21','Pendiente',2);
/*!40000 ALTER TABLE `tramite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lastname` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` enum('JefeDepto','Prestador','Secretaria') DEFAULT 'Prestador',
  `numcontrol` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Guzmán Sánchez','Jorge Octavio','jguzman@ittg.edu.mx',NULL,'$2y$10$axWsGdGki.WEgrdV.unOUeRqPo9D9NBiXuaorbOtxJTyXf57cTiB.','nm3ZbzHkuCNMDDIx9eMRQBl09sVrx74d4WZ1ItYCtpELNTGGbnCyv4lau98o',NULL,NULL,'JefeDepto',NULL,1),(2,'García Castellanos','Emilio','milo@gmail.com',NULL,'$2y$10$axWsGdGki.WEgrdV.unOUeRqPo9D9NBiXuaorbOtxJTyXf57cTiB.','eJLkNorKBBRZ4TxTVoPuykKEEpPTymf3pT9aTL1g3XkvZZrGMQEdxRXAcKZW',NULL,NULL,'Secretaria',NULL,1),(17,'Gutiérrez Zavala','Pedro','pgutierrez@ittg.edu.mx',NULL,'$2y$10$gAPX098fviOrir/ee3Q/YulJrXp5W9NvGzMHJY.CWDme7YBCZoQAy',NULL,'2019-09-04 10:41:02','2019-09-14 03:47:02','Prestador','15271045',1),(18,'Marroquín Gómez','Hector','pepe@ittg.edu.mx',NULL,'$2y$10$kPasDZA2R539hLQojvugr.H63mdVRXN2RYNcO.ZAJPNKOE4YjcnI6',NULL,'2019-09-14 04:07:05','2019-09-18 01:43:04','Prestador','14278652',0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-18 20:13:04
