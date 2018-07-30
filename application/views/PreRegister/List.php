<body>
	<div class="container">
		<br>
		<br>
		<a class="btn btn-primary" href="<?php echo base_url(); ?>">Men&uacute;</a>
		<h1><?php echo $title; ?></h1>
		<a class="btn btn-primary" href="<?php echo base_url('PreRegister/Insert'); ?>">Registrar nuevo</a>
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
					echo '<a href="' . base_url('PreRegister/Modify') . '/' . $p->id . '">Modificar</a>';
					echo '</td></tr>';
				} ?>
			</tbody>
		</table>
	</div>
</body>