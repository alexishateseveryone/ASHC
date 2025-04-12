<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if email and password are set
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "Missing email or password.";
    exit;
}

$loginEmail = trim($_POST['email']);
$loginPassword = trim($_POST['password']);

// Use prepared statement to prevent SQL injection
$sql = "SELECT password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $loginEmail);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $storedPassword = $user['password']; // Hashed password from DB

    // Verify the password using password_verify()
    if (password_verify($loginPassword, $storedPassword)) {
        echo "Login successful!";

    } else {
        echo "Invalid password.";
    }
} else {
    echo "User not found.";
}

// Close connections
$stmt->close();
$conn->close();
?>
