const signUpButton=document.getElementById('signUpButton');
const signInButton=document.getElementById('signInButton');
const signInForm=document.getElementById('signIn');
const signUpForm=document.getElementById('signUp');

signUpButton.addEventListener('click',function(){
    signInForm.style.display="none";
    signUpForm.style.display="block";
})
signInButton.addEventListener('click', function(){
    signInForm.style.display="block";
    signUpForm.style.display="none";
})

// Registration

var registerForm = document.querySelector("#signUp");
var allInput = registerForm.querySelectorAll("INPUT");

registerForm.onsubmit = function(e){
    e.preventDefault();
    registrationData();
}

const registrationData = () => {
    if(localStorage.getItem(allInput[0].value) == null){
        const userData = {
            userNum : allInput[0].value,
            fName : allInput[1].value,
            lName : allInput[2].value,
            email : allInput[3].value,
            password : allInput[4].value
        }
        swal("Congratulations!", "You Successfully registered", "success");  
        let userString = JSON.stringify(userData);
        localStorage.setItem(allInput[0].value,userString);
       // registerForm.reset('');
    }else{
        swal("Error!", "This User Number is not avialable!", "warning"); 
    }
}

// Sign In 

var signInBtn = document.querySelector("#signInBtn");
var userNum = document.querySelector("#uId");
var email = document.querySelector("#email");
var password = document.querySelector("#password");

signInBtn.onclick = function(e){
    e.preventDefault();
    if(userNum.value && email.value && password.value != ""){
       if(localStorage.getItem(userNum.value) != null){
        var allData = JSON.parse(localStorage.getItem(userNum.value));
        if(allData.email == email.value){
            if(allData.password == password.value){
                signInBtn.innerHTML = "Please wait...";
                signInBtn.disabled = true;
                setTimeout(function(){
                    window.location = "index.html"
                },3000)
            }else{
                swal("Wrong password!", "Please enter valid password", "warning"); 
            }
        }else{
            swal("Invalid email!", "Please enter valid email", "warning"); 
        }
       }else{
        swal("Invalid!", "Please enter valid roll number", "warning"); 
       }
    }else{
        swal("Empty fields!", "Please fill all the fields", "warning"); 
    }
      
}