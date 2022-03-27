
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="../css/styles-admin.css">
    <title>Login</title>
</head>
<body>
    
    <!-- No Sesion -->
    <?php require '../partials/header-cliente.php' ?>

    <form action="login.php" method="POST">
        <h3>Login</h3>
        
        <div class="seccion">
            <label for="username">Username</label>
            <input name="username" id="codigo" Type Text></p>
        </div>

        <div class="seccion">
            <label for="password">Contraseña</label>
            <input name="password" id="nombre" type="password"></p>
        </div>

        <div id="opciones">
            <input name="Registrar" Type=Submit value="Ingresar">
            <input Type=Submit value="Cancelar"></p>    
        </div>
    </form>

    <div class="graf">
        <img id="perrito" src="../img/fondo-2.png" alt="perrito-1">
    </div>



</body>
</html>