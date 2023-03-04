CREATE DATABASE SGPF ;

USE SGPF;

CREATE TABLE fichaProyecto (
    idFichaProyecto INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    idObjetivosEspecificos INT,
    idProgramaFormacion INT,
    nombreProyecto VARCHAR(80) NOT NULL,
    objetivoProyecto Varchar(150) NOT NULL,
    plantamientoProblema TEXT NOT NULL,
    justificacion TEXT NOT NULL,
    funcionalidadesProyecto TEXT NOT NULL,
    alcance TEXT NOT NULL,
    archivoProyecto VARCHAR(200) NOT NULL,
    nombreCliente VARCHAR(50) NOT NULL
);

CREATE TABLE instructor (
    idInstructor INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT,
    nombreInstructor VARCHAR(50) NOT NULL,
    apellidoInstructor VARCHAR(50) NOT NULL,
    tipoDocumento VARCHAR(10) NOT NULL,
    numeroDocumento VARCHAR(30) NOT NULL
);

CREATE TABLE aprendiz(
    idAprendiz INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    idUsuario INT,
    nombreAprendiz VARCHAR(50) NOT NULL,
    apellidoAprendiz VARCHAR(50) NOT NULL,
    tipoDocumento VARCHAR(10) NOT NULL,
    numeroDocumento VARCHAR(30) NOT NULL
);

CREATE TABLE usuario (
    idUsuario INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    idRol INT,
    usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL,
);

CREATE TABLE rol(
    idRol INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    nombreRol VARCHAR(50) NOT NULL,
    codigo VARCHAR(50)
);

CREATE TABLE objetivosEspecificos(
    idObjetivosEspecificos INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    objetivo VARCHAR(50) NOT NULL,
    descripcion TEXT NOT NULL
);

CREATE TABLE programaFormacion (
idProgramaFormacion INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
ficha INT NOT NULL,
nombrePrograma VARCHAR(50)
);

CREATE TABLE fase(
    idFase INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    nombre VARCHAR(10) NOT NULL,
    competencia VARCHAR(50) NOT NULL
);

