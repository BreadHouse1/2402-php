// 이벤트

// 인라인 이벤트 : html 에도 onclick을 줘야해서 관리가 귀찮아짐
// 자주사용 X 

function myAlert() {
    alert('안녕하세요. myalert'); // alert('내용') 알림창을 띄우는 내장 함수
}

// 프로퍼티 리스너 : js에서 한번에 관리 할 수 있어서 편함
// 이벤트를 여러개 만들기가 힘듦, 많아질수록 관리하기도 힘듦
// 자주 사용 X
const btn2 = document.querySelector('#btn2');
// btn2.onclick = () => (alert('안녕하세요.'));
btn2.onclick = myAlert; // myAlert() 로 쓰면 바로 실행이 돼서 콜백함수로 적어야함

// addEventListener(어떤동작시 실행할지, 실행시킬 함수)
// 이벤트 여러개 작성 가능 현업에서 많이 사용
const BTN3 = document.querySelector('#btn3');
BTN3.addEventListener('click', () => (alert('버튼3')));
BTN3.addEventListener('click', test);

// removeEventListener() : 이벤트 제거
// 사용시 삭제할 addEventListener의 코드와 완전일치해야하는데 예를들어 만약
// BTN3.addEventListener('click', () => (alert('버튼3'))); 처럼 콜백함수를 직접 작성시
// removeEventListener 에서 사용한 콜백함수랑은 별개의 함수이기 때문에 삭제가 안됨
BTN3.removeEventListener('click',test);

function test() {
    alert('test함수 알러트');
}

// ----------
// 이벤트 객체
// ----------

const BTN4 = document.querySelector('#btn4');
BTN4.addEventListener('click', e => {
    console.log(e);
    console.log(e.target.value);
    e.target.style.color = 'red';
});

// ----------------------------------------
// 팝업
const BTN_POPUP = document.querySelector('#popup');
BTN_POPUP.addEventListener('click', () => {
    window.open('https://naver.com',' ','width=500, height=500'); // window생략가능
});

// 그냥쓰면 창을 킬때 바로 켜짐
// open('./39_event.html');

// 모달창
const BTN_MODAL = document.querySelector('#btn-modal');
BTN_MODAL.addEventListener('click', toggleModalContainer );

function toggleModalContainer() {
    const MODAL_CONTALINER = document.querySelector('.modal-container');
    MODAL_CONTALINER.classList.toggle('display-none');
}

// 모달 외부 영역 클릭시 모달 닫기
const MODAL_CONTALINER = document.querySelector('.modal-container');
MODAL_CONTALINER.addEventListener('click', toggleModalContainer);

// 모달아이템 영역 눌렀을 때 안꺼지게 하는법
const TEST = document.querySelector('.modal-item');
TEST.addEventListener('click', toggleModalContainer);

// 마우스를 눌렀을 때 이벤트 (누르기만해도 동작, click은 누르고 떼야 동작)
const H1 = document.querySelector('h1');
H1.addEventListener('mousedown', e => {
    e.target.style.backgroundColor = 'red';
});

// 마우스를 땠을 때 이벤트
H1.addEventListener('mouseup', e => {
    e.target.style.backgroundColor = '#fff';
});

// 마우스 포인터가 진입 했을 때 이벤트
H1.addEventListener('mouseenter', e => {
    e.target.style.color = 'aqua';
});

// 마우스 포인터가 벗어 났을 때 이벤트
H1.addEventListener('mouseleave', e => {
    e.target.style.color = '#000';
});