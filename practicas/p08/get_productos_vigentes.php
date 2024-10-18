<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <?php
    $data = array();
	if(isset($_GET['tope']))
    {
		$tope = $_GET['tope'];
    }
    else
    {
        die('Parámetro "tope" no detectado...');
    }

	if (!empty($tope))
	{
		/** SE CREA EL OBJETO DE CONEXION */
		@$link = new mysqli('localhost', 'root', '.YcPHLGg]QCW-fX/', 'marketzone');	

		/** comprobar la conexión */
		if ($link->connect_errno) 
		{
			die('Falló la conexión: '.$link->connect_error.'<br/>');
			    /** NOTA: con @ se suprime el Warning para gestionar el error por medio de código */
		}

		$link->set_charset('utf8');
		
		/** Crear una tabla que no devuelve un conjunto de resultados */
		if ( $result = $link->query("SELECT * FROM productos WHERE unidades <= $tope AND eliminado != 1") ) 
		{
            /** Se extraen las tuplas obtenidas de la consulta */
			$row = $result->fetch_all(MYSQLI_ASSOC);

			/** útil para liberar memoria asociada a un resultado con demasiada información */
			$result->free();
		}

		$link->close();
	}
	?>
    <head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Productos con unidades menores a <?= $tope ?></title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
		<h3>PRODUCTOS</h3>

		<br/>
		
		<?php if( isset($row) && !empty($row)) : ?>

			<table class="table">
				<thead class="thead-dark">
					<tr>
					<th scope="col">#</th>
					<th scope="col">Nombre</th>
					<th scope="col">Marca</th>
					<th scope="col">Modelo</th>
					<th scope="col">Precio</th>
					<th scope="col">Detalles</th>
					<th scope="col">Unidades</th>
					<th scope="col">Imagen</th>
					</tr>
				</thead>
				<tbody>
                    <?php
                        foreach($row as $num => $registro){
                            echo '<tr>';
                            foreach($registro as $key => $value){
                                if($key != 'imagen'){
                                    if($key == 'id'){
                                        echo '<th scope="row">' . $value . '</th>';
                                    }
                                    else{
										if($key != 'eliminado'){
											echo '<td>' . $value . '</td>';
										}
                                    }
                                }
                                else{
                                    echo '<td>';
                                         echo '<img src = ' . $value . ' style="width: 200px;">';
                                    echo '</td>';
                                }
                            }
                            echo '</tr>';
                        }
                    ?>
				</tbody>
			</table>
        <?php else : ?>

			 <script>
                alert('No existen productos con unidades menores al tope introducido');
             </script>

		<?php endif; ?>
	</body>
</html>