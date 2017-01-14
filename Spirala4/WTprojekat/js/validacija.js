

function validateUsername(username) {
    var usernamePattern = /^[a-zA-Z0-9._-]{4,20}$/;
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
        username_error.textContent = "Username must have at least 4 characters with no special characters!";
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
        password_error.textContent = "Password must have at least 4 characters with no special characters!";
        password.style.border = "1px solid red";
        password.focus();
        return false;
    }
    
    

}
/*
     function checkRegister() {
    
    var Rusername  = document.getElementById('Rusername');
    var Rpassword = document.getElementById('Rpassword');
    var Rpassword1 = document.getElementById('Rpassword1');
    var Remail = document.getElementById('Remail');
   
   var Rpassword1_error = document.getElementById('Rpassword1_error');
   var Remail_error = document.getElementById('Remail_error');
    var Rusername_error = document.getElementById('Rusername_error');
     var Rpassword_error = document.getElementById('Rpassword_error');


    
     Rusername.addEventListener("blur", username1Verify, true);
      Rpassword.addEventListener("blur", password1Verify, true);
      Rpassword1.addEventListener("blur", password2Verify, true);
      Remail.addEventListener("blur", email1Verify, true);


    if (Rusername.value == '') {
        Rusername.style.border = "1px solid red";
        Rusername_error.textContent = "Username is required!";
        Rusername.focus();
        return false;
    } else if (!validateUsername(Rusername.value)) {
        Rusername_error.textContent = "Username must have at least 4 characters!";
        Rusername.style.border = "1px solid red";
        Rusername.focus();
        return false;
    }
    if (Remail.value == '') {
        Remail.style.border = "1px solid red";
        Remail_error.textContent = "email is required!";
        Remail.focus();
        return false;
    } else if (!validateMail(Remail.value)) {
        Remail.style.border = "1px solid red";
        Remail_error.textContent = "Type valid email";
        Remail.focus();
        return false;
    }

    if (Rpassword.value == '') {
        Rpassword.style.border = "1px solid red";
        Rpassword_error.textContent = "Password is required!";
        Rpassword.focus();
        return false;
    } else if (!validateUsername(Rpassword.value)) {
        Rpassword_error.textContent = "Password must have at least 4 characters!";
        Rpassword.style.border = "1px solid red";
        Rpassword.focus();
        return false;
    }
     if (Rpassword1.value == '') {
        Rpassword1.style.border = "1px solid red";
        Rpassword1_error.textContent = "Password is required!";
        Rpassword1.focus();
        return false;
    } else if (!validateUsername(Rpassword1.value) ) {
        Rpassword1_error.textContent = "Password must have at least 4 characters!";
        Rpassword1.style.border = "1px solid red";
        Rpassword1.focus();
        return false;
    }



}



function username1Verify() {
    if (Rusername.value != '' && validateUsername(Rusername.value)) {
        Rusername.style.border = "none";
        Rusername_error.innerHTML = "";
        return true;
    }
}

function password1Verify() {
    if (Rpassword.value != '' && validateUsername(Rpassword.value)) {
        Rpassword.style.border = "none";
        Rpassword_error.innerHTML = "";
        return true;

    }
}

function email1Verify() {

    if (Remail.value != '' && validateMail(Remail.value)) {
        Remail.style.border = "none";
        Remail_error.innerHTML = "";
        return true;

    }
}
function password2Verify() {
    if (Rpassword1.value != '' && validateUsername(Rpassword1.value) && Rpassword1.value != Rpassword.value) {
        Rpassword1.style.border = "none";
        Rpassword1_error.innerHTML = "";
        return true;

    }
}



*/



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





