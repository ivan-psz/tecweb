<?php

    include_once __DIR__.'/database.php';

    $data = array(
        'status'  => 'success',
        'message' => 'El producto no existe en la base de datos'
    );

    if( isset($_POST['name']) ) {
        $name = $_POST['name'];
        
        $query = "SELECT * FROM productos WHERE nombre LIKE '%{$name}%'";
        $result = mysqli_query($conexion, $query);

        if ($result->num_rows != 0) {
            $data = array(
                'status'  => 'error',
                'message' => 'El producto ya existe en la base de datos'
            );
        }

        $conexion->close();
    } 

    echo json_encode($data, JSON_PRETTY_PRINT);

?>