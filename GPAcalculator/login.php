<?php
session_start();
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
		$stmt = $conn->prepare("SELECT * FROM system_user WHERE username = ?");
		$stmt->bind_param("s", $username);
		$stmt->execute();
        
        $result = $stmt->get_result();

	if($result->num_rows > 0){
		$row = $result->fetch_assoc();

	if(password_verify($password,$row["password_hash"])){
		
        echo "<p>Login Successful</p>";

		$_SESSION["user_id"] =
		$row["user_id"];

		$_SESSION["username"] =
		$row["username"];

		header("Location: home.php");

		}else{
            $errors[] =
			    "Incorrect Password";
			}
		}else{
			$errors[] =
			    "No Account Found";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h2>Login</h2>

<form method="POST" action="">
	<label>Username:</label><br>
	<input type="text" name="username" value="<?php echo $username; ?>">
	<br><br>

	<label>Password:</label><br>
	<input type="password"name="password">
	<br><br>

	<button type="submit">Login</button>
</form>
<br>

<a href="signup.php">Create Account</a>

</body>
</html>