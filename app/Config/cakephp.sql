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


DROP DATABASE IF EXISTS `cakephp`;
CREATE DATABASE cakephp;

/*CREATE USER 'cakephpuser'@'localhost' IDENTIFIED BY 'cakephppass'; */

GRANT ALL PRIVILEGES ON cakephp.* TO cakephpuser@'localhost' IDENTIFIED BY "cakephppass";

USE cakephp;

-- -----------------------------------------------------
-- Table USERS
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users`;

CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED AUTO_INCREMENT,
  `username` VARCHAR(20) NOT NULL UNIQUE,
  `name` VARCHAR(30) NOT NULL,
  `surname` VARCHAR(50) NOT NULL, 
  `password`  VARCHAR(255) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `tipo` VARCHAR(20) NOT NULL,
  `created` DATETIME DEFAULT NULL,
  PRIMARY KEY (`id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table PRODUCTOS
-- -----------------------------------------------------
DROP TABLE IF EXISTS `productos`;

CREATE TABLE IF NOT EXISTS `productos` (
  `id` INT UNSIGNED AUTO_INCREMENT,
  `name` VARCHAR (30) NOT NULL,
  `description` VARCHAR(200) NOT NULL,
  `moddate` TIMESTAMP,
  `place` VARCHAR(20) NOT NULL,
  `price` INT (9) NOT NULL,
  `foto` VARCHAR(255) DEFAULT NULL,
  `foto_dir` VARCHAR(255) DEFAULT NULL,
  `category` ENUM ('Casa y Jardin', 'Caza y Pesca', 'Deportes', 'Mobiliario', 'Moda', 'Motor', 'Tecnologia', 'Otros'),
  `created` DATETIME,
  `modified` DATETIME,
  `user_id` INT UNSIGNED,
  PRIMARY KEY (`id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;



-- -----------------------------------------------------
-- Table MESSAGES
-- -----------------------------------------------------


DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `user_id` int(11) DEFAULT NULL,
  `chat_id` int(11) DEFAULT NULL,
  `username` varchar(50)  DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `is_actived` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table CHATS
-- -----------------------------------------------------

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `message` text,
  `user_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*

DROP TABLE IF EXISTS `chats`;

CREATE TABLE IF NOT EXISTS `chats` (
  `id` INT UNSIGNED AUTO_INCREMENT,
  `mensaje` TEXT,
  `vendedor` boolean,
  `user_id` INTEGER UNSIGNED, 
  `producto_id` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/

-- -----------------------------------------------------
-- FOREIGN KEYS
-- -----------------------------------------------------


ALTER TABLE productos
  ADD FOREIGN KEY (user_id)
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
/*
ALTER TABLE messages
  ADD FOREIGN KEY (user_id) 
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD FOREIGN KEY (chat_id) 
  REFERENCES chats (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE chats
  ADD FOREIGN KEY (user_id) 
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
*/
-- -----------------------------------------------------
-- INSERTS `USERS`
-- -----------------------------------------------------

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `password`, `email`,`tipo`,`created`) VALUES 
(1, 'rgcarrera', 'Ramon ', 'Gago Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'rgcarrera@gmail.com','admin',NOW()), 
(2, 'pepe1993', 'Pepe ', 'Rodriguez Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'pepecarrera@gmail.com','user',NOW()), 
(3, 'joshua93', 'Joshua', 'Rodriguez Martiña', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'joshua93@gmail.com','admin',NOW());


-- -----------------------------------------------------
-- INSERTS `PRODUCTS`
-- -----------------------------------------------------

INSERT INTO `productos` (`id`, `name`, `description`, `moddate`, `place`, `price`, `foto`, `foto_dir`, `category`, `created`, `modified`, `user_id`) VALUES
(1, 'Futbolín presas', 'Futbolin Presas 2000 como nuevo. Me deshago de el por falta de espacio en casa. LLeva ademas jugadores de repuesto y un pack de 20 bolas.', NULL, 'Madrid', 650, 'futbolin.jpg', '1', 'Deportes', '2016-12-14 10:45:22', '2016-12-14 10:45:22', 1),
(2, 'Moto Ducati', 'Ducati Streetfighter 1098 absolutamente impecable. De diciembre de 2010. Con muy poco uso, solo tiene 15.738kms. Revisiones anuales hechas.', NULL, 'Burgos', 4600, 'moto.jpg', '2', 'Motor', '2016-12-14 10:46:22', '2016-12-14 10:46:22', 2),
(3, 'Bolso MK', 'Precioso bolso Michael Kors nuevo a estrenar color violeta con tachas doradas. Precio negociable', NULL, 'Madrid', 115, 'bolso.jpg', '3', 'Moda', '2016-12-14 10:47:50', '2016-12-14 10:47:50', 3),
(4, 'Escopeta', 'Vendo escopeta Winchester Diamond, en perfecto estado de acero y ajustes. Esta perfecta y se puede mandar al armero que quieran para comprobar. Gastos de envio incluidos.', NULL, 'Lugo', 350, 'escopeta.jpg', '4', 'Caza y Pesca', '2016-12-14 10:48:24', '2016-12-14 10:48:24', 2),
(5, 'Mando PS4', 'Mando personalizado de ps4 en perfecto estado. Comprado hace menos de 6 meses y con muy poco uso. Doy 1 año de garantía.', NULL, 'Alicante', 30, 'mando.jpg', '5', 'Tecnologia', '2016-12-14 10:48:59', '2016-12-14 10:48:59', 1),
(6, 'Iphone 6S', 'Urge la venta de este Iphone 6S. Me he dado cuenta de que Apple no es lo mio y quiero volver a Android de una vez.', NULL, 'Santander', 550, 'iphone.jpg', '6', 'Tecnologia', '2016-12-14 10:51:29', '2016-12-14 10:51:29', 1);


-- -----------------------------------------------------
-- INSERTS `MESSAGES`
-- -----------------------------------------------------

INSERT INTO `messages`(`id`,`message`,`user_id`,`chat_id`,`username`,`time`,`update_time`,`is_actived`) values 
(1,'sfsdfsdfsdfsd',2,1,'demo',1387445587,1387445701,1),
(2,'erdd',2,1,'demo',1387445707,1387448091,1),
(3,'asd',2,1,'demo',1387445728,1387446543,0),
(4,'a',1,1,'admin',1387446260,1387446703,0),
(5,'a',1,1,'admin',1387446750,1387446762,0),
(6,'a',2,1,'demo',1387448081,1387448084,0),
(7,'ad',2,1,'demo',1387448095,1387448868,0),
(8,'a',2,1,'demo',1387448199,1387448875,1),
(9,'a',2,1,'demo',1387448359,1387448865,0),
(10,'d',2,1,'demo',1387448562,1387448609,0),
(11,'b',2,1,'demo',1387448877,1387448877,1),
(12,'a',1,1,'admin',1387449306,1387449308,0);

-- -----------------------------------------------------
-- INSERTS `CHATS`
-- -----------------------------------------------------

INSERT INTO `chats`(`id`,`name`,`message`,`user_id`,`producto_id`,`created_by`,`time`,`update_time`) values 
(1,'hola','Prueba',1,1,'admin',1387435552,1387435552),
(2,'prueba','hola que tal?',1,2,'admin',1387435729,1387435729),
(3,'nuevochat','Bien y tu?',1,3,'admin',1387449274,1387449274);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;                        