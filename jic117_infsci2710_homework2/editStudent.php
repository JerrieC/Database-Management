<!DOCTYPE html> 
<html>
<head>
	<title>edit Student</title>
</head>
<body>
	<?php
		echo "<p><font color=\"red\">Connected successfully</font></p>";
		$id =$_REQUEST['id'];

		echo "Edit this student whose ID is $id.";
		echo "<form action='updateStudent.php' method='POST'>";
		echo "<input type='hidden' name='id2' value='".$id."'><br>";
		echo "Name: <input type='text' name='name2'><br>";
		echo "Department:
			<select name='department2'>
				<option value='Physics'>Physics</option>
				<option value='Comp. Sci.'>Comp. Sci.</option>
				<option value='Music'>Music</option>
				<option value='Elec. Eng.'>Elec. Eng.</option>
				<option value='Biology'>Biology</option>
				<option value='History'>History</option>
				<option value='Finance'>Finance</option>
			</select><br>";
		echo "Credit: <input type='text' name='credit2'><br>"; 
		echo "<input type='submit' value='submit'>";
	?>
</body>
</html>