// 동기처리 : 1 2 3이 있으면 1부터 한개씩 차례로 처리함

// 비동기처리 : 1 2 3이 있으면 1,2,3을 한번에 동시 처리함

// 타이머 함수(비동기 처리)

// setTimeout(콜백함수,  시간(ms)) : 일정 시간이 흐른 후에 콜백 함수를 실행
setTimeout(() => (console.log('타임아웃')), 5000);

// 1초 뒤 A, 2초 뒤 B, 3초 뒤 C 출력
setTimeout(() => (console.log('A')), 1000);
setTimeout(() => (console.log('B')), 2000);
setTimeout(() => (console.log('C')), 3000);


//setTimeout을 쓸때 순서대로 처리하고 싶으면 setTimeout 콜백함수안에 처리할 정보를 넣으면 됨
console.log('A');
setTimeout( () => {
    console.log('B');
    console.log('C');
}, 1000);

// clearTimeout(타임아웃ID) : 해당 타임아웃ID의 처리를 제거
const TIMEOUT_ID = setTimeout(() => console.log('ttt'), 5000);
clearTimeout(TIMEOUT_ID);
console.log(TIMEOUT_ID);

const TIMEOUT_ID2 = setTimeout(() => console.log('aaa'), 5000);
clearTimeout(TIMEOUT_ID2);

// setInterval(콜백함수, 시간(ms)) [아규먼트1, 아규먼트2] ([]안은 생략가능) : 일정시간마다 콜백함수 실행
const INTERVAL_ID = setInterval(() => console.log('인터벌' + cnt), 1000);  

// clearInterval(intervalID) : 해당 intervalID 처리 제거
clearInterval(INTERVAL_ID);

// 화면에 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타났다가 3초뒤에 사라지게 해주세요

const TEST = setTimeout(() => {
    const TEXT = document.querySelector('body');
    TEXT.innerHTML = '<h1 style="font-size: 15rem;">두둥등장</h1>';

    setTimeout(() => {
        const H1 = document.querySelector('h1');
        TEXT.removeChild(H1);
    }, 3000);
    
}, 5000);

// 다른방법

// setTimeout(() => {
//     const H1 = document.createElement('h1'); // h1 태그 생성
//     H1.innerHTML = '두둥등장'; // h1태그 컨텐츠 삽입
//     H1.style.fontSize = '5rem'; // h1 태그 글자크기 조절

//     document.body.appendChild(H1); //body에 h1 추가

//     setTimeout(() => {
//         const DEL_H1 = document.querySelector('h1');
//         document.body.removeChild(DEL_H1);
//     }, 3000)
// }, 5000);



// 콜백 지옥
// 비동기 처리를 동기 처리 처럼 만들기 위해서 아래처럼 콜백 지옥 현상이 생긴다.

// setTimeout(() => console.log('A'), 3000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 1000);

setTimeout(() => {
    console.log('A');
    setTimeout(()=> {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000);
}, 3000);

