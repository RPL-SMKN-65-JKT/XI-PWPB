const prevBtn = document.querySelector("#prev-btn");
const nextBtn = document.querySelector("#next-btn");
const book = document.querySelector("#book");

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
        throw new Error("unkown state");
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
        paper1.style.zIndex = 10;
        break;
      case 3:
        paper2.classList.remove("flipped");
        paper2.style.zIndex = 9;
        break;
      case 4:
        paper3.classList.remove("flipped");
        paper3.style.zIndex = 8;
        break;
      case 5:
        paper4.classList.remove("flipped");
        paper4.style.zIndex = 7;
        break;
      case 6:
        paper5.classList.remove("flipped");
        paper5.style.zIndex = 6;
        break;
      case 7:
        paper6.classList.remove("flipped");
        paper6.style.zIndex = 5;
        break;
      case 8:
        paper7.classList.remove("flipped");
        paper7.style.zIndex = 4;
        break;
      case 9:
        paper8.classList.remove("flipped");
        paper8.style.zIndex = 3;
        break;
      case 10:
        paper9.classList.remove("flipped");
        paper9.style.zIndex = 2;
        break;
      case 11:
        openBook();
        paper10.classList.remove("flipped");
        paper10.style.zIndex = 1;
        break;
      default:
        throw new Error("unkown state");
    }

    currentLocation--;
  }
}
