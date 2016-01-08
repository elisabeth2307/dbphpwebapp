<?php 
	include("presentation/presentation.php"); // get presentation layer
	include("content/header.php");?> <!-- get header of website -->
	
<h1>Welcome to H&H's super important and super fancy webapp!</h1>
<div><a href="input.php">Insert an entry</a></div></br></br>
		
<?php echo getHTMLTable($data); ?> <!-- alcohol formatted as table -->
			
<?php include("content/footer.php");?> <!-- get footer of website -->