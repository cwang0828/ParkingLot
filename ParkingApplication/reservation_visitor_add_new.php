<?php
	if (!isset($db)) {
			require('dbconnect.php');
			$db = get_connection();
	}
		try {
			// Sets the date to the current date when adding to the visitor reservation
			global $db;
			date_default_timezone_set('America/Los_Angeles');
      		$date = date("Y-m-d");
      		$dateOfVisit = addslashes($date);
			$check_statement = "SELECT count(*) FROM SpaceBooking WHERE dateOfVisit = '$dateOfVisit';";
			$count = $db->query($check_statement);
			$row = $count->fetchColumn();
			//echo gettype($row);
			//$x = int()
			if ((int)$row > 20) {
				//ob_start();
				//header('Location: parkings.php?action=reserve_visitorlist');
				echo '<script language="javascript">alert("No Reservation for Today!")</script>';
				echo "<script language='javascript'>setTimeout(function(){window.location.href='index.php'},100);</script>";
				//ob_end_flush();
			} else {
				// attributes to be added to the visitor reservation database
				$bookingId = $_POST['bookingId'];
				$spaceNumber = $_POST['spaceNumber'];
				$staffNumber = $_POST['staffNumber'];
	      $visitorLicense = addslashes($_POST['visitorLicense']);
				$insert_statement = "INSERT INTO SpaceBooking
						VALUES ($bookingId, $spaceNumber, $staffNumber, '$visitorLicense', '$dateOfVisit');";

				$db->exec($insert_statement);
				header('Location: parkings.php?action=reserve_visitorlist');
			}
		}
		catch(Exception $e) {
					echo "Inserting Lot";
		}

?>
