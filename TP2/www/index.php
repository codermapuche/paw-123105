<!DOCTYPE html>
<html>
	<head>
		<title>Turnero</title>
	</head>
	<body>
		<h1><a href="/">Turnero</a></h1>

		<section>
			<?php
				require('C/Turno.php');
				$controller = new TurnoController();

				$accion = empty($_GET['accion']) ? 'index' : $_GET['accion'];

				switch ($accion) {
					case 'index':
						$controller->index();
						break;
					case 'view':
						$controller->view();
						break;
					case 'insert':
						$controller->insert();
						break;
					case 'update':
						$controller->update();
						break;
					default:
						$controller->error('Accion invalida.');
						break;
				}

			?>
		</section>
	</body>
</html>