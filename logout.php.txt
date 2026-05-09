<?php
	session_start();
	include "connectdb.php";

	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
		exit();
	}

	$current_gpa = "";
	$target_gpa = "";
	$credits = "";

	$resultMessage = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$current_gpa = $_POST["current_gpa"];
		$target_gpa = $_POST["target_gpa"];
		$credits = $_POST["credits"];

	if(
	    $current_gpa != "" &&
		$target_gpa != "" &&
		$credits != ""){

	if($target_gpa > $current_gpa){
		$resultMessage =
		"You need higher grades to reach your target GPA";

		}else{
			$resultMessage =
			"Target GPA already reached";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Target GPA</title>
</head>
<body>

<h2>Target GPA Calculator</h2>

<p>Logged In:<?php echo $_SESSION["username"]; ?></p>

<form action="targetgpa.php" method="POST">

	<label>Current GPA:</label><br>
	<input type="text"name="current_gpa">
	<br><br>

	<label>Target GPA:</label><br>
	<input type="text" name="target_gpa">
	<br><br>

	<label>Credits Remaining:</label><br>
	<input type="text" name="credits">
	<br><br>

	<button type="submit">Check GPA</button>
</form>
<br>

<?php
	if($resultMessage != ""){
		echo "<h3>".$resultMessage."</h3>";
	}
?>

<br>
<a href="home.php">Back Home</a>

</body>
</html>