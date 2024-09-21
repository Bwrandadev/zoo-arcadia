-- MySQL dump 10.13  Distrib 9.0.1, for macos14.4 (arm64)
--
-- Host: localhost    Database: zoo_arcadia24
-- ------------------------------------------------------
-- Server version	9.0.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `animals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `espece` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `habitat_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `etat` text COLLATE utf8mb4_general_ci NOT NULL,
  `vet_comm` text COLLATE utf8mb4_general_ci NOT NULL,
  `food` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_habitat_id` (`habitat_id`),
  CONSTRAINT `fk_habitat_id` FOREIGN KEY (`habitat_id`) REFERENCES `habitats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'Sophie','Girafe (Giraffa camelopardalis)',3,'2024-09-19 20:38:30','Cette girafe est en bonne santé et montre un comportement actif et curieux. Elle est bien intégrée dans son groupe social et manifeste des comportements normaux tels que le toilettage mutuel et l\'exploration de son enclos.','Lors du dernier examen vétérinaire, la girafe a été trouvée en excellent état de santé. Son pelage est propre et ses pattes sont en bonne condition. \r\n','Lors du dernier examen vétérinaire, la girafe a été trouvée en excellent état de santé. Son pelage est propre et ses pattes sont en bonne condition.','assetArcadia/sophie.jpg'),(2,'Simba','Lion (Panthera leo)',3,'2024-09-19 20:38:30','Ce lion est en bonne santé et présente un comportement actif et curieux. Il est bien intégré dans son groupe et manifeste des interactions sociales normales, telles que le toilettage et le jeu. Les observations récentes montrent quil maintient un niveau d\'énergie approprié pour son âge et son sexe.','Lors du dernier examen vétérinaire, le lion a été trouvé en excellente condition physique. Son pelage est épais et sain, ses yeux sont clairs, et ses dents sont en bon état.Des vaccinations de routine et des contrôles parasitaires sont effectués pour maintenir sa santé optimale.','Le régime alimentaire du lion se compose principalement de viande de haute qualité, incluant du bœuf, du poulet, et du lapin, pour imiter autant que possible son régime naturel de carnivore. Des jours de jeûne occasionnels sont intégrés pour simuler les périodes sans proie, comme cela se produirait dans la nature, et pour stimuler le comportement de chasse.','assetArcadia/Simba.jpg'),(3,'Dumbo','Éléphant d\'Afrique (Loxodonta africana)',3,'2024-09-19 20:38:30','Cet éléphant est en bonne santé et s\'adapte bien à son environnement au zoo. Il montre des comportements sociaux typiques et interagit régulièrement avec les autres membres de son groupe.','L\'éléphant est en excellent état physique. Ses dents et ses pieds sont surveillés régulièrement pour prévenir les problèmes courants chez les éléphants captifs. Il reçoit des soins dentaires et des bains réguliers pour entretenir sa peau. Aucune condition médicale préoccupante n\'a été détectée lors des derniers examens.','L\'alimentation quotidienne de l\'éléphant comprend du foin, des branches, des fruits et légumes frais, ainsi que des suppléments minéraux pour garantir un apport nutritionnel équilibré. Les éléphants ont également accès à des blocs de sel pour combler leurs besoins en minéraux.','assetArcadia/dumbo2.jpg'),(4,'Bolor','Alligator des Marais (Alligator mississippiensis)',2,'2024-09-19 20:50:45','Ses examens vétérinaires réguliers confirment qu’il est en bon état physique, avec un appétit stable et une bonne condition générale.','Bien que l\'alligator montre quelques signes de vieillissement, comme un rythme plus lent et une usure de ses dents, il est globalement en bonne santé. Le vétérinaire le surveille régulièrement pour s\'assurer qu\'il reste confortable et sans douleur.','L\'alligator est nourri principalement de poissons, de volailles et de petits mammifères. Son alimentation est ajustée en fonction de son âge, en privilégiant des portions adaptées et faciles à consommer.','assetArcadia/gator.jpg'),(5,'Flamingo','Flamant Rose (Phoenicopterus roseus)',2,'2024-09-19 20:50:45','Notre flamant rose se porte bien dans son enclos, qui dispose d\'un grand bassin d\'eau peu profonde et de zones sablonneuses pour marcher et se nourrir. Il est souvent vu en groupe avec ses congénères, reflétant son comportement social naturel.','Le vétérinaire confirme que le flamant rose est en bonne santé, avec une bonne coloration et un comportement actif. Il fait l\'objet de contrôles réguliers pour surveiller sa condition physique et prévenir d’éventuelles infections.','Il est nourri avec un régime équilibré composé de granulés spéciaux pour flamants roses, enrichis en caroténoïdes, ainsi que de petits crustacés et d’algues pour simuler son alimentation naturelle.','assetArcadia/flamingo.jpg'),(6,'Donatello','Tortue à Joues Rouges (Mauremys leprosa)',2,'2024-09-19 20:50:45','Notre tortue à joues rouges se porte bien dans son enclos aquatique, conçu pour imiter son habitat naturel avec des zones pour nager, se reposer et prendre le soleil.','Le vétérinaire indique que la tortue est en bonne santé, avec un comportement actif et un appétit normal. Des examens réguliers montrent une croissance stable et aucune maladie apparente.','Elle est nourrie avec un régime varié comprenant des petits poissons, des insectes, des crustacés et des végétaux aquatiques, pour refléter son alimentation naturelle.','assetArcadia/donatello.jpg'),(7,'Kaa','Python Vert (Morelia viridis)',1,'2024-09-19 20:56:44','Notre python vert se porte bien et s\'adapte parfaitement à son environnement recréé au zoo, avec des branches et une humidité contrôlée pour imiter son habitat naturel.','Le python vert est en excellente santé, avec un comportement alimentaire normal et aucune indication de stress ou de maladie.','Notre python est un serpent carnivore qui se nourrit principalement de petits mammifères, d’oiseaux et parfois de reptiles.','assetArcadia/kaa.jpg'),(8,'Pépito','Ara Jaune et Bleu (Ara ararauna)',1,'2024-09-19 20:56:44','et ara jaune et bleu se porte très bien dans son habitat spécialement conçu, qui offre de nombreuses perches et un environnement enrichi pour encourager son comportement naturel de vol et d\'exploration.','Le vétérinaire confirme que l\'ara est en bonne santé, avec des plumes brillantes et un comportement actif. Des examens réguliers montrent qu\'il est en excellent état général.','Le vétérinaire confirme que l\'ara est en bonne santé, avec des plumes brillantes et un comportement actif. Des examens réguliers montrent qu\'il est en excellent état général.','assetArcadia/pepito.jpg'),(9,'Kala','Gorille Femelle (Gorilla gorilla)',1,'2024-09-19 20:56:44','Notre femelle gorille est bien adaptée à son enclos, qui recrée son habitat naturel avec de nombreux espaces pour grimper et explorer. Elle s\'est récemment cassé une dent, mais cela n\'affecte pas son comportement global ni son appétit.','Le vétérinaire a examiné la dent cassée de la gorille et a confirmé que cela ne pose pas de problème majeur pour sa santé. Un suivi est en cours pour s\'assurer qu\'il n\'y a pas de douleur ou d\'infection, et des ajustements alimentaires temporaires ont été faits pour faciliter sa mastication.','Elle est nourrie principalement de fruits, de légumes, de feuilles et de pousses. Pour l’instant, son régime a été adapté avec des aliments plus tendres et découpés en morceaux plus petits pour protéger sa dent.','assetArcadia/kala.jpg');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `avis`
