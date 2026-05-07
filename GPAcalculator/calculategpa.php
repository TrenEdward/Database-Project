<?php
	session_start();
	include "connectdb.php";

	if(!isset($_SESSION["user_id"])){
		header("Location: login.php");
		exit();
	}

	$student_id = "";
	$gpa = "";

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$student_id = $_POST["student_id"];

		$stmt = $conn->prepare("SELECT AVG(g.grade_point) AS gpa FROM enrollment eJOIN grade g ON e.grade_letter = g.grade_letter WHERE e.student_id = ?");
		$stmt->bind_param("s", $student_id);
		$stmt->execute();
		$result = $stmt->get_result();
		$row = $result->fetch_assoc();
		$gpa = round($row["gpa"], 2);
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Calculate GPA</title>
</head>
<body>

<h2>Calculate GPA</h2>

<p>Logged In:<?php echo $_SESSION["username"]; ?></p>

<form action="calculategpa.php" method="POST">
	<label>Student ID:</label><br>
	<input type="text" name="student_id">
	<br><br>

	<button type="submit">Calculate GPA</button>
</form>
<br>

<?php
	if($gpa != ""){
	    echo "<h3>GPA: ".$gpa."</h3>";
	}
?>

<br>
<a href="home.php">Back Home</a>

</body>
</html>