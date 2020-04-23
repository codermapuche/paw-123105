<?php
	namespace App\Controllers;

	class Turnos extends \App\Core\Controller {
		
		private $_pelos;
		
		private static function convert_to_bytes($val) {
			$last = strtolower(substr($val, -1));
			$val = substr($val, 0, -1);
			switch($last) {
			case 'g':
				$val *= 1024;
			case 'm':
				$val *= 1024;
			case 'k':
				$val *= 1024;
			}
			return $val;
		}
		
		public function __construct() {
			$this->_pelos = \App\Models\Turnos::$_pelos;
			$this->model = new \App\Models\Turnos();
		}

		public function index() {
			$data = [ "_pelos" => $this->_pelos ];

			$data['turnos'] = array_map(function($turno) {
				$turno['_pelo'] = $this->_pelos[$turno['pelo']]["nombre"];
				return $turno;
			}, $this->model->getAll());
			
			return view('index', $data);
		}

		public function ver() {
			$this->model->load($_GET['id']);
			$data = $this->model->export();
			
			if ($this->model->validate(true) !== false) {
				return view('error', [ "code" => "404", "error" => "El turno no existe" ]);
			}
			
			$data['_pelo'] = $this->_pelos[$data['pelo']]["nombre"];
			return view('view', $data);
		}

		public function editar() {
			$this->model->load($_GET['id']);
			$data = $this->model->export();
			
			if ($this->model->validate(true) !== false) {
				return view('error', [ "code" => "404", "error" => "El turno no existe" ]);
			}
			
			$data["_pelos"] = \App\Models\Turnos::$_pelos;
			return view('form', $data);
		}

		public function borrar() {
			$this->model->load($_GET['id']);
			$data = $this->model->export();
			$this->model->remove($_GET['id']);
			
			$logger = \App\Core\App::get('logger');	
			if ($data["id"]) {			
				$logger->info('DELETE:TURNOS:'.$data["id"], $data);
			}
			
			return $this->index();
		}

		public function nuevo() {
			$data = [ "_pelos" => \App\Models\Turnos::$_pelos ];
			return view('form', $data);
		}

		public function guardar() {					
			if (isset($_SERVER['CONTENT_LENGTH']) && (int) $_SERVER['CONTENT_LENGTH'] > self::convert_to_bytes(ini_get('post_max_size'))) {
				$data["error"] = "El archivo es muy grande, maximo 10MB";	
				$data["_pelos"] = $this->_pelos;
				
				return view('form', $data);	
			}			
			
			$this->model->load($_POST['id']);
			$data = $this->model->export();
			$backup = $data;

			if ( empty($_FILES['diagnostico']['name']) ) {
				$_POST['diagnostico'] = '';
				if ($data['diagnostico']) {
					$_POST['diagnostico'] = $data['diagnostico'];
				}
			} else {
				$_POST['diagnostico'] = "." . pathinfo($_FILES['diagnostico']['name'], PATHINFO_EXTENSION);
			}
			
			$this->model->import($_POST);			
			$error = $this->model->validate();
			
			if ( $error !== false ) {
				$data = $this->model->export();
				$data["error"] = $error;	
				$data["_pelos"] = $this->_pelos;
				
				return view('form', $data);				
			}
			
			if ( !empty($_FILES['diagnostico']['name']) ) {
				$ext = pathinfo($_FILES['diagnostico']['name'], PATHINFO_EXTENSION);
				move_uploaded_file($_FILES['diagnostico']['tmp_name'], 'public/images/'.$data['id'].".".$ext);
				$image = file_get_contents('public/images/'.$data['id'].".".$ext);
				unlink('public/images/'.$data['id'].".".$ext);				
				$_POST['diagnostico'] = 'data:image/'.$ext.';base64,'.base64_encode($image);		
				$this->model->import($_POST);		
			}
				
			$this->model->guardar();
			$data = $this->model->export();
			
			$logger = \App\Core\App::get('logger');	
			if ($backup["id"]) {			
				$logger->info('UPDATE:TURNOS:'.$data["id"], $backup);
			} else {
				$logger->info('INSERT:TURNOS:'.$data["id"]);						
			}
			
			$data['_pelo'] = $this->_pelos[$data['pelo']]["nombre"];
			return view('view', $data);
		}
	}