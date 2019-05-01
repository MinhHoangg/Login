<?php
	$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");

		if(isset($_POST[user]) && isset($_POST[pass])){

			$query = pg_query("SELECT * FROM login WHERE users='$_POST[user]'");
			if(pg_num_rows($query) > 0 ) { //check if there is already an entry for that username
				echo "Username already exists!";
			}else{
				pg_query("INSERT INTO login (users, pass) VALUES ('$_POST[user]', '$_POST[pass]')");
				header("location:index.php");
			}
	}
?>
