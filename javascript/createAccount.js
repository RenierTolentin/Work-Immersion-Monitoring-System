function toggleUserGuide(){
    let blurBackground = document.getElementById('blurBackground');
    blurBackground.classList.toggle('active');
    let userGuidePopUp = document.getElementById('userGuidePopUp');
    userGuidePopUp.classList.toggle('active');
}

function toggleNavigationBar(){
    let toggleNavigation = document.getElementById('toToggle');
    toggleNavigation.classList.toggle('open');
}

function addImage(){
    document.querySelector('#profileImage').click();
}

function displayImage(e){
    if(e.files[0]){
        var reader = new FileReader();

        reader.onload = function(e){
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}



