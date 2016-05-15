<?php
$servername = "localhost";
$username = "webuser";
$password = "YayWebuser16!";
$dbname = "company";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
	exit("<p>Connection to MySQL database server failed: </p>" . mysqli_connect_error($conn));
}

$column = $_REQUEST['column'];
$order = $_REQUEST['order'];

$query = "SELECT id, username, firstname, lastname, salary, email FROM employees ORDER BY $column $order";

if($result = mysqli_query($conn, $query)) {
	if(mysqli_num_rows($result) > 0) {
		$disp = "<table border=\"1\" cellpadding=\"3\">";
			$disp .= "<tr>";
				$disp .= "<th>ID <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('id', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('id', 'DESC')\" value=\"↑\"/></th>";
				$disp .= "<th>Username <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('username', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('username', 'DESC')\" value=\"↑\"/></th>";
				$disp .= "<th>First name <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('firstname', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('firstname', 'DESC')\" value=\"↑\"/></th>";
				$disp .= "<th>Last name <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('lastname', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('lastname', 'DESC')\" value=\"↑\"/></th>";
				$disp .= "<th>Salary <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('salary', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('salary', 'DESC')\" value=\"↑\"/></th>";
				$disp .= "<th>Email <input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('email', 'ASC')\" value=\"↓\"/><input class=\"sortButton\" type=\"button\" onclick=\"sortEmployees('email', 'DESC')\" value=\"↑\"/></th>";
			$disp .= "</tr>";

		while($row = mysqli_fetch_array($result)) {
			$disp .= "<tr>";
				$disp .= "<td>" . $row['id'] . "</td>";
				$disp .= "<td>" . $row['username'] . "</td>";
				$disp .= "<td>" . $row['firstname'] . "</td>";
				$disp .= "<td>" . $row['lastname'] . "</td>";
				$disp .= "<td>$" . $row['salary'] . "</td>";
				$disp .= "<td>" . $row['email'] . "</td>";
			$disp .= "</tr>";
		}

		$disp .= "</table>";

		mysqli_free_result($result);
	} else {
		$disp = "<p>Query returned 0 results.</p>";
	}
} else {
	$disp = "<p>ERROR: Could not query database: </p>" . mysqli_error($conn);
}

echo $disp;
