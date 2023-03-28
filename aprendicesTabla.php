<?php
session_start();
include 'conexion.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Hojas de estilo -->
    <link rel="stylesheet" href="./css/aprendicesTabla.css">
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap" rel="stylesheet">
    <title>Tabla Aprendices</title>
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
      </ul>
    </nav>
    <main>
      <div class="container-tabla">
        <h2 class="title-tabla">Aprendices</h2>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="POST" role="search">
          <input type="search" id="buscar" name="buscarTexto" value="" placeholder="Buscar por nombre o ficha"/>
          <button name="Buscar" type="submit">Buscar</button>
        </form>
        <a href="./aprendicesAgregar.php"><h2>Nuevo Aprendiz</h2></a>
        <table cellspacing="0">
          <thead>
            <tr>
              <th>Ficha</th>
              <th>Tipo de documento</th>
              <th>Número de documento</th>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Estado</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if(isset($_POST['Buscar'])){
              $busqueda = $_POST['buscarTexto'];
              if(empty($_POST['buscarTexto'])) {
                echo"<script language='JavaScript'>alert('Ingresa el nombre del aprendiz o el número de la ficha a buscar');location.assign('aprendicesTabla.php') </script>";
              }else{
                if(isset($_POST['buscarTexto'])){
                  $consultaAprendizBuscar = "SELECT *, programaformacion.ficha FROM aprendiz INNER JOIN programaformacion 
                  ON aprendiz.idProgramaFormacion = programaformacion.idProgramaFormacion WHERE aprendiz.nombreAprendiz LIKE '%$busqueda%' OR aprendiz.apellidoAprendiz LIKE '%$busqueda%' OR programaformacion.ficha LIKE '%$busqueda%'";
                }
              }
              
              $resultadoAprendizBuscar = mysqli_query($conn, $consultaAprendizBuscar);
              while($filasAprendices = mysqli_fetch_array($resultadoAprendizBuscar)){ ?>
                <tr>
                  <td><?php echo $filasAprendices['ficha'] ?></td>
                  <td><?php echo $filasAprendices['tipoDocumento'] ?></td>
                  <td><?php echo $filasAprendices['numeroDocumento'] ?></td>
                  <td><?php echo $filasAprendices['nombreAprendiz'] ?></td>
                  <td><?php echo $filasAprendices['apellidoAprendiz'] ?></td>
                  <td><?php echo $filasAprendices['estado'] ?></td>
                  <td class="container-action-btns">
                  <a href="./aprendicesEditar.php"><button class="btn-editar">Editar</button></a>
                  <button class="btn-detalle">Ver detalle</button>
                  <a href="./aprendicesEliminar.php?idAprendiz=<?php echo $filasAprendices['idAprendiz'];?>"><button class="btn-borrar">Borrar</button></a>
                  </td>
                </tr>
            <?php
              }
            }else{
            
              $queryAprendices = "SELECT *, programaformacion.ficha, aprendiz.tipoDocumento FROM aprendiz INNER JOIN programaformacion 
              ON aprendiz.idProgramaFormacion = programaformacion.idProgramaFormacion;";
              $resultAprendices = mysqli_query($conn, $queryAprendices);
              // $filasAprendices = mysqli_fetch_assoc($resultAprendices);
            
              while($filasAprendices = mysqli_fetch_assoc($resultAprendices)){
              ?>

              <tr>
                <td><?php echo $filasAprendices['ficha']; ?></td>
                <td><?php echo $filasAprendices['tipoDocumento']; ?></td>
                <td><?php echo $filasAprendices['numeroDocumento']; ?></td>
                <td><?php echo $filasAprendices['nombreAprendiz']; ?></td>
                <td><?php echo $filasAprendices['apellidoAprendiz']; ?></td>
                <td><?php echo $filasAprendices['estado']; ?></td>
                <td class="container-action-btns">

                
                    <a class="aIconos" href="./aprendicesEditar.php?idAprendiz=<?php echo $filasAprendices['idAprendiz'];?>"><img src="./img/icons/edit-icono.png" alt=""></a>
                    <a class="aIconos" href="./aprendicesDetalle.php?idAprendiz=<?php echo $filasAprendices['idAprendiz'];?>"><img src="./img/icons/buscar-icono.png" alt=""></a>
                    <a class="aIconos" href="./aprendicesEliminar.php?idAprendiz=<?php echo $filasAprendices['idAprendiz'];?>"><img src="./img/icons/borrar-icono.png" alt=""></a>
                
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