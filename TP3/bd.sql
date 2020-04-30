-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.1.72-community - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para turnero
CREATE DATABASE IF NOT EXISTS `turnero` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `turnero`;

-- Volcando estructura para tabla turnero.turnos
CREATE TABLE IF NOT EXISTS `turnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` char(255) DEFAULT NULL,
  `email` char(255) DEFAULT NULL,
  `telefono` char(255) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `calzado` int(10) unsigned DEFAULT NULL,
  `altura` int(10) unsigned DEFAULT NULL,
  `pelo` int(10) unsigned DEFAULT NULL,
  `turno` date DEFAULT NULL,
  `horario` char(255) DEFAULT NULL,
  `diagnostico` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
