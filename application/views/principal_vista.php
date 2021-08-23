<h1>Binvenido a nuesta pagina</h1>
<h3>Registro de usuarios</h3>
<form action="<?php echo base_url(); ?>index.php/principal/registrar" method="POST">
	<label>Ingrese su usuario
		<input type="text" name="nombre">
	</label>
	<br>
	<label>Ingrese su password
		<input type="text" name="password">
	</label>
	<br>
	<label>Confirme su password
		<input type="text" name="repassword">
	</label>
	<button type="submit">Enviar</button>
</form>