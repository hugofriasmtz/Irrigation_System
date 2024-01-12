-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2023 a las 21:30:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `irrigation_system`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cycles`
--

CREATE TABLE `cycles` (
  `id` int(11) NOT NULL,
  `irrigation_id` int(11) NOT NULL,
  `date_int` int(11) NOT NULL,
  `date_end` varchar(45) NOT NULL,
  `cycles` enum('1','2') NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `irrigation_lands`
--

CREATE TABLE `irrigation_lands` (
  `id` int(11) NOT NULL,
  `land_id` int(11) NOT NULL,
  `seed_id` int(11) NOT NULL,
  `irrigation` enum('enero-febrero') NOT NULL,
  `date_init` varchar(45) NOT NULL,
  `date_end` varchar(45) NOT NULL,
  `hours` varchar(45) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `irrigation_lands_log`
--

CREATE TABLE `irrigation_lands_log` (
  `id` int(11) NOT NULL,
  `irrigation_id` int(11) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `status` enum('ACTIVE') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lands`
--

CREATE TABLE `lands` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tower_id` int(11) NOT NULL,
  `length` decimal(10,2) NOT NULL,
  `wide` decimal(10,2) NOT NULL,
  `address` varchar(250) NOT NULL,
  `status` enum('ACTIVE','SUSPENDED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `lands`
--

INSERT INTO `lands` (`id`, `user_id`, `tower_id`, `length`, `wide`, `address`, `status`, `created`, `modified`, `deleted`) VALUES
(1, 2, 2, 10.00, 0.00, 'demo', 'ACTIVE', '2023-05-15 18:00:21', '2023-05-15 18:00:21', '2023-05-16 02:33:39'),
(2, 2, 3, 10.00, 7.00, 'demo', 'ACTIVE', '2023-05-15 18:03:34', '2023-05-15 18:03:34', NULL),
(3, 4, 2, 21.15, 45.40, ' demo', 'ACTIVE', '2023-05-15 18:04:31', '2023-05-15 18:04:31', NULL),
(4, 4, 2, 21.15, 45.40, ' demo', 'ACTIVE', '2023-05-15 18:07:57', '2023-05-15 18:07:57', '2023-05-16 02:33:46'),
(5, 4, 3, 15.84, 10.11, ' 15646  ', 'ACTIVE', '2023-05-15 18:34:02', '2023-05-15 18:34:02', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `irrigation_id` int(11) NOT NULL,
  `time_init` varchar(40) NOT NULL,
  `time_end` varchar(40) NOT NULL,
  `status` enum('ACTIVE','DELETED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `names` varchar(25) NOT NULL,
  `description` varchar(50) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `names`, `description`, `created`, `modified`, `deleted`) VALUES
(1, 'admin', 'Administrador de Sistema', '2023-04-26 18:12:19', '2023-04-26 18:12:19', NULL),
(2, 'farmer', 'Agricultor ', '2023-04-26 18:14:22', '2023-04-26 18:14:22', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seed`
--

CREATE TABLE `seed` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `seed` enum('tuberculo','vegetal') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `towers`
--

