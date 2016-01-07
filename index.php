<?php
// PRESENTATION LAYER
include("business.php"); // get business logic
$alcohol = new Alcohol(); // get alcohol model

// insert new alcohol if post data exists
if(isset($_POST["alcoholname"]) && $_POST["alcoholname"]){
	$alcohol->createAlcohol($_POST["alcoholname"], $_POST["level"]);
}

// now load all cities
$data = $alcohol->getAllAlcohol();

// prepare HTML Table
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
	//$html .= '<td> <button type="button" formaction="content/input.php">Delete</button> </td>';
	$html .= '<td><form method=POST action=content/delete.php><input name="delete" type="submit" value="Delete" /></form></td>';
    $html .= '</tr></tbody>';
  }

  $html .= '</table>';

  return $html;
}

// now we can clearly output the requested data
?>

<html>
	<head>
		<title>Alcohol</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	
	<body>
		<h1>Welcome to H&H's super important and super fancy webapp!</h1>
		<div><a href="content/input.php">Insert an entry</a></div></br></br>
		
		<?php echo getHTMLTable($data); ?>
	</body>
	
</html>