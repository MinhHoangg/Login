<?php
session_start();
?>
<?php include("permission.php");?>
<?php
	$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
	
	$query = "SELECT * FROM login WHERE users='$_POST[user]' and pass='$_POST[pass]'";
	$result = pg_query($query);
	$count = pg_num_rows($result);
	 
	if($count==1){
		$query = "UPDATE login SET pass = '$_POST[passup]' WHERE users = '$_POST[user]'";
		$result = pg_query($query);
		header("location:admin.php");
	}else{
		header("location:admin.php");
	}
?>