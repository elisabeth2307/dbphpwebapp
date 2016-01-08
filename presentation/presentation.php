<?php
	// PRESENTATION LAYER
	include("business/business.php"); // get business logic
	$alcohol = new Alcohol(); // get alcohol model

	// INSERT
	if(isset($_POST["alcoholname"]) && $_POST["alcoholname"]){
		$alcohol->createAlcohol($_POST["alcoholname"], $_POST["level"]);
	}

	// UPDATE
	if(isset($_POST["updateName"]) && $_POST["updateLevel"]){
		$alcohol->updateAlcohol($_GET['id'], $_POST["updateName"], $_POST["updateLevel"]);
	}

	// READ ALL
	$data = $alcohol->getAllAlcohol();

	// prepare HTML Table (use .= for appending)
	function getHTMLTable($tabledata) {
		$html = '<table id="alcoholtable">';
		$html .= '<thead><tr>';
		$html .= '<th>Type of Alcohol</th>';
		$html .= '<th>Description</th>';
		$html .= '<th>Image</th>';
		$html .= '</tr></thead>';

		foreach($tabledata as $alcohol) {
			$html .= '<tbody><tr>';
			$html .= '<td>' . $alcohol['alcoholname'] . '</td>';
			$html .= '<td>' . $alcohol['levelname'] . '</td>';
			$html .= '<td><img src="img/'.$alcohol['l_id'] .'.'. $alcohol['imgtype'] . '" height="100"></td>';
			$html .= '<td> <a class="button" href="update.php?id='.$alcohol['alcoholname'].'">Update</a> <br>
				<a class="button" href="delete.php?id='.$alcohol['alcoholname'].'">Delete</a></td>';
			$html .= '</tr></tbody>';
		}

		$html .= '</table>';

		return $html;
	}

?>