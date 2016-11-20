		


		 
      var email = document.getElementById('email');
      var name1 = document.getElementById('name1');
      var message = document.getElementById('message');

      var name_error = document.getElementById('name_error');
      var email_error = document.getElementById('email_error');
      var message_error = document.getElementById('message_error');

      
        email.addEventListener("blur", emailVerify, true);
         message.addEventListener("blur", messageVerify, true);
         name1.addEventListener("blur", nameVerify, true);


function checkContact() {


    if(name1.value == '') {
        name1.style.border = "1px solid red";
        name_error.textContent = "Your name is required!";
        name1.focus();
        return false;
    }
      if(email.value == '') {
        email.style.border = "1px solid red";
        email_error.textContent = "email is required!";
        email.focus();
        return false;
    }

      if(message.value == '') {
        message.style.border = "1px solid red";
        message_error.textContent = "Message is required!";
        message.focus();
        return false;
    }
    


}

function nameVerify() {
    
     if(name1.value != '') {
        name1.style.border = "none";
        name_error.innerHTML ="";
        return true;

    }
}

function emailVerify() {
    
     if(email.value != '') {
        email.style.border = "none";
        email_error.innerHTML ="";
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


function SaveForm() {
  var name1 = document.getElementById('name1').value;
  localStorage.setItem('StoredName', name1);
  var email = document.getElementById('email').value;
  localStorage.setItem('StoredEmail', email);
  var message = document.getElementById('message').value;
  localStorage.setItem('StoredMessage', message);
}

function load() {
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
}