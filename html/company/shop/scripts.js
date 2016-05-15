function getMaxStock() {
	var stock = $("#stockInput").val();
	$("#maxStockDiv").load("lessThanOrEqual.php", {"stock":stock} );
}

function stockChange(id, amount) {
	$("#stock" + id).load("stockChange.php", {"id":id, "amount":amount} );
}
