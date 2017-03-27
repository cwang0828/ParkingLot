<?php

// Display list of space number
echo '<h1>List of Available spaces</h1>';

if (isset($_POST['spaceNumber']))
    $filter = addslashes($_POST['spaceNumber']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
$select_statement = "SELECT * FROM CoveredSpace
                      WHERE spaceNumber NOT IN (
                                 SELECT spaceNumber
                                 FROM StaffSpace) AND
                                 spaceNumber NOT IN (
                                            SELECT spaceNumber
                                            FROM SpaceBooking) AND
                                                       spaceNumber NOT IN (
                                                                  SELECT spaceNumber
                                                                  FROM UncoveredSpace);";
if ($filter != '')
    $select_statement .= "WHERE spaceNumber LIKE '%$filter%';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);

if ($parkings != null) {
    echo "<table border='1'>";

    // this is the list of attributes for the lot name
    echo "<tr><th>Space Number</th><th>Monthly Rate ($)</th></tr>";
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
