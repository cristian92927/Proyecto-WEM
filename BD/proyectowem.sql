-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-08-2020 a las 23:44:51
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectowem`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarInstructor` (IN `nombres` VARCHAR(80), IN `apellidos` VARCHAR(80), IN `correo` VARCHAR(120), IN `horas` INT(11), IN `color` VARCHAR(30), IN `id` INT)  BEGIN
    UPDATE instructor SET Nombres=nombres,Apellidos=apellidos,Correo=correo,Horas=horas,Color=color WHERE id_Instructor=id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDoc` (IN `doc` VARCHAR(30))  BEGIN
    SELECT * FROM instructor WHERE Documento = doc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarInstructor` (IN `id_instructor` INT)  BEGIN
   DELETE FROM instructor WHERE id_Instructor = id_instructor;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `nombres` VARCHAR(80), IN `apellidos` VARCHAR(80), IN `correo` VARCHAR(120), IN `contrasena` VARCHAR(150))  BEGIN
    insert into usuario(Nombres,Apellidos,Correo,Contrasena) values(nombres,apellidos,correo,contrasena);
    END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertInstructor` (IN `nombres` VARCHAR(80), IN `apellidos` VARCHAR(80), IN `documento` VARCHAR(30), IN `correo` VARCHAR(120), IN `horas` INT(11), IN `color` VARCHAR(30))  BEGIN
    INSERT INTO instructor(Nombres,Apellidos,Documento,Correo,Horas,Color) 	VALUES(nombres,apellidos,documento,correo,horas,color);
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id_Ambiente` int(11) NOT NULL,
  `Nombre_Amb` varchar(20) DEFAULT NULL,
  `Descripcion_Amb` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id_Ambiente`, `Nombre_Amb`, `Descripcion_Amb`) VALUES
(1, 'hola3', 'hola'),
(3, 'nieqn', 'cnwieniewv-w'),
(5, 'Sistemas', 'Aula de estudio'),
(6, 'hqebfuoqe', 'nciweovwioev'),
(7, 'ciencias', 'estudio de animales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `competencia`
--

CREATE TABLE `competencia` (
  `id_Competencia` int(11) NOT NULL,
  `Nombre_Comp` varchar(50) NOT NULL,
  `Descripcion_Comp` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha`
--

