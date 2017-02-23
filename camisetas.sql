-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-02-2017 a las 14:20:04
-- Versión del servidor: 5.6.33
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `camisetas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alerta`
--

CREATE TABLE `alerta` (
  `id_alerta` int(11) NOT NULL,
  `id_equipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `alerta`
--

INSERT INTO `alerta` (`id_alerta`, `id_equipo`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiseta`
--

CREATE TABLE `camiseta` (
  `id_camiseta` int(5) NOT NULL,
  `jugador` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dorsal` int(3) DEFAULT NULL,
  `marca` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `publicidad` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `temporada` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `competicion` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `imagen` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `camiseta`
--

INSERT INTO `camiseta` (`id_camiseta`, `jugador`, `dorsal`, `marca`, `publicidad`, `temporada`, `competicion`, `imagen`, `observaciones`) VALUES
(1, NULL, NULL, 'Reebok', 'Fairmont Homes', '2005-06', 'Liga Australia', 'link', NULL),
(2, NULL, NULL, 'Puma', 'Diners Club, LG', '2007-08', 'liga griega', 'link', NULL),
(3, NULL, NULL, 'Adidas', 'ABN-AMRO', '2000-01', 'liga holandesa', 'link', NULL),
(6, 'Eriksen', 8, 'Adidas', 'Aegon', '2012-13', 'liga holandesa', 'link', NULL),
(83, 'asd', 88, 'af', 'fasf', 'asfa', 'asf', 'img/bnghrr - copia (2).png', ''),
(87, 'nadal rafa', 10, '', '', '20187', 'australia', 'img/bnghrr - copia - copia - copia.png', ''),
(89, 'asf', 88, 'saf', 'asf', 'asfa', 'asf', 'img/bnghrr - copia.png', ''),
(90, 'asf', 88, 'nosa', 'safgfa', 'asfa', 'asf', 'img/badfg.png', ''),
(96, 'nadal', 11, 'New Balance', 'mallorca', '2017', 'liga española', 'img/camiseta-sevilla-1 - copia - copia.jpg', ''),
(222, 'Schweinsteiger', 7, 'Adidas', NULL, '2008', 'Euro 2008', 'link', NULL),
(478, '', 88, '', '', '', '', 'img/map-of-the-lost-island.jpg', ''),
(481, NULL, NULL, NULL, NULL, NULL, NULL, 'link', NULL),
(645, 'nadal', 2, '', '', '2015-16', 'liga española', 'img/camiseta-sevilla-2 - copia.jpg', ''),
(646, 'silvio', 78, '', '', '', '', 'img/seta - copia (3).png', ''),
(647, 'php', 77, '', '', '', '', 'img/seta - copia (3) - copia.png', ''),
(648, 'manual', 65, '', '', '', '', 'img/seta - copia (2) - copia.png', ''),
(649, 'dsfhsfffffffrert', NULL, '', '', '', '', 'img/badfg - copia - copia.png', ''),
(650, 'yafunciona', NULL, '', '', '', '', 'img/setis.png', ''),
(651, 'queva', NULL, '', '', '', '', 'img/setis - copia.png', ''),
(652, 'queva13', NULL, '', '', '', '', 'img/setis - copia - copia.png', ''),
(653, 'penis', NULL, '', '', '', '', 'img/setag.png', ''),
(654, 'wwe', NULL, 'nike', '', '', '', 'img/cowboys - copia.png', ''),
(656, 'paquito', 23, 'adidas', '', '2009-10', 'mundial 2010', 'img/espana3.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiseta_equipo`
--

CREATE TABLE `camiseta_equipo` (
  `id_camiseta` int(5) NOT NULL DEFAULT '0',
  `id_equipo` int(5) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camiseta_equipo`
--

INSERT INTO `camiseta_equipo` (`id_camiseta`, `id_equipo`) VALUES
(1, 1),
(648, 1),
(649, 1),
(650, 1),
(651, 1),
(652, 1),
(653, 1),
(2, 2),
(90, 2),
(3, 3),
(6, 3),
(87, 4),
(478, 4),
(481, 4),
(83, 5),
(222, 5),
(654, 79),
(656, 80);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(5) NOT NULL,
  `club_seleccion` varchar(50) DEFAULT NULL,
  `nombre` varchar(500) DEFAULT NULL,
  `pais` varchar(200) DEFAULT NULL,
  `continente` varchar(200) DEFAULT NULL,
  `imagen_equipo` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`id_equipo`, `club_seleccion`, `nombre`, `pais`, `continente`, `imagen_equipo`) VALUES
(1, 'club', 'adelaide united', 'australia', 'oceania', 'link2'),
(2, 'club', 'pao', 'grecia', 'europa', 'img/escudo.jpg'),
(3, '', 'ajax', 'holanda', 'europa', 'link2'),
(4, 'seleccion', 'albania', 'albania', 'europa', 'link2'),
(5, 'seleccion', 'alemania', 'alemania', 'europa', 'link2'),
(8, '', '', '', '', 'img/logo_left.png'),
(9, '', '', '', '', 'img/bnghrr.png'),
(11, 'club', '', '', '', 'img/icono_equipo.jpg'),
(12, '', '', '', '', 'img/icono_equipo - copia.jpg'),
(13, 'club', '', '', '', 'img/logo_left - copia.png'),
(16, 'club', '', '', '', 'img/logo_left - copia (2).png'),
(78, 'club', 'asf', 'aff', 'asdg', 'img/logo_left - copia (3).png'),
(79, 'seleccion', 'mibeti2', 'aki', 'er mundo', 'img/cowboys.png'),
(80, 'seleccion', 'españa', 'españa', 'europa', 'img/espana2.jpg'),
(81, 'club', 'cosa', 'asf', 'dsagf', 'img/pia.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_user` int(11) NOT NULL,
  `user` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `mail` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_user`, `user`, `password`, `mail`) VALUES
(1, 'dani', '123456', 'dani@dani.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD PRIMARY KEY (`id_alerta`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `camiseta`
--
ALTER TABLE `camiseta`
  ADD PRIMARY KEY (`id_camiseta`);

--
-- Indices de la tabla `camiseta_equipo`
--
ALTER TABLE `camiseta_equipo`
  ADD PRIMARY KEY (`id_camiseta`,`id_equipo`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `equipo`
--
ALTER TABLE `equipo`
  ADD PRIMARY KEY (`id_equipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `camiseta`
--
ALTER TABLE `camiseta`
  MODIFY `id_camiseta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=659;
--
-- AUTO_INCREMENT de la tabla `equipo`
--
ALTER TABLE `equipo`
  MODIFY `id_equipo` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alerta`
--
ALTER TABLE `alerta`
  ADD CONSTRAINT `alerta_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

--
-- Filtros para la tabla `camiseta_equipo`
--
ALTER TABLE `camiseta_equipo`
  ADD CONSTRAINT `camiseta_equipo_ibfk_1` FOREIGN KEY (`id_camiseta`) REFERENCES `camiseta` (`id_camiseta`),
  ADD CONSTRAINT `camiseta_equipo_ibfk_2` FOREIGN KEY (`id_equipo`) REFERENCES `equipo` (`id_equipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
