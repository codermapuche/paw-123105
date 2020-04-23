<?php
namespace App\Models;

class Turnos extends \App\Core\Model {
	public static $_pelos = [ 
		1 => [ "id" => 1, "nombre" => "Calvo" ], 
		2 => [ "id" => 2, "nombre" => "Oscuro" ], 
		3 => [ "id" => 3, "nombre" => "Claro" ], 
		4 => [ "id" => 4, "nombre" => "Fantasia" ] 
	];
	
	private static $table = 'turnos';

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

	public function getAll() {
		return $this->db->selectAll(self::$table);
	}
	
	public function validate($onlydata = false) {
		if (empty($this->_nombre)) {
			return "El nombre es invalido";
		}

		if (!filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {
			return "El email es invalido";
		}

		if (!preg_match("/\d{4} \- \d{2} \d{4}/i", $this->_telefono)) {
			return "El telefono es invalido";
		}

		$d = \DateTime::createFromFormat('Y-m-d', $this->_nacimiento);
		if (!($d && $d->format('Y-m-d') == $this->_nacimiento)) {
			return "La fecha de nacimiento es invalida";
		}

		$d = \DateTime::createFromFormat('Y-m-d', $this->_turno);
		if (!($d && $d->format('Y-m-d') == $this->_turno)) {
			return "La fecha del turno es invalida";
		}

		if (!preg_match("/^(?:2[0-3]|[01][0-9]):[0-5][0-9]$/", $this->_horario)) {
			return "El horario es invalido";
		}

		if ($onlydata) {
			return false;
		}
		
		if (!in_array($this->_diagnostico, ["", ".jpg", ".png"])) {
			return "El formato del diagnostico es invalido";
		}

		return false;
	}

	public function guardar() {
		if (empty($this->_id)){
			$this->_id = $this->db->insert(self::$table, $this->export());			
		}	else {
			$this->db->insert(self::$table, $this->export());
		}
	}
	
	public function remove($id) {
		$this->db->remove(self::$table, $id);		
	}
		
	public function load($id = null) {
		$data = $this->db->get(self::$table, $id);
		
		$this->_id = null;
		
		if (!empty($data)) {
			$this->import($data);
			$this->_id = $id;
		}
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

	public function export() {
		$data = [
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

		return $data;
	}	
}