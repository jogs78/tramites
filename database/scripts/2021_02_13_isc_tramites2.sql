-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-02-2021 a las 05:38:38
-- Versión del servidor: 5.6.49-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isc_tramites2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id` int(11) NOT NULL,
  `tramite_seguir` varchar(255) NOT NULL DEFAULT '',
  `quien` int(10) UNSIGNED NOT NULL,
  `lugar` int(11) NOT NULL,
  `momento` timestamp NULL DEFAULT NULL,
  `direccion` enum('ENTRADA','SALIDA') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`id`, `tramite_seguir`, `quien`, `lugar`, `momento`, `direccion`) VALUES
(1, '1', 17, 4, '2019-09-04 06:01:53', 'ENTRADA'),
(2, '7', 20, 3, '2019-10-28 17:37:57', 'ENTRADA'),
(3, '7', 17, 3, '2019-10-28 17:40:02', 'SALIDA'),
(4, '7', 17, 5, '2019-10-28 17:40:56', 'ENTRADA'),
(5, '7', 17, 1, '2019-10-28 17:42:55', 'ENTRADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar`
--

CREATE TABLE `lugar` (
  `id` int(11) NOT NULL,
  `Descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `lugar`
--

INSERT INTO `lugar` (`id`, `Descripcion`) VALUES
(1, 'Jefatura de Sistemas Y Computación'),
(2, 'Dirección'),
(3, 'Subdirección'),
(4, 'Secretaria de Sistemas y Computación'),
(5, 'Recursos humanos'),
(6, 'Coordinación'),
(7, 'Recursos Financieros'),
(8, 'División de estudios profesionales'),
(10, 'Planeación'),
(11, 'Recursos Materiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramite`
--

CREATE TABLE `tramite` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_creacion` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Pendiente','Finalizado','') NOT NULL DEFAULT 'Pendiente',
  `creo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tramite`
--

INSERT INTO `tramite` (`id`, `nombre`, `fecha_creacion`, `status`, `creo`) VALUES
(1, 'Trámite 1', '2019-09-03 20:38:39', 'Pendiente', 1),
(2, 'Trámite 2', '2019-09-03 20:38:50', 'Pendiente', 1),
(3, 'Trámite 3', '2019-09-03 20:39:00', 'Pendiente', 1),
(4, 'Trámite 4', '2019-09-03 20:41:47', 'Finalizado', 2),
(5, 'Trámite 5', '2019-09-03 20:42:09', 'Finalizado', 1),
(6, 'Trámite 6', '2019-09-03 20:42:21', 'Pendiente', 2),
(7, 'Comision Emilio', '2019-10-28 09:35:38', 'Pendiente', 1),
(8, 'Evento 2 Nov', '2019-10-29 11:11:06', 'Pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` enum('JefeDepto','Prestador','Secretaria') DEFAULT 'Prestador',
  `numcontrol` varchar(45) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `lastname`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`, `numcontrol`, `activo`) VALUES
(1, 'Monjarás Velasco', 'María Guadalupe', 'sistemas@ittg.edu.mx', NULL, '$2y$10$k7DzUtoPqRLikpE0i1AQhe5CILrVEw2r3PoSzCKEfLRPkV/G9jeJO', 'R9moYbiOdBkhOt9nC0TL76U1fdFQVqr8OVsaCx1FHijE9NqoaC8iABCuDf7q', NULL, '2019-11-07 01:31:01', 'JefeDepto', 'S/N', 1),
(2, 'Cruz de la Cruz', 'Fanny Jazmin', 'secretaria@gmail.com', NULL, '$2y$10$G5hZhDhrk6Ywswh.zgzCp.SgUdeA5eIeJLuYBYuKxPIfu9fLdeMii', '8enhzv7X33eljaEXuikPg9bJ55fwcITlYu8k7xhRzFmpakIT9rQAu7V7eVvv', NULL, '2019-11-06 14:29:55', 'Secretaria', 'S/N', 1),
(17, 'Gutiérrez Zavala', 'Pedro', 'pgutierrez@ittg.edu.mx', NULL, '$2y$10$gAPX098fviOrir/ee3Q/YulJrXp5W9NvGzMHJY.CWDme7YBCZoQAy', 'IPf9aulK3gFhzuUKC7ajh3fDrM1CL9wZ6ou6QA4LZUuzCtlqxdREoSpPGAnO', '2019-09-04 10:41:02', '2019-09-14 03:47:02', 'Prestador', '15271045', 1),
(20, 'Cornelio Aguilar', 'Yamile', 'yamileco05@gmail.com', NULL, '$2y$10$KoLdlceMtMx31oybfi29s.Goncmcu1pLBXSiLUewRsDgSM1VdnbvO', 'OfUGvfq1RTwwFuVu6at5quQ4cyAkLSrncUyKeBRG2n4AU0dAAulkBRg69fCj', '2019-10-28 23:33:19', '2019-10-28 23:34:10', 'Prestador', '16270169', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id`,`tramite_seguir`,`quien`,`lugar`),
  ADD KEY `fk_historico_lugar1` (`lugar`),
  ADD KEY `fk_historico_users1` (`quien`),
  ADD KEY `fk_historico_tramites1` (`tramite_seguir`);

--
-- Indices de la tabla `lugar`
--
ALTER TABLE `lugar`
  ADD PRIMARY KEY (`id`,`Descripcion`) USING BTREE;

--
-- Indices de la tabla `tramite`
--
ALTER TABLE `tramite`
  ADD PRIMARY KEY (`id`,`creo`,`nombre`) USING BTREE,
  ADD KEY `fk_tramite_users1_idx` (`creo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lugar`
--
ALTER TABLE `lugar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tramite`
--
ALTER TABLE `tramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historico`
--
ALTER TABLE `historico`
  ADD CONSTRAINT `fk_historico_lugar1` FOREIGN KEY (`lugar`) REFERENCES `lugar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_historico_users1` FOREIGN KEY (`quien`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
