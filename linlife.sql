-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2021 a las 22:33:34
-- Versión del servidor: 5.7.23
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `linlife`
--
CREATE DATABASE IF NOT EXISTS `linlife` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `linlife`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

DROP TABLE IF EXISTS `domicilios`;
CREATE TABLE IF NOT EXISTS `domicilios` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `calle` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noext` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noint` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cp` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colonia` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `localidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entidad` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_d_fk` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `calle`, `noext`, `noint`, `cp`, `colonia`, `localidad`, `entidad`, `descripcion`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '14', '226', NULL, '57800', 'Esperanza', 'Nezahualcóyotl', 'Selecciona...', 'Aquí por donde vivo jaja', 7, '2021-04-17 06:33:32', '2021-04-21 03:29:27'),
(2, 'UTN 1', '226', NULL, '57000', 'Benito Juárez (La Aurora)', 'Nezahualcóyotl', '...', 'En mi casa', 8, '2021-04-19 22:03:32', '2021-04-19 22:03:32'),
(3, 'UTN 1', '226', NULL, '57800', 'Esperanza', 'Nezahualcóyotl', 'Selecciona...', 'Aquí por donde vivo jaja', 9, '2021-04-19 23:18:08', '2021-04-19 23:18:08'),
(4, 'UTN 1', '226', NULL, '57000', 'Benito Juárez (La Aurora)', 'Nezahualcóyotl', 'Selecciona...', 'Aquí por donde vivo jaja', 10, '2021-04-19 23:28:39', '2021-04-19 23:28:39'),
(5, 'UTN 1', '226', NULL, '57000', 'Benito Juárez (La Aurora)', 'Nezahualcóyotl', '...', 'En mi casa', 11, '2021-04-19 23:37:12', '2021-04-19 23:37:12'),
(6, 'UTN 1', '226', NULL, '56400', 'Jardín de Los Reyes', 'La Paz', 'Selecciona...', 'Aquí por donde vivo jaja', 12, '2021-04-19 23:39:50', '2021-04-20 07:51:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_07_215746_create_roles_table', 1),
(5, '2021_04_07_215916_create_role_user_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor_dist` double(8,2) NOT NULL,
  `precio_publico` double(8,2) NOT NULL,
  `nivel_1` int(5) NOT NULL,
  `nivel_2` int(5) NOT NULL,
  `nivel_3` int(5) NOT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-04-08 03:53:47', '2021-04-08 03:53:47'),
(2, 'user', 'User', '2021-04-08 03:53:47', '2021-04-08 03:53:47'),
(3, 'intruso', 'Intruso pruebas', '2021-04-08 03:53:47', '2021-04-08 03:53:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id_fk` (`role_id`),
  KEY `user_id_fk` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2021-04-14 06:32:32', '2021-04-14 06:32:32'),
(2, 1, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 3, 3, NULL, NULL),
(8, 2, 7, '2021-04-17 06:33:32', '2021-04-17 06:33:32'),
(13, 2, 12, '2021-04-19 23:39:50', '2021-04-19 23:39:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aPaterno` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aMaterno` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(19) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telcasa` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telcel` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atras` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entidadnac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baja` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invitacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_cuenta` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `aPaterno`, `aMaterno`, `sexo`, `email`, `email_verified_at`, `password`, `telcasa`, `telcel`, `frente`, `atras`, `curp`, `fechanac`, `entidadnac`, `estado`, `banco`, `beneficiario`, `baja`, `slug`, `invitacion`, `code`, `avatar`, `status_cuenta`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '', '', '', 'admin@example.com', NULL, '$2y$10$DCw6Gy9h98sFstWmFZ7MIem/ujGK8TXIAhaKam4CV1nIlTaNrZBDO', '0', '0', '', '', '', '', '', '', '', '', 0, 'super-usuario', '', '', '', 'PENDIENTE', NULL, '2021-04-08 04:01:17', '2021-04-08 04:01:17'),
(2, 'Usuario', '', '', '', 'user@example.com', NULL, '$2y$10$Qu2SEpBS6GMqR.O3FacEPeljGP1NtL8Vxhzf0vxa3.lrclxaCsca6', '1234567891', NULL, '', '', '', '', '', '', '', '', 0, 'usuario-normal', '', '', '', 'PENDIENTE', NULL, '2021-04-08 04:01:54', '2021-04-20 23:41:29'),
(3, 'Intruso', '', '', '', 'intruso@example.com', NULL, '$2y$10$cJuwQ1.ISAZC5bK3Xu.lc.lh5LwrufCkLIwR7JYKzbPtRC0h27kXu', '0', '0', '', '', '', '', '', '', '', '', 0, 'uyyy-un-intruso', '', '', '', 'PENDIENTE', NULL, '2021-04-08 04:03:05', '2021-04-08 04:03:05'),
(4, 'Usuario test', NULL, NULL, '', 'usuariotest@example.com', NULL, '$2y$10$2b5vE81u2cF1X3s5Jv768.71dbcLKhHqZ19EdIvnDXl8/rRqTO7uC', '0', '0', '', '', '', '', '', '', '', '', 0, 'usuario-test', '', NULL, NULL, 'PENDIENTE', NULL, '2021-04-14 06:32:31', '2021-04-14 06:32:31'),
(7, 'Fernando', 'Lopez', 'Servin', 'on', 'fernando_ls96@hotmail.com', NULL, '$2y$10$vFXyiuQs4UFA.YY26KVBxultKMLd1LUqPVZy/fyhIVWZ4r4tzmcqa', '5551133441', '5614053241', '1618623211.jpg', '1618623211.jpg', '123456789987654321', '2021-04-16', NULL, 'Selecciona...', NULL, NULL, 0, 'fernando1618957766', '11', NULL, NULL, 'PENDIENTE', NULL, '2021-04-17 06:33:32', '2021-04-21 03:29:26'),
(12, 'Diana Alejandra', 'Texocotitla', 'Romero', 'on', 'fernandools99@gmail.com', NULL, '$2y$10$2zKWcV/ylzo16/P2msNWMuDyCvJi36Qkr6nx/jhEX4S9nzWiA89NO', '5551133441', '5614053241', '1618857589.jpg', '1618857589.jpg', '123456789987654321', '2021-04-19', NULL, 'Selecciona...', NULL, NULL, 0, 'diana-alejandra1618887109', '11', NULL, NULL, 'PENDIENTE', NULL, '2021-04-19 23:39:50', '2021-04-20 07:51:49');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_id_fk` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
