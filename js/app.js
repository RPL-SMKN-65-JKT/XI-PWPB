import { Collapse, Dropdown, initTE } from "tw-elements";

initTE({ Collapse, Dropdown });

// icons
const sunIcon = document.querySelector(".sun");
const moonIcon = document.querySelector(".moon");

// theme variables
const userTheme = localStorage.getItem("theme");
const systemTheme = window.matchMedia("(prefers-color-scheme: dark)").matches;
// icon toggling
const iconToggle = () => {
    sunIcon.classList.toggle("display-none");
    moonIcon.classList.toggle("display-none");
};

// theme check
const themeCheck = () => {
    if (userTheme === "dark" || (!userTheme && systemTheme)) {
        document.documentElement.classList.add("dark");
        sunIcon.classList.add("display-none");
        return;
    }
    moonIcon.classList.add("display-none");
};

// manual theme switch
const themeSwitch = () => {
    if (document.documentElement.classList.contains("dark")) {
        document.documentElement.classList.remove("dark");
        localStorage.setItem("theme", "Light");
        iconToggle();
        return;
    }
    document.documentElement.classList.add("dark");
    localStorage.setItem("theme", "dark");
    iconToggle();
};

// manggil ganti tema di klik button
sunIcon.addEventListener("click", () => {
    themeSwitch();
});

moonIcon.addEventListener("click", () => {
    themeSwitch();
});

// // darkmode toggle

// const darkToggle = document.querySelector("#dark-toggle");
// const html = document.querySelector("html");

// darkToggle.addEventListener("click", function () {
//     if (darkToggle.checked) {
//         html.classList.add("dark");
//     } else {
//         html.classList.remove("dark");
//     }
// });
