<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();
    // SE VERIFICA HABER RECIBIDO EL ID
    if( isset($_POST['parametro']) ) {
        $p = $_POST['parametro'];
        // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
        if ( $result = $conexion->query("SELECT * FROM productos WHERE nombre LIKE '%{$p}%' OR marca LIKE '%{$p}%' OR detalles LIKE '%{$p}%'") ) {
            // SE OBTIENEN LOS RESULTADOS
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                $data[] = $row; // Agrega cada fila al array $data
            }
			$result->free();
		} else {
            die('Query Error: '.mysqli_error($conexion));
        }
		$conexion->close();
    } 
    
    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>