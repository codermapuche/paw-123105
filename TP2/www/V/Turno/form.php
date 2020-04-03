<?php 
	include('header.php'); 
?>
		
<h1>Nuevo</h1>
		
<form action="/index.php?accion=<?php echo $data['accion']; ?>" method="POST" enctype="multipart/form-data">
	<input type="hidden" name="id" value="<?php echo $data['id']; ?>">
	
	<div>
		<label for="nombre">Nombre</label>
		<input type="text" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre']; ?>" required>
	</div>
	<div>
		<label for="email">Email</label>
		<input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" required>
	</div>
	<div>
		<label for="telefono">Telefono</label>
		<input type="tel" id="telefono" name="telefono" pattern="\d{4} \- \d{2}[ ]\d{4}" title="Telefono (9999 - 99 9999)" value="<?php echo $data['telefono']; ?>" required>
	</div>
	<div>
		<label for="nacimiento">Fecha de nacimiento</label>
		<input type="date" id="nacimiento" name="nacimiento" placeholder="Nacimiento" value="<?php echo $data['nacimiento']; ?>" required>
	</div>
	<div>
		<label for="calzado">Calzado</label>
		<input type="number" id="calzado" name="calzado" step="1" min="20" max="45" placeholder="Calzado" value="<?php echo $data['calzado']; ?>">
	</div>
	<div>
		<label for="altura">Altura</label>
		<input type="range" id="altura" name="altura" step="1" min="12" max="240" placeholder="Altura (CM)" value="<?php echo $data['altura']; ?>">
	</div>
	<div>
		<label for="pelo">Color de pelo</label>
		<select id="pelo" name="pelo">
			<?php 
				foreach ($data['_pelos'] as $pid => $pname) {
					echo '<option value="'.$pid.'" '.($data['pelo'] == $pid ? "selected" : "").'>'.$pname.'</option>';
				}					
			?>
		</select>
	</div>
	<div>
		<label for="turno">Fecha de turno</label>
		<input type="date" id="turno" name="turno" placeholder="Turno" value="<?php echo $data['turno']; ?>" required>
	</div>
	<div>
		<label for="horario">Hora de turno</label>
		<input id="horario" name="horario" type="time" min="08:00" max="17:00" step="900" value="<?php echo $data['horario']; ?>" required>
	</div>
	<div>
		<label for="diagnostico">Diagnostico</label>
		<input type="file" id="diagnostico" name="diagnostico" accept="image/x-png,image/jpeg" />
	</div>
	<div>
		<input type="submit" value="Guardar">
		<input type="reset" value="Vaciar">
	</div>
</form>