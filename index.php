<?php
// we now in presentation layer
// we will include business layer to load business logic
include("business.php");

// init City Model from Business Logic
$alcohol = new Alcohol();

// insert new city if post data exists
if(isset($_POST["alcoholname"]) && $_POST["alcoholname"]){
	$alcohol->createAlcohol($_POST["alcoholname"]);
}

// now load all cities
$data = $alcohol->getAllAlcohol();

// prepare HTML Table
function getHTMLTable($tabledata) {
  $html = '<table id="alcoholtable">';
  $html .= '<thead><tr>';
  $html .= '<th>alcoholname</th>';
  $html .= '</tr></thead>';

  foreach($tabledata as $alcohol) {
    $html .= '<tbody><tr>';
    $html .= '<td>' . $alcohol['alcoholname'] . '</td>';
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
		<a href="content/input.php">Insert an entry</a>
		
		<?php echo getHTMLTable($data); ?><br />
	</body>
	
</html>