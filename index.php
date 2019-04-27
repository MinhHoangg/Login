<!DOCTYPE html>
<html>
<head>
	<title>All Product</title>
	<style type="text/css">
		.item{
		width:15%;
		float: left;
		padding: 15px;
		box-sizing: border-box;
		height: 300px;
		border-width:5px;  
        border-style:groove;
		}
	</style>
</head>
<body>
<?php 
$sql = "SELECT * FROM toy";
$db = parse_url(getenv("DATABASE_URL"));
$pdo = new PDO("pgsql:" . sprintf(
    "host=%s;port=%s;user=%s;password=%s;dbname=%s",
    $db["host"],
    $db["port"],
    $db["user"],
    $db["pass"],
    ltrim($db["path"], "/")
));
?>
<div class="item">
<div>
	<?php
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {
	echo $row['iname'];
}
?>
</div>
<br>
<div>
	<?php
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {
	echo $row['price'];
}
?>
</div>
</div>
</body>
</html>