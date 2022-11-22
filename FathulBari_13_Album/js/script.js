const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const book = document.querySelector("#book");
const voiceBtn = document.querySelector("#voice");
const bgsound = document.querySelector("#bgsound");

const ventiAudio = document.querySelector("#venti");
const jeanAudio = document.querySelector("#jean");
const albedoAudio = document.querySelector("#albedo");
const dilucAudio = document.querySelector("#diluc");
const amberAudio = document.querySelector("#amber");
const lisaAudio = document.querySelector("#lisa");
const razorAudio = document.querySelector("#razor");
const bennetAudio = document.querySelector("#bennet");
const kaeyaAudio = document.querySelector("#kaeya");
const eulaAudio = document.querySelector("#eula");
const noelleAudio = document.querySelector("#noelle");
const sucroseAudio = document.querySelector("#sucrose");
const barbaraAudio = document.querySelector("#barbara");
const fischlAudio = document.querySelector("#fischl");
const rosariaAudio = document.querySelector("#rosaria");
const monaAudio = document.querySelector("#mona");
const dionaAudio = document.querySelector("#diona");
const kleeAudio = document.querySelector("#klee");

const ikon = document.querySelector("#ikon");
const iVenti = document.querySelector(".venti");
const iJean = document.querySelector(".jean");
const iAlbedo = document.querySelector(".albedo");
const iDiluc = document.querySelector(".diluc");
const iAmber = document.querySelector(".amber");
const iLisa = document.querySelector(".lisa");
const iRazor = document.querySelector(".razor");
const iBennet = document.querySelector(".bennet");
const iKaeya = document.querySelector(".kaeya");
const iEula = document.querySelector(".eula");
const iNoelle = document.querySelector(".noelle");
const iSucrose = document.querySelector(".sucrose");
const iBarbara = document.querySelector(".barbara");
const iFischl = document.querySelector(".fischl");
const iRosaria = document.querySelector(".rosaria");
const iMona = document.querySelector(".mona");
const iDiona = document.querySelector(".diona");
const iKlee = document.querySelector(".klee");

const paper1 = document.querySelector("#p1");
const paper2 = document.querySelector("#p2");
const paper3 = document.querySelector("#p3");
const paper4 = document.querySelector("#p4");
const paper5 = document.querySelector("#p5");
const paper6 = document.querySelector("#p6");
const paper7 = document.querySelector("#p7");
const paper8 = document.querySelector("#p8");
const paper9 = document.querySelector("#p9");
const paper10 = document.querySelector("#p10");

// Event Listener
ventiAudio.addEventListener("playing", Playingg);
jeanAudio.addEventListener("playing", Playingg);
albedoAudio.addEventListener("playing", Playingg);
dilucAudio.addEventListener("playing", Playingg);
amberAudio.addEventListener("playing", Playingg);
lisaAudio.addEventListener("playing", Playingg);
razorAudio.addEventListener("playing", Playingg);
bennetAudio.addEventListener("playing", Playingg);
kaeyaAudio.addEventListener("playing", Playingg);
eulaAudio.addEventListener("playing", Playingg);
noelleAudio.addEventListener("playing", Playingg);
sucroseAudio.addEventListener("playing", Playingg);
barbaraAudio.addEventListener("playing", Playingg);
fischlAudio.addEventListener("playing", Playingg);
rosariaAudio.addEventListener("playing", Playingg);
monaAudio.addEventListener("playing", Playingg);
dionaAudio.addEventListener("playing", Playingg);
kleeAudio.addEventListener("playing", Playingg);

ventiAudio.addEventListener("ended", End1);
jeanAudio.addEventListener("ended", End2);
albedoAudio.addEventListener("ended", End3);
dilucAudio.addEventListener("ended", End4);
amberAudio.addEventListener("ended", End5);
lisaAudio.addEventListener("ended", End6);
razorAudio.addEventListener("ended", End7);
bennetAudio.addEventListener("ended", End8);
kaeyaAudio.addEventListener("ended", End9);
eulaAudio.addEventListener("ended", End10);
noelleAudio.addEventListener("ended", End11);
sucroseAudio.addEventListener("ended", End12);
barbaraAudio.addEventListener("ended", End13);
fischlAudio.addEventListener("ended", End14);
rosariaAudio.addEventListener("ended", End15);
monaAudio.addEventListener("ended", End16);
dionaAudio.addEventListener("ended", End17);
kleeAudio.addEventListener("ended", End18);

