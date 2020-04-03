<?php 
	include('header.php'); 
?>

<h1>Turnos</h1>

<table border="1">
	<tr>
		<th>Fecha</th>
		<th>Hora</th>
		<th>Paciente</th>
		<th>Telefono</th>
		<th>Email</th>
		<th>Acciones</th>
	</tr>
	<?php 
		foreach($data['turnos'] as $turno) {		
	?>					
	<tr>
		<td><?php echo $turno['turno']; ?></td>
		<td><?php echo $turno['horario']; ?></td>
		<td><?php echo $turno['nombre']; ?></td>
		<td><?php echo $turno['telefono']; ?></td>
		<td><?php echo $turno['email']; ?></td>
		<td>
			<ul>
				<li>
					<a href="/index.php?accion=update&id=<?php echo $turno['id']; ?>">Editar</a>
				</li>
				<li>
					<a href="/index.php?accion=view&id=<?php echo $turno['id']; ?>">Ver</a>
				</li>
			</ul>
		</td>
	</tr>
	<?php 
		}			
	?>
</table>