-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2023 a las 18:06:46
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `restfull_tickets`
--
CREATE DATABASE restfull_tickets;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT NULL,
  `estatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `usuario`, `fecha_creacion`, `fecha_actualizacion`, `estatus`) VALUES
(1, 'newuser', '2023-03-11 10:19:49', '2023-03-11 11:51:52', 'cerrado'),
(2, 'postman', '2023-03-11 09:23:12', NULL, 'abierto'),
(4, 'postman', '2023-03-11 09:38:53', NULL, 'abierto'),
(5, 'postman', '2023-03-11 09:41:27', NULL, 'cerrado'),
(6, 'postman', '2023-03-11 09:46:48', NULL, 'cerrado'),
(7, 'postman', '2023-03-11 09:47:25', NULL, 'cerrado'),
(8, 'postman', '2023-03-11 09:48:08', NULL, 'cerrado'),
(9, 'postman', '2023-03-11 09:48:46', NULL, 'cerrado'),
(10, 'postman', '2023-03-11 09:50:19', NULL, 'cerrado'),
(11, 'postman', '2023-03-11 09:52:57', NULL, 'cerrado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
