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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
        rel="stylesheet">
    <title>Objetivo Formulario</title>
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
            <h2 class="title-form">Nuevo Objetivo</h2>
            <form action="" class="form-nuevo-proyecto">
                <label for="objetivo">Objetivo Especifico:</label>
                <input class="input" type="text" name="objetivo" placeholder="Ingrese ficha" id="">

                <label for="proyecto">Proyecto:</label>
                <input class="input" type="text" name="proyecto" placeholder="Ingrese su numero de documento" id="">

                <div class="btns-container">
                    <input class="input-submit-registrar" type="submit" value="Registrar">
                    <input class="input-submit-limpiar " type="submit" value="Limpiar">
                </div>
            </form>
        </div>
    </main>
    <script src="./js/script.js"></script>
</body>

</html>