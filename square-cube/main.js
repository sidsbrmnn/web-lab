const tbody = document.querySelector('tbody');

for (let i = 0; i <= 10; i++) {
    const tr = document.createElement('tr');
    const number = document.createElement('td');
    const square = document.createElement('td');
    const cube = document.createElement('td');
    number.innerText = i;
    square.innerText = i * i;
    cube.innerText = i * i * i;
    tr.appendChild(number);
    tr.appendChild(square);
    tr.appendChild(cube);
    tbody.appendChild(tr);
}
