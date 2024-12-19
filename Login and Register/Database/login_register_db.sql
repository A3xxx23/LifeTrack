create database login_register_db

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_register_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

-- Crear tabla `tbl_user`
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT, -- AUTO_INCREMENT debe ir aquí
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `registration_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`) -- Definimos la clave primaria directamente
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `tbl_list` (
  `tbl_list_id` INT(11) NOT NULL AUTO_INCREMENT,
  `list` VARCHAR(255) NOT NULL,
  `registration_date` DATETIME NOT NULL,  -- Campo para la fecha de registro
  PRIMARY KEY (`tbl_list_id`)
)

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime DEFAULT NULL
)

CREATE TABLE `task` (
  `task_id` int(11) NOT NULL,
  `task` varchar(150) NOT NULL,
  `status` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Comprobar si AUTO_INCREMENT está configurado correctamente
ALTER TABLE `tbl_user` AUTO_INCREMENT=11;
ALTER TABLE `tbl_user` 
ADD `registration_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP;


select * from tbl_user