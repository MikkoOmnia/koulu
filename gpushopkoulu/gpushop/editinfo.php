<?php

session_start();

if(!isset($_SESSION['userid'])){ //if login in session is not set
    header("Location: account.php");
}

?>
<!DOCTYPE html>
<html>

	<head>
	
		<style>	
			
			* {
				margin: 0;
				padding: 0;
				border: none;
			}
			
			h1 {
				font-family: didot;
				font-size: 72px;
				font-weight: bold;
				color: white;
				margin: 3%;
			}
			
			header {
				display: flex;
				align-items: center;
				justify-content: space-around;
				padding: 30px;
			}
			
			header a {
				color: white;
				text-decoration: none;
			}
			
			.hbutton {
				margin: 15px;
				padding: 10px;
				background-color: transparent;
				border: 5px solid white;
				border-radius: 15px;
				font-size: 24px;
				color: white;
			}
			
			.hbutton:hover {
				background-color: white;
				color: black;
				cursor: pointer;
			}	
			
			#footer {
				margin-top: 100px;
				background-color: black;
				border-top: 5px solid gray;
				font-size: 24px;
				font-family: arial;
				color: white;
				padding: 30px;
			}
			
			#footer span {
				width: 200px;
			}
			
			.contact {
				display: flex;
			}
			
			#header {
				background-color: #485563;
				width: 100%;
				float:left;
				clear:none;
				margin: 0;
			}
			
			#container {
				background-color: #5e6d7d;
				width: 100%;
				display: table;
				float: left;
				padding: 0;
			}
			
			.infocard {
				background-color: white;
				font-family: Trebuchet MS;
				font-size: 24px;
				margin: 30px auto;
				border-radius: 25px;
				line-height: 50px;
				padding: 20px;
				width: 75%;
				background-color: #485563;
				color: white;
				text-align: center;
			}
			
			.infocard span {
				display: inline-block;
				width: 250px;
			}
			
			.contactform {
				width: 60%;
				font-size: 28px;
				display: flex;
			}
			
			.contactform input {
				font-size: 28px;
			}
			
			.buttonw{
				min-width: 240px;
			}
			
		</style>
	
	</head>
	
	<body>
	
		<div id="header">
	
			<header>
				
				<div>
				
					<h1><a href="index.php">GPUShop</a></h1>
					
				</div>
				
				<div>
				
					<a href="shop.php"><button class="hbutton">Shop</button></a>
					<a href="cart.php"><button class="hbutton">Cart</button></a>
					<a href="contact.php"><button class="hbutton">Contact Us</button></a>
					<a href="account.php"><button class="hbutton">My Account</button></a>
					
				</div>
		
			</header>
			
		</div>
		
		<div id="container">

			<div class="infocard">
			
				<h2 style="margin: 20px auto;font-size:48px">Change info</h2>
				
				<form class="contactform" method="post" style="text-align:left;width:70%;margin:auto">
				
					<div>
				
						<span>Edit E-Mail</span>
						<input name="email" type="text">
						
					</div>
					<input type="submit" name="semail" value="Change E-Mail" class="hbutton buttonw" style="font-size:28px">
				</form>
				
				<form class="contactform" method="post" style="text-align:left;width:70%;margin:auto">
				
					<div>
				
						<span>Edit Name</span>
						<input name="name" type="text">
						
					</div>
					<input type="submit" name="sname" value="Change Name" class="hbutton buttonw" style="font-size:28px">
				</form>
				
				<form class="contactform" method="post" style="text-align:left;width:70%;margin:auto">
				
					<div>
				
						<span>Edit Address</span>
						<input name="address" type="text">
						
					</div>
					<input type="submit" name="saddress" value="Change Address" class="hbutton buttonw" style="font-size:28px">
				</form>
					
					<?php
					
						$servername = "localhost";
						$username = "root";
						$password = "";
						$db = "gpushop";

						$conn = new mysqli($servername, $username, $password, $db);
						
						$userid = $_SESSION["userid"];
						
						if(isset($_POST["semail"])) {
							$email = $_POST["email"];
							$sql = "UPDATE users SET email='$email' WHERE id='$userid'";

							if ($conn->query($sql) === TRUE) {
							  ?>
							  <p>E-Mail successfully updated</p>
							  <?php
							} else {
							  echo "<script>alert('An error occured');</script>";
							}
						}
						elseif(isset($_POST["sname"])) {
							$name = $_POST["name"];
							$sql = "UPDATE users SET name='$name' WHERE id='$userid'";

							if ($conn->query($sql) === TRUE) {
							  ?>
							  <p>Name successfully updated</p>
							  <?php
							} else {
							  echo "<script>alert('An error occured');</script>";
							}
						} 
						elseif(isset($_POST["saddress"])) {
							$address = $_POST["address"];
							$sql = "UPDATE users SET address='$address' WHERE id='$userid'";

							if ($conn->query($sql) === TRUE) {
							  ?>
							  <p>Address successfully updated</p>
							  <?php
							} else {
							  echo "<script>alert('An error occured');</script>";
							}

						}
						
					?>
					
				</form>
			
			</div>
		
			<div id="footer">
		
				<p style="font-size:30px">Contact information:</p>
				<div style="margin-top:20px">
					<div class="contact">
						<span>Email</span>
						<p>support@gpushop.com</p>
					</div>
					<div class="contact">
						<span>Phone number</span>
						<p>+358 451732378</p>
					</div>
					<div class="contact">
						<span>Address</span>
						<p>Niemi tie 3</p>
					</div>
				</div>
			</div>
		
		</div>
		
	</body>

</html>