<?php
session_start();
header('Content-Type: application/json');

$conn = mysqli_connect("localhost", "root", "", "fullstack_db");
if (!$conn) { echo json_encode(["success" => false, "message" => "DB connection failed"]); exit; }

$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = $_POST['password'];
$hashed   = md5($password); // MD5 for lab use; use password_hash() in production

$sql = "SELECT id FROM users WHERE username='$username' AND password_hash='$hashed'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $_SESSION['user'] = $username;
    echo json_encode(["success" => true, "message" => "Login successful"]);
} else {
    echo json_encode(["success" => false, "message" => "Invalid username or password"]);
}
mysqli_close($conn);
?>
