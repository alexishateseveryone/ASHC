<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
