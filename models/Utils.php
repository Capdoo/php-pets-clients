
<?php
    require_once "Conexion.php";

    class Utils extends Conexion{
        public $utileria = "";


        public function __construct(){
            parent::__construct();
        }



        public function verificar_contraseña($clave){
            $message2 = "";
            $error_clave="Empty";

            if(strlen($clave) < 8){
                $error_clave = "La clave debe tener al menos 6 caracteres";
                $message2 = 'pass';
             }
             if(strlen($clave) > 16){
                $error_clave = "La clave no puede tener más de 16 caracteres";
                $message2 = 'pass';
             }
             if (!preg_match('`[a-z]`',$clave)){
                $error_clave = "La clave debe tener al menos una letra minúscula";
                $message2 = 'pass';
             }

             if (!preg_match('`[A-Z]`',$clave)){
                $error_clave = "La clave debe tener al menos una letra mayúscula";
                $message2 = 'pass';
             }
             if (!preg_match('`[0-9]`',$clave)){
                $error_clave = "La clave debe tener al menos un caracter numérico";
                $message2 = 'pass';
             }

             return $error_clave;
            

        }



    }


?>
