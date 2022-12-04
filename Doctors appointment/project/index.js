
let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
}

window.onscroll = () => {
    menu.classList.remove('fa-times');
    navbar.classList.remove('active');
}
let book = document.getElementById('book');
book.addEventListener('click' ,function run(){
 window.open("http://127.0.0.1:5501/project/bookappointment.html")
})

let contact = document.getElementById('contact');
contact.addEventListener('click', function run() {
    window.open("http://127.0.0.1:5501/project/contactus.html")
})
