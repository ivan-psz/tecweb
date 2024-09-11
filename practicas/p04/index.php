<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Práctica 3</title>
</head>
<body>
    
<div style="text-align: center; margin-top: 0.5rem;">
        <h1>Manejo de variables en PHP</h1>
    </div>

    <h2>&emsp;Ejercicio 1</h2>
    <p>Determina cuál de las siguientes variables son válidas y explica por qué:</p>
    <ul>
        <li>$_myvar</li>
        <li>$_7var</li>
        <li>myvar</li>
        <li>$myvar</li>
        <li>$var7</li>
        <li>$_element1</li>
        <li>$house*5</li>
    </ul>
    <h3>&emsp;&emsp;&emsp;Solución</h3>
    
    <?php
        $_myvar;
        $_7var;
        //myvar;
        $myvar;
        $var7;
        $_element1;
        //$house*5;

        echo "<table>";
            echo "<tr>";
                echo "<th>Identificador</th>";
                echo "<th>¿Es válido?</th>";
                echo "<th>Explicación</th>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$_myvar</td>';
                echo "<td>Sí</td>";
                echo "<td>Usa el prefijo correcto, empieza con un guión bajo y utiliza caracteres válidos</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$_7var</td>';
                echo "<td>Sí</td>";
                echo "<td>Usa el prefijo correcto, empieza con un guión bajo y utiliza caracteres válidos</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>myvar</td>';
                echo "<td>No</td>";
                echo "<td>No tiene el prefijo del signo de dólar ($) usado para definir variables</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$myvar</td>';
                echo "<td>Sí</td>";
                echo "<td>Usa el prefijo correcto y utiliza caracteres válidos</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$var7</td>';
                echo "<td>Sí</td>";
                echo "<td>Usa el prefijo correcto y utiliza caracteres válidos</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$_element1</td>';
                echo "<td>Sí</td>";
                echo "<td>Usa el prefijo correcto, empieza con un guión bajo y utiliza caracteres válidos</td>";
            echo "</tr>";
            echo "<tr>";
                echo '<td>$house*5</td>';
                echo "<td>No</td>";
                echo "<td>Usa un carácter inválido (*)</td>";
            echo "</tr>";
        echo "</table>";
    ?>

    




    <br>
    <h2>&emsp;Ejercicio 2</h2>
    <p>Proporciona los valores de $a, $b y $c como sigue: <br></p>
    <ul>
        <li>$a = "Manejador SQL";</li>
        <li>$b = 'MySQL';</li>
        <li>$c = &$a;</li>
    </ul>
    <p>Ahora, haz lo siguiente: <br></p>
    <ol type="a">
        <li>Muestra el contenido de cada variable</li>
        <li>Agrega al código actual las siguientes asignaciones: 
            <ol type="i">
                <li>$a = “PHP server”;</li>
                <li>$b = &$a;</li>
            </ol>
        </li>
        <li>Vuelve a mostrar el contenido de cada uno</li>
        <li>Describe en y muestra en la página obtenida qué ocurrió en el segundo bloque de asignaciones</li>
    </ol>
    <h3>&emsp;&emsp;&emsp;Solución</h3>





    <br>
    <h2>&emsp;Ejercicio 3</h2>
    <p>Muestra el contenido de cada variable inmediatamente después de cada asignación,
        verificar la evolución del tipo de estas variables (imprime todos los componentes de los
        arreglo):</p>
    <ul>
        <li>$a = “PHP5”;</li>
        <li>$z[] = &$a;</li>
        <li>$b = “5a version de PHP”;</li>
        <li>$c = $b*10;</li>
        <li>$a .= $b;</li>
        <li>$b *= $c;</li>
        <li>$z[0] = “MySQL”;</li>
    </ul>
    <h3>&emsp;&emsp;&emsp;Solución</h3>





    <br>
    <h2>&emsp;Ejercicio 4</h2>
    <p>Lee y muestra los valores de las variables del ejercicio anterior, pero ahora con la ayuda de
        la matriz $GLOBALS o del modificador global de PHP.</p>
    <h3>&emsp;&emsp;&emsp;Solución</h3>




    <br>
    <h2>&emsp;Ejercicio 5</h2>
    <p>Dar el valor de las variables $a, $b, $c al final del siguiente script:</p>
    <ul>
        <li>$a = “7 personas”;</li>
        <li>$b = (integer) $a;</li>
        <li>$a = “9E3”;</li>
        <li>$c = (double) $a;</li>
    </ul>
    <h3>&emsp;&emsp;&emsp;Solución</h3>




    <br>
    <h2>&emsp;Ejercicio 6</h2>
    <p>Dar y comprobar el valor booleano de las variables $a, $b, $c, $d, $e y $f y muéstralas
        usando la función var_dump(<datos>). <br>
        Después investiga una función de PHP que permita transformar el valor booleano de $c y $e
        en uno que se pueda mostrar con un echo:
    </p>
    <ul>
        <li>$a = “0”;</li>
        <li>$b = “TRUE”;</li>
        <li>$c = FALSE;</li>
        <li>$d = ($a OR $b);</li>
        <li>$e = ($a AND $c);</li>
        <li>$f = ($a XOR $b);</li>
    </ul>
    <h3>&emsp;&emsp;&emsp;Solución</h3>




    <br>
    <h2>&emsp;Ejercicio 7</h2>
    <p>Usando la variable predefinida $_SERVER, determina lo siguiente:</p>
    <ol type="a">
        <li>La versión de Apache y PHP</li>
        <li>El nombre del sistema operativo (servidor)</li>
        <li>El idioma del navegador (cliente)</li>
    </ol>
    <h3>&emsp;&emsp;&emsp;Solución</h3>


</body>
</html>