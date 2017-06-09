-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2017 a las 19:58:55
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
('CURL DE BICEPS BANCO SCOTT', 'BRAZOS', NULL, 'FUERZA'),
('CURL DE BICEPS MARTILLO', 'BRAZOS', NULL, 'FUERZA'),
('CURL DE FEMORAL EN MAQUINA', 'PIERNAS', NULL, 'FUERZA'),
('DOMINADAS', 'ESPALDA', NULL, 'FUERZA'),
('DOMINADAS NEUTRA', 'ESPALDA', NULL, 'FUERZA'),
('DOMINADAS SUPINAS', 'ESPALDA', NULL, 'FUERZA'),
('ELEVACIONES DE TALONES DE PIE', 'PIERNAS', NULL, 'FUERZA'),
('EXTENSION DE TRICEPS POLEA', 'BRAZOS', NULL, 'FUERZA'),
('FONDOS EN BARRAS PARALELAS', 'BRAZOS', NULL, 'FUERZA'),
('JALON AL PECHO', 'ESPALDA', NULL, 'FUERZA'),
('JALON AL PECHO AGARRE ESTRECHO', 'ESPALDA', NULL, 'FUERZA'),
('PESO MUERTO', 'PIERNAS', NULL, 'FUERZA'),
('PRESS BANCA INCLINADO', 'PECHO', NULL, 'FUERZA'),
('PRESS BANCA PLANO', 'PECHO', NULL, 'FUERZA'),
('PRESS FRANCES POLEA', 'BRAZOS', NULL, 'FUERZA'),
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
  `id` int(11) NOT NULL,
  `user` varchar(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `peso` decimal(6,3) DEFAULT NULL,
  `repeticiones` int(11) DEFAULT NULL,
  `series` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`id`, `user`, `title`, `color`, `start`, `end`, `peso`, `repeticiones`, `series`) VALUES
(3, 'guille', 'PRESS MILITAR', '#FF8C00', '2017-05-24 00:00:00', '2017-05-25 00:00:00', '11.500', 4, 2),
(4, 'guille', 'PRESS MILITAR', '', '2017-05-25 00:00:00', '2017-05-26 00:00:00', '16.000', 4, 2),
(5, 'guille', 'PRESS MILITAR', '', '2017-05-26 00:00:00', '2017-05-27 00:00:00', '17.000', 7, 7),
(6, 'guille', 'PRESS MILITAR', '', '2017-05-27 00:00:00', '2017-05-28 00:00:00', '25.000', 16, 2),
(7, 'guille', 'PRESS BANCA PLANO', '#FFD700', '2017-05-28 00:00:00', '2017-05-29 00:00:00', '10.500', 10, 6),
(8, 'guille', 'JALON AL PECHO', '#000', '2017-05-27 00:00:00', '2017-05-28 00:00:00', '11.000', 10, 5),
(9, 'guille', 'PRESS MILITAR', '#FF8C00', '2017-05-26 00:00:00', '2017-05-27 00:00:00', '80.000', 10, 4),
(10, 'guille', 'PRESS MILITAR', '', '2017-05-26 00:00:00', '2017-05-27 00:00:00', NULL, NULL, NULL),
(11, 'guille', 'PRESS MILITAR', '', '2017-05-26 00:00:00', '2017-05-27 00:00:00', NULL, NULL, NULL),
(12, 'guille', 'PRESS BANCA INCLINADO', '', '2017-05-28 00:00:00', '2017-05-29 00:00:00', '11.500', 10, 5),
(13, 'guille', 'PESO MUERTO', '', '2017-05-18 00:00:00', '2017-05-19 00:00:00', NULL, NULL, NULL),
(14, 'guille', 'PRESS BANCA PLANO', '', '2017-06-13 00:00:00', '2017-06-14 00:00:00', '0.000', 0, 0),
(16, 'guille', 'REMO MANCUERNAS', '', '2017-06-15 00:00:00', '2017-06-16 00:00:00', '10.000', 10, 10),
(17, 'guille', 'REMO EN POLEA', '', '2017-06-09 00:00:00', '2017-06-10 00:00:00', NULL, NULL, NULL),
(18, 'guille', 'JALON AL PECHO', '', '2017-06-17 00:00:00', '2017-06-18 00:00:00', NULL, NULL, NULL),
(19, 'guille', 'DOMINADAS NEUTRA', '', '2017-06-22 00:00:00', '2017-06-23 00:00:00', NULL, NULL, NULL),
(20, 'guille', 'DOMINADAS', '', '2017-06-27 00:00:00', '2017-06-28 00:00:00', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `USER` varchar(16) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `NOMBRE`, `USER`, `PASSWORD`) VALUES
(1, 'José Francisco Esparza', 'chefran', '1cd87f5976c0893cb50d0758f528963f'),
(2, 'Guillermo Molero', 'guille', 'c184085260f3bd0cdea17539e06b049c');

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
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
