<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			// Adds a new staff member to te database
			global $db;
			$staffNumber = addslashes($_POST['staffNumber']);
			$spaceNumber = $_POST['spaceNumber'];
			$insert_statement = "INSERT INTO StaffSpace VALUES($staffNumber, $spaceNumber);";
			//echo "$insert_statement";
			$db->exec($insert_statement);


		}
		catch(Exception $e) {
					echo "Inserting Lot";

		}
		header('Location: parkings.php?action=reserve_stafflist');

?>
