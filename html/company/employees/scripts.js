function getEmployee() {
	var ajaxRequest;

	try {
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch(e) {
		// Internet Explorer
		try {
			ajaxRequest = new ActiveXObject("Msxm12.XMLHTTP");
		} catch(e) {
			try {
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				// Something went wrong
				alert("Your browser is not supported.");
				return false;
			}
		}
	}

	// Create function that will receive data sent from the server and
	// will update div section on the same page
	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.getElementById('employeeTable');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}

	// Now get the value from user and pass it to server script
	var username = document.getElementById('username').value;
	var password = document.getElementById('password').value;
	var queryString = "?username=" + username + "&password=" + password;

	ajaxRequest.open("GET", "getEmployee.php" + queryString, true);
	ajaxRequest.send(null);
}

function newEmployee() {
	var ajaxRequest;

	try {
		// Opera 8.0+, Firefox, Safari
		ajaxRequest = new XMLHttpRequest();
	} catch(e) {
		// Internet Explorer
		try {
			ajaxRequest = new ActiveXObject("Msxm12.XMLHTTP");
		} catch(e) {
			try {
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch (e) {
				// Something went wrong
				alert("Your browser is not supported.");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.getElementById('newEmployeeResult');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}

	var firstname = document.getElementById('firstname').value;
	var lastname = document.getElementById('lastname').value;
	var password = document.getElementById('password').value;
	var salary = document.getElementById('salary').value;
	var queryString = "?firstname=" + firstname;
	queryString += "&lastname=" + lastname;
	queryString += "&username=" + firstname + lastname;
	queryString += "&password=" + password;
	queryString += "&salary=" + salary;
	queryString += "&email=" + firstname.toLowerCase() + lastname.toLowerCase() + "@example.com";

	ajaxRequest.open("GET", "newEmployee.php" + queryString, true);
	ajaxRequest.send(null);
}
