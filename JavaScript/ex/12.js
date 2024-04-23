// 함수 (function)
// 입력을 받아 출력을하는 일련의 과정을 정의한 것

// 함수 선언식
function mySum(a, b) {
    return a + b;
}

// 함수 재할당 : 재할당이 가능하니 이름지을때 조심할것
function mySum(a, b) {
    console.log('재할당');
}

// 함수 표현식
// 호이스팅에 영향을 받지 않고, 재할당을 방지
const FNC_MY_SUM = function(a, b) {
    return a + b;
}

// 화살표 함수 function을 생략가능
const FNC_MY_SUM_2 = (a, b) => a + b;
console.log(FNC_MY_SUM_2(1,2));

const FNC_TEST1 = function() {
    console.log('FNC_TEST1');
}
const FNC_TEST1_A = () => 'FNC_TEST1';

// 파라미터가 1개일 경우 소괄호 생략 가능
const FNC_TEST2 = function(str) {
    return str;
}

const FNC_TEST2_A = str => str;

// 리턴처리 이외의 처리가 있을 경우, {}생략 불가능
const FNC_TEST3 = function(str) {
    if(str === 'a') {
        str = 'a입니다.';
    }
    return str;
}

const FNC_TEST3_A = str => {
    if(str === 'a') {
        str = 'a입니다.';
    }
    return str;
}

// 콜백 함수
// 다른 함수의 파라미터를 전달되어 특정 조건에 따라 호출되는 함수
const MY_SUB = (callBack, num) => {
    if(num === 3) {
        return '3입니다';
    }
    return callBack() - num;
}

const MY_CALLBACK = () => 10;

MY_SUB(MY_CALLBACK, 3);

// 즉시 실행 함수(IIFE)
// 함수의 정의와 동시에 바로 호출되는 함수
// 딱 한번만 호출되고 다시는 호출이 안됨
// 모듈화, 스코프 보호, 클로저 형성 목적으로 사용
const MY_CLASS = (function () {
    const name = '홍길동';

    return {
        myPrint: function() {
            console.log(name + '입니다.');
        }
    }
})();

MY_CLASS.myPrint();