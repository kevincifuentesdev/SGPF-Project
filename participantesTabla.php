<?php
include './server/conexion.php';

$queryParticipantes = "SELECT aprendiz.numeroDocumento AS documento, CONCAT(aprendiz.nombreAprendiz, ' ', aprendiz.apellidoAprendiz) AS aprendiz, proyecto.nombreProyecto AS proyecto FROM aprendiz INNER JOIN participantes ON aprendiz.idAprendiz = participantes.idAprendiz INNER JOIN proyecto ON participantes.idProyecto = proyecto.idProyecto;";
$resultParticipantes = mysqli_query($conn, $queryParticipantes);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" href="./css/participantesTabla.css" />
    <link rel="stylesheet" href="./css/normalize.css" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Tabla Participantes</title>
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
        <div class="container-tabla">
            <h2 class="title-tabla">Datos Participantes</h2>
            <form action="/buscar" method="GET">
                <input type="search" id="buscar" name="buscar" placeholder="Buscar por aprendiz o proyecto" />
                <button type="submit">Buscar</button>
            </form>
            <a href="./participantesAgregar.php">
                <h2>Nuevo Participante</h2>
            </a>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Aprendiz</th>
                        <th>Proyecto</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $listParticipantes = mysqli_fetch_assoc($resultParticipantes);
                    while ($listParticipantes) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $listParticipantes['aprendiz'] ?>
                            </td>
                            <td>
                                <?php echo $listParticipantes['proyecto'] ?>
                            </td>
                            <td class="container-action-btns">
                                <a href="./server/participantesBorrar.php?idParticipante=
                                <?php echo $listParticipantes['idParticipante']?>"><button class="btn-editar">Editar</button></a>
                                <button class="btn-detalle">Ver detalle</button>
                                <a href="./server/participantesBorrar.php?=idParticipante
                                <?php echo $listParticipantes['idParticipante']?>"><button
                                        class="btn-borrar">Borrar</button></a>
                            </td>
                        </tr>
                        <?php
                        $listParticipantes = mysqli_fetch_assoc($resultParticipantes);
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script src="./js/script.js"></script>
</body>

</html>