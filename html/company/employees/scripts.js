function getEmployee() {
	var username = $("#username").val();
	var password = $("#password").val();
	$("#employeeTable").load("getEmployee.php", {"username":username, "password":password} );
}

function newEmployee() {
	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var password = $("#password").val();
	var salary = $("#salary").val();
	var username = firstname.toLowerCase() + lastname.toLowerCase();
	var email = username + "@example.com";
	$("#newEmployeeResult").load("newEmployee.php", {"firstname":firstname, "lastname":lastname, "username":username, "password":password, "salary":salary, "email":email} );
}