function checkSearch() {
      var search = document.getElementById('search');
      var search_error = document.getElementById('search_error');
      search.addEventListener("blur", searchVerify, true);



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

function SaveSearch() {
  var search = document.getElementById('search').value;
  localStorage.setItem('StoredSearch', search);
 
}

/*function load() {
  var storedValue = localStorage.getItem('StoredSearch');
  if(storedValue) {
    document.getElementById('search').value = storedValue;
  }
  
}*/


    


     
      function validateMail(mail) {
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    return emailPattern.test(mail);
}

function validateName(name) {
    var namePattern = /^[a-zA-Z ]{3,30}$/;
    return namePattern.test(name);
}


function checkContact() {
   var email = document.getElementById('email');
      var name1 = document.getElementById('name1');
      var message = document.getElementById('message');

      var name_error = document.getElementById('name_error');
      var email_error = document.getElementById('email_error');
      var message_error = document.getElementById('message_error');

      
        email.addEventListener("blur", emailVerify, true);
         message.addEventListener("blur", messageVerify, true);
         name1.addEventListener("blur", nameVerify, true);


    if (name1.value == '') {
        name1.style.border = "1px solid red";
        name_error.textContent = "Your name is required!";
        name1.focus();
        return false;
    } else if (!validateName(name1.value)) {

        name1.style.border = "1px solid red";
        name_error.textContent = "Name must have at least 3 letters";
        name1.focus();
        return false;
    }
    if (email.value == '') {
        email.style.border = "1px solid red";
        email_error.textContent = "email is required!";
        email.focus();
        return false;
    } else if (!validateMail(email.value)) {
        email.style.border = "1px solid red";
        email_error.textContent = "Type valid email";
        email.focus();
        return false;
    }

    if (message.value == '') {
        message.style.border = "1px solid red";
        message_error.textContent = "Message is required!";
        message.focus();
        return false;
    }
    


}

function nameVerify() {

    if (name1.value != '' && validateName(name1.value)) {
        name1.style.border = "none";
        name_error.innerHTML = "";
        return true;

    }
}

function emailVerify() {

    if (email.value != '' && validateMail(email.value)) {
        email.style.border = "none";
        email_error.innerHTML = "";
        return true;

    }
}

function messageVerify() {
    
     if(message.value != '') {
        message.style.border = "none";
        message_error.innerHTML = "";
        return true;

    }
}


function SaveContact() {
  var name1 = document.getElementById('name1').value;
  localStorage.setItem('StoredName', name1);
  var email = document.getElementById('email').value;
  localStorage.setItem('StoredEmail', email);
  var message = document.getElementById('message').value;
  localStorage.setItem('StoredMessage', message);
}


function load() {



  var storedUsername= localStorage.getItem('StoredUsername');
  var storedPassword = localStorage.getItem('StoredPassword');
  var storedSearch = localStorage.getItem('StoredSearch');
   var storedName = localStorage.getItem('StoredName');
  var storedEmail = localStorage.getItem('StoredEmail');
    var storedMessage = localStorage.getItem('StoredMessage');
  if(storedUsername && document.getElementById('username')!=null) {
    document.getElementById('username').value = storedUsername;
  }
  if(storedPassword && document.getElementById('password')!=null) {
    document.getElementById('password').value = storedPassword;
}
   
  if(storedName &&  document.getElementById('name1')!=null) {
    document.getElementById('name1').value = storedName;
  }
  if(storedEmail && document.getElementById('email')!=null) {
    document.getElementById('email').value = storedEmail;
  }
  if(storedMessage && document.getElementById('message')!=null) {
    document.getElementById('message').value = storedMessage;
  }


   
  if(storedSearch && document.getElementById('search')!=null) {
    document.getElementById('search').value = storedSearch;
  }
  
}
/*function load() {
  var storedValue = localStorage.getItem('StoredName');
  var storedValue1 = localStorage.getItem('StoredEmail');
    var storedValue2 = localStorage.getItem('StoredMessage');
  if(storedValue) {
    document.getElementById('name1').value = storedValue;
  }
  if(storedValue1) {
    document.getElementById('email').value = storedValue1;
  }
  if(storedValue2) {
    document.getElementById('message').value = storedValue2;
  }
}*/