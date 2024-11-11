<?php

    namespace TECWEB\MYAPI\Create;
    use TECWEB\MYAPI\DataBase;
    require_once __DIR__ . '/../../vendor/autoload.php';

    class Create extends DataBase{

        public function __construct($db, $user = 'root', $pass = '.YcPHLGg]QCW-fX/'){
            parent::__construct($user, $pass, $db);
        }

        public function add($producto){
            $this->data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );

            if(!empty($producto)) {
                // SE ASUME QUE LOS DATOS YA FUERON VALIDADOS ANTES DE ENVIARSE
                $sql = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $this->conexion->set_charset("utf8");
                    $sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$producto->nombre}', '{$producto->marca}', '{$producto->modelo}', {$producto->precio}, '{$producto->detalles}', {$producto->unidades}, '{$producto->imagen}')";
                    if($this->conexion->query($sql)){
                        $this->data['status'] =  "success";
                        $this->data['message'] =  "Producto agregado";
                    } else {
                        $data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }
        
                $result->free();
            }

            $this->conexion->close();
        }

    }

?>