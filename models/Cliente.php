<?php
    require_once "Conexion.php";
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }   

    class Cliente extends Conexion{
        public $id = "";
        public $apellido_paterno="";
        public $apellido_materno="";
        public $nombres="";
        
        public $username="";
        public $password="";

        public $email="";
        public $genero="";
        public $telefono="";
        public $direccion="";

        public function __construct(){

            parent::__construct();

        }

        public function get_usuarios(){

            $resultado = $this->conn->query("SELECT * FROM APODERADOS");
            if(mysqli_num_rows($resultado) > 0){
                $apoderados = $resultado->fetch_all(MYSQLI_ASSOC);
                return $apoderados;
            }else{
                return "No filas";
            }

        }

        public function registrar_cliente(){

            $v1 = $this->apellido_paterno;
            $v2 = $this->apellido_materno;
            $v3 = $this->nombres;
            $v4 = $this->username;

            $v5 = md5($this->password);
            $v6 = $this->email;
            $v7 = $this->genero;
            $v8 = $this->telefono;

            $v9 = $this->direccion;

            $sql = "INSERT INTO APODERADOS(APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,USERNAME,PASSWORD,EMAIL,GENERO,TELEFONO,DIRECCION)";
            $sql .= "VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', '$v8', '$v9')";

            $resultado = $this->conn->query($sql);

            if($resultado){
                return "Registrado";
            }else{
                return "Empty";
            }

        }

        public function login_cliente($password_front, $password_BD, $id_BD){

            if(md5($password_front) == $password_BD){
                $_SESSION['user_id'] = $id_BD;
                echo "EXISTE";
                return "Logeado";
            }else{
                return "Contraseña Incorrecta";
            }

        }

        public function get_by_username($username){
            $v1 = $username;
            $sql = 'SELECT * FROM APODERADOS WHERE USERNAME = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $usuarioModel = new Cliente();

            if(mysqli_num_rows($resultado) > 0){

                $usuarioObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

                    $usuarioModel->id = $usuarioObjeto[0]['ID'];
                    $usuarioModel->apellido_paterno = $usuarioObjeto[0]['APELLIDO_PATERNO'];
                    $usuarioModel->apellido_materno = $usuarioObjeto[0]['APELLIDO_MATERNO'];
                    $usuarioModel->nombres = $usuarioObjeto[0]['NOMBRES'];
                    $usuarioModel->username = $usuarioObjeto[0]['USERNAME'];
                    $usuarioModel->password = $usuarioObjeto[0]['PASSWORD'];
                    $usuarioModel->email = $usuarioObjeto[0]['EMAIL'];
                    $usuarioModel->genero = $usuarioObjeto[0]['GENERO'];
                    $usuarioModel->telefono = $usuarioObjeto[0]['TELEFONO'];

                    $usuarioModel->direccion = $usuarioObjeto[0]['DIRECCION'];

                    return $usuarioModel;
            }else{
                return $usuarioModel;
            }
        }


        public function get_by_id($id){
            $v1 = $id;
            $sql = 'SELECT * FROM APODERADOS WHERE ID = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $usuarioModel = new Cliente();

            if(mysqli_num_rows($resultado) > 0){

                $usuarioObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

                    $usuarioModel->id = $usuarioObjeto[0]['ID'];
                    $usuarioModel->apellido_paterno = $usuarioObjeto[0]['APELLIDO_PATERNO'];
                    $usuarioModel->apellido_materno = $usuarioObjeto[0]['APELLIDO_MATERNO'];
                    $usuarioModel->nombres = $usuarioObjeto[0]['NOMBRES'];
                    $usuarioModel->username = $usuarioObjeto[0]['USERNAME'];
                    $usuarioModel->password = $usuarioObjeto[0]['PASSWORD'];
                    $usuarioModel->email = $usuarioObjeto[0]['EMAIL'];
                    $usuarioModel->genero = $usuarioObjeto[0]['GENERO'];
                    $usuarioModel->telefono = $usuarioObjeto[0]['TELEFONO'];

                    $usuarioModel->direccion = $usuarioObjeto[0]['DIRECCION'];

                    return $usuarioModel;
            }else{
                return $usuarioModel;
            }


        }

    }



?>