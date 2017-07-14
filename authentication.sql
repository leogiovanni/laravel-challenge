CREATE DATABASE  IF NOT EXISTS `authentication` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `authentication`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: autenticacao
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.13-MariaDB

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
INSERT INTO `migrations` VALUES ('2014_03_09_212855_criar_artigos',1),('2014_07_06_193059_criar_usuarios',1),('2014_07_06_231323_create_password_reminders_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reminders`
--

DROP TABLE IF EXISTS `password_reminders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reminders` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_reminders_email_index` (`email`),
  KEY `password_reminders_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reminders`
--

LOCK TABLES `password_reminders` WRITE;
/*!40000 ALTER TABLE `password_reminders` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reminders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acesso` int(11) NOT NULL,
  `tipo` enum('admin','usuario') CHARACTER SET utf8 NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'teste@teste.com','$2y$10$7Xo2YOXj8Hd1SEno5Rfb5uHV2T5QdoXNaTrnIROiaTkfi5Rig4Mda','admin',14,'admin','2J9BmvsuUgPWY67POF65YCetE98bYeyY7MTl0LB5aiGha80GRa3y2QbeYZbK','2017-02-01 13:46:23','2017-07-13 15:34:44'),(6,'leo@leo.com22','$2y$10$ICVodwhuyhiGb5cdDNTfLe.zKe1CsXAPeR/vybmPc0FY500Q5QsMS','123213',1,'usuario',NULL,'2017-02-01 15:01:34','2017-02-01 15:01:34'),(7,'leo@leo.com222','$2y$10$Kf3UM6JDzaoiQoyECv6W6uzp4YcS0Jlif0c9ayv6It0X4duLeD6Ju','123213',1,'usuario','RahOYg5JiuKpxyZEv5RwRyGDZXzS9yf1F4rXZ6eX9ZA0VNeCITEjxQX7giqN','2017-02-01 15:01:55','2017-02-01 15:02:28'),(8,'leo@leo.com','$2y$10$ReaE13gbKkWaC9drTthppu8kC4MekG9lFnWTPrV20Hy9QfpGyHNkK','leo',1,'usuario','5OJPnxmbebw3wNmng7X7xrdIVSR4tzI76JRAaxIXlhVr0w6sGyCiFktxJCiN','2017-02-01 15:15:48','2017-02-01 15:15:51'),(9,'123@123.com','$2y$10$fqql8M2ZV1t18MgY3vQtWOGh8E9647ayDQ0Z4XPD.dibEQ8/bZkm.','123123',1,'usuario','cwGlrBOoaPAn0uRuQGKWgXclcQW3QNZAIRN2XlORT5iu8dPCJo5iAeWQqsqU','2017-07-13 15:32:41','2017-07-13 15:32:55');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'autenticacao'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-07-13  9:46:47

