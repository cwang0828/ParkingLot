<?php
	echo '<h1>Add a new Lot</h1>';

?>

<form action="lot_add_new.php" method="post">
<label>Enter Lot Name (Please enter a Unique Lot Name) :</label>
<input type="text" name="lotName" required /><br><br>
<label>Enter Location:</label>
<input type="text" name="location" required /><br><br>
<label>Enter Capacity:</label>
<input type="text" name="capacity" required/><br><br>
<label>Enter Floor:</label>
<input type="text" name="floors" required/><br><br>
<input type="submit" value="Add Lot" />
</form>
