<?php

include ('vendor/autoload.php');

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

if (isset($_POST['student_name']) && isset($_POST['student_email']) && isset($_POST['student_password'])) {
    $name = $_POST['student_name'];
    $email = $_POST['student_email'];
    $password = $_POST['student_password'];

    $sql = "INSERT INTO student (name, email, password) VALUES ('$name', '$email', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $app_id = '1761069';
        $app_key = 'a1db0e59c650abfd58b8';
        $app_secret = '996722b6b19375dff051';
        $app_cluster = 'mt1';
        $pusher= new Pusher\Pusher($app_key, $app_secret, $app_id, ['cluster' => $app_cluster]);

        $data['message']=array(
            'student_name'=>$name,
            'student_email'=>$email,
            'student_password'=>$password,
        );
        $pusher->trigger('snugly-canopy-602', 'add_student', $data);
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "All fields are required.";
}






?>