<?php

echo '<h1>Staff Reservation List</h1>';

if (isset($_POST['staffNumber']))
    $filter = addslashes($_POST['staffNumber']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
// Displays an entire list of the staff reservation
$select_statement = "SELECT * FROM StaffSpace";
if ($filter != '')
    $select_statement .= "WHERE staffNumber LIKE '%$filter%';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);

if ($parkings != null) {
    echo "<table border='1'>";

    // this is the list of attributes for the staff spaces
    echo "<tr><th>staffNumber</th><th>spaceNumber</th></tr>";
    foreach ($parkings as $parking) {
        $title = htmlentities($parking[0], ENT_QUOTES);
        #echo $title;
        echo "<tr>";
        echo "<td>" . $parking[0] . "</td>";
        echo "<td>" . $parking[1] . "</td></tr>";
    }
    echo "</table>";
}
?>
