-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-03-2022 a las 17:20:46
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_superheros`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abilities`
--

CREATE TABLE `abilities` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `abilities`
--

INSERT INTO `abilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Terremoto', '2022-02-11 22:33:59', NULL),
(2, 'Regeneración Instantánea', '2022-02-11 22:33:59', NULL),
(3, 'Levitación', '2022-02-11 22:34:51', NULL),
(4, 'Telepatía', '2022-02-11 22:34:51', NULL),
(5, 'Robo', '2022-02-11 22:37:23', NULL),
(6, 'Explosión', '2022-02-11 22:37:23', NULL),
(7, 'Manipulación de masa', '2022-02-11 22:37:23', NULL),
(8, 'Salto', '2022-02-11 22:37:23', NULL),
(9, 'Kamehameha ', '2022-02-11 22:37:23', NULL),
(10, 'Infinito', '2022-02-11 22:37:23', NULL),
(11, 'Copia', '2022-02-11 22:37:23', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citizens`
--

CREATE TABLE `citizens` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citizens`
--

INSERT INTO `citizens` (`id`, `name`, `mail`, `idUser`, `created_at`, `updated_at`) VALUES
(6, 'Remi', 'remi@gmail.com', 1, '2022-02-19 18:47:03', NULL),
(7, 'Franklin', 'franklin@gmail.com', 2, '2022-02-19 18:47:03', NULL),
(8, 'Ruben', 'ruben@gmail.com', 3, '2022-02-19 18:47:03', NULL),
(9, 'Dominic', 'dominic@gmail.com', 4, '2022-02-19 18:47:03', NULL),
(10, 'Kira', 'kira@gmail.com', 5, '2022-02-19 18:47:03', NULL),
(11, 'Eminem', 'eminem@gmail.com', 6, '2022-02-19 18:47:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evolution`
--

