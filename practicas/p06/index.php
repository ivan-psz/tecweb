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
            Ingrese un ENTERO POSITIVO: <input type="text" name="number">
            <p><input type="submit" value="Enviar"></p>
            <?php
                if (isset($_GET['number'])) {
                    $num = $_GET['number'];
                    ejercicioUno($num);
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

            Ingrese un ENTERO POSITIVO [1 - 1000]: <input type="text" name="num">
            <br>
            Seleccione el ciclo a usar: 
            <select name="loop">
                <option value="while">While</option>
                <option value="dowhile">Do-While</option>
            </select>

            <p><input type="submit" value="Enviar"></p>

            <?php
                if (isset($_GET['num']) && isset($_GET['loop'])) {
                    $num = $_GET['num'];
                    $loop = $_GET['loop'];

                    if($loop == 'while'){
                        ejercicioTres($num);
                    }
                    else{
                        ejercicioTres_($num);
                    }
                }
            ?>
        </fieldset>
    </form>

    <br>

    <fieldset>
        <legend><strong>Ejercicio 4</strong></legend>
        <p>
            Crea un arreglo cuyos <strong>índices</strong> van de 97 a 122 y cuyos <strong>valores</strong> son letras de la 'a' a 
            la 'z'. Usa la función <strong>chr(n)</strong> que devuelve el caracter cuyo código ASCII es <strong>n</strong> para 
            poner el valor en cada índice. Es decir: 
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

        <div style="text-align: center;">
            <div style="display: inline-block;">
                <?php
                    ejercicioCuatro();
                ?>
            </div>
        </div>
    </fieldset>

    <br>

    <fieldset>
        <legend><strong>Ejercicio 5</strong></legend>
        <p>
            Usar las variables <strong>$edad</strong> y <strong>$sexo</strong> en una instrucción <strong>if</strong> para 
            identificar una persona de sexo "femenino", cuya edad oscile entre los 18 y 35 años; y mostrar un mensaje de 
            bienvenida apropiado. Por ejemplo: 
            <br>
            <div style="text-align: center;">
                <em>Bienvenida, usted está en el rango de edad permitido.</em>
            </div>
            <br>
            En caso contrario, deberá devolver otro mensaje indicando el error.
            <ul>
                <li>
                    Los valores para <strong>$edad</strong> y <strong>$sexo</strong> se deben obtener por medio de un formulario 
                    en HTML
                </li>
                <li>
                    Utilizar la <em>variable superglobal</em> <strong>$_POST</strong> (revisar la documentación)
                </li>
            </ul>
        </p>
        <br>
        <form action="./src/funciones.php" method="POST">
            Ingrese su edad: <input type="text" name="age">
            <br>
            Seleccione su sexo: 
            <select name="sex">
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
            <p><input type="submit" value="Enviar"></p>
        </form>
    </fieldset>

    <fieldset>
        <legend><strong>Ejercicio 6</strong></legend>
        <p>
            Crea, en código duro, un arreglo asociativo que sirva para registrar el parque vehicular de una ciudad. Cada vehículo
            debe ser identificado por:
            <ul>
                <li>Matricula</li>
                <li>
                    Auto
                    <ul>
                        <li>Marca</li>
                        <li>Modelo (año)</li>
                        <li>Tipo (sedan | hatchback | camioneta)</li>
                    </ul>
                </li>
                <li>
                    Propietario
                    <ul>
                        <li>Nombre</li>
                        <li>Ciudad</li>
                        <li>Dirección</li>
                    </ul>
                </li>
            </ul>
            La matrícula debe tener el siguiente formato: <strong>LLLNNNN</strong>, donde las <strong>L</strong> pueden ser letras
            de la A - Z y las <strong>N</strong> pueden ser números de 0 - 9.

            Para hacer esto, toma en cuenta las siguientes instrucciones:

            <ul>
                <li>Crea en código duro el registro para 15 autos</li>
                <li>Utiliza un único arreglo, cuya clave de cada registro sea la matrícula</li>
                <li>Lógicamente, la matrícula no se puede repetir</li>
                <li>Los datos del Auto deben ir dentro de un arreglo</li>
                <li>Los datos del Propietario deben ir dentro de un arreglo</li>
            </ul>
        </p>
        <br>
        <form action="./src/funciones.php" method="POST">
            Seleccione una opción: 
            <select name="option">
                <option value="findByID">Buscar un auto a partir de su matrícula</option>
                <option value="displayInfo">Mostrar todos los autos</option>
            </select>
            <p><input type="submit" value="Enviar"></p>
        </form>
    </fieldset>

</body>
</html>