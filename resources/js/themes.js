const LOCAL_STORAGE_KEY = "theme";

/**
 * @var {string} theme
 */
let theme;

/**
 * @var {NodeListOf<HTMLButtonElement>} buttons
 */
let buttons;

/**
 * @param {string} theme
 */
function changeTheme(theme) {
  localStorage.setItem(LOCAL_STORAGE_KEY, theme);
  document.documentElement.setAttribute('data-theme', theme);
}

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

export function loadThemeFromLocalStorage() {
  theme = localStorage.getItem(LOCAL_STORAGE_KEY);
  document.documentElement.setAttribute('data-theme', theme);
}


function addEventListenersToButtons() {
  buttons = document.getElementById('themes-container')?.querySelectorAll('button');
  buttons?.forEach(button => {
    if (theme === button.dataset.setTheme) {
      setActive(button);
    }
    button.addEventListener('click', () => {
      changeTheme(button.dataset.setTheme);
      clearButtons();
      setActive(button);
    });
  });
}

document.addEventListener('livewire:navigated', function () {
  loadThemeFromLocalStorage();
  addEventListenersToButtons();
});
