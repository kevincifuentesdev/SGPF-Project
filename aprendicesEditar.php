<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Hojas de estilo -->
  <link rel="stylesheet" href="./css/aprendicesFormulario.css">
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
      <h2 class="title-form">Editar Datos Aprendiz</h2>
      <form action="" class="form-nuevo-proyecto">
        <label for="ficha">Ficha:</label>
        <input class="input" type="text" name="ficha" placeholder="Ingrese ficha" id="">

        <label for="documento">Tipo de documento:</label>
        <select name="documento" id="documento">
          <option value="aprobado">C.C</option>
          <option value="reprobado">T.I</option>
          <option value="ajustar">PEP</option>
        </select>
  
        <label for="nroDocumento">Numero de documento:</label>
        <input class="input" type="text" name="nroDocumento" placeholder="Ingrese su numero de documento" id="">
        
        <label for="nombre">Nombre:</label>
        <input class="input" type="text" name="nombre" placeholder="Ingrese nombre" id="">

  
        <label for="apeliido">Apellido:</label>
        <input class="input" type="text" name="apeliido" placeholder="Ingrese apeliido" id="">

        <label for="estado">Estado:</label>
        <select name="estado" id="estado">
          <option value="aprobado">Formación</option>
          <option value="reprobado">Condicional</option>
          <option value="ajustar">Cancelado</option>
          <option value="ajustar">Traslado</option>
          <option value="ajustar">Retirado</option>
        </select>
  
        <div class="btns-container">
          <input class="input-submit-registrar" type="submit" value="Actualizar">
          <input class="input-submit-limpiar " type="submit" value="Limpiar">
        </div>
      </form>
    </div>
  </main>
  <script src="./js/script.js"></script>
</body>
</html>