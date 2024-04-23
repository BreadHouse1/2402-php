// 요소 선택

// 고유한 id로 요소를 선택하는 법
const TITLE = document.getElementById('title');

TITLE.style.color = 'blue'; // html의 id tilte 값의 색깔 변경

// 태그명으로 요소를 선택하는 방법
const H1 = document.getElementsByTagName('h1');

// 태그가 여러개 사용 중일 경우 위부터 아래의 순서대로 배열로 들어감
// 잘 안씀
H1[1].style = 'color: green; font-size: 3rem;';

// 클래스 요소를 선택하는 방법
// 태그명과 마찬가지로 위에서 아래순서로 배열로 가져옴
// 잘 안씀
const CLASS_ELE = document.getElementsByClassName('none-li');

// CSS 선택자를 이용해서 요소를 선택
// 첫번째 한개만 선택 가능
// 자주 씀
const CSS_ID = document.querySelector('#title');

CSS_ID.style = 'color: yellow';

// CSS 선택자를 이용해서 모든 요소를 선택
// 배열에 저장
const CSS_CLS_ALL = document.querySelectorAll('li');

CSS_CLS_ALL[1].style = 'color: green';

// 전체 사용
// 배열의 값을 순서대로 node 에 담고 color red를 처리하고 다음 요소를 다시 node에 넣는다 반복
CSS_CLS_ALL.forEach(node => node.style.color = 'red');

// 지뢰찾기만 선택
// tagname 사용
const test = document.getElementsByTagName('li');

test[1].style.fontSize = '3rem';

// 쿼리셀렉터로 ul의 li 선택
// ul의 자식 요소인 li 에서 2번째 요소를 가져옴
// li의 / nth-child(n) : 몇번째선택할지
const SECOND_CHILD = document.querySelector('#ul > li:nth-child(3)');

SECOND_CHILD.style = 'color: blue';

// 요소 조작

// textContent : content를 바꿈
// 태그는 들어가지않음 <a>텍스트 컨텐츠로 바꿈</a>그대로 출력
TITLE.textContent = '<a>텍스트 컨텐츠로 바꿈</a>'; 

// innerHTML
// 태그도 들어감
TITLE.innerHTML = '<a href=http://www.naver.com>asdf</a>'

// setAttribute(속성명, 값) : 해당 속성과 값을 요소에 추가
const INPUT1 = document.getElementById('input1');
INPUT1.setAttribute('placeholder', '값값값');
INPUT1.setAttribute('name', 'input1');

// removeAttribute(속성명) : 해당 속성을 요소에서 제거
INPUT1.removeAttribute('placeholder');

// 요소 스타일링
// classList : 클래스로 스타일에 맞게 추가 및 수정
// add 추가
TITLE.classList.add('font-color-red', 'css1', 'css2') // 여러개도 추가 가능

//제거
TITLE.classList.remove('font-color-red');

// classList.toggle() : 해당 클래스를 토글
TITLE.classList.toggle('none');

// 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정

CSS_CLS_ALL.forEach((node, key) => {
    if (key % 2 === 0) {
        node.style.color = 'red';
    } else {
        node.style.color = 'blue';
    }
});

// ex) 리스트의 요소들의 글자색을 짝수는 빨강, 홀수는 파랑으로 수정
// 짝수
const EVEN_CHILD = document.querySelectorAll('#ul > li:nth-child(even)'); //li:nth-child(even) 여기서 even은 짝수의 값만 들고오는 코드
EVEN_CHILD.forEach(node => node.style.color = 'red');
// 홀수
const ODD_CHILD = document.querySelectorAll('#ul > li:nth-child(odd)'); // odd는 홀수만 가져오는 코드
ODD_CHILD.forEach(node => node.style.color = 'blue');