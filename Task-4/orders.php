<?php
$conn = new mysqli("localhost","root","","fullstack1");
?>
<!DOCTYPE html>
<html>
<head>
<title>Order Management</title>
<style>
body{font-family:Arial;background:#f4f4f4}
h2{text-align:center}
table{border-collapse:collapse;width:90%;margin:20px auto;background:#fff}
th,td{border:1px solid #000;padding:8px}
th{background:#ddd}
.box{width:60%;margin:20px auto;background:#fff;padding:15px;text-align:center}
</style>
</head>
<body>

<h2>Customer Order History</h2>

<table>
<tr>
  <th>Customer</th>
  <th>Product</th>
  <th>Price</th>
  <th>Qty</th>
  <th>Total</th>
  <th>Date</th>
</tr>
<?php
$q = "
SELECT c.name, p.product_name, p.price, o.quantity,
(p.price*o.quantity) AS total, o.order_date
FROM orders o
JOIN customers c ON o.customer_id=c.customer_id
JOIN products p ON o.product_id=p.product_id
ORDER BY o.order_date DESC";
$r = $conn->query($q);
while($row=$r->fetch_assoc()){
?>
<tr>
  <td><?= $row['name'] ?></td>
  <td><?= $row['product_name'] ?></td>
  <td><?= $row['price'] ?></td>
  <td><?= $row['quantity'] ?></td>
  <td><?= $row['total'] ?></td>
  <td><?= $row['order_date'] ?></td>
</tr>
<?php } ?>
</table>

<div class="box">
<h3>Highest Value Order</h3>
<?php
$q = "
SELECT c.name,(p.price*o.quantity) AS total
FROM orders o
JOIN customers c ON o.customer_id=c.customer_id
JOIN products p ON o.product_id=p.product_id
WHERE (p.price*o.quantity)=(
  SELECT MAX(p.price*o.quantity)
  FROM orders o JOIN products p ON o.product_id=p.product_id
)";
$r=$conn->query($q)->fetch_assoc();
echo "Customer: {$r['name']}<br>Order Value: {$r['total']}";
?>
</div>

<div class="box">
<h3>Most Active Customer</h3>
<?php
$q="
SELECT c.name,COUNT(o.order_id) AS cnt
FROM customers c JOIN orders o ON c.customer_id=o.customer_id
GROUP BY c.customer_id
ORDER BY cnt DESC LIMIT 1";
$r=$conn->query($q)->fetch_assoc();
echo "Customer: {$r['name']}<br>Total Orders: {$r['cnt']}";
?>
</div>

</body>
</html>
