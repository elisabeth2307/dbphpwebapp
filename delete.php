<?php
	include("business/business.php"); // get business logic

	// check if there is a get parameter in the url
    if ( !empty($_GET['id'])) {
		// set the variable alcoholname with the id of the url
        $alcoholname = $_REQUEST['id'];
		// instance a new alcohol
		$alcohol = new Alcohol();
		// delete the alcohol via the name which is unique
		$alcohol->deleteAlcohol($alcoholname);
    }

// go back to index.php
header("Location: index.php");