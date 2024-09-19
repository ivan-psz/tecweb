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

    <fieldset>
        <legend><h2>Ejercicio 1</h2></legend>
        <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7<br></p>
        Ingrese un número: <input type="text" name="numero">
        <p><input type="submit" value="Enviar"></p>
        <?php
            if (isset($_GET['numero'])) {
                ejercicioUno($_GET['numero']); 
            }
        ?>
    </fieldset>

    <fieldset>
        <legend><h2>Ejercicio 2</h2></legend>
        <p>Crear un programa para la generación repetitiva de tres números aleatorios hasta obtener una secuencia compuesta por
            <em>impar, par, impar</em><br>
            Estos números deben almacenarse en una matriz de M x 3, donde M es el número de filas y 3 es el número de columnas.
            Al final, se debe mostrar el número de iteraciones y la cantidad de números generados</p>
        
    </fieldset>

</body>
</html>