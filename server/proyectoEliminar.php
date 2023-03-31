<?php
session_start();
include("conexion.php");
if (isset($_GET['idProyecto'])) {
    $idProyecto = $_GET['idProyecto'];
    // Eliminar registros de la tabla objetivosEspecificos que dependen del proyecto
    $query = "DELETE FROM objetivosEspecificos WHERE idProyecto = $idProyecto";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Error al eliminar objetivos específicos relacionados con el proyecto");
    }
    // Eliminar registros de la tabla participantes que depende del proyecto
    $query = "DELETE FROM participantes WHERE idProyecto = $idProyecto";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Error al eliminar registros relacionados con el proyecto");
    }

    //Eliminar registros de la tabla proyecto_instructor 
    $query = "DELETE FROM proyecto_instructor WHERE idProyecto = $idProyecto";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        die("Error al eliminar registros relacionados con el proyecto");
    }

    // Finalmente, eliminar la fila del proyecto
    $query = "DELETE FROM proyecto WHERE idProyecto = $idProyecto";
    $resultado = mysqli_query($conn, $query);
    if (!$resultado) {
        echo"<script>alert('Hubo un error , intente de nuevo');window.location = '../proyectoTabla.php'</script>";
    }else{
        echo"<script>alert('Se ha eliminado exitosamente');window.location = '../proyectoTabla.php'</script>";
    }
}


?>

<!-- 
DELETE FROM participantes WHERE idproyecto = ?
DELETE FROM proyecto_instructor WHERE idproyecto = ?
DELETE FROM proyecto WHERE idproyecto = ? -->
