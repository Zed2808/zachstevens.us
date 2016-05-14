<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "shop";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
	exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, $dbname);

// Retrieve data from query string
$stock = $_GET['stock'];

// Build query
$query = "SELECT * FROM shop WHERE stock <= '$stock'";

// Execute query
$result = mysqli_query($conn, $query);

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

//echo "Query: " . $query . "<br />";
$display_string .= "</table>";

echo $display_string;
?>
