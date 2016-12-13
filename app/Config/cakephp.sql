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
  `upload` VARCHAR(255) DEFAULT NULL,
  `category` ENUM ('Casa y Jardin', 'Caza y Pesca', 'Deportes', 'Mobiliario', 'Moda', 'Motor', 'Tecnologia', 'Otros'),
  `created` DATETIME,
  `modified` DATETIME,
  `user_id` INT UNSIGNED,
  PRIMARY KEY (`id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
-- -----------------------------------------------------
-- Table IMAGES
-- -----------------------------------------------------

DROP TABLE IF EXISTS `images`;

CREATE TABLE IF NOT EXISTS `images` (
   `id` int(8) unsigned NOT NULL auto_increment,
	 `filename` varchar(255) DEFAULT NULL,
   `dir` varchar(255) DEFAULT NULL,
   `mimetype` varchar(255) NULL,
	 `filesize` int(11) unsigned DEFAULT NULL,
   `created` datetime DEFAULT NULL,
   `modified` datetime DEFAULT NULL,
    PRIMARY KEY  (`id`)
  ) 
  ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*CREATE INDEX `fk_Producto_Usuario1_idx` ON `products` (`User_id` ASC);*/

-- -----------------------------------------------------
-- Table CHATS
-- -----------------------------------------------------
/*

DROP TABLE IF EXISTS `chats`;

CREATE TABLE IF NOT EXISTS `chats` (
  `id` INT UNSIGNED AUTO_INCREMENT,
  `content` TEXT,
  `moddate` TIMESTAMP NOT NULL,
  `user_id` INTEGER UNSIGNED, 
  `producto_id` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB DEFAULT CHARSET=utf8;

*/

/*CREATE INDEX `fk_Chat_Usuario1_idx` ON `chats` (`user_id` ASC);*/

-- -----------------------------------------------------
-- Table `responses_chats`
-- -----------------------------------------------------
/*

DROP TABLE IF EXISTS `responses_chats`;

CREATE TABLE IF NOT EXISTS `responses_chats` (
  id INT UNSIGNED AUTO_INCREMENT,
  user_id INTEGER UNSIGNED,
  chat_id INTEGER UNSIGNED,
  PRIMARY KEY(`id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;
*/
ALTER TABLE productos
  ADD FOREIGN KEY (user_id)
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
/*
ALTER TABLE chats
  ADD FOREIGN KEY (user_id) 
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD FOREIGN KEY (producto_id) 
  REFERENCES productos (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE responses_chats
  ADD FOREIGN KEY (user_id) 
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD FOREIGN KEY (chat_id) 
  REFERENCES chats (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

*/
-- -----------------------------------------------------
-- INSERTS `USERS`
-- -----------------------------------------------------

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `password`, `email`,`tipo`,`created`) VALUES 
(null, 'rgcarrera', 'Ramon ', 'Gago Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'rgcarrera@gmail.com','admin',NOW()), 
(NULL, 'pepe1993', 'Pepe ', 'Rodriguez Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'pepecarrera@gmail.com','user',NOW()), 
(NULL, 'joshua93', 'Joshua', 'Rodriguez Martiña', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'joshua93@gmail.com','admin',NOW());


-- -----------------------------------------------------
-- INSERTS `PRODUCTS`
-- -----------------------------------------------------

INSERT INTO `productos` (`id`, `name`, `description`, `moddate`,`place`, `price`, `foto`, `foto_dir`, `category`, `user_id`,`created`,`modified`) VALUES 
(NULL, 'Futbolin Presas', 'Futbolin Presas 2000 como nuevo. Me deshago de el por falta de espacio en casa. LLeva ademas jugadores de repuesto y un pack de 20 bolas.', CURRENT_TIMESTAMP, 'Madrid', 650, NULL, NULL, 'Casa y Jardin', 1,NOW(),NOW()), 
(NULL, 'Iphone 6S', 'Urge la venta de este Iphone 6S. Me he dado cuenta de que Apple no es lo mio y quiero volver a Android de una vez.', CURRENT_TIMESTAMP, 'Santander', 550, NULL, NULL, 'Tecnologia', NULL,NOW(),NOW()), 
(NULL, 'Moto Ducati', 'Ducati Streetfighter 1098 absolutamente impecable. De diciembre de 2010. Con muy poco uso, solo tiene 15.738kms. Revisiones anuales hechas.', CURRENT_TIMESTAMP, 'Burgos', 4600, NULL, NULL, 'Motor', 1,NOW(),NOW()), 
(NULL, 'Bolso MK', 'Precioso bolso Michael Kors nuevo a estrenar color violeta con tachas doradas. Precio negociable', CURRENT_TIMESTAMP, 'Madrid', 115, NULL, NULL, 'Moda', 2,NOW(),NOW()), 
(NULL, 'Escopeta', 'Vendo escopeta Winchester Diamond, en perfecto estado de acero y ajustes. Esta perfecta y se puede mandar al armero que quieran para comprobar. Gastos de envio incluidos.', CURRENT_TIMESTAMP, 'Lugo', 350, NULL, NULL, 'Caza y Pesca', 2,NOW(),NOW()),
(NULL, 'Mando PS4', 'Mando personalizado de ps4 en perfecto estado. Comprado hace menos de 6 meses y con muy poco uso. Doy 1 año de garantía.', CURRENT_TIMESTAMP, 'Alicante', 30, NULL, NULL, 'Tecnologia', 3,NOW(),NOW());

-- -----------------------------------------------------
-- INSERTS `CHATS`
-- -----------------------------------------------------
/*
INSERT INTO `chats` (`id`, `content`, `moddate`, `user_id`, `producto_id`) VALUES 
(NULL, 'Debes ..', CURRENT_TIMESTAMP, NULL,'1'), 
(NULL, 'Hola soy...', CURRENT_TIMESTAMP, NULL,'1'), 
(NULL, 'Mira estoy en..', CURRENT_TIMESTAMP, NULL,'2'), 
(NULL, 'Que tal?..', CURRENT_TIMESTAMP, NULL,'2'), 
(NULL, 'Anda justo estaba buscando..', CURRENT_TIMESTAMP, NULL,'3'), 
(NULL, 'Oye, me interesa..', CURRENT_TIMESTAMP, NULL,'3'), 
(NULL, 'Te gustaría..', CURRENT_TIMESTAMP, NULL,'4'), 
(NULL, 'Podriamos quedar..', CURRENT_TIMESTAMP, NULL,'4'), 
(NULL, 'He pensado..', CURRENT_TIMESTAMP, NULL,'5'), 
(NULL, 'Buenas soy...', CURRENT_TIMESTAMP, NULL,'5'),
(NULL, 'Buenas tardes soy..', CURRENT_TIMESTAMP, NULL,'6'), 
(NULL, 'Que te parece si..?', CURRENT_TIMESTAMP, NULL,'6');


-- -----------------------------------------------------
-- INSERTS `RESPONSES_CHATS`
-- -----------------------------------------------------

INSERT INTO `responses_chats` (`id`, `user_id`, `chat_id`) VALUES 
(NULL, NULL, '1'), 
(NULL, NULL, '1'),
(NULL, NULL, '3'), 
(NULL, NULL, '4'), 
(NULL, NULL, '5'), 
(NULL, NULL, '6'), 
(NULL, NULL, '7'), 
(NULL, NULL, '7'), 
(NULL, NULL, '9'), 
(NULL, NULL, '10'), 
(NULL, NULL, '11'), 
(NULL, NULL, '12');

*/
SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
