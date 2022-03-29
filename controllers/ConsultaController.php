<?php
    
    require_once "../models/Mascota.php";
    require_once "../models/Cliente.php";
    require_once "../models/Consulta.php";
    require_once "../models/Factura.php";

    class ConsultaController{

        public function __construct(){

        }

        public function registrarConsulta($perro_id, $veterinario_id, $sintomas, $inspeccion, $resultados){
            //Creamos la instancia
            $consultaModel = new Consulta();
                $consultaModel->perro_id = $perro_id;
                $consultaModel->veterinario_id = $veterinario_id;
                $consultaModel->sintomas = $sintomas;
                $consultaModel->inspeccion = $inspeccion;
                $consultaModel->resultados = $resultados;
            //Llamar metodo
            return $consultaModel->registrar_consulta();
        }

        public function obtenerConsultaPorPerroId($perro_id){
            //Creamos la instancia
            $consultaModel = new Consulta(); //Building
            $consultaObtenida = $consultaModel->get_by_perro_id($perro_id);
            return $consultaObtenida;
        }

        public function obtener_dueño(){
            
        }

    }



?>