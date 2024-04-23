// 배열
const ARR = [1, 2, 3, 4, 5];

console.log(ARR[5]);
// 배열 추가
ARR[5] = 6;

// 배열의 길이 획득
console.log(ARR.length);
ARR[ARR.length] = 9;

console.log(ARR);

// 배열인지 체크 (배열이면 true 배열이 아니면 false)
console.log(Array.isArray(ARR)); // true
console.log(Array.isArray(1)); // false

// 배열에서 특정 요소를 검색해 해당 인덱스를 획득
let arr = ['홍길동', '갑순이', '갑돌이'];
// indexOf() : 배열안에 해당 요소가 있는지 확인하고 있으면 해당 요소의 키값을 가져옴 없으면 -1로 표기됨
arr.indexOf('갑돌이');

// includes() : 배열에서 특정 요소의 존재 여부를 체크, 리턴 boolean (true나 false)
arr.includes('홍길동');
if(!(arr.includes('홍길동'))) { // 배열에 홍길동이 없으면 처리
    //처리
}

// push() : 원본 배열의 마지막 요소를 추가 후 변경된 length를 리턴
arr = ['홍길동', '갑순이', '갑돌이'];
console.log(arr.push('반장님','조원1','조원2'));
// length와의 차이점 : push가 처리속도가 더 느림 하지만 push는 ,를 이용해 여러key를 한번에 넣을 수 있음
// 그래도 현업에서는 잘 사용하지 않는편
arr[arr.length] = '부반장님';

// 배열 복사
arr = ['홍길동', '갑순이', '갑돌이'];
arr2 = [...arr]; // Spread Operator : 배열의 값만 복사해서 가져옴

// arr2 = arr; 이렇게 했을경우 arr2.push('반장님'); 을 했을경우 arr의 배열에도 반장님이 들어감
// 이유는 arr2 = arr;를 했을경우 배열을 복사 해오는게 아니라 arr의 주소값을 arr2가 참조할 수있게 해준거라서 그럼 

arr2.push('반장님');

// pop() : 원본 배열의 마지막 요소를 제거, 제거된 요소의 값 반환
arr = ['홍길동', '갑순이', '갑돌이'];
let result = arr.pop();
console.log(arr);

// unshift() : 원본 배열의 첫번째 요소를 추가, 변경된 length 반환
arr = ['홍길동', '갑순이', '갑돌이'];
result = arr.unshift('둘리');
console.log(result, arr);

// shift() : 원본 배열의 첫번째 요소를 제거, 제거된 요소의 값 반환
arr = ['홍길동', '갑순이', '갑돌이'];
result = arr.shift();
console.log(result, arr);

// splice(start, count, ...args) : 요소를 잘라서 자른 배열을 반환하는 메소드
// splice(시작할 키값, 시작값에서 몇개자를지, 자른부분에 몇개 추가할지(여러개 가능))
arr = [1, 2, 3, 4, 5];
result = arr.splice(2, 3) ; // 음수를 넣을 경우 오른쪽 기준으로 자름 양수로 할경우 왼쪽 기준으로 자름
console.log(arr); // [1, 2, 3]
console.log(result); // [4, 5]

arr = [1, 2, 3, 4, 5];
result = arr.splice(1, 2, 100 , 200 , 300);
console.log(arr); // [1, 100, 200, 300, 4, 5]
console.log(result); // [2, 3]

// join() : 배열의 요소를 문자열로 반환하는 메소드
// 구분문자는 디폴트가 ','
arr = [1, 2, 3, 4];
result = arr.join(''); // 1234

console.log(result);

// sort() : 배열의 요소를 문자열로 배열 후 오름차순 정렬 하고, 정렬된 배열을 반환
// 원본까지 변경되니 조심 할 것
arr = [4, 3, 6, 1, 2, 10, 5];
result = arr.sort(); // 그냥 쓸경우 문자열로 오름차순이라 [1, 10, 2, 3, 4, 5 ,6] 으로 나옴
console.log(arr);
console.log(result);

// (a - b)가 양수일 경우, a가 큰수, b가 작은수로 인식하여 정렬
// (a - b)가 음수일 경우, a가 작은수, b가 큰수로 인식하여 정렬
// (a - b)가 0일 경우, 같은 값으로 인식하여 정렬 하지 않음
result = arr.sort((a, b) => a - b); // 숫자를 정렬하고 싶을 때 이렇게하면 오름차순으로 b - a로 하면 내림차순으로 정렬이 됨
console.log(result);

// 이 밑으로 콜백 함수 반복 실행은 그냥 모든 배열의 value 값을 하나하나 체크한다고 보면 됨

// map() : 배열의 모든 요소에 대해서 콜백 함수를 반복 실행한 후에 그 결과를 새로운 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
// 모든 요소의 값 * 2를 한 결과를 얻고 싶을 경우
// ex) [2, 4, 6, 8 ...., 20] 

// map없이 쓸 경우
let copyArr = [];
for(let val of arr) {
    copyArr[copyArr.length] = val * 2;
}

console.log(copyArr)

// map을 사용한 경우
let mapArr = arr.map(val => val * 2);

console.log(mapArr);

// some() : 배열의 모든요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 만족하는 결과가 하나라도 있으면 true, 만족하는 결과가 하나도 없으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

result = arr.some(val => val === 5)
result1 = arr.some(val => val === 11)

console.log(result); // true
console.log(result1); // false

// every() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 모든 결과가 만족하면 true, 하나라도 만족하지 않으면 false
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

result = arr.every(val => val === 5);
result1 = arr.every(val => val >= 1);

console.log(result); // false 5말고 나머지는 val === 5 이 만족 안되기 때문
console.log(result1); // true 모든 배열의 value 값이 만족하기 때문

// filter() : 배열의 모든 요소에 대해서 콜백함수를 반복 실행하고,
// 조건에 맞는 요소만 모아서 배열로 반환
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

result = arr.filter(val => val % 3 === 0);

console.log(result); // [3, 6, 9]

// foreach() : 배열의 모든요소에 대해서 콜백 함수를 반복 실행
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

// foreach의 첫변수는 value값이 두번째변수에는 index(key)값이 들어간다
arr.forEach((val, key) => console.log(val * 2, key));