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
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
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
  `created` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `modified` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `user_id` INT UNSIGNED,
  PRIMARY KEY (`id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- -----------------------------------------------------
-- Table CHATS
-- -----------------------------------------------------

DROP TABLE IF EXISTS `chats`;

CREATE TABLE `chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `created_by` INT UNSIGNED,
  `time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `update_time` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `user_id` INT UNSIGNED,
  `producto_id` INT UNSIGNED,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- FOREIGN KEYS
-- -----------------------------------------------------


ALTER TABLE productos
  ADD FOREIGN KEY (user_id)
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;

ALTER TABLE chats
  ADD FOREIGN KEY (user_id) 
  REFERENCES users (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  ADD FOREIGN KEY (producto_id) 
  REFERENCES productos (id)
  ON DELETE CASCADE
  ON UPDATE CASCADE;
  

-- -----------------------------------------------------
-- INSERTS `USERS`
-- -----------------------------------------------------

INSERT INTO `users` (`id`, `username`, `name`, `surname`, `password`, `email`,`tipo`,`created`) VALUES 
(1, 'rgcarrera', 'Ramon ', 'Gago Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'rgcarrera@gmail.com','admin',NOW()), 
(2, 'pepe1993', 'Pepe ', 'Rodriguez Carrera', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'pepecarrera@gmail.com','user',NOW()), 
(3, 'joshua93', 'Joshua', 'Rodriguez Martiña', '81df60724410ef1ea9a166dad75086bdecfcd35a', 'joshua93@gmail.com','admin',NOW());


-- -----------------------------------------------------
-- INSERTS `PRODUCTOS`
-- -----------------------------------------------------

INSERT INTO `productos` (`id`, `name`, `description`, `moddate`, `place`, `price`, `foto`, `foto_dir`, `category`, `created`, `modified`, `user_id`) VALUES
(1, 'Futbolín presas', 'Futbolin Presas 2000 como nuevo. Me deshago de el por falta de espacio en casa. LLeva ademas jugadores de repuesto y un pack de 20 bolas.', NULL, 'Madrid', 650, 'futbolin.jpg', '1', 'Deportes', '2016-12-14 10:45:22', '2016-12-14 10:45:22', 1),
(2, 'Moto Ducati', 'Ducati Streetfighter 1098 absolutamente impecable. De diciembre de 2010. Con muy poco uso, solo tiene 15.738kms. Revisiones anuales hechas.', NULL, 'Burgos', 4600, 'moto.jpg', '2', 'Motor', '2016-12-14 10:46:22', '2016-12-14 10:46:22', 2),
(3, 'Bolso MK', 'Precioso bolso Michael Kors nuevo a estrenar color violeta con tachas doradas. Precio negociable', NULL, 'Madrid', 115, 'bolso.jpg', '3', 'Moda', '2016-12-14 10:47:50', '2016-12-14 10:47:50', 3),
(4, 'Escopeta', 'Vendo escopeta Winchester Diamond, en perfecto estado de acero y ajustes. Esta perfecta y se puede mandar al armero que quieran para comprobar. Gastos de envio incluidos.', NULL, 'Lugo', 350, 'escopeta.jpg', '4', 'Caza y Pesca', '2016-12-14 10:48:24', '2016-12-14 10:48:24', 2),
(5, 'Mando PS4', 'Mando personalizado de ps4 en perfecto estado. Comprado hace menos de 6 meses y con muy poco uso. Doy 1 año de garantía.', NULL, 'Alicante', 30, 'mando.jpg', '5', 'Tecnologia', '2016-12-14 10:48:59', '2016-12-14 10:48:59', 1),
(6, 'Iphone 6S', 'Urge la venta de este Iphone 6S. Me he dado cuenta de que Apple no es lo mio y quiero volver a Android de una vez.', NULL, 'Santander', 550, 'iphone.jpg', '6', 'Tecnologia', '2016-12-14 10:51:29', '2016-12-14 10:51:29', 1);

-- -----------------------------------------------------
-- INSERTS `CHATS`
-- -----------------------------------------------------

INSERT INTO `chats`(`id`,`message`,`created_by`,`time`,`update_time`,`user_id`,`producto_id`) values 
(1,'Hola, me interesa tu anuncio',2, '2017-01-07 19:32:25', '2017-01-07 19:32:25',1,1),
(2,'El precio de la moto es negociable?',1, '2017-01-09 18:29:06', '2017-01-09 18:29:06',2,2),
(3,'Hola, que tal he visto tu bolso y me interesa',2, '2017-01-10 10:39:11', '2017-01-10 10:39:11',3,3),
(4,'En qué estado se encuentra el futbolín?',3, '2017-01-10 11:40:01', '2017-01-10 11:40:01',1,5),
(5,'¿Enviarías la escopeta por correo?',3, '2017-01-10 13:10:17', '2017-01-10 13:10:17',2,4);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;                        