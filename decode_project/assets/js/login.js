let user_name = document.getElementById('user_name');
let password = document.getElementById('password');
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


user_name.addEventListener('keyup', () => {
   
    if (user_name.value === ' ') {
        user_name.classList.remove('is-invalid');
        user_name.classList.add('is-valid');
        user_name_valid = true;
    } else {
        user_name_valid = false;
        user_name.classList.add('is-invalid');
    
    }
})


password.addEventListener('keyup', () => {
    if (password.value === ' ') {
        password.classList.remove('is-invalid');
        password.classList.add('is-valid');
        password_valid = true;
    } else {
        password_valid = false;
        password.classList.add('is-invalid');
    }
});


submit.addEventListener('click',(e)=>{
  
    if(user_name_valid === true &&  password_valid === true)
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