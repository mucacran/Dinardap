<?php /* Template Name: Denuncias y Reclamos */
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrando a la interla</title>
    <!--Pilas con botstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<form name="form" action="" method="post">
					<input type="text" name="cedula" id="ingCedula"> <button onclick="<?php reemplazarNumerodecedula(); ?>">Se carga el formulario</button>
				</form>
			</div>
		</div>
	</div>
	<?php
	    //llamando a la libreria de SOUP
	        require_once "lib/nusoap.php";
	    //conectandome al servidor de Dirnadap
	        function reemplazarNumerodecedula(){
	        	$numeroCedula = $_POST['cedula'];

				$cliente = new nusoap_client('https://canales.cfn.fin.ec:7849/dinardapService?wsdl','wsdl');
				$resultado = $cliente->call('getFichaGeneral',array('codigoPaquete'=>'604','numeroIdentificacion'=> $numeroCedula ));

				echo '<pre>';
                $instituciones = $resultado["return"]["instituciones"];
                $registros = $instituciones["datosPrincipales"]["registros"];
                foreach($registros as $i => $registro){
                	if($registro["codigo"] == 2){
	                    echo $i . " <b>". $registro["campo"] . ":</b> ". $registro["valor"] . "<br><b>codigo: </b>" . $registro["codigo"] . "<br><br>";
                	}
                }
                echo '</pre>';
	        }

	?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 border">
            <?php
                /*echo '<pre>';
                $instituciones = $resultado["return"]["instituciones"];
                $registros = $instituciones["datosPrincipales"]["registros"];
                foreach($registros as $i => $registro){
                	if($registro["codigo"] == 2){
	                    echo $i . " <b>". $registro["campo"] . ":</b> ". $registro["valor"] . "<br><b>codigo: </b>" . $registro["codigo"] . "<br><br>";
                	}
                }
                echo '</pre>';*/
            ?>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col">
			<?php echo do_shortcode('[contact-form-7 id="13335" title="Denuncias y Reclamos_copy"]'); ?>
		</div>
	</div>
</div>
</body>
</html>