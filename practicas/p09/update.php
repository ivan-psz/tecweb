<?php
        /* MySQL Conexion */
    @$link = new mysqli('localhost', 'root', '.YcPHLGg]QCW-fX/', 'marketzone');

        // Verificar si la conexión fue exitosa
    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error . '<br/>');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comprobar que los campos necesarios están presentes
        if (isset($_POST['nombre'], $_POST['marca'], $_POST['modelo'], $_POST['precio'], $_POST['unidades'], $_POST['imagen'])) {
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $precio = $_POST['precio'];
            $unidades = $_POST['unidades'];
            $detalles = $_POST['detalles'];
            $imagen = $_POST['imagen'];

            // Ejecuta la actualización del registro
            $sql = "UPDATE productos SET 
                    nombre='$nombre', 
                    marca='$marca', 
                    modelo='$modelo', 
                    precio='$precio', 
                    unidades='$unidades', 
                    detalles='$detalles', 
                    imagen='$imagen' 
                    WHERE id='$id'";
            
            if (mysqli_query($link, $sql)) {
                echo "Registro actualizado.";
            } else {
                echo "ERROR: No se ejecutó $sql. " . mysqli_error($link);
            }
        } else {
            echo "ERROR: Falta algún campo en el formulario.";
        }
    }

    // Cierra la conexión
    mysqli_close($link);
?>

<p>
    Verifica que realmente se hayan actualizado los productos: 
    <br/>
    <a href="get_productos_xhtml_v2.php">Ver todos los roductos</a>
    <br/>
    <a href="get_productos_vigentes_v2.php">Ver los productos vigentes</a>
</p>