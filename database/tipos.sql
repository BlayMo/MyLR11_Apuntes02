-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2024 a las 10:47:41
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mylr11_apuntes02`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id_tipo`, `tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Raynor, Kerluke and Douglas', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(2, 'Senger, Bosco and Wisozk', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(3, 'Boehm LLC', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(4, 'Herman Ltd', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(5, 'Ferry-Metz', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(6, 'Mitchell, Spinka and Walker', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(7, 'Emmerich PLC', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(8, 'Prosacco, Tillman and Lang', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(9, 'Ward, Jast and Ritchie', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL),
(10, 'Balistreri, Lowe and Stark', '2024-11-12 07:54:53', '2024-11-12 07:54:53', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
