-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2012 a las 14:42:34
-- Versión del servidor: 5.1.63
-- Versión de PHP: 5.3.6-13ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Autos_Provinciales`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Autos`
--

CREATE TABLE IF NOT EXISTS `Autos` (
  `Modelo` varchar(80) NOT NULL,
  `color` varchar(30) NOT NULL,
  `anio_auto` int(4) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Patente` varchar(15) NOT NULL,
  `Imagen` blob,
  `chasis` varchar(17) NOT NULL,
  `Venc_Seguro` date NOT NULL,
  `Categoria` char(1) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `chasis` (`chasis`),
  UNIQUE KEY `Patente_UNIQUE` (`Patente`),
  KEY `fk_Autos_Categoria_Autos1` (`Categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `Autos`
--

INSERT INTO `Autos` (`Modelo`, `color`, `anio_auto`, `Id`, `Patente`, `Imagen`, `chasis`, `Venc_Seguro`, `Categoria`) VALUES
('Coure', 'Celeste', 1981, 1, 'PO3456KI', NULL, '3423E564', '2010-02-23', 'B'),
('PICASSO', 'Verde', 1991, 3, 'PO34111I', NULL, '3423E5EE', '2010-02-12', 'B'),
('POLO', 'Negro', 1999, 4, 'ERT23459', NULL, '1234JIOL', '2001-10-24', 'C'),
('FORD', 'Plata', 2000, 5, 'NHU23456', NULL, '0987YUIO', '2001-01-01', 'D'),
('FOCUS', 'Blanco', 2012, 6, 'HGT67854', NULL, 'POLWE45E', '2010-01-12', 'E'),
('ford nissan', 'cristal', 2009, 9, '2k93j78', NULL, 'w3e4r5t6', '2003-12-19', 'C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria_Autos`
--

CREATE TABLE IF NOT EXISTS `Categoria_Autos` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo_Auto` varchar(30) NOT NULL,
  `Clase_Auto` char(1) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Clase_Auto` (`Clase_Auto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `Categoria_Autos`
--

INSERT INTO `Categoria_Autos` (`Id`, `Tipo_Auto`, `Clase_Auto`) VALUES
(1, 'camioneta', 'B'),
(63, 'camion', 'C'),
(64, 'Transporte_pasajeros', 'D'),
(65, 'camion_con_acoplado', 'E'),
(66, 'p/discapacitados', 'F'),
(67, 'tractor', 'G');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Choferes`
--

CREATE TABLE IF NOT EXISTS `Choferes` (
  `Nombre` varchar(50) NOT NULL,
  `Licencia` int(11) NOT NULL,
  `Domicilio` varchar(50) NOT NULL,
  `Vencimiento_Lic` date NOT NULL,
  `Clase` char(1) NOT NULL,
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Licencia_UNIQUE` (`Licencia`),
  KEY `fk_Choferes_Categoria_Autos1` (`Clase`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `Choferes`
--

INSERT INTO `Choferes` (`Nombre`, `Licencia`, `Domicilio`, `Vencimiento_Lic`, `Clase`, `Id`) VALUES
('Pepe Londrez', 890654, 'Castelli 99', '2030-03-15', 'C', 1),
('Juan Nabuco', 983247, 'Primicias 89', '2009-09-13', 'B', 2),
('Juan Perez', 987654, 'Amarena 123', '2012-09-12', 'B', 3),
('patty', 9870000, 'okokok', '2011-03-13', 'B', 4),
('Estrada Patty', 5432222, 'polo sur', '2008-03-02', 'B', 5),
('pattys pattys', 12234455, 'hjshdsbcjsc', '2007-05-07', 'B', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Estado_Auto`
--

CREATE TABLE IF NOT EXISTS `Estado_Auto` (
  `Auto` int(11) NOT NULL,
  `Conductor` int(11) DEFAULT NULL,
  `Disponibilidad` enum('SI','NO') NOT NULL,
  `Destino` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Auto`),
  KEY `fk_Estado_Auto_Choferes1` (`Conductor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Estado_Auto`
--

INSERT INTO `Estado_Auto` (`Auto`, `Conductor`, `Disponibilidad`, `Destino`) VALUES
(1, 983247, 'NO', 'RAWSON'),
(3, 987654, 'NO', 'RAWSON'),
(4, 890654, 'NO', 'TRELEW'),
(5, NULL, 'SI', NULL),
(6, NULL, 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Mantenimiento`
--

CREATE TABLE IF NOT EXISTS `Mantenimiento` (
  `Id_Auto` int(11) NOT NULL,
  `Codigo_Mant` int(3) unsigned zerofill NOT NULL,
  `Kilometraje` int(11) NOT NULL,
  `Fecha_Service` date NOT NULL,
  `Detalles` varchar(500) NOT NULL,
  `Precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Id_Auto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Mantenimiento`
--

INSERT INTO `Mantenimiento` (`Id_Auto`, `Codigo_Mant`, `Kilometraje`, `Fecha_Service`, `Detalles`, `Precio`) VALUES
(1, 000, 1000, '2012-09-12', 'Afinacion de Motor', '2000'),
(3, 000, 10354, '2009-09-12', 'Arreglo de bulones', '353'),
(5, 000, 500, '2001-03-12', 'Calibrar puertas', '235');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuarios`
--

CREATE TABLE IF NOT EXISTS `Usuarios` (
  `Nombre` varchar(50) NOT NULL,
  `Contrasenia` varchar(15) NOT NULL,
  `Cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuarios`
--

INSERT INTO `Usuarios` (`Nombre`, `Contrasenia`, `Cargo`) VALUES
('patty', 'patty', 'administradora');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Autos`
--
ALTER TABLE `Autos`
  ADD CONSTRAINT `fk_Autos_Categoria_Autos1` FOREIGN KEY (`Categoria`) REFERENCES `Categoria_Autos` (`Clase_Auto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Choferes`
--
ALTER TABLE `Choferes`
  ADD CONSTRAINT `fk_Choferes_Categoria_Autos1` FOREIGN KEY (`Clase`) REFERENCES `Categoria_Autos` (`Clase_Auto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Estado_Auto`
--
ALTER TABLE `Estado_Auto`
  ADD CONSTRAINT `fk_Estado_Auto_Autos1` FOREIGN KEY (`Auto`) REFERENCES `Autos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Estado_Auto_Choferes1` FOREIGN KEY (`Conductor`) REFERENCES `Choferes` (`Licencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `Mantenimiento`
--
ALTER TABLE `Mantenimiento`
  ADD CONSTRAINT `fk_Mantenimiento_Autos1` FOREIGN KEY (`Id_Auto`) REFERENCES `Autos` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
