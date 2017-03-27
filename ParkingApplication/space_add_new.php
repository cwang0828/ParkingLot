<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			// Saves the values input for space
			global $db;
			$spaceNumber = $_POST['spaceNumber'];
			$spaceType= addslashes($_POST['spaceType']);
			$lotName = addslashes($_POST['lotName']);

			// Adds a new space to the database
			if($_POST['monthlyRate'] == 0.00) {
				$insert_statement1 = "INSERT INTO UncoveredSpace VALUES($spaceNumber);";
				$insert_statement = "INSERT INTO ParkingSpace VALUES(
				$spaceNumber, '$spaceType', '$lotName');";
			} else {
				$monthlyRate = $_POST['monthlyRate'];
				$insert_statement1 = "INSERT INTO CoveredSpace VALUES(
				$spaceNumber, $monthlyRate);";
				$insert_statement = "INSERT INTO ParkingSpace VALUES(
				$spaceNumber, '$spaceType', '$lotName');";
			}

			$db->exec($insert_statement);

			$db->exec($insert_statement1);

		}
		catch(Exception $e) {
					echo "Inserting Lot";

		}
		header('Location: parkings.php?action=spacelist');

?>
