<?php
    require_once "Conexion.php";
    //session_start();    

    class Consulta extends Conexion{
        public $id = "";
        public $perro_id="";
        public $veterinario_id="";

        public $sintomas="";
        public $inspeccion="";
        public $resultados="";

        public function __construct(){

            parent::__construct();

        }

        public function get_consultas(){

            $resultado = $this->conn->query("SELECT * FROM CONSULTAS");
            if(mysqli_num_rows($resultado) > 0){
                $consultas = $resultado->fetch_all(MYSQLI_ASSOC);
                return $consultas;
            }else{
                return "No filas";
            }

        }

        public function registrar_consulta(){

            $v1 = $this->perro_id;
            $v2 = $this->veterinario_id;

            $v3 = $this->sintomas;
            $v4 = $this->inspeccion;
            $v5 = $this->resultados;

            $sql = "INSERT INTO CONSULTAS(PERRO_ID, VETERINARIO_ID, SINTOMAS, INSPECCION, RESULTADOS)";
            $sql .= "VALUES ('$v1', '$v2', '$v3', '$v4', '$v5')";

            $resultado = $this->conn->query($sql);

            if($resultado){
                return "Registrado";
            }else{
                return "Empty";
            }
        }

        public function get_by_perro_id($perro_id){
            $v1 = $perro_id;
            $sql = 'SELECT * FROM CONSULTAS WHERE PERRO_ID = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $consultaModel = new Consulta();

            if(mysqli_num_rows($resultado) > 0){

                $consultaObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

                    $consultaModel->id = $consultaObjeto[0]['ID'];
                    $consultaModel->perro_id = $consultaObjeto[0]['PERRO_ID'];
                    $consultaModel->veterinario_id = $consultaObjeto[0]['VETERINARIO_ID'];
                    $consultaModel->sintomas = $consultaObjeto[0]['SINTOMAS'];
                    $consultaModel->inspeccion = $consultaObjeto[0]['INSPECCION'];
                    $consultaModel->resultados = $consultaObjeto[0]['RESULTADOS'];

                    return $consultaModel;
            }else{
                return $consultaModel;
            }
        }
    
    
    }
?>