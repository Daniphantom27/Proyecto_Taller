-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2023 a las 18:25:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_taller`
--
CREATE DATABASE IF NOT EXISTS `bd_taller` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_taller`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `nombre`, `estado`, `fecha_crea`) VALUES
(1, 'Administrador', 'A', '2023-03-22 00:25:42'),
(2, 'Coordinador', 'A', '2023-03-13 13:03:14'),
(3, 'Supervisor', 'A', '2023-03-13 13:03:16'),
(4, 'Tecnico', 'A', '2023-03-13 13:03:19'),
(5, 'Aseador', 'A', '2023-03-13 13:03:22'),
(6, 'Operario', 'A', '2023-03-22 00:25:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_pais` smallint(2) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `id_pais`, `nombre`, `estado`, `fecha_crea`) VALUES
(6, 1, 'Atlantico', 'A', '2023-03-22 12:16:06'),
(7, 2, 'Maranhao', 'A', '2023-03-13 13:03:35'),
(8, 3, 'Cordoba', 'A', '2023-03-13 13:03:38'),
(9, 4, 'Nunavut', 'A', '2023-03-13 13:03:40'),
(10, 10, 'Heredia', 'A', '2023-03-22 00:40:05'),
(15, 1, 'Cesar', 'A', '2023-03-22 00:20:53'),
(22, 1, 'Cundinamarca', 'A', '2023-03-22 05:31:52'),
(23, 2, 'Rio de Janeiro', 'A', '2023-03-22 05:33:36'),
(24, 2, 'Bahia', 'A', '2023-03-22 05:34:15'),
(25, 5, 'Marsella', 'A', '2023-03-22 05:40:48'),
(26, 11, 'Machupichu', 'A', '2023-03-22 05:41:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `id_municipio` smallint(5) UNSIGNED NOT NULL,
  `nacimiento` year(4) DEFAULT NULL,
  `id_cargo` smallint(2) UNSIGNED NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pais` smallint(2) NOT NULL,
  `id_departamento` smallint(2) NOT NULL,
  `id_salario` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `nombre`, `apellidos`, `id_municipio`, `nacimiento`, `id_cargo`, `estado`, `fecha_crea`, `id_pais`, `id_departamento`, `id_salario`) VALUES
(1, 'Daniel Andres', 'Sanchez Castro', 11, 2004, 1, 'A', '2023-03-23 13:08:47', 1, 6, 1),
(2, 'Miguel Antonio', 'Perez Parra', 13, 1970, 1, 'A', '2023-03-22 04:21:17', 1, 15, 2),
(3, 'Juan David', 'Mejia Roncansio', 12, 1999, 1, 'A', '2023-03-22 04:21:19', 2, 0, 3),
(4, 'Juana Franchesca', 'Nuñez Monterrosa', 14, 2000, 1, 'A', '2023-03-22 04:21:20', 4, 9, 4),
(5, 'Pedro Rosendo', 'Torres Torrenegra', 11, 1985, 1, 'A', '2023-03-22 04:21:24', 1, 6, 5),
(46, 'Santiago Franchesco', 'Lobelo Orozco', 15, 2003, 2, 'A', '2023-03-22 04:21:25', 10, 10, 6),
(47, 'Camilo Andres', 'Castillo Pineda', 12, 2004, 2, 'A', '2023-03-22 04:21:27', 2, 7, 7),
(48, 'Juan Esteban', 'Romero De la Cruz', 12, 2002, 2, 'A', '2023-03-22 04:21:28', 2, 7, 8),
(49, 'Andrea Carolina', 'Perez Martines', 14, 1998, 2, 'A', '2023-03-22 04:21:30', 4, 9, 9),
(50, 'Dylan David', 'Gelves Rodriguez', 13, 1989, 3, 'A', '2023-03-22 04:21:32', 1, 15, 10),
(51, 'Moises David', 'Mazo Solano', 11, 2001, 3, 'A', '2023-03-22 04:21:34', 1, 6, 11),
(52, 'Juan David ', 'Padilla Salcedo', 14, 2003, 3, 'A', '2023-03-22 04:21:36', 4, 9, 12),
(53, 'Rosmy Nedith', 'Pachon Cabarcas', 12, 1996, 3, 'A', '2023-03-22 04:21:38', 2, 7, 13),
(54, 'Yuleidis Del Carmeno', 'Avilez Monterroza', 11, 1997, 3, 'A', '2023-03-22 16:30:51', 1, 6, 14),
(55, 'Shadia Margarita', 'Rangel Pedrozo', 15, 1998, 4, 'A', '2023-03-22 04:21:43', 10, 10, 15),
(56, 'Isabella ', 'Collantes Mendez', 14, 2001, 4, 'A', '2023-03-22 04:21:45', 4, 9, 16),
(57, 'Jorge Jesusfsfs', 'Duran Mata', 15, 1992, 4, 'A', '2023-03-22 16:23:32', 10, 10, 17),
(58, 'Maria Jose', 'Ramirez De la Rosa', 13, 1999, 4, 'A', '2023-03-22 04:21:56', 1, 15, 18),
(59, 'Natalia Maria', 'Gonzales Parra', 12, 2002, 4, 'A', '2023-03-22 04:21:59', 2, 7, 19),
(60, 'Karoll ', 'Muñoz Martinez', 11, 1995, 5, 'A', '2023-03-22 04:22:00', 1, 6, 20),
(61, 'Michael Andres', 'Ospino Miranda', 13, 1999, 5, 'A', '2023-03-22 04:22:05', 1, 15, 21),
(62, 'Jaime Luis', 'Lopez Pestana', 15, 2002, 5, 'A', '2023-03-22 04:22:07', 15, 10, 22),
(63, 'Javier Eduardo', 'Gutierrez Ceballos', 14, 1991, 5, 'A', '2023-03-22 04:22:09', 4, 9, 23),
(64, 'Edison Manuel', 'Toloza Quintero', 12, 2000, 5, 'A', '2023-03-22 16:25:45', 2, 7, 24),
(70, 'Daniel XSS', 'Prueba', 14, 2003, 5, 'E', '2023-03-28 12:05:02', 4, 9, 0),
(71, 'JUAN ', 'PRUEBA', 14, 1997, 6, 'A', '2023-03-23 18:09:40', 0, 0, 0),
(72, 'PEPE PRUEBA', 'AFNKF', 16, 1994, 5, 'A', '2023-03-23 18:12:09', 0, 0, 0),
(73, 'GFJHFJ', 'FJGFGJF', 16, 2001, 5, 'E', '2023-03-23 13:14:58', 1, 22, 0),
(74, 'juan prueba', 'alfaklnfka', 16, 1999, 5, 'E', '2023-03-23 13:18:31', 1, 22, 0),
(75, 'PRUEBA 11', 'SGSGSG', 22, 1989, 5, 'E', '2023-03-23 13:22:21', 3, 8, 0),
(76, 'PRUEBA 12', 'FSGSH', 22, 2000, 5, 'E', '2023-03-23 13:20:29', 3, 8, 0),
(77, 'PRUEBA 13', 'AFAGAG', 13, 2000, 5, 'E', '2023-03-23 13:29:05', 1, 15, 0),
(78, 'PRUEBA 14', 'SGSGSH', 22, 1998, 5, 'E', '2023-03-28 12:04:58', 3, 8, 0),
(79, 'Ever Jesus', 'Padilla Sanchez', 16, 1997, 3, 'E', '2023-03-29 15:39:08', 1, 22, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `id_departamento` smallint(2) UNSIGNED NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_pais` smallint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `id_departamento`, `nombre`, `estado`, `fecha_crea`, `id_pais`) VALUES
(11, 6, 'Soledad', 'A', '2023-03-22 03:24:25', 1),
(12, 7, 'Manaos', 'A', '2023-03-22 00:22:59', 2),
(13, 15, 'Valledupar', 'A', '2023-03-22 00:38:35', 1),
(14, 9, 'Toronto', 'A', '2023-03-22 00:23:34', 4),
(15, 10, 'Limon', 'A', '2023-03-22 00:43:55', 10),
(16, 22, 'Bogotá', 'A', '2023-03-22 00:36:01', 1),
(17, 7, 'Curitiba', 'A', '2023-03-22 01:57:28', 2),
(21, 8, 'OLA', 'E', '2023-03-27 12:55:15', 3),
(22, 8, 'La boca', 'A', '2023-03-23 18:16:55', 3),
(24, 6, '', 'E', '2023-03-29 15:39:52', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE `paises` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `estado` char(1) DEFAULT 'A',
  `codigo` varchar(5) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`id`, `estado`, `codigo`, `fecha_crea`, `nombre`) VALUES
(1, 'A', '57', '2023-03-28 12:07:52', 'Colombia'),
(2, 'A', '55', '2023-03-28 12:07:56', 'Brasil'),
(3, 'A', '54', '2023-03-28 12:08:00', 'Argentina'),
(4, 'A', '1', '2023-03-28 12:08:05', 'Canada'),
(5, 'A', '33', '2023-03-28 12:08:09', 'Francia'),
(10, 'A', '506', '2023-03-28 12:08:14', 'Costa Rica'),
(11, 'A', '51', '2023-03-28 12:08:19', 'Peru'),
(24, 'E', '89', '2023-03-28 12:08:41', 'Antigua y Barbuda'),
(25, 'E', '4frd/', '2023-03-28 13:24:15', 'shnb as'),
(26, 'E', 'safa', '2023-03-28 13:25:37', 'bfsdgd'),
(27, 'E', '', '2023-03-28 13:26:19', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salarios`
--

CREATE TABLE `salarios` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `periodo` year(4) DEFAULT NULL,
  `id_empleado` smallint(2) UNSIGNED NOT NULL,
  `sueldo` decimal(15,2) DEFAULT NULL,
  `estado` char(1) DEFAULT 'A',
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `salarios`
--

INSERT INTO `salarios` (`id`, `periodo`, `id_empleado`, `sueldo`, `estado`, `fecha_crea`) VALUES
(1, 2023, 1, '4000000.00', 'A', '2023-03-13 13:06:15'),
(2, 2023, 2, '4000000.00', 'A', '2023-03-13 13:06:22'),
(3, 2023, 3, '4000000.00', 'A', '2023-03-13 13:06:25'),
(4, 2023, 4, '4000000.00', 'A', '2023-03-13 13:06:29'),
(5, 2023, 5, '4000000.00', 'A', '2023-03-13 13:06:31'),
(6, 2023, 46, '2500000.00', 'A', '2023-03-13 13:06:34'),
(7, 2023, 47, '2500000.00', 'A', '2023-03-13 13:06:37'),
(8, 2023, 48, '2500000.00', 'A', '2023-03-13 13:06:40'),
(9, 2023, 49, '2500000.00', 'A', '2023-03-13 13:06:43'),
(10, 2023, 50, '2000000.00', 'A', '2023-03-13 13:06:46'),
(11, 2023, 51, '2000000.00', 'A', '2023-03-13 13:06:51'),
(12, 2023, 52, '2000000.00', 'A', '2023-03-13 13:06:57'),
(13, 2023, 53, '2000000.00', 'A', '2023-03-13 13:07:00'),
(14, 2023, 54, '2000000.00', 'A', '2023-03-13 13:07:05'),
(15, 2023, 55, '1500000.00', 'A', '2023-03-13 13:07:08'),
(16, 2023, 56, '1500000.00', 'A', '2023-03-13 13:07:11'),
(17, 2023, 57, '1500000.00', 'A', '2023-03-13 13:07:18'),
(18, 2023, 58, '1500000.00', 'A', '2023-03-13 13:07:22'),
(19, 2023, 59, '1500000.00', 'A', '2023-03-13 13:07:25'),
(20, 2023, 60, '1500000.00', 'A', '2023-03-13 13:07:28'),
(21, 2023, 61, '1500000.00', 'A', '2023-03-13 13:07:31'),
(22, 2023, 62, '1500000.00', 'A', '2023-03-13 13:07:33'),
(23, 2023, 63, '1500000.00', 'A', '2023-03-13 13:07:36'),
(24, 2023, 64, '1500000.00', 'A', '2023-03-13 13:07:38'),
(25, 2023, 70, '300000.00', 'A', '2023-03-23 17:33:16'),
(26, 2023, 71, NULL, 'E', '2023-03-28 16:03:54'),
(27, 2023, 72, NULL, 'E', '2023-03-28 16:03:57'),
(28, 2023, 73, NULL, 'E', '2023-03-28 16:04:00'),
(29, 2023, 74, NULL, 'E', '2023-03-28 16:04:02'),
(30, 2023, 75, NULL, 'E', '2023-03-28 16:04:05'),
(31, 2023, 76, '500000.00', 'A', '2023-03-23 18:18:22'),
(32, 2023, 77, NULL, 'E', '2023-03-28 16:04:08'),
(33, 2023, 78, '900000.00', 'A', '2023-03-23 13:41:37'),
(34, 2023, 1, '600000.00', 'E', '2023-03-29 12:08:58'),
(35, 2022, 53, '1552656846.00', 'E', '2023-03-29 12:24:24'),
(36, 2023, 79, NULL, 'A', '2023-03-29 20:38:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` smallint(2) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL,
  `n_identidad` varchar(15) NOT NULL,
  `t_identidad` varchar(60) NOT NULL,
  `usuario_crea` varchar(30) NOT NULL,
  `fecha_crea` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` char(2) NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_completo`, `contraseña`, `n_identidad`, `t_identidad`, `usuario_crea`, `fecha_crea`, `estado`) VALUES
(1, 'Daniel Andres Sanchez Castro', 'danielxd123', '1043663815', 'Cedula de Ciudadania', 'Russ', '2023-03-30 15:21:20', 'A'),
(4, 'Juan David Padilla Salcedo', '', '104460789', 'Cedula de Extranjeria', '', '2023-03-30 16:21:40', 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_municipio` (`id_municipio`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_departamento` (`id_departamento`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo` (`codigo`);

--
-- Indices de la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `salarios`
--
ALTER TABLE `salarios`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` smallint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `pais_dpto` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_cargo`) REFERENCES `cargos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_ibfk_1` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salarios`
--
ALTER TABLE `salarios`
  ADD CONSTRAINT `salarios_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
