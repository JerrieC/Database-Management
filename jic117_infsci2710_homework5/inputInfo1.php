<!DOCTYPE html> 
<html>
<head>
	<title>call procedures</title>
</head>
<body>
	<?php
		echo "<br><br>";
		echo "<form action='browsingPage1.php' method='POST'>";
		//after submit, the page will jump to browsingPage.php
		echo "Find top 10 restaurants which got the most reviews in a given date.<br><br>";
		echo "Please input a date in a format of 'yyyy-mm-dd'.<br><br>";
		echo "Date: <input type='text' name='date_time_pro1'><br><br>";
		echo "<input type='submit' value='submit'>";
	?>
</body>
</html>