-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 20:39:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_sensor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_de_sensor`
--

CREATE TABLE `datos_de_sensor1` (
  `id` int(11) NOT NULL,
  `mes` varchar(10) DEFAULT NULL,
  `dia` varchar(10) DEFAULT NULL,
  `temperatura` decimal(5,2) DEFAULT NULL,
  `humedad` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `datos_de_sensor`
--

INSERT INTO `datos_de_sensor1` (`id`, `mes`, `dia`, `temperatura`, `humedad`) VALUES
(1, 'Enero', '01', 25.50, NULL),
(2, 'Marzo', '07', 29.50, NULL),
(3, 'Febrero', '12', 32.50, NULL),
(4, 'Noviembre', '14', 17.20, NULL),
(5, 'Marzo', '07', 29.50, 12.10),
(6, 'Noviembre', '19', 7.50, 3.45),
(7, 'Abril', '13', 19.50, 14.10),
(8, 'Junio', '29', 7.50, 2.13),
(9, 'Enero', '30', 29.50, 8.12),
(10, 'Enero', '31', 32.50, 4.12),
(11, 'Febrero', '1', 34.50, 3.02),
(12, 'Febrero', '2', 35.50, 3.72);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_de_sensor`
--
ALTER TABLE `datos_de_sensor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `datos_de_sensor`
--
ALTER TABLE `datos_de_sensor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
