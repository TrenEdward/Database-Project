<?php
	session_start();
	include "connectdb.php";

	$timeout = 20;

	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
		exit();
	}

	if(isset($_SESSION["last_activity"])){
		if((time() - $_SESSION["last_activity"])> $timeout){
			session_unset();
			session_destroy();
			header("Location: login.php");
			exit();
		}
	}

	$_SESSION["last_activity"] = time();
?>

<!DOCTYPE html>
<html>
<head>
<title>Home</title>
</head>
<body>

<h1>Programme GPA System</h1>
<p>Welcome:<?php echo $_SESSION["username"]; ?></p>

<p>User ID:<?php echo $_SESSION["user_id"]; ?></p>
<br>

<a href="entergrades.php">Enter Grades</a>
<br><br>

<a href="calculategpa.php">Calculate GPA</a>
<br><br>

<a href="targetgpa.php">Target GPA</a>
<br><br>

<a href="logout.php">Logout</a>

</body>
</html>