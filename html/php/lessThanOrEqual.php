<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Retrieve data from query string
$stock = $_REQUEST['stock'];

// Build query
$query = "SELECT * FROM shop WHERE stock <= '$stock'";

// Execute query
if($result = mysqli_query($conn, $query)) {
	if(mysqli_num_rows($result) > 0) {
		// Build result string
		$display_string = "<table border=\"1\" cellpadding=\"3\">";
		$display_string .= "<tr>";
		$display_string .= "<th>Item</th>";
		$display_string .= "<th>Price</th>";
		$display_string .= "<th>Stock</th>";
		$display_string .= "</tr>";

		// Insert a new row in the table for each product returned
		while($row = mysqli_fetch_array($result)) {
			$display_string .= "<tr>";
			$display_string .= "<td>$row[item]</td>";
			$display_string .= "<td>$row[price]</td>";
			$display_string .= "<td>$row[stock]</td>";
			$display_string .= "</tr>";
		}

		$display_string .= "</table>";
	} else {
		$display_string = "<p>Query returned 0 results.</p>";
	}
} else {
	$display_string = "<p>ERROR: Could not query database.</p>" . mysqli_error($conn);
}

echo $display_string;
?>
