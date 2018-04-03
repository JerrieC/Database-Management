<!DOCTYPE html> 
<html>
<head>
	<title>call procedures</title>
</head>
<body>
	<?php
		echo "<font color=\"red\">Connected successfully</font>";
		echo "<br><br>";
		echo "<form action='browsingPage3.php' method='POST'>";
		//after submit, the page will jump to resultPage.php
		echo "Please input a keyword to search the business.<br><br>";
		echo "Keyword: <input type='text' name='key_word_search'><br><br>";
		echo "<input type='submit' value='submit'>";
	?>
</body>
</html>
