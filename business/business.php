<?php
// BUSINESS LAYER

include("database/database.php"); // get database layer for DAO

// MODEL
class Alcohol {
	private $alcoholDAO = null;
	
	// CONSTRUCTOR
	public function __construct() {
		$this->alcoholDAO = new AlcoholDAO();
	}
	// GET ALL
	public function getAllAlcohol() {
		$data = $this->alcoholDAO->readAll();
		return $data;
	}
	// CREATE
	public function createAlcohol($alcoholname, $level) {
		$data = $this->alcoholDAO->create($alcoholname, $level);
		return $data;
	}
	// DELETE
	public function deleteAlcohol($alcoholname){
		$data = $this->alcoholDAO->delete($alcoholname);
	}
	// UPDATE
	public function updateAlcohol($id, $alcoholname, $level){
		$data = $this->alcoholDAO->update($id, $alcoholname, $level);
	}
}