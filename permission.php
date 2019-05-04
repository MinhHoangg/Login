<?php
session_start();
if (isset($_SESSION['user'])) {
	header("location: admin.php");
} else{header("location: index.php");}
?>