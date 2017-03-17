-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: cspb
-- ------------------------------------------------------
-- Server version	5.7.17-0ubuntu0.16.04.1

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
-- Table structure for table `announcementNotif`
--

DROP TABLE IF EXISTS `announcementNotif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcementNotif` (
  `anID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `creator_IDno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_approved` int(11) NOT NULL,
  `recipient_userLevel` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`anID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcementNotif`
--

LOCK TABLES `announcementNotif` WRITE;
/*!40000 ALTER TABLE `announcementNotif` DISABLE KEYS */;
INSERT INTO `announcementNotif` VALUES (1,'NT-036','Science Fair','There will be a Science Fair on October 9, 2016','science fair.png',1,0,0,1,NULL,'2017-03-03 08:12:58',NULL),(2,'NT-036','No Classes!','There will be no classes tomorrow due to Typhoon Yolanda!','announcement.png',1,0,0,1,NULL,'2017-03-04 04:57:47',NULL),(3,'NT-036','Start of Classes','Start of classes for the 3rd grading period is on November 4, 2016','announcement2.png',1,1,1,1,NULL,'2017-03-03 08:13:19',NULL),(4,'NT-0102','Career Fest 2017','There will be a career fest on March 2 to March 6, 2017!','career fest.png',0,0,0,1,NULL,'2017-03-01 04:07:39',NULL),(5,'NT-0801','Merry Christmas to everybody!','Merry Christmas!','merry-christmas.jpg',1,0,0,1,NULL,'2016-12-20 09:08:50',NULL),(6,'NT-0801','Toga Fitting','Toga Fitting on March 6, 2017','announcement1.png',1,1,1,1,NULL,'2017-03-03 08:10:49',NULL),(7,'NT-0801','104th Founding Anniversary!','There will be a thanksgiving mass on February 14, 2017','announcement.png',1,0,0,1,NULL,'2017-02-12 01:11:57',NULL),(8,'HS-098','School Intramurals','The School Intramurals will be on January 12-15','',0,0,0,1,NULL,'2017-01-09 23:14:51',NULL),(9,'HS-098','Happy Birthday','Happy Birthday Ma\'am Jodee Pagtalunan','',1,1,1,1,NULL,'2017-03-03 08:17:08',NULL),(10,'NT-036','Thesis Defense','You are invited to attend the Thesis Defense of BSCS on March 4, 2017','',0,0,0,1,NULL,'2017-03-03 08:24:08',NULL);
/*!40000 ALTER TABLE `announcementNotif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `gID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IDno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subjectCode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subjectName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `q1` float(5,2) NOT NULL,
  `q2` float(5,2) NOT NULL,
  `q3` float(5,2) NOT NULL,
  `q4` float(5,2) NOT NULL,
  `is_approved` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`gID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'2002000497','','Christian Living',90.00,91.00,92.00,89.00,1,NULL,'2017-03-03 08:18:42',NULL),(2,'2002000497','','Values Education',87.00,86.00,88.00,89.00,1,NULL,'2017-03-03 08:18:55',NULL),(3,'2002000497','','English',88.00,85.00,84.00,0.00,1,NULL,'2017-03-03 08:19:06',NULL),(4,'2002000497','','Mathematics',83.00,0.00,82.00,85.00,1,NULL,'2017-03-03 08:19:28',NULL),(5,'2002000497','','Science',89.00,90.00,87.00,0.00,1,NULL,'2017-03-03 08:19:43',NULL),(6,'2002000497','','Araling Panlipunan',86.00,86.00,87.00,89.71,1,NULL,'2017-03-03 08:19:59',NULL),(7,'2002000497','','MSEP',89.00,90.00,91.00,92.00,1,NULL,'2017-03-03 08:20:10',NULL),(8,'2002000497','','EPP',92.00,91.00,91.00,89.00,1,NULL,'2017-03-03 08:20:19',NULL),(9,'GS02-0789','','Filipino',89.00,88.00,86.00,87.00,0,NULL,'2017-03-03 08:21:03',NULL),(10,'GS02-0789','','Science',74.00,75.00,73.00,75.00,1,NULL,'2017-03-03 08:21:22',NULL),(11,'GS02-0789','','English',80.00,81.00,79.00,81.00,1,NULL,'2017-03-03 08:21:39',NULL),(12,'GS02-0696','','Araling Panlipunan',75.00,75.00,75.00,0.00,1,NULL,'2017-03-03 08:22:30',NULL),(13,'GS02-0696','','Christian Living',81.00,80.00,82.00,82.00,0,NULL,'2017-03-03 08:23:00',NULL),(14,'GS02-0714','','MSEP',82.33,82.22,89.23,99.00,1,NULL,'2017-03-05 15:36:09',NULL),(15,'GS02-0714','','Science',99.00,99.00,97.00,99.00,1,NULL,'2017-03-05 15:38:36',NULL);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `is_readTB`
