// Promise 객체
// JS의 비동기 프로그래밍에서 근간이 되는 기법
// 콜백지옥을 개선하기 위해서 등장한 기법

// 콜백 지옥
// setTimeout(() => {
//     console.log('A');
//     setTimeout(()=> {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000);


// Promise 객체 생성
const PRO = (str, ms) => {
	return new Promise((resolve, reject) => {
		setTimeout(()=>{
            if(str === 'A') {
                resolve('성공 : A임'); // 작업 성공 resolve() 호출
            } else {
                reject('실패 : A아님'); // 작업 실패 reject() 호출
            }
		}, ms);
	});
}

// Promise 호출
PRO('A', 3000)
.then(result => console.log('then : ' + result)) // resolve가 호출 됐을 때
.catch(err => console.log('catch : ' + err)) // reject가 호출 됐을 때

// 위에 콜백 지옥 개선
const PRO2 = (str, ms) => { // 값을 담을 변수 생성
    return new Promise((resolve) => { // Promise 생성 resolve 생성
        setTimeout(() => { // setTimeout 설정
            console.log(str); // str 받은 값 사용
            resolve(); // resolve 호출
        }, ms); // ms 받은 값 사용
    });
}

PRO2('A' , 3000) // PRO2호출 후 값 입력
.then(() => PRO2('B', 2000)) // resolve 처리가 성공하면 이어서 처리
.then(() => PRO2('C', 1000)) // 위의 then 처리가 되면 이어서 처리
.catch(() => console.log('ERROR')) // resolve 실패시 catch로 넘어감
.finally(() => console.log('파이널리')) // resolve와 reject상관 없이 출력

// 병렬 처리 방법 (Promise.all())
const myLoop = cnt => {
    for(let i = 0; i < cnt; i++) {

    }
    console.log('myLoop 종료 : ' + cnt);
}

Promise.all([myLoop(100000000), myLoop(10000000), myLoop(1000000)]);