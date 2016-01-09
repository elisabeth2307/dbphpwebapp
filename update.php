<!-- Responsible for the update-site for updating a existing type of alcohol -->

<?php include("content/header.php");?> <!-- get header of website -->
	<h1>Please update your chosen type of alcohol:</h1>
	<p class="text">Note that the name must be unique</p>
	
	<!-- More userfriendly -> User sees chosen type -->
	<p class = "text">Chosen alcohol: <?php echo $_GET['id']?></p>
	
	<!-- important: set the id as get-parameter for identify it in index.php -->
	<form method="post" action="index.php?id=<?php echo $_GET['id']?>">
		Insert a new name: <input type="text" name="updateName" placeholder="<?php echo $_GET['id']?>"/><br>
		<!-- Dropdown-menu -> value is sent via post -> no incorrect user-input possible -->
		Choose a level: <select name="updateLevel">
			<option value="1">Tipsy</option>
			<option value="2">Slightly drunk</option>
			<option value="3">Drunk</option>
			<option value="4">Totally drunk</option>
			<option value="5">Beyond help</option>
		</select><br>
		<input type="submit" value="Submit"/>
	</form>
		
	<a href="index.php">Back to home</a>
<?php include("content/footer.php");?> <!-- get footer of website -->