<body>
	<form class="container" action="<?php echo base_url('Welcome/regInsert'); ?>" method="post">
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
		<h2>Datos de la mascota</h2>
		<div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 control-label">¿Cuántos animales trajiste a la campaña?:</label>
				<div class="col-sm-10">
					<input class="form-control" id="animalQuantity" type="text">
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xs-12 text-center">
				<a class="btn btn-default" id="addAnimals">Registrar animales</a>
			</div>
		</div>
		<hr/>
		<div id="pets"></div>
		
		<input id="registerSubmit" class="form-control" type="submit" value="Registrar">
		<br>
		<br>
		<br>
	</form>
</body>
<script type="text/javascript">
	var insertDiv = "<div class=\"form-group row\">";
	insertDiv += "<label for=\"animalName[]\" class=\"col-sm-2 control-label\">Nombre de la Mascota:</label>";
	insertDiv += "<div class=\"col-sm-10\"><input name=\"animalName[]\" type=\"text\" class=\"form-control\" placeholder=\"Nombre de la Mascota\"></div></div>";
	insertDiv += "<div class=\"form-group row\"><label for=\"weight[]\" class=\"col-sm-2 control-label\">Peso</label><div class=\"col-sm-10\">";
	insertDiv += "<input type=\"text\" class=\"form-control\" name=\"weight[]\" placeholder=\"Peso\"></div></div>"
	insertDiv += "<div class=\"form-group row\"><label for=\"sick[]\" class=\"col-sm-2 control-label\">Enfermo</label><div class=\"col-sm-10\">";
	insertDiv += "<input type=\"text\" class=\"form-control\" name=\"sick[]\" placeholder=\"Enfermo\"></div></div>"
	insertDiv += "<div class=\"form-group row\"><label for=\"species[]\" class=\"col-sm-2 control-label\">Especie:</label><div class=\"col-sm-10\">";
	insertDiv += "<select name=\"species[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";		
	insertDiv += "<?php foreach($species as $sp) { echo '<option value=\"' . $sp->id . '\">' . $sp->name . '</option>'; }?>";
	insertDiv += "</select></div></div><div class=\"form-group row\"><label for=\"gender[]\" class=\"col-sm-2 control-label\">G&eacute;nero:</label>";
	insertDiv += "<div class=\"col-sm-10\"><select name=\"gender[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";
	insertDiv += "<option value=\"Macho\">Macho</option><option value=\"Hembra\">Hembra</option></select></div>";
	insertDiv += "</div><div class=\"form-group row\"><label for=\"nervous[]\" class=\"col-sm-2 control-label\">¿Nervioso?:</label>";
	insertDiv += "<div class=\"col-sm-10\"><input type=\"checkbox\" name=\"nervous[]\"></div></div><div class=\"form-group row\">";
	insertDiv += "<label for=\"aggresive[]\" class=\"col-sm-2 control-label\">¿Agresivo?:</label><div class=\"col-sm-10\"><input type=\"checkbox\" name=\"aggresive[]\"></div></div><hr/>";

	$(function () {
		$("#addAnimals").click(function(){
			$('#pets').html("");
			var animals = parseInt($('#animalQuantity').val());
			for(var i = 0; i < animals; i++) {
				$('#pets').append(insertDiv);
			}
		});
	});
</script>
