<?php 
	require('model/turno.php');
	
	$action = empty($_GET["action"]) ? "" : $_GET["action"];
	$id = empty($_GET["id"]) ? "" : $_GET["id"];
		
	
	switch ($action) {
		
		case "alta":			
			$turno = new Turno;
			$data = $turno->data();
			require("view/turno-form.php");
			break;
			
		case "guardar":		
			$turno = new Turno;
			$turno->load($id);			
			$data = $turno->data();		
			
			if (empty($_FILES['diagnostico']['name'])) {
				$_POST['diagnostico'] = '';
				if ($data['diagnostico']) {
					$_POST['diagnostico'] = $data['diagnostico'];
				}
				// Image store in db
				$_POST['image'] = '';
			} else {
				$_POST['diagnostico'] = '.'.pathinfo($_FILES['diagnostico']['name'], PATHINFO_EXTENSION);
				// Image store in db
				$_POST['image'] = file_get_contents($_FILES['diagnostico']['tmp_name']);
			}
			
			$turno->import($_POST);
									
			if (!$turno->validate()) {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad Request!';
				exit();
			}
			
			if ($data['diagnostico'] && $_POST['diagnostico'] && $data['diagnostico'] != $_POST['diagnostico']) {
				unlink('images/'.$data['id'].$data['diagnostico']);
			}					
			
			$turno->guardar();
			
			$data = $turno->data(true);
			
			if (!empty($data['diagnostico'])) {
				move_uploaded_file($_FILES['diagnostico']['tmp_name'], 'images/'.$data['id'].$data['diagnostico']);				
			}
			
			require("view/turno-view.php");
			break;
			
		case "editar":
			$turno = new Turno;
			$turno->load($id);	
			
			if (!$turno->validate()) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();
			}
			
			$data = $turno->data();
			require("view/turno-form.php");
			break;
			
		case "visualizar":
			$turno = new Turno;
			$turno->load($id);	
			
			if (!$turno->validate()) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();
			}
					
			$data = $turno->data(true);
			require("view/turno-view.php");
			break;
			
		case "borrar":
			$turno = new Turno;
			$turno->load($id);	
			
			if (!$turno->validate()) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();
			}
			
			$data = $turno->data();
			
			$turno->delete();
			
			if ($data['diagnostico']) {
				unlink('images/'.$data['id'].$data['diagnostico']);
			}				
			
		case "listado":
			$turnos = Turno::getAll();
			
			$data = array_map(function($tid) {
				$turno = new Turno;
				$turno->load($tid);	
				return $turno->data(true);
			}, $turnos);
			
			require("view/turno-list.php");
			break;
			
		default:
			header('HTTP/1.0 403 Forbidden');
			echo 'You are forbidden!';
			break;
			
	}