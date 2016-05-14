<!DOCTYPE html>
<html>
<head>
	<title>DB Query Test</title>
	<link rel="stylesheet" type="text/css" href="/styles.css">
</head>
<body>
	<script type="text/javascript" src="scripts.js"></script>

	<a href="/index.html">Home</a>

	<h1>Shop</h1>

	<?php
	// MySQL server connection details
	$servername = "localhost";
	$username = "webuser";
	$password = "YayWebuser16!";

	// Connect to MySQL server
	$conn = mysqli_connect($servername, $username, $password);

	if (!$conn) {
		exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
	}

	// Select the 'shop' DB
	mysqli_select_db($conn, "company");

	// Our MySQL query
	$sql = "SELECT * FROM shop";

	// Query the server - if a query was made successfully
	if($result = mysqli_query($conn, $sql)) {

		// If there are more than 0 rows in our query results
		if(mysqli_num_rows($result) > 0) {

			// Create an HTML table with headers for each field in our DB
			echo "<table border=\"1\" cellpadding=\"3\">";
				echo "<tr>";
					echo "<th>Item</th>";
					echo "<th>Price</th>";
					echo "<th>Stock</th>";
				echo "</tr>";

			// As long as a new row is fetched from our query results
			while($row = mysqli_fetch_array($result)) {

				// Create row in our HTML table for the DB entry
				echo "<tr>";
					echo "<td>" . $row['item'] . "</td>";
					echo "<td align=\"right\">" . $row['price'] . "</td>";
					echo "<td id=\"stock" . $row['id'] . "\">" . $row['stock'] . "</td>";
					echo "<td><button onclick=\"stockChange(" . $row['id'] . ", 1)\">+</button></td>";
					echo "<td><button onclick=\"stockChange(" . $row['id'] . ", -1)\">-</button></td>";
				echo "</tr>";
			}
			echo "</table>";

			// Free memory associated with $result
			mysqli_free_result($result);

		// Rows in query result was not greater than 0
		} else {
			echo "<p>No records matching your query were found.</p>";
		}

	// If query to server was unsuccessful
	} else {
		echo "<p>ERROR: Could not query database.</p>" . mysqli_error($conn);
	}

	// Closes MySQL server connection
	mysqli_close($conn);
	?>

	<br />
	<form name="inputForm">
		Max stock available: <input type="text" id="stockInput"/>
		<input type="button" onclick="getStockLessThanOrEqual()" value="Query MySQL"/>
	</form>

	<div id="ajaxDiv"></div>
</body>
</html>
