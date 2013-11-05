-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: project1
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1

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
-- Table structure for table `pois`
--

DROP TABLE IF EXISTS `pois`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pois` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `list` text,
  `audio` text,
  `images` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pois`
--

LOCK TABLES `pois` WRITE;
/*!40000 ALTER TABLE `pois` DISABLE KEYS */;
INSERT INTO `pois` VALUES (1,'Die Frauenkirche','<ul><li>Viel Interessantes ist zu erfahren</li><li>&uuml;ber die Frauenkirche</li><li>mit ihrer wundersch&ouml;nen Kuppel</li></ul>',NULL,NULL),(2,'Die Semperoper','<ul><li>Erbaut von Gottfried Semper</li><li>eine der ber&uuml;hmtesten Opern</li><li>Oft verwechselt mit einer Brauerei, dank der Werbung der Biermarke Radeberger</li></ul>',NULL,NULL),(3,'Die TU-Dresden','<ul><li>Nicht von Gottfried Semper erbaut</li><li>und auch keine Oper</li><li>aber trotzdem viel Theater</li></ul>',NULL,NULL),(4,'Das Blaue Wunder','<ul><li>Dresdens ber&uuml;hmte Br&uuml;cke</li><li>Diese Br&uuml;cke wurde einst beinahe zerst&ouml;rt</li></ul>',NULL,NULL),(5,'Der Gro&szlig;e Garten','<ul><li>Ein wundersch&ouml;ner Flecken Gr&uuml;n in mitten der Stadt</li><li>In Auftrag gegeben von August</li><li>Durch versetztes Pflanzen der B&auml;ume enstehen einzigartige Tiefeneindr&uuml;cke</li></ul>',NULL,NULL),(6,'Der Dresdner Zwinger','<ul><li>Wie so viele Geb&auml;de in der Dresdner Innenstadt zu Zeiten des Barock erbaut</li><li>Bla Bla Bla</li><li>Keine Ahnung, was sonst zu sagen w&auml;re</li></ul>',NULL,NULL);
/*!40000 ALTER TABLE `pois` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-05 11:43:17
