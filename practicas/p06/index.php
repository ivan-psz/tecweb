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
            <legend>Ejercicio 1</legend>
            <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7<br></p>
            Ingrese un número: <input type="text" name="numero">
            <p><input type="submit" value="Enviar"></p>
            <?php
                if (isset($_GET['numero'])) {
                    ejercicioUno($_GET['numero']);
                }
            ?>
        </fieldset>
    </form>

    <br>

    <fieldset>
        <legend>Ejercicio 2</legend>
        <p>Crear un programa para la generación repetitiva de tres números aleatorios hasta obtener una secuencia compuesta por: <br>
            <div style="text-align: center;">
                <strong>Impar, par, impar</strong><br>
            </div>
            <br>Estos números deben almacenarse en una matriz de M x 3, donde M es el número de filas y 3 es el número de columnas. 
            Al final, se debe mostrar el número de iteraciones y la cantidad de números generados.
        </p>
        <?php
            ejercicioDos();
        ?>
    </fieldset>

    <br>

    <form action="" method="GET">
        <fieldset>
            <legend>Ejercicio 3</legend>
            <p>Utiliza un ciclo <strong>while</strong> para encontrar el primer número entero obtenido aleatoriamente,
                pero que además sea un múltiplo de un número dado
                <ul>
                    <li>Crear una variante de este <strong>script</strong> utilizando el ciclo <strong>do-while</strong></li>
                    <li>El número dado se debe obtener vía GET</li>
                </ul>
            </p>

            <br>

            Ingrese un número: <input type="text" name="num">

            <p><input type="submit" value="Enviar"></p>
            <?php
                if (isset($_GET['num'])) {
                    ejercicioTres($_GET['num']);
                }
            ?>
        </fieldset>
    </form>

</body>
</html>