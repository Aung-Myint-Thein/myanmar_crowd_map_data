<?php
date_default_timezone_set('Asia/Singapore');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "myanmar_data";

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
        echo "Total number of contribution: ".$row["count"];
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?> 