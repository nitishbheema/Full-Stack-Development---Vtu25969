<?php
$conn = new mysqli("localhost", "root", "", "fullstack1");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare(
    "SELECT * FROM student WHERE email=? AND password=?"
);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 1) {
    header("Location: dashboard.php");
} else {
    echo "Invalid Email or Password<br>";
    echo "<a href='login.html'>Try Again</a>";
}

$stmt->close();
$conn->close();
?>
