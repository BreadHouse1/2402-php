const lpadZero = (val, length) => { // val : 가져올 값, length : 붙이고 싶은 0의 갯수
    return String(val).padStart(length, '0')
}

let savedTime = new Date(); // 객체 생성

const DIV = document.querySelector('.time');
const STOP = document.querySelector('.stop');
const MOVE = document.querySelector('.move');

function start() {
    const NOW =  new Date(savedTime.getTime() + 1000); // 
    savedTime = NOW;
    const HOUR = lpadZero(NOW.getHours(), 2); // 현재 시
    const MINUTE = lpadZero(NOW.getMinutes(), 2); // 현재 분
    const SECOND = lpadZero(NOW.getSeconds(), 2); // 현재 초
    const FOMAT_DATE = `${HOUR}:${MINUTE}:${SECOND}`; // 현재 시각
    const timeStamp = HOUR > 12 ? '오후' : '오전';
    DIV.textContent =  '현재시각' + timeStamp + FOMAT_DATE;
}

let test = setInterval(start, 1000);

start();

function TIMESTOP() {
    clearInterval(test);
}

function TIMEMOVE() {
    test = setInterval(start, 1000) // 함수를 1초마다 반복
}

STOP.addEventListener('click', TIMESTOP );
MOVE.addEventListener('click', TIMEMOVE );