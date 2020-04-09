<?php 
	include('header.php'); 
?>

<h1>Turno #<?php echo $data['id']; ?></h1>

<ul>
	<li>Nombre<br>
	<?php echo $data['nombre']; ?></li>
	<li>Email<br>
	<?php echo $data['email']; ?></li>
	<li>Telefono<br>
	<?php echo $data['telefono']; ?></li>
	<li>Fecha de nacimiento<br>
	<?php echo $data['nacimiento']; ?></li>
	<li>Calzado<br>
	<?php echo $data['calzado']; ?></li>
	<li>Altura<br>
	<?php echo $data['altura']; ?></li>
	<li>Pelo<br>
	<?php echo $data['pelo']; ?></li>
	<li>Fecha de turno<br>
	<?php echo $data['turno']; ?></li>
	<li>Hora de turno<br>
	<?php echo $data['horario']; ?></li>
	<?php
		if ($data['diagnostico'] != "") {
	?>
	<li>Diagnostico<br>
	<img src="images/<?php echo $data['id'].$data['diagnostico']; ?>"></li>
	<?php
		}
	?>
</ul>