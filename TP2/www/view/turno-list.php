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
					<li><a href="/turno.php?action=listado">Listado</a>
				</ul>
			</nav>
		</header>
		
		<h1>Turnos</h1>
		
		<section>	
		
			<table border="1">
				<tr>
					<th>Fecha</th>
					<th>Hora</th>
					<th>Paciente</th>
					<th>Teléfono</th>
					<th>Email</th>
					<th>Acciones</th>
				</tr>
				<?php 
					foreach($data as $turno) {		
				?>					
				<tr>
					<th><?php echo $turno["turno"]; ?></th>
					<th><?php echo $turno["horario"]; ?></th>
					<th><?php echo $turno["nombre"]; ?></th>
					<th><?php echo $turno["telefono"]; ?></th>
					<th><?php echo $turno["email"]; ?></th>
					<th><a href="/turno.php?action=editar&id=<?php echo $turno["id"]; ?>">Editar</a> | <a href="/turno.php?action=visualizar&id=<?php echo $turno["id"]; ?>">Ver</a></th>
				</tr>
				<?php 
					}			
				?>
			</table>
			
		</section>
	</body>
</html>