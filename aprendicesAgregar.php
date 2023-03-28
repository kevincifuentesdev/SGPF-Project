<?php
session_start();
include 'conexion.php';
if (isset($_POST['Registrar'])) {
  $ficha = $_POST['ficha'];
  $documento = $_POST['tipoDocumento'];
  $nroDocumento = $_POST['numeroDocumento'];
  $nombre = $_POST['nombreAprendiz'];
  $apellido = $_POST['apellidoAprendiz'];
  $estado = $_POST['estado'];

  $queryIdProgramaFormacion = "SELECT idProgramaFormacion FROM programaformacion WHERE ficha = $ficha;";
  $resultQueryIdPrograma = mysqli_query($conn, $queryIdProgramaFormacion);
  $listIdProgramaFormacion = mysqli_fetch_assoc($resultQueryIdPrograma);
  $idProgramaFormacion = $listIdProgramaFormacion['idProgramaFormacion'];

  $insertAprendiz = "INSERT INTO aprendiz(idProgramaFormacion, nombreAprendiz, apellidoAprendiz, tipoDocumento, numeroDocumento, estado) VALUES($idProgramaFormacion, '$nombre', '$apellido', '$documento', '$nroDocumento', '$estado');";
  $resultInsertAprendiz = mysqli_query($conn, $insertAprendiz);
  echo "<script>alert('Se registró exitosamente');window.location ='aprendicesAgregar.php'</script>";
}

$queryFicha = "SELECT ficha FROM programaFormacion;";
$resultadoQueryFicha = mysqli_query($conn, $queryFicha);
$filasFicha = mysqli_fetch_assoc($resultadoQueryFicha);

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
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap" rel="stylesheet">
  <title>Formulario Aprendices</title>
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
      <li><a href="./aprendicesTabla.php">Aprendiz</a></li>
      <li><a href="">Participantes</a></li>
      <li><a href="">Ficha proyecto</a></li>
      <li><a href="">Fases</a></li>
      <li><a href="">Instructor</a></li>
      <li><a href="">Fases Instructor</a></li>
    </ul>
  </nav>
  <main>
    <div class="form-container">
      <h2 class="title-form">Nuevo Aprendiz</h2>
      <form action="aprendicesAgregar.php" method="POST" class="form-nuevo-proyecto">
        <label for="ficha">Ficha:</label>
      <datalist id="ficha">
        <?php while ($filasFicha) { ?>
            <option value="<?php echo $filasFicha['ficha'] ?>"></option>
        <?php   
            $filasFicha = mysqli_fetch_assoc($resultadoQueryFicha);
            } ?>
        </datalist>
        <input class="input" type="text" name="ficha" id="" list="ficha">
            
        <label for="tipoDocumento">Tipo de documento:</label>
        <select name="tipoDocumento" id="tipoDocumento">
          <option value="CC">CC</option>
          <option value="TI">TI</option>
          <option value="PEP">PEP</option>
        </select>
  
        <label for="numeroDocumento">Numero de documento:</label>
        <input class="input" type="text" name="numeroDocumento" placeholder="Ingrese el número de documento" id="">
        
        <label for="nombreAprendiz">Nombre:</label>
        <input class="input" type="text" name="nombreAprendiz" placeholder="Ingrese el nombre" id="">

  
        <label for="apellidoAprendiz">Apellido:</label>
        <input class="input" type="text" name="apellidoAprendiz" placeholder="Ingrese el apellido" id="">

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
          <option value="enFormacion">En formación</option>
          <option value="Condicional">Condicional</option>
          <option value="Cancelado">Cancelado</option>
          <option value="Traslado">Traslado</option>
          <option value="Retirado">Retirado</option>
        </select>
  
        <div class="btns-container">
          <input class="input-submit-registrar" type="submit" value="Registrar" name="Registrar">
          <input class="input-submit-limpiar " type="reset" value="Limpiar">
        </div>
      </form>
    </div>
  </main>
  <script src="./js/script.js"></script>
</body>
</html>