prevBtn.addEventListener("click", goPrevPage);
nextBtn.addEventListener("click", goNextPage);

// Business Logic
let currentLocation = 1;
let numOfPapers = 10;
let maxLocation = numOfPapers + 1;

function openBook() {
  book.style.transform = "translateX(50%)";
  prevBtn.style.transform = "translateX(-350px)";
  nextBtn.style.transform = "translateX(350px)";
}

function closeBook(isAtBeginning) {
  if (isAtBeginning) {
    book.style.transform = "translateX(0%)";
  } else {
    book.style.transform = "translateX(100%)";
  }

  prevBtn.style.transform = "translateX(0px)";
  nextBtn.style.transform = "translateX(0px)";
}

function goNextPage() {
  if (currentLocation < maxLocation) {
    switch (currentLocation) {
      case 1:
        openBook();
        paper1.classList.add("flipped");
        paper1.style.zIndex = 1;
        break;
      case 2:
        paper2.classList.add("flipped");
        paper2.style.zIndex = 2;
        break;
      case 3:
        paper3.classList.add("flipped");
        paper3.style.zIndex = 3;
        break;
      case 4:
        paper4.classList.add("flipped");
        paper4.style.zIndex = 4;
        break;
      case 5:
        paper5.classList.add("flipped");
        paper5.style.zIndex = 5;
        break;
      case 6:
        paper6.classList.add("flipped");
        paper6.style.zIndex = 6;
        break;
      case 7:
        paper7.classList.add("flipped");
        paper7.style.zIndex = 7;
        break;
      case 8:
        paper8.classList.add("flipped");
        paper8.style.zIndex = 8;
        break;
      case 9:
        paper9.classList.add("flipped");
        paper9.style.zIndex = 9;
        break;
      case 10:
        paper10.classList.add("flipped");
        paper10.style.zIndex = 10;
        closeBook(false);
        break;
      default:
        throw new Error("unknown state");
    }
    currentLocation++;
  }
}

function goPrevPage() {
  if (currentLocation > 1) {
    switch (currentLocation) {
      case 2:
        closeBook(true);
        paper1.classList.remove("flipped");
        paper1.style.zIndex = 65;
        break;
      case 3:
        paper2.classList.remove("flipped");
        paper2.style.zIndex = 60;
        break;
      case 4:
        paper3.classList.remove("flipped");
        paper3.style.zIndex = 55;
        break;
      case 5:
        paper4.classList.remove("flipped");
        paper4.style.zIndex = 50;
        break;
      case 6:
        paper5.classList.remove("flipped");
        paper5.style.zIndex = 45;
        break;
      case 7:
        paper6.classList.remove("flipped");
        paper6.style.zIndex = 40;
        break;
      case 8:
        paper7.classList.remove("flipped");
        paper7.style.zIndex = 35;
        break;
      case 9:
        paper8.classList.remove("flipped");
        paper8.style.zIndex = 30;
        break;
      case 10:
        paper9.classList.remove("flipped");
        paper9.style.zIndex = 25;
        break;
      case 11:
        openBook();
        paper10.classList.remove("flipped");
        paper10.style.zIndex = 20;
        break;
      default:
        throw new Error("unknown state");
    }

    currentLocation--;
  }
}

function Playingg() {
  bgsound.volume = 0.1;
  console.log("mulai");
}

