<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

if(!$conn) {
	exit('<p>Connect to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, $dbname);

// Retrieve data from query string
$user = $_GET['username'];
$pass = $_GET['password'];

// Build query
$query = "SELECT id, firstname, lastname, salary, email FROM employees WHERE username='$user' AND password=MD5('$pass')";

// Execute query
if($result = mysqli_query($conn, $query)) {
	// If there are > 0 entries returned by our query
	if(mysqli_num_rows($result) > 0) {
		// Build results string
		$disp = "<table border=\"1\" cellpadding=\"5\">";
		$disp .= "<tr>";
		$disp .= "<th>ID</th>";
		$disp .= "<th>First name</th>";
		$disp .= "<th>Last name</th>";
		$disp .= "<th>Salary</th>";
		$disp .= "<th>Email</th>";
		$disp .= "</tr>";

		// Insert a new row in the table for each database row returned
		while($row = mysqli_fetch_array($result)) {
			$disp .= "<tr>";
			$disp .= "<td>$row[id]</td>";
			$disp .= "<td>$row[firstname]</td>";
			$disp .= "<td>$row[lastname]</td>";
			$disp .= "<td>$row[salary]</td>";
			$disp .= "<td>$row[email]</td>";
			$disp .= "</tr>";
		}
	} else {
		echo "<p>Wrong username/password.</p>";
	}
} else {
	echo "<p>Error: could not query database.</p>" . mysqli_error($conn);
}

$disp .= "</table>";

//echo "Query: " . $query . "<br />";

echo $disp;
?>
