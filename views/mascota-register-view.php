<?php
    session_unset();
    //session_destroy();
    session_start();
    $id_cliente = $_SESSION['user_id'];
    


    require_once "../controllers/MascotaController.php";

    // $usuarioClase = new Usuario();
    // $usuarios_lista = $usuarioClase->get_usuarios();
    $mensaje_registro = "Empty";
    if (!empty($_POST['nombre']) && !empty($_POST['edad'])) {

        $mensaje = "";
        $mascotaController = new MascotaController();

        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $raza =  $_POST['raza'];
        $genero = $_POST['genero'];
        $id_cliente = $_SESSION['user_id'];
    
        $mensaje_registro = $mascotaController->registrarMascota(
            $nombre,
            $edad,
            $raza,
            $genero,
            $id_cliente
        );
        $mensaje = $mensaje_registro;

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
    <?php require '../partials/header-cliente-panel.php' ?>

    <?php if(!empty($mensaje)): ?>
        <?php
            if($mensaje_registro == "Registrado"){
                echo '<h1>Registro Exitoso</h1>';
            }else{
                echo '<h1>Hubo Un Error</h1>';
            }
        ?>
    <?php endif; ?>

    <form action="mascota-register-view.php" method="POST">
        <h3>Registrar Mascota</h3>

        <div class="seccion">
            <label for="nombre">Ingresar Nombre</label>
            <input name="nombre" id="codigo" Type Text></p>
        </div>

        <div class="seccion">
            <label for="edad">Ingresar Edad</label>
            <input name="edad" id="nombre" Type Text></p>
        </div>

        <div class="seccion">
            <label for="">Seleccione Raza</label>
            <select name="raza">
                <Option value="Pitbull"> Pitbull
                <Option value="Bulldog"> Bulldog
                <Option value="Shichu"> Shichu
                <Option value="Pequines"> Pequines
                <Option value="San Bernardo"> San Bernardo
                <Option value="Chiguahua"> Chiguahua
            </select></p>
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
        <img id="perrito" src="../img/fondo-3.png" alt="perrito-1">
    </div>


</body>
</html>