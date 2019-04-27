<!DOCTYPE html>
<html>
<head>
	<title>All Product</title>
	<style type="text/css">
		.item{
		width:25%;
		float: left;
		padding: 15px;
		box-sizing: border-box;
		height: 550px;

		}
	.iname{
			font-size: 25px;
			font-weight: bold;
		}
	.iimage img{
			width: 100%;
			height:350px;		
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
$stmt = $pdo->prepare($sql);
//Thiết lập kiểu dữ liệu trả về
$stmt->setFetchMode(PDO::FETCH_ASSOC);
$stmt->execute();
$resultSet = $stmt->fetchAll();
foreach ($resultSet as $row) {
	echo $row['name'];
}
<div class="item">

				<div class="iimage">
					foreach ($resultSet as $row) {
	echo $row['image'];
}
				</div>
				<div class="iname">
				foreach ($resultSet as $row) {
	echo $row['iname'];
}
				</div>
				<div>
				foreach ($resultSet as $row) {
	echo $row['price'];
}</div>
			</div>
?>
</body>
</html>