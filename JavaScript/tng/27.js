// 원본은 보존하면서 오름차순 정렬 해주세요.
const ARR1 = [6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40];

// 원본 보존후 arr1로 복사
let arr1 = [...ARR1];
// 복사한 arr1을 콜백함수를 써서 숫자로 오름차순 정리
let result = arr1.sort((a, b) => a - b);

console.log(arr1, ARR1);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

// 나머지 2로 짝수 만 result1에 담음
let result1 = ARR2.filter(val => val % 2 === 0);
// 나머지 1로 홀수 만 result2에 담음
let result2 = ARR2.filter(val => val % 2 === 1);

console.log(result1, result2);

// 다른 방법
const EVEN = [];
const ODD = [];
ARR2.forEach(num => {
    if(num % 2 === 0) {
        EVEN[EVEN.length] = num;
    }
    else {
        ODD[ODD.length] = num;
    }
});

console.log(EVEN, ODD);