<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    echo "".$_SESSION['user_id'];

    require_once "../controllers/ConsultaController.php";
    require_once "../controllers/FacturaController.php";

    //Datos supra-anteriores
    if(!empty($_POST['id_mascota']) && !empty($_POST['id_dueño']) && !empty($_SESSION['user_id'])){
        echo 'DENTRO DE DATA INICIAL';
        $id_mascota = $_POST['id_mascota'];
        $id_dueño = $_POST['id_dueño'];
        $veterinario_id = $_SESSION['user_id'];
        echo 'FIN DE DATA INICIAL';
    }

    //Para la factura, guardar consulta_id
    $consulta_id = "";

    //Datos anteriores
    if (!empty($_POST['sintomas']) && !empty($_POST['receta'])) {
        echo 'DENTRO DE GUARDAR CONSULTA';

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

        //Para obtener consulta id
        $consultaController = new ConsultaController();
        $consultaObtenida = $consultaController->obtenerConsultaPorPerroId($id_mascota);
        $consulta_id = $consultaObtenida->id;

        echo 'FINAL DE GUARDAR CONSULTA';
    }

    //$consulta_id = $consulta_id;

    //Para guardar Factura
    if (!empty($_POST['precio']) && !empty($_POST['fecha'])) {
        echo 'DENTRO DE GUARDAR FACTURA';
        $mensaje_registro_factura = "Empty";

        $facturaController = new FacturaController();

        $consulta_id = $_POST['consulta_id'];
        $precio = $_POST['precio'];
        $fecha = $_POST['fecha'];

        $mensaje_registro_factura = $facturaController->registrarFactura(
            $consulta_id, //hidden
            $precio,
            $fecha
        );
        echo 'FINAL DE GUARDAR FACTURA';
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
    <title>Registrar Factura</title>
</head>
<body>

    <!-- No Sesion -->
    <?php require '../partials/header-adminvet-panel.php' ?>

    <?php if(!empty($mensaje_registro_factura)): ?>
        <?php 
            if($mensaje_registro_factura == "Registrado"){
                echo '<h1>Factura Registrada</h1>';
            }else{
                echo '<h1>Hubo Un Error</h1>';
            }
        ?>
    <?php endif; ?>



    <form action="factura-register-view.php" method="POST">
        <!-- <h3>Crear Consulta</h3> -->
        <h3>Factura</h3>
    
        <div class="seccion">
            <label for="precio">Ingrese Monto</label>
            <input id="precio" name="precio" type="text">
        </div>

        <div class="seccion">
            <label for="fecha">Ingrese la Fecha</label>
            <input type="date" id="fecha" name="fecha">
        </div>

        <input id="consulta_id" name="consulta_id" type="hidden" value="<?=$consulta_id?>">

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