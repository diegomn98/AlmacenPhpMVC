-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.37-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para bd_almacen_dmn
CREATE DATABASE IF NOT EXISTS `bd_almacen_dmn` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_almacen_dmn`;

-- Volcando estructura para tabla bd_almacen_dmn.caja
CREATE TABLE IF NOT EXISTS `caja` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `alto` int(3) NOT NULL,
  `profundidad` int(3) NOT NULL,
  `ancho` int(3) NOT NULL,
  `contenido` varchar(50) NOT NULL,
  `material` varchar(50) NOT NULL,
  `fechaAlta` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_almacen_dmn.caja: ~1 rows (aproximadamente)
DELETE FROM `caja`;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` (`id`, `codigo`, `color`, `alto`, `profundidad`, `ancho`, `contenido`, `material`, `fechaAlta`) VALUES
	(28, 'CA002', '#000000', 25, 25, 25, 'TORNILLOS', 'ALGO', '2019-02-14'),
	(29, 'CA001', '#000000', 25, 25, 25, 'TORNILLOS', 'ALGO', '2019-02-14');
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;

-- Volcando estructura para tabla bd_almacen_dmn.caja_backup
CREATE TABLE IF NOT EXISTS `caja_backup` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `codigoCaja` varchar(50) NOT NULL,
  `colorCaja` varchar(50) NOT NULL,
  `altoCaja` int(3) NOT NULL,
  `profundidadCaja` int(3) NOT NULL,
  `anchoCaja` int(3) NOT NULL,
  `contenidoCaja` varchar(50) NOT NULL,
  `materialCaja` varchar(50) NOT NULL,
  `fechaAltaCaja` date NOT NULL,
  `codigoEstanteria` varchar(50) NOT NULL,
  `numeroLeja` int(3) NOT NULL,
  `fechaVenta` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigoCaja` (`codigoCaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_almacen_dmn.caja_backup: ~0 rows (aproximadamente)
DELETE FROM `caja_backup`;
/*!40000 ALTER TABLE `caja_backup` DISABLE KEYS */;
/*!40000 ALTER TABLE `caja_backup` ENABLE KEYS */;

-- Volcando estructura para tabla bd_almacen_dmn.estanteria
CREATE TABLE IF NOT EXISTS `estanteria` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nLejas` int(3) NOT NULL,
  `nLejasOcupadas` int(3) NOT NULL,
  `letraPasillo` varchar(50) NOT NULL,
  `numPasillo` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `codigo` (`codigo`),
  UNIQUE KEY `letraPasillo` (`letraPasillo`,`numPasillo`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_almacen_dmn.estanteria: ~0 rows (aproximadamente)
DELETE FROM `estanteria`;
/*!40000 ALTER TABLE `estanteria` DISABLE KEYS */;
INSERT INTO `estanteria` (`id`, `codigo`, `nLejas`, `nLejasOcupadas`, `letraPasillo`, `numPasillo`) VALUES
	(12, 'ES001', 5, 1, 'A', 5),
	(13, 'ES003', 3, 1, 'B', 2);
/*!40000 ALTER TABLE `estanteria` ENABLE KEYS */;

-- Volcando estructura para tabla bd_almacen_dmn.ocupacion
CREATE TABLE IF NOT EXISTS `ocupacion` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_caja` int(3) NOT NULL,
  `id_estanteria` int(3) NOT NULL,
  `numeroLeja` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_caja` (`id_caja`),
  UNIQUE KEY `id_estanteria` (`id_estanteria`,`numeroLeja`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_almacen_dmn.ocupacion: ~1 rows (aproximadamente)
DELETE FROM `ocupacion`;
/*!40000 ALTER TABLE `ocupacion` DISABLE KEYS */;
INSERT INTO `ocupacion` (`id`, `id_caja`, `id_estanteria`, `numeroLeja`) VALUES
	(16, 28, 13, 3),
	(17, 29, 12, 3);
/*!40000 ALTER TABLE `ocupacion` ENABLE KEYS */;

-- Volcando estructura para tabla bd_almacen_dmn.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombreUsuario` varchar(50) NOT NULL,
  `passwordUsuario` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_almacen_dmn.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` (`id`, `nombreUsuario`, `passwordUsuario`) VALUES
	(3, 'diego', '$2y$10$9blSSVx6K570JpB.CTmT2e.4mMFMBvnnG5mUHlmBND.ucyCEfinlW');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

-- Volcando estructura para disparador bd_almacen_dmn.caja_before_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `caja_before_delete` BEFORE DELETE ON `caja` FOR EACH ROW BEGIN

INSERT INTO caja_backup VALUES
(null, old.codigo, old.color, old.alto, old.profundidad, old.ancho, old.contenido, old.material,old.fechaAlta,
(SELECT codigo FROM estanteria WHERE id=(SELECT id_estanteria FROM ocupacion WHERE id_caja = old.id)),
(SELECT numeroleja FROM ocupacion WHERE old.id = id_caja),
CURDATE());

UPDATE estanteria SET nLejasOcupadas = nLejasOcupadas -1 WHERE id=(SELECT id_estanteria FROM ocupacion WHERE id_caja = old.id);

DELETE FROM ocupacion WHERE id_caja = old.id;

END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador bd_almacen_dmn.triggerDevolucion
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `triggerDevolucion` AFTER DELETE ON `caja_backup` FOR EACH ROW BEGIN INSERT INTO caja VALUES (null,'CA001','#000000',25,25,25,'TORNILLOS','ALGO','2019-02-14');  INSERT INTO ocupacion VALUES(null,(SELECT id FROM caja WHERE codigo = 'CA001'),12,3); UPDATE estanteria SET nLejasOcupadas = nLejasOcupadas +1 WHERE id = '12';END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
