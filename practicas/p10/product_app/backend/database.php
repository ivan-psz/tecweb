<?php
    $conexion = @mysqli_connect(
        'localhost',
        'root',
        '.YcPHLGg]QCW-fX/',
        'marketzone'
    );

    /**
     * NOTA: si la conexión falló $conexion contendrá false
     **/
    if(!$conexion) {
        die('¡Base de datos NO conextada!');
    }
?>