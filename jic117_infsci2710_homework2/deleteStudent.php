<!DOCTYPE html> 
<html>
<head>
	<title>delete Student</title>
</head>
<body>
	<?php
		$servename = "localhost";
		$username = "root";
		$password = "mysql";
		$database = "lab";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		} 
		echo "<font color=\"red\">Connected successfully</font>";
		echo "<br><br>";

		$id =$_REQUEST['id'];

		//run a query
		$whole_result = $conn->query("delete from student where id=$id");
		if($whole_result)
		{
			echo "Successful! <a href=\"selectStudent.php\">Check the result.</a>";
		}
		else
		{
			echo "Something Wrong! <a href=\"selectStudent.php\">Try again!</a>";
		}
		$whole_result->free();
		mysqli_close($conn);
	?>

</body>
</html>