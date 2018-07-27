<body>	
	<div class="container">
		<h1>LISTA DE PERSONAS PARA REGISTRO</h1>
		<a class="btn btn-primary" href="<?php echo base_url('Register/Insert'); ?>">Registrar nuevo</a>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Tel&eacute;fono</th>
					<th>Modificar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($people as $p) { 
					echo '<tr><td>';
					echo $p->personName;
					echo '</td><td>';
					echo $p->phone;
					echo '</td><td>';
					echo '<a href="' . base_url('Register/Modify') . '/' . $p->id . '">Modificar</a>';
					echo '</td></tr>';
				} ?>
			</tbody>
		</table>
	</div>
</body>