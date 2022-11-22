const front = document.getElementById('Book-Front');
const back = document.getElementById('Book-Back');

const front_check = document.getElementById('front-check');
const back_check = document.getElementById('back-check');

front.addEventListener('click', () => {
    if (!front_check.checked) {
        front_check.checked = true;
        return
    }
    front_check.checked = false;
});

back.addEventListener('click', () => {
    if (!back_check.checked) {
        back_check.checked = true;
        return
    }
    back_check.checked = false;
});