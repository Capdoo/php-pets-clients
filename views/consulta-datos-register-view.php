<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    echo "".$_SESSION['user_id'];

    //require_once "../controllers/ConsultaController.php";

    //Recibir los datos : Anteriores
    $id_mascota = $_POST['id_mascota'];
    $id_dueño = $_POST['id_dueño'];
    $veterinario_id = $_SESSION['user_id'];

    /*
    if (!empty($_POST['sintomas']) && !empty($_POST['receta'])) {
        
        $mensaje_registro = "Empty";
        $consultaController = new ConsultaController();

        $sintomas = $_POST['sintomas'];
        
        //Imagen
        $nombre_imagen = $_FILES['inspeccion']['name'];
        $tipo_imagen = $_FILES['inspeccion']['type'];
        $tamaño_imagen = $_FILES['inspeccion']['size'];

        //Seleccionar carpeta de destino
        $carpeta_destino = $_SERVER['DOCUMENT_ROOT'].'/intranet/uploads/';
        //Mover imagen de directorio temporal al directorio escogido
        move_uploaded_file($_FILES['inspeccion']['tmp_name'],$carpeta_destino.$nombre_imagen);
        $inspeccion = $carpeta_destino.$nombre_imagen;

        $resultados =  $_POST['receta'];

        echo 'Sintomas: '.$sintomas;
        echo 'Resultados: '.$resultados;
    
        $mensaje_registro = $consultaController->registrarConsulta(
            $id_mascota,
            $veterinario_id,
            $sintomas,
            $inspeccion,
            $resultados
        );

    }
    */

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
            if($mensaje_registro == "Registrado"){
                echo '<h1>Registro Exitoso</h1>';
            }else{
                echo '<h1>Hubo Un Error</h1>';
            }
            //echo ''.$usuarios_lista;
        ?>
    <?php endif; ?>



    <form action="factura-register-view.php" method="POST" enctype="multipart/form-data">
        <!-- <h3>Crear Consulta</h3> -->
        <h3>Informacion Consulta</h3>
    
        <div class="seccion">
            <label for="apellido_paterno">Sintomas Presentados</label>
            <textarea id="sintomas" name="sintomas" rows="5" cols="30"></textarea></p>
        </div>

        <div class="seccion">
            <label for="txtSintomas">Receta Médica</label>
            <textarea id="receta" name="receta" rows="5" cols="30"></textarea></p>
        </div>

        <!-- Archivo imagen -->
        <div class="seccion">
            <label for="inspeccion">Inspeccion Realizada</label>
            <input type="file" name="inspeccion" id="inspeccion" size="20">
        </div>

        <input id="id_mascota" name="id_mascota" type="hidden" value="<?=$id_mascota?>">
        <input id="id_dueño" name="id_dueño" type="hidden" value="<?=$id_dueño?>">
        <input id="veterinario_id" name="veterinario_id" type="hidden" value="<?=$veterinario_id?>">

        <div id="opciones">
            <input name="Registrar" Type=Submit value="Siguiente">
            <input Type=Submit value="Cancelar"></p>    
        </div>
    </form>

    <div class="graf">
        <img id="perrito" src="../img/fondo-7.png" alt="perrito-1">
    </div>


</body>
</html>