<!DOCTYPE html>
<head>
<title>Delete</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
li {
list-style: none;
}
</style>
</head>
<body align = "center">
<h2>Delete data from toy table</h2>
<ul>
<form name="delete" action="delete.php" method="POST" >
<li>Toy Name: </li><li><input type="text" name="iname" /></li>
<li><input type="submit" /></li>
</form>
</ul>
</body>
</html>
<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$query = "DELETE FROM toy WHERE iname = ('$_POST[iname]')";
$result = pg_query($query); 
?>