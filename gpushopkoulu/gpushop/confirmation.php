<?php 

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$db = "gpushop";

$conn = new mysqli($servername, $username, $password, $db);



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
				display: table;
				width: 100%;
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
				display: flex;
				width: 75%;
				height: 200px;
				background-color: #485563;
				color: white;
				display: flex;
			}
			
			.infocard img {
				width: 400px;
				height: auto;
			}
			
			.infocardt {
				margin: 20px;
			}
			
			#gobuy {
				font-size: 56px;
				color: white;
				font-family: "Lucida Console";
				border-radius: 25px;
				background-color: #485563;
				text-align: center;
				padding: 100px 20px 20px 20px;
				width: 75%;
				margin: 50px auto;
			}
			
			#gobuy button {
				margin: 100px;
				padding: 10px;
				background-color: transparent;
				border: 5px solid white;
				border-radius: 15px;
				font-size: 48px;
				color: white;
			}
			
			#gobuy button:hover {
				background-color: white;
				color: black;
				cursor: pointer;
				background: linear-gradient(155deg, #d6d6d6, #686868);
				background-size: 400% 400%;

				-webkit-animation: AnimationName 9s ease infinite;
				-moz-animation: AnimationName 4s ease infinite;
				animation: AnimationName 9s ease infinite;
			}

			@-webkit-keyframes AnimationName {
				0%{background-position:0% 14%}
				50%{background-position:100% 87%}
				100%{background-position:0% 14%}
			}
			@-moz-keyframes AnimationName {
				0%{background-position:0% 14%}
				50%{background-position:100% 87%}
				100%{background-position:0% 14%}
			}
			@keyframes AnimationName {
				0%{background-position:0% 14%}
				50%{background-position:100% 87%}
				100%{background-position:0% 14%}
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
				
				<div>
					
					<?php 
					if(isset($_SESSION["userid"])) {
						$price = $_SESSION["totalamt"];
						$userid = $_SESSION["userid"];
						$sql = "INSERT INTO orders(user, price, date) VALUES ('$userid','$price',NOW())";
													
						if(mysqli_query($conn, $sql)){
							unset($_SESSION["cart_item"]);
						?>
						<p>Thank you for shopping with us!</p>
						<?php
						}
					} else { 
					?>
					<p>Please login to place an order</p>
					<a href="account.php"><button class="hbutton">Login</button></a>
					<?php 
					} 
					?>
				
				</div>
			
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