<?php
	echo '<h1>Add a Staff Reservation</h1>';

?>

<!-- Displays the staff reservation textfields to add a new staff member -->
<form action="reservation_staff_add_new.php" method="post">

<label>Enter the Staff's Number (Please enter a Valid Staff Number from the Staff List) :</label>
<input type="text" name="staffNumber" required /><br><br>
<label>Enter a Space Number (Please enter an Available and Valid Space Number from the Space List) :</label>
<input type="text" name="spaceNumber" required /><br><br>
<input type="submit" value="Add Reservation" />
</form>
