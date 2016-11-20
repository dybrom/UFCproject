function Prikazi(x) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200)
            document.getElementById("content-field").innerHTML = ajax.responseText;
        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("content-field").innerHTML = "Greska: nepoznat URL";
    }
    ajax.open("GET", x, true);
    ajax.send();
}

window.onload = Prikazi.bind(this, "ajax/Index.html")