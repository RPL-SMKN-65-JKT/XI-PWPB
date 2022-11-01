const front = document.getElementById('Book-Front');
const back = document.getElementById('Book-Back');

const front_check = document.getElementById('front-check');
const back_check = document.getElementById('back-check');

front.addEventListener('click', () => {
    if (!front_check.checked) {
        front_check.checked = true;
        document.getElementById("pic1").src= `https://placekitten.com/${getRndInteger(250,500)}/${getRndInteger(200,400)}`;
        return
    }
    front_check.checked = false;
    document.getElementById("pic2").src= `https://placekitten.com/${getRndInteger(250,500)}/${getRndInteger(200,400)}`;
    document.getElementById("pic3").src= `https://placekitten.com/${getRndInteger(250,500)}/${getRndInteger(200,400)}`;
});

back.addEventListener('click', () => {
    if (!back_check.checked) {
        back_check.checked = true;
        return
    }
    back_check.checked = false;
    document.getElementById("pic4").src= `https://placekitten.com/${getRndInteger(250,500)}/${getRndInteger(200,400)}`;
});

function getRndInteger(min, max) {
    return Math.floor(Math.random() * (max - min) ) + min;
}