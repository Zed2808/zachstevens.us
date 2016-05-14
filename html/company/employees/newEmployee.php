<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password);

if(!$conn) {
	exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Select database
mysqli_select_db($conn, $dbname);

// Retrieve data from query string
$username = $_GET['username'];
$password = $_GET['password'];
$firstname = $_GET['firstname'];
$lastname = $_GET['lastname'];
$email = $_GET['email'];

// Build query
$query = "INSERT INTO employees (username, password, firstname, lastname, email) VALUES ('$username', MD5('$password'), '$firstname', '$lastname', '$email')";

// Execute query
if($result = mysqli_query($conn, $query)) {
	echo "<p>$firstname $lastname successfully added to employee database.</p>";
} else {
	echo "<p>ERROR: could not query database.</p>" . mysqli_error($conn);
}
