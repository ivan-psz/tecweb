<?php

    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $products = new Products('marketzone');

    $products->single($_POST['id']);
    echo $products->getData();

    /*
    include_once __DIR__.'/database.php';

    if( isset($_POST['id']) ) {
        $id = $_POST['id'];
        
        $query = "SELECT * FROM productos WHERE id = {$id}";
        $result = mysqli_query($conexion, $query);

        if($conexion->query($query)){
            $json = array();
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
        else{
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($json[0], JSON_PRETTY_PRINT);
    */
?>