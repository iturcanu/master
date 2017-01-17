-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: erp
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `categorii_depozit`
--

DROP TABLE IF EXISTS `categorii_depozit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categorii_depozit` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `si` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categorii_depozit`
--

LOCK TABLES `categorii_depozit` WRITE;
/*!40000 ALTER TABLE `categorii_depozit` DISABLE KEYS */;
INSERT INTO `categorii_depozit` VALUES (1,'cablu','metri'),(2,'tehnică de calcul','unități'),(3,'birotică','unități'),(4,'mobilier','unități');
/*!40000 ALTER TABLE `categorii_depozit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `depozit`
--

DROP TABLE IF EXISTS `depozit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `depozit` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `quantity` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(5) NOT NULL,
  `category` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `depozit`
--

LOCK TABLES `depozit` WRITE;
/*!40000 ALTER TABLE `depozit` DISABLE KEYS */;
INSERT INTO `depozit` VALUES (1,'UTP-8','cablu produs la uzina Odesskabeli','400','2017-01-13 21:29:24',2,1),(2,'ASUS 53XA','laptop ASUS 53XA inclusiv mouse si geanta','10','2017-01-16 20:22:22',2,2),(3,'2','2','2','2017-01-16 23:13:10',2,2),(4,'Masă de birou','<p>Masa de birou de productie autohtona</p>\r\n','15','2017-01-16 23:15:49',2,4),(5,'Scaune','<p>Scaune din lemn pentru sala de ședințe, țara de origine Rom&acirc;nia</p>\r\n','20','2017-01-17 04:33:30',2,4);
/*!40000 ALTER TABLE `depozit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `task_status`
--

DROP TABLE IF EXISTS `task_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_status`
--

LOCK TABLES `task_status` WRITE;
/*!40000 ALTER TABLE `task_status` DISABLE KEYS */;
INSERT INTO `task_status` VALUES (1,'În progres'),(2,'În așteptare'),(3,'Finisat'),(4,'Neasignat');
/*!40000 ALTER TABLE `task_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tasks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `reported_by` int(5) NOT NULL,
  `assigned_to` int(5) NOT NULL,
  `deadline` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_status` int(2) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'First created task is the first edited task, only the title','description of the first task and now I&#39;ve added the description','2016-11-30 13:57:34','0000-00-00 00:00:00',1,2,'2016-12-24 19:12:00',1),(2,'Second created task','description of the second task','2016-11-30 14:14:57','0000-00-00 00:00:00',1,2,'0000-00-00 00:00:00',2),(3,'Add paper into the printer','The printer is out of paper so it needs to be recharged now','2016-12-05 14:52:32','0000-00-00 00:00:00',1,2,'2031-05-24 11:05:00',1),(4,'task 3','task NR.3 description','2016-12-05 15:32:01','0000-00-00 00:00:00',1,1,'2016-12-12 00:00:00',3),(5,'task 3','task NR.3 description','2016-12-05 15:34:59','0000-00-00 00:00:00',1,1,'2016-12-12 00:00:00',4),(6,'Close the door','<p>fsfsfsfsfsf</p>\r\n','2016-12-05 16:01:03','0000-00-00 00:00:00',1,2,'2016-12-06 00:00:00',4),(7,'Addes function to createnew tasks into the database','<p>This is a priority for all tasks, to improve this fuct=ntion to avoid XSS and database injections</p>\r\n','2016-12-05 16:05:36','0000-00-00 00:00:00',1,2,'2017-01-24 00:00:00',4),(8,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:09:11','0000-00-00 00:00:00',1,2,'2016-12-27 00:00:00',4),(9,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:10:16','0000-00-00 00:00:00',1,3,'2016-12-27 00:00:00',4),(10,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:10:18','0000-00-00 00:00:00',1,3,'2016-12-27 00:00:00',4),(11,'Finish the parser','<p>You <ins><span dir=\"rtl\">must &nbsp; &nbsp;</span></ins><s>finish </s><em>the</em> <strong>parser&nbsp;</strong></p>\r\n','2016-12-06 08:24:02','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',4),(12,'Task title','<p>check succesfull messsage</p>\r\n','2016-12-09 08:32:01','0000-00-00 00:00:00',1,2,'2016-12-27 00:00:00',4),(13,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:41:37','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00',4),(14,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:42:28','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00',4),(15,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:44:16','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00',4),(16,'Check file exists','<p>Check file exists task</p>\r\n','2016-12-11 23:21:24','0000-00-00 00:00:00',1,3,'2017-01-11 00:00:00',4),(17,'Check file exists','<p>Check file exists task</p>\r\n','2016-12-11 23:26:18','0000-00-00 00:00:00',1,3,'2017-01-11 00:00:00',4),(18,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:27:53','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',3),(19,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:31:37','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',4),(20,'test 2as','fsdsfsfsfsfdas','2016-12-11 23:31:39','0000-00-00 00:00:00',1,3,'2017-02-03 00:02:00',4),(21,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:35:56','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',4),(22,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:46:26','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',4),(23,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:47:53','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00',4),(24,'Test new created message','<p>Test default</p>\r\n','2016-12-12 00:16:17','0000-00-00 00:00:00',1,3,'2017-01-17 00:00:00',4),(25,'CHeck CK Editor when creates task','dadadad aadad ghghghgdfd <strong>fsdfsdfs &nbsp;</strong><s><em>adaddas</em></s>','2016-12-24 17:55:47','0000-00-00 00:00:00',1,1,'2015-11-30 00:00:00',2),(26,'CHeck deadline assign','Check content','2016-12-29 10:28:06','0000-00-00 00:00:00',1,1,'2016-12-30 13:12:00',4),(27,'task fdsfs','<p>dadsfsfsd</p>\r\n','2016-12-29 10:34:20','0000-00-00 00:00:00',1,2,'2016-12-29 13:12:00',4),(28,'Close the door now','dfsdfsdfs fsfds ssssss sdfguo','2016-12-29 10:37:40','0000-00-00 00:00:00',1,3,'2016-12-01 02:08:00',1);
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `to_do_list`
--

DROP TABLE IF EXISTS `to_do_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `to_do_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `to_do_list`
--

LOCK TABLES `to_do_list` WRITE;
/*!40000 ALTER TABLE `to_do_list` DISABLE KEYS */;
INSERT INTO `to_do_list` VALUES (1,'create the model'),(2,'add AJAX delete and create');
/*!40000 ALTER TABLE `to_do_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'administrator'),(2,'angajat');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(150) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `role` int(2) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John','Doe','2ac9cb7dc02b3c0083eb70898e549b63','2016-11-29 11:30:23','dist/img/user1-128x128.jpg','j.doe@test.com',2),(2,'Peter','Parker','2ac9cb7dc02b3c0083eb70898e549b63','2016-11-29 11:30:38','img/users/2-1483638705.png','p.parker@test.com',1),(3,'Will','Smith','2ac9cb7dc02b3c0083eb70898e549b63','2016-11-29 11:30:50','dist/img/user1-128x128.jpg','w.smith@test.com',2),(4,'Franka','Browna','2ac9cb7dc02b3c0083eb70898e549b63','2017-01-03 09:32:52','img/users/2-1483638682.png','f.brown@test.coma',2);
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

-- Dump completed on 2017-01-17  5:36:39
