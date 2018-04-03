<!DOCTYPE html> 
<html>
<head>
	<title>detail page</title>
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
		$businessId = $_REQUEST["businessID"];

		if ($businessId == "")
		{
		 	die("Something Wrong! The value of businessId is blank. <a href='browsingPage.php'>Try again!!</a>");
		}
		else
		{
			$sql_detail1 = "SELECT * FROM business WHERE id = '$businessId'";
			$result_detail1 = $conn->query($sql_detail1);
			if($result_detail1)
			{
				//echo table from result
				echo "<table border=1px>";
				$i = 1;
				while($row = $result_detail1->fetch_assoc())
				{
					if($i==1)
					{
						echo "<tr>";
						foreach($row as $key=>$value)
						{
							//print column names
							echo "<td>$key</td>";
						}
						echo "</tr>";
					}
					echo "<tr>";
					foreach($row as $key=>$value)
					{
						echo "<td>$value</td>";
					}
					echo "</tr>";
					$i+=1;
				}
				echo "</table>";
			}
		}
	?>
</body>
</html>