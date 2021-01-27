<?php /* Template Name: Denuncias y Reclamos */ ?>

<html lang="es-EC">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrando a la interla</title>
	<?php wp_head();?>
	
    
	<style>
		body{
			opacity:1;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>
		cargando el formulario
		</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col">
				<form method="post" name="form" action="?"> 
					<input type="text" placeholder="Ingrese número de cédula" name="cedula"> 
					<input class="btn btn-primary" type="submit" value="Cargar la pagina"> 
				</form>
				<?php
					if(!empty($_POST['cedula'])){
					$numeroCedula = $_POST['cedula'];
					require_once "lib_soup/nusoap.php";
					$cliente = new nusoap_client('https://canales.cfn.fin.ec:7849/dinardapService?wsdl','wsdl');
					$resultado = $cliente->call('getFichaGeneral',array('codigoPaquete'=>'604','numeroIdentificacion'=> $numeroCedula ));

					echo '<pre>';
                	$instituciones = $resultado["return"]["instituciones"];
                    $registros = $instituciones["datosPrincipales"]["registros"];
                    $razonSocial;
                    $cedula;
                	foreach($registros as $i => $registro){
                		if($registro["codigo"] == 2){
                            //echo $i . " <b>". $registro["campo"] . ":</b> ". $registro["valor"] . "<br><b>codigo: </b>" . $registro["codigo"] . "<br><br>";
                            $razonSocial = $registro["valor"];
                        }
                        if($registro["codigo"] == 1){
                            $cedula = $registro["valor"];
                        }
                    }
                    echo $razonSocial . " - " . $cedula;
                    echo '</pre>';
						?>
<!---->
<?php include 'formulario-denunciasYreclamo.php'; ?>
<?php //include 'formulario-denunciasYreclamo_1.php'; ?>
<!---->
				<?php
					}
				else{
			        echo do_shortcode('[contact-form-7 id="13335" title="Denuncias y Reclamos_copy"]');
				}
				?>
			</div>
		</div>
	</div>
	<?php //wp_footer();?>
</body>
</html>