<?php

    use TECWEB\MYAPI\Products as Products;
    require_once __DIR__ . '/myapi/Products.php';

    $products = new Products('marketzone');

    $products->singleByName($_POST['name']);
    echo $products->getData();

?>