<?php
    include_once __DIR__.'/database.php';

    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        
        $query = "SELECT * FROM productos WHERE id = {$id}";
        $result = mysqli_query($conexion, $query);

        if(!result){
            die('Query Error: '.mysqli_error($conexion));
        }
        else{
            while($row = mysqli_fetch_array($result)){
                $json[] = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'precio' => $row['precio'],
                    'unidades' => $row['unidades'],
                    'modelo' => $row['modelo'],
                    'marca' => $row['marca'],
                    'detalles' => $row['detalles'],
                    'imagen' => $row['imagen']
                );
            }
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($json[0], JSON_PRETTY_PRINT);
?>