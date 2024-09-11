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
    <?php
        $a="ManejadorSQL";
        $b='MySQL';
        $c=&$a;

        echo "<h4>&emsp;&emsp;&emsp;&emsp;&emsp;Inciso a</h4>";
        echo "<ul>";
            echo '<li>'.'$a: '.$a.'</li>';
            echo '<li>'.'$b: '.$b.'</li>';
            echo '<li>'.'$c: '.$c.'</li>';
        echo "</ul>";
        //echo "<h4>&emsp;&emsp;&emsp;&emsp;&emsp;Inciso b</h4>";
        $a = "PHP server";
        $b = &$a;
        echo "<h4>&emsp;&emsp;&emsp;&emsp;&emsp;Inciso c</h4>";
        echo "<ul>";
            echo '<li>'.'$a: '.$a.'</li>';
            echo '<li>'.'$b: '.$b.'</li>';
            echo '<li>'.'$c: '.$c.'</li>';
        echo "</ul>";
        echo 'Lo que ocurrió en el inciso b fue que se cambió el valor de la variable $a y, después, la variable $b empezó a hacer 
                referencia a la variable $a, por lo que tomó el valor que se le asignó a esta última en la línea anterior. En 
                cuanto a $c, cuando se declaró, hizo referencia a $a, así que sucedió lo mismo que con $b cuando se cambió el 
                valor de $a'.'<br>';
    ?>

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
    <?php
        unset($a, $b, $c);

        echo "<ul>";
            $a = "PHP5 ";
            echo '<li>'.'$a: '.$a.'</li>';

            $z[] = &$a;
            echo '<li>'.'$z: '; 
                        print_r($z); 
            echo '</li>';

            $b = "5a version de PHP";
            echo '<li>'.'$b: '.$b.'</li>';

            $c = (int)$b*10;
            echo '<li>'.'$c: '.$c.'</li>';

            $a .= $b;
            echo '<li>'.'$a: '.$a.'</li>';

            $b = (int)$b * $c;
            echo '<li>'.'$b: '.$b.'</li>';

            $z[0] = "MySQL";
            echo '<li>'.'$a: '.$a.'</li>';
            echo '<li>'.'$z: '; 
                        print_r($z); 
            echo '</li>';
        echo "</ul>";
    ?>

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