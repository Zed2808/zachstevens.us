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
$id = $_REQUEST['id'];
$amount = $_REQUEST['amount'];

// Build and execute stock update query
$query = "UPDATE shop SET stock = GREATEST(0, stock + $amount) WHERE id = $id";
mysqli_query($conn, $query);

// Build and execute query to get new stock
$query = "SELECT stock FROM shop WHERE id = $id";
if($result = mysqli_query($conn, $query)) {
	if($value = mysqli_fetch_object($result)) {
		$display_string = $value->stock;
	}

	mysqli_free_result($result);
}

echo $display_string;
?>
