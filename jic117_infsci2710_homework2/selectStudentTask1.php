<!DOCTYPE html> 
<html>
<head>
	<title>select Student</title>
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

		//run a query
		$whole_result = $conn->query("select * from student");

		//check result from query
		if ($whole_result)
		{
			echo "<table border=1px>";
			while($row = $whole_result->fetch_assoc())
			{
				echo "<tr>";
				foreach($row as $key=>$value) 
				{
					echo "<td>$value</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
			echo "<br>";

			$total_number = mysqli_num_rows($whole_result);

			echo "The total number of students are ".$total_number;
		}
		echo "<br><br>";

		//run the second query
		$average_grade = $conn->query("select avg(tot_cred) as average from student");

		if($average_grade)
		{
			$average_number = $average_grade->fetch_assoc();
			echo "The average grade of students are ".$average_number['average'];
		}
		//free and close
		$whole_result->free();
		$average_grade->free();
		mysqli_close($conn);
	?>
</body>
</html>