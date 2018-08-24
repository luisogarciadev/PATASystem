<body>
	<br>
	<form class="container" action="<?php echo base_url('PreRegister/Update'); ?>" method="post">
		<input name="idPerson" type="hidden" value="<?php echo $person->id; ?>">
		<h1><?php echo $title; ?></h1>
		<a class="btn btn-danger" href="<?php echo base_url('PreRegister'); ?>">Regresar</a>
		<br>
		<br>
		<br>
		<div>
			<div class="form-group row">
				<label for="phone" class="col-sm-2 control-label">N&uacute;mero de tel&eacute;fono:</label>
				<div class="col-sm-10">
					<input class="form-control" id="phone" name="phone" type="number" value="<?php echo $person->phone; ?>">
				</div>
			</div>
		</div>
		<!-- <div class="form-group row">
			<div class="col-xs-12 text-center">
				<a class="btn btn-default" id="addAnimals">Registrar animales</a>
			</div>
		</div> -->
		<hr/>
		<div id="pets"></div>

		<input id="registerSubmit" class="form-control" type="submit" value="Modificar">
		<br>
		<br>
		<br>
	</form>
</body>
<script type="text/javascript">
	var amount = <?php echo count($animals); ?>;
	var animalList = [<?php 
		for ($i = 0; $i < count($animals); $i++) {
			$a = $animals[$i];
			echo "{";
			echo "id:'" . $a->id . "',";
			echo "turn:'" . $a->turn . "',";
			echo "petName:'" . $a->petName . "',";
			echo "idSpecies:'" . $a->idSpecies . "',";
			echo "gender:'" . $a->gender . "',";
			echo "isCertEng:'" . $a->isCertEng . "'";
			echo "}";
			if ($i < count($animals) - 1) {
				echo ",";
			}
		}?>];

	function init() {
		animalList.forEach(function(item){
			$('#pets').append(getInsert(item));
			$('.species').last().children().each(function() {
				if ($(this).prop('value') == item.idSpecies) {
					$(this).prop('selected', true);
				}
			});
			$('.gender').last().children().each(function() {
				if ($(this).prop('value') == item.gender) {
					$(this).prop('selected', true);
				}
			});
			$('input.certEnglish').last().prop('checked', item.isCertEng == "1" ? true: false);
		});
	}

	function getInsert(animal) {

		var insertDiv = "<div class=\"form-group row\">";
		insertDiv += "<input name=\"idAnimal[]\" type=\"hidden\" value=\"" + animal.id + "\">";
		insertDiv += "<label for=\"turn[]\" class=\"col-sm-2 control-label\">Turno:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"turn[]\" type=\"text\" class=\"form-control\" placeholder=\"Turno de la mascota\" value=\"" + animal.turn + "\"></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"petName[]\" class=\"col-sm-2 control-label\">Nombre de la mascota:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"petName[]\" type=\"text\" class=\"form-control\" placeholder=\"Nombre de la mascota\" value=\"" + animal.petName + "\"></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"species[]\" class=\"col-sm-2 control-label\">Especie:</label><div class=\"col-sm-10\">";
		insertDiv += "<select class=\"species form-control\" name=\"species[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";	
		insertDiv += "<?php foreach($species as $sp) { echo '<option value=\"' . $sp->id . '\">' . $sp->name . '</option>'; }?>";
		insertDiv += "</select></div></div>";
		insertDiv += "<div class=\"form-group row\"><label for=\"gender[]\" class=\"col-sm-2 control-label\">G&eacute;nero:</label>";
		insertDiv += "<div class=\"col-sm-10\"><select class=\"gender form-control\" name=\"gender[]\"><option value=\"-1\">Escoge una opci&oacute;n</option>";
		insertDiv += "<option value=\"Macho\">Macho</option><option value=\"Hembra\">Hembra</option></select></div>";
		insertDiv += "</div><div class=\"form-group row\">"
		insertDiv += "<label for=\"certEnglish[]\" class=\"col-sm-2 control-label\">Certificado Ingl&eacute;s:</label>";
		insertDiv += "<div class=\"col-sm-10\"><input name=\"certEnglish[]\" type=\"checkbox\" class=\"certEnglish form-control\" placeholder=\"Certificado Ingl&eacute;s\"></div></div><hr/>";
		return insertDiv;
	}

	$(function () {
		init();

		$('#registerSubmit').click(function(e) {
			e.preventDefault();
			var idAnimal = new Array();
			var turn = new Array();
			var petName = new Array();
			var species = new Array();
			var gender = new Array();
			var certEnglish = new Array();
			for (var i = 0; i < amount; i++) {
				idAnimal[i] = $('[name="idAnimal[]"]')[i].value;
				turn[i] = $('[name="turn[]"]')[i].value;
				petName[i] = $('[name="petName[]"]')[i].value;
				species[i] = $('[name="species[]"]')[i].value;
				gender[i] = $('[name="gender[]"]')[i].value;
				certEnglish[i] = $('[name="certEnglish[]"]')[i].checked;
			}
			$.ajax({ url: '<?php echo base_url('PreRegister/Update');?>',
	        	data: { 'idPerson': $('input[name="idPerson"').val(), 'phone': $('input[name="phone"]').val(), 'animalQuantity': amount, 'turn': turn, 'idAnimal': idAnimal, 'petName': petName, 'species': species, 'gender': gender, 'certEnglish': certEnglish },
	        	dataType: "text",
	        	cache: false,
	        	type: 'POST',
	        	success: function(value) {
                  	window.location.replace("<?php echo base_url('Register');?>");
                },
				error: function (x, h, e) {
					// alert('');
				}                  	

			});
		})
	});
</script>