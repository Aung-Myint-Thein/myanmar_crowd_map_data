<?php
include "database.php";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT count(*) as count FROM user_inputs where latitude > 0;";
$result = $conn->query($sql);
if( $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "No. of contribution: ".$row["count"].
        	". <a href=\"location.html\">Contribute Data Here</a>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 