CREATE TABLE `ficha` (
  `id_Ficha` int(11) NOT NULL,
  `Numero_Ficha` varchar(50) NOT NULL,
  `Nombre_Gestor` varchar(100) NOT NULL,
  `id_Programa` int(11) DEFAULT NULL,
  `id_Horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ficha`
--

INSERT INTO `ficha` (`id_Ficha`, `Numero_Ficha`, `Nombre_Gestor`, `id_Programa`, `id_Horario`) VALUES
(2, 'Estiben', '1835082', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `id_Horario` int(11) NOT NULL,
  `Hora` varchar(50) DEFAULT NULL,
  `Dia` varchar(50) DEFAULT NULL,
  `id_Trimestre` int(11) DEFAULT NULL,
  `id_Instructor` int(11) NOT NULL,
  `id_Ambiente` int(11) NOT NULL,
  `id_Competencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `id_Instructor` int(11) NOT NULL,
  `Nombres` varchar(80) DEFAULT NULL,
  `Apellidos` varchar(80) DEFAULT NULL,
  `Documento` varchar(30) DEFAULT NULL,
  `Correo` varchar(120) DEFAULT NULL,
  `Horas` int(11) DEFAULT NULL,
  `Color` varchar(30) DEFAULT NULL,
  `id_Usuario` int(11) DEFAULT NULL,
  `id_Contrato` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`id_Instructor`, `Nombres`, `Apellidos`, `Documento`, `Correo`, `Horas`, `Color`, `id_Usuario`, `id_Contrato`) VALUES
(48, 'Juan', 'Guevara', '123', 'juanpa2062@hotmail.com', 32, '#a2118e', NULL, NULL),
(51, 'Cindy Yurley', 'Piedrahita', '36589', 'carRo@misena.edu.co', 50, '#2dd769', NULL, NULL),
(54, 'edwin', 'alfonso', '1235698', 'carRo@misena.edu.co', 48, '#0c2ac0', NULL, NULL),
(56, 'Marlon', 'alfonso', '2589', 'catrujillo06@misena.edu.co', 48, '#c86f09', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa_formacion`
--

CREATE TABLE `programa_formacion` (
  `id_Programa` int(11) NOT NULL,
  `Nombre_Pro` varchar(50) DEFAULT NULL,
  `Descripcion_Pro` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_Rol` int(11) NOT NULL,
  `Nombre_Rol` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontrato`
--

CREATE TABLE `tipocontrato` (
  `id_Contrato` int(11) NOT NULL,
  `Descripcion_Cont` varchar(100) DEFAULT NULL,
  `Horas_Cont` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

CREATE TABLE `trimestre` (
  `id_Trimestre` int(11) NOT NULL,
  `Fecha_Inicio` date DEFAULT NULL,
  `Fecha_Fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trimestre`
--

INSERT INTO `trimestre` (`id_Trimestre`, `Fecha_Inicio`, `Fecha_Fin`) VALUES
(4, '2020-08-20', '2020-12-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_Usuario` int(11) NOT NULL,
  `Nombres` varchar(80) DEFAULT NULL,
  `Apellidos` varchar(80) DEFAULT NULL,
  `Correo` varchar(120) DEFAULT NULL,
  `Contrasena` varchar(150) DEFAULT NULL,
  `token` varchar(50) NOT NULL,
  `id_Horario` int(11) DEFAULT NULL,
  `id_Rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_Usuario`, `Nombres`, `Apellidos`, `Correo`, `Contrasena`, `token`, `id_Horario`, `id_Rol`) VALUES
(7, 'Poryecto Wem', 'Sena', 'proyectowemsena@gmail.com', '202cb962ac59075b964b07152d234b70', '5f381db8872cc', NULL, NULL),
(8, 'Juan', 'Guevara', 'juanpa2062@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id_Ambiente`);

--
-- Indices de la tabla `competencia`
--
ALTER TABLE `competencia`
  ADD PRIMARY KEY (`id_Competencia`);

--
-- Indices de la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD PRIMARY KEY (`id_Ficha`),
  ADD KEY `id_Programa` (`id_Programa`),
  ADD KEY `id_Horario` (`id_Horario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`id_Horario`),
  ADD KEY `id_Trimestre` (`id_Trimestre`),
  ADD KEY `id_Instructor` (`id_Instructor`),
  ADD KEY `id_Ambiente` (`id_Ambiente`),
  ADD KEY `id_Competencia` (`id_Competencia`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id_Instructor`),
  ADD KEY `id_Usuario` (`id_Usuario`),
  ADD KEY `id_Contrato` (`id_Contrato`);

--
-- Indices de la tabla `programa_formacion`
--
ALTER TABLE `programa_formacion`
  ADD PRIMARY KEY (`id_Programa`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_Rol`);

--
-- Indices de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  ADD PRIMARY KEY (`id_Contrato`);

--
-- Indices de la tabla `trimestre`
--
ALTER TABLE `trimestre`
  ADD PRIMARY KEY (`id_Trimestre`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_Usuario`),
  ADD KEY `id_Horario` (`id_Horario`),
  ADD KEY `id_Rol` (`id_Rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id_Ambiente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `competencia`
--
ALTER TABLE `competencia`
  MODIFY `id_Competencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha`
--
ALTER TABLE `ficha`
  MODIFY `id_Ficha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `id_Horario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id_Instructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `programa_formacion`
--
ALTER TABLE `programa_formacion`
  MODIFY `id_Programa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_Rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipocontrato`
--
ALTER TABLE `tipocontrato`
  MODIFY `id_Contrato` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trimestre`
--
ALTER TABLE `trimestre`
  MODIFY `id_Trimestre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ficha`
--
ALTER TABLE `ficha`
  ADD CONSTRAINT `ficha_ibfk_1` FOREIGN KEY (`id_Programa`) REFERENCES `programa_formacion` (`id_Programa`),
  ADD CONSTRAINT `ficha_ibfk_2` FOREIGN KEY (`id_Horario`) REFERENCES `horario` (`id_Horario`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_ibfk_1` FOREIGN KEY (`id_Trimestre`) REFERENCES `trimestre` (`id_Trimestre`),
  ADD CONSTRAINT `horario_ibfk_2` FOREIGN KEY (`id_Instructor`) REFERENCES `instructor` (`id_Instructor`),
  ADD CONSTRAINT `horario_ibfk_3` FOREIGN KEY (`id_Ambiente`) REFERENCES `ambiente` (`id_Ambiente`),
  ADD CONSTRAINT `horario_ibfk_4` FOREIGN KEY (`id_Competencia`) REFERENCES `competencia` (`id_Competencia`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id_Usuario`),
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`id_Contrato`) REFERENCES `tipocontrato` (`id_Contrato`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_Horario`) REFERENCES `horario` (`id_Horario`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_Rol`) REFERENCES `rol` (`id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
