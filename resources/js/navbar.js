import { Collapse } from 'flowbite';

// set the target element that will be collapsed or expanded (eg. navbar menu)
const $targetEl = document.getElementById('navbar-default');

// optionally set a trigger element (eg. a button, hamburger icon)
const $triggerEl = document.getElementById('navButton');

const openNav = document.getElementById('open-nav');
const closeNav = document.getElementById('close-nav');

// optional options with default values and callback functions
const options = {
  onCollapse: () => {
    openNav.classList.remove("hidden");
    closeNav.classList.add("hidden");
  },
  onExpand: () => {
    openNav.classList.add("hidden");
    closeNav.classList.remove("hidden");
  },
  onToggle: () => {
    console.log('element has been toggled')
  }
};

const collapse = new Collapse($targetEl, $triggerEl, options);
function toggleNav() {
    collapse.toggle();
}