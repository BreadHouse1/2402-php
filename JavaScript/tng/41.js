// --------------
//     시계
// --------------



// const lpadZero = (val, length) => { // val : 가져올 값, length : 붙이고 싶은 0의 갯수
//     return String(val).padStart(length, '0')
// }

// let savedTime = new Date(); // 객체 생성

// const DIV = document.querySelector('.time');
// const STOP = document.querySelector('.stop');
// const MOVE = document.querySelector('.move');

// function start() {
//     const NOW =  new Date(savedTime.getTime() + 1000); // 
//     savedTime = NOW;
//     const HOUR = lpadZero(NOW.getHours(), 2); // 현재 시
//     const MINUTE = lpadZero(NOW.getMinutes(), 2); // 현재 분
//     const SECOND = lpadZero(NOW.getSeconds(), 2); // 현재 초
//     const FOMAT_DATE = `${HOUR}:${MINUTE}:${SECOND}`; // 현재 시각
//     const timeStamp = HOUR > 12 ? '오후' : '오전';
//     DIV.textContent =  '현재시각' + timeStamp + FOMAT_DATE;
// }

// let test = setInterval(start, 1000);

// start();

// function TIMESTOP() {
//     clearInterval(test);
// }

// function TIMEMOVE() {
//     test = setInterval(start, 1000) // 함수를 1초마다 반복
// }

// STOP.addEventListener('click', TIMESTOP );
// MOVE.addEventListener('click', TIMEMOVE );


// --------------
//   타이머
// --------------

const lpadZero = (val, length) => { // val : 가져올 값, length : 붙이고 싶은 0의 갯수
    return String(val).padStart(length, '0')
}

let stopTime = null;
let savedTime = new Date(); // 객체 생성
let chkLi= document.querySelector('.chk > h3')
let chkTime = document.querySelector('.chk');

const DIV = document.querySelector('.time');
const STOP = document.querySelector('.stop');
const MOVE = document.querySelector('.move');
const RESET = document.querySelector('.reset');
const RECORDS = document.querySelector('.records');

function start() {
    const NOW =  stopTime !== null ? new Date(stopTime) : new Date(); 
    // NOW.setMilliseconds(savedTime.getMilliseconds() + 1);

    const diff = Math.abs(NOW - savedTime);
    const diffDate = new Date(diff);

    // savedTime = NOW;
    const MINUTE = lpadZero(diffDate.getMinutes(), 2); // 현재 분
    const SECOND = lpadZero(diffDate.getSeconds(), 2); // 현재 초
    const MILLISECOND = lpadZero(diffDate.getMilliseconds(), 3).substring(0, 2); // 현재 시
    const FOMAT_DATE = `${MINUTE}:${SECOND}:${MILLISECOND}`; // 현재 시각
    DIV.textContent =  FOMAT_DATE;

    stopTime = FOMAT_DATE;
}

let test = setInterval(start, 10);

function TIMERECORDS() {
    const NOW =  new Date(stopTime); // 
    const MINUTE = lpadZero(NOW.getMinutes(), 2); // 현재 분
    const SECOND = lpadZero(NOW.getSeconds(), 2); // 현재 초
    const MILLISECOND = lpadZero(NOW.getMilliseconds(), 3); // 현재 시
    const FOMAT_DATE = `${MINUTE}:${SECOND}:${MILLISECOND}`
    const NEW_H3 = document.createElement('h3');
    NEW_H3.innerHTML = FOMAT_DATE; 
    chkTime.appendChild(NEW_H3);
}

function TIMEMOVE() {
    test = setInterval(start, 10) // 함수를 1초마다 반복
}

function TIMESTOP() {
    clearInterval(test);
}

function TIMERESET() {
    chkTime.innerHTML = '<a href=41.js></a>'
}

RECORDS.addEventListener('click', TIMERECORDS );
MOVE.addEventListener('click', TIMEMOVE );
RESET.addEventListener('click', TIMERESET );
STOP.addEventListener('click', TIMESTOP );