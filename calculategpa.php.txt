<?php
	session_start();
	include "connectdb.php";

	if(!isset($_SESSION["user_id"])){
	    header("Location: login.php");
		exit();
	}

	$student_id = "";
	$course_id = "";
	$semester = "";
	$academic_year = "";
	$grade_letter = "";

	$errors = [];

	if($_SERVER["REQUEST_METHOD"] == "POST"){
		$student_id = $_POST["student_id"];
		$course_id = $_POST["course_id"];
		$semester = $_POST["semester"];
		$academic_year = $_POST["academic_year"];
		$grade_letter = $_POST["grade_letter"];

	if(empty($student_id)){
		$errors[] = "Student ID Required";
	}

	if(empty($course_id)){
		$errors[] = "Course ID Required";
	}

	if(empty($grade_letter)){
		$errors[] = "Grade Required";
	}

	if(empty($errors)){

		$stmt = $conn->prepare("INSERT INTO enrollment(student_id, course_id, semster,academic_year, grade_letter)VALUES (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss",$student_id,$course_id,$semester,$academic_year,$grade_letter);

	if($stmt->execute()){
		echo "Grade Added Successfully";
		}else{
		    echo "Error Adding Grade";
			}
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Enter Grades</title>
</head>
<body>

<h2>Enter Grades</h2>

<p>Logged In:<?php echo $_SESSION["username"]; ?></p>

<form action="entergrades.php" method="POST">
	<label>Student ID:</label><br>
	<input type="text" name="student_id">
	<br><br>

	<label>Course ID:</label><br>
	<input type="text" name="course_id">
	<br><br>

	<label>Semester:</label><br>
	<input type="text" name="semester">
	<br><br>

	<label>Academic Year:</label><br>
	<input type="text" name="academic_year">
	<br><br>

	<label>Grade:</label><br>
	<input type="text" name="grade_letter">
	<br><br>

	<button type="submit">Add Grade</button>
</form>
<br>

<a href="home.php">Back Home</a>

</body>
</html>