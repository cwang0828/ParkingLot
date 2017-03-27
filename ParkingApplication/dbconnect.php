<?php

	function get_connection() {
		$dsn = ''; //Change dbname to yours
		$userid = ''; //Change this to yours
		$password = ''; //Change this to yours

		try {
		    $db = new PDO($dsn, $userid, $password);
		    date_default_timezone_set('America/Los_Angeles');
      		$date = date("Y-m-d");
      		$dateOfVisit = addslashes($date);
      		$init_statement = "DELETE from SpaceBooking where dateOfVisit != '$dateOfVisit';";
      		$db->exec($init_statement);
		}
		catch(PDOException $e) {
			echo "Error connecting to database";
	    }
	    	return $db;
	}
?>