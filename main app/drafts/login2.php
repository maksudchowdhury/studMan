<?php
$servername='localhost';
$username='root';
$password='root';
$dbname = "srms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT password FROM admin_info where user_name='mmsu' ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["password"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();


?>