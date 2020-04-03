<?php
	class Turno {
		const dbFile = 'db.json';

		private static $_pelos = [ 1 => "Calvo", 2 => "Oscuro", 3 => "Claro", 4 => "Fantasia" ];
		private static $_sync = false;
		private static $_tid = 0;
		private static $_turnos = [];

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

		private static function readDb() {
			if (!file_exists(Turno::dbFile)) {
				self::writeDb();
			}

			$db = json_decode(file_get_contents(Turno::dbFile), true);
			self::$_tid = $db["tid"];
			self::$_turnos = $db["turnos"];
			self::$_sync = true;
		}

		private static function writeDb() {
			file_put_contents(Turno::dbFile, json_encode([ "tid" => self::$_tid, "turnos" => self::$_turnos ]));
		}

		public static function getAll() {
			if (!self::$_sync) {
				self::readDb();
			}
			
			return array_keys(self::$_turnos);
		}
		
		public function load($id = null) {
			if (!self::$_sync) {
				self::readDb();
			}
			
			if ( !is_numeric($id) ) {
				$id = ++self::$_tid;				
			}
			
			if (!empty(self::$_turnos[$id])) {
				$this->import(self::$_turnos[$id]);
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
			self::$_turnos[$this->_id] = $this->data();
			self::writeDb();
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
				"diagnostico"	=> $this->_diagnostico
			];

			if ($friendly) {
				$data['pelo'] = self::$_pelos[$data['pelo']];
			}

			return $data;
		}
	}