<!DOCTYPE html>
<html>
<head>
	<title>Shop</title>
	<link rel="stylesheet" type="text/css" href="/css/styles.css">
	<script type="text/javascript" src="/jquery/jquery-2.2.3.min.js"></script>
	<script type="text/javascript" src="/js/scripts.js"></script>
</head>
<body>
	<a class="topLink" href="/company/index.html">Home</a>

	<h1>Shop</h1>

	<?php
	// MySQL server connection details
	$servername = "localhost";
	$username = "webuser";
	$password = "YayWebuser16!";
	$dbname = "company";

	// Connect to MySQL server
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
	}

	// Our MySQL query
	$sql = "SELECT * FROM shop";

	// Query the server - if a query was made successfully
	if($result = mysqli_query($conn, $sql)) {

		// If there are more than 0 rows in our query results
		if(mysqli_num_rows($result) > 0) {

			// Create an HTML table with headers for each field in our DB
			echo "<table class=\"dataTable\" cellpadding=\"5\">";
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
		<input type="button" onclick="getMaxStock()" value="Query MySQL"/>
	</form>

	<div id="maxStockDiv"></div>
</body>
</html>
