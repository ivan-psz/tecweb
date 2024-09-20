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
            <legend><strong>Ejercicio 1</strong></legend>
            <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7<br></p>
            Ingrese un ENTERO POSITIVO: <input type="text" name="numero">
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
        <legend><strong>Ejercicio 2</strong></legend>
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
            <legend><strong>Ejercicio 3</strong></legend>
            <p>Utiliza un ciclo <strong>while</strong> para encontrar el primer número entero obtenido aleatoriamente,
                pero que además sea un múltiplo de un número dado
                <ul>
                    <li>Crear una variante de este <strong>script</strong> utilizando el ciclo <strong>do-while</strong></li>
                    <li>El número dado se debe obtener vía GET</li>
                </ul>
            </p>

            <br>

            Ingrese un ENTERO POSITIVO: <input type="text" name="num">
            <br>
            Ingrese el ciclo a usar: 
            <select name="ciclo">
                <option value="while">While</option>
                <option value="dowhile">Do-While</option>
            </select>

            <p><input type="submit" value="Enviar"></p>

            <?php
                if (isset($_GET['num']) && isset($_GET['ciclo'])) {
                    $numero = $_GET['num'];
                    $ciclo = $_GET['ciclo'];

                    if($ciclo == 'while'){
                        ejercicioTres($numero);
                    }
                    else{
                        ejercicioTres_($numero);
                    }
                }
            ?>
        </fieldset>
    </form>

    <br>

    <fieldset>
        <legend><strong>Ejercicio 4</strong></legend>
        <p>
            Crea un arreglo cuyos <strong>índices</strong> van de 97 a 122 y cuyos <strong>valores</strong> son letras de la 'a' a la
            'z'. Usa la función <strong>chr(n)</strong> que devuelve el caracter cuyo código ASCII es <strong>n</strong> para poner 
            el valor en cada índice. Es decir: 
            <br>
            <strong>&emsp;[97] => a</strong><br>
            <strong>&emsp;[98] => b</strong><br>
            <strong>&emsp;[99] => c</strong><br>
            <strong>&emsp;...</strong><br>
            <strong>&emsp;[122] => z</strong><br>

            <ul>
                <li>
                    Crea el arreglo con un ciclo <strong>for</strong>
                </li>
                <li>
                    Lee el arreglo y crea una tabla en XHTML con <strong>echo</strong> y un ciclo <strong>foreach</strong><br>
                </li>
            </ul>
        </p>
    </fieldset>

</body>
</html>