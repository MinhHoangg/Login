<!DOCTYPE html>
<head>
<title>Delete</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
</style>
</head>
<body align = "center" background="pic.jpeg">
<h2>Delete data from toy table</h2>
<ul>
<form name="delete" action="delete.php" method="POST" >
<li>Toy Name: </li><li><input type="text" name="iname" required></li>
<li><input type="submit" value="Delete" onclick="alert('Added successfully if you nhập mọi thứ tử tế :))')></li>
</form>
</ul>
<button class="button button5"><a href="https://parkboyoung.herokuapp.com/index.php">Product Page</a></button>
</body>
</html>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$query = "DELETE FROM toy WHERE iname = ('$_POST[iname]')";
$result = pg_query($query); 
?>