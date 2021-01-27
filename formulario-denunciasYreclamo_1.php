<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
<h2>Contactanos</h2>
<label for="nombreDR">Nombre completo:</label> <input id="nombreDR" name="nombreDR" type="text" value="<?php echo $razonSocial ?>"/>
<label for="cedulaDR">Número de cédula:</label> <input id="cedulaDR" style="cursor: pointer;" name="cedulaDR" type="text" value="<?php echo $cedula ?>" />
<label for="mensajeDR">Mensaje:</label>  <textarea id="mensajeDR" name="mensajeDR"></textarea>
<input type="hidden" name="action" value="contact_form">
<p><input type="submit" value="Enviar" /></p>
</form>




