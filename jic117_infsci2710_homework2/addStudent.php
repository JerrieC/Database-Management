	<!DOCTYPE html>
	<html>
	<head>
		<title>add Student</title>
	</head>
	<body>
		<?php
			//Create vaibles for the connection
			$servename = "localhost";
			$username = "root";
			$password = "mysql";
			$database = "lab";

			//Create connection
			$conn = new mysqli($servename, $username, $password, $database);

			//Check connection
			if($conn->connect_error)
			{
				die("Connection failed: " . $conn->connect_error);
			}
			echo "<font color=\"red\">Connected successfully</font>";
			echo "<br><br>";
			
			//Create variables for data
			$id = $_POST["id1"];
			$name = $_POST["name1"];
			$credit = $_POST["credit1"];
			$department = $_POST["department1"];

			if ($id == "" || $name == "" || $credit == "" || $department == "")
			{
				die("Something Wrong! <a href=\"addStudent.html\">Try again!</a>");
			}
			else
			{
				$insert_sql = "insert into student values($id, '$name', '$department', $credit)";
				$result = $conn->query($insert_sql);

				if($result)
				{
					echo "Successful! <a href=\"selectStudent.php\">Check the result.</a>";
				}
				else
				{
					echo "Error: " . $conn->error . "<br>";
					echo "<a href=\"addStudent.html\">Try again!</a>";
				}
			}
			$result->free();
			mysqli_close($conn);
		?>
	</body>
	</html>