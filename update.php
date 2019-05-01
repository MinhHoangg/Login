<!DOCTYPE html>
<head>
<title>UPDATE PostgreSQL data with PHP</title>
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
<div class="w3-container w3-blue">
  <h2>Enter data into toy table</h2>
</div>
<form  class="w3-container" name="update" action="update.php" method="POST" >
<p>
<label>Toy Name</label>
<input class="w3-input" type="text" name="iname" required></p>
<li><input type="submit" name="submit" value="Find"></li>
</form>
</ul>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db, "SELECT * FROM toy where book_id = '$_POST[iname]'");
$row = pg_fetch_assoc($result);
if (isset($_POST['submit'])){
echo "<ul><form name='update' action='update.php' method='POST' >
<p>
  <label>Toy Name</label>
  <input class='w3-input' type='text' name='iname' required></p>
  <p>
  <label>Price ($)</label>
  <input class='w3-input' type='number' name='price' required></p>
  <p>
  <label>Quantity</label>
  <input class='w3-input' type='number' name='quantity' required></p>
  <p>
  <label>Image</label>
  <input class='w3-input' type='text' value='img/' name='image' required></p>
<li><input type='submit' value='Update' name='new' onclick='alert('Updated successfully if you nhập mọi thứ tử tế :))')'></li>
</form>
</ul>";}
if (isset($_POST['new'])){
$result = pg_query($db, "UPDATE book SET iname = '$_POST[iname]',
price = '$_POST[price]',quantity = '$_POST[quantity]',
image = '$_POST[image]'");
if (!$result){
echo "Update failed!!";
}
else
{
echo "Update successfull;";
} 
}?>
</body>
</html>
