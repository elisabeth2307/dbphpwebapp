<!-- Responsible for dealing with business.php (Business Layer) but NOT with database itself -->

<?php
	// PRESENTATION LAYER
	include("business/business.php"); // get business logic
	$alcohol = new Alcohol(); // get alcohol model

	// INSERT if post-parameter is set
	if(isset($_POST["alcoholname"]) && $_POST["alcoholname"]){
		// call business layer
		$alcohol->createAlcohol($_POST["alcoholname"], $_POST["level"]);
	}

	// UPDATE if post-parameter is set
	if(isset($_POST["updateName"]) && $_POST["updateLevel"]){
		// call business layer
		$alcohol->updateAlcohol($_GET['id'], $_POST["updateName"], $_POST["updateLevel"]);
	}

	// READ ALL -> call business layer
	$data = $alcohol->getAllAlcohol();

	// prepare HTML Table (use .= for appending)
	function getHTMLTable($alcoholData) {
		$html = null;
		
		// if there are types of alcohol (alcoholData) available
		if($alcoholData != null) {
			$html = '<table id="alcoholtable">';
			$html .= '<thead><tr>';
			$html .= '<th>Type of Alcohol</th>';
			$html .= '<th>Description</th>';
			$html .= '<th>Image</th>';
			$html .= '<th>Options</th>';
			$html .= '</tr></thead>';
		
			// store each type of alcohol as table row in the html variable
			foreach($alcoholData as $alcohol) {
				$html .= '<tbody><tr>';
				$html .= '<td>' . $alcohol['alcoholname'] . '</td>';
				$html .= '<td>' . $alcohol['levelname'] . '</td>';
				$html .= '<td><img src="img/'.$alcohol['l_id'] .'.'. $alcohol['imgtype'] . '" height="100"></td>';
				// button for updating and deleting (important: get parameter)
				$html .= '<td> <a class="button" href="update.php?id='.$alcohol['alcoholname'].'">Update</a> <br>
					<a class="button" href="delete.php?id='.$alcohol['alcoholname'].'">Delete</a></td>';
				$html .= '</tr></tbody>';
			}
			$html .= '</table>';
			
		} // if no data is available
		else {
			$html .= '<p class = "text">Sorry, there are no types of alcohol available at 
				the moment. <br>Feel free to insert new types via the link above!</p><br><br>';
		}
		
		// return filled variable with html-construct
		return $html;
	}

?>