<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "fullstack_db";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die("<p style='color:red'>Connection failed: " . mysqli_connect_error() . "</p>");
}

$name   = mysqli_real_escape_string($conn, $_POST['name']);
$email  = mysqli_real_escape_string($conn, $_POST['email']);
$dob    = mysqli_real_escape_string($conn, $_POST['dob']);
$dept   = mysqli_real_escape_string($conn, $_POST['department']);
$phone  = mysqli_real_escape_string($conn, $_POST['phone']);

$sql = "INSERT INTO students (name, email, dob, department, phone)
        VALUES ('$name', '$email', '$dob', '$dept', '$phone')";

if (mysqli_query($conn, $sql)) {
    echo "<h3 style='color:green'>✅ Student registered successfully!</h3>";
    echo "<a href='index.html'>← Go Back</a>";
} else {
    echo "<h3 style='color:red'>❌ Error: " . mysqli_error($conn) . "</h3>";
}

mysqli_close($conn);
?>
