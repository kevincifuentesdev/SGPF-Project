-- SCRIPT GENERADO POR PHP MY ADMIN AL EXPORTAR TODA LA BASE DE DATOS DESARROLLADA
--
--
--
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-03-2023 a las 00:09:33
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
-- Base de datos: `sgpf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `idAprendiz` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nombreAprendiz` varchar(50) NOT NULL,
  `apellidoAprendiz` varchar(50) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` varchar(30) NOT NULL,
  `idProgramaFormacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `idFase` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `competencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichaproyecto`
--

CREATE TABLE `fichaproyecto` (
  `idFichaProyecto` int(11) NOT NULL,
  `idObjetivosEspecificos` int(11) DEFAULT NULL,
  `nombreProyecto` varchar(80) NOT NULL,
  `objetivoProyecto` varchar(150) NOT NULL,
  `plantamientoProblema` text NOT NULL,
  `justificacion` text NOT NULL,
  `funcionalidadesProyecto` text NOT NULL,
  `alcance` text NOT NULL,
  `archivoProyecto` varchar(200) NOT NULL,
  `nombreCliente` varchar(50) NOT NULL,
  `idInstructor` int(11) NOT NULL,
  `idAprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `idInstructor` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `nombreInstructor` varchar(50) NOT NULL,
  `apellidoInstructor` varchar(50) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` varchar(30) NOT NULL,
  `idFase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivosespecificos`
--

CREATE TABLE `objetivosespecificos` (
  `idObjetivosEspecificos` int(11) NOT NULL,
  `objetivo` varchar(50) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaformacion`
--

CREATE TABLE `programaformacion` (
  `idProgramaFormacion` int(11) NOT NULL,
  `ficha` int(11) NOT NULL,
  `nombrePrograma` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `programaformacion`
--

-- INSERT INTO `programaformacion` (`idProgramaFormacion`, `ficha`, `nombrePrograma`) VALUES
-- (1, 2559216, 'Tecnico de Desarrollo de Software'),
-- (2, 2559217, 'Tecnico Administracion'),
-- (3, 2559218, 'Tecnico ayencion al cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(50) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

-- INSERT INTO `rol` (`idRol`, `nombreRol`, `codigo`) VALUES
-- (1, 'Administrador', '001'),
-- (2, 'Instructor', '002'),
-- (3, 'Aprendiz', '003');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

-- INSERT INTO `usuario` (`idUsuario`, `idRol`, `usuario`, `contraseña`, `estado`) VALUES
-- (1, 3, 'kevin1', '123', 'Activo'),
-- (2, 3, 'leidy2', '456', 'Activo'),
-- (3, 3, 'elvis3', '789', 'Activo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`idAprendiz`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idProgramaFormacion` (`idProgramaFormacion`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`idFase`);

--
-- Indices de la tabla `fichaproyecto`
--
ALTER TABLE `fichaproyecto`
  ADD PRIMARY KEY (`idFichaProyecto`),
  ADD KEY `idObjetivosEspecificos` (`idObjetivosEspecificos`),
  ADD KEY `idAprendiz` (`idAprendiz`),
  ADD KEY `idInstructor` (`idInstructor`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`idInstructor`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idFase` (`idFase`);

--
-- Indices de la tabla `objetivosespecificos`
--
ALTER TABLE `objetivosespecificos`
  ADD PRIMARY KEY (`idObjetivosEspecificos`);

--
-- Indices de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD PRIMARY KEY (`idProgramaFormacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `idAprendiz` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `fichaproyecto`
--
ALTER TABLE `fichaproyecto`
  MODIFY `idFichaProyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `objetivosespecificos`
--
ALTER TABLE `objetivosespecificos`
  MODIFY `idObjetivosEspecificos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  MODIFY `idProgramaFormacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `aprendiz_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `aprendiz_ibfk_2` FOREIGN KEY (`idProgramaFormacion`) REFERENCES `programaformacion` (`idProgramaFormacion`);

--
-- Filtros para la tabla `fichaproyecto`
--
ALTER TABLE `fichaproyecto`
  ADD CONSTRAINT `fichaproyecto_ibfk_1` FOREIGN KEY (`idObjetivosEspecificos`) REFERENCES `objetivosespecificos` (`idObjetivosEspecificos`),
  ADD CONSTRAINT `fichaproyecto_ibfk_3` FOREIGN KEY (`idAprendiz`) REFERENCES `aprendiz` (`idAprendiz`),
  ADD CONSTRAINT `fichaproyecto_ibfk_4` FOREIGN KEY (`idInstructor`) REFERENCES `instructor` (`idInstructor`);

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `instructor_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `instructor_ibfk_2` FOREIGN KEY (`idFase`) REFERENCES `fase` (`idFase`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
