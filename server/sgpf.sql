-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 11-03-2023 a las 02:45:55
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
  `idProgramaFormacion` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
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

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`idFase`, `nombre`, `competencia`) VALUES
(1, 'Inicio', 'Codificacion'),
(2, 'Desarrollo', 'testing'),
(3, 'Revision', 'movil');

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

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`idInstructor`, `idUsuario`, `nombreInstructor`, `apellidoInstructor`, `tipoDocumento`, `numeroDocumento`, `idFase`) VALUES
(1, 1, 'Carlos', 'Gomez', 'CC', '123456789', 1),
(2, 1, 'Marta', 'Velez', 'CC', '1345678291', 2),
(3, 1, 'Diego', 'Lopez', 'CC', '34456272992', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivosespecificos`
--

CREATE TABLE `objetivosespecificos` (
  `idObjetivosEspecificos` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
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

INSERT INTO `programaformacion` (`idProgramaFormacion`, `ficha`, `nombrePrograma`) VALUES
(1, 2559216, 'Tecnico de Desarrollo de Software'),
(2, 2559217, 'Tecnico Administracion'),
(3, 2559218, 'Tecnico ayencion al cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(80) NOT NULL,
  `objetivoGeneral` varchar(150) NOT NULL,
  `plantamientoProblema` text NOT NULL,
  `justificacion` text NOT NULL,
  `funcionalidades` text NOT NULL,
  `alcance` text NOT NULL,
  `archivo` varchar(200) NOT NULL,
  `cliente` varchar(50) NOT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `idInstructor` int(11) NOT NULL,
  `idAprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(50) NOT NULL,
  `codigo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`, `codigo`) VALUES
(1, 'Administrador', '001'),
(2, 'Instructor', '002'),
(3, 'Aprendiz', '003');

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

INSERT INTO `usuario` (`idUsuario`, `idRol`, `usuario`, `contraseña`, `estado`) VALUES
(1, 1, 'kevin1', '123', 'Activo'),
(2, 1, 'leidy2', '456', 'Activo'),
(3, 1, 'elvis3', '789', 'Activo');

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
  ADD PRIMARY KEY (`idObjetivosEspecificos`),
  ADD KEY `proyecto` (`idProyecto`);

--
-- Indices de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD PRIMARY KEY (`idProgramaFormacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `idAprendiz` (`idAprendiz`),
  ADD KEY `idInstructor` (`idInstructor`);

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
  MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`idAprendiz`) REFERENCES `aprendiz` (`idAprendiz`),
  ADD CONSTRAINT `proyecto_ibfk_3` FOREIGN KEY (`idInstructor`) REFERENCES `instructor` (`idInstructor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
