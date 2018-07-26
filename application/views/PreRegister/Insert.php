<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Pre Registro</title>
	<link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/site.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
</head>
<body>
	<br>
	<form class="container" action="<?php echo base_url('PreRegister/Add'); ?>" method="post">
		<a class="btn btn-danger" href="<?php echo base_url('PreRegister'); ?>">Regresar</a>
		<br>
		<br>
		<br>
		<div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 control-label">N&uacute;mero de tel&eacute;fono:</label>
				<div class="col-sm-10">
					<input class="form-control" id="phone" name="phone" type="number">
				</div>
			</div>
		</div>
		<div>
			<div class="form-group row">
				<label for="email" class="col-sm-2 control-label">¿Cuántos animales trajiste a la campaña?:</label>
				<div class="col-sm-10">
					<input class="form-control" id="animalQuantity" name="animalQuantity" type="text">
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
	var maxTurn = <?php echo $maxTurn; ?> ;
	var maxTurnStart = maxTurn;
	function getInsert() {
		var insertDiv = "<div class=\"form-group row\">";
		insertDiv += "<label for=\"turn[]\" class=\"col-sm-2 control-label\">Turno:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"turn[]\" type=\"text\" class=\"form-control\" placeholder=\"Turno de la mascota\" value=" + ++maxTurn + "></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"petName[]\" class=\"col-sm-2 control-label\">Nombre de la mascota:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"petName[]\" type=\"text\" class=\"form-control\" placeholder=\"Nombre de la mascota\"></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"species[]\" class=\"col-sm-2 control-label\">Especie:</label><div class=\"col-sm-10\">";
		insertDiv += "<select class=\"form-control\" name=\"species[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";		
		insertDiv += "<?php foreach($species as $sp) { echo '<option value=\"' . $sp->id . '\">' . $sp->name . '</option>'; }?>";
		insertDiv += "</select></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"gender[]\" class=\"col-sm-2 control-label\">G&eacute;nero:</label>";
		insertDiv += "<div class=\"col-sm-10\"><select class=\"form-control\" name=\"gender[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";
		insertDiv += "<option value=\"Macho\">Macho</option><option value=\"Hembra\">Hembra</option></select></div>";
		insertDiv += "</div><div class=\"form-group row\">"
		insertDiv += "<label for=\"certEnglish[]\" class=\"col-sm-2 control-label\">Certificado Ingl&eacute;s:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"certEnglish[]\" type=\"checkbox\" class=\"form-control\" placeholder=\"Certificado Ingl&eacute;s\"></div></div><hr/>";
		return insertDiv;
	}

	$(function () {
		$("#addAnimals").click(function(){
			$('#pets').html("");
			var animals = parseInt($('#animalQuantity').val());
			maxTurn = maxTurnStart;
			for (var i = 0; i < animals; i++) {
				$('#pets').append(getInsert());
			}
		});
	});
</script>
</html>




<!-- $turn = $this->input->post('turn');
$idSpecies = $this->input->post('idSpecies');
$idStatus = 1;
$campaignDate = date("Y-m-d H:i:s");
$active = 1; -->