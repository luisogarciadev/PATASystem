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
					<th>Turno</th>
					<th>Entrada</th>
					<th>Nombre</th>
					<th>Agresivo</th>
					<th>Historial</th>
					<th>Salida</th>
					<th>Due&ntilde;o</th>
					<th>Tel&eacute;fono</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($animals as $a) { 
					if ($a->aggressive == "1") {
						echo '<tr class="danger">';
					} else {
						echo '<tr>';
					}
					echo '<td>';
					echo $a->turn;
					echo '</td><td>';
					echo '<a class="btn btn-primary enter" name="' . $a->id . '">Entrada</a><p class="entry' . $a->id . '">' . $a->entryTime . '</p>';
					echo '</td><td>';
					echo $a->petName;
					echo '</td><td>';
					echo '</td><td>';
					echo $a->sick;
					echo '</td><td>';
					echo '<a class="btn btn-primary exit" name="' . $a->id . '">Salida</a><p class="exit' . $a->id . '">' . $a->exitTime . '</p>';
					echo '</td><td>';
					echo $a->personName;
					echo '</td><td>';
					echo $a->phone;
					echo '</td></tr>';
				} ?>
			</tbody>
		</table>
	</div>
</body>
<script>
	$(function(){
		$('.enter').on('click', function(){
			var id = $(this).attr('name');
			$.ajax({ url: '<?php echo base_url('Recovery/EnterTime');?>',
	        	data: { 'id': id },
	        	dataType: "text",
	        	cache: false,
	        	type: 'POST',
	        	success: function(value) {
	        		var d = new Date();
	        		var hours = d.getHours() < 10 ? "0" + d.getHours() : d.getHours();
	        		var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
	        		var seconds = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
                  	$('.entry' + id).text(hours + ":" + minutes + ":" + seconds);
                }                  	
			});
		});

		$('.exit').on('click', function(){
			var id = $(this).attr('name');
			$.ajax({ url: '<?php echo base_url('Recovery/ExitTime');?>',
	        	data: { 'id': id },
	        	dataType: "text",
	        	cache: false,
	        	type: 'POST',
	        	success: function(value) {
	        		var d = new Date();
	        		var hours = d.getHours() < 10 ? "0" + d.getHours() : d.getHours();
	        		var minutes = d.getMinutes() < 10 ? "0" + d.getMinutes() : d.getMinutes();
	        		var seconds = d.getSeconds() < 10 ? "0" + d.getSeconds() : d.getSeconds();
                  	$('.exit' + id).text(hours + ":" + minutes + ":" + seconds);
                }                  	
			});
		});
	});
</script>