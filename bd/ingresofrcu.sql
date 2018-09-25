-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-09-2018 a las 02:33:22
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
  `idUsuario` int(10) UNSIGNED NOT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `descripcion`, `idUsuario`, `fechaInicio`, `fechaFin`) VALUES
(25, 'wewewewew', 11, NULL, NULL),
(26, 'tetetetetete', 11, NULL, NULL),
(27, 'parcial 1 bla bla', 11, NULL, NULL),
(28, 'jejejejej', 8, NULL, NULL),
(29, 'jejejeje', 8, '2018-09-01', '2018-09-01'),
(32, 'jejejejeje', 8, '2018-09-01', '2018-09-15');

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
(7, 'jojijuhhyuyuyuyu', 'plplplplplplplplplp', './assets/uploads/materia_5b605b9209e0c_855152568.txt', 1, 2),
(8, 'kikijijiji', 'huhuhuhuhu', './assets/uploads/materia_5b605c3042496_536721328.docx', 1, 2),
(9, 'fefefefefefefefeererrrrrqqq', 'tttttttttttttttttttttttttttttttt', 'http://www.google.com', 1, 1),
(10, 'wqeqweqwe', 'qweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqweqwewqeqw', 'https://twitter.com/', 1, 1),
(11, 'deberia mostrar solo esto', 'y tambiennsolo esto', 'https://web.whatsapp.com/', 2, 1),
(12, 'queria probar', 'esto', './assets/uploads/materia_5b81c52ba5b48_966727865.pdf', 3, 2),
(13, 'proban222', 'gggggggg', './assets/uploads/materia_5b81c96794205_749579046.pdf', 3, 2),
(14, 'jojojojojoeeee', 'tetetetete', './assets/uploads/materia_5b81c9fd42f6e_541367542.pdf', 3, 2),
(15, 'tetegegegsdf1123123', '1231232455ggg', './assets/uploads/materia_5b81ca46b1da7_280308758.pdf', 3, 2),
(16, 'twitter', 'tetetetetww', 'https://twitter.com/', 3, 1),
(17, 'luciano', 'tomas gini', './assets/uploads/materia_5b8328ffb8f46_421343073.pdf', 1, 2),
(18, 'a ver esto probando', 'prueba nro 505550', './assets/uploads/materia_5b8329595cf1c_269841257.pdf', 1, 2);

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

--
-- Volcado de datos para la tabla `categoriaforo`
--

