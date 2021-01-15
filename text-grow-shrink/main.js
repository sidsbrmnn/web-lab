const h1 = document.querySelector('h1');

let increment, decrement;
let fontSize = 5;

function grow() {
    h1.textContent = "Text Growing";
    h1.style.fontSize = fontSize + "px";
    h1.style.color = "red";
    fontSize += 5;

    if (fontSize === 50) {
        clearInterval(increment);
        decrement = setInterval(shrink, 1000);
    }
}

function shrink() {
    h1.textContent = "Text Shrinking";
    h1.style.fontSize = fontSize + "px";
    h1.style.color = "blue";
    fontSize -= 5;

    if (fontSize === 5) {
        clearInterval(decrement);
        increment = setInterval(grow, 1000);
    }
}

increment = setInterval(grow, 1000);
