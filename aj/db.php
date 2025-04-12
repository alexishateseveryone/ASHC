<?php
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if you have one)
$dbname = "userdb"; // Database name

// Create connection
$conn = new mysqli('localhost', 'root','', 'userdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
