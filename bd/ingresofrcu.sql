-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-06-2018 a las 16:27:47
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ingresofrcu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE `actividad` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `idUsuario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo`
--

CREATE TABLE `archivo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci,
  `ruta` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `idMateria` int(11) NOT NULL,
  `idCategoriaArchivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `archivo`
--

INSERT INTO `archivo` (`id`, `titulo`, `descripcion`, `ruta`, `idMateria`, `idCategoriaArchivo`) VALUES
(1, 'ex video de vectores ahora es otra cosa', 'parcial 1 bla bla', 'youtube.com.ar', 1, 1),
(2, 'probando titutlo', 'probando descrip', 'documento probando fuente', 1, 1),
(3, 'jojode', 'fefefefefe', 'a ver ga', 1, 1),
(4, 'probando title', 'descrip', 'www.hotmail.com', 1, 1),
(5, 'queseyoo', 'probnado', 'localhost', 2, 1),
(6, 'gegege', 'parcial 1 bla bla', 'adasdasde.com.ar', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaarchivo`
--

CREATE TABLE `categoriaarchivo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `categoriaarchivo`
--

INSERT INTO `categoriaarchivo` (`id`, `nombre`) VALUES
(1, 'Link'),
(2, 'Documento'),
(3, 'Texto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaforo`
--

CREATE TABLE `categoriaforo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `idPais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`, `idPais`) VALUES
(6, 'Habana', 1),
(7, 'Gualeguaychú', 2),
(8, 'Concepción del Uruguay', 2),
(9, 'Concordia', 2),
(10, 'Colón', 2),
(11, 'San José', 2),
(12, 'Chajarí', 2),
(13, 'Caseros', 2),
(14, 'Mantero', 2),
(15, 'Aldea San Antonio', 2),
(16, 'Urdinarrain', 2),
(17, 'La Roque', 2),
(18, 'Paysandú', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE `comision` (
  `id` int(11) NOT NULL,
  `cuatrimestre` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `anio` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `nombreMateria` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id`, `cuatrimestre`, `anio`, `idMateria`, `nombreMateria`) VALUES
(1, '1ro', 2018, 1, 'Analisis 2'),
(2, 'primero', 2018, 1, 'Analisis 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursada`
--

CREATE TABLE `cursada` (
  `id` int(11) NOT NULL,
  `estado` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `idUsuario` int(11) UNSIGNED NOT NULL,
  `idComision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cursada`
--

INSERT INTO `cursada` (`id`, `estado`, `nota`, `idUsuario`, `idComision`) VALUES
(2, 'Libre', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dicta`
--

CREATE TABLE `dicta` (
  `id` int(11) NOT NULL,
  `idProfesor` int(11) NOT NULL,
  `idComision` int(11) NOT NULL,
  `nombreProfesor` varchar(120) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `dicta`
--

INSERT INTO `dicta` (`id`, `idProfesor`, `idComision`, `nombreProfesor`) VALUES
(1, 1, 2, 'Escalante, Mario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuela`
--

CREATE TABLE `escuela` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `orientacion` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `idCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `escuela`
--

INSERT INTO `escuela` (`id`, `nombre`, `orientacion`, `idCiudad`) VALUES
(1, 'Pio 12', 'humanidades', 6),
(2, 'Villa Malvina', 'Humaninades', 7),
(3, 'Villa Malvina', 'Economía', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `examen`
--

CREATE TABLE `examen` (
  `id` int(11) NOT NULL,
  `idCursada` int(11) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `nota` int(11) DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish2_ci,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrador'),
(2, 'alumnos', 'Alumnos'),
(3, 'tutor', 'Tutor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id` int(11) NOT NULL,
  `dia` tinyint(4) NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `idComision` int(11) DEFAULT NULL,
  `idActividad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `dia`, `horaInicio`, `horaFin`, `idComision`, `idActividad`) VALUES
(1, 3, '10:10:00', '18:18:00', 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id` int(11) NOT NULL,
  `titulo` varchar(80) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL,
  `idUsuario` int(11) UNSIGNED NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `informe`
--

INSERT INTO `informe` (`id`, `titulo`, `descripcion`, `fecha`, `idUsuario`, `idAutor`) VALUES
(1, 'informe del dia', 'se porta bien ademas se chamuya a todaas.\nle va mal en la facultad \nes un perro\nputo\ny no para de salir de joda', '2018-05-18', 7, 6),
(2, 'probando romper todo', 'ahi viene ramoooon la allegria de mi almaaa\nmuchachos por favor no desesperennn jejejejejejejejiiijejejejeiiii\nhoy es viernes y tu cuerpo lo sabeeee\ndasdasdasdasdasdasd jejee cartonn rompiendo todoooo a ver gastonn', '2018-05-31', 8, 1),
(3, 'dasdasdasdas', 'jujujuujujujujujuju', '2018-06-15', 8, 6),
(4, 'jojojojijiujujujojuijiunijnk', 'esta es una descripcion v2', '2018-06-15', 8, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id`, `nombre`) VALUES
(1, 'Analisis 2'),
(2, 'jojojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeforo`
--

CREATE TABLE `mensajeforo` (
  `id` int(11) NOT NULL,
  `contenido` text COLLATE utf8_spanish2_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `idTema` int(11) NOT NULL,
  `idUsuario` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id`, `nombre`) VALUES
(1, 'Cuba'),
(2, 'Argentina'),
(3, 'Uruguay'),
(4, 'Paraguay'),
(5, 'Chile'),
(6, 'Brasil');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido` varchar(60) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id`, `nombre`, `apellido`) VALUES
(1, 'Mario', 'Escalante');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `id` int(11) NOT NULL,
  `titulo` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL,
  `idCategoriaForo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `anioIngreso` int(11) DEFAULT NULL,
  `carrera` varchar(3) DEFAULT NULL,
  `idEscuela` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `anioIngreso`, `carrera`, `idEscuela`) VALUES
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1528204870, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, NULL),
(6, '::1', '38570367', '$2y$08$AF8MVo9FrTXuMjfpOUE4TOiykTEyRKFJgYxGdhvp0jvhTzV/z8CFa', NULL, 'martinaljeandro@g.com', NULL, NULL, NULL, NULL, 1527166470, NULL, 1, 'valentiN', 'costa', NULL, '1234456', NULL, NULL, NULL),
(7, '::1', '12345678', '$2y$08$4LAlqWb1RdPZzoIFp2zFNu6OyKMsluOoR41Dm14/qMiIskVXEpDPC', NULL, '12334567@123.com', NULL, NULL, NULL, NULL, 1527166582, 1527167066, 1, 'prueba', 'prueba', NULL, '123454567', NULL, NULL, NULL),
(8, '::1', '303456', '$2y$08$mueSygtTJduWEtRjhQ8cIemST2cO3mYqHypkU2N8f1VYGsZgoUa5G', NULL, 'email@email.com', NULL, NULL, NULL, NULL, 1527876058, NULL, 1, 'pedro', 'rodriguez', NULL, '12121212', 2040, 'ING', 1),
(9, '::1', '34343434', '$2y$08$j91rrsHKVtrfmvevGMw1eOK2iDPlc4fGauHicmvpAb26vy.czNqd2', NULL, '34@34.com', NULL, NULL, NULL, NULL, 1528207309, NULL, 1, 'Ricardo', 'Montaner', NULL, '3434', NULL, NULL, NULL),
(10, '::1', '37373671', '$2y$08$vthr9qkXQty6Yq9/vwGgsO3qI6kWjKA9G0oUfwNanbUkS1FSL9oHe', NULL, 'email@email.com', NULL, NULL, NULL, NULL, 1528207591, NULL, 1, 'julio', 'Ricardo', NULL, '54549656', NULL, NULL, NULL),
(11, '::1', '3436375', '$2y$08$PKss8FPGbxRjcCBhnBHeRekLhoyHJwytTFuzRyQ/TLn5XglSSQvdq', NULL, 'emal@email.com', NULL, NULL, NULL, NULL, 1528207671, NULL, 1, 'juan jose', 'lopez', NULL, '23245232', 2014, 'CIV', 1),
(12, '::1', '9989889', '$2y$08$7wYqpTYea9ktxwqBs3.s0.4VI14Wfq5gfG7jLbgBIdyrdrrqDrlZi', NULL, '8982@989.com', NULL, NULL, NULL, NULL, 1528207735, NULL, 1, 'Juan Carlos', 'Aguilar', NULL, '89898989', 2015, 'ISI', 1),
(13, '::1', '10010', '$2y$08$bXrZ7Kemm/AswoMd4053QOHkTjH4VU2fWj7eh7oTK/weZm28.AsG2', NULL, 'ldrn@chr.com', NULL, NULL, NULL, NULL, 1528208099, NULL, 1, 'Daniel', 'Pasarella', NULL, '303456', 2016, 'ISI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(6, 6, 3),
(8, 7, 1),
(9, 8, 2),
(10, 9, 3),
(11, 10, 3),
(12, 11, 2),
(13, 12, 2),
(14, 13, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateria` (`idMateria`),
  ADD KEY `idCategoriaArchivo` (`idCategoriaArchivo`);

--
-- Indices de la tabla `categoriaarchivo`
--
ALTER TABLE `categoriaarchivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriaforo`
--
ALTER TABLE `categoriaforo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idPais` (`idPais`);

--
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `cursada`
--
ALTER TABLE `cursada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`,`idComision`),
  ADD KEY `idComision` (`idComision`);

--
-- Indices de la tabla `dicta`
--
ALTER TABLE `dicta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProfesor` (`idProfesor`),
  ADD KEY `idComision` (`idComision`);

--
-- Indices de la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCiudad` (`idCiudad`);

--
-- Indices de la tabla `examen`
--
ALTER TABLE `examen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCursada` (`idCursada`);

--
-- Indices de la tabla `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idComision` (`idComision`),
  ADD KEY `idActividad` (`idActividad`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idTema` (`idTema`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCategoriaForo` (`idCategoriaForo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `escuelaId` (`idEscuela`);

--
-- Indices de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividad`
--
ALTER TABLE `actividad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `categoriaarchivo`
--
ALTER TABLE `categoriaarchivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoriaforo`
--
ALTER TABLE `categoriaforo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cursada`
--
ALTER TABLE `cursada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `dicta`
--
ALTER TABLE `dicta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividad`
--
ALTER TABLE `actividad`
  ADD CONSTRAINT `actividad_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `archivo`
--
ALTER TABLE `archivo`
  ADD CONSTRAINT `archivo_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `archivo_ibfk_2` FOREIGN KEY (`idCategoriaArchivo`) REFERENCES `categoriaarchivo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD CONSTRAINT `ciudadId` FOREIGN KEY (`idPais`) REFERENCES `pais` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comision`
--
ALTER TABLE `comision`
  ADD CONSTRAINT `comision_ibfk_1` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursada`
--
ALTER TABLE `cursada`
  ADD CONSTRAINT `cursada_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cursada_ibfk_2` FOREIGN KEY (`idComision`) REFERENCES `comision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `dicta`
--
ALTER TABLE `dicta`
  ADD CONSTRAINT `dicta_ibfk_1` FOREIGN KEY (`idProfesor`) REFERENCES `profesor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dicta_ibfk_2` FOREIGN KEY (`idComision`) REFERENCES `comision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `escuela`
--
ALTER TABLE `escuela`
  ADD CONSTRAINT `escuelaId` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `examen`
--
ALTER TABLE `examen`
  ADD CONSTRAINT `examen_ibfk_1` FOREIGN KEY (`idCursada`) REFERENCES `cursada` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`idComision`) REFERENCES `comision` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`idActividad`) REFERENCES `actividad` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  ADD CONSTRAINT `mensajeforo_ibfk_1` FOREIGN KEY (`idTema`) REFERENCES `tema` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mensajeforo_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tema`
--
ALTER TABLE `tema`
  ADD CONSTRAINT `tema_ibfk_1` FOREIGN KEY (`idCategoriaForo`) REFERENCES `categoriaforo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`idEscuela`) REFERENCES `escuela` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
