/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19  Distrib 10.11.14-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: web_dev
-- ------------------------------------------------------
-- Server version	10.11.14-MariaDB-0ubuntu0.24.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT current_timestamp(),
  `views` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  KEY `fk_user_article` (`user_id`),
  CONSTRAINT `fk_user_article` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `articles`
--

LOCK TABLES `articles` WRITE;
/*!40000 ALTER TABLE `articles` DISABLE KEYS */;
INSERT INTO `articles` VALUES
(1,2,'Заголовок 1 статьи','Содержимое 1 статьи','2026-05-25 13:30:25',5),
(2,3,'Заголовок 2 статьи','Содержимое 2 статьи','2026-05-25 13:30:25',10),
(3,4,'Заголовок 3 статьи','Содержимое 3 статьи','2026-05-25 13:30:25',0),
(4,5,'Заголовок 4 статьи','Содержимое 4 статьи','2026-05-25 13:30:25',11),
(5,6,'Заголовок 5 статьи','Содержимое 5 статьи','2026-05-25 13:30:25',7),
(6,3,'Заголовок 6 статьи','Содержимое 6 статьи','2026-05-25 13:30:25',3),
(7,4,'Заголовок 7 статьи','Содержимое 7 статьи','2026-05-25 13:30:25',2),
(8,2,'Заголовок 8 статьи','Содержимое 8 статьи','2026-05-25 13:30:25',16);
/*!40000 ALTER TABLE `articles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'Электроника'),
(2,'Одежда'),
(3,'Книги'),
(4,'Дом');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `text` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `fk_article_comment` (`article_id`),
  KEY `fk_user_comment` (`user_id`),
  CONSTRAINT `fk_article_comment` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES
(1,2,2,'Комментарий 1','2026-05-25 13:40:06'),
(2,3,3,'Комментарий 2','2026-05-25 13:40:06'),
(3,4,4,'Комментарий 3','2026-05-25 13:40:06'),
(4,5,5,'Комментарий 4','2026-05-25 13:40:06'),
(5,6,3,'Комментарий 5','2026-05-25 13:40:06'),
(6,7,5,'Комментарий 6','2026-05-25 13:40:06'),
(7,8,4,'Комментарий 7','2026-05-25 13:40:06'),
(8,4,3,'Комментарий 8','2026-05-25 13:40:06'),
(9,2,5,'Комментарий 9','2026-05-25 13:40:06'),
(10,7,2,'Комментарий 10','2026-05-25 13:40:06'),
(11,8,4,'Комментарий 11','2026-05-25 13:40:06'),
(12,5,5,'Комментарий 12','2026-05-25 13:40:06');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `guestbook`
--

DROP TABLE IF EXISTS `guestbook`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `text` varchar(300) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `guestbook`
--

LOCK TABLES `guestbook` WRITE;
/*!40000 ALTER TABLE `guestbook` DISABLE KEYS */;
INSERT INTO `guestbook` VALUES
(1,'Andy','Good bakery',1),
(2,'Sarah','Perfect customer service',2),
(3,'user2','message2',3);
/*!40000 ALTER TABLE `guestbook` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,'Headphones',5000.00,'Sound quality',1),
(2,'Keyboard',3000.00,'Typing quality',1),
(3,'PC',100000.00,'Gaming quality',1),
(4,'Mouse',2000.00,'Fidgeting quality',1),
(5,'Laptop',80000.00,'Working quality',1),
(6,'Web-camera',4200.00,'Image quality',1),
(8,'Chair',1500.00,'Sitting quality',4),
(9,'Lamp',1000.00,'Light quality',4),
(12,'Table',6000.00,'Sturdy one!',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'horizonSpark','kadarmetov.dn@gmail.com','$2y$10$9sGwU8mBuAqzyfFAhvO95ucKodKTfDAaJZDQA1i3dbvXZRiHPP2de','2026-05-23 08:39:40'),
(2,'testUser1','testEmail1@yandex.ru','$2y$10$AoTWPmi.nkT9BQ9B48U7FudNXQB.mdO5rjIIQ8FSldy7d8kn3VH/m','2026-05-23 13:51:53'),
(3,'testUser2','testEmail2@gmail.com','$2y$10$jTLk.HD6XcFXGBDYzXCiUOekzdl..D07.Ze/KSioyGvAyl0x7SCMy','2026-05-25 10:29:14'),
(4,'testUser3','testEmail3@gmail.com','$2y$10$Bb2JYwfCAi.wIUwvhfmMX.AMiUkw4GmeqXjN6h9r9GmqsVsgj1x3K','2026-05-25 11:02:12'),
(5,'testUser4','testEmail4@gmail.com','$2y$10$t4X/a76RDc7HATthm10/0OwTaYlDrA9fv92DY15b9RbpqA4TNFJ7K','2026-05-25 11:07:11'),
(6,'testUser5','testEmail5@gmail.com','$2y$10$Wh0coGc/bCtITX73F3iYiO0JkuzBDafpEONVyMlqEyQrlO2UKSp7G','2026-05-25 11:11:01');
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

-- Dump completed on 2026-05-27 21:40:16
