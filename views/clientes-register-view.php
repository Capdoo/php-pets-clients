
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-admin.css">
    <title>Registrarse</title>
</head>
<body>

    <!-- No Sesion -->
    <?php require '../partials/header-cliente.php' ?>


    <form action="register.php" method="POST">
        <h3>Registrarse</h3>
    
        <div class="seccion">
            <label for="apellidos">Ingresar Apellidos</label>
            <input name="apellidos" id="codigo" Type Text></p>
        </div>

        <div class="seccion">
            <label for="nombres">Ingresar Nombres</label>
            <input name="nombres" id="codigo" Type Text></p>
        </div>

        <div class="seccion">
            <label for="username">Ingresar Username</label>
            <input name="username" id="nombre" Type Text></p>
        </div>

        <div class="seccion">
            <label for="password">Ingresar Contraseña</label>
            <input name="password" id="nombre" Type="password"></p>
        </div>

        <div class="seccion">
            <label for="password2">Repetir Contraseña</label>
            <input name="password2" id="nombre" Type="password"></p>
        </div>

        <div class="seccion">
            <label for="">Genero:</label>

            <input name="Genero" Type="Radio"> Masculino
            <input name="Genero" Type="Radio"> Femenino</p>
        </div>

        <div id="opciones">
            <input name="Registrar" Type=Submit value="Registrar">
            <input Type=Submit value="Cancelar"></p>    
        </div>
    </form>

    <div class="graf">
        <img id="perrito" src="../img/fondo-2.png" alt="perrito-1">
    </div>


</body>
</html>