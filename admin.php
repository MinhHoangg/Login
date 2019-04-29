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
	.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 16px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}
.button5:hover {
  background-color: #555555;
  color: white;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #FFFFFF;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #DC143C;
  color: white;}
  .fixed{
    position: fixed;
    width: 25%;
    bottom: 0px;
    right: 0px;
  }
</style>
</head>
<body align = "center" background="img/pic.png">
<h1>Admin Page of ATN Shop</h1>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db,"SELECT * FROM toy");
?>
<table align="center" id="customers">
	<tr><th align='center' width='200'>Name</th><th align='center' width='200'>Price ($)</th><th align='center' width='200'>Quantity</th></tr>
</table>
<?php
echo "<table align='center' id='customers'>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['iname'] . "</td>";
echo "<td align='center' width='200'>" . $row['price'] . " $" . "</td>";
echo "<td align='center' width='200'>" . $row['quantity'] . "</td>";
echo "</tr>";}echo "</table>";?>
</div>
<button class="button button5"><a href="https://parkboyoung.herokuapp.com/insert.php">Insert Page</a></button>
<button class="button button5"><a href="https://parkboyoung.herokuapp.com/delete.php">Delete Page</a></button>
<div class="fixed">
  <video width="320" height="240" controls autoplay loop>
    <source src="img/video.mp4" type="video/mp4">
  </video>
</div>
</body>
</html>