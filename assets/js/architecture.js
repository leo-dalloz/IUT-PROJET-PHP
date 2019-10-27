/*
    Style    
*/
var ThemeButton = document.getElementById('ChangeThemeButton');
var IconThemeButton = document.getElementById('IconThemeButton');

ThemeButton.addEventListener("click", switchCss);


if (window.localStorage.theme == 'Night') {
    changeTheme('Night');
} else {
    window.localStorage.theme == 'Day';
    changeTheme('Day');
}


function changeTheme(newTheme) {    
    document.getElementById('ThemeStylesheet').setAttribute('href', './assets/css/theme/' + newTheme + '.css');
    window.localStorage.theme = newTheme;

    if (window.localStorage.theme == 'Day') {
        IconThemeButton.classList = 'fa fa-moon';
    } else {
        IconThemeButton.classList = 'fa fa-sun';
    }
} //changeTheme()


function switchCss() {
    if (window.localStorage.theme == 'Day') {
        changeTheme('Night');
    } else {
        changeTheme('Day');
    }
} // switchCss()