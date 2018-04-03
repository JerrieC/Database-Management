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
		$keyword = $_POST["key_word_search"];

		if ($keyword == "")
		{
		 	die("Something Wrong! You should input a date value in the first blank! <a href='search.php'>Try again!!</a>");
		}
		else
		{
			//call procedure1 by query sql
			$sql_search = "CALL key_word_business('$keyword');";
			$result_search = $conn->query($sql_search);

			if($result_search->num_rows < 1){
        		echo 'No results have been returned. ';
        		echo "<a href='search.php'>Please try another keyword.</a>";
    		}

			if($result_search)
			{
				//echo table from result
				echo "<table border=1px>";
				$i = 1;
				//print column contents
				while($row = $result_search->fetch_assoc())
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