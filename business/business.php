<!-- Responsible for dealing with database.php (Database Layer) but NOT with database itself -->

<?php
	// BUSINESS LAYER
	include("database/database.php"); // get database layer for DAO

	// MODEL of Alcohol
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
			$alcoholname = $this->filterInput($alcoholname);
			$data = $this->alcoholDAO->create($alcoholname, $level);
			return $data;
		}
		// DELETE
		public function deleteAlcohol($alcoholname){
			$data = $this->alcoholDAO->delete($alcoholname);
		}
		// UPDATE
		public function updateAlcohol($id, $alcoholname, $level){
			$alcoholname = $this->filterInput($alcoholname);
			$data = $this->alcoholDAO->update($id, $alcoholname, $level);
		}
		// Filter input -> just numbers and letters are allowed
		public function filterInput($stringToFilter) {
			return preg_replace("/[^A-Za-z0-9 ]/", '', $stringToFilter);
		}
	}
?>