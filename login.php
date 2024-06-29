<?php

// Database connection parameters
$servername = "localhost"; // Change this to your database server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $un = $_POST["username"];
    $pw = $_POST["password"];

    // Perform SQL query to check authentication
    $sql = "SELECT * FROM loginn WHERE username = '$un' AND password = '$pw'";
    $result = $conn->query($sql);

    // Check if the query returned any rows (authentication successful)
    if ($result->num_rows > 0) {
        header('Location: ' . $redirect_url);
    } else {
        echo "Authentication failed. Invalid username or password.";
    }
}

// Close the database connection
$conn->close();

?>