<?php
    require_once "Conexion.php";
    //session_start();    

    class Factura extends Conexion{
        public $id = "";

        public $consulta_id="";
        public $precio="";
        public $fecha="";

        public function __construct(){

            parent::__construct();

        }

        public function get_facturas(){

            $resultado = $this->conn->query("SELECT * FROM FACTURAS");
            if(mysqli_num_rows($resultado) > 0){
                $facturas = $resultado->fetch_all(MYSQLI_ASSOC);
                return $facturas;
            }else{
                return "No filas";
            }

        }

        public function registrar_factura(){

            $v1 = $this->consulta_id;
            $v2 = $this->precio;
            $v3 = $this->fecha;

            $sql = "INSERT INTO FACTURAS(CONSULTA_ID, PRECIO, FECHA)";
            $sql .= "VALUES ('$v1', '$v2', '$v3')";

            $resultado = $this->conn->query($sql);

            if($resultado){
                return "Registrado";
            }else{
                return "Empty";
            }
        }

        public function get_by_consulta_id($consulta_id){
            $v1 = $consulta_id;
            $sql = 'SELECT * FROM FACTURAS WHERE CONSULTA_ID = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $facturaModel = new Factura();

            if(mysqli_num_rows($resultado) > 0){

                $facturaObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

                    $facturaModel->id = $facturaObjeto[0]['CONSULTA_ID'];
                    $facturaModel->perro_id = $facturaObjeto[0]['PRECIO'];
                    $facturaModel->veterinario_id = $facturaObjeto[0]['FECHA'];

                    return $facturaModel;
            }else{
                return $facturaModel;
            }
        }
    
    
    }
?>