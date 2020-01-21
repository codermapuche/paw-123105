<?php 
	require('controller/turno.php');
	
	$action = empty($_GET["action"]) ? "" : $_GET["action"];
	$id = empty($_GET["id"]) ? "" : $_GET["id"];
	
	$controller = new TurnoController();
	
	switch ($action) {
		
		case "alta":			
			$data = $controller->add();
			require("view/turno-form.php");
			break;
			
		case "guardar":			
			$data = $controller->save($id, $_POST, $_FILES['diagnostico']);
			
			if ($data === false) {
				header('HTTP/1.0 400 Bad Request');
				echo 'Bad Request!';
				exit();				
			}
			
			require("view/turno-view.php");
			break;
			
		case "editar":	
			$data = $controller->get($id);
			
			if ($data === false) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();				
			}
			
			require("view/turno-form.php");
			break;
			
		case "visualizar":
			$data = $controller->get($id);
			
			if ($data === false) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();				
			}
					
			require("view/turno-view.php");
			break;
			
		case "borrar":
			$data = $controller->get($id);
			
			if ($data === false) {
				header('HTTP/1.0 404 Not Found');
				echo 'Not Found!';
				exit();				
			}
			
			$controller->rem($id);	
			
		case "listado":
			$data = $controller->getAll();			
			require("view/turno-list.php");
			break;
			
		default:
			header('HTTP/1.0 403 Forbidden');
			echo 'You are forbidden!';
			break;
			
	}