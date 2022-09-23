// untuk menjalankan fungsi responsive hamburger
const menu = document.querySelector('.menu input');
const nav = document.querySelector('nav ul');

menu.addEventListener('click', function(){
    nav.classList.toggle('slide');
})
// untuk menjalankan fungsi responsive hamburger end