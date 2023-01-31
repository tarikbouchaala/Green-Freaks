//responsive menu
const hamburger = document.querySelector('.hamburger')
const links = document.querySelectorAll('.nav-bar li a')
const menu = document.querySelector('.nav-bar')
const menuOverlay = document.querySelector('.header .overlay')
hamburger.onclick = function () {
    this.classList.toggle('active')
    menu.classList.toggle('active')
    menuOverlay.classList.toggle('active')
}
links.forEach(link => {
    link.onclick = function () {
        hamburger.classList.toggle('active')
        menu.classList.toggle('active')
        menuOverlay.classList.toggle('active')
    }
})