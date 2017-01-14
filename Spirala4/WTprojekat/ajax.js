function osvjezi(query) {
	var request = new XMLHttpRequest();

	request.onreadystatechange = function() {
		if (request.readyState == 4 && request.status == 200) {
			console.log(request.responseText);
		}
	};

	request.open('GET', 'search.php?query=' + query, true);
	request.send();

	// OSVJEZI LISTU U HTML-u
}

var input = document.getElementById('search');

input.addEventListener('keydown', function() {
	osvjezi(input.value);
});