<?php

	session_start();
	require_once("dbcontroller.php");
	$db_handle = new DBController();
	if(!empty($_GET["action"])) {
	switch($_GET["action"]) {
		case "add":
			if(!empty($_POST["quantity"])) {
				$productByCode = $db_handle->runQuery("SELECT * FROM tuotteet WHERE code='" . $_GET["code"] . "'");
				$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
				
				if(!empty($_SESSION["cart_item"])) {
					if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
						foreach($_SESSION["cart_item"] as $k => $v) {
								if($productByCode[0]["code"] == $k) {
									if(empty($_SESSION["cart_item"][$k]["quantity"])) {
										$_SESSION["cart_item"][$k]["quantity"] = 0;
									}
									$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
								}
						}
					} else {
						$_SESSION["cart_item"] += $itemArray;
					}
				} else {
					$_SESSION["cart_item"] = $itemArray;
				}
			} 
			
		break;
	}	
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
			
			.quantity {
				margin: 15px;
				padding: 10px;
				background-color: transparent;
				border: 5px solid white;
				border-radius: 15px;
				font-size: 24px;
				color: white;
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
				width: 1100px;
				background-color: #485563;
				color: white;
				display: flex;
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
			
			#category {
				display: block;
			}
			
			#products {
				padding-left: 8%;
				margin: 0;
				display: grid;
				grid-template-columns: 1fr 1fr;
				grid-gap: 30px;
			}
			
			.product-image {
				max-height: 250px;
			}
			
			.product-image img{
				max-width: 300px;
				max-height: 200px;
				height: auto;
				margin: 10px auto;
				display: block;
			}
			
			.product-title {
				margin-left: 5%;
			}
			
			.product-price {
				margin-left: 5%;
			}
			
			.product-item {
				position: relative;
				margin: 0;
				width: 380px;
				height: 400px;
				background-color: #5e6d7d;
				border-radius: 30px;
			}
			
			.cart-action {
				position: absolute;
				bottom: 0;
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
			
				<div id="category" style="line-height:35px">
				
					<form method="post" style="margin-left:20px">
						<p>Search</p>
						<input maxlength="100" name="lookupquery" type="search" style="font-size:24px;width:200px;">
						<p>Choose a category</p>
						<select name="category" style="font-size: 24px">
							<option>All</option>
							<option>Nvidia</option>
							<option>AMD</option>
						</select>
						<br>
						<input type="submit" value="Search" name="search" class="hbutton" style="font-size:20px;margin-left:0">
						
					</form>
				
				</div>
				<div id="products">
					<?php 
						
						$servername = "localhost";
						$username = "root";
						$password = "";
						$db = "gpushop";
						
						$_SESSION["cart"] = array();

						$conn = new mysqli($servername, $username, $password, $db);
						
						if (!$conn) {
						  die("Connection failed: " . mysqli_connect_error());
						}
						
						$sql = "SELECT * FROM tuotteet";
						
						if(isset($_POST["search"])) {
							$searchc = $_POST["category"];
							if (isset($_POST["lookupquery"])) {
								$lookupquery = $_POST["lookupquery"];
							}
							if ($searchc != 'All') {
								$sql = "SELECT * FROM tuotteet WHERE category='{$searchc}'";
							} 
							elseif ($searchc != 'All' && $lookupquery != '') {
								$sql = "SELECT * FROM tuotteet WHERE category='{$searchc}' AND name LIKE '%{$lookupquery}%'";
							}
							elseif ($searchc == 'All' && $lookupquery != '') {
								$sql = "SELECT * FROM tuotteet WHERE name LIKE '%{$lookupquery}%'";
							}
							else {
								$sql = "SELECT * FROM tuotteet";
							}
						}
						
						$product_array = $db_handle->runQuery("$sql");
						
						if (!empty($product_array)) { 
							foreach($product_array as $key=>$value){
						?>
								<div class="product-item">
									<form method="post" action="shop.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
									<div class="product-image"><img src="uploads/<?php echo $product_array[$key]["image"]; ?>"></div>
									<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
									<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
									<div class="cart-action"><input type="text" class="quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="hbutton" /></div>
									</form>
								</div>
								
						<?php
							}
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