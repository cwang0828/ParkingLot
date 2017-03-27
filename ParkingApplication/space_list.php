<?php

echo '<h1>Space List</h1>';

if (isset($_POST['spaceNumber']))
    $filter = addslashes($_POST['spaceNumber']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
// Querys the parkingspace database to display the list
$select_statement = "SELECT * FROM ParkingSpace";
if ($filter != '')
    $select_statement .= "WHERE spaceNumber LIKE '%$filter%';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);

if ($parkings != null) {
    echo "<table border='1'>";

    // this is the list of attributes for the spaces
    echo "<tr><th>Space Number</th><th>SpaceType</th><th>LotName</th></tr>";
    foreach ($parkings as $parking) {
        $title = htmlentities($parking[0], ENT_QUOTES);
        #echo $title;
                echo "<tr>";

        echo "<td>" . $parking[0] . "</td>";
        echo "<td>" . $parking[1] . "</td>";
        echo "<td>" . $parking[2] . "</td></tr>";
    }
    echo "</table>";
}
?>
