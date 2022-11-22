$(document).ready(function() {
    $('.header__burger').click(function() {
        $('.header_menu,.header__burger').toggleClass('active');
        $('body').toggleClass('lock');
    });

    $('.header__list').click(function() {

        $('.header__burger,.header_menu').removeClass('active');

        $('body').removeClass('lock')});
});

window.addEventListener('scroll', function(){
    const header = document.querySelector('header');
    header.classList.toggle("sticky", window.scrollY > 0);
});