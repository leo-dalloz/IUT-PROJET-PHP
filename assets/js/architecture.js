/*
    Style    
*/
let listPopUp = document.querySelectorAll('.popup');

for (var i = 0; i < listPopUp.length; ++i) {
    setTimeout(deletePopUp, 5000, listPopUp[i]);
}

function deletePopUp(popup) {
    popup.remove();
}

var ThemeButton = document.getElementById('ChangeThemeButton');
var IconThemeButton = document.getElementById('IconThemeButton');

ThemeButton.addEventListener("click", switchCss);


if (window.localStorage.theme == 'night') {
    changeTheme('night');
} else {
    window.localStorage.theme == 'day';
    changeTheme('day');
}


function changeTheme(newTheme) {    
    document.getElementById('ThemeStylesheet').setAttribute('href', '../assets/css/theme/' + newTheme + '.css');
    window.localStorage.theme = newTheme;

    if (window.localStorage.theme == 'day') {
        IconThemeButton.classList = 'fa fa-moon';
    } else {
        IconThemeButton.classList = 'fa fa-sun';
    }
} //changeTheme()


function switchCss() {
    if (window.localStorage.theme == 'day') {
        changeTheme('night');
    } else {
        changeTheme('day');
    }
} // switchCss()