<?php
// include database connection only once,
// it could be possible that the connection will be loaded at another DAO
include_once "db_connection.php";

// Database Layer for City
class AlcoholDAO {
	private $connection = null;
	
	// Initializing the DB-Connection for the further CRUD-Operations
	public function __construct() {
		$db = new DB();
		$this->connection = $db->connect();
		
		if(! $this->connection) {
			die( 'ERROR while connecting' );
		}
	}
	
	/*
	 * Create new Alcohol with alcoholname
	 */
	public function create($alcoholname, $level) {
		$stmt = $this->connection->prepare( "INSERT INTO alcohol (alcoholname, fk_level) VALUES (?, ?);" );
		$stmt->bind_param( 'si', $alcoholname, $level );
		if ($stmt->execute()) {
			echo "Insert complete";
			return 1;
		} else {
			echo "Alcohol-Create-ERROR: " . $insert . "<br>" . mysqli_error ( $this->connection );
			return - 1;
		}
	}
	
	/*
	 * Get all informations of Alcohol by its name
	 */
	public function read($alcoholname) {
		$stmt = $this->connection->prepare( "SELECT * FROM alcohol WHERE alcoholname = ? INNER JOIN level ON fk_level = l_id;" );
		$stmt->bind_param( 's', $alcoholname );
		
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
	 * Get all alcohol in the Database
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
	 * Update the informations of alcohol, identified by its name.
	 */
	public function update($alcoholname) {
		$stmt = $this->connection->prepare ( "UPDATE alcohol SET alcoholname=? WHERE alcoholname = ?;" );
		$stmt->bind_param ( 'ss', $alcoholname, $alcoholname );
		
		if ($stmt->execute ()) {
			echo "Update complete";
			return 1;
		} else {
			echo "alcohol-Update-ERROR: " . $stmt . "<br>" . mysqli_error ( $this->connection );
			return -1;
		}
	}
	
}
