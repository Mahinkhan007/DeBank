# ************************************************************
# Sequel Ace SQL dump
# Version 20033
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: localhost (MySQL 8.0.27)
# Database: mahin
# Generation Time: 2023-01-08 18:40:15 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table transactions
# ------------------------------------------------------------

CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;

INSERT INTO `transactions` (`id`, `user_id`, `amount`, `date`)
VALUES
	(3,4,'-500','2023-01-09 00:10:41'),
	(4,5,'+500','2023-01-09 00:10:41'),
	(5,4,'-2000','2023-01-09 00:10:47'),
	(6,5,'+2000','2023-01-09 00:10:47'),
	(7,5,'-300','2023-01-09 00:10:57'),
	(8,4,'+300','2023-01-09 00:10:57'),
	(9,5,'-700','2023-01-09 00:17:20'),
	(10,4,'+700','2023-01-09 00:17:20'),
	(11,4,'-500','2023-01-09 00:18:03'),
	(12,5,'+500','2023-01-09 00:18:03');

/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `f_name` varchar(255) NOT NULL,
  `l_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `balance` float NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `f_name`, `l_name`, `username`, `email`, `phone`, `balance`, `password`)
VALUES
	(1,'Orli','Talley','locypyvy','buxaniqesa@mailinator.com','+1 (948) 635-5152',0,'Pa$$w0rd!'),
	(2,'Sacha','Burke','wixugere','vubo@mailinator.com','+1 (173) 798-5434',0,'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
	(3,'Chava','Grant','myfezamora','pohemejat@mailinator.com','+1 (588) 647-5587',0,'f3ed11bbdb94fd9ebdefbaf646ab94d3'),
	(4,'Nibir','Ahmed','nibir','nibirahmed@gmail.com','01628715444',8500,'38e67dd2628cb99a750ff80234e1d1ce'),
	(5,'Mahin','Khan','mahin','mahin@gmail.com','34567890',12000,'38e67dd2628cb99a750ff80234e1d1ce');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
