<?php

    namespace TECWEB\MYAPI\Update;
    use TECWEB\MYAPI\DataBase;
    include_once __DIR__ . '/../../vendor/autoload.php';

    class Update extends DataBase{

        public function __construct($db, $user = 'root', $pass = '.YcPHLGg]QCW-fX/'){
            parent::__construct($user, $pass, $db);
        }

        public function edit($producto){
            $this->data = array(
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            );
            
            if(!empty($producto)) {
                $sql = "SELECT * FROM productos WHERE nombre = '{$producto->nombre}' AND eliminado = 0 AND id != '{$producto->id}'";
                $result = $this->conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $this->conexion->set_charset("utf8");
                    $sql = "UPDATE productos SET nombre = '{$producto->nombre}', marca = '{$producto->marca}', modelo = '{$producto->modelo}', precio = {$producto->precio}, detalles = '{$producto->detalles}', unidades = {$producto->unidades}, imagen = '{$producto->imagen}' WHERE id = '{$producto->id}'";
                    if($this->conexion->query($sql)){
                        $this->data['status'] =  "success";
                        $this->data['message'] =  "Producto editado";
                    } else {
                        $this->data['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($this->conexion);
                    }
                }
        
                $result->free();
            }

            $this->conexion->close();
        }

    }


?>