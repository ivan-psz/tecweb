<?php

    //FUNCIÓN DEL EJERCICIO 1

    function ejercicioUno($number) {
        if (is_numeric($number)) {
            if ($number % 5 == 0 && $number % 7 == 0) {
                echo '<p><strong>Respuesta: El número '.$number.' SÍ es múltiplo de 5 y 7.</strong></p>';
            } else {
                echo '<p><strong>Respuesta: El número '.$number.' NO es múltiplo de 5 y 7.</strong></p>';
            }
        } else {
            echo '<p><strong>Por favor, ingrese un número válido.</strong></p>';
        }
    }

    //FUNCIÓN DEL EJERCICIO 2

    function ejercicioDos(){
        
    }

?>