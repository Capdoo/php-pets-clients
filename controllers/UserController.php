<?php

    require_once "../models/Usuario.php";

    // class UserController extends Usuario{
    class UserController{

        public function __construct(){
            //parent::__construct();
        }

        public function registrarUsuario($apellido_paterno, $apellido_materno, $nombres, $username, $password, $email, $genero, $telefono, $rol){
            //Creamos la instancia
            $usuarioModel = new Usuario();
            $rol_nombre = "";

            $usuarioModel->apellido_paterno = $apellido_paterno;
            $usuarioModel->apellido_materno = $apellido_materno;
            $usuarioModel->nombres = $nombres;
            $usuarioModel->username = $username;
            $usuarioModel->password = $password;
            $usuarioModel->email = $email;
            $usuarioModel->genero = $genero;
            $usuarioModel->telefono = $telefono;

            if($rol == "admin"){
                $rol_nombre = "admin";
            }
            elseif ($rol == "veterinario") {
                $rol_nombre = "veterinario";
            }else{
                $rol_nombre = "superadmin";
            }

            //Llamar metodo
            return $usuarioModel->registrar_usuario($rol_nombre);
        }


        public function loginUsuario($username, $password_front){
            //Creamos la instancia
            $respuesta = "";
            $usuarioModel = new Usuario();
            $usuarioObtenido = $usuarioModel->get_by_username($username);

            //Para ver si existe el usuario
            if($usuarioObtenido->id){
                $password_BD = $usuarioObtenido->password;
                $id_BD = $usuarioObtenido->id;
                $respuesta_login = $usuarioModel->login_usuario($password_front, $password_BD, $id_BD);

                if($respuesta_login == "Logeado"){
                    $respuesta = $usuarioModel->obtener_rol($usuarioObtenido->id);
                }else{
                    $respuesta = $respuesta_login;
                }

            }else{
                $respuesta = "Ese Usuario No Existe";
            }
            return $respuesta;
        }

        public function cerrarSesion(){

        }


    }



?>