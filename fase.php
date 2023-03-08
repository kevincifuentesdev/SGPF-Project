<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/fase.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700;800&display=swap" rel="stylesheet">
    <title>Fase</title>
</head>

<body>
    <header>
        <div class="logo-titulo">
            <img src="./img/icons/Logo-de-SENA-png-verde.png" alt="logo_sena" width="80" height="80">
            <hr>
            <h2>Sistema de gestión de<br> proyectos formativos SENA</h2>
        </div>
        <div class="usuario">
            <span>¡Bienvenido Administrador!</span>
            <img src="./img/icons/user.png" alt="user">
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
            <h2 class="title-tabla">Datos Fase</h2>
            <form action="/buscar" method="GET">
                <input type="search" id="buscar" name="buscar" placeholder="Buscar por nombre o documento">
                <button type="submit">Buscar</button><hr>
                <u><a href="*">Nueva fase</a></u>
            </form>
            <table cellspacing="0">
                <thead>
                    <tr>
                        <th>Fase</th>
                        <th>Competencia</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Planeacion</td>
                        <td>Codificacion de software</td>
                        <td></td>
                        <td></td>
                        <td> </td>
                        <td>
                            <span>editar</span>
                            <span>ver detalle</span>
                            <span>borrar</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="form-container">
            <h2 class="title-form">Nuevo Fase</h2>
            <form action="" class="form-nuevo-proyecto">
                <label for="nombre">Nombre:</label>
                <input class="input" type="text" name="nombre" placeholder="Planeacion" id="">

                <label for="titulo">Competencia:</label>
                <input class="input" type="text" name="titulo" placeholder="Codificacion de software" id="">



                <div class="btns-container">
                    <input class="input-submit-registrar" type="submit" value="Registrar">
                    <input class="input-submit-limpiar " type="submit" value="Limpiar">
                </div>
            </form>
        </div>
    </main>

</body>

</html>