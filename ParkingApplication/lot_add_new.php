<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			global $db;
			$lotName = addslashes($_POST['lotName']);
			$location= $_POST['location'];
			$capacity = $_POST['capacity'];
			$floors = $_POST['floors'];
			$insert_statement = "INSERT INTO Lot VALUES('$lotName', '$location', $capacity, $floors);";
			//echo "$insert_statement";
			$db->exec($insert_statement);


		}
		catch(Exception $e) {
					echo "Inserting Lot";

		}
		header('Location: parkings.php?action=list');

?>
