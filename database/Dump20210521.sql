-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: reisetips_endelig
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `attraksjon`
--

DROP TABLE IF EXISTS `attraksjon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attraksjon` (
  `attraksjon_id` int(11) NOT NULL AUTO_INCREMENT,
  `attraksjonsnavn` varchar(45) NOT NULL,
  `gatenavn` varchar(45) NOT NULL,
  `gatenummer` varchar(45) NOT NULL,
  `postnummer` varchar(8) NOT NULL,
  `beskrivelse` text NOT NULL,
  `bilde` varchar(45) NOT NULL,
  PRIMARY KEY (`attraksjon_id`),
  KEY `fk_attraksjon_poststed1_idx` (`postnummer`),
  CONSTRAINT `fk_attraksjon_poststed1` FOREIGN KEY (`postnummer`) REFERENCES `poststed` (`postnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attraksjon`
--

LOCK TABLES `attraksjon` WRITE;
/*!40000 ALTER TABLE `attraksjon` DISABLE KEYS */;
INSERT INTO `attraksjon` VALUES (1,'Sensoji Tempelet','Asakusa','2-chome-3-1','111-0032','Den fem-etasjers pagoden til Sensoji-tempelet omgitt av høyhus, demonstrerer den fredelige sameksistensen mellom av gammelt og nytt, åndelig og praktisk. Legenden sier at to fiskere i 628 oppdaget en statue av Kannon, barmhjertighetsgudinnen, og etter flere forsøk på å returnere den til elven, beholdt de den. Et tempel ble opprinnelig bygget i 645 for å hedre Kannon, og statuen ble skjult for å beskytte den. Selv om konstruksjonene på området har blitt skadet og ombygd gjennom århundrene, har tempelets popularitet økt under Tokyos ulike herskere.','sensoji.jpg'),(2,'Ueno Zoo','Uenokoen','9-83','110-8711','Ueno dyrepark er en dyrehage på 14,3 hektar, administrert av Tokyo Metropolitan Government, og ligger i Taitō, Tokyo, Japan. Det er Japans eldste dyrepark, som åpner 20. mars 1882. Det er en fem-minutters spasertur fra Park Exit of Ueno Station, med praktisk tilgang fra Tokyos offentlige transportnettverk. Ueno Zoo Monorail, den første monorailen i landet, forbinder den østlige og vestlige delen av eiendommen.','ueno.jpg'),(3,'Tokyo Tårnet','Shibakoen','4 Chome-2-8','105-0011','Tokyo Tower er et 332,6 meter høyt tårn i Minato-ku, Tokyo, Japan. Tårnet er basert på Eiffeltårnet i Paris. Tårnet har to observasjondekk. Det første ligger 150 meter over bakken, det andre 250 meter. Begge dekkene gir et 360 graders overblikk over byen, og på klare dager kan man se Fuji-fjellet. Tokyo Tower opptrer ofte i både manga og anime.','tokyo_tower.jpg'),(4,'Yomiuri Land','Yanokuchi','4015-1','206-8566','Yomiuriland er en japansk fornøyelsespark som først ble åpnet i 1964. Det ligger i åssidene, og har turer som berg- og dalbaner og vannfluer. Det er hjemmet til Yomiuri Giants Stadium, et av treningsfeltene for Yomiuri Giants baseballlag, og var det primære treningsfeltet før Tokyo Dome ble fullført. Den drives av Yomiuri Group, foreldre til mediekonglomeratet Yomiuri Shimbun. Et badehus ble bygget for å tiltrekke seg flere eldre borgere.','yomiuri.jpg'),(5,'Chidorigafuchi','Kitanomarukoen','1-1','102-0091','Chidorigafuchi ble offentlig park i 1919. Ødeleggelse i andre verdenskrig betydde at mange av sakura-trærne ble gjenplantet etter krigen. Ifølge et monument i parken var Chidorigafuchi Park stedet for Tokyo Daiichi Junior High School, som ble etablert her i 1924 - en skole som nå har blitt Kudan Secondary School, som ligger i det nærliggende Kudankita-distriktet, omtrent en kilometer nord.','chidorigafuchi.jpg');
/*!40000 ALTER TABLE `attraksjon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fly`
--

DROP TABLE IF EXISTS `fly`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fly` (
  `fly_id` int(11) NOT NULL AUTO_INCREMENT,
  `fly_firma` varchar(45) NOT NULL,
  `flybillett_pris` float NOT NULL,
  `avreise` date NOT NULL,
  `retur` date NOT NULL,
  PRIMARY KEY (`fly_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fly`
--

LOCK TABLES `fly` WRITE;
/*!40000 ALTER TABLE `fly` DISABLE KEYS */;
INSERT INTO `fly` VALUES (1,'Japan Airways',5524,'2021-05-21','2021-05-27'),(2,'Qatar Airways',5367,'2021-05-21','2021-05-27'),(3,'Lufthansa',5714,'2021-05-21','2021-05-27');
/*!40000 ALTER TABLE `fly` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotell`
--

DROP TABLE IF EXISTS `hotell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hotell` (
  `hotell_id` int(11) NOT NULL AUTO_INCREMENT,
  `hotell_navn` varchar(45) NOT NULL,
  `gatenavn` varchar(45) NOT NULL,
  `gatenummer` varchar(45) NOT NULL,
  `postnummer` varchar(8) NOT NULL,
  `pris` float NOT NULL,
  `vurdering` varchar(45) NOT NULL,
  `bilde` varchar(45) NOT NULL,
  PRIMARY KEY (`hotell_id`),
  KEY `fk_hotell_poststed1_idx` (`postnummer`),
  CONSTRAINT `fk_hotell_poststed1` FOREIGN KEY (`postnummer`) REFERENCES `poststed` (`postnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotell`
--

LOCK TABLES `hotell` WRITE;
/*!40000 ALTER TABLE `hotell` DISABLE KEYS */;
INSERT INTO `hotell` VALUES (1,'Hotel Metropolitan Tokyo Ikebukuro','Nishikebukuro','1 Chome-6-1','171-8505',317,'4 stjerner','hotel.jpg'),(2,'Hotel Rose Garden Shinjuku','Nishishunjuku','8-chome-1-3','160-0023',411,'5 stjerner','rose_garden.jpg'),(3,'Nippon Seinenkan','Kasumigaokamachi','4-1','160-0013',586,'3 stjerner','seinenkan.jpg');
/*!40000 ALTER TABLE `hotell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `poststed`
--

DROP TABLE IF EXISTS `poststed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `poststed` (
  `postnummer` varchar(8) NOT NULL,
  `sted` varchar(45) NOT NULL,
  PRIMARY KEY (`postnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `poststed`
--

LOCK TABLES `poststed` WRITE;
/*!40000 ALTER TABLE `poststed` DISABLE KEYS */;
INSERT INTO `poststed` VALUES ('102-0091','Chiyoda'),('105-0011','Minato City'),('106-0031','Minato City'),('110-8711','Taito City'),('111-0032','Taito City'),('150-0043','Shibuya'),('160-0013','Shinjuku City'),('160-0023','Shinjuku City'),('171-8505','Toshima City'),('206-8566','Inagi');
/*!40000 ALTER TABLE `poststed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reisetips`
--

DROP TABLE IF EXISTS `reisetips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reisetips` (
  `reisetips_id` int(11) NOT NULL AUTO_INCREMENT,
  `tittel` varchar(45) NOT NULL,
  `kommentar` text NOT NULL,
  `navn` varchar(45) NOT NULL,
  `dato` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attraksjon_id` int(11) NOT NULL,
  PRIMARY KEY (`reisetips_id`),
  KEY `fk_reisetips_attraksjon_idx` (`attraksjon_id`),
  CONSTRAINT `fk_reisetips_attraksjon` FOREIGN KEY (`attraksjon_id`) REFERENCES `attraksjon` (`attraksjon_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reisetips`
--

LOCK TABLES `reisetips` WRITE;
/*!40000 ALTER TABLE `reisetips` DISABLE KEYS */;
INSERT INTO `reisetips` VALUES (1,'Folksomt','Her var det i likhet med shoppinggaten fra tempelet og mot turistinformasjonen veldig folksomt. Men absolutt fint å få med seg. Et fint tempel og tempelplass, men vanskelig å få noen religiøs følelse når det er så utrolig mange mennesker omkring. Og det som var litt trist var at så mange turister brøt fotograferingsreglene som var hengt opp inne i tempelet, men ingen passet på, så da ble det ikke noe bedring, og vestlige turister viser seg å ikke være like høflige og regelryttende som japanere.','Dorthe S','2019-07-08 07:45:00',1),(2,'Ikke alle dyr har det bra','Jeg vil nok tro at Pandaene blir godt tatt vare på som hovedattraksjonen, men det var en rekke andre dyr som sto på alt for små områder. Det syntes faktisk på dyrene at de ikke hadde det bra. Gikk hvileløst rundt og manglet pels. Vår 8 åring var lei seg etter å ha besøkt parken. Kan rett og slett ikke anbefale å reise dit.','Ove W','2018-05-01 10:15:00',2),(3,'Solnedgang over Fuji-fjellet','Wow, det anbefales å dra hit for å få en full oversikt over Tokyo by. I tillegg får du på en klar dag sehvordan Fuji fjellet raver i horisonten utenfor byen. Spesielt flott ble det ved solnedgang da det mørke omrisset av fjellet mot den røde himmelen!','Huse Fagerlie','2016-08-27 13:30:00',3),(4,'Stor attrraksjon, mye variasjon','Jeg var egentlig bare etter at berg, og jeg ble ikke skuffet. Som en annen bidragsyter sa, det er 3 store dalbaner, alle med ulike funksjoner, og alle mye moro. Min favoritt var banditt, men det var ikke det skumleste til tross for sin lengde. Trebyen berg-og-dalbane var morsom, men smertefulle på grunn av alle risting. Jeg gikk også på pariserhjulet fordi det sa det var utsikt over Mt Fuji fra toppen. Jeg fikk ikke se det jeg har å si.','Femcastra','2012-08-15 04:20:00',4),(5,'Besøk under sesongen med kirsebærblomst','Denne parken er vakker under sesongen med kirsebærblomst. Andre ganger er det ikke så mye å se. Du kan besøke Imperial Palace østhager når du besøker her.','PaulSiow','2019-03-08 16:45:00',5);
/*!40000 ALTER TABLE `reisetips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spisested`
--

DROP TABLE IF EXISTS `spisested`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spisested` (
  `spisested_id` int(11) NOT NULL AUTO_INCREMENT,
  `spisested_navn` varchar(45) NOT NULL,
  `gatenavn` varchar(45) NOT NULL,
  `gatenummer` varchar(45) NOT NULL,
  `postnummer` varchar(8) NOT NULL,
  `bilde` varchar(45) NOT NULL,
  PRIMARY KEY (`spisested_id`),
  KEY `fk_spisested_poststed1_idx` (`postnummer`),
  CONSTRAINT `fk_spisested_poststed1` FOREIGN KEY (`postnummer`) REFERENCES `poststed` (`postnummer`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spisested`
--

LOCK TABLES `spisested` WRITE;
/*!40000 ALTER TABLE `spisested` DISABLE KEYS */;
INSERT INTO `spisested` VALUES (1,'Ise Sueyoshi','Mizuno Bldg','4-2-15','106-0031','ise.jpg'),(2,'Han no Daidokoro Honten','Dogenzaka Watatsuki','2-29-13','150-0043','han.jpg'),(3,'Ninja Shinjuku Ajito','Kono Bldg','1-11-11','160-0023','ninja.jpg');
/*!40000 ALTER TABLE `spisested` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transportmiddel`
--

DROP TABLE IF EXISTS `transportmiddel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transportmiddel` (
  `transportmiddel_id` int(11) NOT NULL AUTO_INCREMENT,
  `transportmiddel_type` varchar(45) NOT NULL,
  `firma_navn` varchar(45) NOT NULL,
  `billett_pris` float NOT NULL,
  `bilde` varchar(45) NOT NULL,
  PRIMARY KEY (`transportmiddel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transportmiddel`
--

LOCK TABLES `transportmiddel` WRITE;
/*!40000 ALTER TABLE `transportmiddel` DISABLE KEYS */;
INSERT INTO `transportmiddel` VALUES (1,'T-bane','TokyoMetro',46,'tokyo_metro.jpg'),(2,'Buss','Toei Bus',36,'toei_bus.jpg');
/*!40000 ALTER TABLE `transportmiddel` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-21 18:11:33
