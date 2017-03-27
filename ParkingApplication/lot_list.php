<?php

echo '<h1>Lot List</h1>';

if (isset($_POST['title']))
    $filter = addslashes($_POST['title']);
else
    $filter = '';

if (!isset($db)) {
    require('dbconnect.php');
    $db = get_connection();
}
$select_statement = "SELECT * FROM Lot ";
if ($filter != '')
    $select_statement .= "WHERE title LIKE '%$filter%';";
else
    $select_statement .= ";";
$parkings = $db->query($select_statement);

if ($parkings != null) {
    echo "<table border='1'>";

    // this is the list of attributes for the lot name
    echo "<tr><th>Lot Name</th><th>Location</th><th>Capacity</th><th>Floors</th></tr>";
    foreach ($parkings as $parking) {
        $title = htmlentities($parking[0], ENT_QUOTES);
        #echo $title;
        echo "<tr>";

        echo "<td>" . $parking[0] . "</td>";
        echo "<td>" . $parking[1] . "</td>";
        echo "<td>" . $parking[2] . "</td>";
        echo "<td>" . $parking[3] . "</td></tr>";
    }
    echo "</table>";
}
?>
