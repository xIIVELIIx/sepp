-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-12-2016 a las 21:46:53
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sepp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aptitud_profesional`
--

CREATE TABLE `aptitud_profesional` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `descripcion` text,
  `id_categoria_aptitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_aptitudes`
--

CREATE TABLE `categorias_aptitudes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` text NOT NULL,
  `id_programa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id`, `nombre`) VALUES
(1, 'BOGOTA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `telefono` int(20) NOT NULL,
  `celular` bigint(20) NOT NULL,
  `direccion` text NOT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_practica`
--

CREATE TABLE `estados_practica` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_usuario`
--

CREATE TABLE `estados_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estados_usuario`
--

INSERT INTO `estados_usuario` (`id`, `nombre`, `descripcion`) VALUES
(1, 'PREINSCRIPCION', 'ESTADO DE INSCRIPCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`id`, `nombre`) VALUES
(1, 'INGENIERIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad_practica`
--

CREATE TABLE `modalidad_practica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) NOT NULL,
  `numero_visitas` int(11) NOT NULL,
  `activo` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `novedad`
--

CREATE TABLE `novedad` (
  `id` int(11) NOT NULL,
  `id_practica` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_estudiante`
--

CREATE TABLE `perfil_estudiante` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_aptitud` int(11) NOT NULL,
  `id_practica` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_vacante`
--

CREATE TABLE `perfil_vacante` (
  `id` int(11) NOT NULL,
  `id_vacante` int(11) NOT NULL,
  `id_aptitud` int(11) NOT NULL,
  `comentario` text,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica_profesional`
--

CREATE TABLE `practica_profesional` (
  `id` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  `id_profesor` int(11) NOT NULL,
  `id_modalidad` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `cargo_practicante` varchar(45) DEFAULT NULL,
  `nombre_jefe` varchar(50) DEFAULT NULL,
  `apellido_jefe` varchar(50) DEFAULT NULL,
  `telefono_jefe` int(11) DEFAULT NULL,
  `celular_jefe` bigint(20) DEFAULT NULL,
  `email_jefe` varchar(75) DEFAULT NULL,
  `cargo_jefe` varchar(50) DEFAULT NULL,
  `direccion_practica` text,
  `id_ciudad` int(11) DEFAULT NULL,
  `id_estado_practica` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE `programas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `id_facultad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id`, `nombre`, `id_facultad`) VALUES
(1, 'INGENIERIA DE SISTEMAS', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_usuario`
--

CREATE TABLE `roles_usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `activo` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles_usuario`
--

INSERT INTO `roles_usuario` (`id`, `nombre`, `activo`) VALUES
(1, 'ESTUDIANTE', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(75) DEFAULT NULL,
  `id_ciudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `id_ciudad`) VALUES
