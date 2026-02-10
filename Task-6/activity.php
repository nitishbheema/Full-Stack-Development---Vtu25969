<?php
$conn = new mysqli("localhost","root","","fullstack1");
$result = $conn->query("SELECT * FROM daily_activity_report");
?>
<!DOCTYPE html>
<html>
<head>
<title>Daily Activity Report</title>
<style>
table{border-collapse:collapse;width:70%;margin:40px auto}
th,td{border:1px solid #000;padding:8px;text-align:center}
th{background:#ddd}
</style>
</head>
<body>
<h2 align="center">Daily Activity Report</h2>
<table>
<tr>
  <th>Date</th>
  <th>Table</th>
  <th>Operation</th>
  <th>Total</th>
</tr>
<?php while($r=$result->fetch_assoc()){ ?>
<tr>
  <td><?= $r['activity_date'] ?></td>
  <td><?= $r['table_name'] ?></td>
  <td><?= $r['operation'] ?></td>
  <td><?= $r['total_actions'] ?></td>
</tr>
<?php } ?>
</table>
</body>
</html>
