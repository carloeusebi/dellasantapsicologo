import {themeChange} from "theme-change";

themeChange();

const theme = localStorage.getItem("theme");
const buttons = document.getElementById('themes-container')?.querySelectorAll('button');


/**
 * @param {HTMLButtonElement} button
 */
function setActive(button) {
    button.querySelector('svg').classList.remove('invisible');
}

function clearButtons() {
    buttons?.forEach(button => {
        button.querySelector('svg').classList.add('invisible');
    });
}

buttons?.forEach(button => {
    if (theme === button.dataset.setTheme) {
        setActive(button);
    }
    button.addEventListener('click', () => {
        clearButtons();
        setActive(button);
    });
})
