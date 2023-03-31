<?php
session_start();
include 'server/conexion.php';

if (isset($_SESSION['id']) == false) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="./css/proyectoTabla.css" />
        <link rel="stylesheet" href="./css/normalize.css" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap" rel="stylesheet">
        <title>Tabla Ficha Proyecto</title>
    </head>
    <body>
        <header>
            <div class="logo-titulo">
            <img src="./img/icons/Logo-de-SENA-png-verde.png" alt="logo_sena" width="80" height="80">
            <hr>
            <h2>Sistema de gestión de<br> proyectos formativos SENA</h2>
            </div>
            <div  class="iconoHamburguesa menu" id="menu" >
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
                <li><a href="./server/cerrarSesion.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
        <main>
            <div class="container-tabla">
                <h2 class="title-tabla">Datos proyecto</h2>
                <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" role="search">
                    <input
                    type="search"
                    id="buscar"
                    name="buscarTexto"
                    value=""
                    placeholder="Buscar por nombre o ficha"
                    />
                    <button type="submit" name="Buscar">Buscar</button>
                </form>
                <a href="./proyectoAgregar.php"><h2>Nuevo Proyecto</h2></a>
                <table cellspacing="0">
                    <thead>
                        <tr>
                            <th>Ficha</th>
                            <th>Nombre proyecto</th>
                            <th>Cliente</th>
                            <th>Programa formación</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if(isset($_POST['Buscar'])){
                            //Mostrar la busqueda 
                            $busqueda = $_POST['buscarTexto'];
                            if(empty($_POST['buscarTexto'])){
                                echo"<script language='JavaScript'>alert('Ingresa la ficha o el nombre del proyecto que desea buscar');location.assign('proyectoTabla.php') </script>";
                            }else{
                                if(isset($_POST['buscarTexto'])){
                                    $consultaProyectoBuscar = "SELECT programaformacion.ficha, proyecto.idProyecto,proyecto.nombreProyecto, proyecto.cliente,
                                    programaformacion.nombrePrograma AS programaFormacion, proyecto.estado 
                                    FROM proyecto
                                    INNER JOIN programaformacion ON proyecto.idProgramaFormacion = programaformacion.idProgramaFormacion 
                                    WHERE proyecto.nombreProyecto LIKE '%$busqueda%' OR programaformacion.ficha LIKE '%$busqueda%'";
                                }
                            }
                            $resultadoProyectoBuscar = mysqli_query($conn,$consultaProyectoBuscar);
                            while($row = mysqli_fetch_array($resultadoProyectoBuscar)){ ?>
                                <tr>
                                    <td><?php echo $row['ficha'] ?></td>
                                    <td><?php echo $row['nombreProyecto'] ?></td>
                                    <td><?php echo $row['cliente'] ?></td>  
                                    <td><?php echo $row['programaFormacion'] ?></td>
                                    <td><?php echo $row['estado'] ?></td>
                                    <td class="container-action-btns">
                                    <a class="aIconos" href="./proyectoEditar.php?idProyecto=<?php echo $row['idProyecto'];?>"><img src="./img/icons/edit-icono.png" alt=""></a>
                                    <a class="aIconos" href="./proyectoDetalle.php?idProyecto=<?php echo $row['idProyecto'];?>"><img src="./img/icons/buscar-icono.png" alt=""></a>
                                    <a class="aIconos" href="./server/proyectoEliminar.php?idProyecto=<?php echo $row['idProyecto']; ?>"><img src="./img/icons/borrar-icono.png" alt=""></a>
                                    </td>
                                </tr>
                        <?php
                            }
                        }else{
                            //Mostrar toda la tabla proyecto 
                            $consultaProyectoTabla = "SELECT programaformacion.ficha, proyecto.idProyecto,  proyecto.nombreProyecto, 
                            proyecto.cliente, programaformacion.nombrePrograma AS programaFormacion, proyecto.estado FROM proyecto
                            INNER JOIN programaformacion ON proyecto.idProgramaFormacion = programaformacion.idProgramaFormacion;";

                            $resultadoProyectoTabla = mysqli_query($conn,$consultaProyectoTabla);
                            while($row = mysqli_fetch_array($resultadoProyectoTabla)){ 
                            ?>
                                <tr>
                                    <td><?php echo $row['ficha'] ?></td>
                                    <td><?php echo $row['nombreProyecto'] ?></td>
                                    <td><?php echo $row['cliente'] ?></td>  
                                    <td><?php echo $row['programaFormacion'] ?></td>
                                    <td><?php echo $row['estado'] ?></td>
                                    <td class="container-action-btns">
                                    <a class="aIconos" href="./proyectoEditar.php?idProyecto=<?php echo $row['idProyecto'];?>"><img src="./img/icons/edit-icono.png" alt=""></a>
                                    <a class="aIconos" href="./proyectoDetalle.php?idProyecto=<?php echo $row['idProyecto'];?>"><img src="./img/icons/buscar-icono.png" alt=""></a>
                                    <a class="aIconos" href="./server/proyectoEliminar.php?idProyecto=<?php echo $row['idProyecto']; ?>"><img src="./img/icons/borrar-icono.png" alt=""></a>

                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        <script src="./js/script.js"></script>
    </body>
</html>
