<?php
$conn = new mysqli("localhost", "root", "", "fullstack1");
$result = $conn->query("SELECT * FROM student");
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Records</title>
<style>
table {
  border-collapse: collapse;
  width: 80%;
  margin: 20px auto;
}
th, td {
  border: 1px solid black;
  padding: 8px;
}
th {
  background: #ddd;
}
</style>
</head>

<body>

<h2 align="center">Registered Students</h2>

<table>
<tr>
  <th>ID</th>
  <th>Name</th>
  <th>Email</th>
  <th>DOB</th>
  <th>Department</th>
  <th>Phone</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
  <td><?= $row['id'] ?></td>
  <td><?= $row['name'] ?></td>
  <td><?= $row['email'] ?></td>
  <td><?= $row['dob'] ?></td>
  <td><?= $row['department'] ?></td>
  <td><?= $row['phone'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
