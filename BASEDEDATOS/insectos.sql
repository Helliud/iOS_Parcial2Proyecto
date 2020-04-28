-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2020 a las 23:24:32
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `insecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insectos`
--

CREATE TABLE `insectos` (
  `id` int(11) NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `temporada` varchar(30) NOT NULL,
  `donado` varchar(30) DEFAULT NULL,
  `capturado` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_capturado` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `insectos`
--

INSERT INTO `insectos` (`id`, `id_user`, `nombre`, `descripcion`, `temporada`, `donado`, `capturado`, `ubicacion`, `estado`, `foto`, `fecha_capturado`, `created_at`, `updated_at`) VALUES
(15, 1, 'Tarantula', 'Insecto con temperamento agresivo,', 'Primavera', 'Si', 'Si', 'Isla Nowhere', 'Terminado', 'WAuYNrlWisg9iT6fOBNjUhB0s0totlyQxVW4dHaw.png', '2020-04-09', '2020-04-23 00:58:09', NULL),
(16, 1, 'Avispa', 'Insecto extremadamente agresivo y molesto', 'Primavera', 'No', 'Si', 'Isla Izlitha', 'Terminado', 'TjMGMpMtrcLuTkZbE4LeejE3yFN4IfrvRUM9iUwy.png', '2020-04-22', '2020-04-23 01:10:26', NULL),
(19, 1, 'Caballito del diablo', 'Insecto volador de alta velocidad', 'Otoño', 'Si', 'Si', 'Isla Piñata', 'Pendiente', '73wNcF3QR38pdcYXduoaiu7bbKh8ETmmhGW4qDiY.jpeg', '2020-04-23', '2020-04-23 01:41:25', NULL),
(25, 1, 'Mariposa Tigre', 'Mariposa hermosa amarilla con negro', 'Primavera', 'Si', 'Si', 'Isla Urbivilla', 'Pendiente', 'n6P4z1QhSNnFzxhopJ8ClUsns3uVLPHawyIasYD6.png', '2020-07-14', '2020-04-23 02:23:43', NULL),
(26, 1, 'Mariposa Amarilla', 'Mariposa pequeña de color amarillo', 'Primavera', 'Si', 'Si', 'Isla Torito', 'Terminado', 'AAvLCuX0eYXpTjMNJVeWTeYSvIovHzSH2HCr2HrP.png', '2020-04-23', '2020-04-23 02:26:38', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `insectos`
--
ALTER TABLE `insectos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `insectos`
--
ALTER TABLE `insectos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
