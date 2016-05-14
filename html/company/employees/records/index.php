<!DOCTYPE html>
<html>
<head>
	<title>Employee records</title>
	<link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
	<a href="/index.html">Home</a>

	<h1>Employee records</h1>

	<?php
	$servername = "localhost";
	$username = "webuser";
	$password = "YayWebuser16!";
	$dbname = "company";

	$conn = mysqli_connect($servername, $username, $password);

	if(!$conn) {
		exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
	}

	mysqli_select_db($conn, $dbname);

	$query = "SELECT * FROM employees";

	if($result = mysqli_query($conn, $query)) {
		if(mysqli_num_rows($result) > 0) {
			echo "<table border=\"1\" cellpadding=\"3\">";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Username</th>";
					echo "<th>First name</th>";
					echo "<th>Last name</th>";
					echo "<th>Salary</th>";
					echo "<th>Email</th>";
				echo "</tr>";

			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['firstname'] . "</td>";
					echo "<td>" . $row['lastname'] . "</td>";
					echo "<td>$" . $row['salary'] . "</td>";
					echo "<td>" . $row['email'] . "</td>";
				echo "</tr>";
			}

			echo "</table>";

			mysqli_free_result($result);
		} else {
			echo "<p>Query returned 0 results.</p>";
		}
	} else {
		echo "<p>ERROR: Could not query database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	?>

	<br />
	<a href="/company/employees/newemployee.html">Add new employee</a>
</body>
</html>