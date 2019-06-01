-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2019 a las 06:56:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datamerge`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_tarea` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `evidencias` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comparacion`
--

CREATE TABLE `comparacion` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `string` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comparacion`
--

INSERT INTO `comparacion` (`id`, `nombre`, `string`) VALUES
(1, 'Comparar con', 'LIKE \'% %S% %\''),
(2, 'Igual a', '='),
(3, 'Mayor a', '>'),
(4, 'Menor a', '<'),
(5, 'Mayor o igual a', '>='),
(6, 'Menor o igual a', '<='),
(7, 'Diferente a', '<>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constructor`
--

CREATE TABLE `constructor` (
  `id` int(100) NOT NULL,
  `nombre_tabla1` varchar(100) NOT NULL,
  `nombre_campo1` varchar(100) NOT NULL,
  `nombre_tabla2` varchar(100) NOT NULL,
  `nombre_campo2` varchar(100) NOT NULL,
  `especial` int(100) NOT NULL,
  `comparacion` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `constructor`
--

INSERT INTO `constructor` (`id`, `nombre_tabla1`, `nombre_campo1`, `nombre_tabla2`, `nombre_campo2`, `especial`, `comparacion`) VALUES
(14, 'EJEMPLO', 'EJ2', 'EJEMPLO', 'EJ2', 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_EJEMPLO`
--

CREATE TABLE `data_EJEMPLO` (
  `EJ1` int(11) NOT NULL,
  `EJ2` int(11) NOT NULL,
  `EJ3` int(11) NOT NULL,
  `EJ4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_EJEMPLO2`
--

CREATE TABLE `data_EJEMPLO2` (
  `EJ1` int(11) NOT NULL,
  `EJ2` int(11) NOT NULL,
  `EJ3` int(11) NOT NULL,
  `EJ4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_EJEMPLO3`
--

CREATE TABLE `data_EJEMPLO3` (
  `EJ1` int(11) NOT NULL,
  `EJ2` int(11) NOT NULL,
  `EJ3` int(11) NOT NULL,
  `EJ4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data_EJEMPLO4`
--

CREATE TABLE `data_EJEMPLO4` (
  `EJ1` int(11) NOT NULL,
  `EJ2` int(11) NOT NULL,
  `EJ3` int(11) NOT NULL,
  `EJ4` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especiales`
--

CREATE TABLE `especiales` (
  `id` int(100) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especiales`
--

INSERT INTO `especiales` (`id`, `nombre`) VALUES
(1, 'Mapas'),
(2, 'Gráfico'),
(3, 'Ninguno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(30) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `descripcion` text NOT NULL,
  `tarea_padre` int(30) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_limite` datetime NOT NULL,
  `fecha_cierre` datetime NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password`) VALUES
(1, 'Jose Andres Ceciliano Granados', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `bitacora_estudiante` (`id_persona`),
  ADD KEY `bitacora_tarea` (`id_tarea`);

--
-- Indices de la tabla `comparacion`
--
ALTER TABLE `comparacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `constructor`
--
ALTER TABLE `constructor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `C_ConstxC` (`comparacion`),
  ADD KEY `E_ConstxE` (`especial`);

--
-- Indices de la tabla `especiales`
--
ALTER TABLE `especiales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_tarea` (`tarea_padre`),
  ADD KEY `persona_tarea` (`id_persona`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comparacion`
--
ALTER TABLE `comparacion`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `constructor`
--
ALTER TABLE `constructor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `especiales`
--
ALTER TABLE `especiales`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `person` FOREIGN KEY (`id_persona`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `constructor`
--
ALTER TABLE `constructor`
  ADD CONSTRAINT `C_ConstxC` FOREIGN KEY (`comparacion`) REFERENCES `comparacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `E_ConstxE` FOREIGN KEY (`especial`) REFERENCES `especiales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `parent_tarea` FOREIGN KEY (`tarea_padre`) REFERENCES `tareas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `persona_tarea` FOREIGN KEY (`id_persona`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
