-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2020 a las 08:46:17
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tabla_tpe`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_tendencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntuacion`, `id_tendencia`) VALUES
(1, 'hola aca probando', 3, 41),
(4, 'blabla probando', 3, 41),
(11, 'blablablabla', 2, 41),
(12, 'blablablabla', 2, 41),
(13, 'jhgjgjhg', 3, 41),
(14, 'jhgjhg', 4, 41),
(15, 'blablablabla', 2, 41),
(16, 'blablablabla', 2, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continente`
--

CREATE TABLE `continente` (
  `id_continente` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `continente`
--

INSERT INTO `continente` (`id_continente`, `nombre`) VALUES
(1, 'bla'),
(8, 'America del norte'),
(14, 'America del sur'),
(19, 'kjh'),
(20, 'k'),
(21, 'jkh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tendencias`
--

CREATE TABLE `tendencias` (
  `id` int(11) NOT NULL,
  `id_continente` int(11) NOT NULL,
  `zona` varchar(60) NOT NULL,
  `moda` varchar(200) NOT NULL,
  `makeup` varchar(200) NOT NULL,
  `pelo` varchar(200) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tendencias`
--

INSERT INTO `tendencias` (`id`, `id_continente`, `zona`, `moda`, `makeup`, `pelo`, `imagen`) VALUES
(41, 14, 'bla', 'bla', 'bla', 'bla', NULL),
(42, 19, 'kjh', 'kjh', 'kh', 'kjh', NULL),
(44, 14, 'bla', 'bla', 'bla', 'bla', NULL),
(45, 19, 'JKH', 'KJH', 'KJH', 'KJH', '1_lB6F9.tmp'),
(46, 21, 'jh', 'kjh', 'kjh', 'kjh', 'exaBA0F.tmp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user` varchar(65) NOT NULL,
  `password` varchar(200) NOT NULL,
  `administrador` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `user`, `password`, `administrador`) VALUES
(6, 'xurmey.32@gmail.com', 'administrador', '$2y$10$oU27OILT3l2i4PufbFR7MuQYI6jS1uE9gjY.BE.KDn0qEnShKlam6', 1),
(7, 'si@si.com', 'si', '$2y$10$V3p3cUigBi6rVDNJMiNNM.k9Ah43uk2ghiOYbeezn7jdyRrFCfY6y', 1),
(8, 'no@no.com', 'no', '$2y$10$lWcdoQzT2CrJ9ZKYi1qoa.QO9Zz8ANqeZ4krt2BhMtnnkOajW9/Eq', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`,`id_tendencia`),
  ADD KEY `id_tendencia` (`id_tendencia`);

--
-- Indices de la tabla `continente`
--
ALTER TABLE `continente`
  ADD PRIMARY KEY (`id_continente`);

--
-- Indices de la tabla `tendencias`
--
ALTER TABLE `tendencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_continente` (`id_continente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `continente`
--
ALTER TABLE `continente`
  MODIFY `id_continente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tendencias`
--
ALTER TABLE `tendencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_tendencia`) REFERENCES `tendencias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tendencias`
--
ALTER TABLE `tendencias`
  ADD CONSTRAINT `tendencias_ibfk_1` FOREIGN KEY (`id_continente`) REFERENCES `continente` (`id_continente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
