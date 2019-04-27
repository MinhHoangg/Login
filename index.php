<!DOCTYPE html>
<html>
<head>
	<title>All Product</title>
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
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {
	echo $row['image'];
}
<br>
foreach ($resultSet as $row) {
	echo $row['iname'];
}
<br>
foreach ($resultSet as $row) {
	echo $row['price'];
}
?>
</body>
</html>