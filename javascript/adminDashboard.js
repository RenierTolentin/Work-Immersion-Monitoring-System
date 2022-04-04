function clock(){
    let hours = document.getElementById('hours');
    let minutes = document.getElementById('minutes');
    let seconds = document.getElementById('seconds');

    const h = new Date().getHours();
    const m = new Date().getMinutes();
    const s = new Date().getSeconds();

    hours.innerHTML = h;
    minutes.innerHTML = m;
    seconds.innerHTML = s;
}
let interval = setInterval(clock);

function toggleUserGuide(){
    let blurBackground = document.getElementById('blurBackground');
    blurBackground.classList.toggle('active');
    let userGuidePopUp = document.getElementById('userGuidePopUp');
    userGuidePopUp.classList.toggle('active');
}

function toggleLogDelete(){
    let confirmDeletion = document.getElementById('blurBackground');
    confirmDeletion.classList.toggle('active');
    let userDeletionPopUp = document.getElementById('userDeletionPopUp');
    userDeletionPopUp.classList.toggle('active');
}

function toggleNavigationBar(){
    let toggleNavigation = document.getElementById('toToggle');
    toggleNavigation.classList.toggle('open');
}

window.addEventListener("load", function(){
    let loader = document.querySelector(".loader");
    loader.className += " loaderHidden";
});
