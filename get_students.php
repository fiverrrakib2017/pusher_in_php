<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "fixing_live"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Query to fetch all students from the database
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

$students = array();

if ($result->num_rows > 0) {
    // Fetch data and store it in an array
    while($row = $result->fetch_assoc()) {
        $students[] = $row;
    }
} else {
    echo "0 results";
}

// Close database connection
$conn->close();

// Send the data as JSON response
echo json_encode($students);