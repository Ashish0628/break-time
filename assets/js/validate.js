
function validateSubmit(){
 
const form = document.getElementById('form');
const username = document.getElementById('username');
const name = document.getElementById('name');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');
const mobile = document.getElementById('mobile');
const msg =document.getElementById('msg');


var sub=false;
  

checkInputs();
 

      $( "#loading" ).slideDown();
      $( "#loading" ).slideUp();

function checkInputs() {
    // trim to remove the whitespaces
    const usernameValue = username.value.trim();
    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const password2Value = password2.value.trim();
    const mobileValue = mobile.value.trim();
    
    flag=0;
    if(usernameValue === '') {
        setErrorFor(username, 'Username cannot be blank');
        flag=1;
    } else {
        setSuccessFor(username);
    }
    if(name.value === '') {
        setErrorFor(name, 'Name cannot be blank');
        flag=1;
    } else {
        setSuccessFor(name);
    }
    if(emailValue === '') {
        setErrorFor(email, 'Email cannot be blank');
        flag=1;
    } else if (!isEmail(emailValue)) {
        setErrorFor(email, 'Not a valid email');
        flag=1;
    } else {
        setSuccessFor(email);
    }
    if(passwordValue === '') {
        setErrorFor(password, 'Password cannot be blank');
        flag=1;
    } else {
        setSuccessFor(password);
    }
    
    if(password2Value === '') {
        setErrorFor(password2, 'Password2 cannot be blank');
    } else if(passwordValue !== password2Value) {
        setErrorFor(password2, 'Passwords does not match');
        flag=1;
    } else{
        setSuccessFor(password2);
    }

    if(mobileValue ==='') {
        setErrorFor(mobile, 'Mobile Number cannot be blank');
        flag=1;
    }
     else
    if(mobileValue.length!=10) {
        setErrorFor(mobile, 'Enter a valid Mobile Number ');
        flag=1;
    }else
    {
        setSuccessFor(mobile);
    }
    if(flag === 0)
    {
        sub=true;
        document.getElementById("register").style.backgroundColor = "lightblue";
        document.getElementById("msg").innerText="User Registered Successfully!";
        
    }

}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = 'form-row error';
    small.innerText = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = 'form-row success';
}
    
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

return sub;
}