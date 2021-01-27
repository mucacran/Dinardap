<?php /* Template Name: Denuncias y Reclamos */
?>

<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrando a la interla</title>
	<!--CF7-->
	<link rel='stylesheet' href='https://www.cfn.fin.ec/wp-content/plugins/cf7-conditional-fields/style.css' type='text/css' media='all' />
	<!--RASTREA SI UN FORMULARIO SE ENVIO POR MEDIO DE GOOGLE ANALYTICS-->
<script>
document.addEventListener( 'wpcf7mailsent', function( event ) {
  ga('send', 'event', 'Contact Form', 'submit');
}, false );
</script>
	
    <!--Pilas con botstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
	
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
<?php //include 'formulario-denunciasYreclamo.php'; ?>
<?php include 'formulario-denunciasYreclamo_1.php'; ?>
<?php
$to = "fbravo@cfn.fin.ec";
$correoEnviado = false;

if (isset($_POST['submit'])) {
    $mensaje = $_POST['message'];
    $subject = "Quejas y Reclamos";
    $email_body = "Nombre: " . $razonSocial . "<br>Cedula: " . $cedula . "<br>". $mensaje;

    mail($to,$subject,$email_body);

    $correoEnviado = true;
}


if($correoEnviado){
    echo "<h1>Mensaje enviado</h1>";
}else{
    echo "<h1>Llena el formulario</h1>";
}
						
?>
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
<!--CF7-->
	<script type="text/javascript">
document.addEventListener( 'wpcf7mailsent', function( event ) {
    if ('7410'== event.detail.contactFormId) {
		var mensaje = document.getElementById('formularioDeSalidaJuridico');
		mensaje.innerHTML = '<div class="alert alert-success" role="alert">Su mensaje a sido enviado con éxito</div><h4 class="alert-heading">Estamos buscando el mejor producto para ti. Te contactaremos de inmediato.</h4><br><a href="https://www.cfn.fin.ec" class="btn btn-outline-success">SALIR</a><br><p></p>';
		//https://contactform7.com/dom-events/
		var cerrarPopUpJuridicaHijo = document.getElementById('wow-modal-close-3');
		var cerrarPopUpJuridicaPapa = document.getElementById('wow-modal-overlay-3');
		//selecionando etiqueta
		var cuerpoBody = document.getElementsByTagName("BODY")[0];
		var cuerpoHTML = document.getElementsByTagName("HTML")[0];
		cerrarPopUpJuridicaHijo.style.display = 'none';cerrarPopUpJuridicaPapa.style.display = 'none';cuerpoBody.classList.remove("no-scroll");cuerpoHTML.classList.remove("no-scroll");
		
    }
	if ( '7404' == event.detail.contactFormId ) {
		var mensaje = document.getElementById('formularioDeSalidaNatural');
		mensaje.innerHTML = '<div class="alert alert-success" role="alert">Su mensaje a sido enviado con éxito</div><h4 class="alert-heading">Estamos buscando el mejor producto para ti y te contactaremos de inmediato.</h4><br><a href="https://www.cfn.fin.ec" class="btn btn-outline-success">SALIR</a><br><p></p>';
		//https://contactform7.com/dom-events/
		//https://contactform7.com/2017/06/07/on-sent-ok-is-deprecated/
		
		var cerrarPopUpNaturalHija = document.getElementById('wow-modal-close-2');
		var cerrarPopUpNaturalMama = document.getElementById('wow-modal-overlay-2');
		//selecionando etiqueta
		var cuerpoBody = document.getElementsByTagName("BODY")[0];
		var cuerpoHTML = document.getElementsByTagName("HTML")[0];
		
		cerrarPopUpNaturalHija.style.display = 'none';cerrarPopUpNaturalMama.style.display = 'none';cuerpoBody.classList.remove("no-scroll");cuerpoHTML.classList.remove("no-scroll");
    }
}, false );
</script>
<script type="text/javascript">
document.addEventListener( 'wpcf7invalid', function( event ) {
    if ('7410'== event.detail.contactFormId) {
		alert ('algunos de los campos no cumplen con las condiciones');
    }
	if ( '7404' == event.detail.contactFormId ) {
		alert ('algunos de los campos no cumplen con las condiciones');
    }
}, false );
</script>
<script type='text/javascript' src='https://code.jquery.com/jquery-1.12.4.min.js'></script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7 = {"apiSettings":{"root":"https:\/\/www.cfn.fin.ec\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"}};
/* ]]> */
</script>
<script type='text/javascript'>
/* <![CDATA[ */
var wpcf7cf_global_settings = {"ajaxurl":"https:\/\/www.cfn.fin.ec\/wp-admin\/admin-ajax.php"};
/* ]]> */
</script>
<script type='text/javascript' src='https://www.cfn.fin.ec/wp-content/plugins/cf7-conditional-fields/js/scripts.js'></script>
</body>
</html>