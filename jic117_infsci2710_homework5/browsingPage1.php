<!DOCTYPE html> 
<html>
<head>
	<title>call procedures</title>
</head>
<body>
	<?php
		$servername = "localhost";
		$username = "root";
		$password = "mysql";
		$database = "yelp_db";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $database);

		// Check connection
		if ($conn->connect_error) 
		{
		    die("Connection failed: " . $conn->connect_error);
		}
		echo "<font color=\"red\">Connected successfully</font>";
		echo "<br><br>";

		//get variables
		$date = $_POST["date_time_pro1"];

		if ($date == "")
		{
		 	die("Something Wrong! You should input a date value in the first blank! <a href='inputInfo1.php'>Try again!!</a>");
		}
		else
		{
			//call procedure1 by query sql
			$sql_pro1 = "CALL daily_topreview_rest('$date');";
			$result_pro1 = $conn->query($sql_pro1);

			if($result_pro1->num_rows < 1){
        		echo 'No results have been returned. ';
        		echo "<a href='inputInfo1.php'>Please try another date.</a>";
    		}

			if($result_pro1)
			{
				//echo table from result
				echo "<table border=1px>";
				$i = 1;
				//print column contents
				while($row = $result_pro1->fetch_assoc())
				{
					if($i==1)
					{
						echo "<tr>";
						foreach($row as $key=>$value)
						{
							echo "<td>$key</td>";
						}
						echo "</tr>";
					}
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						if($key=='business_id')
						{
							echo "<td><a href='detailPage.php?businessID=".$row['business_id']."'>$value</td>";
						}
						if($key=='business_name')
						{
							echo "<td>$value</td>";
						}
					}
					echo "</tr>";
					$i+=1;
				}
				echo "</table>";
			}
			else
			{
				echo "Error: " . $conn->error . "<br>";
			}
		}
		//free and close
		mysqli_close($conn);
	?>
</body>
</html>