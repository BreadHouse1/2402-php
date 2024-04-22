// 조건문 ( if, switch )
// if의 사용법은 php와 동일

// 1등이면 1등, 2등이면 2등, 3등이면 3등, 나머지는 순위 외, 5번만 특별상 출력
let num = 3;

if ( num <= 3 ) {
    console.log( num + '등');
}
else if ( num === 5 ) {
    console.log('특별상');
}
else {
    console.log('순위 외');
}

// switch : () 안에 체크할 변수, case에 조건, 조건 다음 : 출력할 값 이후 마지막으로 break 그외는 defualt로 설정
// 나이 20이면 '20대', 30이면 '30대', 나머지는 '모르겠다'
let age = 20;
switch(age) {
    case 20:
        console.log('20대');
        break;
    case 30:
        console.log('30대');
        break;
    default:
        console.log('모르겠다')
        break;    
}

// 반복문 ( for, while, do_while )

// for문
for (let i = 1; i < 5; i *= 2 ) { // i *= 2 에서 i * 2로 하면 결과 값을 i에 담지 않기 때문에 무한 루프가 된다.
    console.log(i + '번째 루프')
}

// continue : 현재 처리를 건너 뛰고 다음 루프로 이동
// break : 루프를 강제종료
for (let o = 1; o < 11; o++) {
    if(o % 3 === 0) {
        continue;
    }
    console.log(o + '번째 루프');
    if(o === 7) {
        break;
    }
}

// while문
let cnt = 1;
while(cnt <= 10) {
    if(cnt % 3 === 0){
        cnt++;
        continue;
    }
    console.log(cnt + '번째 루프');

    if(cnt === 7) {
        break;
    }
    cnt++;
}

// 구구단 2~9단을 출력

const DAN = 9;
for(let dan = 2; dan <= DAN; dan++) {
    console.log(`**${dan}단**`);
    for(let num = 1; num <= DAN; num++){
        console.log(`${dan} X ${num} = ${dan * num}`);
    }
}

// for...in
// 모든 객체를 반복하는 문법
// key에만 접근이 가능
const OBJ = {
    key1: 'val1'
    ,key2: 'val2'
};
// let key는 객체를 받을 변수 설정 in OBJ 는 for문을 돌릴 객체 설정
// 한번 돌때마다 key를 하나씩 담음
for(let key in OBJ) {
    console.log(OBJ[key]); // console.log(key) 이렇게 쓴다면 val1이 아니라 key1, key2가 출력됨
}

const ARR1 = [1, 2, 3];
for(let key in ARR1) {
    console.log(ARR1[key]);
}

// for...of
// iterable 객체를 반복하는 문법(String, Array, Map, Set, TypeArray...)
// value에만 접근이 가능
const STR1 = '안녕하세요';
for(let val of STR1) {
    console.log(val);
}

// for in 은 key에 접근하고 for of 는 value에만 접근한다
// 그리고 for of 는 iterable(String, Array, Map, Set, TypeArray...)의 객체에만 사용이 가능하다
// iterable 확인 방법은 객체.length를 했을때 undefined가 뜨면 iterable이 아니다
// iterable이면 해당 value의 length값이 나온다