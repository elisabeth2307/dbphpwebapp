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
			$level = $this->filterLevel($level);
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
			$level = $this->filterLevel($level);
			$data = $this->alcoholDAO->update($id, $alcoholname, $level);
		}
		// Filter name-input -> just numbers and letters are allowed
		public function filterInput($stringToFilter) {
			return preg_replace("/[^A-Za-z0-9 ]/", '', $stringToFilter);
		}
		// Filter level-input -> just numbers from 1 to 5 allowed
		public function filterLevel($levelToFilter) {
			$result = $levelToFilter;
			
			// not numeric
			if (!is_numeric($result)) {
				$result = 1;
			}
			// too high
			if ($result > 5) {
				$result = 5;
			}
			// too low
			if ($result < 1) {
				$result = 1;
			}
			return $result;
		}
	}
?>