<?php
// Business Layer

// now include database layer
include("database.php");

// Alcohol Model
class Alcohol {
	private $alcoholDAO = null;
	
	public function __construct() {
		$this->alcoholDAO = new AlcoholDAO();
	}
	public function getAllAlcohol() {
		$data = $this->alcoholDAO->readAll();
		return $data;
	}
	public function createAlcohol($alcoholname, $level) {
		$data = $this->alcoholDAO->create($alcoholname, $level);
		return $data;
	}

}