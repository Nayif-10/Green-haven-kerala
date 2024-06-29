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

// Retrieve hotel details based on the hotel_id from the URL
$hotelId = $_GET['Hotelno'];

// Modify the query based on your database structure
$query = "SELECT Hotel_Name,Location,Rate_Per_Day,Rating,Hotel_link FROM hotels WHERE Hotelno= $hotelId";
$result = $conn->query($query);

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
echo "<head>";
echo "<meta charset='UTF-8'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";
echo "<title>Hotel Details</title>";
echo "<style>";
echo "body { font-family: 'Verdana', sans-serif; background-color: #f8f8f8; margin: 0; padding: 0; }";
echo ".container { max-width: 800px; margin: 40px auto; padding: 20px; background-color: #ffffff; box-shadow: 0 0 12px rgba(0, 0, 0, 0.1); border-radius: 8px; }";
echo "h1 { color: #444; text-align: center; margin-bottom: 20px; }";
echo "table { width: 100%; border-collapse: collapse; margin-top: 20px; }";
echo "th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }";
echo "th { background-color: #f4f4f4; }";
echo "a { color: #004080; text-decoration: none; font-weight: bold; }";
echo "</style>";

echo "</head>";
echo "<body>";

if ($result->num_rows > 0) {
    // Display the hotel details in a table
    echo "<h1>Best Hotels</h1>";
    echo "<table border='0'>";
    echo "<tr><th>Hotel Name</th><th>Location</th><th>Rate Per Day</th><th>Rating</th><th>Website</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['Hotel_Name'] . "</td>";
        echo "<td>" . $row['Location'] . "</td>";
        echo "<td>" . $row['Rate_Per_Day'] . "</td>";
        echo "<td>" . $row['Rating'] . "</td>";
        echo "<td><a href='" . $row['Hotel_link'] . "' target='_blank'>" . $row['Hotel_link'] . "</a></td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "<p>No details found for Hotel $hotelId.</p>";
}

echo "</body>";
echo "</html>";

$conn->close();
?>
