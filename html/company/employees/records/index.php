<!DOCTYPE html>
<html>
<head>
	<title>Employee records</title>
	<link rel="stylesheet" type="text/css" href="/styles.css">
	<script type="text/javascript" src="/jquery/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
	<a href="/index.html">Home</a>

	<h1>Employee records</h1>

	<?php
	$servername = "localhost";
	$username = "webuser";
	$password = "YayWebuser16!";
	$dbname = "company";

	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if(!$conn) {
		exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
	}

	$query = "SELECT id, username, firstname, lastname, salary, email FROM employees";

	echo "<div id=\"employeeTable\">";

	if($result = mysqli_query($conn, $query)) {
		if(mysqli_num_rows($result) > 0) {
			echo "<table border=\"1\" cellpadding=\"3\">";
				echo "<tr>";
					echo "<th>ID <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('id', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('id', 'DESC')\" value=\"↑\"/></th>";
					echo "<th>Username <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('username', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('username', 'DESC')\" value=\"↑\"/></th>";
					echo "<th>First name <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('firstname', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('fistname', 'DESC')\" value=\"↑\"/></th>";
					echo "<th>Last name <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('lastname', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('lastname', 'DESC')\" value=\"↑\"/></th>";
					echo "<th>Salary <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('salary', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('salary', 'DESC')\" value=\"↑\"/></th>";
					echo "<th>Email <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('email', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('email', 'DESC')\" value=\"↑\"/></th>";
				echo "</tr>";

			while($row = mysqli_fetch_array($result)) {
				echo "<tr>";
					echo "<td>" . $row['id'] . "</td>";
					echo "<td>" . $row['username'] . "</td>";
					echo "<td>" . $row['firstname'] . "</td>";
					echo "<td>" . $row['lastname'] . "</td>";
					echo "<td align=\"right\">$" . $row['salary'] . "</td>";
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

	echo "</div>";

	mysqli_close($conn);
	?>

	<br />
	<a href="/company/employees/newemployee.html">Add new employee</a>
</body>
</html>
