<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro</title>
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<form class="container" action="<?php echo base_url('Welcome/register'); ?>" method="post">
		<h2>Datos del dueño</h2>
		<div class="form-group row">
			<label for="name" class="col-sm-2 control-label">Nombre Completo:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="name" name="name" placeholder="Nombre Completo">
			</div>
		</div>
		<div class="form-group row">
			<label for="phone" class="col-sm-2 control-label">N&uacute;mero de Tel&eacute;fono:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="phone" name="phone" placeholder="N&uacute;mero de Tel&eacute;fono">
			</div>
		</div>
		<div class="form-group row">
			<label for="address" class="col-sm-2 control-label">Domicilio:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="address" name="address" placeholder="Domicilio">
			</div>
		</div>

		<div class="form-group row">
			<label for="email" class="col-sm-2 control-label">Correo Electr&oacute;nico:</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="email" name="email" placeholder="Correo Electr&oacute;nico">
			</div>
		</div>
		<div class="form-group row">
			<h2>Datos de la mascota</h2>
		</div>
		<div id="addAnimals">
			<span>¿Cuántos animales trajiste a la campaña?</span> <input type="text"> <button id="">Registrar animales</button><br><br>
		</div>
		<div>
			Nombre de la mascota: <br>
			<input name="animalName[]" type="text" placeholder="Nombre de la Mascota"><br><br>
			Especie: <br>
			<select name="species[]">
				<option value="-1">Escoge una opci&oacute;n</option>
				<?php foreach($species as $sp) {
					echo '<option value="' . $sp->id . '">' . $sp->name . '</option>';
				} ?>	
			</select><br><br>
			G&eacute;nero: <br>
			<select name="gender[]">
				<option value="-1">Escoge una opci&oacute;n</option>
				<option value="Macho">Macho</option>
				<option value="Hembra">Hembra</option>
			</select><br><br>
			Es Nervioso: <input type="checkbox" name="nervous[]"><br><br>
			Es Agresivo: <input type="checkbox" name="aggresive	[]"><br><br>
		</div>
		<input id="registerSubmit" type="submit" value="Registrar">
	</form>
</body>
</html>