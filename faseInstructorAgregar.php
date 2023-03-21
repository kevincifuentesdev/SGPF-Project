<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/faseInstructor.css">
    <link rel="stylesheet" href="./css/normalize.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700;800&display=swap" rel="stylesheet">
    <title>Formulario Fase Instructor</title>
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
            <h2 class="title-form">Nueva Fase por Instructor</h2>
            <form action="" class="form-nuevo-proyecto">
                <label for="fase">Fase:</label>
                <select name="fase" id="fase">
                    <option value="aprobado">Fase1</option>
                    <option value="reprobado">Fase2</option>
                    <option value="ajustar">Fase3</option>
                </select>
                <label for="proyectos">Proyectos:</label>
                <select name="proyectos" id="proyectos">
                    <option value="aprobado">Moto</option>
                    <option value="reprobado">Avion</option>
                    <option value="ajustar">Burra</option>
                </select>
                <label for="instructor">Instructor:</label>
                <select name="instructor" id="instructor">
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
    <script src="./js/script.js"></script>

</body>
</html>