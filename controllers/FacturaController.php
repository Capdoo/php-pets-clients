<?php
    
    require_once "../models/Mascota.php";
    require_once "../models/Cliente.php";
    require_once "../models/Consulta.php";
    require_once "../models/Factura.php";

    class FacturaController{

        public function __construct(){

        }

        public function registrarFactura($consulta_id, $precio, $fecha){
            //Creamos la instancia
            $facturaModel = new Factura();
                $facturaModel->consulta_id = $consulta_id;
                $facturaModel->precio = $precio;
                $facturaModel->fecha = $fecha;

            //Llamar metodo
            return $facturaModel->registrar_factura();
        }

        public function obtenerFacturaPorConsultaId($consulta_id){
            //Creamos la instancia
            $facturaModel = new Factura(); //Building
            $facturaObtenida = $facturaModel->get_by_consulta_id($consulta_id);
            return $facturaObtenida;
        }


    }



?>