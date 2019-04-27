<!DOCTYPE html>
<head>
<title>UPDATE PostgreSQL data with PHP</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>li {list-style: none;}</style>
</head>
<body>
<h2>Supply bookid and enter</h2>
<ul>
<form name="display" action="update.php" method="POST" >
<li>Toy Name: </li>
<li><input type="text" name="iname" /></li>
<li><input type="submit" name="submit" /></li>
</form>
</ul>
<php$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db, "SELECT * FROM toy where iname = '$_POST[iname]'");
$row = pg_fetch_assoc($result);
if (isset($_POST['submit'])){
echo "<ul><form name='update' action='update.php' method='POST' >
<li>Toy Name:</li>
<li><input type='text' name='iname_updated' value='$row[iname]' /></li>
<li>Price ($):</li><li><input type='number' name='price_updated' value='$row[price]' /></li>
<li>Date of publication:</li>
<li><input type='number' name='quantity_updated' value='$row[quantity]' /></li>
<li><input type='submit' name='new' /></li>
</form>
</ul>";}
if (isset($_POST['new'])){
$result = pg_query($db, "UPDATE toy SET iname = $_POST[iname_updated],
,price = $_POST[price_updated],
quantity = $_POST[quantity_updated]");
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