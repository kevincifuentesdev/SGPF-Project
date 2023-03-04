CREATE DATABASE Proyecto ;

USE Proyecto;

CREATE TABLE fichaProyecto (
    idFichaProyecto INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    idobjetivosEspecificos INT,
    idProgramaFormacion INT,
    nombreProyecto VARCHAR(50) NOT NULL,
    objetivoProyecto Varchar(50) NOT NULL,
    plantamientoProblema VARCHAR(200) NOT NULL,
    Justificacion VARCHAR(200) NOT NULL,
    funcionalidadesProyecto VARCHAR(200) NOT NULL,
    alcance VARCHAR(50) NOT NULL,
    linkProyecto VARCHAR(200) NOT NULL,
    nombreCliente VARCHAR(50) NOT NULL
);

CREATE TABLE objetivosEspecificos(
    idobjetivosEspecificos INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    objetivo VARCHAR(50) NOT NULL,
    descripcion VARCHAR(50) NOT NULL
);

CREATE TABLE programaFormacion (
idProgramaFormacion INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
ficha INT NOT NULL,
nombrePrograma VARCHAR(50)
);

CREATE TABLE rol(
    idRol INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    nombreRol VARCHAR(50) NOT NULL,
    codigo VARCHAR(50)
);

CREATE TABLE usuario (
    idUsuario INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    idRol INT,
    usuario VARCHAR(50) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL,
);

CREATE TABLE instructor (
    idInstructor INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    idUsuario INT,
    nombreInstructor VARCHAR(50) NOT NULL,
    apellidoInstructor VARCHAR(50) NOT NULL,
    tipoDocumento VARCHAR(50) NOT NULL,
    numeroDocumento VARCHAR(50) NOT NULL
);

CREATE TABLE aprendiz(
    idAprendiz INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    idUsuario INT,
    nombreAprendiz VARCHAR(50) NOT NULL,
    apellidoAprendiz VARCHAR(50) NOT NULL,
    tipoDocumento VARCHAR(50) NOT NULL,
    numeroDocumento VARCHAR(50) NOT NULL
);

CREATE TABLE fichaProyectoInstructor(
    idFichaProyecto INT,
    idInstructor INT,
    idFase INT
);

CREATE TABLE fichaProyectoAprendiz(
    idFichaProyecto INT,
    idAprendiz INT,
    idFase INT
);

CREATE TABLE fase(
    idFase INT NOT NULL IDENTITY(1,1) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    competencia VARCHAR(50) NOT NULL
);

#Agregar una clave foránea 


ALTER TABLE fichaProyecto
ADD FOREIGN KEY (idobjetivosEspecificos)
REFERENCES objetivosEspecificos (idobjetivosEspecificos)

ALTER TABLE fichaProyecto
ADD FOREIGN KEY(idProgramaFormacion)
REFERENCES programaFormacion(idProgramaFormacion)

ALTER TABLE fichaProyectoInstructor
ADD FOREIGN KEY (idFichaProyecto)
REFERENCES fichaProyecto(idFichaProyecto)

ALTER TABLE fichaProyectoInstructor
ADD FOREIGN KEY (idInstructor)
REFERENCES instructor(idInstructor)

ALTER TABLE fichaProyectoInstructor
ADD FOREIGN KEY (idFase)
REFERENCES fase(idFase)

ALTER TABLE fichaProyectoAprendiz
ADD FOREIGN KEY (idAprendiz)
REFERENCES aprendiz(idAprendiz)

ALTER TABLE usuario
ADD FOREIGN KEY (idRol)
REFERENCES rol(idRol)

ALTER TABLE instructor
ADD FOREIGN KEY (idUsuario)
REFERENCES usuario(idUsuario)

ALTER TABLE aprendiz
ADD FOREIGN KEY (idUsuario)
REFERENCES usuario(idUsuario)

