<?php

	session_start();
	if(!empty($_GET["action"])) {
		switch($_GET["action"]) {
		case "remove":
			if(!empty($_SESSION["cart_item"])) {
				foreach($_SESSION["cart_item"] as $k => $v) {
						if($_GET["code"] == ($k))
							unset($_SESSION["cart_item"][$k]);				
						if(empty($_SESSION["cart_item"]))
							unset($_SESSION["cart_item"]);
				}
			}
			break;
		case "empty":
			unset($_SESSION["cart_item"]);
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
			
			body {
				
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
			}
			
			.infocard img {
				width: 400px;
				height: auto;
			}
			
			.infocardt {
				margin: 20px;
			}
			
			#infocardflex {
				display: flex;
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
			
			.btnRemoveAction img {
				width: 30px;
				height: 30px;
			}
			
			.tbl-cart {
				width: 1100px;
			}
			
			#btnEmpty {
				color: red;
			}
			
			#btnEmpty:hover {
				color: darkred;
			}
			
			#order {
				position: relative;
				float: right;
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
				<div id="infocardflex">
					<div id="shopping-cart">
						<div class="txt-heading">Shopping Cart</div>

						<a id="btnEmpty" href="cart.php?action=empty">Empty Cart</a>
						<?php
						if(isset($_SESSION["cart_item"])){
							$total_quantity = 0;
							$total_price = 0;
						?>	
						<table class="tbl-cart" cellpadding="10" cellspacing="1">
						<tbody>
						<tr>
							<th style="text-align:left;" width="30%">Name</th>
							<th style="text-align:right;" width="10%">Quantity</th>
							<th style="text-align:right;" width="20%">Unit Price</th>
							<th style="text-align:right;" width="15%">Price</th>
							<th style="text-align:center;"  width="10%">Remove</th>
						</tr>	
						<?php		
							foreach ($_SESSION["cart_item"] as $item){
								$item_price = $item["quantity"]*$item["price"];
								?>
										<tr>
										<td> <?php echo $item["name"]; ?></td>
										<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
										<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
										<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
										<td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
										</tr>
										<?php
										$total_quantity += $item["quantity"];
										$total_price += ($item["price"]*$item["quantity"]);
										$_SESSION["totalamt"] = $total_price;
								}
								?>

						<tr>
						<td colspan="2" align="right">Total:</td>
						<td align="right"><?php echo $total_quantity; ?></td>
						<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
						<td></td>
						</tr>
						</tbody>
						</table>		
						  <?php
						} else {
						?>
						<div class="no-records">Your Cart is Empty</div>
						<?php 
						}
						?>
						</div>
					</div>
					
					<form method="POST" action="confirmation.php">
						<input type="submit" id="order" name="checkout" value="Complete Order" class="hbutton">
					</form>
					<div class="spacer" style="clear: both;"></div>
				
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