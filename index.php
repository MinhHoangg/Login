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
<div class="item">

				<div class="iimage">
					<img src="<?=$rows[$i]['image']?>" alt="">
				</div>
				<div class="iname"><?=$rows[$i]['iname']?></div>
				<div><?=$rows[$i]['price']?> $</div>
			</div>
?>
</body>
</html>