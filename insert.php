<!DOCTYPE html>
<head>
<title>Insert Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
li {
list-style: none;
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
</style>
</head>
<body align = "center" background="img/pic.jpeg">
<ul>
<!-- <form name="insert" action="insert.php" method="POST">
<li>Toy Name: </li><li><input type="text" name="iname" required></li>
<li>Price ($):</li><li><input type="number" name="price" required></li>
<li>Quantity:</li><li><input type="number" name="quantity" required></li>
<li><input type="submit" value="Insert" onclick="alert('Added successfully if you nhập mọi thứ tử tế :))')"></li>
</form> -->
<div class="w3-container w3-blue">
  <h2>Enter data into toy table</h2>
</div>

<form class="w3-container" name="insert" action="insert.php" method="POST">
  <p>
  <label>Toy Name</label>
  <input class="w3-input" type="text" name="iname" required></p>
  <p>
  <label>Price ($)</label>
  <input class="w3-input" type="number" name="price" required></p>
  <p>
  <label>Quantity</label>
  <input class="w3-input" type="number" name="quantity" required></p>
  <p>
  <label>Image</label>
  <input class="w3-input" value="img/" name="image" required></p>
  <li><input type="submit" value="Insert" onclick="alert('Added successfully if you nhập mọi thứ tử tế :))')"></li>
</form>
</ul>
<div align="center">
<button class="button button5"><a href="https://parkboyoung.herokuapp.com/index.php">Product Page</a></button>
</div>
</body>
</html>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$query = "INSERT INTO toy VALUES ('$_POST[iname]','$_POST[price]','$_POST[quantity]','$_POST[image]')";
$result = pg_query($query); 
?>