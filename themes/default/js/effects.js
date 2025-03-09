const words = ["RemixRO "];
let i = 0;
let j = 0;
let currentWord = "";
let isDeleting = false;
let isTyping = false;

function type() {
  isTyping = true;
  currentWord = words[i];
  if (isDeleting) {
    document.getElementById("typewriter").textContent = currentWord.substring(0, j-1);
    j--;
    if (j == 0) {
      isDeleting = false;
      i++;
      if (i == words.length) {
        i = 0;
      }
    }
  } else {
    document.getElementById("typewriter").textContent = currentWord.substring(0, j+1);
    j++;
    if (j == currentWord.length) {
      isDeleting = true;
    }
  }
  setTimeout(type, 500);
}

function updateDisplay() {
  if (window.innerWidth <= 1024) {
    if (!isTyping) {
      type();
    }
  } else {
    document.getElementById("typewriter").textContent = words[0];
    isTyping = false;
  }
}

updateDisplay();

window.addEventListener('resize', updateDisplay);