<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Servicio de validación XML</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/superhero/bootstrap.min.css">
    </head>
    <body>
        <?php
            libxml_use_internal_errors(true);
            $xml= new DOMDocument();
            $documento = file_get_contents('./docs/serviciovod.xml');
            $xml->loadXML($documento, LIBXML_NOBLANKS);
            
            $xsd = './docs/serviciovod.xsd';
            if (!$xml->schemaValidate($xsd)){

                echo '<h1 class="text-center m-4">Validación <strong>no</strong> pasada</h1>';

                $errors = libxml_get_errors();
                $numError = 1;
                echo '<ul>';
                    foreach ($errors as $error){
                        echo '<li>Error ' . ( $numError++ ) . ': ' . $error->message . '</li>';
                    }
                echo '</ul>';
            }
            else{
                $cuentas = $xml -> getElementsByTagName('cuenta');
                $contenido = $xml -> getElementsByTagName('contenido')->item(0);

                echo '<h1 class="text-center m-4">Validación pasada</h1>';

                echo '<div class="container my-1">';
                    echo '<section class="mb-4">';
                        echo '<h2 class="text-center">Cuentas</h2>';
                        $numCuentas = 1;
                        echo '<div>';
                            echo '<ul>';
                                foreach($cuentas as $cuenta){
                                    $perfiles = $cuenta -> getElementsByTagName('perfil');
                                    $numPerfiles = 1;
                                    echo '<li><h4>Cuenta ' . ($numCuentas++) . '</h4></li>';
                                    echo '<strong>Correo: ' . $cuenta -> getAttribute('correo') . '</strong>';
                                    echo '<br/>';
                                    echo '<strong>Perfiles: </strong>';
                                    echo '<div>';
                                        echo '<ul>';
                                            foreach($perfiles as $perfil){
                                                echo '<li>Perfil ' . ($numPerfiles++) . '</li>';
                                                echo '<ul>';
                                                    echo '<li>Nombre: ' . $perfil -> getAttribute('usuario') . '</li>';
                                                    echo '<li>Idioma: ' . $perfil -> getAttribute('idioma') . '</li>';
                                                echo '</ul>';
                                            }
                                        echo '</ul>';
                                    echo '</div>';
                                }
                            echo '</ul>';
                        echo '</div>';
                    echo '</section>';

                    echo '<section class="mb-5">';
                        echo '<h3 class="text-center mb-3">Películas</h3>';
                        echo '<table class="table table-striped table-bordered">';
                            echo '<thead class="table-dark">';
                                echo '<tr>';
                                    echo '<th>Título</th>';
                                    echo '<th>Duración</th>';
                                    echo '<th>Género</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                
                                $peliculas = $contenido -> getElementsByTagName('peliculas');
                                
                                foreach($peliculas as $pelicula){
                                    $generos = $pelicula -> getElementsByTagName('genero');
                                    foreach($generos as $genero){
                                        $titulos = $genero -> getElementsByTagName('titulo');
                                        foreach($titulos as $titulo){
                                            echo '<tr>';
                                                echo '<td>' . $titulo -> nodeValue . '</td>';
                                                echo '<td>' . $titulo -> getAttribute('duracion') . '</td>';
                                                echo '<td>' . $genero -> getAttribute('nombre') . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                }
                                

                            echo '</tbody>';
                        echo '</table>';
                    echo '</section>';
                    echo '<section>';
                        echo '<h3 class="text-center mb-3">Series</h3>';
                        echo '<table class="table table-striped table-bordered">';
                            echo '<thead class="table-dark">';
                                echo '<tr>';
                                    echo '<th>Título</th>';
                                    echo '<th>Duración</th>';
                                    echo '<th>Género</th>';
                                echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';
                                
                                $series = $contenido -> getElementsByTagName('series');
                                foreach($series as $serie){
                                    $generos = $serie -> getElementsByTagName('genero');
                                    foreach($generos as $genero){
                                        $titulos = $genero -> getElementsByTagName('titulo');
                                        foreach($titulos as $titulo){
                                            echo '<tr>';
                                            echo '<td>' . $titulo -> nodeValue . '</td>';
                                            echo '<td>' . $titulo -> getAttribute('duracion') . '</td>';
                                            echo '<td>' . $genero -> getAttribute('nombre') . '</td>';
                                            echo '</tr>';
                                        }
                                    }
                                }

                            echo '</tbody>';
                        echo '</table>';
                    echo '</section>';
                echo '</div>';


            }
        ?>
    
    </body>
</html>
