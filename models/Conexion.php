<?php

    class Conexion{

        protected $conn;
        public $server = 'localhost:3306';
        public $username = 'root';
        public $password = '';
        public $database = 'veterinaria';


        public function __construct(){

            $server = 'localhost:3306';
            $username = 'root';
            $password = '';
            $database = 'veterinaria';

            $this->conn = new mysqli($server, $username, $password, $database);
            if($this->conn->connect_errno){
                echo "Fallo al conectar a BD" . $this->conn->connect_error;
                return;
            }
        }

    }


?>