--

DROP TABLE IF EXISTS `avis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `validated_by` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `validated_by` (`validated_by`),
  CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`validated_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avis`
--

LOCK TABLES `avis` WRITE;
/*!40000 ALTER TABLE `avis` DISABLE KEYS */;
INSERT INTO `avis` VALUES (1,'lisalisa@gmail.com','Super zoo expérience inoubliable','rejected','2024-09-18 14:23:25',2),(2,'augustine123@gmail.com','SUPER ZOO','approved','2024-09-18 14:24:36',2),(3,'richard5@hotmail.fr','Je me suis amusé, je reviendrais','approved','2024-09-18 14:27:44',2),(4,'juliettepraise@hotmail.fr','Excellente journée, de plus le beau temps était au rendez-vous !!!! ','pending','2024-09-19 09:39:10',NULL),(5,'ink.dev@gmail.com','Journée de ouf au zoo ','approved','2024-09-19 09:51:01',2),(6,'gabriel94@yahoo.fr','Il y a beaucoup d\'animaux ','pending','2024-09-19 17:01:44',NULL);
/*!40000 ALTER TABLE `avis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'','','','2024-09-18 11:22:15'),(2,'lisalisa@gmail.com','Tarif jeune','Bonjour, proposez-vous des réductions pour les étudiants ?','2024-09-18 11:48:16'),(3,'lisalisa@gmail.com','Tarif jeune','Bonjour, proposez-vous des réductions pour les étudiants ?','2024-09-18 11:49:38'),(4,'lisalisa@gmail.com','Tarif jeune','Bonjour, proposez-vous des réductions pour les étudiants ?','2024-09-18 11:56:24'),(5,'apoline123@gmail.com','horaire petit train','Pourrais-je avoir l\'heure de passage des petits train merci ','2024-09-18 11:57:28'),(6,'emilie@gmail.com','accessibilité poussette','Bonjour, dites-moi le parc est-il accessible avec une poussette? Merci','2024-09-18 16:52:42'),(7,'gabriel94@yahoo.fr','Nouveaux animaux','Bonjour, il y aura t-il de nouveaux animaux prochainement ?','2024-09-19 17:02:37'),(8,'lilou1234@gmail.com','accessibilité PMR','bonjour, pourriez vous me dire si il est facile d\'accès pour les personnes PMR','2024-09-19 23:52:31'),(9,'kamy@gmail.com','rzfgzrg','grzgvz','2024-09-19 23:54:05'),(10,'zfdaf@gmail.com','feafi','fqfCSDC','2024-09-19 23:55:25'),(11,'CEDFEZQ@GZFKFEOJ.COM','AZF','FAEZF','2024-09-19 23:56:07');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `habitats`
--

