<?php
session_start();
if ($_SESSION['user'] == true) {
	header("location: admin.php");
} else{header("location: index.php");}
?>