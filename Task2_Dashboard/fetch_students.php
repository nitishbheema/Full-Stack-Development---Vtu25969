<?php
header('Content-Type: application/json');
$conn = mysqli_connect("localhost", "root", "", "fullstack_db");
if (!$conn) { echo json_encode(["error" => mysqli_connect_error()]); exit; }

$dept = isset($_GET['dept']) ? mysqli_real_escape_string($conn, $_GET['dept']) : '';
$sort = isset($_GET['sort']) && $_GET['sort'] === 'dob' ? 'dob' : 'name';

$where = $dept ? "WHERE department = '$dept'" : "";
$sql = "SELECT * FROM students $where ORDER BY $sort ASC";
$result = mysqli_query($conn, $sql);

$rows = [];
while ($row = mysqli_fetch_assoc($result)) $rows[] = $row;
echo json_encode($rows);
mysqli_close($conn);
?>
