<?php
include "connectdb.php";

	$username = "";
	$password = "";
	$errors = [];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = $_POST["username"];
	$password = $_POST["password"];

	if(empty($username)){
			$errors[] = "Username is required";
		}
		if(empty($password)){
			$errors[] = "Password is required";
		}
		if(empty($errors)){
		$password = password_hash($password, PASSWORD_DEFAULT);

		$stmt = $conn->prepare("INSERT INTO system_user (username, password_hash) VALUES (?, ?)");
		$stmt->bind_param("ss", $username, $password);
		if($stmt->execute()){
			echo "Account Created";
		}else{
			echo "Error Creating Account";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Signup</title>
</head>
<body>

<h1>Create Account</h1>

<form action="signup.php" method="POST">
	<label>Username:</label><br>
	<input type="text" name="username"
	value="<?php echo $username; ?>">
	<br><br>

	<label>Password:</label><br>
	<input type="password" name="password">
	<br><br>

	<button type="submit">Signup</button>
</form>
<br>

<a href="login.php">Login</a>

</body>
</html>