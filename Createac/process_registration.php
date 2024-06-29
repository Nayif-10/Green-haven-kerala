<?php
// Assuming you have a database connection
$host = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user inputs from the registration form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];

// Insert the data into the "loginn" table
$query = "INSERT INTO loginn (fullname,username,password,passwordc) VALUES ('$fullname','$username', '$password',$passwordc)";

if ($conn->query($query) === TRUE) {
    echo "<script>";
    echo "alert('Registration successfull');";
    echo "    window.location.href = '../login.html';";
    echo "</script>";
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

$conn->close();
?>