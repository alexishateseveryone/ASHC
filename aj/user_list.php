<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>" . $row["username"] . "</strong> - " . $row["email"] . 
             " <button onclick='deleteUser(" . $row["id"] . ")'>Delete</button></p>";
    }
} else {
    echo "No users found.";
}

$conn->close();
?>

<script>
function deleteUser(id) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "delete_user.php?id=" + id;
    }
}
</script>
