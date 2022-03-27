<?php

    require_once "../models/Usuario.php";
    require_once "../controllers/UserController.php";

    // $usuarioClase = new Usuario();
    // $usuarios_lista = $usuarioClase->get_usuarios();
    $mensaje_registro = "Empty";
    if (!empty($_POST['username']) && !empty($_POST['password'])) {

        $usuarioClase = new UserController();
        $rol = "veterinario";

        $apellido_paterno = $_POST['apellido_paterno'];
        $apellido_materno = $_POST['apellido_materno'];
        $nombres =  $_POST['nombres'];
        $username = $_POST['username'];
        $password= $_POST['password']; 
        $email= $_POST['email']; 
        $genero = $_POST['genero']; 
        $telefono = $_POST['telefono']; 
    
        $mensaje_registro = $usuarioClase->registrarUsuario(
            $apellido_paterno,
            $apellido_materno,
            $nombres,
            $username,
            $password,
            $email,
            $genero,
            $telefono,
            $rol
        );

    }

?>

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
    <?php require '../partials/header-admin-panel.php' ?>


    <?php 
        echo '';
        if($mensaje_registro == "Registrado"){
            echo '<h1>Registro Exitoso</h1>';
        }else{
            echo '<h1>Hubo Un Error</h1>';
        }
        //echo ''.$usuarios_lista;
    ?>

    <form action="adminvet-register-view.php" method="POST">
        <h3>Registrar Veterinario</h3>
    
        <div class="seccion">
            <label for="apellido_paterno">Ingresar Apellido Paterno</label>
            <input name="apellido_paterno" id="codigo" Type Text></p>
        </div>

        <div class="seccion">
            <label for="apellido_materno">Ingresar Apellido Materno</label>
            <input name="apellido_materno" id="codigo" Type Text></p>
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

        <!-- <div class="seccion">
            <label for="password2">Repetir Contraseña</label>
            <input name="password2" id="nombre" Type="password"></p>
        </div> -->

        <div class="seccion">
            <label for="email">Ingresar Email</label>
            <input name="email" id="nombre" Type Text></p>
        </div>

        <div class="seccion">
            <label for="telefono">Ingresar Telefono</label>
            <input name="telefono" id="nombre" Type Text></p>
        </div>

        <div class="seccion">
            <label for="">Genero:</label>

            <input name="genero" Type="Radio"> Masculino
            <input name="genero" Type="Radio"> Femenino</p>
        </div>

        <div id="opciones">
            <input name="Registrar" Type=Submit value="Registrar">
            <input Type=Submit value="Cancelar"></p>    
        </div>
    </form>

    <div class="graf">
        <img id="perrito" src="../img/admin/vet-2.png" alt="perrito-1">
    </div>


</body>
</html>