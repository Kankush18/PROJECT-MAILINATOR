let loginForm=document.querySelector("#loginform");
let signup=document.querySelector("#signupform");

let lbtn=document.querySelector(".login");
let sbtn=document.querySelector("#sbtn")

   
lbtn.addEventListener('click',function(){
    loginForm.style.display='block';
    signup.style.display="none";
})
    sbtn.addEventListener('click',function(){
        
        loginForm.style.display='none';
        signup.style.display="block";
        
    })

