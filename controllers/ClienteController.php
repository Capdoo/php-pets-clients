<?php
    
    require_once "../models/Cliente.php";

    class ClienteController{

        public function __construct(){

        }

        public function registrarCliente($apellido_paterno, $apellido_materno, $nombres, $username, $password, $email, $telefono, $direccion, $genero){
            //Creamos la instancia
            $clienteModel = new Cliente();
                $clienteModel->apellido_paterno = $apellido_paterno;
                $clienteModel->apellido_materno = $apellido_materno;
                $clienteModel->nombres = $nombres;
                $clienteModel->username = $username;
                $clienteModel->password = $password;
                $clienteModel->email = $email;
                $clienteModel->telefono = $telefono;
                $clienteModel->direccion = $direccion;
                $clienteModel->genero = $genero;

            //Llamar metodo
            return $clienteModel->registrar_cliente();
        }


        public function loginCliente($username, $password_front){
            //Creamos la instancia
            $respuesta = "";
            $clienteModel = new Cliente();
            $clienteObtenido = $clienteModel->get_by_username($username);

            //Para ver si existe el usuario
            if($clienteObtenido->id){
                $password_BD = $clienteObtenido->password;
                $id_BD = $clienteObtenido->id;
                $respuesta = $clienteObtenido->login_cliente($password_front, $password_BD, $id_BD);
            }else{
                $respuesta = "Ese Usuario No Existe";
            }
            return $respuesta;
        }

        public function obtenerClientePorId($id){
            //Creamos la instancia
            $respuesta = "";
            $clienteModel = new Cliente();
            $clienteObtenido = $clienteModel->get_by_id($id);

            //Para ver si existe el usuario
            if($clienteObtenido->nombres){
                $respuesta = $clienteObtenido;
                //$respuesta = $clienteObtenido->login_cliente($password_front, $password_BD, $id_BD);
            }else{
                $respuesta = "Ese Usuario No Existe";
            }
            return $respuesta;
        }


        public function obtenerNombreCliente($clienteModel){
            //Creamos la instancia
            $respuesta = "";

            $apellido_paterno = $clienteModel->apellido_paterno;
            $apellido_materno = $clienteModel->apellido_materno;
            $nombres = $clienteModel->nombres;

            $respuesta = ''.$apellido_paterno.' '.$apellido_materno.' '.$nombres;

            return $respuesta;
        }


    }



?>