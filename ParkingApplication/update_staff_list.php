<?php

echo '<h1>Staff List</h1>';

if (isset($_POST['staffNumber']))
    $filter = addslashes($_POST['staffNumber']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
$select_statement = "SELECT * FROM Staff ";
if ($filter != '')
    $select_statement .= "WHERE staffNumber LIKE '%$filter%';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);

if ($parkings != null) {
    echo "<table border='1'>";

    // this is the list of attributes for the staff list
    echo "<tr><th></th><th>staffNumber</th><th>name</th><th>telephone_Ext</th><th>viehicleLicenseNumber</th></tr>";
    foreach ($parkings as $parking) {
        //$staffNumber = htmlentities($parking[0], ENT_QUOTES);
        $name = htmlentities($parking[1], ENT_QUOTES);
        #echo $title;
        echo "<tr><td><form action='parkings.php?action=editstaff' method='post'><input type='hidden' name='staffNumber' value='$parking[0]' /><input type='hidden' name='name' value='$name' /><input type='submit' value='Edit' /></form></td>";
        echo "<td>" . $parking[0] . "</td>";
        echo "<td>" . $parking[1] . "</td>";
        echo "<td>" . $parking[2] . "</td>";
        echo "<td>" . $parking[3] . "</td></tr>";
    }
    echo "</table>";
}
?>
