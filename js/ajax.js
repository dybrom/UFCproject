


function Prikazi(x) {
    var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function() {
        if (ajax.readyState == 4 && ajax.status == 200){

            document.getElementById("content").innerHTML = ajax.responseText;
            var sc = document.createElement("script");
			sc.src="js/validacija.js";
  			document.getElementsByTagName("head")[0].appendChild(sc);
  			load();
            var sc1 = document.createElement("script");
            sc1.src="js/carousel.js";
            document.getElementsByTagName("head")[0].appendChild(sc1);
          
}

        if (ajax.readyState == 4 && ajax.status == 404)
            document.getElementById("content").innerHTML = "Greska: nepoznat URL";
    }


    ajax.open("GET", x, true);
    ajax.send();
    delete sc;
}

window.onload = Prikazi.bind(this, "ajax/Start.html")
