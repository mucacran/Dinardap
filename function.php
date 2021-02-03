<?php
/***********DENUNCIAS Y RECLAMOS - formulario ****/
function prefix_send_email_to_admin() {
	//estas dos primeras lineas me tienen que indicar si hay algun error
	ini_set( 'display_errors', 1 );
	error_reporting( E_ALL );
    
	$to = "fbravo@cfn.fin.ec, sergio@mucacran.com, el.mucacran.rasta@hotmail.com, mucacran@gmail.com";
	$correoEnviado = false;
	
	$nombre = !empty($_POST['nombreDR']) ? $_POST['nombreDR']:'vacio';
	$cedula = !empty($_POST['cedulaDR']) ? $_POST['cedulaDR']:'vacio';
	$mensaje = !empty($_POST['mensajeDR']) ? $_POST['mensajeDR']:'vacio';
	$email_body = "Nombre: " . $nombre . "<br>Cedula: " . $cedula . "<br>". $mensaje;
	
	// Always set content-type when sending HTML email
	/*$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";*/
	$from = "fbravo@cfn.fin.ec";
	$headers = "De:" . $from;
	
	$asunto = "denuncias y reclamos";
	
	$success = mail($to,$asunto,$email_body,$headers);
	echo "Segun vi un tutorial esto se debe imprimir si el correo se fué<br>.";
	
	mail($to,$asunto,$email_body,$headers);
	if ($success) {
		$correoEnviado = true;
	}


	if($correoEnviado){
		echo "<h1>Mensaje enviado</h1>";
	}else{
		echo "<h2>Llena el formulario</h2>";
		echo $nombre . '<br>';
		echo $cedula . '<br>';
		echo $mensaje . '<br>';
		echo '<br>este es el contenido<br>';
		echo $email_body;
	}
}
add_action('admin_post_nopriv_contact_form', 'prefix_send_email_to_admin' );
add_action('admin_post_contact_form', 'prefix_send_email_to_admin' );
/*************************************************************************** */
/********************************FUncion para el formulario de contact form 7 */
add_action('wp_head','paraDarNombreYCedulaCOntacForm7');
function paraDarNombreYCedulaCOntacForm7(){
	if(is_page(13337)){
	?>
		<script>
			document.addEventListener( 'wpcf7submit', function( event ) {
			var inputs = event.detail.inputs;
			var idFormulario = event.detail.contactFormId;

			if ( '13335' == idFormulario ) {
				for ( var i = 0; i < inputs.length; i++ ) {
					if ( 'your-name' == inputs[i].name ) {
					alert( inputs[i].value );
					<?php
					echo '<h2>Su mensaje a sido enviado</h2>'
					?>
					break;
					};
				}
			}
			}, false );
		</script>
	<?php
	}
}
/*************FIN DE FUncion para el formulario de contact form 7 */
//pagina donde encontre como preguntar si es usuario o esta dentro de una pagina
//https://maugelves.com/etiquetas-condicionales/
