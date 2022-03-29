<?php
    require_once "Conexion.php";
    //session_start();    

    class Mascota extends Conexion{
        public $id = "";
        public $nombre="";
        public $apoderado_id="";

        public $raza="";
        public $genero="";
        public $edad="";

        public function __construct(){

            parent::__construct();

        }

        public function get_mascotas(){

            $resultado = $this->conn->query("SELECT * FROM PERROS");
            if(mysqli_num_rows($resultado) > 0){
                $mascotas = $resultado->fetch_all(MYSQLI_ASSOC);
                return $mascotas;
            }else{
                return "No filas";
            }

        }

        public function registrar_mascota(){

            $v1 = $this->nombre;
            $v2 = $this->apoderado_id;
            $v3 = $this->raza;
            $v4 = $this->genero;
            $v5 = $this->edad;



            $sql = "INSERT INTO PERROS(NOMBRE, APODERADO_ID, RAZA, GENERO, EDAD)";
            $sql .= "VALUES ('$v1', '$v2', '$v3', '$v4', '$v5')";

            $resultado = $this->conn->query($sql);

            if($resultado){
                return "Registrado";
            }else{
                return "Empty";
            }

        }

        public function get_by_name($nombre){
            $v1 = $nombre;
            $sql = 'SELECT * FROM PERROS WHERE NOMBRE = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $mascotaModel = new Mascota();

            if(mysqli_num_rows($resultado) > 0){

                $mascotaObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

                    $mascotaModel->id = $mascotaObjeto[0]['ID'];
                    $mascotaModel->nombre = $mascotaObjeto[0]['NOMBRE'];
                    $mascotaModel->apoderado_id = $mascotaObjeto[0]['APODERADO_ID'];
                    $mascotaModel->raza = $mascotaObjeto[0]['RAZA'];
                    $mascotaModel->genero = $mascotaObjeto[0]['GENERO'];
                    $mascotaModel->edad = $mascotaObjeto[0]['EDAD'];

                    return $mascotaModel;
            }else{
                return $mascotaModel;
            }
        }


    }



?>