-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-04-2021 a las 22:15:05
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.2.33

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `calle`, `noext`, `noint`, `cp`, `colonia`, `localidad`, `entidad`, `descripcion`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '14', '226', NULL, '57000', '...', 'Neza', 'Selecciona...', 'Aquí por donde vivo jaja', 7, '2021-04-17 06:33:32', '2021-04-17 06:33:32'),
(2, 'GUERRILLERA ', '212', '212', '57000', 'Aurora Segunda Sección (Benito Juárez)', 'Nezahualcóyotl', 'Mexico', 'vivo ahi es mi casa', 2, '2021-04-20 20:26:47', '2021-04-20 20:26:47');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 4, '2021-04-14 06:32:32', '2021-04-14 06:32:32'),
(2, 1, 1, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 3, 3, NULL, NULL),
(5, 3, 3, NULL, NULL),
(8, 2, 7, '2021-04-17 06:33:32', '2021-04-17 06:33:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aPaterno` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `aMaterno` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(19) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telcasa` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telcel` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frente` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atras` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curp` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fechanac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entidadnac` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `clabe` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rfc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `constancia` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `beneficiario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `baja` int(11) DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invitacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `aPaterno`, `aMaterno`, `sexo`, `email`, `email_verified_at`, `password`, `telcasa`, `telcel`, `frente`, `atras`, `curp`, `fechanac`, `entidadnac`, `estado`, `banco`, `clabe`, `rfc`, `constancia`, `beneficiario`, `baja`, `slug`, `invitacion`, `code`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '', '', '', 'admin@example.com', NULL, '$2y$10$DCw6Gy9h98sFstWmFZ7MIem/ujGK8TXIAhaKam4CV1nIlTaNrZBDO', '0', '0', '', '', '', '', '', '', '', NULL, NULL, NULL, '', 0, '', '', '', '', NULL, '2021-04-08 04:01:17', '2021-04-08 04:01:17'),
(2, 'Usuario', 'registrado', 'prueba', '', 'user@example.com', NULL, 'linlife123', '5572836212', '5511223344', '', '', 'bhjbjhbsdbu', '2021-04-20', 'Estado de México', '', 'Azteca', '7656a6sd6a7', 'hbadysad76ad5', '1618955498TramiteINE.pdf', '', 0, 'usuario-prueba\r\n', '', '74619', 'png.webp', NULL, '2021-04-08 04:01:54', '2021-04-21 03:12:31'),
(3, 'Intruso', '', '', '', 'intruso@example.com', NULL, '$2y$10$cJuwQ1.ISAZC5bK3Xu.lc.lh5LwrufCkLIwR7JYKzbPtRC0h27kXu', '0', '0', '', '', '', '', '', '', '', NULL, NULL, NULL, '', 0, '', '', '', '', NULL, '2021-04-08 04:03:05', '2021-04-08 04:03:05'),
(4, 'Usuario test', NULL, NULL, '', 'usuariotest@example.com', NULL, '$2y$10$2b5vE81u2cF1X3s5Jv768.71dbcLKhHqZ19EdIvnDXl8/rRqTO7uC', '0', '0', '', '', '', '', '', '', '', NULL, NULL, NULL, '', 0, '', '', NULL, NULL, NULL, '2021-04-14 06:32:31', '2021-04-14 06:32:31'),
(7, 'Fernando', 'Lopez', 'Servin', 'on', 'fernando_ls96@hotmail.com', NULL, '$2y$10$vFXyiuQs4UFA.YY26KVBxultKMLd1LUqPVZy/fyhIVWZ4r4tzmcqa', '5551133441', '5614053241', '1618623211.jpg', '1618623211.jpg', '123456789987654321', '2021-04-16', NULL, 'Selecciona...', NULL, NULL, NULL, NULL, NULL, 0, NULL, '11', NULL, NULL, NULL, '2021-04-17 06:33:32', '2021-04-17 06:33:32');

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
