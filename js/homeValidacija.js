
function validateUsername(username) {
    var usernamePattern = /^[a-zA-Z0-9._-]{6,20}$/;
    return usernamePattern.test(username);
}


      function checkLogin() {

    var username = document.getElementById('username');
    var password = document.getElementById('password');

    var username_error = document.getElementById('username_error');
     var password_error = document.getElementById('password_error');

     username.addEventListener("blur", usernameVerify, true);
      password.addEventListener("blur", passwordVerify, true);

    if (username.value == '') {
        username.style.border = "1px solid red";
        username_error.textContent = "Username is required!";
        username.focus();
        return false;
    } else if (!validateUsername(username.value)) {
        username_error.textContent = "Username must have at least 6 characters!";
        username.style.border = "1px solid red";
        username.focus();
        return false;
    }
    if (password.value == '') {
        password.style.border = "1px solid red";
        password_error.textContent = "Password is required!";
        password.focus();
        return false;
    } else if (!validateUsername(password.value)) {
        password_error.textContent = "Password must have at least 6 characters!";
        password.style.border = "1px solid red";
        password.focus();
        return false;
    }
    
    

}

function usernameVerify() {
    if (username.value != '' && validateUsername(username.value)) {
        username.style.border = "none";
        username_error.innerHTML = "";
        return true;
    }
}

function passwordVerify() {
    if (password.value != '' && validateUsername(password.value)) {
        password.style.border = "none";
        password_error.innerHTML = "";
        return true;

    }
}

function SaveForm() {
  var username = document.getElementById('username').value;
  localStorage.setItem('StoredUsername', username);
  var password = document.getElementById('password').value;
  localStorage.setItem('StoredPassword', password);
}

/*function load() {
  var storedValue = localStorage.getItem('StoredUsername');
  var storedValue1 = localStorage.getItem('StoredPassword');
  if(storedValue) {
    document.getElementById('username').value = storedValue;
  }
  if(storedValue1) {
    document.getElementById('password').value = storedValue1;
  }
}*/