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
-- Table structure for table `task_status`
--

DROP TABLE IF EXISTS `task_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `task_status` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `task_status`
--

LOCK TABLES `task_status` WRITE;
/*!40000 ALTER TABLE `task_status` DISABLE KEYS */;
INSERT INTO `task_status` VALUES (1,'În progres'),(2,'În așteptare'),(3,'Finisat');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tasks`
--

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` VALUES (1,'First created task is the first edited task, only the title','description of the first task and now I&#39;ve added the description','2016-11-30 13:57:34','0000-00-00 00:00:00',1,2,'2016-12-24 19:12:00'),(2,'Second created task','description of the second task','2016-11-30 14:14:57','0000-00-00 00:00:00',1,2,'0000-00-00 00:00:00'),(3,'Add paper into the printer','The printer is out of paper so it needs to be recharged','2016-12-05 14:52:32','0000-00-00 00:00:00',1,2,'0000-00-00 00:00:00'),(4,'task 3','task NR.3 description','2016-12-05 15:32:01','0000-00-00 00:00:00',1,1,'2016-12-12 00:00:00'),(5,'task 3','task NR.3 description','2016-12-05 15:34:59','0000-00-00 00:00:00',1,1,'2016-12-12 00:00:00'),(6,'Close the door','<p>fsfsfsfsfsf</p>\r\n','2016-12-05 16:01:03','0000-00-00 00:00:00',1,2,'2016-12-06 00:00:00'),(7,'Addes function to createnew tasks into the database','<p>This is a priority for all tasks, to improve this fuct=ntion to avoid XSS and database injections</p>\r\n','2016-12-05 16:05:36','0000-00-00 00:00:00',1,2,'2017-01-24 00:00:00'),(8,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:09:11','0000-00-00 00:00:00',1,2,'2016-12-27 00:00:00'),(9,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:10:16','0000-00-00 00:00:00',1,3,'2016-12-27 00:00:00'),(10,'CHeck assigned to field','<p>Checking if is inserted right the assigned to field</p>\r\n','2016-12-05 16:10:18','0000-00-00 00:00:00',1,3,'2016-12-27 00:00:00'),(11,'Finish the parser','<p>You <ins><span dir=\"rtl\">must &nbsp; &nbsp;</span></ins><s>finish </s><em>the</em> <strong>parser&nbsp;</strong></p>\r\n','2016-12-06 08:24:02','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(12,'Task title','<p>check succesfull messsage</p>\r\n','2016-12-09 08:32:01','0000-00-00 00:00:00',1,2,'2016-12-27 00:00:00'),(13,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:41:37','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00'),(14,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:42:28','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00'),(15,'Test new created message','<p>fsfsdfsfs</p>\r\n','2016-12-09 21:44:16','0000-00-00 00:00:00',1,3,'2016-12-23 00:00:00'),(16,'Check file exists','<p>Check file exists task</p>\r\n','2016-12-11 23:21:24','0000-00-00 00:00:00',1,3,'2017-01-11 00:00:00'),(17,'Check file exists','<p>Check file exists task</p>\r\n','2016-12-11 23:26:18','0000-00-00 00:00:00',1,3,'2017-01-11 00:00:00'),(18,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:27:53','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(19,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:31:37','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(20,'test 2as','fsdsfsfsfsfdas','2016-12-11 23:31:39','0000-00-00 00:00:00',1,3,'2017-02-03 00:02:00'),(21,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:35:56','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(22,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:46:26','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(23,'test 2','<p>fsdsfsfsfsfd</p>\r\n','2016-12-11 23:47:53','0000-00-00 00:00:00',1,2,'2017-01-03 00:00:00'),(24,'Test new created message','<p>Test default</p>\r\n','2016-12-12 00:16:17','0000-00-00 00:00:00',1,3,'2017-01-17 00:00:00'),(25,'CHeck CK Editor when creates task','dadadad aadad ghghghgdfd <strong>fsdfsdfs &nbsp;</strong><s><em>adaddas</em></s>','2016-12-24 17:55:47','0000-00-00 00:00:00',1,1,'2015-11-30 00:00:00');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'John','Doe','password','2016-11-29 11:30:23','dist/img/user1-128x128.jpg'),(2,'Peter','Parker','password','2016-11-29 11:30:38','dist/img/user1-128x128.jpg'),(3,'Will','Smith','password','2016-11-29 11:30:50','dist/img/user1-128x128.jpg');
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

-- Dump completed on 2016-12-27 17:39:56
