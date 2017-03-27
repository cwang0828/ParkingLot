<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			// Adds a new staff member to the database
			global $db;
			$staffNumber = addslashes($_POST['staffNumber']);
			$name= $_POST['name'];
			$telephone_Ext = $_POST['telephone_Ext'];
			$viehicleLicenseNumber = $_POST['viehicleLicenseNumber'];
			$insert_statement = "INSERT INTO Staff VALUES($staffNumber, '$name', $telephone_Ext, '$viehicleLicenseNumber');";
			//echo "$insert_statement";
			$db->exec($insert_statement);


		}
		catch(Exception $e) {
					echo "Inserting Lot";

		}
		header('Location: parkings.php?action=stafflist');

?>
