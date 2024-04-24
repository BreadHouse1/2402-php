const BTN = document.querySelector('#btn');
const BLOCK = document.querySelector('.block');

function Heart() {
    alert('두근두근');
}

function search(e) {
    alert('들켰다!');
    e.target.style.backgroundColor = 'black'
    BLOCK.removeEventListener('mouseenter', Heart);
    BLOCK.removeEventListener('click', search);
    BLOCK.addEventListener('click', hide );
}

function hide(e) {
    alert('다시 숨는다');
    let topMargin = Math.floor(Math.random() * 500) + 'px';
    let sideMargin = Math.floor(Math.random() * 500) + 'px';
    e.target.style.backgroundColor = 'white';
    BLOCK.addEventListener('mouseenter', Heart);
    BLOCK.addEventListener('click', search);
    BLOCK.removeEventListener('click', hide );
    BLOCK.style.margin = topMargin + ' ' + sideMargin;
}



BTN.addEventListener('click', () => alert('안녕하세요. 숨어있는 div를 찾아보세요'))

BLOCK.addEventListener('mouseenter', Heart);

BLOCK.addEventListener('click', search);