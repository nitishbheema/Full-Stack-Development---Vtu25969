<?php
$conn = new mysqli("localhost", "root", "", "fullstack1");

if ($conn->connect_error) {
    die("Connection failed");
}

$name = $_POST['name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$dept = $_POST['department'];
$phone = $_POST['phone'];

$sql = "INSERT INTO student (name, email, dob, department, phone)
        VALUES ('$name', '$email', '$dob', '$dept', '$phone')";

if ($conn->query($sql)) {
    echo "Registration Successful <br>";
    echo "<a href='view.php'>View Students</a>";
} else {
    echo "Error: Email already exists";
}

$conn->close();
?>
