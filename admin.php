<?php
include ("login.php");
if($count==1){
    header("location:admin.php");
  }else{
    header("location:index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Page</title>
<meta name="description" content="Assignment 2">
<style type="text/css">
  table {
  border-collapse: collapse;
}
.fixed2{
  position: fixed;
  top: 15px;
  left: 15px;
}
table, td, th {
  border: 0px solid black;
}
	.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 12px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 3px 1.5px;
  -webkit-transition-duration: 0.4s; /* Safari */
  transition-duration: 0.4s;
  cursor: pointer;
}
.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}
.button5:hover {
  background-color: #555555;
  color: white;
}
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #FFFFFF;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #DC143C;
  color: white;}
  .fixed{
  position: fixed;
  top: 15px;
  right: 15px;
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.pass {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 60%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
</style>
</head>
<body align = "center" background="img/pic.png">
<h1>Admin Page of ATN Shop</h1>
<table class="fixed">
  <tr>
    <td>
      <form class="w3-container" action="insert.php" method="POST"><button class="button button5">Insert Page</button></form>
    </td>
    <td>
      <form class="w3-container" action="update.php" method="POST"><button class="button button5">Update Page</button></form>
    </td>
    <td>
      <form class="w3-container" action="delete.php" method="POST"><button class="button button5">Delete Page</button></form>
    </td>
    <td>
      <form class="w3-container" action="index.php" method="POST"><button class="button button5">Log Out</button></form>
    </td>
  </tr>
</table>
<table class="fixed2">
	<tr>
		<td><button class="button button5" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Sign up</button></td>
		<td><button class="button button5" onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Edit password</button></td>
	</tr>
		
</table>

<div id="id01" class="modal">
<form class="modal-content animate" action="new_user.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/pic.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>
        
      <button type="submit" class="button button5" onclick="alert('Sign up successfully if you nhập mọi thứ tử tế :))')">Sign Up</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>









<div id="id02" class="modal">
<form class="modal-content animate" action="login2.php" method="POST">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="img/pic.jpeg" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="user"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="user" required>

      <label for="pass"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="pass" required>

      <label for="pass"><b>New Password</b></label>
      <input type="password" placeholder="Enter New Password" name="passup" required>
        
      <button type="submit" class="button button5" onclick="alert('Change password successfully if you nhập mọi thứ tử tế :))')">Change Password</button>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>









<?php
$db = pg_connect("host=ec2-54-235-114-242.compute-1.amazonaws.com
 port=5432 dbname=d8sto9amrrhb0v user=bsodvujawdtmnt password=e5eb56a54ac2393fca0715e5f0d9e4e8c5c1b5cee85b45edf957bb2c30fbcc4b");
$result = pg_query($db,"SELECT * FROM toy");
?>
<table align="center" id="customers">
	<tr><th align='center' width='200'>Name</th><th align='center' width='200'>Price ($)</th><th align='center' width='200'>Quantity</th><th align='center' width='200'>Image</th></tr>
</table>
<?php
echo "<table align='center' id='customers'>";
while($row=pg_fetch_assoc($result)){echo "<tr>";
echo "<td align='center' width='200'>" . $row['iname'] . "</td>";
echo "<td align='center' width='200'>" . $row['price'] . " $" . "</td>";
echo "<td align='center' width='200'>" . $row['quantity'] . "</td>";
echo "<td align='center' width='200'>";?><img src="/<?php echo $row['image']; ?>" height="150" width="150"> <?php "</td>";
echo "</tr>";}echo "</table>";?>
</div>
</body>
</html>