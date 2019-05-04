<?php
if (isset($_SESSION["users"]) == false) {
	header("location: index.php");
} else{header("location: admin.php");}
?>