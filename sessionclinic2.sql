-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2023 a las 19:59:57
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
-- Base de datos: `sessionclinic2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230317174751', '2023-03-17 18:47:59', 360);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `dateborn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`id`, `name`, `surname`, `dateborn`) VALUES
(1, 'Dr. House', 'el de la serie', '2018-02-02'),
(2, 'Nick', 'Riviera', '2019-01-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `dateborn` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `name`, `surname`, `dateborn`) VALUES
(1, 'Martin', 'Scorsese', '2019-01-02'),
(2, 'Annie Lenoxx', 'Lenoxx', '2018-01-02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patologiadetectada`
--

CREATE TABLE `patologiadetectada` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `deacription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `patologiadetectada`
--

INSERT INTO `patologiadetectada` (`id`, `name`, `deacription`) VALUES
(1, 'esquince de tobillo', 'sobrextensión ligamentosa'),
(2, 'fractura de femur', 'fractura mur'),
(3, 'Luxación de cadera derecha', NULL),
(4, 'Osteoporosis', NULL),
(5, 'Luxación de cadera izquierda', 'descripción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessionvaloracion`
--

CREATE TABLE `sessionvaloracion` (
  `id` int(11) NOT NULL,
  `medico_id` int(11) DEFAULT NULL,
  `paciente_id` int(11) DEFAULT NULL,
  `patologia1_id` int(11) DEFAULT NULL,
  `patologia2_id` int(11) DEFAULT NULL,
  `patologia3_id` int(11) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessionvaloracion`
--

INSERT INTO `sessionvaloracion` (`id`, `medico_id`, `paciente_id`, `patologia1_id`, `patologia2_id`, `patologia3_id`, `fecha`) VALUES
(1, 1, 1, 1, 2, 1, '2019-02-02 01:01:00'),
(2, 1, 2, 3, 5, 1, '2026-04-03 14:19:00'),
(3, 2, 2, 3, 4, 1, '2027-01-07 00:19:00'),
(4, 2, 1, 4, 2, 5, '2027-05-02 15:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `patologiadetectada`
--
ALTER TABLE `patologiadetectada`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sessionvaloracion`
--
ALTER TABLE `sessionvaloracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_634304E3A7FB1C0C` (`medico_id`),
  ADD KEY `IDX_634304E37310DAD4` (`paciente_id`),
  ADD KEY `IDX_634304E3CFD355A8` (`patologia1_id`),
  ADD KEY `IDX_634304E3DD66FA46` (`patologia2_id`),
  ADD KEY `IDX_634304E365DA9D23` (`patologia3_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `patologiadetectada`
--
ALTER TABLE `patologiadetectada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sessionvaloracion`
--
ALTER TABLE `sessionvaloracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sessionvaloracion`
--
ALTER TABLE `sessionvaloracion`
  ADD CONSTRAINT `FK_634304E365DA9D23` FOREIGN KEY (`patologia3_id`) REFERENCES `patologiadetectada` (`id`),
  ADD CONSTRAINT `FK_634304E37310DAD4` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `FK_634304E3A7FB1C0C` FOREIGN KEY (`medico_id`) REFERENCES `medico` (`id`),
  ADD CONSTRAINT `FK_634304E3CFD355A8` FOREIGN KEY (`patologia1_id`) REFERENCES `patologiadetectada` (`id`),
  ADD CONSTRAINT `FK_634304E3DD66FA46` FOREIGN KEY (`patologia2_id`) REFERENCES `patologiadetectada` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
