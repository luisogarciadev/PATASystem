<body>
	<div class="container">
		<h1><?php echo $title; ?></h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Turno</th>
					<th>Nombre Mascota</th>
					<th>Especie</th>
					<th>G&eacute;nero</th>
					<th>Agresivo</th>
					<th>Foto</th>
					<th>Tomar Foto</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animals as $a) { 
					echo '<tr><td>';
					echo $a->turn;
					echo '</td><td>';
					echo $a->petName;
					echo '</td><td>';
					if ($a->idSpecies == 1) {
						echo 'Perro';
					} else if ($a->idSpecies == 2) {
						echo 'Gato';
					} else {
						echo 'Otro';
					}
					echo '</td><td>';
					echo $a->gender;
					echo '</td><td>';
					echo '<input class="cbAggressive" name="' . $a->id . '" type="checkbox"/>';
					echo '</td><td>';
					echo '<img class="img-responsive" src="' . base_url('uploads/' . $a->id . '.jpg') . '" />';
					echo '</td><td>';
					echo '<a class="btn btn-primary" href="' . base_url('PreRegister/Photo') . '/' . $a->id . '">Tomar foto</a>';
					echo '</td></tr>';
				} ?>
			</tbody>
		</table>
	</div>
</body>
<script>
	$(function(){
		$('.cbAggressive').on('click', function(){
			var id = $(this).attr('name');
			$.ajax({ url: '<?php echo base_url('PreRegister/isAggressive');?>',
	         data: { 'isAggressive': $(this).prop('checked') },
	         type: 'post',
	         success: function(output) {
                      alert(output);
                  }
			});
		});
	});
</script>