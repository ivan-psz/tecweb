<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<title>Confirmación de registro</title>
		<link rel="stylesheet" type="text/css" href="./styles/styles.css"/>
	</head>
	<body>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                @$link = new mysqli('localhost', 'root', '.YcPHLGg]QCW-fX/', 'marketzone');
				$nombre = $_POST['nombre'];
				$marca = $_POST['marca'];
				$modelo = $_POST['modelo'];
	
				if ($link->connect_errno){
					die('Falló la conexión: '.$link->connect_error.'<br/>');
				}
	
				$sql = "SELECT nombre, marca, modelo FROM productos";
	
				if($result = $link->query($sql)){
					$row = $result->fetch_all(MYSQLI_ASSOC);
					
					if(isset($row) && !empty($row)){
						$registro_encontrado = false;
						foreach($row as $registro){
                            if($registro['nombre'] == $nombre && $registro['marca'] == $marca && $registro['modelo'] == $modelo){
								$registro_encontrado = true;
								break;
							}
                        }
					}

					if($registro_encontrado){
						echo '<h2 class="titulo">El artículo a registrar ya se encuentra dentro de la base de datos</h2>';
						echo '<p>Intente registrar uno nuevo.</p>';
					}
					else{
						$precio = $_POST['precio'];
						if($_POST['detalles'] == 'NULL'){
							$detalles = NULL;
						}
						else{
							$detalles = $_POST['detalles'];
						}
						$unidades = $_POST['unidades'];
						$imagen = $_POST['ruta'];

						//$sql = "INSERT INTO productos VALUES (null, '{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', '0')";
						$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen) values ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}')";

						if ( $link->query($sql) ){
							echo '<h2 class="titulo">El artículo se ha registrado correctamente</h2>';
							echo '<p>Los datos asociados son los siguientes:</p>';
							echo '<ul>';
								echo '<li><strong>Nombre: </strong>' . $nombre . '</li>';
								echo '<li><strong>Marca: </strong>' . $marca . '</li>';
								echo '<li><strong>Modelo: </strong>' . $modelo . '</li>';
								echo '<li><strong>Precio: </strong>' . $precio . '</li>';
								echo '<li><strong>Detalles: </strong>' . $detalles . '</li>';
								echo '<li><strong>Unidades: </strong>' . $unidades . '</li>';
								echo '<li><strong>Ruta de la imagen: </strong>' . $imagen . '</li>';
							echo '</ul>';
						}
						else{
							echo 'El Producto no pudo ser insertado =(';
						}
					}
					$result->free();
				}
				else{
					echo '<h2>ERROR AL INTENTAR OBTENER INFORMACIÓN DE LA BASE DE DATOS</h2>';
				}
            }
        ?>
		<p>
		    <a href="http://validator.w3.org/check?uri=referer"><img
		      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
		</p>
	</body>
</html>