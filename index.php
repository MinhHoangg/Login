<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>All Product</title>
<meta name="description" content="If we want to fetch all rows from the actor table the following PostgreSQL SELECT statement can be used.">
<style type="text/css">

</style>
</head>
<body align = "center" background="pic.png">
<h1>List of all toy in the ATN Shop</h1>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db,"SELECT * FROM toy");
?>
<table>
	<tr><td align='center' width='200'>Name</td><td align='center' width='200'>Price</td><td align='center' width='200'>Quantity</td></tr>
</table>
<?php
echo "<table>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['iname'] . "</td>";
echo "<td align='center' width='200'>" . $row['price'] . "</td>";
echo "<td align='center' width='200'>" . $row['quantity'] . "</td>";
echo "</tr>";}echo "</table>";?>
</div>
</body>
</html>