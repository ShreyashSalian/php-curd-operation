let first_name = document.getElementById('first_Name');
let last_name = document.getElementById('last_Name');
let user_name = document.getElementById('user_Name');
let email = document.getElementById('email');
let contact_number = document.getElementById('contact_Number');
let password = document.getElementById('password');
let confirm_password = document.getElementById('confirm_password');
let image = document.getElementById('image');
let submit = document.getElementById('submit');
$('#success').hide();
$('#failure').hide();
let first_name_valid = false;
let last_name_valid = false;
let user_name_valid = false;
let email_valid = false;
let contact_number_valid = false;
let password_valid = false;
let confirm_password_valid = false;
let image_valid = false;

first_name.addEventListener('keyup', function() {
    let regex = /^[a-zA-Z]+$/;
    if (regex.test(first_name.value)) {
        first_name.classList.remove('is-invalid');
        first_name.classList.add('is-valid');
        first_name_valid = true;
    } else {
        first_name_valid = false;
        first_name.classList.add('is-invalid');        
    }
});

last_name.addEventListener('keyup', function() {
    let regex = /^[a-zA-Z]+$/;
    if (regex.test(last_name.value)) {
        last_name.classList.remove('is-invalid');
        last_name.classList.add('is-valid');
        last_name_valid = true;
    } else {
        last_name.classList.add('is-invalid');
        last_name_valid = false;
       
    }
});
user_name.addEventListener('keyup', () => {
    let regex = /^([A-Za-z0-9\-\@\.]){5,20}$/;
    if (regex.test(user_name.value)) {
        user_name.classList.remove('is-invalid');
        user_name.classList.add('is-valid');
        user_name_valid = true;
    } else {
        user_name_valid = false;
        user_name.classList.add('is-invalid');
    
    }
})
email.addEventListener('keyup', () => {
    let regex = /^([_a-zA-Z0-9\-\.]+)@([_a-zA-Z0-9\-\.]+)\.([a-zA-Z]){2,7}$/;

    if (regex.test(email.value)) {
        email.classList.remove('is-invalid');
        email.classList.add('is-valid');
        email_valid = true;
    } else {
        email_valid = false;
        email.classList.add('is-invalid');
    }
})
contact_number.addEventListener('keyup', () => {
    let regex = /^\d{10}$/;
    if (regex.test(contact_number.value)) {
        contact_number.classList.remove('is-invalid');
        contact_number.classList.add('is-valid');
        contact_number_valid = true;
    } else {
        contact_number_valid = false;
        contact_number.classList.add('is-invalid');
    }
})
password.addEventListener('keyup', () => {
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (regex.test(password.value)) {
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        password_valid = true;
    } else {
        password_valid = false;
        password.classList.add('is-invalid');
    }
});
confirm_password.addEventListener('keyup', () => {
    let str = confirm_password.value;
    let regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (str.match(password.value) && str !== '' && regex.test(str)) {
        confirm_password.classList.remove('is-invalid');
        confirm_password.classList.add('is-valid');
        confirm_password_valid = true;
    } else {
        confirm_password_valid = false;
        confirm_password.classList.add('is-invalid');
    }
});
image.addEventListener('keyup', () => {

    if (image.value != null) {
        image_valid = true;
        image.classList.remove('is-invalid');
        image.classList.add('is-valid');
    } else {
        image_valid = false;
        image.classList.add('is-invalid');
    }
})


submit.addEventListener('click',(e)=>{
  
    if(first_name_valid === true && last_name_valid === true && user_name_valid === true && contact_number_valid === true && password_valid === true && confirm_password_valid === true)
    {
        success.classList.add('show');   
        // $('#failure').alert('close');  
        $('#failure').hide(); 
        $('#success').show();      
    }
    else{
        e.preventDefault();
        failure.classList.add('show');   
        //success.classList.remove('show');
        // $('#success').alert('close');
        $('#success').hide();
        $('#failure').show(); 
    }
});