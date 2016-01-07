<?php
// we are now in presentation layer
// we will include business layer to load business logic
include("business.php");

// init City Model from Business Logic
$alcohol = new Alcohol();

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
	</head>
	
	<body>
		<h1>hallo</h1>
		<a href="index.php">startseite</a>
		<a href="content/input.php">Insert an entry</a>
		
		<?php echo getHTMLTable($data); ?><br />
	</body>
	
</html>