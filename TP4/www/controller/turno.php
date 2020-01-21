<?php 
	require('model/turno.php');
	
	class TurnoController {		
	
		public function alta() {
			$turno = new Turno;
			return $turno->data();			
		}
		
		public function save($id, $info, $file) {	
			$turno = new Turno;
			$turno->load($id);			
			$data = $turno->data();		
			
			if (empty($file['name'])) {
				$info['diagnostico'] = '';
				if ($data['diagnostico']) {
					$info['diagnostico'] = $data['diagnostico'];
				}
				// Image store in db
				$info['image'] = '';
			} else {
				$info['diagnostico'] = '.'.pathinfo($file['name'], PATHINFO_EXTENSION);
				// Image store in db
				$info['image'] = file_get_contents($file['tmp_name']);
			}
			
			$turno->import($info);
									
			if (!$turno->validate()) {
				return false;
			}
			
			if ($data['diagnostico'] && $info['diagnostico'] && $data['diagnostico'] != $info['diagnostico']) {
				unlink('images/'.$data['id'].$data['diagnostico']);
			}					
			
			$turno->guardar();
			
			$data = $turno->data(true);
			
			if (!empty($data['diagnostico'])) {
				move_uploaded_file($file['tmp_name'], 'images/'.$data['id'].$data['diagnostico']);				
			}
			
			return $data;		
		}
		
		public function get($id) {	
			$turno = new Turno;
			$turno->load($id);	
			
			if (!$turno->validate()) {
				return false;
			}
			
			return $turno->data();	
		}
		
		public function add() {	
			$turno = new Turno;
			return $turno->data();	
		}
		
		public function rem($id) {	
			$turno = new Turno;
			$data = $turno->load($id);	
			$turno->delete();				
			
			if ($data['diagnostico']) {
				unlink('images/'.$data['id'].$data['diagnostico']);
			}			
		}
		
		public function getAll() {	
			$turnos = Turno::getAll();
			
			return array_map(function($tid) {
				$turno = new Turno;
				$turno->load($tid);	
				return $turno->data(true);
			}, $turnos);	
		}
	}