CREATE TABLE `towers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `capacity` decimal(13,2) NOT NULL,
  `hours` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `towers`
--

INSERT INTO `towers` (`id`, `name`, `address`, `capacity`, `hours`, `status`, `created`, `modified`, `deleted`) VALUES
(1, 'Juquilita', 'Pozo de agua enfrente del ayuntamiento de San Miguel, entre la cancha del zocalo', 100000.00, 5, 'ACTIVE', '2023-04-26 20:10:50', '2023-04-26 20:10:50', NULL),
(2, 'Sagrado Corazón', 'Despues del corona dos enfrente de la casa de materiales ', 3000.00, 51, 'ACTIVE', '2023-04-27 11:22:05', '2023-04-27 11:22:05', NULL),
(3, '3 Coronas', 'Enfrente de Palacio pasando la cancha de futbol', 7500.00, 250, 'ACTIVE', '2023-04-27 13:39:39', '2023-04-27 13:39:39', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `pin` varchar(4) NOT NULL,
  `first_names` varchar(100) NOT NULL,
  `last_names` varchar(100) NOT NULL,
  `gener` enum('MAN','WOMAN') NOT NULL,
  `birthday` date NOT NULL,
  `cellphone` varchar(10) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','DELETED') NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `pin`, `first_names`, `last_names`, `gener`, `birthday`, `cellphone`, `status`, `created`, `modified`, `deleted`) VALUES
(1, 1, 'hugo.frias.martinez@hotmail.com', '$2a$11$C9MT/eOOIYue643YKv0yVOhD4grhp3xbcIr0RvsRMl7JPLhxjBmym', '', 'Hugo', 'Frías Martínez', 'MAN', '2003-01-21', '2384082268', 'ACTIVE', '2023-04-26 18:15:52', '2023-04-26 18:15:52', NULL),
(2, 2, 'rosario.vargas@hotmail.com', '$2a$11$C9MT/eOOIYue643YKv0yVOhD4grhp3xbcIr0RvsRMl7JPLhxjBmym', '', 'Rosario', 'Vargas Flores', 'WOMAN', '2023-04-27', '2384054869', 'ACTIVE', '2023-04-26 18:29:21', '2023-05-26 20:35:29', NULL),
(3, 2, 'worker@test.com', '$argon2i$v=19$m=65536,t=4,p=1$OC80TDQva0ViY1lEN0h1RA$BxUBrz2++a0Dcshp46kl5AFqnoScTjyOQFF9on84u2I', '', 'Octavio', 'Demo', 'MAN', '1991-02-20', '1235698745', 'DELETED', '2023-04-26 18:58:51', '2023-04-26 18:58:51', '2023-04-27 03:23:09'),
(4, 2, 'julio.alfaro@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$NTZBdGVqNXQwem1kd25HeQ$P96THMIMBinOLCrXHT4E7PA8XblldGDyTefCH3Ztngs', '', 'Julio', 'Alfaro', 'MAN', '1987-07-23', '2381596458', 'ACTIVE', '2023-04-27 13:38:50', '2023-04-27 13:38:50', NULL),
(5, 2, 'mark.frias.mtz@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$aTRneE1lbldRN0ovRVdVUQ$jg14U3JTGU4So8mRPCXQboaFa3NcML5qZSED0Czybqw', '', 'Marcos F.', 'Frias Martinez', 'MAN', '0000-00-00', '', 'ACTIVE', '2023-06-02 12:30:23', '2023-06-02 12:30:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valid_lands`
--

CREATE TABLE `valid_lands` (
  `id` int(11) NOT NULL,
  `deed` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `modified` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cycles`
--
ALTER TABLE `cycles`
  ADD KEY `irrigation_id` (`irrigation_id`);

--
-- Indices de la tabla `irrigation_lands`
--
ALTER TABLE `irrigation_lands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_id` (`land_id`),
  ADD KEY `seed_id` (`seed_id`);

--
-- Indices de la tabla `irrigation_lands_log`
--
ALTER TABLE `irrigation_lands_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `irrigation_id` (`irrigation_id`);

--
-- Indices de la tabla `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tower_id` (`tower_id`);

--
-- Indices de la tabla `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seed`
--
ALTER TABLE `seed`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `towers`
--
ALTER TABLE `towers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `valid_lands`
--
ALTER TABLE `valid_lands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `irrigation_lands`
--
ALTER TABLE `irrigation_lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `irrigation_lands_log`
--
ALTER TABLE `irrigation_lands_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seed`
--
ALTER TABLE `seed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `towers`
--
ALTER TABLE `towers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `valid_lands`
--
ALTER TABLE `valid_lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cycles`
--
ALTER TABLE `cycles`
  ADD CONSTRAINT `cycles_ibfk_1` FOREIGN KEY (`irrigation_id`) REFERENCES `irrigation_lands` (`id`);

--
-- Filtros para la tabla `irrigation_lands`
--
ALTER TABLE `irrigation_lands`
  ADD CONSTRAINT `irrigation_lands_ibfk_1` FOREIGN KEY (`land_id`) REFERENCES `overtime` (`id`),
  ADD CONSTRAINT `irrigation_lands_ibfk_2` FOREIGN KEY (`seed_id`) REFERENCES `seed` (`id`),
  ADD CONSTRAINT `irrigation_lands_ibfk_3` FOREIGN KEY (`id`) REFERENCES `cycles` (`irrigation_id`);

--
-- Filtros para la tabla `irrigation_lands_log`
--
ALTER TABLE `irrigation_lands_log`
  ADD CONSTRAINT `irrigation_lands_log_ibfk_1` FOREIGN KEY (`irrigation_id`) REFERENCES `irrigation_lands` (`id`);

--
-- Filtros para la tabla `lands`
--
ALTER TABLE `lands`
  ADD CONSTRAINT `lands_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `lands_ibfk_3` FOREIGN KEY (`tower_id`) REFERENCES `towers` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
