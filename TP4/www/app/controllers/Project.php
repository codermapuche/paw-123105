<?php
	namespace App\Controllers;

	class Project {
		public function notFound() {
			$data = [ "code" => 404, "error" => "Not found." ];
			
			return view('error', $data);
		}

		public function internalError() {
			$data = [ "code" => 500, "error" => "Internal error" ];
			
			return view('error', $data);
		}
	}
