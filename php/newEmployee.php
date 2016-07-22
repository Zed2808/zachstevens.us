<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

// Connect to MySQL server
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
	exit('<p>Connection to MySQL database server failed: </p>' . mysqli_connect_error());
}

// Retrieve data from query string
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$firstname = $_REQUEST['firstname'];
$lastname = $_REQUEST['lastname'];
$salary = $_REQUEST['salary'];
$email = $_REQUEST['email'];

// Build query
$query = "INSERT INTO employees (username, password, firstname, lastname, salary, email) VALUES ('$username', MD5('$password'), '$firstname', '$lastname', '$salary', '$email')";

// Execute query
if($result = mysqli_query($conn, $query)) {
	echo "<p>$firstname $lastname successfully added to employee database.</p>";
} else {
	echo "<p>ERROR: could not query database.</p>" . mysqli_error($conn);
}
