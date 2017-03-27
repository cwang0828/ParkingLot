<?php
	echo '<h1>Add a new Staff</h1>';

?>
<!-- Displays the fields for input of adding a new staff member -->

<form action="staff_add_new.php" method="post">
<label>Enter Staff Number (Please enter a Unique Staff Number):</label>
<input type="text" name="staffNumber" required /><br><br>
<label>Enter Staff Name:</label>
<input type="text" name="name" required /><br><br>

<label>Enter Telephone Extension:</label>
<input type="text" name="telephone_Ext" required/><br><br>
<label>Enter Viecle License Number:</label>
<input type="text" name="viehicleLicenseNumber" required/><br><br>
<input type="submit" value="Add Staff" />
</form>
