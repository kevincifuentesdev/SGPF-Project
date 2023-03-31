<?php
include './server/conexion.php';

$queryAprendices = "SELECT CONCAT(aprendiz.numeroDocumento, ' - ', aprendiz.nombreAprendiz, ' ', aprendiz.apellidoAprendiz) AS aprendiz FROM aprendiz;";
$resultAprendices = mysqli_query($conn, $queryAprendices);

$queryProyectos = "SELECT proyecto.nombreProyecto AS proyecto FROM proyecto;";
$resultProyectos = mysqli_query($conn, $queryProyectos);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./css/participantes.css" />
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Formulario Participantes</title>
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
            <li><a href="./aprendicesTabla.php">Aprendiz</a></li>
            <li><a href="./participantesTabla.php">Participantes</a></li>
            <li><a href="./proyectoTabla.php">Ficha proyecto</a></li>
            <li><a href="./faseTabla.php">Fases</a></li>
            <li><a href="./instructoresTabla.php">Instructor</a></li>
            <li><a href="./faseInstructorTabla.php">Fases Instructor</a></li>
        </ul>
    </nav>
    <main>
        <div class="form-container">
            <h2 class="title-form">Nuevo Participante</h2>
            <form action="./participantesAgregar.php" method="POST" class="form-nuevo-proyecto">
                <label for="aprendiz">Aprendiz:</label>
                <input list="aprendiz" class="input" placeholder="Ingrese el aprendiz">
                <datalist name="aprendiz" id="aprendiz">
                    <?php
                    $listAprendices = mysqli_fetch_assoc($resultAprendices);
                    while ($listAprendices) {
                        ?>
                        <option value="<?php echo $listAprendices['aprendiz'] ?>"></option>
                        <?php
                        $listAprendices = mysqli_fetch_assoc($resultAprendices);
                    }
                    ?>
                </datalist>
                <label for="proyecto">Proyecto:</label>
                <input list="proyecto" class="input" placeholder="Ingrese el proyecto">
                <datalist name="proyecto" id="proyecto">
                    <?php
                    $listProyectos = mysqli_fetch_assoc($resultProyectos);
                    while ($listProyectos) {
                        ?>
                        <option value="<?php echo $listProyectos['proyecto'] ?>"></option>
                        <?php
                        $listProyectos = mysqli_fetch_assoc($resultProyectos);
                    }
                    ?>
                </datalist>

                <div class="btns-container">
                    <input class="input-submit-registrar" type="submit" value="Registrar" />
                    <input class="input-submit-limpiar" type="reset" value="Limpiar" />
                </div>
            </form>
        </div>
    </main>
    <script src="./js/script.js"></script>
</body>

</html>

<?php
$aprendiz = $_POST['aprendiz'];
$proyecto = $_POST['proyecto'];

$queryIdAprendiz = "SELECT idAprendiz FROM aprendiz WHERE CONCAT(aprendiz.numeroDocumento, ' - ', aprendiz.nombreAprendiz, ' ', aprendiz.apellidoAprendiz) = '$aprendiz';";
$resultIdAprendiz = mysqli_query($conn, $queryIdAprendiz);
$idAprendizA = mysqli_fetch_assoc($resultIdAprendiz);
$idAprendiz = $idAprendizA['idAprendiz'];

$queryIdProyecto = "SELECT idProyecto FROM proyecto WHERE proyecto.nombreProyecto = '$proyecto';";
$resultIdProyecto = mysqli_query($conn, $queryIdProyecto);
$idProyectoA = mysqli_fetch_assoc($resultIdProyecto);
$idProyecto = $idProyectoA['idProyecto'];

$queryInsert = "INSERT INTO participantes(idProyecto, idAprendiz) VALUES ('$idProyecto', '$idAprendiz');";
$resultInsert = mysqli_query($conn, $queryInsert);

?>