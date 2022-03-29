<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

    echo "".$_SESSION['user_id'];

    require_once "../controllers/MascotaController.php";
    require_once "../controllers/ClienteController.php";

    $id_dueño = "";
    $id_mascota = "";
    $nombre_dueño="";
    $nombre_perro="";
    $raza="";
    $genero="";
    $edad=""; 

    //Busqueda
    if (!empty($_POST['nombre_busqueda'])) {
        
        $mensaje_registro = "Empty";

        $mascotaController = new MascotaController();
        $clienteController = new ClienteController();

        $nombre_mascota = $_POST['nombre_busqueda'];

        $mensaje_busqueda = $mascotaController->obtenerMascotaPorNombre(
            $nombre_mascota
        );

        if($mensaje_busqueda->id){
            $id_dueño = $mensaje_busqueda->apoderado_id;
            $id_mascota = $mensaje_busqueda->id;
    
            $cliente_model = $clienteController->obtenerClientePorId(
                $id_dueño
            );
    
            $nombre_dueño = $clienteController->obtenerNombreCliente($cliente_model);
            $nombre_perro = $mensaje_busqueda->nombre;
            $raza = $mensaje_busqueda->raza;
            $genero = $mensaje_busqueda->genero;
            $edad = $mensaje_busqueda->edad;
            $mensaje_registro = "Encontrado";
        }

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
    <title>Registrar Consulta</title>
</head>
<body>

    <!-- No Sesion -->
    <?php require '../partials/header-adminvet-panel.php' ?>

    <?php if(!empty($mensaje_registro)): ?>
        <?php 
            echo '';
            if($mensaje_registro == "Encontrado"){
                echo '<h1>Mascota Encontrada</h1>';
            }else{
                echo '<h1>Hubo Un Error</h1>';
            }
        ?>
    <?php endif; ?>



    <!-- Busqueda de Perro -->
    <form action="consulta-register-view.php" method="POST">
        <h3>Seleccionar Mascota</h3>
        <div class="seccion">
            <label for="nombre">Nombre del Perro</label>
            <input name="nombre_busqueda" id="codigo" Type Text></p>
        </div>
        <div id="opciones">
            <input name="Buscar" Type=Submit value="Buscar">
        </div>
    </form>


    <form action="consulta-datos-register-view.php" method="POST">
        <h3>Datos Mascota</h3>

        <div class="seccion">
            <label for="nombre_apoderado">Nombre Dueño</label>
            <input name="nombre_apoderado" id="codigo" Type Text readonly value="<?= $nombre_dueño ?>"></p>
        </div>

        <div class="seccion">
            <label for="nombre">Nombre del Perro</label>
            <input name="nombre" id="codigo" Type Text readonly value="<?= $nombre_perro ?>"></p>
        </div>

        <div class="seccion">
            <label for="nombres">Raza</label>
            <input name="nombres" id="codigo" Type Text readonly value="<?= $raza ?>"></p>
        </div>

        <div class="seccion">
            <label for="nombres">Genero</label>
            <input name="nombres" id="codigo" Type Text readonly value="<?= $genero ?>"></p>
        </div>

        <div class="seccion">
            <label for="nombres">Edad</label>
            <input name="nombres" id="codigo" Type Text readonly value="<?= $edad ?>"></p>
        </div>

        <!-- Inputs Hiddens -->
        <input id="id_dueño" name="id_dueño" type="hidden" value="<?=$id_dueño?>">
        <input id="id_mascota" name="id_mascota" type="hidden" value="<?=$id_mascota?>">

        <div id="opciones">
            <input name="Registrar" Type=Submit value="Siguiente">
            <input Type=Submit value="Cancelar"></p>    
        </div>
    </form>

    <div class="graf">
        <img id="perrito" src="../img/fondo-2.png" alt="perrito-1">
    </div>


</body>
</html>