--

DROP TABLE IF EXISTS `is_readTB`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `is_readTB` (
  `announcementID` int(11) NOT NULL,
  `IDno` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `is_readTB`
--

LOCK TABLES `is_readTB` WRITE;
/*!40000 ALTER TABLE `is_readTB` DISABLE KEYS */;
INSERT INTO `is_readTB` VALUES (1,'2002000497',1,0),(1,'A-1010',0,0),(1,'GS02-0696',0,0),(1,'GS02-0714',0,0),(1,'GS02-0789',0,0),(1,'HS-098',0,0),(1,'NT-0102',0,0),(1,'NT-036',0,0),(1,'NT-0801',0,0),(1,'NT-8401',0,0),(2,'2002000497',1,0),(2,'A-1010',0,0),(2,'GS02-0696',0,0),(2,'GS02-0714',0,0),(2,'GS02-0789',0,0),(2,'HS-098',0,0),(2,'NT-0102',0,0),(2,'NT-036',1,0),(2,'NT-0801',1,0),(2,'NT-8401',0,0),(3,'2002000497',0,1),(3,'A-1010',0,1),(3,'GS02-0696',0,1),(3,'GS02-0714',0,1),(3,'GS02-0789',0,1),(3,'HS-098',0,1),(3,'NT-0102',0,1),(3,'NT-036',0,1),(3,'NT-0801',0,1),(3,'NT-8401',0,1),(4,'2002000497',0,0),(4,'A-1010',0,0),(4,'GS02-0696',0,0),(4,'GS02-0714',0,0),(4,'GS02-0789',0,0),(4,'HS-098',0,0),(4,'NT-0102',0,0),(4,'NT-036',0,0),(4,'NT-0801',0,0),(4,'NT-8401',0,0),(5,'2002000497',0,0),(5,'A-1010',0,0),(5,'GS02-0696',0,0),(5,'GS02-0714',0,0),(5,'GS02-0789',0,0),(5,'HS-098',0,0),(5,'NT-0102',0,0),(5,'NT-036',0,0),(5,'NT-0801',0,0),(5,'NT-8401',0,0),(6,'2002000497',0,1),(6,'A-1010',0,1),(6,'GS02-0696',0,1),(6,'GS02-0714',0,1),(6,'GS02-0789',0,1),(6,'HS-098',0,1),(6,'NT-0102',0,1),(6,'NT-036',0,1),(6,'NT-0801',0,1),(6,'NT-8401',0,1),(7,'2002000497',0,0),(7,'A-1010',0,0),(7,'GS02-0696',0,0),(7,'GS02-0714',0,0),(7,'GS02-0789',0,0),(7,'HS-098',0,0),(7,'NT-0102',0,0),(7,'NT-036',0,0),(7,'NT-0801',0,0),(7,'NT-8401',0,0),(8,'2002000497',0,0),(8,'A-1010',0,0),(8,'GS02-0696',0,0),(8,'GS02-0714',0,0),(8,'GS02-0789',0,0),(8,'HS-098',0,0),(8,'NT-0102',0,0),(8,'NT-036',0,0),(8,'NT-0801',0,0),(8,'NT-8401',0,0),(9,'2002000497',0,1),(9,'A-1010',0,1),(9,'GS02-0696',0,1),(9,'GS02-0714',0,1),(9,'GS02-0789',0,1),(9,'HS-098',0,1),(9,'NT-0102',0,1),(9,'NT-036',0,1),(9,'NT-0801',0,1),(9,'NT-8401',0,1),(10,'2002000497',0,0),(10,'A-1010',0,0),(10,'GS02-0696',0,0),(10,'GS02-0714',0,0),(10,'GS02-0789',0,0),(10,'HS-098',0,0),(10,'NT-0102',0,0),(10,'NT-036',0,0),(10,'NT-0801',0,0),(10,'NT-8401',0,0);
/*!40000 ALTER TABLE `is_readTB` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `IDno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contactno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `userLevel` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_idno_unique` (`IDno`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'NT-036','Ma. Theresa','R.','Valeriano','','','','','0916-7151320','Paliwas, Obando, Bulacan','thess@yahoo.com','$2y$10$oeyqZzDjSCrdudSDMf/HD.IIqtfSyDsN1hOTa5Q.EScuWO.RTaKJ.',1,4,'e21xnwcI95WdI3BjPiCDDi5V7xBqHkDN9qRD288bgM3JcfAOkaAlLNvFCTJd','2016-06-12 13:42:20','2017-03-05 15:48:22'),(2,'NT-0801','Susan','M.','De Castro','','','','','788-4469','Balangkas, Bilog, Valenzuela City','susan@gmail.com','$2y$10$kSOo3vL3EnfjuxB7lhRrIepruBZ412ZZDluESu5NC/bJLQu1guM0e',1,51,'xt4sZw2BOKueBFNjVI8UNHyhskec8c3QwLUjFIFooN1QJUYaYyFOfLZcFY4I','2016-01-22 13:44:26','2017-03-04 04:58:38'),(3,'A-1010','Conrado','C.','Zablan','','','','','','Malolos City, Bulacan','conrado@yahoo.com','$2y$10$zP8Axlgj2e1xn2VCe2blO.5mgdGu.FdbGqI8CSlqEEiax4hJGvZwm',1,34,'5IqINqBMBSPqV8ecI2mxuxMNpcJzQB90dd5oioGobXiO7YVo8tJTBeeoaDYs','2016-10-14 13:46:26','2017-02-09 02:30:43'),(4,'NT-0102','Shiela Lix','P.','Ulanday','','','','','','Pag-asa, Obando, Bulacan','shy@yahoo.com','$2y$10$DVXyFIeYFup3X0AzHcqgUeeIfox8uegSFsPKmfnD8aBzYQLlFg1ju',1,33,'liCOqHep38JiRkGJZErUFHQhgu0ZzInvP4qZleKR0EjvPpcchk7MO7F1QZti','2016-08-02 13:48:53','2017-03-03 08:08:11'),(5,'NT-8401','Emelita','V.','Juan','','','','','','Batanes','emy@gmail.com','$2y$10$9kIy/UDWEW2itPfX/e/ysu5vQPsAfyJkc39kjSmQwwpKPj49T.BV6',1,32,'M0aiS8CrNu1rqOcAGmUaCutZlB2NFRFUDSVivyoS2PhkFOvRRpUTJfd1Pkgb','2016-04-10 13:53:21','2017-01-23 13:53:54'),(6,'HS-098','Ireneo','S.','Capistrano Jr.','','','','','','Navotas City, NCR','ireneo@yahoo.com.ph','$2y$10$M0fCCj2WAMeQLOx8GL50MOWAywfZjKQvgG5wCmITDUWFAkxY4PmK.',1,31,'sfi1ypqelArCXT1CApQENfMJ7yj1UhzYzRTsNzMTFJPe8SiBrtEsPoxk3e1G','2016-06-15 13:55:27','2017-03-03 08:16:11'),(7,'2002000497','Sean Mervin','G.','Ronquillo','','','','','09150438781','Paliwas, Obando, Bulacan','mervinronquillo@gmail.com','$2y$10$IcVuoa1zydnsnUuxsJtyCe7Py3yqyPFhDcVs0G53B7STFyLrPA8I2',1,1,'wq0PiTJj52P0p0HspzKONE4fkpwS6I37kbbnyMW9uiNCM7jEkDWLFsGJ68Qq','2016-10-22 13:56:50','2017-03-04 05:08:36'),(8,'GS02-0696','Joseph','','Bitas','','','','','','','josephraina21@gmail.com','$2y$10$i8xigZkgp2LOke4f2DwQxul8vkVDhVfo3xBrpxbbZtOqEDOOegzW.',1,1,'vQTveBTLE1VzUh8PW64A6YWjz9c2Zu7yIusPnVVjqXcq7obzSNxsMbBCnykU','2017-01-24 06:06:49','2017-01-24 06:41:31'),(9,'GS02-0789','JC','','Olimpo','','','','','','','jcdlcrz@gmail.com','$2y$10$792Gty0Ac.c/Qc/JQQ3S.uhAcAe7Ljio3PPWyJE2LV0gIsO47843C',1,1,'5MEa21dQiQY67VNeujNLyQny9O4PKEJHIWAUbjRDbQl4wFq0Snz33avGO8Na','2017-01-24 06:09:22','2017-01-24 06:36:30'),(10,'GS02-0714','Benjie','C.','Perez','','','','','43592912','','benjieperez28@gmail.com','$2y$10$S0sMzgSpfkaNtZQrXk9tAugqzFpisG30rJ.faNIpKwUzKUfW/tK9O',1,1,'PvPLvfvCqwv1aduirzKuojuRapZ8vUgDBgbnZm44FwF04Ewu7j1lIXvawLBd','2017-01-24 06:10:26','2017-01-24 06:45:35');
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

-- Dump completed on 2017-03-18  0:12:00
