<?php
if (isset($_SESSION["users"]) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header("location: index.php");
} else{header("location: admin.php");}
?>