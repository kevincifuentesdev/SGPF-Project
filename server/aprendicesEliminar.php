

<?php
    session_start();
    require 'conexion.php';


    if(isset($_GET['idAprendiz'])){
        $id = $_GET['idAprendiz'];
        $query= "DELETE FROM aprendiz WHERE idAprendiz = $id";
        $resultado = mysqli_query($conn, $query);
        if (!$resultado){
            die("query falló");
        }

        echo "<script>alert('Se eliminó exitosamente');window.location ='aprendicesTabla.php'</script>";
        // header("location: aprendicesTabla.php");
    }
?>