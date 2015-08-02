<?php

include "database.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user_inputs where latitude > 0;";
$result = $conn->query($sql);
if( $result->num_rows > 0) {
	$tobePrint = "var mapData = [";
    while($row = $result->fetch_assoc()) {
        $tobePrint = $tobePrint. "new google.maps.LatLng(".$row["latitude"].", ".$row["longitude"]."),";
    }
    $tobePrint = $tobePrint. "];";
    $tobePrint = str_replace(",];", "];", $tobePrint);
    echo $tobePrint;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>