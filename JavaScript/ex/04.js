console.log("js파일에서 안녕하세요.");

// JS는 에러가 날 경우 에러부분부터 밑으로 전체 다 작동 안함
// 변수를 지정하고 사용안하면 변수 색깔이 다름

// 변수 설정
// var : 중복 선언 가능(이름 중복 O), 재할당 가능(값 변경 O), 함수레벨 스코프
var num1 = 1; // 최초 선언
var num1 = 2; // 중복 선언
num1 = 3; // 재할당

// let : 중복 선언 불가능(이름 중복 X), 재할당 가능(값 변경 O), 블록레벨 스코프, 밖에서 지정하면 전역 스코프
let num2 = 2;
num2 = 5;

// 상수
// const : 중복 선언 불가능(이름 중복 X), 재할당 불가능(값 변경 X), 블록레벨 스코프, 밖에서 지정하면 전역 스코프
const num = 3;

// 스코프 : 변수나 함수가 유효한 범위를 나타냄
// 함수 스코프 : 함수안에 선언시 함수안에서 사용가능 밖에 선언지 전역에서 사용가능

// 전역 스코프 : 함수레벨 스코프를 외부에 사용시 해당 파일의 전체에서 사용가능
let globalScope = '전역 스코프';

function myPrint() {
    console.log(globalScope);
}

myPrint();
console.log(globalScope);

// 지역 스코프 : 블록 레벨 스코프와 같음 {} 안에서 작성할때 해당 블록 지역 안에서만 사용가능
function myLocalPrint() {
    let localStr = '지역 스코프 let';
    console.log(localStr);
}

myLocalPrint();
// console.log(localStr); // 함수 밖이라 정의 되지 않은 변수라서 에러처리

// 블록 스코프 : {}로 둘러쌓인 범위
function myBlock() {
    if(true) {
        var test1 = 'var';
        // let과 const는 블록레벨 스코프라서 if블록 밖의 console에 있는 test는 변수가 담기지 않음
        let test2 = 'let';
        const test3 = 'const';
    }
    console.log(test1); // var는 전역이라서 가져옴
    //console.log(test2); // 위의 if 블록에 담긴 변수라서 여기는 값이 없음
    //console.log(test3); // 위의 if 블록에 담긴 변수라서 여기는 값이 없음
}

myBlock();

// 호이스팅 (hoistiong)
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것

// var 호이스팅 문제
console.log(test);
test = "aaa";
console.log(test);
var test;

// 데이터 타입
// number 숫자
let typeNum = 1;
// typeof 변수 입력시 해당 변수나 상수의 데이터 타입 확인 가능
typeof typeNum;

// string 문자열
let str = 'abcde';

// boolean 논리(true/false)
let boo = true;

// null 존재하지 않는 값
let letNull = null;

// undefined 값이 할당 되어 있지 않은 상태
let letUndefined; // 변수 지정만하고 값을 설정 안했을때

// object : 객체, 배열
let obj = {
    key1: 'val1',
    key2: 'val2'
};

console.log(obj.key1);
console.log(typeof obj.key1);

// Array 배열
let arr = [1, 2, 3];

console.log(arr[0]);

// symbol 심볼
let letStr1 = '심볼1';
let letStr2 = '심볼1';
// letStr1 === letStr2 경우 true 로 반환한다

let lstSymbol1 = Symbol('심볼1');
let lstSymbol2 = Symbol('심볼1');
// lstSymbol1 === lstSymbol2 는 false로 반환한다 Symbol 타입은 값이 같은 경우에도 서로 다르게 인식하게 한다 동명이인같은 느낌

