<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENtrando a la interla</title>
    <!--Pilas con botstrap-->
</head>
<body>
    <h5>Hola soy Sergio</h5>
    <?php
        echo '<h1>Al parecer vamos bien</h1>';
    ?>
    <?php
    //llamando a la libreria de SOUP
    require_once "lib/nusoap.php";
    //conectandome al servidor de Dirnadap
    $cliente = new nusoap_client('https://canales.cfn.fin.ec:7849/dinardapService?wsdl','wsdl');

    $resultado = $cliente->call('getFichaGeneral',array('codigoPaquete'=>'604','numeroIdentificacion'=>'0917045387'));


    echo '<pre>';
    //echo var_dump($resultado);
    echo var_dump($cliente);
    echo '</pre>';

    //arreglo asociativo multidimencional
    ?>
</body>
</html>