<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "gpushop";

$conn = new mysqli($servername, $username, $password, $db);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST["register"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$sql = "SELECT id FROM users WHERE email='$email'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) == 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$sql = "INSERT INTO users(email, password) VALUES ('$email','$password')";
			$result = mysqli_query($conn, $sql);
			
			$_SESSION["userid"] = $row["id"];
			$_SESSION["email"] = $email;
			header('Location: account.php');
		}
	}
	else {
		echo "User already exists!";
		header('Location: account.php');
	}
} 
if(isset($_POST["login"])) {
	$email = $_POST["email"];
	$password = $_POST["password"];
	
	$sql = "SELECT id FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$_SESSION["userid"] = $row["id"];
			$_SESSION["email"] = $email;
			header('Location: account.php');
		}
	} else {
		?> <p>Wrong email or password</p> <?php
		header('Location: account.php');
	}
}

if(isset($_POST["logout"])) {
	session_destroy();
}

?>