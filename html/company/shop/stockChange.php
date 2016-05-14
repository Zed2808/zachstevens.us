<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
	exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, $dbname);

// Retrieve data from query string
$id = $_GET['id'];
$amount = $_GET['amount'];

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
