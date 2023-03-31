<?php
session_start();
include 'server/conexion.php';
if (isset($_GET['idProyecto'])) {
    $idProyecto = $_GET['idProyecto'];
    $query = "SELECT proyecto.idProyecto,  proyecto.nombreProyecto, proyecto.cliente,
    programaformacion.nombrePrograma AS programaFormacion,proyecto.planteamientoProblema,
    proyecto.justificacion,proyecto.funcionalidades,proyecto.objetivoGeneral,
    proyecto.alcances,proyecto.archivo,proyecto.estado
    FROM proyecto
    INNER JOIN programaformacion ON proyecto.idProgramaFormacion = programaformacion.idProgramaFormacion
    WHERE proyecto.idProyecto = $idProyecto;";
    $result = mysqli_query($conn,$query);
    $filas = mysqli_num_rows($result);

    if($filas == 1) {
        $filaProyecto = mysqli_fetch_array($result);
        $nombreProyecto=  $filaProyecto['nombreProyecto'];
        $cliente =  $filaProyecto['cliente'];
        $programaFormacion =  $filaProyecto['programaFormacion'];
        $planteamientoProblema =  $filaProyecto['planteamientoProblema'];
        $justificacion =   $filaProyecto['justificacion'];
        $objetivoGeneral =  $filaProyecto['objetivoGeneral'];
        $funcionalidades =   $filaProyecto['funcionalidades'];
        $alcance =   $filaProyecto['alcances'];
        $estado =  $filaProyecto['estado'];
    }
}
if (isset($_POST['actualizar'])) {
    $idProyecto = $_GET['idProyecto'];
    $nombreProyecto= $_POST['nombreProyecto'];
    $cliente = $_POST['cliente'];
    $programaFormacion = $_POST['programaFormacion'];
    $planteamientoProblema = $_POST['planteamientoProblema'];
    $justificacion = $_POST['justificacion'];
    $objetivoGeneral = $_POST['objetivoGeneral'];
    $funcionalidades = $_POST['funcionalidades'];
    $alcance = $_POST['alcance'];
    $estado = $_POST['estado'];
    $queryProyecto = "UPDATE proyecto set  nombreProyecto = '$nombreProyecto',
    cliente = '$cliente',programaFormacion = '$programaFormacion',planteamientoProblema = '$planteamientoProblema',
    justificacion = '$justificacion', objetivoGeneral = '$objetivoGeneral', funcionalidades = '$funcionalidades',
    alcances = '$alcance',estado = '$estado' WHERE idProyecto = $idProyecto ";
    
    mysqli_query($conn,$queryProyecto);   }
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Hojas de estilo -->
        <link rel="stylesheet" href="./css/aprendices.css">
        <link rel="stylesheet" href="./css/normalize.css">
        

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
            rel="stylesheet">
        <title>Editar Aprendices</title>
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
            <h2 class="title-form">Editar Datos Proyecto</h2>
            <form action='proyectoEditar.php?idProyecto=<?php echo $_GET ['idProyecto']; ?>' method = "POST" class="form-nuevo-proyecto">
                <label for="nombre">Nombre:</label>
                <input class="input" type="text" name="nombreProyecto" value="<?php echo $nombreProyecto;?>" placeholder = "Ingrese Nombre" id="" disabled/>

                <label for="cliente">Cliente:</label>
                <input class="input" type="text" name="cliente" value="<?php echo $cliente;?> " placeholder="Ingrese Cliente" id="" disabled />

                <label for="pro">Programa formación:</label>
                <input class="input" type="text" name="programaFormacion" value="<?php echo $programaFormacion;?>" placeholder="Ingrese Programa formación" id="" list='programaformacion'  disabled/>
                <datalist id="programaformacion" required>
                    <?php while ($filasPrograma) { ?>
                <option value="<?php echo $filasPrograma['programa'] ?>"></option>
                <?php   
                    $filasPrograma = mysqli_fetch_assoc($resultadoQueryPrograma);
                    } ?>
                </datalist>   
                <label for="plant">Planteamiento proyecto:</label>
                <input class="input" type="text" name="planteamientoProblema" value="<?php echo $planteamientoProblema;?>" placeholder="Ingrese el planteamiento del proyecto"
                    id="" />

                <label for="justificacion">Justificacion:</label>
                <textarea name="justificacion" value="<?php echo $justificacion;?>" id="justificacion" disabled cols="20" rows="3"
                    placeholder="Ingrese la justificacion del proyecto"><?php echo $justificacion;?></textarea>

                <label for="obj-general">Objetivo general:</label>
                <textarea name="objetivoGeneral" value="<?php echo $objetivoGeneral;?>" id="obj-general" disabled cols="20" rows="3"
                    placeholder="Ingrese el objetivo general del proyecto"><?php echo $objetivoGeneral;?></textarea>

                <label for="funcion">Funcion:</label>
                <textarea name="funcionalidades" value="<?php echo $funcionalidades;?>" id="funcion" disabled cols="20" rows="3"
                    placeholder="Ingrese la función del proyecto"><?php echo $funcionalidades;?></textarea>

                <label for="Alcance">Alcance del proyecto:</label>
                <input class="input" type="text" name="alcance" value="<?php echo $alcance;?>" placeholder="Ingrese el alcance del proyecto" disabled />

                <label for="estado">Estado:</label>
                <select name="estado" id="estado">
                    <option value="<?php echo $estado;?>" selected disabled><?php echo $estado;?></option>
                    <option value="aprobado">Aprobado</option>
                    <option value="reprobado">Reprobado</option>
                    <option value="ajustar">Por ajustar</option>
                </select>

                <div class="btns-container">
                    <a href="./proyectoTabla.php"><button type="button" class="btn-detalle input-submit-registrar-1">Regresar</button></a>
                </div>
            </form>
        </div>
    </main>
        <script src="./js/script.js"></script>
    </body>

    </html>