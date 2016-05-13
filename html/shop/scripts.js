function getStockLessThanOrEqual() {
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
			} catch(e) {
				// Something went wrong
				alert("Your browser is not supported.");
				return false;
			}
		}
	}

	// Create a function that will receive data sent from the server and
	// will update div section in the same page
	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.getElementById('ajaxDiv');
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}

	// Now get the value from user and pass it to server script
	var stock = document.getElementById('stockInput').value;
	var queryString = "?stock=" + stock;
	ajaxRequest.open("GET", "lessThanOrEqual.php" + queryString, true);
	ajaxRequest.send(null);
}

function stockChange(id, amount) {
	var ajaxRequest;

	try {
		ajaxRequest = new XMLHttpRequest();
	} catch(e) {
		try {
			ajaxRequest = new ActiveXObject("Msxm12.XMLHTTP");
		} catch(e) {
			try {
				ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
			} catch(e) {
				alert("Your browser is not supported.");
				return false;
			}
		}
	}

	ajaxRequest.onreadystatechange = function() {
		if(ajaxRequest.readyState == 4) {
			var ajaxDisplay = document.getElementById('stock' + id);
			ajaxDisplay.innerHTML = ajaxRequest.responseText;
		}
	}

	var queryString = "?id=" + id + "&amount=" + amount;
	ajaxRequest.open("GET", "stockChange.php" + queryString, true);
	ajaxRequest.send(null);
}
