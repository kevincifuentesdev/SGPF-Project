<?php
session_start();
include 'server/conexion.php';
if (isset($_POST['Registrar'])){
    $nombreProyecto = $_POST['nombreProyecto'];
    $cliente = $_POST['cliente'];
    $programa = $_POST['programaformacion'];
    $planteamiento = $_POST['planteamientoProblema'];
    $justificacion = $_POST['justificacion'];
    $objetivoGeneral = $_POST['objetivoGeneral'];
    $funcionalidades = $_POST['funcionalidades'];
    $alcance = $_POST['alcances'];
    $estado = $_POST['estado'];
    $archivo = $_POST['archivo'];

    $sql = "SELECT * FROM proyecto WHERE nombreProyecto = '$nombreProyecto'";
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) > 0) {
        // Mostrar mensaje de error si el proyecto y la ficha ya existen
        if (mysqli_num_rows($result) > 0) {
            // Mostrar mensaje de error si el proyecto y la ficha ya existen
            echo "<script>alert(\"El proyecto '$nombreProyecto' ya existe en la base de datos\");window.location = 'proyectoAgregar.php'</script>";
        }
        
    } else {
        $queryIdProgramaFormacion = "SELECT programaformacion.idProgramaFormacion FROM programaformacion
        WHERE CONCAT(ficha, ' - ', nombrePrograma) = '$programa';";

        $resultadoqueryIdProgramaFormacion = mysqli_query($conn, $queryIdProgramaFormacion);
        $filasProgramaFormacion = mysqli_fetch_assoc($resultadoqueryIdProgramaFormacion);
        $idProgramaFormacion = $filasProgramaFormacion['idProgramaFormacion'];
        
        $queryInsertProyecto = "INSERT INTO proyecto (idProgramaFormacion,nombreProyecto, objetivoGeneral,  
            estado,planteamientoProblema,justificacion,funcionalidades,alcances,archivo,cliente) 
            VALUES('$idProgramaFormacion','$nombreProyecto','$objetivoGeneral','$estado','$planteamiento','$justificacion',
            '$funcionalidades','$alcance','$archivo','$cliente')";

        $resultadoInsertProyecto = mysqli_query($conn, $queryInsertProyecto);

        if (!$resultadoInsertProyecto) {
            echo "<script>alert('Error al agregar el proyecto');window.location = 'proyectoAgregar.php'</script>";
        } else {
            echo "<script>alert('Se ha agregado un nuevo proyecto con éxito');window.location = 'objetivoFormulario.php'</script>";
        }
    }
}

    $queryPrograma = "SELECT CONCAT(ficha, ' - ', nombrePrograma) AS programa FROM programaFormacion";
    $resultadoQueryPrograma = mysqli_query($conn, $queryPrograma);
    $filasPrograma = mysqli_fetch_assoc($resultadoQueryPrograma);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./css/proyecto.css" />
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Formulario Ficha Proyecto</title>
</head>

<body>
    <header>
        <div class="logo-titulo">
            <img src="./img/icons/Logo-de-SENA-png-verde.png" alt="logo_sena" width="80" height="80">
            <hr>
            <h2>Sistema de gestión de<br> proyectos formativos SENA</h2>
        </div>
        <div class="iconoHamburguesa menu" id="menu">
            <img src="./img/icons/hamburguesa.png" alt="logo_sena" width="30" height="30">
        </div>
    </header>
    <nav id="navega">
        <ul>
            <li><a href="">Aprendiz</a></li>
            <li><a href="">Participantes</a></li>
            <li><a href="">Ficha proyecto</a></li>
            <li><a href="">Fases</a></li>
            <li><a href="">Instructor</a></li>
            <li><a href="">Fases Instructor</a></li>
        </ul>
    </nav>
    <main>
        <div class="form-container">
            <h2 class="title-form">Nuevo Proyecto</h2>
            <form action="proyectoAgregar.php" class="form-nuevo-proyecto" method="POST">
                <label for="nombre">Nombre:</label>
                <input class="input" type="text" name="nombreProyecto" placeholder="Ingrese Nombre" id="" required/>

                <label for="cliente">Cliente:</label>
                <input class="input" type="text" name="cliente" placeholder="Ingrese Cliente" id=""required />

                <label for="pro">Programa formación:</label>
                <datalist id="programaformacion" required>
                    <?php while ($filasPrograma) { ?>
                <option value="<?php echo $filasPrograma['programa'] ?>"></option>
                <?php   
                    $filasPrograma = mysqli_fetch_assoc($resultadoQueryPrograma);
                    } ?>
                </datalist>
                <input class="input" type="text" name="programaformacion" placeholder="Ingrese Programa formación" id="" list="programaformacion" required/>
                <label for="plant">Planteamiento proyecto:</label>

                <input class="input" type="text" name="planteamientoProblema" placeholder="Ingrese el planteamiento del proyecto"
                id=""required />

                <label for="justificacion">Justificacion:</label>
                <textarea name="justificacion" id="justificacion" cols="20" rows="3"
                    placeholder="Ingrese la justificacion del proyecto" required></textarea>

                <label for="obj-general">Objetivo general:</label>
                <textarea name="objetivoGeneral" id="obj-general" cols="20" rows="3"
                    placeholder="Ingrese el objetivo general del proyecto" required></textarea>

                <a href="./objetivoFormulario.php">
                    <h4>Crear Objetivos</h4>
                </a>

                <label for="funcion">Funcion:</label>
                <textarea name="funcionalidades" id="funcion" cols="20" rows="3"
                    placeholder="Ingrese la función del proyecto" required></textarea>

                <label for="Alcance">Alcance del proyecto:</label>
                <input class="input" type="text" name="alcances" placeholder="Ingrese el alcance del proyecto" required />

                <label for="archivo">Archivo:</label>
                <input class="input" type="text" name="archivo" required/>

                <label for="estado">Estado:</label>
                <select name="estado" id="estado" required>
                    <option value="aprobado">Aprobado</option>
                    <option value="reprobado">Reprobado</option>
                    <option value="ajustar">Por ajustar</option>
                </select>

                <div class="btns-container">
                    <input class="input-submit-registrar" type="submit" value="Registrar" name="Registrar" />
                    <input class="input-submit-limpiar" type="submit" value="Limpiar" name="Registrar" />
                </div>
            </form>
        </div>
    </main>
    <script src="./js/script.js"></script></body>

</html>