CREATE TABLE `evolution` (
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evolution`
--

INSERT INTO `evolution` (`type`) VALUES
('Beginner'),
('Expert');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `completed` tinyint(1) NOT NULL,
  `idSuperhero` int(11) NOT NULL,
  `idCitizen` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `request`
--

INSERT INTO `request` (`id`, `title`, `description`, `completed`, `idSuperhero`, `idCitizen`, `created_at`, `updated_at`) VALUES
(49, 'Who Says Fighting Never Solved Anything?', 'These robots are terrorizing our village, and it needs to stop! Please destroy as many as you can find', 0, 27, 6, '2022-02-19 19:22:33', NULL),
(50, 'The Only Time You’ll Ever Toggle Run/Walk', 'I hear there are bandits on the roads these days, please help me get back to my family', 0, 27, 6, '2022-02-19 19:22:33', NULL),
(51, 'Protecting Those who Can’t Protect Themselves', 'The enemy is upon us! Defend the walls!', 0, 28, 6, '2022-02-19 19:22:33', NULL),
(52, 'Hoarders', 'I need to bake a cake. Go fetch me some Deku tree roots', 2, 28, 7, '2022-02-19 19:22:33', NULL),
(53, 'A Gift for that Special Someone', 'I don’t have the courage to do this myself, so could you give Sarah these flowers for me?', 2, 29, 7, '2022-02-19 19:22:33', NULL),
(54, 'Immerse Yourself', 'Please, you call those dance moves? I’ll show you how it’s done!', 0, 30, 7, '2022-02-19 19:22:33', NULL),
(55, 'Recover my Father\'s Stolen Sword!', 'Go to the castle and take it.', 0, 30, 8, '2022-02-19 19:22:33', NULL),
(56, 'The Mining Effort', 'The old miner asks Scarlett to clear out the Delvers and then find him some new workers for the mine.', 0, 30, 8, '2022-02-19 19:22:33', NULL),
(57, 'Cousin Rupert', 'Bring Rupert\'s necklace back to his cousin.', 2, 31, 9, '2022-02-19 19:22:33', NULL),
(58, 'Village under Attack', 'When Scarlett returns to San Pasquale late in the story, she find the village is under attack by Necromancers. Kill them all to complete the quest.', 2, 31, 9, '2022-02-19 19:22:33', NULL),
(59, 'COMPAR PAN', 'AL CHINO', 0, 27, 6, '2022-02-23 17:24:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheros`
--

CREATE TABLE `superheros` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `evolution_type` varchar(255) NOT NULL,
  `idUser` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheros`
--

INSERT INTO `superheros` (`id`, `name`, `img`, `evolution_type`, `idUser`, `created_at`, `updated_at`) VALUES
(27, 'Goku', '27-Goku.jpg', 'Expert', 9, '2022-02-19 18:50:12', '2022-02-19 19:38:19'),
(28, 'One Punch-Man', '28-One Punch-Man.jpg', 'Beginner', 10, '2022-02-19 18:50:12', '2022-02-19 19:38:28'),
(29, 'Flamenco Samurai', '29-Flamenco Samurai.jpg', 'Beginner', 11, '2022-02-19 18:50:12', '2022-02-19 19:38:35'),
(30, 'Kirito', '30-Kirito.jpg', 'Expert', 12, '2022-02-19 18:50:12', '2022-02-19 19:38:42'),
(31, 'Calamardo', '31-Calamardo.jpg', 'Beginner', 13, '2022-02-19 18:50:12', '2022-02-19 19:38:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `superheros_abilities`
--

CREATE TABLE `superheros_abilities` (
  `id` int(11) NOT NULL,
  `id_superhero` int(11) NOT NULL,
  `id_ability` int(11) NOT NULL,
  `value` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `superheros_abilities`
--

INSERT INTO `superheros_abilities` (`id`, `id_superhero`, `id_ability`, `value`) VALUES
(15, 27, 11, 10),
(16, 27, 6, 66),
(17, 27, 10, 90),
(18, 27, 4, 100),
(19, 27, 5, 20),
(20, 27, 8, 90),
(21, 27, 9, 100),
(22, 28, 2, 90),
(23, 28, 3, 20),
(24, 28, 4, 70),
(25, 28, 5, 25),
(26, 28, 6, 60),
(27, 28, 6, 88),
(28, 28, 8, 65),
(29, 29, 1, 61),
(30, 29, 11, 99),
(31, 29, 10, 55),
(32, 29, 9, 5),
(33, 29, 8, 55),
(34, 29, 7, 24),
(35, 29, 4, 55),
(36, 30, 3, 55),
(37, 30, 5, 76),
(38, 30, 6, 25),
(39, 30, 7, 88),
(40, 30, 8, 99),
(41, 30, 9, 44),
(42, 30, 6, 51),
(43, 30, 2, 66),
(44, 31, 2, 55),
(45, 31, 3, 46),
(46, 31, 4, 77),
(47, 31, 5, 98),
(48, 31, 6, 16),
(49, 31, 7, 58),
(50, 31, 9, 55),
(51, 31, 10, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `psw` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `psw`, `created_at`, `updated_at`) VALUES
(1, 'dani', 'dani', '2022-02-11 22:37:55', NULL),
(2, 'antonio', 'antonio', '2022-02-11 22:38:40', NULL),
(3, 'raquel', 'raquel', '2022-02-11 22:38:40', NULL),
(4, 'virginia', 'virginia', '2022-02-11 22:38:40', NULL),
(5, 'paco', 'paco', '2022-02-12 18:54:44', NULL),
(6, 'jesus', 'jesus', '2022-02-12 18:54:44', NULL),
(9, 'carola', 'carola', '2022-02-17 21:47:27', NULL),
(10, 'xmaadix', 'xmaadix', '2022-02-17 21:51:41', NULL),
(11, 'bart', 'bart', '2022-02-17 21:53:04', NULL),
(12, 'toret', 'toret', '2022-02-18 08:32:14', NULL),
(13, 'guake', 'guake', '2022-02-18 11:24:10', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `citizens`
--
ALTER TABLE `citizens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUser_citizen` (`idUser`);

--
-- Indices de la tabla `evolution`
--
ALTER TABLE `evolution`
  ADD PRIMARY KEY (`type`);

--
-- Indices de la tabla `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idSuperhero_request` (`idSuperhero`),
  ADD KEY `fk_citizen_request` (`idCitizen`);

--
-- Indices de la tabla `superheros`
--
ALTER TABLE `superheros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_evolution` (`evolution_type`),
  ADD KEY `fk_idUser` (`idUser`);

--
-- Indices de la tabla `superheros_abilities`
--
ALTER TABLE `superheros_abilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idSuperhero` (`id_superhero`),
  ADD KEY `fk_idAbility` (`id_ability`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `citizens`
--
ALTER TABLE `citizens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `superheros`
--
ALTER TABLE `superheros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `superheros_abilities`
--
ALTER TABLE `superheros_abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citizens`
--
ALTER TABLE `citizens`
  ADD CONSTRAINT `fk_idUser_citizen` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `fk_citizen_request` FOREIGN KEY (`idCitizen`) REFERENCES `citizens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSuperhero_request` FOREIGN KEY (`idSuperhero`) REFERENCES `superheros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `superheros`
--
ALTER TABLE `superheros`
  ADD CONSTRAINT `fk_evolution` FOREIGN KEY (`evolution_type`) REFERENCES `evolution` (`type`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `superheros_abilities`
--
ALTER TABLE `superheros_abilities`
  ADD CONSTRAINT `fk_idAbility` FOREIGN KEY (`id_ability`) REFERENCES `abilities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSuperhero` FOREIGN KEY (`id_superhero`) REFERENCES `superheros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
