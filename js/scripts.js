function getMaxStock() {
	var stock = $("#stockInput").val();
	$("#maxStockDiv").load("/php/lessThanOrEqual.php", {"stock":stock} );
}

function stockChange(id, amount) {
	$("#stock" + id).load("/php/stockChange.php", {"id":id, "amount":amount} );
}

function getEmployee() {
	var username = $("#username").val();
	var password = $("#password").val();
	$("#employeeTable").load("/php/getEmployee.php", {"username":username, "password":password} );
}

function newEmployee() {
	var firstname = $("#firstname").val();
	var lastname = $("#lastname").val();
	var password = $("#password").val();
	var salary = $("#salary").val();
	var username = firstname.toLowerCase() + lastname.toLowerCase();
	var email = username + "@example.com";
	$("#newEmployeeResult").load("/php/newEmployee.php", {"firstname":firstname, "lastname":lastname, "username":username, "password":password, "salary":salary, "email":email} );
}

function sortEmployees(column, order) {
	$("#employeeTable").load("/php/sortEmployees.php", {"column":column, "order":order} );
}