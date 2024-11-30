<?php

    $data = array(
        'status'  => 'error',
        'message' => 'Validación no pasada'
    );

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(isset($_FILES['xml']) && isset($_FILES['xsd'])){
            $xmlPath = $_FILES['xml']['tmp_name'];
            $xsdPath = $_FILES['xsd']['tmp_name'];

            libxml_use_internal_errors(true);

            $xml = new DOMDocument();
            $xml -> load($xmlPath);

            if(!$xml -> schemaValidate($xsdPath)){
                $errors = libxml_get_errors();
                $numError = 1;
                $lista = '';

                foreach($errors as $error){
                    $lista = $lista . '[ '.($numError++).' ]: '.$error->message.'<br/>';
                }

                $data['errors'] = $lista;

            }
            else{
                $data['status'] = 'success';
                $data['message'] = 'Validación pasada';

                
            }

        }
    }

    echo json_encode($data, JSON_PRETTY_PRINT);

?>