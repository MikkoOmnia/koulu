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
				width: 75%;
				background-color: #485563;
				color: white;
				text-align: center;
				justify-content: center;
				align-items: center;
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
			
			.infocard span {
				display: inline-block;
				width: 250px;
			}
			
			#contactform {
				font-size: 28px;
				margin: auto;
				text-align: left;
				width: 70%;
			}
			
			#contactform input {
				font-size: 28px;
			}
			
			#contactform .hbutton {
				font-size: 28px;
				width: 150px;
				display: block;
				margin: 20px auto;
			}
			
			#accountinfo {
				text-align: left;
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
						$userid = $_SESSION["userid"];
						$sql = "SELECT email, name, address FROM users WHERE id='".$userid."'";
						$resultOfQuery = mysqli_query($conn, $sql);
						if (mysqli_num_rows($resultOfQuery) > 0){
							$qry = mysqli_fetch_array($resultOfQuery);
							$email = $qry['email'];
							$name = $qry['name'];
							$address = $qry['address'];
							?>
							
							<div id="accountinfo">
								<p style="font-weight:bold;font-size:32px">Account Information</p>
								<div style="line-height:28px">
									<p>Email: <?php echo $email; ?></p>
									<p>Name: <?php echo $name; ?></p>
									<p>Address: <?php echo $address; ?></p>
								</div>
								<a href="editinfo.php"><button class="hbutton">Edit information</button></a>
								<?php
								
									if($_SESSION["type"] == "admin") {
										?>
										<div><a href="admin.php"><button class="hbutton">Admin panel</button></a></div>
										<?php
									}
								
								?>
								<form method="POST">
									<input type="submit" class="hbutton" name="logout" value="Logout">
								</form>
							</div>
							
					<p>Your order history (Newest first)</p>
					
					<?php 
						
						$servername = "localhost";
						$username = "root";
						$password = "";
						$db = "gpushop";

						$conn = new mysqli($servername, $username, $password, $db);
						
						if (!$conn) {
						  die("Connection failed: " . mysqli_connect_error());
						}
						
						$olookup = $_SESSION["userid"];
						$sql = "SELECT * FROM orders WHERE user='$olookup' ORDER BY date DESC";
						$result = $conn->query($sql);
						if ($result->num_rows > 0) {
						  while($row = $result->fetch_assoc()) {
							echo "Order ID: " . $row["id"]. " - User: " . $row["user"]. " - Price:" . $row["price"]. " - Date:" . $row["date"]."<br>";
						  }
						} else {
						  echo "0 results";
						}
						
						?>
			</>
							
							<?php
						}
					} else { 
					?>
					<form method="POST" id="contactform">
						
						<div>
						
							<span>E-Mail</span>
							<input pattern=".{10,}" required title="Minimum length is 10" name="email" type="text">
							
						</div>
						
						<div>
						
							<span>Password</span>
							<input pattern=".{8,}" required title="Minimum length is 8" name="password" type="password">
							
						</div>
					
						<input type="submit" name="login" value="Login" class="hbutton">
						<input type="submit" name="register" value="Register" class="hbutton">
					</form>
					<?php 
					} 
					if(isset($_POST["register"])) {
						$email = $_POST["email"];
						$password = $_POST["password"];
						
						$sql = "SELECT id FROM users WHERE email='$email'";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) == 0) {
							$sql = "INSERT INTO users(email, password) VALUES ('$email','$password')";
							$result = mysqli_query($conn, $sql);
							
							$sql = "SELECT id FROM users WHERE email='$email'";
							$checker = mysqli_query($conn, $sql);
							
							if (mysqli_num_rows($checker) > 0) {
							while($row = mysqli_fetch_assoc($checker)) {
								$_SESSION["userid"] = $row["id"];
								$_SESSION["email"] = $email;
							}
							 echo "<meta http-equiv='refresh' content='0'>";
							}
							
						}
						else {
							echo "User already exists!";
						}
					} 
					elseif(isset($_POST["login"])) {
						$email = $_POST["email"];
						$password = $_POST["password"];
						
						$sql = "SELECT id, type FROM users WHERE email='$email' AND password='$password'";
						$result = mysqli_query($conn, $sql);

						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								$_SESSION["userid"] = $row["id"];
								$_SESSION["email"] = $email;
								$_SESSION["type"] = $row["type"];
								echo "<meta http-equiv='refresh' content='0'>";
							}
						} else {
							?> <p>Wrong email or password</p> <?php
						}
					}
					
					if(isset($_POST["logout"])) {
						session_destroy();
						echo "<meta http-equiv='refresh' content='0'>";
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