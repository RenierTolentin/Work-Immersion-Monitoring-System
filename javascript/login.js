
let logIn = document.getElementById('AdminLogIn');
let register = document.getElementById('StudentLogIn');
let animateBtn = document.getElementById('animateButton');

function loginSlide(){
    logIn.style.left = "50px";
    register.style.left = "450px";
    animateBtn.style.left = "0px";
}

function registerSlide(){
    logIn.style.left = "-400px";
    register.style.left = "50px";
    animateBtn.style.left = "110px";
}

