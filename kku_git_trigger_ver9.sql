-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: kku_git
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `user_id` varchar(10) NOT NULL,
  `problem_idx` int NOT NULL,
  `content` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT (curdate()),
  KEY `fk_comment_problem_list1_idx` (`problem_idx`),
  KEY `fk_comment_user1_idx` (`user_id`),
  CONSTRAINT `fk_comment_problem_list1` FOREIGN KEY (`problem_idx`) REFERENCES `problem_list` (`idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_comment_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notice`
--

DROP TABLE IF EXISTS `notice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notice` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `title` varchar(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `author` varchar(10) NOT NULL,
  `date` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`idx`),
  KEY `fk_notice_user1_idx` (`author`),
  CONSTRAINT `fk_notice_user1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notice`
--

LOCK TABLES `notice` WRITE;
/*!40000 ALTER TABLE `notice` DISABLE KEYS */;
/*!40000 ALTER TABLE `notice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `problem_list`
--

DROP TABLE IF EXISTS `problem_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `problem_list` (
  `idx` int NOT NULL AUTO_INCREMENT,
  `subject` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `content` varchar(2000) NOT NULL,
  `choice1` varchar(100) DEFAULT NULL,
  `choice2` varchar(100) DEFAULT NULL,
  `choice3` varchar(100) DEFAULT NULL,
  `answer` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT (curdate()),
  `author` varchar(10) NOT NULL,
  `report` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`idx`),
  KEY `fk_problem_list_user1_idx` (`author`),
  KEY `fk_problem_list_subject_list1_idx` (`subject`),
  CONSTRAINT `fk_problem_list_subject_list1` FOREIGN KEY (`subject`) REFERENCES `subject_list` (`subject`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_problem_list_user1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `problem_list`
--

LOCK TABLES `problem_list` WRITE;
/*!40000 ALTER TABLE `problem_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `problem_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `report_record`
--

DROP TABLE IF EXISTS `report_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_record` (
  `user_id` varchar(10) NOT NULL,
  `problem_idx` int NOT NULL,
  PRIMARY KEY (`user_id`,`problem_idx`),
  KEY `fk_report_record_problem_list1` (`problem_idx`),
  CONSTRAINT `fk_report_record_problem_list1` FOREIGN KEY (`problem_idx`) REFERENCES `problem_list` (`idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_report_record_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_record`
--

LOCK TABLES `report_record` WRITE;
/*!40000 ALTER TABLE `report_record` DISABLE KEYS */;
/*!40000 ALTER TABLE `report_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solved_problem`
--

DROP TABLE IF EXISTS `solved_problem`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solved_problem` (
  `user_id` varchar(10) NOT NULL,
  `problem_idx` int NOT NULL,
  PRIMARY KEY (`user_id`,`problem_idx`),
  KEY `fk_solved_problem_user_idx` (`user_id`),
  KEY `fk_solved_problem_problem_list1_idx` (`problem_idx`),
  CONSTRAINT `fk_solved_problem_problem_list1` FOREIGN KEY (`problem_idx`) REFERENCES `problem_list` (`idx`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_solved_problem_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solved_problem`
--

LOCK TABLES `solved_problem` WRITE;
/*!40000 ALTER TABLE `solved_problem` DISABLE KEYS */;
/*!40000 ALTER TABLE `solved_problem` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subject_list`
--

DROP TABLE IF EXISTS `subject_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subject_list` (
  `subject` varchar(10) NOT NULL,
  PRIMARY KEY (`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subject_list`
--

LOCK TABLES `subject_list` WRITE;
/*!40000 ALTER TABLE `subject_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `subject_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `point` int NOT NULL DEFAULT '0',
  `grade` char(8) NOT NULL DEFAULT 'bronze',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('admin','1234','관리자',10,'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `update_grade` BEFORE UPDATE ON `user` FOR EACH ROW BEGIN
    IF NEW.id = 'admin' THEN
        SET NEW.grade = 'admin';
    ELSEIF NEW.point >= 200 THEN
        SET NEW.grade = 'gold';
    ELSEIF NEW.point >= 100 THEN
        SET NEW.grade = 'silver';
    END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-03  0:12:00
