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
		$city = $_POST["city_name_pro2"];

		if ($city == "")
		{
		 	die("Something Wrong! You should fill a key word in the blank! <a href='inputInfo2.php'>Try again!!</a>");
		}
		else
		{
			//call procedure1 by query sql
			$sql_pro2 = "CALL city_wifi_coffee('$city');";

			$result_pro2 = $conn->query($sql_pro2);

			if($result_pro2->num_rows < 1){
        		echo "No results have been returned.";
        		echo "<a href='inputInfo2.php'>Please try another city.</a>";
    		}

			if($result_pro2)
			{
				//echo table from result
				echo "<table border=1px>";
				//print column names
				$i=1;
				while($row = $result_pro2->fetch_assoc())
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