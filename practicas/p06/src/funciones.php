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
        $vector = [];
        $iterationCounter = 0;
        $numberCounter = 0;

        while(true){
            $i = rand(100, 999);
            $j = rand(100, 999);
            $k = rand(100, 999);
            $vector[] = array($i, $j, $k);
            $iterationCounter++;
            $numberCounter += 3;
            if(!($i % 2 == 0) && ($j % 2 == 0) && !($k % 2 == 0)){
                break;
            }
        }

        echo '<div style="text-align: center;">';
        foreach($vector as $row){
            foreach($row as $data){
                echo $data.' ';
            }
            echo '<br>';
        }
        echo '</div>';

        echo '<p>Números obtenidos: ' . $numberCounter . '<br>' . 'Iteraciones realizadas: ' . $iterationCounter . '</p>';
    }

    //FUNCIÓN DEL EJERCICIO 3

    function ejercicioTres($number){
        if(is_numeric($number) && $number > 0 && $number <= 1000){
            $number = (int)$number;
            $i = rand(1, 1000);
            while(!($i % $number == 0)){
                $i = rand(1, 1000);
            }
            echo '<p><strong>El primer múltiplo obtenido al azar de ' . $number . ' es ' . $i . '</strong></p>';
        }
        else{
            echo '<p><strong>Por favor, ingrese un número válido.</strong></p>';
        }
    }

    //FUNCIÓN DEL EJERCICIO 3 USANDO DO-WHILE

    function ejercicioTres_($number){
        if (is_numeric($number) && $number > 0){
            $number = (int)$number;
            do{
                $i = rand(1, 1000);
            }while(!($i % $number == 0));
            echo '<p><strong>El primer múltiplo obtenido al azar de ' . $number . ' es ' . $i . '</strong></p>';
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
            foreach($vector as $key => $value){
                echo '<tr>';
                echo '<td>' . $key . '</td>';
                echo '<td>' . $value . '</td>';
                echo '</tr>';
            }
        echo '</table>';
    }

    if(isset($_POST['age']) && isset($_POST['sex'])){
        $age = $_POST['age'];
        $sex = $_POST['sex'];

    }



?>