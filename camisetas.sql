-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-01-2017 a las 14:03:22
-- Versión del servidor: 5.6.34
-- Versión de PHP: 5.6.28

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
  `id_camiseta` int(11) NOT NULL,
  `jugador` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dorsal` int(11) DEFAULT NULL,
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
(87, 'nadal', 0, '', '', '2018', 'australia', 'img/camiseta-sevilla-2 - copia (2).jpg', ''),
(96, 'nadal', 11, 'New Balance', 'mallorca', '2017', 'liga española', 'img/camiseta-sevilla-1 - copia - copia.jpg', ''),
(222, 'Schweinsteiger', 7, 'Adidas', NULL, '2008', 'Euro 2008', 'link', NULL),
(223, 'Müller', 13, 'Adidas', NULL, '2010', 'Mundial 2010', 'link', NULL),
(478, '', 0, '', '', '', '', 'img/map-of-the-lost-island.jpg', ''),
(481, NULL, NULL, NULL, NULL, NULL, NULL, 'link', NULL),
(645, 'nadal', 0, '', '', '2015-16', 'liga española', 'img/camiseta-sevilla-2 - copia.jpg', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camiseta_equipo`
--

CREATE TABLE `camiseta_equipo` (
  `id_camiseta` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `camiseta_equipo`
--

INSERT INTO `camiseta_equipo` (`id_camiseta`, `id_equipo`) VALUES
(1, 1),
(2, 2),
(3, 3),
(6, 3),
(87, 3),
(478, 4),
(481, 4),
(222, 5),
(223, 5),
(645, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE `equipo` (
  `id_equipo` int(11) NOT NULL,
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
(2, '', 'aek', 'grecia', 'europa', 'link2'),
(3, '', 'ajax', 'holanda', 'europa', 'link2'),
(4, 'seleccion', 'albania', 'albania', 'europa', 'link2'),
(5, 'seleccion', 'alemania', 'alemania', 'europa', 'link2'),
(8, '', '', '', '', 'img/logo_left.png'),
(9, '', '', '', '', 'img/bnghrr.png'),
(11, 'Club', '', '', '', 'img/icono_equipo.jpg'),
(12, '', '', '', '', 'img/icono_equipo - copia.jpg');

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
