// Math 객체

// 올림, 반올림, 버림

// 올림
Math.ceil(0.1); // 올림이라 1로나옴

// 반올림
Math.round(0.5) // 반올림이라 1이나옴 0.4면 0

// 버림
Math.floor(0.9) // 내림이라 0이나옴

// 랜덤 값
Math.random(); // 0 ~ 1 랜덤한 수를 반환

// 1~10 랜덤 숫자 획득
console.log(Math.ceil(Math.random() * 10)); // 0 ~ 1의 소수점 첫번째 자리를 10 곱해서 정수로 만듦 그 후 올림으로 소수점을 없앰

// 최대값, 최소값, 절대값
const ARR = [6,3,4,65,87,8,3,2];

// 최대값
let max = Math.max(...ARR);
console.log(max);

// 최소값
let min = Math.min(...ARR);
console.log(min);

// 절대값 : 음수나 양수에 상관없이 숫자만 확인함 -1 === 1 (true)
// 현재에서 10일 이후나 10일 전이나 며칠이 지났는지만 확인하고 싶을 때 사용함
// 날짜 계산 할 때 자주 사용한다
Math.abs(1);
Math.abs(-1);