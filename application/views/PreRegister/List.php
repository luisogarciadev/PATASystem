<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lista Personas</title>
	<link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php echo base_url('css/site.css'); ?>" rel="stylesheet">
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<h1>LISTA DE PERSONAS PARA PRE REGISTRO</h1>
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