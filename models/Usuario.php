<?php
    require_once "Conexion.php";
    session_start();    

    class Usuario extends Conexion{
        public $id = "";
        public $apellido_paterno="";
        public $apellido_materno="";
        public $nombres="";
        
        public $username="";
        public $password="";

        public $email="";
        public $genero="";
        public $telefono="";
        

        public function __construct(){

            parent::__construct();

        }

        public function get_usuarios(){
            //echo ''.$this->conn;
            $resultado = $this->conn->query("SELECT * FROM USUARIOS");
            if(mysqli_num_rows($resultado) > 0){
                $usuarios = $resultado->fetch_all(MYSQLI_ASSOC);
                return $usuarios;
            }else{
                return "No filas";
            }

        }

        public function registrar_usuario($rol_nombre){
            //echo ''.$this->conn;
            $v1 = $this->apellido_paterno;
            $v2 = $this->apellido_materno;
            $v3 = $this->nombres;
            $v4 = $this->username;

            $v5 = md5($this->password);
            $v6 = $this->email;
            $v7 = $this->genero;
            $v8 = $this->telefono;

            $sql = "INSERT INTO USUARIOS(APELLIDO_PATERNO,APELLIDO_MATERNO,NOMBRES,USERNAME,PASSWORD,EMAIL,GENERO,TELEFONO)";
            $sql .= "VALUES ('$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$v7', '$v8')";

            $resultado = $this->conn->query($sql);

            //Obteniendo el id
            $id = ($this->get_by_username($this->username))->id;
            $rol_id = 0;

            if($rol_nombre == "superadmin"){
                $rol_id = 1;
            }
            elseif($rol_nombre == "admin"){
                $rol_id = 2;
            }else{
                $rol_id = 3;
            }


            //Registrar el rol
            $sql_2 = "INSERT INTO USUARIOS_ROLES(USUARIO_ID,ROL_ID)";
            $sql_2 .= "VALUES ('$id', '$rol_id')";

            $resultado_2 = $this->conn->query($sql_2);

            if($resultado_2){
                return "Registrado";
            }else{
                return "Empty";
            }

        }

        public function login_usuario($password_front, $password_BD, $id_BD){

            if(md5($password_front) == $password_BD){
                $_SESSION['user_id'] = $id_BD;
                
                return "Logeado";
            }else{
                return "Contraseña Incorrecta";
            }

        }

        public function get_by_username($username){
            $v1 = $username;
            $sql = 'SELECT * FROM USUARIOS WHERE USERNAME = "'.$v1.'"';

            $resultado = $this->conn->query($sql);
            $usuarioObjeto = $resultado->fetch_all(MYSQLI_ASSOC);

            $usuarioModel = new Usuario();
                $usuarioModel->id = $usuarioObjeto[0]['ID'];
                $usuarioModel->apellido_paterno = $usuarioObjeto[0]['APELLIDO_PATERNO'];
                $usuarioModel->apellido_materno = $usuarioObjeto[0]['APELLIDO_MATERNO'];
                $usuarioModel->nombres = $usuarioObjeto[0]['NOMBRES'];
                $usuarioModel->username = $usuarioObjeto[0]['USERNAME'];
                $usuarioModel->password = $usuarioObjeto[0]['PASSWORD'];
                $usuarioModel->email = $usuarioObjeto[0]['EMAIL'];
                $usuarioModel->genero = $usuarioObjeto[0]['GENERO'];
                $usuarioModel->telefono = $usuarioObjeto[0]['TELEFONO'];

            return $usuarioModel;
        }

        public function obtener_rol($id){
            $v1 = $id;
            $sql = 'SELECT ROL_ID FROM USUARIOS_ROLES WHERE USUARIO_ID = "'.$v1.'"';
            $resultado = $this->conn->query($sql);

            $resultado = $resultado->fetch_all(MYSQLI_ASSOC);

            print_r($resultado);
            if($resultado){
                return $resultado[0]['ROL_ID'];
            }else{
                return "Empty";
            }
        }

    }



?>