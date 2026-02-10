<?php
$conn = new mysqli("localhost", "root", "", "fullstack1");
if ($conn->connect_error) {
    die("Connection failed");
}

/* FILTER */
$dept = $_GET['department'] ?? '';

/* SORT */
$sort = $_GET['sort'] ?? '';

$sql = "SELECT * FROM student";

if ($dept != '') {
    $sql .= " WHERE department = '$dept'";
}

if ($sort == 'name') {
    $sql .= " ORDER BY name ASC";
} elseif ($sort == 'dob') {
    $sql .= " ORDER BY dob ASC";
}

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Dashboard</title>
<link rel="stylesheet" href="style.css">
<style>
table {
  border-collapse: collapse;
  width: 90%;
  margin: 20px auto;
}
th, td {
  border: 1px solid black;
  padding: 8px;
}
th {
  background: #eee;
}
form {
  text-align: center;
}
</style>
</head>

<body>

<h2 align="center">Student Data Dashboard</h2>

<!-- FILTER & SORT FORM -->
<form method="get">
  Department:
  <select name="department">
    <option value="">All</option>
    <option value="CSE">CSE</option>
    <option value="IT">IT</option>
    <option value="ECE">ECE</option>
  </select>

  Sort By:
  <select name="sort">
    <option value="">None</option>
    <option value="name">Name</option>
    <option value="dob">DOB</option>
  </select>

  <button type="submit">Apply</button>
</form>

<!-- DATA TABLE -->
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

<hr>

<!-- COUNT PER DEPARTMENT -->
<h3 align="center">Student Count per Department</h3>

<table>
<tr>
  <th>Department</th>
  <th>Total Students</th>
</tr>

<?php
$countResult = $conn->query(
  "SELECT department, COUNT(*) AS total 
   FROM student 
   GROUP BY department"
);

while($c = $countResult->fetch_assoc()) {
?>
<tr>
  <td><?= $c['department'] ?></td>
  <td><?= $c['total'] ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>
