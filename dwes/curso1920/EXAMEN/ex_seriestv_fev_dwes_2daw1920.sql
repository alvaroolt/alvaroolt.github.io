-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2020 a las 14:17:36
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ex_seriestv_fev_dwes_2daw1920`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `Titulo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fechaHoraInicio` datetime DEFAULT NULL,
  `fechaHoraFinal` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `Titulo`, `fechaHoraInicio`, `fechaHoraFinal`) VALUES
(1, 'Encuenta general', '2020-06-07 00:00:00', '2020-06-09 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_preguntas`
--

CREATE TABLE `encuestas_preguntas` (
  `id` int(11) NOT NULL,
  `idEncuesta` int(11) DEFAULT NULL,
  `pregunta` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `encuestas_preguntas`
--

INSERT INTO `encuestas_preguntas` (`id`, `idEncuesta`, `pregunta`) VALUES
(1, 1, 'Usabilidad de la aplicación'),
(2, 1, 'Actualidad de las series'),
(3, 1, 'Atención al cliente'),
(4, 1, 'Calidad de las series'),
(5, 1, 'Grado de satisfacción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas_respuestas`
--

CREATE TABLE `encuestas_respuestas` (
  `id` int(11) NOT NULL,
  `idEncuestaPregunta` int(11) NOT NULL,
  `Valor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_user`
--

CREATE TABLE `pagos_user` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `anyo` int(11) NOT NULL,
  `importe` int(11) NOT NULL,
  `pagado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `pagos_user`
--

INSERT INTO `pagos_user` (`id`, `idUser`, `mes`, `anyo`, `importe`, `pagado`) VALUES
(1, 4, 1, 2020, 7, 1),
(2, 4, 2, 2020, 7, 1),
(3, 4, 3, 2020, 7, 1),
(4, 4, 4, 2020, 7, 1),
(5, 4, 5, 2020, 7, 1),
(6, 4, 6, 2020, 7, 1),
(7, 2, 1, 2020, 15, 1),
(8, 2, 2, 2020, 15, 1),
(9, 2, 3, 2020, 15, 1),
(10, 2, 4, 2020, 15, 1),
(11, 2, 5, 2020, 15, 1),
(12, 2, 6, 2020, 15, 1),
(13, 12, 1, 2020, 15, 1),
(14, 12, 2, 2020, 15, 1),
(15, 12, 3, 2020, 15, 1),
(16, 12, 4, 2020, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`perfil`) VALUES
('admin'),
('Básico'),
('premium'),
('rol1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `plan` enum('Básico','Premium') COLLATE utf8_spanish_ci NOT NULL,
  `precio` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`id`, `plan`, `precio`) VALUES
(1, 'Básico', '7'),
(2, 'Premium', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `caratula` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `id_plan` int(11) DEFAULT NULL,
  `numero_reproducciones` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`id`, `titulo`, `caratula`, `id_plan`, `numero_reproducciones`) VALUES
(1, 'Juego de Tronos', '1.jpg', 2, 300),
(2, 'Arde Madrid', '2.jpg', 1, 100),
(3, 'Breaking Bad', '3.jpg', 2, 250),
(4, 'Mad Men', '4.jpg', 1, 300),
(5, 'The Big Bang Theory', '5.jpg', 1, 129),
(6, 'Friends', '6.jpg', 1, 500),
(7, 'Perdidos', '7.jpg', 1, 99),
(8, 'Paquita Salas', '8.jpg', 1, 200),
(9, 'Prision Break', '9.jpg', 1, 290);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(16) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `passwd` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_alta` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `passwd`, `perfil`, `fecha_alta`) VALUES
(1, 'admin', 'admin', 'admin', 'admin', NULL),
(2, 'premium', 'premium', 'premium', 'Premium', '2020-01-01'),
(4, 'basico', 'basico', 'basico', 'Básico', '2020-01-01'),
(12, 'pendientepago', 'pendientepago', 'pendientepago', 'Básico', '2020-01-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEncuesta` (`idEncuesta`),
  ADD KEY `pregunta` (`pregunta`);

--
-- Indices de la tabla `encuestas_respuestas`
--
ALTER TABLE `encuestas_respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEncuestaPregunta` (`idEncuestaPregunta`);

--
-- Indices de la tabla `pagos_user`
--
ALTER TABLE `pagos_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `idUser_2` (`idUser`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`perfil`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plan` (`id_plan`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil` (`perfil`),
  ADD KEY `perfil_2` (`perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `encuestas_preguntas`
--
ALTER TABLE `encuestas_preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `pagos_user`
--
ALTER TABLE `pagos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`id`) REFERENCES `encuestas_preguntas` (`idEncuesta`);

--
-- Filtros para la tabla `encuestas_respuestas`
--
ALTER TABLE `encuestas_respuestas`
  ADD CONSTRAINT `encuestas_respuestas_ibfk_1` FOREIGN KEY (`idEncuestaPregunta`) REFERENCES `encuestas_preguntas` (`id`);

--
-- Filtros para la tabla `pagos_user`
--
ALTER TABLE `pagos_user`
  ADD CONSTRAINT `pagos_user_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `fk_plan` FOREIGN KEY (`id_plan`) REFERENCES `planes` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil`) REFERENCES `perfiles` (`perfil`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
