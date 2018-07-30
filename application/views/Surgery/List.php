<body>
	<div class="container">
		<br>
		<br>
		<div id="logo">
		<a class="btn btn-primary" href="<?php echo base_url(); ?>">Men&uacute;</a>
		<img src="<?php echo base_url('img/logo.png'); ?>"/>
		</div>
		<h1><?php echo $title; ?></h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Turno de la mascota</th>
					<th>Nombre de la mascota</th>
					<th>Especie de la mascota</th>
					<th>G&eacute;nero</th>
					<th>Historial</th>
					<th>Nombre del due&ntilde;o</th>
					<th>Tel&eacute;fono</th>
					<th>Anestesiado</th>
					
					
				</tr>
			</thead>
			<tbody>
				<?php foreach($animals as $a) { 
					echo '<tr><td>';
					echo $a->turn;
					echo '</td><td>';
					echo $a->petName;
					echo '</td><td>';
						if($a->idSpecies == 1)
					{echo 'Perro';
				} else if($a->idSpecies == 2)
					{echo 'Gato';
				} else {
					echo 'Otro';
					}
					echo '</td><td>';
					echo $a->gender;
					echo '</td><td>';
					echo $a->sick;
					echo '</td><td>';
					echo $a->personName;
					echo '</td><td>';
					echo $a->phone;
					echo '</td><td>';
					echo '<input class="cbSurgery" name="' . $a->id . '" type="checkbox"/>';
					echo '</td></tr>';
					
				} ?>
			</tbody>
		</table>
	</div>
</body>

<script>
	$(function(){
		$('.cbSurgery').on('click', function(){
			var id = $(this).attr('name');
			$.ajax({ url: '<?php echo base_url('Surgery/entered');?>',
	         data: { 'entered': $(this).prop('checked') },
	         type: 'post',
	         success: function(output) {
                      alert(output);
                  }
			});
		});
	});
</script>