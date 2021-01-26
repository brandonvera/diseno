-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 26-01-2021 a las 06:57:13
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `registro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE IF NOT EXISTS `clientes` (
  `ID` int(12) NOT NULL AUTO_INCREMENT,
  `DNI` int(12) NOT NULL,
  `NOMBRE` tinytext,
  `DIRRECCION` tinytext,
  `TELEFONO` tinytext,
  `CORREO` tinytext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `DNI`, `NOMBRE`, `DIRRECCION`, `TELEFONO`, `CORREO`) VALUES
(1, 27353347, 'BRANDON VERA', 'PALO GORDO VEREDA 2', '04168724703', 'VERA_HOLA@GMAIL.COM'),
(7, 28698705, 'JULIO IGLESIAS', 'LA CONCORDIA VERADA 2', '04168755023', 'JULIAN123@GMAIL.COM'),
(8, 18520036, 'MARIA GUZMAN', 'AVENIDA TACHIRA CALLE 3', '04145933201', 'MARIAG123@GMAIL.COM'),
(9, 28369074, 'CARLOS ENRIQUE', 'PALO GORDO SECTOR TOICA', '04168755205', 'ENRIQUE_C@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `USUARIO` tinytext NOT NULL,
  `CLAVE` tinytext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`USUARIO`, `CLAVE`) VALUES
('admin', 'iniciodesesion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

DROP TABLE IF EXISTS `ventas`;
CREATE TABLE IF NOT EXISTS `ventas` (
  `FACTURA` int(12) NOT NULL AUTO_INCREMENT,
  `ID` int(12) NOT NULL,
  `FECHA` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `COSTO` double DEFAULT NULL,
  PRIMARY KEY (`FACTURA`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`FACTURA`, `ID`, `FECHA`, `COSTO`) VALUES
(10, 1, '2020-01-13 04:30:00', 300.58),
(16, 7, '2020-04-22 04:30:00', 152.32),
(17, 8, '2020-06-09 04:30:00', 452.63),
(18, 9, '2020-08-12 04:30:00', 260.36),
(19, 7, '2021-01-14 05:09:07', 745);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `clientes` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
