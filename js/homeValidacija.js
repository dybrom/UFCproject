
    var username = document.getElementById('username');
    var password = document.getElementById('password');

    var username_error = document.getElementById('username_error');
     var password_error = document.getElementById('password_error');

     username.addEventListener("blur", usernameVerify, true);
      password.addEventListener("blur", passwordVerify, true);

      function checkLogin() {


    if(username.value == '') {
        username.style.border = "1px solid red";
        username_error.textContent = "Username is required!";
        username.focus();
        return false;
    }
      if(password.value == '') {
        password.style.border = "1px solid red";
        password_error.textContent = "Password is required!";
        password.focus();
        return false;
    }
    
    

}

function usernameVerify() {
    if(username.value != '') {
        username.style.border = "none";
        username_error.innerHTML ="";
        return true;

    }
}

function passwordVerify() {
    
     if(password.value != '') {
        password.style.border = "none";
        password_error.innerHTML ="";
        return true;

    }
}

function SaveForm() {
  var username = document.getElementById('username').value;
  localStorage.setItem('StoredUsername', username);
  var password = document.getElementById('password').value;
  localStorage.setItem('StoredPassword', password);
}

function load() {
  var storedValue = localStorage.getItem('StoredUsername');
  var storedValue1 = localStorage.getItem('StoredPassword');
  if(storedValue) {
    document.getElementById('username').value = storedValue;
  }
  if(storedValue1) {
    document.getElementById('password').value = storedValue1;
  }
}