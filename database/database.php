<?php
	include_once "db_connection.php"; // get database-connection -> just once !

	// Data Access Object for Alcohol
	class AlcoholDAO {
		private $connection = null;
	
		// Initialize connection for dealing with database
		public function __construct() {
			$db = new DB();
			$this->connection = $db->connect();
		
			if(! $this->connection) {
				die( 'ERROR while connecting' );
			}
		}
	
		/*
		* Create new Alcohol with alcoholname and level
		*/
		public function create($alcoholname, $level) {
			// prepare statement
			$stmt = $this->connection->prepare( "INSERT INTO alcohol (alcoholname, fk_level) VALUES (?, ?);" );
			// set variables to statements (s = String, i = number)
			$stmt->bind_param( 'si', $alcoholname, $level );
			
			// execute statement
			if ($stmt->execute()) {
				return 1;
			} else {
				echo "Alcohol-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
				echo "Please contact H&H";
				return - 1;
			}
		}
	
		/*
		* Get alcohol via name (which is the primary key)
		*/
		public function read($alcoholname) {
			// prepare statement
			$stmt = $this->connection->prepare( "SELECT * FROM alcohol WHERE alcoholname = ? INNER JOIN level ON fk_level = l_id;" );
			// set variable to statements (s = String)
			$stmt->bind_param( 's', $alcoholname );
			
			// execute statement
			if ($stmt->execute ()) {
				$stmt->bind_result( $alcoholname);
				while ( $stmt->fetch() ) {
					$row['alcoholname'] = $alcoholname;
				}
				return $row;
			} else {
				echo "0 results";
				return - 1;
			}
		}
	
		/*
		* Get all types of alcohol from the Database
		*/
		public function readAll() {
			$select = "SELECT * FROM alcohol INNER JOIN level ON fk_level = l_id;";
			if ($this->connection == null) {
				echo "Connection not initialized!";
			} else if ($result = mysqli_query ( $this->connection, $select )) {
				$items = null;
				if (mysqli_num_rows ( $result ) > 0) {
					while ( $row = mysqli_fetch_assoc ( $result ) ) {
						$items [] = $row;
					}
					return $items;
				} else {
					echo "</br>0 results";
				}
			} else {
				echo "Resultset leer/nicht definiert!";
			}
		}

		/*
		* Update the information of alcohol, identified by its name (id).
		*/
		public function update($id, $alcoholname, $level) {
			// prepare statement
			$stmt = $this->connection->prepare ( "UPDATE alcohol SET alcoholname=?, fk_level=? WHERE alcoholname = ?;" );
			// set variables to statement
			$stmt->bind_param ( 'sis', $alcoholname, $level, $id );
		
			// execute statement
			if ($stmt->execute ()) {
				return 1;
			} else {
				echo "alcohol-Update-ERROR: " . $stmt . "<br>" . mysqli_error ( $this->connection );
				echo "Please contact H&H";
				return -1;
			}
		}
		
		/*
		* Delete a type of alcohol
		*/
		public function delete($alcoholname) {
			// prepare statement
			$stmt = $this->connection->prepare ( "DELETE FROM alcohol WHERE alcoholname = ?;" );
			// set variable to statement
			$stmt->bind_param ( 's', $alcoholname );
		
			// execute statement
			if ($stmt->execute ()) {
				return 1;
			} else {
				echo "alcohol-Delete-ERROR: " . $stmt . "<br>" . mysqli_error ( $this->connection );
				echo "Please contact H&H";
				return -1;
			}
		}
	}
