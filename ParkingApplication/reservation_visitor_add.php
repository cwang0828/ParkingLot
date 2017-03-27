<?php
	echo '<h1>Add a Visitor Reservation</h1>';
	echo '<h3>Due to the space limit (20) for the visitors
				<br> reservation can only be made on the day of used</h3>'

?>
<!-- This is inside Add Lot  -->

<form action="reservation_visitor_add_new.php" method="post">
<label>Enter an Unique booking id:</label>
<input type="text" name="bookingId" required/><br><br>
<label>Enter a space Number (Please enter an Available and Valid Space Number from the Space List) :</label>
<input type="text" name="spaceNumber" required /><br><br>
<label>Enter the Staff's Number (Please enter a Valid Staff Number from the Staff List) :</label>
<input type="text" name="staffNumber" required/><br><br>
<label>Enter the visitor License :</label>
<input type="text" name="visitorLicense" required/><br><br>
<input type="submit" value="Add Reservation" />
</form>
