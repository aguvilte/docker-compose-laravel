-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-04-2020 a las 23:34:16
-- Versión del servidor: 5.7.29-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.28-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alp-learning`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_patente`
--

CREATE TABLE `movimientos_patente` (
  `id` int(11) NOT NULL,
  `id_patente` int(11) NOT NULL,
  `id_punto_control` int(11) NOT NULL,
  `fecha_hora` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patentes`
--

CREATE TABLE `patentes` (
  `id` int(11) NOT NULL,
  `id_vehiculo` int(11) DEFAULT NULL,
  `numero_patente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_vehiculo` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `region` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `precision` float(11,2) DEFAULT NULL,
  `categoria` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ruta_imagen` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `patentes`
--

INSERT INTO `patentes` (`id`, `id_vehiculo`, `numero_patente`, `modelo`, `tipo_vehiculo`, `region`, `precision`, `categoria`, `ruta_imagen`) VALUES
(22, NULL, 'EZE 545', NULL, 'Automóvil', 'Argentina', 90.60, NULL, '-06-04-2020-D4nGFO2WAAIhZ1N.jpg_large'),
(23, NULL, 'AD 618 HC', NULL, 'Automóvil', 'Argentina', 90.40, NULL, '06-04-2020-5e8bb75b9bc4eD3pOFXCW0AE4QRy.jpg_large'),
(24, NULL, 'AD 618 HC', NULL, 'Automóvil', 'Argentina', 90.40, NULL, '06-04-2020-5e8bb76a1abd5D3pOFXCW0AE4QRy.jpg_large'),
(25, NULL, 'AD 618 HC', NULL, 'Automóvil', 'Argentina', 90.40, NULL, '06-04-2020-5e8bb7bc446bcD3pOFXCW0AE4QRy.jpg_large'),
(26, NULL, 'AD 000 LF', NULL, 'Automóvil', 'Argentina', 90.50, NULL, '06-04-2020-5e8bb7dd022a6D3uA7ANX4AABkI5.jpg_large'),
(28, NULL, 'ABC123', 'watson', NULL, NULL, 90.14, 'old_plate', NULL),
(29, NULL, 'ABC123', 'watson', NULL, NULL, 90.14, 'old_plate', NULL),
(30, NULL, 'AD 262 DA', NULL, 'Automóvil', 'Argentina', 90.90, NULL, '11-04-2020-5e911e62a88d0D30c8kyWAAEfQYo.jpg_large'),
(31, NULL, 'AD 262 DA', NULL, 'Automóvil', 'Argentina', 90.90, NULL, '11-04-2020-5e911e7b7619aD30c8kyWAAEfQYo.jpg_large'),
(32, NULL, 'EZE 545', NULL, 'Automóvil', 'Argentina', 90.60, NULL, '11-04-2020-5e911eb22e3e7D4nGFO2WAAIhZ1N.jpg_large');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_robadas`
--

CREATE TABLE `personas_robadas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas_robadas`
--

INSERT INTO `personas_robadas` (`id`, `nombre`, `apellido`, `direccion`, `telefono`) VALUES
(1, 'Marcelo', 'Medina', 'Santa Rosa 1101', '3804-252213'),
(2, 'Ricardo', 'Azcurra', 'Maipu 711', '3804-234556'),
(3, 'Gaspar', 'Ticac', 'Canada 314', '3804-123434'),
(4, 'Agustin', 'Vilte', 'San Nicolas de Bari 386', '3804-123453'),
(6, 'Juan', 'Giménez', 'Cualquiera', '123-1312');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_control`
--

CREATE TABLE `puntos_control` (
  `id` int(11) NOT NULL,
  `numero_camara` int(11) NOT NULL,
  `posicion_descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `robos`
--

CREATE TABLE `robos` (
  `id` int(11) NOT NULL,
  `id_patente` int(11) NOT NULL,
  `id_persona_robada` int(11) NOT NULL,
  `fecha_hora` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `robos`
--

INSERT INTO `robos` (`id`, `id_patente`, `id_persona_robada`, `fecha_hora`) VALUES
(1, 30000, 6, '2019-11-06 00:00:00.000000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Marcelo', 'Medina', 'Mmedina', 'Marce@gmail.com', NULL, '$2y$10$qCtSEcYjJfdiXyGJtHIiBOnvrjv1I7HkPuOHuESWBaVJrBg2eclL2', NULL, '2019-11-24 05:40:59', '2019-11-24 05:40:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `color` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimientos_patente`
--
ALTER TABLE `movimientos_patente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `patentes`
--
ALTER TABLE `patentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas_robadas`
--
ALTER TABLE `personas_robadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `puntos_control`
--
ALTER TABLE `puntos_control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `robos`
--
ALTER TABLE `robos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `movimientos_patente`
--
ALTER TABLE `movimientos_patente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `patentes`
--
ALTER TABLE `patentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `personas_robadas`
--
ALTER TABLE `personas_robadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `puntos_control`
--
ALTER TABLE `puntos_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `robos`
--
ALTER TABLE `robos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
