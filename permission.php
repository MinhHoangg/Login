<?php
if (isset($_SESSION['users']) == false) {
	// Nếu người dùng chưa đăng nhập thì chuyển hướng website sang trang đăng nhập
	header("location: index.php");
}else {
	echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='https://parkboyoung.herokuapp.com/index.php'> Click để về lại trang chủ</a>";
}
?>