<?php
	require('M/Turno.php');

	class TurnoController {

		public function index() {
			$turnos = Turno::getAll();
			$data = [];

			$data['turnos'] = array_map(function($tid) {
				$turno = new Turno;
				$turno->load($tid);
				return $turno->data(true);
			}, $turnos);

			require('V/Turno/index.php');
		}

		public function view() {
			$turno = new Turno;
			$turno->load($_GET['id']);
			$data = $turno->data(true);
			
			if ($turno->validate() !== false) {
				$this->error('El turno no existe.');
			}

			require('V/Turno/view.php');
		}

		public function insert() {
			$turno = new Turno;
			$data = $turno->data();

			if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				if ( empty($_FILES['diagnostico']['name']) ) {
					$_POST['diagnostico'] = '';
				} else {
					$_POST['diagnostico'] = '.'.pathinfo($_FILES['diagnostico']['name'], PATHINFO_EXTENSION);
				}

				$turno->import($_POST);
				
				$error = $turno->validate();
				if ( $error === false ) {
					$turno->load();
					$turno->guardar();

					$data = $turno->data();
					
					if ( !empty($data['diagnostico']) ) {
						move_uploaded_file($_FILES['diagnostico']['tmp_name'], 'images/'.$data['id'].$data['diagnostico']);
					}
					
					require('V/Turno/view.php');
					return;
				} else {
					$this->error($error);
					$data = $turno->data();
				}
			}

			$data['accion'] = 'insert';
			require('V/Turno/form.php');
		}

		public function update() {
			$turno = new Turno;

			if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
				$turno->load($_POST['id']);
				$data = $turno->data();

				if ( empty($_FILES['diagnostico']['name']) ) {
					$_POST['diagnostico'] = '';
					if ($data['diagnostico']) {
						$_POST['diagnostico'] = $data['diagnostico'];
					}
				} else {
					$_POST['diagnostico'] = '.'.pathinfo($_FILES['diagnostico']['name'], PATHINFO_EXTENSION);
				}

				$turno->import($_POST);
				
				$error = $turno->validate();
				if ( $error === false ) {
					$turno->guardar();

					if ( $_POST['diagnostico'] && $data['diagnostico'] && $_POST['diagnostico'] != $data['diagnostico'] ) {
						unlink('images/'.$data['id'].$data['diagnostico']);
					}

					if ( !empty($_FILES['diagnostico']['name']) ) {
						move_uploaded_file($_FILES['diagnostico']['tmp_name'], 'images/'.$data['id'].$_POST['diagnostico']);
					}
					
					$data = $turno->data();
					require('V/Turno/view.php');
					return;
				} else {
					$this->error($error);
				}
			} else {
				$turno->load($_GET['id']);
			}
			
			$data = $turno->data();
			$data['accion'] = 'update';
			require('V/Turno/form.php');
		}

		public function error($mensaje) {
			$data = [ 'error' => $mensaje ];
			header('HTTP/1.0 400 Bad request');
			include('V/Turno/error.php');
		}
	}