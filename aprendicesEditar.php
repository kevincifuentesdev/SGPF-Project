    <?php
    session_start();
    include './server/conexion.php'; 

    if(isset($_GET['idAprendiz'])){
        $id = $_GET['idAprendiz'];
        $query = "SELECT *, programaformacion.ficha FROM aprendiz
        INNER JOIN programaformacion ON aprendiz.idProgramaFormacion = programaformacion.idProgramaFormacion WHERE idAprendiz = $id;";
        $result = mysqli_query($conn, $query);
        $filas = mysqli_num_rows($result);

        if ($filas == 1) {
            $filasAprendices = mysqli_fetch_array($result);
            $ficha = $filasAprendices['ficha'];
            $documento = $filasAprendices['tipoDocumento'];
            $nroDocumento = $filasAprendices['numeroDocumento'];
            $nombre = $filasAprendices['nombreAprendiz'];
            $apellido = $filasAprendices['apellidoAprendiz'];
            $estado = $filasAprendices['estado'];
        }
    }

    if(isset($_POST['Actualizar'])){
        $id = $_GET['idAprendiz'];
        $documento = $_POST['tipoDocumento'];
        $nroDocumento = $_POST['numeroDocumento'];
        $nombre = $_POST['nombreAprendiz'];
        $apellido = $_POST['apellidoAprendiz'];
        $estado = $_POST['estado'];
        $queryAprendiz = "UPDATE aprendiz SET tipoDocumento = '$documento', numeroDocumento = '$nroDocumento', nombreAprendiz = '$nombre', apellidoAprendiz = '$apellido', estado = '$estado' WHERE idAprendiz = $id";
        mysqli_query($conn, $queryAprendiz);
        echo "<script>alert('Se actualizó exitosamente');window.location ='aprendicesTabla.php'</script>";
    }
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
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;1,300;1,700;1,900&display=swap"
            rel="stylesheet">
        <title>Editar Aprendices</title>
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
                <h2 class="title-form">Editar Datos Aprendiz</h2>
                <form action='aprendicesEditar.php?idAprendiz=<?php echo $_GET ['idAprendiz']; ?>' method = "POST" class="form-nuevo-proyecto">
                    <label for="ficha">Ficha:</label>
                    <input class="input" type="text" name="ficha" value="<?php echo $ficha;?>" id="ficha" disabled>

                    <label for='tipoDocumento'>Tipo de documento:</label>
                    <select name='tipoDocumento' id='tipoDocumento'>
                        <option value="<?php echo $documento;?>" selected><?php echo $documento;?></option>
                        <option value="CC">CC</option>
                        <option value="TI">TI</option>
                        <option value="PEP">PEP</option>
                    </select>

                    <label for='numeroDocumento'>Numero de documento:</label>
                    <input class="input" type="text" name='numeroDocumento' value="<?php echo $nroDocumento;?>" id="">

                    <label for='nombreAprendiz'>Nombre:</label>
                    <input class="input" type="text" name='nombreAprendiz' value="<?php echo $nombre;?>" id="">


                    <label for='apellidoAprendiz'>Apellido:</label>
                    <input class="input" type="text" name='apellidoAprendiz' value="<?php echo $apellido;?>" id="">

                    <label for="estado">Estado:</label>
                    <select name="estado" value="<?php echo $estado;?>" id="estado">
                    <option value="<?php echo $estado;?>" selected><?php echo $estado;?></option>
                        <option value="Formación">Formación</option>
                        <option value="Condicional">Condicional</option>
                        <option value="Cancelado">Cancelado</option>
                        <option value="Traslado">Traslado</option>
                        <option value="Retirado">Retirado</option>
                    </select>

                    <div class="btns-container">
                        <input class="input-submit-registrar" type="submit" value="Actualizar" name="Actualizar">
                    </div>
                </form>
            </div>
        </main>
        <script src="./js/script.js"></script>
    </body>

    </html>