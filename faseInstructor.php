<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/ficha_proyecto.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700;800&display=swap" rel="stylesheet">
    <title>Ficha proyecto</title>
</head>
<body>
    <header>
      <div class="logo-titulo">
        <img src="./imgs/icons/Logo-de-SENA-png-verde.png" alt="logo_sena" width="80" height="80">
        <hr>
        <h2>Sistema de gestión de<br> proyectos formativos SENA</h2>
      </div>
      <div class="usuario">
        <span>¡Bienvenido Administrador!</span>
        <img src="./imgs/icons/user.png" alt="user">
      </div>
    </header>
    <nav>
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
            <h2 class="title-tabla">Datos Fase por Instructor</h2>
            <form action="/buscar" method="GET">
                <input type="search" id="buscar" name="buscar" placeholder="Buscar por Nombre o Documento">
                <button type="submit">Buscar</button>
            </form>
            <a href="nuevaFaseInstructor.php">Nueva Fase por instructor</a>
            <table cellspacing="0">
            <thead>
                <tr>
                <th>fase</th>
                <th>proyecto</th>
                <th>instructor</th>
                <th> </th>
                </tr>
            </thead>
            <tbody>
                    <tr>
                    <td>Planeacion</td>
                    <td>Motos</td>
                    <td>Carlos Gomez</td>
                    <td>
                    <span>editar</span>
                    <span>ver detalle</span>
                    <span>borrar</span>
                    </td>
                </tbody>
            </table>
        </div>
        <div class="form-container">
            <h2 class="title-form">Nueva Fase por Instructor</h2>
            <form action="" class="form-nuevo-proyecto">
            <label for="estado">Fase:</label>
            <select name="estado" id="estado">
                <option value="aprobado">Fase1</option>
                <option value="reprobado">Fase2</option>
                <option value="ajustar">Fase3</option>
            </select>
            <label for="estado">Proyectos:</label>
            <select name="estado" id="estado">
                <option value="aprobado">Moto</option>
                <option value="reprobado">Avion</option>
                <option value="ajustar">Burra</option>
            </select>
            <label for="estado">Instructor:</label>
            <select name="estado" id="estado">
                <option value="aprobado">Chetes</option>
                <option value="reprobado">Elviolado</option>
                <option value="ajustar">Carlinchis</option>
            </select>
        
            <div class="btns-container">
                <input class="input-submit-registrar" type="submit" value="Registrar">
                <input class="input-submit-limpiar " type="submit" value="Limpiar">
            </div>
            </form>
        </div>
    </main>

</body>
</html>