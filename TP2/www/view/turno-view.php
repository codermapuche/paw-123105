<!DOCTYPE html>
<html>
	<head>
			<title>Turnos</title>
	</head>
	<body>		
		<header>
			<nav>
				<ul>
					<li><a href="/turno.php?action=alta">Nuevo</a>
					<li><a href="/turno.php?action=editar&id=<?php echo $data['id']; ?>">Editar</a>
					<li><a href="/turno.php?action=listado">Listado</a>
				</ul>
			</nav>
		</header>
		
		<h1>Turno #<?php echo $data['id']; ?></h1>
		
		<section>	
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
		</section>	
	</body>
</html>