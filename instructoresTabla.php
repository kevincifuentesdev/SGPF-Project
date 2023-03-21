<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/instructoresTabla.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700;800&display=swap" rel="stylesheet">
    <!-- Icons -->
    <title>Tabla Instructores</title>
</head>
<body>
    <header>
        <div class="logo-titulo">
          <img src="./img/icons/Logo-de-SENA-png-verde.png" alt="logo_sena" width="80" height="80">
          
          <h2>Sistema de gestión de<br> proyectos formativos SENA</h2>
        </div>
    
        <div  class="iconoHamburguesa menu" id="menu" >
            <img src="./img/icons/hamburguesa.png" alt="logo_sena" width="30" height="30">
        </div>
      </header>
      <nav id="navega">
        <ul >
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
        <h2 class="title-tabla">Datos Instructor</h2>
        <form action="/buscar" method="GET">
            <input type="search" id="buscar" name="buscar" placeholder="Buscar por nombre o documento">
            <button type="submit">Buscar</button>
        </form>
        <a href="./instructoresAgregar.php"><h2>Nuevo Instructor</h2></a>
        <table cellspacing="0">
            <thead>
            <tr>
                <th>Cédula</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>939393</td>
                    <td>Carlos Gomez</td>
                    <td class="container-action-btns">
                        <a href="./instructoresEditar.php"><button class="btn-editar">Editar</button></a>
                        <button class="btn-detalle">Ver detalle</button>
                        <button class="btn-borrar">Borrar</button>
                </td>
                </tr>
                <tr>
                    <td>939393</td>
                    <td>Carlos Gomez</td>
                    <td class="container-action-btns">
                        <a href="./instructoresEditar.php"><button class="btn-editar">Editar</button></a>
                        <button class="btn-detalle">Ver detalle</button>
                        <button class="btn-borrar">Borrar</button>
                </td>
                </tr>
                <tr>
                    <td>939393</td>
                    <td>Carlos Gomez</td>
                    <td class="container-action-btns">
                        <a href="./instructoresEditar.php"><button class="btn-editar">Editar</button></a>
                        <button class="btn-detalle">Ver detalle</button>
                        <button class="btn-borrar">Borrar</button>
                </td>
                </tr>
                <tr>
                    <td>939393</td>
                    <td>Carlos Gomez</td>
                    <td class="container-action-btns">
                        <a href="./instructoresEditar.php"><button class="btn-editar">Editar</button></a>
                        <button class="btn-detalle">Ver detalle</button>
                        <button class="btn-borrar">Borrar</button>
                </td>
                </tr>
            </tbody>
            </table>
        </div>
    
</main>

<script src="./js/script.js"></script>
</body>
</html>