<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			// Update staff members telephone extension and vehicle license number
			global $db;
			$staffNumber = $_POST['staffNumber'];
			$name= addslashes($_POST['name']);
			$telephone_Ext = $_POST['telephone_Ext'];
			$vehicleLicenseNumber = addslashes($_POST['vehicleLicenseNumber']);

			$update_statement = "UPDATE Staff SET telephone_Ext=$telephone_Ext, vehicleLicenseNumber='$vehicleLicenseNumber' WHERE staffNumber=$staffNumber;";
			//echo "$update_statement";
			$db->exec($update_statement);
		}
		catch(Exception $e) {
					echo "Error: Updating parking";
		}
		header('Location: parkings.php?action=stafflist');

?>
