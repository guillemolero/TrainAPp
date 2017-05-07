-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2017 a las 23:55:53
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trainapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `NOMBRE` varchar(32) NOT NULL,
  `ZONA` enum('HOMBROS','PECHO','ESPALDA','BRAZOS','ABDOMEN','PIERNAS') NOT NULL,
  `MAQUINA` varchar(32) DEFAULT NULL,
  `TIPO` enum('FUERZA','CARDIO') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`NOMBRE`, `ZONA`, `MAQUINA`, `TIPO`) VALUES
('APERTURAS MANCUERNAS', 'PECHO', NULL, 'FUERZA'),
('CURL DE FEMORAL EN MAQUINA', 'PIERNAS', NULL, 'FUERZA'),
('DOMINADAS', 'ESPALDA', NULL, 'FUERZA'),
('ELEVACIONES DE TALONES DE PIE', 'PIERNAS', NULL, 'FUERZA'),
('JALON AL PECHO', 'ESPALDA', NULL, 'FUERZA'),
('JALON AL PECHO AGARRE ESTRECHO', 'ESPALDA', NULL, 'FUERZA'),
('PRESS BANCA INCLINADO', 'PECHO', NULL, 'FUERZA'),
('PRESS BANCA PLANO', 'PECHO', NULL, 'FUERZA'),
('PRESS MILITAR', 'HOMBROS', NULL, 'FUERZA'),
('PULL FACE', 'HOMBROS', NULL, 'FUERZA'),
('PULL OVER', 'PECHO', NULL, 'FUERZA'),
('REMO EN POLEA', 'ESPALDA', NULL, 'FUERZA'),
('REMO MANCUERNAS', 'ESPALDA', NULL, 'FUERZA'),
('SENTADILLA', 'PIERNAS', NULL, 'FUERZA'),
('ZANCADAS/LUNGES', 'PIERNAS', NULL, 'FUERZA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `USUARIO` varchar(16) NOT NULL,
  `EJERCICIO` varchar(32) NOT NULL,
  `DIA` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `REGISTRO` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `USER` varchar(16) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`NOMBRE`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`DIA`),
  ADD KEY `FK_USUARIO` (`USUARIO`),
  ADD KEY `FK_EJERCICIO` (`EJERCICIO`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`USER`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `FK_EJERCICIO` FOREIGN KEY (`EJERCICIO`) REFERENCES `ejercicios` (`NOMBRE`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_USUARIO` FOREIGN KEY (`USUARIO`) REFERENCES `usuarios` (`USER`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
