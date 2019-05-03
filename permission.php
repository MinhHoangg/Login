<?php include("login.php");
if ($count == 0) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header("location: index.php");
}
?>