(1, 'CALLE 80 PRINCIPAL', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `cedula` bigint(20) NOT NULL,
  `codigo_uniminuto` int(9) UNSIGNED ZEROFILL NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nombre2` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) NOT NULL,
  `apellido2` varchar(50) DEFAULT NULL,
  `email1` varchar(75) NOT NULL,
  `email2` varchar(75) DEFAULT NULL,
  `telefono_fijo` int(11) DEFAULT NULL,
  `celular` bigint(20) DEFAULT NULL,
  `id_rol_usuario` int(11) NOT NULL,
  `id_programa` int(11) NOT NULL,
  `id_facultad` int(11) NOT NULL,
  `id_sede` int(11) NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `cedula`, `codigo_uniminuto`, `nombre`, `nombre2`, `apellido`, `apellido2`, `email1`, `email2`, `telefono_fijo`, `celular`, `id_rol_usuario`, `id_programa`, `id_facultad`, `id_sede`, `fecha_registro`, `id_estado`) VALUES
(5, 1014240380, 000202669, 'Cristian', 'Camilo', 'Velasquez', 'Piraneque', 'camilo.velasquezp@gmail.com', NULL, NULL, 3123944040, 1, 1, 1, 1, '2016-12-13 20:44:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacante_empresa`
--

CREATE TABLE `vacante_empresa` (
  `id` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `descripcion` text,
  `disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_practica` int(11) NOT NULL,
  `comentario` text,
  `id_estado_visita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aptitud_profesional`
--
ALTER TABLE `aptitud_profesional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_apt_idx` (`id_categoria_aptitud`);

--
-- Indices de la tabla `categorias_aptitudes`
--
ALTER TABLE `categorias_aptitudes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `programacatgria_idx` (`id_programa`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre_empresas` (`nombre`),
  ADD KEY `ciudad_idx` (`id_ciudad`);

--
-- Indices de la tabla `estados_practica`
--
ALTER TABLE `estados_practica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_usuario`
--
ALTER TABLE `estados_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidad_practica`
--
ALTER TABLE `modalidad_practica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `novedad`
--
ALTER TABLE `novedad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_reportador_idx` (`id_usuario`),
  ADD KEY `practica_novedad_idx` (`id_practica`);

--
-- Indices de la tabla `perfil_estudiante`
--
ALTER TABLE `perfil_estudiante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apt_estydiante_idx` (`id_aptitud`),
  ADD KEY `practicapeerfil_idx` (`id_practica`),
  ADD KEY `id_estu_idx` (`id_estudiante`);

--
-- Indices de la tabla `perfil_vacante`
--
ALTER TABLE `perfil_vacante`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apt_estydiante_idx` (`id_aptitud`),
  ADD KEY `vacante_idx` (`id_vacante`);

--
-- Indices de la tabla `practica_profesional`
--
ALTER TABLE `practica_profesional`
  ADD PRIMARY KEY (`id`),
  ADD KEY `practicaempresa_idx` (`id_empresa`),
  ADD KEY `estadopractica_idx` (`id_estado_practica`),
  ADD KEY `modaldad_idx` (`id_modalidad`),
  ADD KEY `profesor_idx` (`id_profesor`),
  ADD KEY `estudiante_idx` (`id_estudiante`);

--
-- Indices de la tabla `programas`
--
ALTER TABLE `programas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facultad` (`id_facultad`);

--
-- Indices de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ciudad_sede_idx` (`id_ciudad`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cedula` (`cedula`),
  ADD KEY `codigo_uniminuto` (`codigo_uniminuto`),
  ADD KEY `rol` (`id_rol_usuario`),
  ADD KEY `estado_usuario_idx` (`id_estado`),
  ADD KEY `sede_usuario_idx` (`id_sede`);

--
-- Indices de la tabla `vacante_empresa`
--
ALTER TABLE `vacante_empresa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_perfil_idx` (`id_empresa`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pract_prof_idx` (`id_practica`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aptitud_profesional`
--
ALTER TABLE `aptitud_profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `categorias_aptitudes`
--
ALTER TABLE `categorias_aptitudes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados_practica`
--
ALTER TABLE `estados_practica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados_usuario`
--
ALTER TABLE `estados_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `facultades`
--
ALTER TABLE `facultades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `modalidad_practica`
--
ALTER TABLE `modalidad_practica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `novedad`
--
ALTER TABLE `novedad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_estudiante`
--
ALTER TABLE `perfil_estudiante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil_vacante`
--
ALTER TABLE `perfil_vacante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `practica_profesional`
--
ALTER TABLE `practica_profesional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `programas`
--
ALTER TABLE `programas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles_usuario`
--
ALTER TABLE `roles_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sedes`
--
ALTER TABLE `sedes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `vacante_empresa`
--
ALTER TABLE `vacante_empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aptitud_profesional`
--
ALTER TABLE `aptitud_profesional`
  ADD CONSTRAINT `categoria_apt` FOREIGN KEY (`id_categoria_aptitud`) REFERENCES `categorias_aptitudes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias_aptitudes`
--
ALTER TABLE `categorias_aptitudes`
  ADD CONSTRAINT `programacatgria` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD CONSTRAINT `ciudad` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudad` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil_estudiante`
--
ALTER TABLE `perfil_estudiante`
  ADD CONSTRAINT `apt_estydiante` FOREIGN KEY (`id_aptitud`) REFERENCES `aptitud_profesional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `id_estu` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `practicapeerfil` FOREIGN KEY (`id_practica`) REFERENCES `practica_profesional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfil_vacante`
--
ALTER TABLE `perfil_vacante`
  ADD CONSTRAINT `apt_vacante` FOREIGN KEY (`id_aptitud`) REFERENCES `aptitud_profesional` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `vacante` FOREIGN KEY (`id_vacante`) REFERENCES `vacante_empresa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `practica_profesional`
--
ALTER TABLE `practica_profesional`
  ADD CONSTRAINT `estadopractica` FOREIGN KEY (`id_estado_practica`) REFERENCES `estados_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `estudiante` FOREIGN KEY (`id_estudiante`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `modaldad` FOREIGN KEY (`id_modalidad`) REFERENCES `modalidad_practica` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `practicaempresa` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `profesor` FOREIGN KEY (`id_profesor`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `PROG_FACT` FOREIGN KEY (`id_facultad`) REFERENCES `facultades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `estado_usuario` FOREIGN KEY (`id_estado`) REFERENCES `estados_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rol_usuario` FOREIGN KEY (`id_rol_usuario`) REFERENCES `roles_usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sede_usuario` FOREIGN KEY (`id_sede`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `vacante_empresa`
--
ALTER TABLE `vacante_empresa`
  ADD CONSTRAINT `epresa_perfil` FOREIGN KEY (`id_empresa`) REFERENCES `empresas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `pracvisita` FOREIGN KEY (`id_practica`) REFERENCES `practica_profesional` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
