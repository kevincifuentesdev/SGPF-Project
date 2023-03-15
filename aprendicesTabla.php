<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Hojas de estilo -->
  <link rel="stylesheet" href="./css/instructor.css">
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
      <form action="/buscar" method="GET">
        <input type="search" id="buscar" name="buscar" placeholder="Buscar por nombre o ficha">
        <button type="submit">Buscar</button>
      </form>
      <table cellspacing="0">
        <thead>
          <tr>
            <th>Ficha</th>
            <th>Tipo de documento</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
            <tr>
              <td>2559216</td>
              <td>c.c</td>
              <td>Grimaldo Antonio</td>
              <td>Del perpetuo socorro</td>
              <td>Formación</td>
              <td>
                <span>editar</span>
                <span>ver detalle</span>
                <span>borrar</span>
              </td>
            </tr>
        </tbody>
      </table>
    </div>
  </main>
  <script src="./js/script.js"></script>
</body>
</html>