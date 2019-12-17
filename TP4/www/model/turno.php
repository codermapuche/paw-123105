<?php
	require_once('shared/dbal.php');
	
	class Turno {
		private static $_pelos   = [ 1 => "Calvo", 2 => "Oscuro", 3 => "Claro", 4 => "Fantasia" ];

		private $_id          = "";
		private $_nombre      = "";
		private $_email       = "";
		private $_telefono    = "";
		private $_nacimiento  = "";
		private $_calzado     = "";
		private $_altura      = "";
		private $_pelo        = 1;
		private $_turno       = "";
		private $_horario     = "";
		private $_diagnostico = "";
		private $_image       = "";

		public static function getAll() {
			$table = new SwifTable('turnos');
			
			$table->field('id');
			$table->select();
					
			return array_map(function($t) { return $t["id"]; }, $table->result);
		}
		
		public function load($id) {
			$table = new SwifTable('turnos');
			
			$table->find($id);

			if (empty($table->id)) {
				$id = "";
			} else {
				// Remove seconds.
				$table->props["horario"] = substr($table->props["horario"], 0 ,5);
				$this->import($table->props);
			}
			
			$this->_id = $id;
		}

		public function validate() {
			if (empty($this->_nombre)) {
				return false;
			}

			if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
				return false;
			}

			if (!preg_match("/\d{4}[ \- ]\d{2}[ ]\d{4}/i", $this->_telefono)) {
				return false;
			}

			$d = DateTime::createFromFormat('Y-m-d', $this->_nacimiento);
			if (!($d && $d->format('Y-m-d') == $this->_nacimiento)) {
				return false;
			}

			$d = DateTime::createFromFormat('Y-m-d', $this->_turno);
			if (!($d && $d->format('Y-m-d') == $this->_turno)) {
				return false;
			}

			if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $this->_horario)) {
				return false;
			}

			if (!in_array($this->_diagnostico, ["", ".jpg", ".png"])) {
				return false;
			}

			return true;
		}

		public function guardar() {
			$table = new SwifTable('turnos');
			
			if (!empty($this->_id)) {
				$table->find($this->_id);				
			}
			
			$data = $this->data();
			
			if (empty($data["image"])) {
				unset($data["image"]);
			}
			
			$table->import($data);
			$id = $table->save();
			
			if (empty($this->_id)) {
				$this->_id = $id;				
			}
		}

		public function delete() {			
			$table = new SwifTable('turnos');
			
			$table->wherePk($this->_id);
			$table->delete();
		}

		public function import($source) {
			$this->_nombre 			= $source["nombre"];
			$this->_email 			= $source["email"];
			$this->_telefono 		= $source["telefono"];
			$this->_nacimiento 	= $source["nacimiento"];
			$this->_calzado 		= $source["calzado"];
			$this->_altura	 		= $source["altura"];
			$this->_pelo 				= $source["pelo"];
			$this->_turno		 		= $source["turno"];
			$this->_horario 		= $source["horario"];
			$this->_diagnostico = $source["diagnostico"];
			$this->_image       = $source["image"];
		}

		public function data($friendly = false) {
			$data = [
				"_pelos"     	=> self::$_pelos,
				"id"         	=> $this->_id,
				"nombre"     	=> $this->_nombre,
				"email"      	=> $this->_email,
				"telefono"   	=> $this->_telefono,
				"nacimiento" 	=> $this->_nacimiento,
				"calzado"    	=> $this->_calzado,
				"altura"     	=> $this->_altura,
				"pelo"       	=> $this->_pelo,
				"turno"      	=> $this->_turno,
				"horario"    	=> $this->_horario,
				"diagnostico"	=> $this->_diagnostico,
				"image"	      => $this->_image
			];

			if ($friendly) {
				$data['pelo'] = self::$_pelos[$data['pelo']];
			}

			return $data;
		}
	}