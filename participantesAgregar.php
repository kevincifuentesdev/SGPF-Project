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
            <h2 class="title-form">Nuevo Participante</h2>
            <form action="" class="form-nuevo-proyecto">
                <label for="aprendiz">Aprendiz:</label>
                <select name="aprendiz" id="aprendiz">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>
                <label for="proyecto">Proyecto:</label>
                <select name="proyecto" id="proyecto">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                </select>

                <div class="btns-container">
                    <input class="input-submit-registrar" type="submit" value="Registrar" />
                    <input class="input-submit-limpiar" type="submit" value="Limpiar" />
                </div>
            </form>
        </div>
    </main>
    <script src="./js/script.js"></script>
</body>

</html>