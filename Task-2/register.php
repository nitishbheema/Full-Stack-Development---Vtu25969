<?php
$conn = new mysqli("localhost", "root", "", "fullstack1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name  = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$dob   = $_POST['dob'] ?? '';
$dept  = $_POST['department'] ?? '';
$phone = $_POST['phone'] ?? '';

$stmt = $conn->prepare(
    "INSERT INTO student (name, email, dob, department, phone)
     VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param("sssss", $name, $email, $dob, $dept, $phone);

try {
    $stmt->execute();
    echo "Registration Successful<br>";
    echo "<a href='view.php'>View Students</a>";
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "Email already registered<br>";
        echo "<a href='index.html'>Go Back</a>";
    } else {
        echo "Error: " . $e->getMessage();
    }
}

$stmt->close();
$conn->close();
?>
