<?php
	echo '<h1>Add a new Space</h1>';
?>
<!-- This is inside Add Lot  -->
<script type="text/javascript">
	// Switches between displaying uncovered and covered textfields for input
	function onChange() {

		var fm = document.forms["data"];

		if (fm.spaceType[0].checked)
		{
			document.getElementById('mthRt').style.visibility = "visible";
		} else
		{
			document.getElementById('mthRt').style.visibility = "hidden";
		}

	}
</script>
<form name = "data" action="space_add_new.php" method="post">
<label>Enter Space Number (Please enter a Unique Space Number) :</label>
<input type="text" name="spaceNumber" required /><br><br>


<!-- <label>Enter Space Type (Please enter covered / uncovered) :</label> -->

  SpaceType:
  <input type="radio" name="spaceType" required value="covered" onclick = "onChange();">covered
  <input type="radio" name="spaceType"  value="uncovered" onclick = "onChange();">uncovered <br><br>


<!-- <input type="text" name="spaceType" required /><br><br> -->
<label>Enter Lot Name (Please enter a Valid Lot from the Lot List) :</label>
<input type="text" name="lotName" required/><br><br>


<div id="mthRt" style="visibility: hidden;">
<label>Enter Monthly Rate(Please enter in decimal form):</label>
<input type="text" name="monthlyRate" /><br><br>
</div>

<!-- <label>Enter Monthly Rate  (  Please enter in decimal form    ) :</label>
<input type="text" name="monthlyRate" /><br><br> -->

<br><br>
<input type="submit" value="Add Space" />
</form>
