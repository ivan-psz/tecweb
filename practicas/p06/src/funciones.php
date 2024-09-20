<?php

    function generarUpperXHTML($titulo){
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">';
        echo '<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">';
            echo "<head>";
                echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />';
                echo '<title>' . $titulo . '</title>';
            echo "</head>";
            echo "<body>";
    }

    function generarLowerXHTML(){
            echo "</body>";
        echo "</html>";
    }

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

    //FUNCIÓN DEL EJERCICIO 5

    function ejercicioCinco($age, $sex, $titulo, $ban){
        generarUpperXHTML($titulo);

        echo '<div style="text-align: center;">';

        if($ban){
            if($age > 17 && $age < 36 && $sex == "F"){
                echo "<p><strong>Bienvenida, usted está en el rango de edad permitido.</strong></p>";
            }
            else{
                if($sex == "M"){
                    echo "<p><strong>Disculpe, usted no está autorizado para acceder.</strong></p>";
                }
                else{
                    echo "<p><strong>Disculpe, usted no está autorizada para acceder debido a que no entra en el rango de edad.</strong></p>";
                }
            }
        }
        else{
            echo "<p><strong>Se introdujo un valor inválido para la edad. Vuelva a intentarlo.</strong></p>";
        }

        echo '</div>';

        generarLowerXHTML();
    }

    //FUNCIÓN DEL EJERCICIO 6

    function ejercicioSeis($titulo, $vector){
        generarUpperXHTML($titulo);

        echo '<div style="text-align: center;">';
            echo "<h4>Información de todos los vehículos</h4>";
        echo '</div>';

        foreach($vector as $matricula => $informacion){
            echo '<ul>';
                echo '<li><strong>Matrícula:</strong> ' . $matricula . '</li>';
                echo '<li><strong>Marca:</strong> ' . $informacion['Auto']['Marca'] . '</li>';
                echo '<li><strong>Modelo:</strong> ' . $informacion['Auto']['Modelo'] . '</li>';
                echo '<li><strong>Tipo:</strong> ' . $informacion['Auto']['Tipo'] . '</li>';
                echo '<li><strong>Propietario:</strong> ' . $informacion['Propietario']['Nombre'] . '</li>';
                echo '<li><strong>Ciudad:</strong> ' . $informacion['Propietario']['Ciudad'] . '</li>';
                echo '<li><strong>Dirección:</strong> ' . $informacion['Propietario']['Direccion'] . '</li>';
            echo '</ul>';
        }

        generarLowerXHTML();
    }

    function moduloBusqueda($titulo, $parqueVehicular){
        generarUpperXHTML($titulo);

        echo "<fieldset>";
            echo "<legend><strong>Módulo de búsqueda por matrícula</strong></legend>";
            echo '<form action="./" method="POST">';
                echo 'Ingrese una matrícula: <input type="text" name="matricula" placeholder="AAA1111">';
                echo '<p><input type="submit" value="Enviar"></p>';
            echo "</form>";
        echo "</fieldset>";

        if(isset($_POST['matricula'])){ 
            $key = strtoupper(trim($_POST['matricula']));
            if(array_key_exists($key, $parqueVehicular)){
                mostrarInformacion($key, $parqueVehicular);
            } else {
                echo "<p><strong>No se encontró un auto con dicha matrícula.</strong></p>";
            }
        }

        generarLowerXHTML();
    }

    function mostrarInformacion($key, $parqueVehicular){
        echo "<p><strong>Auto encontrado.</strong></p>";
        echo '<ul>';
            echo '<li><strong>Matrícula:</strong> ' . $key . '</li>';
            echo '<li><strong>Marca:</strong> ' . $parqueVehicular[$key]['Auto']['Marca'] . '</li>';
            echo '<li><strong>Modelo:</strong> ' . $parqueVehicular[$key]['Auto']['Modelo'] . '</li>';
            echo '<li><strong>Tipo:</strong> ' . $parqueVehicular[$key]['Auto']['Tipo'] . '</li>';
            echo '<li><strong>Propietario:</strong> ' . $parqueVehicular[$key]['Propietario']['Nombre'] . '</li>';
            echo '<li><strong>Ciudad:</strong> ' . $parqueVehicular[$key]['Propietario']['Ciudad'] . '</li>';
            echo '<li><strong>Dirección:</strong> ' . $parqueVehicular[$key]['Propietario']['Direccion'] . '</li>';
        echo '</ul>';
    }

    $parqueVehicular = array(
        'ABC1234' => array(
            'Auto' => array(
                'Marca' => 'Toyota',
                'Modelo' => '2020',
                'Tipo' => 'Sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Juan Pérez',
                'Ciudad' => 'CDMX',
                'Direccion' => 'Av. Reforma 45'
            )
        ),
        'DEF5678' => array(
            'Auto' => array(
                'Marca' => 'Honda',
                'Modelo' => '2018',
                'Tipo' => 'Hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'María López',
                'Ciudad' => 'Guadalajara',
                'Direccion' => 'Calle Sonora 19'
            )
        ),
        'GHI9012' => array(
            'Auto' => array(
                'Marca' => 'Ford',
                'Modelo' => '2021',
                'Tipo' => 'Camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Carlos Ramírez',
                'Ciudad' => 'Monterrey',
                'Direccion' => 'Av. Constitución 100'
            )
        ),
        'JKL3456' => array(
            'Auto' => array(
                'Marca' => 'Nissan',
                'Modelo' => '2019',
                'Tipo' => 'Sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Ana Martínez',
                'Ciudad' => 'Puebla',
                'Direccion' => 'Calle 5 de Mayo 200'
            )
        ),
        'MNO7890' => array(
            'Auto' => array(
                'Marca' => 'Chevrolet',
                'Modelo' => '2022',
                'Tipo' => 'Hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Luis Hernández',
                'Ciudad' => 'Mérida',
                'Direccion' => 'Av. Itzaes 150'
            )
        ),
        'PQR1234' => array(
            'Auto' => array(
                'Marca' => 'Volkswagen',
                'Modelo' => '2017',
                'Tipo' => 'Camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Laura Gómez',
                'Ciudad' => 'Tijuana',
                'Direccion' => 'Calle Revolución 300'
            )
        ),
        'STU5678' => array(
            'Auto' => array(
                'Marca' => 'Kia',
                'Modelo' => '2020',
                'Tipo' => 'Sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Jorge Sánchez',
                'Ciudad' => 'León',
                'Direccion' => 'Av. López Mateos 75'
            )
        ),
        'VWX9012' => array(
            'Auto' => array(
                'Marca' => 'Mazda',
                'Modelo' => '2018',
                'Tipo' => 'Hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Patricia Torres',
                'Ciudad' => 'Querétaro',
                'Direccion' => 'Calle Zaragoza 120'
            )
        ),
        'YZA3456' => array(
            'Auto' => array(
                'Marca' => 'Hyundai',
                'Modelo' => '2021',
                'Tipo' => 'Camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Ricardo Díaz',
                'Ciudad' => 'Cancún',
                'Direccion' => 'Av. Tulum 50'
            )
        ),
        'BCD7890' => array(
            'Auto' => array(
                'Marca' => 'Subaru',
                'Modelo' => '2019',
                'Tipo' => 'Sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Gabriela Ruiz',
                'Ciudad' => 'Toluca',
                'Direccion' => 'Calle Hidalgo 80'
            )
        ),
        'EFG1234' => array(
            'Auto' => array(
                'Marca' => 'BMW',
                'Modelo' => '2022',
                'Tipo' => 'Hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Fernando Morales',
                'Ciudad' => 'Aguascalientes',
                'Direccion' => 'Av. Independencia 60'
            )
        ),
        'HIJ5678' => array(
            'Auto' => array(
                'Marca' => 'Audi',
                'Modelo' => '2017',
                'Tipo' => 'Camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Silvia Castillo',
                'Ciudad' => 'Morelia',
                'Direccion' => 'Calle Madero 110'
            )
        ),
        'KLM9012' => array(
            'Auto' => array(
                'Marca' => 'Mercedes-Benz',
                'Modelo' => '2020',
                'Tipo' => 'Sedan'
            ),
            'Propietario' => array(
                'Nombre' => 'Alejandro Vargas',
                'Ciudad' => 'Veracruz',
                'Direccion' => 'Av. 20 de Noviembre 90'
            )
        ),
        'NOP3456' => array(
            'Auto' => array(
                'Marca' => 'Peugeot',
                'Modelo' => '2018',
                'Tipo' => 'Hatchback'
            ),
            'Propietario' => array(
                'Nombre' => 'Daniela Flores',
                'Ciudad' => 'Oaxaca',
                'Direccion' => 'Calle Juárez 140'
            )
        ),
        'QRS7890' => array(
            'Auto' => array(
                'Marca' => 'Renault',
                'Modelo' => '2021',
                'Tipo' => 'Camioneta'
            ),
            'Propietario' => array(
                'Nombre' => 'Roberto Aguilar',
                'Ciudad' => 'San Luis Potosí',
                'Direccion' => 'Av. Carranza 30'
            )
        )
    );
    

    if(isset($_POST['age']) && isset($_POST['sex'])){
        $age = $_POST['age'];
        $sex = $_POST['sex'];
        $titulo = "Respuesta del servidor";

        if (is_numeric($age) && $age > 0 && $age < 101) {
            $age = (int)$age;
            $ban = true;
        } 
        else {
            $ban = false;
        }

        ejercicioCinco($age, $sex, $titulo, $ban);
    }

    if(isset($_POST['option'])){
        $option = $_POST['option'];
        
        if($option == 'findByID'){
            $titulo = "Búsqueda por matrícula";
            moduloBusqueda($titulo, $parqueVehicular);
        }
        else{
            $titulo = "Información de todos los autos";
            ejercicioSeis($titulo, $parqueVehicular);
        }
    }

    if(isset($_POST['id'])){ 
        $key = strtoupper(trim($_POST['id']));
        if(array_key_exists($key, $parqueVehicular)){
            return $parqueVehicular[$key]; 
        } else {
            return null; 
        }
    }

?>