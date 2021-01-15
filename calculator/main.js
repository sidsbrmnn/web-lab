let reset = false;

const buttons = document.querySelectorAll('input[type="button"]');
const form = document.querySelector('#calculator');
const result = document.querySelector('#result');

buttons.forEach((button) => {
    button.addEventListener('click', (event) => {
        if (reset) {
            result.value = event.currentTarget.value;
            reset = false;
        } else {
            result.value += event.currentTarget.value;
        }
    });
});

form.addEventListener('submit', (event) => {
    event.preventDefault();
    const value = eval(result.value);
    result.value = Math.round((value + Number.EPSILON) * 100) / 100;
    reset = true;
});
