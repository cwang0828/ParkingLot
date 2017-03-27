<?php
if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
// Querys the staff members for updating with the ability to edit each one
$staffNumber = $_POST['staffNumber'];
$name = $_POST['name'];

$select_statement = "SELECT * FROM Staff WHERE staffNumber=$staffNumber;";
#echo "$select_statement";
$staff = $db->query($select_statement);
$staff = $staff->fetch();
?>
<form action="staff_edit_confirm.php" method="post">
    <input type='hidden' name='staffNumber' value= "<?php  echo $_POST['staffNumber'];?>"/>
    <input type='hidden' name='name' value= "<?php  echo $_POST['name'];?>" />
    <label>Staff Number: <?php  echo $_POST['staffNumber']?></label><br>
    <label>Staff Name: <?php  echo $_POST['name']?></label><br>
    <label>Enter telephone Extension:</label>
    <input type="text" name="telephone_Ext" value="<?php echo $staff['telephone_Ext']; ?>"/><br>
    <label>Enter vehicle License Number:</label>
    <input type="text" name="vehicleLicenseNumber" value="<?php echo $staff['vehicleLicenseNumber']; ?>" /><br>
    <input type="submit" value="Update parking" />
</form>
