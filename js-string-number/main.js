const input = document.querySelector('input');

input.addEventListener('keyup', (event) => {
    if (event.key.toLowerCase() === 'enter') {
        event.preventDefault();

        const value = input.value;
        const chars = value.split('');
        if (isNaN(Number(value))) {
            let first = -1;
            for (let i = 0; i < chars.length; i++) {
                const isVowel = /^[aeiou]$/i.test(chars[i]);
                if (isVowel) {
                    first = i;
                    break;
                }
            }

            const output = first === -1 ?
                'No vowels found' :
                `Position of the left-most vowel is ${first}`;
            alert(output);
        } else {
            const reverse = chars.reverse().join('');

            const output = `Reverse of the given number is ${reverse}`;
            alert(output);
        }
    }
});
