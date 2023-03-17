-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-03-2023 a las 00:50:01
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgpf_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aprendiz`
--

CREATE TABLE `aprendiz` (
  `idAprendiz` int(11) NOT NULL,
  `idProgramaFormacion` int(11) NOT NULL,
  `nombreAprendiz` varchar(50) NOT NULL,
  `apellidoAprendiz` varchar(50) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` varchar(30) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `aprendiz`
--

INSERT INTO `aprendiz` (`idAprendiz`, `idProgramaFormacion`, `nombreAprendiz`, `apellidoAprendiz`, `tipoDocumento`, `numeroDocumento`, `estado`, `idUsuario`) VALUES
(1, 1, 'Juan Camilo', 'Ramírez', 'CC', '1279871', 'En formación', 4),
(2, 2, 'Natalia', 'Piña', 'CC', '6451323265', 'Cancelado', 5),
(3, 3, 'Jonathan', 'Gallego', 'CC', '453213.', 'Condicionado', 6),
(4, 4, 'Kevin', 'Cifuentes', 'TI', '513513', 'Traslado', 7),
(5, 1, 'Alan', 'Rendón', 'CC', '513161', 'Retirado', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fase`
--

CREATE TABLE `fase` (
  `idFase` int(11) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `competencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fase`
--

INSERT INTO `fase` (`idFase`, `nombre`, `competencia`) VALUES
(1, 'Planeación', 'Algoritmos'),
(2, 'Planeación', 'Lógica y programación'),
(3, 'Ejecución', 'Codificación de software'),
(4, 'Ejecución', 'Recursos materiales'),
(5, 'Ejecución', 'Física y medio ambiente'),
(6, 'Revisión', 'SST'),
(7, 'Cierre', 'Otras transversales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instructor`
--

CREATE TABLE `instructor` (
  `idInstructor` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `nombreInstructor` varchar(50) NOT NULL,
  `apellidoInstructor` varchar(50) NOT NULL,
  `tipoDocumento` varchar(10) NOT NULL,
  `numeroDocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instructor`
--

INSERT INTO `instructor` (`idInstructor`, `idUsuario`, `nombreInstructor`, `apellidoInstructor`, `tipoDocumento`, `numeroDocumento`) VALUES
(1, 2, 'Diego', 'López', 'CC', '526513321'),
(2, 3, 'Martha', 'Gómez', 'CC', '5165163351');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivosespecificos`
--

CREATE TABLE `objetivosespecificos` (
  `idObjetivosEspecificos` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `objetivo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `objetivosespecificos`
--

INSERT INTO `objetivosespecificos` (`idObjetivosEspecificos`, `idProyecto`, `objetivo`) VALUES
(1, 1, 'Construir algo'),
(2, 1, 'Que funcione'),
(3, 1, 'Porque se necesita'),
(4, 2, 'Otra cosa'),
(5, 2, 'que nos sirva'),
(6, 3, 'Para mostrar'),
(7, 3, 'Que la BD funcione'),
(8, 4, 'De manera correcta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participantes`
--

CREATE TABLE `participantes` (
  `idProyecto` int(11) NOT NULL,
  `idAprendiz` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participantes`
--

INSERT INTO `participantes` (`idProyecto`, `idAprendiz`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(4, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaformacion`
--

CREATE TABLE `programaformacion` (
  `idProgramaFormacion` int(11) NOT NULL,
  `nombrePrograma` varchar(50) NOT NULL,
  `ficha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `programaformacion`
--

INSERT INTO `programaformacion` (`idProgramaFormacion`, `nombrePrograma`, `ficha`) VALUES
(1, 'Técnica en programación de software', 293671),
(2, 'Técnica en logística', 3542152),
(3, 'Técnología en Análisis de software', 16132),
(4, 'Técnología en recursos mineros', 8465365);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `nombreProyecto` varchar(80) NOT NULL,
  `objetivoGeneral` varchar(255) NOT NULL,
  `estado` varchar(15) NOT NULL,
  `planteamientoProblema` text NOT NULL,
  `justificacion` text NOT NULL,
  `funcionalidades` text NOT NULL,
  `alcances` text NOT NULL,
  `archivo` varchar(255) NOT NULL,
  `cliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `nombreProyecto`, `objetivoGeneral`, `estado`, `planteamientoProblema`, `justificacion`, `funcionalidades`, `alcances`, `archivo`, `cliente`) VALUES
(1, 'Desarrollo de app', 'Crear una app móvil', 'Aprobado', 'Se necesita la App', 'No hay App', 'Tres pantallas funcionales', 'Que funcione', 'No hay', 'SENA'),
(2, 'Construcción de algo', 'Funcionando', 'Reprobado', 'No hay', 'Crearla', 'La construcción', 'Creación', 'archivo.docx', 'Noel'),
(3, 'Algún proceso', 'Que no existe', 'Aprobado', 'Y que sirva', 'Para lo que se necesita', 'Aún en proceso', 'Terminar', 'aqui.com', 'Empresa'),
(4, 'Computación', 'Organizar', 'Por ajustar', 'Necesario', 'Para mantenimiento', 'Mejor 3 equipos', 'De color blanco', 'blanco.pdf', 'Crear');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_instructor`
--

CREATE TABLE `proyecto_instructor` (
  `idProyecto` int(11) NOT NULL,
  `idInstructor` int(11) NOT NULL,
  `idFase` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto_instructor`
--

INSERT INTO `proyecto_instructor` (`idProyecto`, `idInstructor`, `idFase`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 5),
(4, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `codigo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`, `codigo`) VALUES
(1, 'Administrador', '1'),
(2, 'Instructor', '2'),
(3, 'Aprendiz', '3'),
(4, 'Invitado', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contrasena` varchar(45) NOT NULL,
  `estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idRol`, `usuario`, `contrasena`, `estado`) VALUES
(1, 1, 'Admon', 'qo74glbl', 'Activo'),
(2, 2, 'Profe', '435bhl', 'Activo'),
(3, 2, 'Teacher', 'l35kbli3', 'Inactivo'),
(4, 3, 'Estud', '87igl45', 'Activo'),
(5, 3, 'Nata', '7p3gilb', 'Activo'),
(6, 3, 'John', '674ujb', 'Activo'),
(7, 3, 'Nuevo', '65312.', 'Inactivo'),
(8, 3, 'comoquesi', 'lbhabhñg', 'Activo'),
(9, 4, 'Invitado', '824pib', 'Inactivo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD PRIMARY KEY (`idAprendiz`,`idProgramaFormacion`,`idUsuario`),
  ADD KEY `fk_aprendiz_usuario1_idx` (`idUsuario`),
  ADD KEY `fk_aprendiz_programaFormacion1_idx` (`idProgramaFormacion`);

--
-- Indices de la tabla `fase`
--
ALTER TABLE `fase`
  ADD PRIMARY KEY (`idFase`);

--
-- Indices de la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`idInstructor`,`idUsuario`),
  ADD KEY `fk_instructor_usuario1_idx` (`idUsuario`);

--
-- Indices de la tabla `objetivosespecificos`
--
ALTER TABLE `objetivosespecificos`
  ADD PRIMARY KEY (`idObjetivosEspecificos`,`idProyecto`),
  ADD KEY `fk_objetivosEspecificos_fichaProyecto1_idx` (`idProyecto`);

--
-- Indices de la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD PRIMARY KEY (`idProyecto`,`idAprendiz`),
  ADD KEY `fk_aprendiz_has_fichaProyecto_fichaProyecto1_idx` (`idProyecto`),
  ADD KEY `fk_aprendiz_has_fichaProyecto_aprendiz1_idx` (`idAprendiz`);

--
-- Indices de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  ADD PRIMARY KEY (`idProgramaFormacion`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`);

--
-- Indices de la tabla `proyecto_instructor`
--
ALTER TABLE `proyecto_instructor`
  ADD PRIMARY KEY (`idProyecto`,`idInstructor`,`idFase`),
  ADD KEY `fk_instructor_has_fichaProyecto_fichaProyecto1_idx` (`idProyecto`),
  ADD KEY `fk_instructor_has_fichaProyecto_instructor1_idx` (`idInstructor`),
  ADD KEY `fk_fichaProyectoInstructor_fase1_idx` (`idFase`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`,`idRol`),
  ADD KEY `fk_usuario_rol_idx` (`idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  MODIFY `idAprendiz` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `fase`
--
ALTER TABLE `fase`
  MODIFY `idFase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `instructor`
--
ALTER TABLE `instructor`
  MODIFY `idInstructor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `objetivosespecificos`
--
ALTER TABLE `objetivosespecificos`
  MODIFY `idObjetivosEspecificos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `programaformacion`
--
ALTER TABLE `programaformacion`
  MODIFY `idProgramaFormacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aprendiz`
--
ALTER TABLE `aprendiz`
  ADD CONSTRAINT `fk_aprendiz_programaFormacion1` FOREIGN KEY (`idProgramaFormacion`) REFERENCES `programaformacion` (`idProgramaFormacion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aprendiz_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `instructor`
--
ALTER TABLE `instructor`
  ADD CONSTRAINT `fk_instructor_usuario1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `objetivosespecificos`
--
ALTER TABLE `objetivosespecificos`
  ADD CONSTRAINT `fk_objetivosEspecificos_fichaProyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `participantes`
--
ALTER TABLE `participantes`
  ADD CONSTRAINT `fk_aprendiz_has_fichaProyecto_aprendiz1` FOREIGN KEY (`idAprendiz`) REFERENCES `aprendiz` (`idAprendiz`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aprendiz_has_fichaProyecto_fichaProyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto_instructor`
--
ALTER TABLE `proyecto_instructor`
  ADD CONSTRAINT `fk_fichaProyectoInstructor_fase1` FOREIGN KEY (`idFase`) REFERENCES `fase` (`idFase`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instructor_has_fichaProyecto_fichaProyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_instructor_has_fichaProyecto_instructor1` FOREIGN KEY (`idInstructor`) REFERENCES `instructor` (`idInstructor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
