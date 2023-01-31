const textToChange = document.querySelector('.type-writer')
const bgImg = document.querySelector('.landing-page')
arrayImgs = ['img02.jpg', 'img03.jpg', 'img04.jpg', 'img01.jpg']
let i = 0
let c = 0
let textc = 'Bienvenue sur notre site web  '
let backwards
let j = textc.length
window.onload = function () {
    setInterval(function () {
        if (i == textc.length && j != 0) {
            textToChange.innerHTML = `${textc.slice(0, j)}`
            j -= 1
        }
        else if (i == textc.length && j == 0) {
            i = 0
            textToChange.innerHTML = ``
            j = textc.length
        }

        else if (i != textc.length) {
            textToChange.innerHTML += `${textc[i]}`
            i++
        }
    }, 200)
    setInterval(function () {
        //Changing background image
        if (c == arrayImgs.length) {
            c = 0
        }
        else {
            bgImg.style.backgroundImage = `url("images/${arrayImgs[c]}")`
            c++
        }
    }, 5500)
}
//For scrolling
let article = document.querySelector('.article')
let articleParagraphs = document.querySelectorAll('.article-content p')
let articleImgs = document.querySelectorAll('.article-content img')
let articleContent = document.querySelectorAll('.article-content')
let ContactContent = document.querySelector('.contact form #text-contact')
window.onscroll = function () {
    let windowHeight = window.innerHeight
    let revealTop = articleContent[1].getBoundingClientRect().top
    let revealBottom = ContactContent.getBoundingClientRect().top
    if (revealTop < (windowHeight) && revealBottom > (windowHeight)) {
        articleParagraphs.forEach((p) => {
            p.classList.add('active')
        })
        articleImgs.forEach((img) => {
            img.classList.add('active')
        })
    }
    else {
        articleParagraphs.forEach((p) => {
            p.classList.remove('active')
        })
        articleImgs.forEach((img) => {
            img.classList.remove('active')
        })
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
//form validation:
const email = document.getElementById('email-contact')
const textarea = document.getElementById('text-contact')
const myForm = document.getElementById('myForm')
email.addEventListener('input', e => {
    if (/^\w+\d*@[a-z]+\.[a-z]{2,3}$/.test(email.value) == false || email.value == '') {
        email.classList.add('invalid')
    }
    else {
        email.classList.remove('invalid')
    }
})
textarea.addEventListener('input', e => {
    if (textarea.value.length < 6) {
        textarea.classList.add('invalid')
    }
    else {
        textarea.classList.remove('invalid')
    }
})
myForm.addEventListener('submit', e => {
    if (email.className.indexOf('invalid') != -1 || email.value == "" || textarea.value.length < 6) {
        e.preventDefault()
        if ((email.className.indexOf('invalid') != -1 || email.value == "") && textarea.value.length < 6) {
            e.preventDefault()
            let alert = document.createElement('div')
            alert.classList.add('errmsg')
            let message = document.createElement('div')
            message.classList.add('message-box')
            let leave = document.createElement('div')
            leave.innerHTML = 'X'
            leave.classList.add('leave')
            leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
            })
            let headermsgbox = document.createElement('span')
            headermsgbox.innerText = `Exemple email: tarikbouchaala@gmail.com

            Le message doit être au moins 6 caracters`
            message.appendChild(headermsgbox)
            message.appendChild(leave)
            alert.appendChild(message)
            document.body.appendChild(alert)
        }
        else if (email.className.indexOf('invalid') != -1 || email.value == "") {
            email.classList.add('invalid')
            let alert = document.createElement('div')
            alert.classList.add('errmsg')
            let message = document.createElement('div')
            message.classList.add('message-box')
            let leave = document.createElement('div')
            leave.innerHTML = 'X'
            leave.classList.add('leave')
            leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
            })
            let headermsgbox = document.createElement('span')
            headermsgbox.innerText = 'Exemple email: tarikbouchaala@gmail.com'
            message.appendChild(headermsgbox)
            message.appendChild(leave)
            alert.appendChild(message)
            document.body.appendChild(alert)
        }
        else if(textarea.value.length < 6){
            textarea.classList.add('invalid')
            let alert = document.createElement('div')
            alert.classList.add('errmsg')
            let message = document.createElement('div')
            message.classList.add('message-box')
            let leave = document.createElement('div')
            leave.innerHTML = 'X'
            leave.classList.add('leave')
            leave.addEventListener('click', e => {
                e.target.parentElement.parentElement.remove()
            })
            let headermsgbox = document.createElement('span')
            headermsgbox.innerText = 'Le message doit être au moins 6 caracters'
            message.appendChild(headermsgbox)
            message.appendChild(leave)
            alert.appendChild(message)
            document.body.appendChild(alert)
        }
    }
})