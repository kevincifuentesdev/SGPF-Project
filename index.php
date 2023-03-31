<?php
session_start();
include 'server/conexion.php';

if (isset($_POST['ingresar'])) {
    $rol = $_POST['rol'];
    $usuario = $_POST['user'];
    $contraseña = $_POST['password'];
    if (isset($_POST['ingresar'])) {
        $rol = $_POST['rol'];
        $usuario = $_POST['user'];
        $contraseña = $_POST['password'];
        $queryIdProgramaFormacion = "SELECT rol.idRol FROM rol
        WHERE rol.rol = '$rol'";
        $query = mysqli_query($conn,"SELECT usuario.idUsuario, usuario.usuario, usuario.contrasena, rol.rol FROM usuario 
        INNER JOIN rol ON usuario.idRol = rol.idRol WHERE usuario.usuario = '$usuario' 
        AND usuario.contrasena = '$contraseña' AND rol.rol = 'Administrador' AND rol.idRol = 1 ");
        $busqueda = mysqli_num_rows($query);
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($busqueda == 1){
            if (isset($row['idUsuario']) && isset($row['usuario'])) {
                $idUsuario = $row['idUsuario'];
                $usuario = $row['usuario'];
                $_SESSION['id'] = $idUsuario;
                echo"<script>alert('BIENVENIDO $usuario con id $idUsuario');window.location = 'proyectoTabla.php'</script>";
                exit();
            } else {
                echo "<script>alert('Usuario no existe');window.location = 'index.php'</script> ";
            }
        } else {
            echo "<script>alert('El usuario ingresado no existe o no es administrador');window.location = 'index.php'</script> ";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./css/index.css" />
        <link rel="stylesheet" href="./css/normalize.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <!-- Fonts -->
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700;800&display=swap"
            rel="stylesheet"
        />
        <title>Login</title>
    </head>
    <body>
        <img
            class="logo-login"
            src="./img/icons/logo-de-Sena-sin-fondo-Blanco.png"
            alt="Sena"
        />
        <section class="login-container">
            <h2>
                Sistema de gestión de<br />
                proyectos formativos SENA
            </h2>

            <form action="index.php" method="POST">
                <label for="rol">Tipo de rol:</label>
                <select name="rol">
                    <option value="Aprendiz" name="rol" >Aprendiz</option>
                    <option value="Instructor" name="rol">Instructor</option>
                    <option value="Administrador" name="rol">Administrador</option>
                </select>
                <label for="user">Usuario:</label>
                <input
                    class="input"
                    type="text"
                    name="user"
                    placeholder="Ingrese Usuario"
                    id=""
                />

                <label for="password">Contraseña:</label>
                <input
                    class="input"
                    type="password"
                    name="password"
                    placeholder="Ingrese Contraseña"
                    id=""
                />

                <input class="input-submit" type="submit" value="Ingresar" name="ingresar"/>
            </form>
        </section>
    </body>
</html>