// asnyc/await






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

// 위에 콜백 지옥 개선
const PRO2 = (str, ms) => { // 값을 담을 변수 생성
    return new Promise((resolve) => { // Promise 생성 resolve 생성
        setTimeout(() => { // setTimeout 설정
            console.log(str); // str 받은 값 사용
            resolve(); // resolve 호출
        }, ms); // ms 받은 값 사용
    });
}

// 프로미스 헬
// PRO2('A' , 3000) 
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('B', 2000))
// .then(() => PRO2('B', 2000)) 
// .then(() => PRO2('C', 1000)) 
// .catch(() => console.log('ERROR')) 
// .finally(() => console.log('파이널리'))

// Async/await는 Promise가 있어야 사용가능
const myAsync = async () => {
    try{
        // await에서 에러가 뜨면 자동으로 reject처리 catch로 이동 후 에러 출력
    await PRO2('A', 3000);
    PRO2('B', 1000); // C와 동시 출력 됨
    await PRO2('C', 1000);
    }
    catch(err) {
        console.log(err);
    }
}