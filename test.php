<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>All Product</title>
<meta name="description" content="Assignment 2">
<style type="text/css">
table {
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body align = "center" background="pic.png">
<h1>List of all toy in the ATN Shop</h1>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db,"SELECT * FROM toy");
?>
<table align="center" id="customers">
	<tr><td align='center' width='200'>Name</td><td align='center' width='200'>Price ($)</td><td align='center' width='200'>Quantity</td></tr>
</table>
<?php
echo "<table align='center' id='customers'>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['id'] . "</td>";
echo "<td align='center' width='200'>" . $row['name'] . " $" . "</td>";
echo "<td align='center' width='200'>" . $row['image'] . "</td>";
echo "</tr>";}echo "</table>";?>
</div>
</body>
</html>