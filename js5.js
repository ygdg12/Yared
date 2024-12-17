var nameError=document.getElementById('nameerror');
var emailError=document.getElementById('error1');
var passError=document.getElementById('error2');
var repeatError=document.getElementById('error3');






function validaten(){
   var name=document.getElementById('fulln').value;
    
   if(name.length==0){
      nameError.innerHTML='Name is Required';
      return false;
   }
   if(!name.match(/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/)){
      nameError.innerHTML='Write a valid name';
       return false;
   }
   nameError.innerHTML='<i class="fa-solid fa-circle-check"></i>';
   return true;
}
function validatee(){
    var email=document.getElementById('emailinput').value;
     
    if(email.length==0){
       emailError.innerHTML='Email is Required';
       return false;
    }
    if(!email.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)){
       emailError.innerHTML='Invalid Email';
        return false;
    }
    emailError.innerHTML='';
    return true;
 }

 function validatep(){
    var pass=document.getElementById('PSinput').value;
     
    if(pass.length==0){
       passError.innerHTML='Password is Required';
       return false;
    }
    if(!pass.match(/^(?=.*[A-Za-z])(?=.*\d).{8,}$/)){
       passError.innerHTML='Invalid Password';
        return false;
    }
    passError.innerHTML='';
    return true;
 }
 function validater(){
    var pass=document.getElementById('PSinput').value;
    var repeat=document.getElementById('repeat').value;
     
    if(pass==repeat){
        repeatError.innerHTML='';
    }
    else{
        repeatError.innerHTML='Confirm your password';
    }
 }