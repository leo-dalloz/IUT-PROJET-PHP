function changeImage() {
    if (document.getElementById('responsiveTel').className == 'clair') {
        document.getElementById('responsiveTel').src = '../assets/images/telThemeFonce.png'
        document.getElementById('responsiveTel').className = 'fonce';
    } else {
        document.getElementById('responsiveTel').className = 'clair';
        document.getElementById('responsiveTel').src = '../assets/images/telThemeClair.png';
    }
}
window.setInterval("changeImage()", 2000)

    