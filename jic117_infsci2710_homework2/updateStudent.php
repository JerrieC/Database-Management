<!DOCTYPE html> 
<html>
<head>
	<title>edit Student</title>
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
		$id = $_POST["id2"];
		$name = $_POST["name2"];
		$credit = $_POST["credit2"];
		$department = $_POST["department2"];

		if ($name == "" || $credit =="" || $department == "")
		{
		 	die("Something Wrong! <a href='editStudent.php?id=".$id."'>Try again!!</a>");
		}
		else
		{
			//run a query
			$result = $conn->query("UPDATE student 
									SET name='$name', dept_name='$department', tot_cred=$credit
									WHERE id=$id"); 
			if($result)
			{
				echo "Successful! <a href='selectStudent.php'>Check the result.</a>";
			}
			else
			{	
				echo "Something Wrong! <a href='editStudent.php?id=".$id."'>Try again!</a>";
			}
			$result->free();
			mysql_close($conn);
		}
		?>
</body>
</html>