DROP TABLE IF EXISTS `habitats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `habitats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `habitats`
--

LOCK TABLES `habitats` WRITE;
/*!40000 ALTER TABLE `habitats` DISABLE KEYS */;
INSERT INTO `habitats` VALUES (1,'Savane','La savane est une vaste étendue de prairies et d\'arbres épars. C\'est le royaume des grands mammifères tels que les éléphants, les lions et les girafes, qui y cohabitent en harmonie avec des herbivores de toutes tailles.','assetArcadia/habitatSavane.jpg'),(2,'Jungle','La jungle est un habitat luxuriant et dense, abritant une incroyable diversité d\'animaux. Les singes, les oiseaux colorés et les serpents y vivent au milieu d\'une végétation épaisse, où ils trouvent refuge et nourriture.','assetArcadia/habitatJungle.jpg'),(3,'Marais','Les marais sont des zones humides regorgeant de vie. Vous y rencontrerez des oiseaux aquatiques,des des reptiles, des amphibiens et des rongeurs qui prospèrent dans cet environnement riche en eau et végétation.','assetArcadia/habitatMarais.jpg');
/*!40000 ALTER TABLE `habitats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meal`
--

DROP TABLE IF EXISTS `meal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `meal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `food_type` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `quantite` float NOT NULL,
  `feeding_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `repas_animal_id` (`animal_id`),
  KEY `repas_roles` (`user_id`),
  CONSTRAINT `repas_animal_id` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`),
  CONSTRAINT `repas_roles` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meal`
--

LOCK TABLES `meal` WRITE;
/*!40000 ALTER TABLE `meal` DISABLE KEYS */;
INSERT INTO `meal` VALUES (1,1,'feuille acacia',1.53,'2024-09-14 07:20:00',2),(2,6,'sauterelles',0.1,'2024-09-09 07:25:00',2);
/*!40000 ALTER TABLE `meal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin'),(2,'employe'),(5,'veterinaire');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `services` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'\"La Tanière Gourmande.\"','Découvrez notre restaurant éco-responsable au cœur du zoo, offrant des repas savoureux à base d\'ingrédients locaux et de saison. Profitez d\'une cuisine saine, délicieuse et abordable tout en soutenant les producteurs locaux et en respectant l\'environnement. ','uploads/restaurant.jpg','2024-09-19 19:31:40'),(2,'\"Le Train des Aventuriers.\"','Embarquez à bord de notre petit train écologique pour une visite inoubliable du zoo ! Propulsé à l\'énergie verte, il vous emmène à travers des paysages naturels préservés, vous permettant de découvrir les animaux tout en respectant l\'environnement. Un voyage ludique et éco-responsable pour toute la famille !','uploads/petitTrain3.png','2024-09-19 19:32:56'),(3,'\"Les Visites Guidées.\"','Partez à la découverte du zoo avec nos visites guidées animées par un guide passionné. Explorez les habitats des animaux, apprenez des anecdotes fascinantes et profitez d\'une expérience unique au plus près de la nature. Une aventure enrichissante et captivante pour petits et grands !\r\n** Les visites guidées sont gratuites.','uploads/guideTour.jpg','2024-09-19 19:33:34');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adminzoo@arcadia.fr','$2y$10$X1Vv8GxR43D.OmCEQo1Pe.f3.V0i3MLIrGdaeksUAe8HNS14q/qeK',1,'2024-09-18 10:55:33'),(2,'employe@arcadia.fr','$2y$10$a8S96ZcRLNz4zEyQzR4wG.eLBc8zWQOQQ3vS7TJJIclYFvxGlM9he',2,'2024-09-17 17:23:10'),(3,'veterinaire@arcadia.fr','$2y$10$4J7OjL2S96O/Gh37eLll3u4.qLatOXo4mMvCb2YPN6vSFMoyf4yEW',5,'2024-09-17 17:22:58'),(11,'veterinaire10@arcadia.fr','$2y$10$sXPOE.Tt7KEje.MKqnLwX.77rAn1Cvy6RgBjQPnc1B8Xn1XMouFDq',5,'2024-09-19 16:38:41');
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

-- Dump completed on 2024-09-21 17:43:33
