var search = document.getElementById('search');
      var search_error = document.getElementById('search_error');
      search.addEventListener("blur", searchVerify, true);


function checkSearch() {
    
     if(search.value == '') {
        search.style.border = "1px solid red";
        search_error.textContent = "You must enter something to search";
        search.focus();
        return false;   
}
}

function searchVerify() {
    if(search.value != '') {
        search.style.border = "none";
        search_error.innerHTML ="";
        return true;
    }
}

function SaveForm() {
  var search = document.getElementById('search').value;
  localStorage.setItem('StoredSearch', search);
 
}

function load() {
  var storedValue = localStorage.getItem('StoredSearch');
  if(storedValue) {
    document.getElementById('search').value = storedValue;
  }
  
}