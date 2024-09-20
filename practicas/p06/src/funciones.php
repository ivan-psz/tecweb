<?php

    //FUNCIÓN DEL EJERCICIO 1

    function ejercicioUno($number) {
        if (is_numeric($number) && $number > 0) {
            $number = (int)$number;
            if ($number % 5 == 0 && $number % 7 == 0) {
                echo '<p><strong>Respuesta: El número '.$number.' SÍ es múltiplo de 5 y 7.</strong></p>';
            } else {
                echo '<p><strong>Respuesta: El número '.$number.' NO es múltiplo de 5 y 7.</strong></p>';
            }
        } 
        else {
            echo '<p><strong>Por favor, ingrese un número válido.</strong></p>';
        }
    }

    //FUNCIÓN DEL EJERCICIO 2

    function ejercicioDos(){
        $matriz = [];
        $contadorIteraciones = 0;
        $contadorNumeros = 0;

        while(true){
            $i = rand(100, 999);
            $j = rand(100, 999);
            $k = rand(100, 999);
            $matriz[] = array($i, $j, $k);
            $contadorIteraciones++;
            $contadorNumeros += 3;
            if(!($i % 2 == 0) && ($j % 2 == 0) && !($k % 2 == 0)){
                break;
            }
        }

        echo '<div style="text-align: center;">';
        foreach($matriz as $fila){
            foreach($fila as $dato){
                echo $dato.' ';
            }
            echo '<br>';
        }
        echo '</div>';

        echo '<p>Números obtenidos: ' . $contadorNumeros . '<br>' . 'Iteraciones realizadas: ' . $contadorIteraciones . '</p>';
    }

    //FUNCIÓN DEL EJERCICIO 3

    function ejercicioTres($numero){
        if(is_numeric($numero) && $numero > 0){
            $numero = (int)$numero;
            $i = rand(1, 1000);
            while(!($i % $numero == 0)){
                $i = rand(1, 1000);
            }
            echo '<p><strong>El primer múltiplo obtenido al azar de ' . $numero . ' es ' . $i . '</strong></p>';
        }
        else{
            echo '<p><strong>Por favor, ingrese un número válido.</strong></p>';
        }
    }

    //FUNCIÓN DEL EJERCICIO 3 USANDO DO-WHILE

    function ejercicioTres_($numero){
        if (is_numeric($numero) && $numero > 0){
            $numero = (int)$numero;
            do{
                $i = rand(1, 1000);
            }while(!($i % $numero == 0));
            echo '<p><strong>El primer múltiplo obtenido al azar de ' . $numero . ' es ' . $i . '</strong></p>';
        }
        else{
            echo '<p><strong>Por favor, ingrese un número válido.</strong></p>';
        }
    }

    //FUNCIÓN DEL EJERCICIO 4

    function ejercicioCuatro(){
        $vector = [];

        for($i = 97; $i <= 122; $i++){
            $vector[$i]=chr($i);
        }

        echo "<table border='1' cellpadding='3'>";
            echo '<tr>';
                echo '<th>Valor ASCII</th>';
                echo '<th>Caracter</th>';
            echo '</tr>';
            foreach($vector as $clave => $valor){
                echo '<tr>';
                echo '<td>' . $clave . '</td>';
                echo '<td>' . $valor . '</td>';
                echo '</tr>';
            }
        echo '</table>';
    }

?>