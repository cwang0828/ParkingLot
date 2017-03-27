<?php

echo '<h1>Visitor Reservation List for Today</h1>';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
// Query the table from visitor reservation
$select_statement = "SELECT * FROM SpaceBooking";
$filter='';
if ($filter != '')
    $select_statement .= " WHERE dateOfVisit = '$filter';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);
// Displays the table of visitor reservations
if ($parkings != null) {
    echo "$date";
    echo "<table border='1'>";

    // this is the list of attributes for the visitor reservations
    echo "<tr><th>BookingId</th><th>SpaceNumber</th><th>StaffNumber</th><th>VisitorLicense</th><th>DateOfVisit</th></tr>";
    foreach ($parkings as $parking) {
        $title = htmlentities($parking[0], ENT_QUOTES);
        #echo $title;
        echo "<tr>";
        echo "<td>" . $parking[0] . "</td>";
        echo "<td>" . $parking[1] . "</td>";
        echo "<td>" . $parking[2] . "</td>";
        echo "<td>" . $parking[3] . "</td>";
        echo "<td>" . $parking[4] . "</td></tr>";
    }
    echo "</table>";
}
?>
