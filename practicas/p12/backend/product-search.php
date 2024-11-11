<?php
    use TECWEB\MYAPI\Read\Read;
    require_once __DIR__.'/vendor/autoload.php';

    $productos = new Read('marketzone');
    $productos->search($_POST['search']);
    echo $productos->getData();
?>