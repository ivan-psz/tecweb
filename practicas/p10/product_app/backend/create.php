<?php
    include_once __DIR__.'/database.php';

    $producto = file_get_contents('php://input');
    if(!empty($producto)){
        $jsonObj = json_decode($producto);

        echo var_dump($jsonObj);

        if(is_null($jsonObj)){
            echo 'Error en el formato del JSON';
            exit;
        }
        else{
            $query = "SELECT * FROM productos WHERE nombre = '{$jsonObj->nombre}' AND eliminado = 0";
            if($result = $conexion->query($query)){
                if($result->num_rows > 0){
                    echo "El producto ya existe dentro de la base de datos";
                }
                else{
                    $nombre = $jsonObj->nombre;
                    $marca = $jsonObj->marca;
                    $modelo = $jsonObj->modelo;
                    $precio = $jsonObj->precio;
                    $detalles = $jsonObj->detalles;
                    $unidades = $jsonObj->unidades;
                    $ruta = $jsonObj->imagen;

                    $query = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) VALUES ('{$nombre}', '{$marca}', '{$modelo}', '{$precio}', '{$detalles}', '{$unidades}', '{$ruta}')";
                    if($conexion->query($query)){
                        echo "Producto insertado";
                    }
                    else{
                        echo "Error al insertar el producto";
                    }
                }
                $result -> free();
                $conexion->close();
                echo '[SERVIDOR] Nombre: ' . $jsonObj -> nombre;
            }
            else{
                die('Error en la consulta: ' . mysqli_error($conexion));
            }
        }
    }
    else{
        die('No se pudo obtener la información del producto');
    }
?>