INSERT INTO `categoriaforo` (`id`, `nombre`) VALUES
(1, 'varios'),
(2, 'chapa c'),
(3, 'dededede');

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
  `idMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`id`, `cuatrimestre`, `anio`, `idMateria`) VALUES
(1, '1ro', 2018, 1),
(2, 'primero', 2018, 1),
(3, 'anual', 2018, 2),
(4, 'primero', 2019, 5);

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
(2, 'Libre', NULL, 1, 1),
(6, 'Cursando', NULL, 8, 1),
(7, 'Cursando', NULL, 12, 1),
(8, 'Cursando', NULL, 13, 1),
(9, 'Cursando', NULL, 12, 1),
(11, 'Cursando', NULL, 13, 1),
(15, 'Promocionado', NULL, 11, 2),
(16, 'Aprobado', NULL, 13, 3);

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
(1, 1, 2, 'Escalante, Mario'),
(2, 1, 3, 'Escalante, Mario'),
(3, 2, 4, 'ricardooo, julio');

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
(3, 'Villa Malvina', 'Economía', 7),
(4, 'luis maria', 'no saben nada', 7);

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

--
-- Volcado de datos para la tabla `examen`
--

INSERT INTO `examen` (`id`, `idCursada`, `tipo`, `descripcion`, `nota`, `comentario`, `fecha`) VALUES
(1, 6, 'Parcial', 'jejejejej', 9, 'jeje', '2018-07-24'),
(2, 15, 'Recuperatorio', 'hehehe', 1, 'jojojo', '2018-07-31'),
(3, 2, 'Final', 'jojojo', 10, '2ededef', '2018-07-31'),
(4, 15, 'Recuperatorio', 'que se yooooppopop', 1, 'dedededede', '2018-07-31');

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
  `idActividad` int(11) DEFAULT NULL,
  `fechaInicio` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`id`, `dia`, `horaInicio`, `horaFin`, `idComision`, `idActividad`, `fechaInicio`, `fechaFin`) VALUES
(1, 3, '10:10:00', '18:18:00', 2, NULL, NULL, NULL),
(22, 1, '21:02:00', '23:25:00', NULL, 25, NULL, NULL),
(23, 1, '21:02:00', '23:23:00', NULL, 26, NULL, NULL),
(24, 5, '12:12:00', '14:14:00', NULL, 27, NULL, NULL),
(25, 5, '12:12:00', '14:14:00', NULL, 27, NULL, NULL),
(26, 3, '12:12:00', '14:14:00', NULL, 27, NULL, NULL),
(27, 6, '12:12:00', '14:14:00', NULL, 27, NULL, NULL),
(28, 5, '12:12:00', '14:14:00', NULL, 27, NULL, NULL),
(29, 1, '10:10:00', '22:22:00', 3, NULL, NULL, NULL),
(30, 4, '10:10:00', '15:15:00', 4, NULL, NULL, NULL),
(31, 2, '01:00:00', '02:00:00', NULL, 28, NULL, NULL),
(32, 4, '11:11:00', '12:12:00', NULL, 29, NULL, NULL),
(33, 6, '11:11:00', '12:01:00', NULL, 32, NULL, NULL);

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
(4, 'jojojojijiujujujojuijiunijnk', 'esta es una descripcion v2', '2018-06-15', 8, 1),
(11, 'qqqqq', 'aaaaaaa', '2018-07-21', 11, 1),
(12, 'jojojo', 'the championsssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss\nthe champions league\nthe championsssssssssssssssssssss\ntututurururuur', '2018-07-27', 8, 0),
(13, 'hehehehehe', 'peroq ue se yo que mierda escribir aca cheeeee', '2018-07-27', 11, 1),
(14, 'a vergaston', 'porque a pesar de todoo', '2018-08-16', 11, 0);

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
(1, 'analsisi 45'),
(2, 'analsisi 45'),
(3, 'forrooo'),
(4, 'bien ahi gatoo'),
(5, 'materia nueva a probar');

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

--
-- Volcado de datos para la tabla `mensajeforo`
--

INSERT INTO `mensajeforo` (`id`, `contenido`, `posicion`, `fecha`, `idTema`, `idUsuario`) VALUES
(7, 'a ver ma', 1, '2018-07-05 19:00:25', 7, 1),
(8, 'dedede', 1, '2018-07-05 19:00:29', 7, 1),
(9, 'jojojo', 1, '2018-07-23 20:27:54', 7, 17),
(10, 'jejeje', 1, '2018-07-27 14:13:14', 8, 1),
(11, 'wqeqwe', 1, '2018-07-27 19:38:10', 8, 1),
(12, 'jejejejyjyjy', 1, '2018-07-27 20:35:16', 7, 11),
(13, 'qweqweqwe', 1, '2018-07-27 20:44:15', 7, 11),
(14, 'jrrtjtjtjt', 1, '2018-07-27 20:44:39', 7, 11);

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
(2, 'Argentina'),
(6, 'Brasil'),
(1, 'Cuba'),
(5, 'Chile'),
(4, 'Paraguay'),
(3, 'Uruguay'),
(12, 'wachin');

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
(1, 'Mario', 'Escalante'),
(2, 'julio', 'ricardooo'),
(3, 'jojojoju', 'asd2312');

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

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`id`, `titulo`, `estado`, `visitas`, `idCategoriaForo`) VALUES
(7, 'jojojo', 'cerrado', 0, 1),
(8, 'dedede', 'abierto', 0, 1),
(9, 'qggqgqgq', 'abierto', 0, 1),
(10, 'wqeqweqweqwe', 'abierto', 0, 1),
(11, 'qweqweqweqweqw', 'abierto', 0, 1),
(12, 'puto el que lee', 'abierto', 0, 1),
(13, 'como hago para tal cosa', 'abierto', 0, 1);

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
(1, '127.0.0.1', 'admin', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', NULL, NULL, NULL, 1268889823, 1536875736, 1, 'Admin', 'istrator', 'ADMIN', '0', NULL, NULL, NULL),
(6, '::1', '38570367', '$2y$08$AF8MVo9FrTXuMjfpOUE4TOiykTEyRKFJgYxGdhvp0jvhTzV/z8CFa', NULL, 'martinaljeandro@g.com', NULL, NULL, NULL, NULL, 1527166470, NULL, 1, 'valentiN', 'costa', NULL, '1234456', NULL, NULL, NULL),
(7, '::1', '12345678', '$2y$08$4LAlqWb1RdPZzoIFp2zFNu6OyKMsluOoR41Dm14/qMiIskVXEpDPC', NULL, '12334567@123.com', NULL, NULL, NULL, NULL, 1527166582, 1527167066, 1, 'prueba', 'prueba', NULL, '123454567', NULL, NULL, NULL),
(8, '::1', '303456', '$2y$08$mueSygtTJduWEtRjhQ8cIemST2cO3mYqHypkU2N8f1VYGsZgoUa5G', NULL, 'email@email.com', NULL, NULL, NULL, NULL, 1527876058, 1533047423, 1, 'pedro', 'rodriguez', NULL, '5493446660025', 2040, 'ING', 1),
(9, '::1', '34343434', '$2y$08$j91rrsHKVtrfmvevGMw1eOK2iDPlc4fGauHicmvpAb26vy.czNqd2', NULL, '34@34.com', NULL, NULL, NULL, NULL, 1528207309, 1533080464, 1, 'Ricardo', 'Montaner', NULL, '3434', NULL, NULL, NULL),
(10, '::1', '37373671', '$2y$08$vthr9qkXQty6Yq9/vwGgsO3qI6kWjKA9G0oUfwNanbUkS1FSL9oHe', NULL, 'email@email.com', NULL, NULL, NULL, NULL, 1528207591, NULL, 1, 'julio', 'Ricardo', NULL, '54549656', NULL, NULL, NULL),
(11, '::1', '3436375', '$2y$08$PKss8FPGbxRjcCBhnBHeRekLhoyHJwytTFuzRyQ/TLn5XglSSQvdq', NULL, 'valentincostam@gmail.com', NULL, NULL, NULL, NULL, 1528207671, 1532723567, 1, 'Valentín', 'Costa', NULL, '5493446576794', 2013, 'ISI', 2),
(12, '::1', '9989889', '$2y$08$7wYqpTYea9ktxwqBs3.s0.4VI14Wfq5gfG7jLbgBIdyrdrrqDrlZi', NULL, '8982@989.com', NULL, NULL, NULL, NULL, 1528207735, 1532440577, 1, 'Juan Carlos', 'Aguilar', NULL, '89898989', 2015, 'ISI', 1),
(13, '::1', '10010', '$2y$08$bXrZ7Kemm/AswoMd4053QOHkTjH4VU2fWj7eh7oTK/weZm28.AsG2', NULL, 'ldrn@chr.com', NULL, NULL, NULL, NULL, 1528208099, 1536365997, 1, 'Daniel', 'Pasarella', NULL, '303456', 2016, 'ISI', 1),
(14, '::1', '2331231231', '$2y$08$GoDjxjrjvUMN9Tr9XUcc/uN4FgTueSuRh/ekwbSeKbZIJwbIkHCcK', NULL, 'jojo@sadasda.com', NULL, NULL, NULL, NULL, 1530794963, NULL, 1, 'wepa', 'wopa wopa', NULL, '12312312312', NULL, NULL, NULL),
(15, '::1', '12312312312312', '$2y$08$hwNzU1H4FsqjqRip/3175em5HX6EXe8DOj5uA9qBJIMvvR/VsFgRK', NULL, 'asdasdasdas@asddas.com', NULL, NULL, NULL, NULL, 1530795123, NULL, 1, 'qweqweqw', 'qweqweqweqw', NULL, '123123123123120', NULL, NULL, NULL),
(16, '::1', '1', '$2y$08$uVK62RAun2mzDNahE9TbHuu1Qhz20J3vM9Wyxh78bPcyFoFIF7TMq', NULL, 'asdasda2@asdasd.com', NULL, NULL, NULL, NULL, 1530795204, NULL, 1, 'sadqweqw', 'sadasdasd', NULL, '121212', NULL, NULL, NULL),
(17, '::1', '38570366', '$2y$08$QCcCAaIRrZFT6RxFJz40nOK1erzLhZh3ALe/f8u3iC2Y.1Hnri8S2', NULL, 'martin.@gm.com', NULL, NULL, NULL, NULL, 1532377619, 1532377650, 1, 'prueba', 'prueba', NULL, '33344433455', 2018, 'ISI', 1),
(18, '::1', '1234', '$2y$08$h66jF3I7Ggcy7qS56tkTfOCYycESOXAQZ0VbZCQSFfTzZIgyyE0J6', NULL, 'traidor@velez.com', NULL, NULL, NULL, NULL, 1532377950, 1533822731, 1, 'mauro', 'zarate', NULL, '12', NULL, NULL, NULL),
(19, '::1', '323231232', '$2y$08$Z1Vr2GPfXeNdXmdjebc2NurC4rf8.kwQ.7zU1POelD4EGyaU19WuG', NULL, 'mmartin.ciba@ga.co', NULL, NULL, NULL, NULL, 1533765200, NULL, 1, 'asdasdasdasda', 'asdasdasd', NULL, '5493446348690', NULL, NULL, NULL);

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
(14, 13, 2),
(15, 14, 3),
(16, 15, 3),
(17, 16, 3),
(18, 17, 2),
(19, 18, 3),
(20, 19, 3);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `archivo`
--
ALTER TABLE `archivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `categoriaarchivo`
--
ALTER TABLE `categoriaarchivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `categoriaforo`
--
ALTER TABLE `categoriaforo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cursada`
--
ALTER TABLE `cursada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `dicta`
--
ALTER TABLE `dicta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `escuela`
--
ALTER TABLE `escuela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `examen`
--
ALTER TABLE `examen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `mensajeforo`
--
ALTER TABLE `mensajeforo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesor`
--
ALTER TABLE `profesor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
