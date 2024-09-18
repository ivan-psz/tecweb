<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 6</title>
</head>
<body>

    <div style="text-align: center; margin-top: 0.5rem;">
        <h1>Uso de funciones, ciclos y arreglos en PHP</h1>
    </div>

    <?php
        include("./src/funciones.php");
    ?>

    <form action="" method="GET">
        <fieldset>
            <legend><h2>&emsp;Ejercicio 1</h2></legend>
            <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7<br></p>
            Ingrese un número: <input type="text" name="numero">
            <p><input type="submit" value="Enviar"></p>
            <?php
                if (isset($_GET['numero'])) {
                    esMultiplo5y7($_GET['numero']); // Pasamos el número ingresado a la función
                }
            ?>
        </fieldset>
    </form>

</body>
</html>