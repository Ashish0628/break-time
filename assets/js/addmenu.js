
function validateSubmit(){
 
const form = document.getElementById('form');
const dish = document.getElementById('dish');
const type = document.getElementById('type');
const price = document.getElementById('price');
const msg =document.getElementById('msg');


var sub=false;
  

checkInputs();
 

      $( "#loading" ).slideDown();
      $( "#loading" ).slideUp();

function checkInputs() {
    // trim to remove the whitespaces
    const dishValue = dish.value;
    const typeValue = type.value.trim();
    const priceValue = price.value.trim();
    
    flag=0;
    if(dishValue === '') {
        setErrorFor(dish, 'Dish cannot be blank');
        flag=1;
    } else {
        setSuccessFor(dish);
    }
    if(typeValue === '') {
        setErrorFor(type, 'Type cannot be blank');
        flag=1;
    } 
    else {
        setSuccessFor(type);
    }
    if(priceValue === '') {
        setErrorFor(price, 'Price cannot be blank');
        flag=1;
    } 
    else {
        setSuccessFor(price);
    }
    if(flag === 0)
    {
        sub=true;
        document.getElementById("msg").innerText="Dish Added Successfully!";
        
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
    

return sub;
}