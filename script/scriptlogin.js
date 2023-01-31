let btnchanging = document.querySelectorAll('button')
let elements = document.querySelectorAll('.presentation-text div')
let insorconContainer = document.querySelectorAll('.presentation-text .container div')
let insorconChoice = document.querySelectorAll('.presentation-text .choice div')
let allinputstogetempty = document.querySelectorAll('form input:not(input[type="submit"])')
btnchanging.forEach(btn => {
    btn.addEventListener('click', change)
})
function change() {
    allinputstogetempty.forEach(input => {
        input.value = ''
    })
    elements.forEach(e => {
        //inscription
        if (e.className.indexOf('active') == -1) {
            e.classList.add('active')
            if (e.className.indexOf('container')) {
                insorconContainer.forEach(div => {
                    div.classList.toggle('hiden')
                })
            }
            else {
                insorconChoice.forEach(div => {
                    div.classList.toggle('hiden')
                })
            }
        }
        //connection
        else {
            e.classList.remove('active')
            if (e.className.indexOf('container')) {
                insorconContainer.forEach(div => {
                    div.classList.toggle('hiden')
                })
            }
            else {
                insorconChoice.forEach(div => {
                    div.classList.toggle('hiden')
                })
            }
        }
    })
}
let inputpass = document.querySelector('input[type="password"]')
//show pass
let eyeimg = document.querySelector('.container form i')
eyeimg.addEventListener('click', show)
function show(e) {
    if (e.target.className.indexOf('active') == -1) {
        e.target.parentNode.childNodes.forEach(element => {
            if (element == inputpass) {
                element.setAttribute('type', 'text')
            }
        })
        e.target.classList.add('active')
    }
    else {
        e.target.parentNode.childNodes.forEach(element => {
            if (element == inputpass) {
                element.setAttribute('type', 'password')
            }
        })
        e.target.classList.remove('active')
    }
}
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