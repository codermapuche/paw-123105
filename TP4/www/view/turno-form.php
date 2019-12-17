<!DOCTYPE html>
<html>
	<head>
			<title>Turnos</title>
	</head>
	<body>		
		<header>
			<nav>
				<ul>
					<li><a href="/turno.php?action=listado">Listado</a>
				</ul>
			</nav>
		</header>
		
		<h1>Nuevo</h1>
		
		<section>	
			<form action="/turno.php?action=guardar&id=<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
				<div>
					<input type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre']; ?>" required>
					<label for="nombre">Nombre</label>
				</div>
				<div>
					<input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" required>
					<label for="email">Email</label>
				</div>
				<div>
					<input type="tel" name="telefono" pattern="\d{4}[ \- ]\d{2}[ ]\d{4}" title="Telefono (9999 - 99 9999)" value="<?php echo $data['telefono']; ?>" required>
					<label for="telefono">Telefono</label>
				</div>
				<div>
					<input type="date" name="nacimiento" placeholder="Nacimiento" value="<?php echo $data['nacimiento']; ?>" required>
					<label for="nacimiento">Fecha de nacimiento</label>
				</div>
				<div>
					<input type="number" name="calzado" step="1" min="20" max="45" placeholder="Calzado" value="<?php echo $data['calzado']; ?>">
					<label for="calzado">Calzado</label>
				</div>
				<div>
					<input type="range" name="altura" step="1" min="12" max="240" placeholder="Altura (CM)" value="<?php echo $data['altura']; ?>">
					<label for="altura">Altura</label>
				</div>
				<div>
					<select name="pelo">
						<?php 
							foreach ($data['_pelos'] as $pid => $pname) {
								echo '<option value="'.$pid.'" '.($data['pelo'] == $pid ? "selected" : "").'>'.$pname.'</option>';
							}					
						?>
					</select>
					<label for="pelo">Color de pelo</label>
				</div>
				<div>
					<input type="date" name="turno" placeholder="Turno" value="<?php echo $data['turno']; ?>" required>
					<label for="turno">Fecha de turno</label>
				</div>
				<div>
					<input name="horario" type="time" min="08:00" max="17:00" step="900" value="<?php echo $data['horario']; ?>" required>
					<label for="horario">Hora de turno</label>
				</div>
				<div>
					<input type="file" name="diagnostico" accept="image/x-png,image/jpeg" />
					<label for="diagnostico">Diagnostico</label>
				</div>
				<div>
					<input type="submit" value="Guardar">
					<input type="reset" value="Vaciar">
				</div>
			</form>
		</section>
	</body>
</html>