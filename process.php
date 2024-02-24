<?php

require_once 'App/Pusher.php';

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
       
        $pusher= new AppPusher();

        $data['message']=array(
            'student_name'=>$name,
            'student_email'=>$email,
            'student_password'=>$password,
        );
        $pusher->trigger('snugly-canopy-602', 'add_student', $data);
        echo "New record created successfully";
        header('location:index.php?success');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}else{
    echo "All fields are required.";
}






?>