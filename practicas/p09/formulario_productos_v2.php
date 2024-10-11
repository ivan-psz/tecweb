<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar productos</title>
        <script src="./src/main.js"></script>
        <link rel="stylesheet" href="./styles/styles.css"/>
    </head>
    <body>
        <div class="titulo">
            <h3>Actualizar datos</h3>
        </div>
        <p>Ingresa la información que a continuación se te solicita.</p>
        <form id="formularioProductos" action="./set_producto.php" method="post">
            <fieldset>
                <legend>Información del producto</legend>
                <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value="<?=$_POST['nombre']?>"/></label>
                <br/>
                <label for="marca">Marca: 
                    <select name="marca" id="marca">
                        <option value="none" selected>Elige una opción</option>
                        <option value="canon" <?=(isset($_POST['marca']) && $_POST['marca'] == 'canon') ? 'selected' : '' ?>>Canon</option>
                        <option value="fujifilm" <?=(isset($_POST['marca']) && $_POST['marca'] == 'fujifilm') ? 'selected' : '' ?>>Fujifilm</option>
                        <option value="hasselblad" <?=(isset($_POST['marca']) && $_POST['marca'] == 'hasselblad') ? 'selected' : '' ?>>Hasselblad</option>
                        <option value="leica" <?=(isset($_POST['marca']) && $_POST['marca'] == 'leica') ? 'selected' : '' ?>>Leica</option>
                        <option value="nikon" <?=(isset($_POST['marca']) && $_POST['marca'] == 'nikon') ? 'selected' : '' ?>>Nikon</option>
                        <option value="olympus" <?=(isset($_POST['marca']) && $_POST['marca'] == 'olympus') ? 'selected' : '' ?>>Olympus</option>
                        <option value="pentax" <?=(isset($_POST['marca']) && $_POST['marca'] == 'pentax') ? 'selected' : '' ?>>Pentax</option>
                        <option value="sony" <?=(isset($_POST['marca']) && $_POST['marca'] == 'sony') ? 'selected' : '' ?>>Sony</option>
                    </select>
                </label>
                <br/>
                <label for="modelo">Modelo: <input type="text" name="modelo" id="modelo" value="<?=$_POST['modelo']?>"/></label>
                <br/>
                <label for="precio">Precio: <input type="text" name="precio" id="precio" value="<?=$_POST['precio']?>"/></label>
                <br/>
                <label for="detalles">Detalles: 
                    <textarea name="detalles" id="detalles" cols="50" rows="4" placeholder="Máximo 250 caracteres" value="<?=$_POST['detalles']?>"></textarea>
                </label>
                <br/>
                <label for="unidades">Unidades: <input type="number" name="unidades" id="unidades" value="<?=$_POST['unidades']?>"/></label>
                <br/>
                <label for="ruta">Ruta de la imagen del producto: <input type="text" name="ruta" id="ruta" value="<?=$_POST['ruta']?>"></label>
            </fieldset>
            <p>
                <input type="submit" value="Actualizar datos" onclick="validarFormulario();"/>
            </p>
        </form>
    </body>
</html>

