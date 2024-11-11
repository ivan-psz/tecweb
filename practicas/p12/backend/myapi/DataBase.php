<?php
    namespace TECWEB\MYAPI;

    abstract class DataBase {
        protected $conexion;
        protected $data = NULL;

        public function __construct($user, $pass, $db) {
            $this->conexion = @mysqli_connect(
                'localhost',
                $user,
                $pass,
                $db
            );

            $this->data = array();
        
            /**
             * NOTA: si la conexión falló $conexion contendrá false
             **/
            if(!$this->conexion) {
                die('¡Base de datos NO conextada!');
            }
            /*else {
                echo 'Base de datos encontrada';
            }*/
        }

        public function getData(){
            return json_encode($this->data, JSON_PRETTY_PRINT);
        }

    }
?>