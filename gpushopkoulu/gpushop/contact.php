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
			
			#contactform {
				font-size: 28px;
			}
			
			#contactform input {
				font-size: 28px;
			}
			
			textarea {
				width: 300px;
				max-width: 400px;
				max-height: 200px;
				font-family: arial;
				font-size: 24px;
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
			
				<h2 style="margin: 20px auto;font-size:48px">Contact us</h2>
				
				<form id="contactform" method="post" style="text-align:left;width:70%;margin:auto">
				
					<div>
				
						<span>Your Name</span>
						<input name="name" type="text">
						
					</div>
					
					<div>
					
						<span>Your E-Mail</span>
						<input name="email" type="text">
						
					</div>
					
					<div>
					
						<span>Type of request</span>
						<select name="type" style="font-size: 28px">
							<option>Bug report</option>
							<option>Payment Issue</option>
							<option>Delivery Issue</option>
							<option>Suggestion</option>
							<option>Other</option>
						</select>
					
					</div>
					
					<div>
					
						<span>More information</span>
						<textarea name="info" id="textarea"></textarea>
						
					</div>
					
					<div style="justify-content:center;align-items:center;margin:auto;width:40%">
						<input type="submit" name="submit" value="Submit request" class="hbutton" style="font-size:32px">
					</div>
					
					<?php
					
						$servername = "localhost";
						$username = "root";
						$password = "";
						$db = "gpushop";

						$conn = new mysqli($servername, $username, $password, $db);
						
						if (!$conn) {
						  die("Connection failed: " . mysqli_connect_error());
						}
						
						if(isset($_POST['submit'])) {
							$name =  $_POST['name'];
							$email =  $_POST['email'];
							$type =  $_POST['type'];
							$info =  $_POST['info'];
							
							$sql = "INSERT INTO support(name,email,type,info,date,solved) VALUES ('$name','$email','$type','$info',NOW(),'false')";
							
							if(mysqli_query($conn, $sql)){
								echo "<script>alert('Request submitted!');</script>";
							}
						}
						 
						mysqli_close($conn);
					
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