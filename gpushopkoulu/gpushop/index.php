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
			
			header button {
				margin: 15px;
				padding: 10px;
				background-color: transparent;
				border: 5px solid white;
				border-radius: 15px;
				font-size: 24px;
				color: white;
			}
			
			header button:hover {
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
				
					<a href="shop.php"><button>Shop</button></a>
					<a href="cart.php"><button>Cart</button></a>
					<a href="contact.php"><button>Contact Us</button></a>
					<a href="account.php"><button>My Account</button></a>
					
				</div>
		
			</header>
			
		</div>
		
		<div id="container">

			<div class="infocard">
				
				<div>
					<img src="rtx3090.png" />
				</div>
				<div class="infocardt">
					<p>We offer the best GPUs for the lowest prices.</p>
					<p>We offer GPUs for gaming to mining.</p>
					<p>We offer free worldwide shipping.</p>
				</div>
			
			</div>

			<div class="infocard">
				<div style="margin-left:auto;margin-right:0px;text-align:right">
				<div class="infocardt" style="float:left;">
					<p>100% Guarantee customer satisfaction.</p>
					<p>24/7 Premium customer support.</p>
					<p>Secured transactions.</p>
				</div>
				<div style="float:right">
					<img style="border-radius:25px;width:300px;float:right" src="customers.jpg" />
				</div>
				</div>
			</div>
			
			<div id="gobuy">
			
				<p>What are you waiting for?</p>
				
				<a href="shop.php"><button class="css-selector">Buy now</button></a>
			
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