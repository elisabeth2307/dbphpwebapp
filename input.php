<!-- Responsible for the input-site for creating new types of alcohol -->

<?php include("content/header.php");?> <!-- get header of website -->
	<h1>Please insert a new type of alcohol below:</h1>
	<p class="text">Note that the name must be unique</p>
	
	<!-- form which sends data via POST to index.php where the data is fetched -->
	<form method="post" action="index.php">
		Insert a new type of alcohol: <input type="text" name="alcoholname" /><br>
		<!-- Dropdown-menu -> value is sent via post -> no incorrect user-input possible -->
		Choose a level: <select name="level">
				<option value="1">Tipsy</option>
				<option value="2">Slightly drunk</option>
				<option value="3">Drunk</option>
				<option value="4">Totally drunk</option>
				<option value="5">Beyond help</option>
			</select><br><br>
		<input type="submit" value="Submit"/>
	</form>
		
	<p class = "text">Thank you for supporting our very important Web-App!</p>
	<a href="index.php">Back to home</a>

<?php include("content/footer.php");?> <!-- get footer of website -->