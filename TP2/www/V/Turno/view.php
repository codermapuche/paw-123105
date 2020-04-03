<?php 
	include('header.php'); 
?>

<h1>Turno #<?php echo $data['id']; ?></h1>

<dl>
	<dt>Nombre</dt>
	<dd><?php echo $data['nombre']; ?></dd>
	<dt>Email</dt>
	<dd><?php echo $data['email']; ?></dd>
	<dt>Telefono</dt>
	<dd><?php echo $data['telefono']; ?></dd>
	<dt>Fecha de nacimiento</dt>
	<dd><?php echo $data['nacimiento']; ?></dd>
	<dt>Calzado</dt>
	<dd><?php echo $data['calzado']; ?></dd>
	<dt>Altura</dt>
	<dd><?php echo $data['altura']; ?></dd>
	<dt>Pelo</dt>
	<dd><?php echo $data['pelo']; ?></dd>
	<dt>Fecha de turno</dt>
	<dd><?php echo $data['turno']; ?></dd>
	<dt>Hora de turno</dt>
	<dd><?php echo $data['horario']; ?></dd>
	<?php
		if ($data['diagnostico'] != "") {
	?>
	<dt>Diagnostico</dt>
	<dd><img src="images/<?php echo $data['id'].$data['diagnostico']; ?>"></dd>
	<?php
		}
	?>
</dl>