function End1() {
  bgsound.volume = 1;
  console.log("kelar");
  iVenti.classList.replace("fa-volume-up", "fa-microphone");
}
function End2() {
  bgsound.volume = 1;
  console.log("kelar");
  iJean.classList.replace("fa-volume-up", "fa-microphone");
}
function End3() {
  bgsound.volume = 1;
  console.log("kelar");
  iAlbedo.classList.replace("fa-volume-up", "fa-microphone");
}
function End4() {
  bgsound.volume = 1;
  console.log("kelar");
  iDiluc.classList.replace("fa-volume-up", "fa-microphone");
}
function End5() {
  bgsound.volume = 1;
  console.log("kelar");
  iAmber.classList.replace("fa-volume-up", "fa-microphone");
}
function End6() {
  bgsound.volume = 1;
  console.log("kelar");
  iLisa.classList.replace("fa-volume-up", "fa-microphone");
}
function End7() {
  bgsound.volume = 1;
  console.log("kelar");
  iRazor.classList.replace("fa-volume-up", "fa-microphone");
}
function End8() {
  bgsound.volume = 1;
  console.log("kelar");
  iBennet.classList.replace("fa-volume-up", "fa-microphone");
}
function End9() {
  bgsound.volume = 1;
  console.log("kelar");
  iKaeya.classList.replace("fa-volume-up", "fa-microphone");
}
function End10() {
  bgsound.volume = 1;
  console.log("kelar");
  iEula.classList.replace("fa-volume-up", "fa-microphone");
}
function End11() {
  bgsound.volume = 1;
  console.log("kelar");
  iNoelle.classList.replace("fa-volume-up", "fa-microphone");
}
function End12() {
  bgsound.volume = 1;
  console.log("kelar");
  iSucrose.classList.replace("fa-volume-up", "fa-microphone");
}
function End13() {
  bgsound.volume = 1;
  console.log("kelar");
  iBarbara.classList.replace("fa-volume-up", "fa-microphone");
}
function End14() {
  bgsound.volume = 1;
  console.log("kelar");
  iFischl.classList.replace("fa-volume-up", "fa-microphone");
}
function End15() {
  bgsound.volume = 1;
  console.log("kelar");
  iRosaria.classList.replace("fa-volume-up", "fa-microphone");
}
function End16() {
  bgsound.volume = 1;
  console.log("kelar");
  iMona.classList.replace("fa-volume-up", "fa-microphone");
}
function End17() {
  bgsound.volume = 1;
  console.log("kelar");
  iDiona.classList.replace("fa-volume-up", "fa-microphone");
}
function End18() {
  bgsound.volume = 1;
  console.log("kelar");
  iKlee.classList.replace("fa-volume-up", "fa-microphone");
}

function ventiPlay() {
  ventiAudio.play();
  iVenti.classList.replace("fa-microphone", "fa-volume-up");
}

function jeanPlay() {
  jeanAudio.play();
  iJean.classList.replace("fa-microphone", "fa-volume-up");
}

function albedoPlay() {
  albedoAudio.play();
  iAlbedo.classList.replace("fa-microphone", "fa-volume-up");
}

function dilucPlay() {
  dilucAudio.play();
  iDiluc.classList.replace("fa-microphone", "fa-volume-up");
}

function amberPlay() {
  amberAudio.play();
  iAmber.classList.replace("fa-microphone", "fa-volume-up");
}

function lisaPlay() {
  lisaAudio.play();
  iLisa.classList.replace("fa-microphone", "fa-volume-up");
}

function razorPlay() {
  razorAudio.play();
  iRazor.classList.replace("fa-microphone", "fa-volume-up");
}

function bennetPlay() {
  bennetAudio.play();
  iBennet.classList.replace("fa-microphone", "fa-volume-up");
}

function kaeyaPlay() {
  kaeyaAudio.play();
  iKaeya.classList.replace("fa-microphone", "fa-volume-up");
}

function eulaPlay() {
  eulaAudio.play();
  iEula.classList.replace("fa-microphone", "fa-volume-up");
}

function noellePlay() {
  noelleAudio.play();
  iNoelle.classList.replace("fa-microphone", "fa-volume-up");
}

function sucrosePlay() {
  sucroseAudio.play();
  iSucrose.classList.replace("fa-microphone", "fa-volume-up");
}

function barbaraPlay() {
  barbaraAudio.play();
  iBarbara.classList.replace("fa-microphone", "fa-volume-up");
}

function fischlPlay() {
  fischlAudio.play();
  iFischl.classList.replace("fa-microphone", "fa-volume-up");
}

function rosariaPlay() {
  rosariaAudio.play();
  iRosaria.classList.replace("fa-microphone", "fa-volume-up");
}

function monaPlay() {
  monaAudio.play();
  iMona.classList.replace("fa-microphone", "fa-volume-up");
}

function dionaPlay() {
  dionaAudio.play();
  iDiona.classList.replace("fa-microphone", "fa-volume-up");
}

function kleePlay() {
  kleeAudio.play();
  iKlee.classList.replace("fa-microphone", "fa-volume-up");
}
