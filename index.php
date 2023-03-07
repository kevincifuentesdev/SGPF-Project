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
            src="./img/logo-de-Sena-sin-fondo-Blanco.png"
            alt="Sena"
        />
        <section class="login-container">
            <h2>
                Sistema de gestión de<br />
                proyectos formativos SENA
            </h2>

            <form action="">
                <label for="rol">Tipo de rol:</label>
                <select name="rol">
                    <option value="">Aprendiz</option>
                    <option value="">Instructor</option>
                    <option value="">Administrador</option>
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

                <input class="input-submit" type="submit" value="Ingresar" />
            </form>
        </section>
    </body>
</html>
