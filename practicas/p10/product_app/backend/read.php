<?php
    include_once __DIR__.'/database.php';
    $data = array();

    if(isset($_POST['parametro'])){
        $p = $_POST['parametro'];

        if($result = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%{$p}%' OR marca LIKE '%{$p}%' OR detalles LIKE '%{$p}%'")){
            while ($row = $result -> fetch_array(MYSQLI_ASSOC)) {
                $data[] = $row;
            }

            $result -> free();
        }
        else{
            die('Error en la consulta: ' . mysqli_error($conexion));
        }
        $conexion -> close();

        echo json_encode($data, JSON_PRETTY_PRINT);
    }
    else{
        die('¡Parametro NO enviado');
    }
    
?>

