// String 객체

// 원래는 이런식으로 돼 있음
let str2 = String('이렇게 만들어야해');

// js나 php에서 쉽게 만들어서 이런식으로 써도 가능하게 한거임
let str = '문자열이지롱';

// length : 문자열의 길이를 반환
console.log(str.length); // (문자열이지롱) 6이 나옴
console.log(str2.length); // (이렇게 만들어야해) 공백 포함해서 9가 나옴

// chart() : 특정 인덱스의 문자를 반환
str.charAt(3); // '이'가 출력 됨

// indexOf() : 문자열에서 특정 문자열을 찾아 최초의 인덱스를 반환
// 찾지 못하면 -1 반환
str = '안녕하세요. 안녕하세요.';
str.indexOf('녕'); // 중복된 문자가 있어도 첫번째 문자의 인덱스만 가져옴

// 없는 문자열일경우 -1을 반환하기 때문에 0보다 작아서 해당 문자열 없음을 출력한다.
if(str.indexOf('효') < 0) {
    console.log('해당 문자열 없음');
}

// 뒤에 5는 몇번 인덱스에서 시작할지를 정한다.
// 현재의 경우 '안녕하세요. 안녕하세요.' 5번인덱스인 .에서 시작해서 녕을 찾아 8이 나온다
str.indexOf('녕', 5);

// includes() : 문자열에서 특정 문자열을 찾아 true/false 반환
// 찾는 문자가 있으면 검색 문자열 존재 출력
if(str.includes('하세요')) {
    console.log('검색 문자열 존재');
}

// replace() : 특정 문자열을 찾아서 지정한 문자열로 바꿈
str = 'abcdefg';
str.replace('de', '안녕'); // abc안녕fg가 출력됨 첫문자열만 바꾸고 뒤에 나머지는 안바꿈

// replaceAll() : 모든 특정 문자열을 찾아서 지정한 문자열로 바꿈
str = 'abcdefg dede';
str.replaceAll('de', '안녕') // abc안녕fg 안녕안녕 가 출력됨

// substring(시작위치, 끝나는위치) : 시작 인덱스부터 종료 인덱스까지 자른 문자열을 반환
str = '안녕하세요. JavaScript입니다.';
str.substring(0, 3); // 안녕하 출력
str.substring(7, 17); // JavaScript 출력

// 사용법
let pattern = 'JavaScript' // 원하는 문자 입력
let patternIndex = str.indexOf(pattern); // pattern의 시작부분(j)을 str에서 찾아서 index값(7)을 가져옴
let result = str.substring(patternIndex, patternIndex + pattern.length);

// split() : separator를 기준으로 문자열을 잘라서 배열 요소로 담은 배열을 반환
str = '빵, 돼지숯불, 제육, 돈까스';
str.split(', '); // ', '를 기준으로 잘라서 배열로 만들어 줌
str.split(', ', 2); // 배열 길이를 2로 제한

// trim() : 좌우의 공백을 제거해서 문자열을 만들어줌
str= '    sadasda   ';
str.trim();

// toUpperCase(), toLowerCase() : 알파벳을 대/소문자로 바꿔서 출력
str = 'aBcD';
str.toUpperCase(); // 'ABCD'
str.toLowerCase(); // 'abcd'

