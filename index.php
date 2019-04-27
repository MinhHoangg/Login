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
	<?php
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {
	echo $row['iname' . ' - '];

?>
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
</body>
</html>