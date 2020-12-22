<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrando a la interla</title>
    <!--Pilas con botstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
    //llamando a la libreria de SOUP
        require_once "lib/nusoap.php";
    //conectandome al servidor de Dirnadap
        $cliente = new nusoap_client('https://canales.cfn.fin.ec:7849/dinardapService?wsdl','wsdl');

        $resultado = $cliente->call('service',array('codigoPaquete'=>'604','numeroIdentificacion'=>'0917045387'));
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 border">
            <?php
                echo '<pre>';
                echo var_dump($resultado);
                //echo var_dump($cliente);
                echo '</pre>';

                //arreglo asociativo multidimencional
            ?>  
        </div>
        <div class="col-sm-12 col-md-6 border">
            <?php
                echo '<pre>';
                echo var_dump($resultado);
                //echo print_r($cliente);
                echo '</pre>';

                //arreglo asociativo multidimencional
            ?>  
        </div>
    </div>

</div>
</body>
</html>