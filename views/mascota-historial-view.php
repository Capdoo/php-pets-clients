<?php
    session_unset();
    //session_destroy();
    session_start();
    $id_cliente = $_SESSION['user_id'];
    
    require_once "../controllers/MascotaController.php";
    require_once "../controllers/ConsultaController.php";
    require_once "../controllers/FacturaController.php";

    $mensaje_busqueda = "Empty";
    
    if (!empty($_POST['nombre'])) {

        $mascota_nombre = "";
        $mascota_raza = "";

        $consultaController = new ConsultaController();
        $facturaController = new FacturaController();
        $mascotaController = new MascotaController();
        
        $nombre = $_POST['nombre'];
    
        $mascota_obtenida = $mascotaController->obtenerMascotaPorNombre(
            $nombre
        );

        if($mascota_obtenida->id){

            $mascota_nombre = $mascota_obtenida->nombre;
            $mascota_raza = $mascota_obtenida->raza;

            $mensaje_busqueda = "Encontrado";
        }
        $mensaje = $mensaje_busqueda;

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
            if($mensaje_busqueda == "Encontrado"){
                echo '<h1>Mascota Encontrada</h1>';
            }else{
                echo '<h1>Hubo Un Error</h1>';
            }
        ?>
    <?php endif; ?>


    <?php if(!empty($mascota_obtenida)): ?>


        <h1>Nombre: <?= $mascota_nombre ?></h1>
        <h1>Raza: <?= $mascota_raza ?></h1>
        <h1>Factura: 250</h1>
    <!--
        <h1>Aca irian los datos</h1>

        <table class="table table-hover my-5">
      
      <colgroup>
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 60%;">
          <col span="1" style="width: 15%;">
          <col span="1" style="width: 10%;">
       </colgroup>
      <thead class="thead-light">
          <tr class="table-light">
              <th scope="col">Nombre</th>
              <th scope="col">Raza</th>
              <th scope="col">Genero</th>
              <th scope="col">Edad</th>
              <th scope="col">Consulta</th>
              <th scope="col">Factura</th>
          </tr>
      </thead>
      <tbody>
        <?php
          //$tipoTrabajo = $_POST['tipoDeTrabajo'];
        /*
          $especialidad = $_POST['rubro'];
          $sql = "SELECT INT_TECID, VCH_TECPATERNO, VCH_TECMATERNO, VCH_TECNOMBRES,
                         VCH_TECESPECIALIDAD, DEC_TECHONORARIOS, VCH_TECRESIDENCIA 
                         FROM tecnicos WHERE VCH_TECESPECIALIDAD= '$especialidad'";
          $result = mysqli_query($conn2,$sql); 

          while($mostrar=mysqli_fetch_array($result)){
            $idPerTec = $mostrar['INT_TECID'];
        */  
        ?>
        <tr>
              <td class="table-light"><?php echo $mostrar['VCH_TECPATERNO']?></td>
              <td class="table-light"><?php echo $mostrar['VCH_TECMATERNO']?></td>
              <td class="table-light"><?php echo $mostrar['VCH_TECNOMBRES']?></td>
              <td class="table-warning"><?php echo $mostrar['VCH_TECESPECIALIDAD']?></td>
              <td class="table-warning"><?php echo $mostrar['VCH_TECRESIDENCIA']?></td>
              <td class="table-warning"><?php echo $mostrar['VCH_TECRESIDENCIA']?></td>
          </tr>
      
      <?php
        //}
      ?>
      

        </tbody>
    </table>

    -->
          
    <?php else: ?>
        <h1>Aca iria el form</h1>

        <form action="mascota-historial-view.php" method="POST">
            <h3>Buscar Mascota</h3>

            <div class="seccion">
                <label for="nombre">Ingresar Nombre</label>
                <input name="nombre" id="codigo" Type Text></p>
            </div>

            <div id="opciones">
                <input name="Registrar" Type=Submit value="Registrar">
                <input Type=Submit value="Cancelar"></p>    
            </div>
        </form>
    <?php endif; ?>




    <div class="graf">
        <img id="perrito" src="../img/fondo-3.png" alt="perrito-1">
    </div>


</body>
</html>