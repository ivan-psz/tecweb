<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        // INFORMACIÓN DEL USUARIO

        $usuario = $_POST['usuario'];
        switch($_POST['size']){
            case 'french':
                $idioma = 'FR';
                break;
            case 'english':
                $idioma = 'EN';
                break;
            case 'spanish':
                $idioma = 'ES';
                break;
        }
        
        // INFORMACIÓN DE LAS PELÍCULAS

        $generoPelicula = $_POST['pel-genero'];
        $tituloPeliculaA = $_POST['pel-titulo1'];
        $tituloPeliculaB = $_POST['pel-titulo2'];
        $duracionPeliculaA = $_POST['pel-duracion1'];
        $duracionPeliculaB = $_POST['pel-duracion2'];

        // INFORMACIÓN DE LAS SERIES

        $generoSerie = $_POST['ser-genero'];
        $tituloSerieA = $_POST['ser-titulo1'];
        $tituloSerieB = $_POST['ser-titulo2'];
        $duracionSerieA = $_POST['ser-duracion1'];
        $duracionSerieB = $_POST['ser-duracion2'];

        $xml = new DOMDocument();
        $documento = file_get_contents('../t01/docs/serviciovod.xml');
        $xml->loadXML($documento, LIBXML_NOBLANKS);

        // PROCESO PARA PREPARAR LA INFORMACIÓN DEL USUARIO AL PERFIL

        $nodoPerfil = $xml -> createElement('perfil');
        $nombrePerfil = $xml -> createAttribute('usuario');
        $idiomaPerfil = $xml -> createAttribute('idioma');

        $nombrePerfil -> value = $usuario;
        $idiomaPerfil -> value = $idioma;

        $nodoPerfil -> appendChild($nombrePerfil);
        $nodoPerfil -> appendChild($idiomaPerfil);

        // PROCESO PARA PREPARAR LA INFORMACIÓN DE LAS PELÍCULAS

        $nodoGeneroPelicula = $xml -> createElement('genero');
        $nombreGenero = $xml -> createAttribute('nombre');
        $nombreGenero -> value = $generoPelicula;

        $nodoPeliculaA = $xml -> createElement('titulo', $tituloPeliculaA);
        $attPeliculaA = $xml -> createAttribute('duracion');
        $attPeliculaA -> value = $duracionPeliculaA;
        $nodoPeliculaA -> appendChild($attPeliculaA);

        $nodoPeliculaB = $xml -> createElement('titulo', $tituloPeliculaB);
        $attPeliculaB = $xml -> createAttribute('duracion');
        $attPeliculaB -> value = $duracionPeliculaB;
        $nodoPeliculaB -> appendChild($attPeliculaB);

        $nodoGeneroPelicula -> appendChild($nombreGenero);
        $nodoGeneroPelicula -> appendChild($nodoPeliculaA);
        $nodoGeneroPelicula -> appendChild($nodoPeliculaB);

        // PROCESO PARA PREPARAR LA INFORMACIÓN DE LAS SERIES

        $nodoGeneroSerie = $xml -> createElement('genero');
        $nombreGenero = $xml -> createAttribute('nombre');
        $nombreGenero -> value = $generoSerie;

        $nodoSerieA = $xml -> createElement('titulo', $tituloSerieA);
        $attSerieA = $xml -> createAttribute('duracion');
        $attSerieA -> value = $duracionSerieA;
        $nodoSerieA -> appendChild($attSerieA);

        $nodoSerieB = $xml -> createElement('titulo', $tituloSerieB);
        $attSerieB = $xml -> createAttribute('duracion');
        $attSerieB -> value = $duracionSerieB;
        $nodoSerieB -> appendChild($attSerieB);

        $nodoGeneroSerie -> appendChild($nombreGenero);
        $nodoGeneroSerie -> appendChild($nodoSerieA);
        $nodoGeneroSerie -> appendChild($nodoSerieB);

        // INSERCIÓN DE ELEMENTOS A XML

        $cuenta = $xml -> getElementsByTagName('cuenta') -> item(0);
        $perfil = $cuenta -> getElementsByTagName('perfiles') -> item(0);
        $perfil -> appendChild($nodoPerfil);

        $contenido = $xml -> getElementsByTagName('contenido') -> item(0);
        $pelicula = $contenido -> getElementsByTagName('peliculas') -> item(0);
        $pelicula -> appendChild($nodoGeneroPelicula);

        $serie = $contenido -> getElementsByTagName('series') -> item(0);
        $serie -> appendChild($nodoGeneroSerie);

        $xml -> preserveWhiteSpace = false;
        $xml -> formatOutput = true;
        $xml -> save('serviciovod_actualizado.xml');
        header('Content-Type: application/xml');
        header('Content-Disposition: attachment; filename="serviciovod_actualizado.xml"');
        readfile('serviciovod_actualizado.xml');
    }
    else{
        exit("No se recibió una petición de tipo POST");
    }

?>