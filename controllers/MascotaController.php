<?php
    
    require_once "../models/Mascota.php";
    require_once "../models/Cliente.php";

    class MascotaController{

        public function __construct(){

        }

        public function registrarMascota($nombre, $edad, $raza, $genero, $id_cliente){
            //Creamos la instancia
            $mascotaModel = new Mascota();
                $mascotaModel->nombre = $nombre;
                $mascotaModel->edad = $edad;
                $mascotaModel->raza = $raza;
                $mascotaModel->genero = $genero;
                $mascotaModel->apoderado_id = $id_cliente;
            //Llamar metodo
            return $mascotaModel->registrar_mascota();
        }

        public function obtenerMascotaPorNombre($nombre){
            //Creamos la instancia
            $mascotaModel = new Mascota();
            $mascotaObtenida = $mascotaModel->get_by_name($nombre);
            return $mascotaObtenida;
        }

        public function obtener_dueño(){
            
        }

    }



?>