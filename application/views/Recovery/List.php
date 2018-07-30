<body>
	<div class="container">
		<h1><?php echo $title; ?></h1>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Turno</th>
					<th>Entrada</th>
					<th>Nombre</th>
					<th>Agresivo</th>
					<th>Historial</th>
					<th>Due&ntilde;o</th>
					<th>Tel&eacute;fono</th>
					<th>Salida</th>
					
					
					
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
					echo '</td><td>';
					echo $a->petName;
					echo '</td><td>';
					echo '</td><td>';
					echo $a->sick;
					echo '</td><td>';
					echo $a->personName;
					echo '</td><td>';
					echo $a->phone;
					echo '</td><td>';
					echo '</td></tr>';
					
				} ?>
			</tbody>
		</table>
	</div>
</body>
<script>
	
</script>