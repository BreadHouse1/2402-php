const BTN_API = document.querySelector('#btn-api');
const BTN_DEL = document.querySelector('#btn-del');
const CONTAINER = document.querySelector('.img-container');


function myAxiosGet() {
    // URL 획득
    const URL = document.querySelector('#input-url').value; // input-url의 값(value)만 저장

    // Axios 처리
    axios.get(URL) // 외부서버에 처리 요청
    .then(response => { // 처리 성공시 값을 response에 저장
        myMakeImg(response.data) // myMakeImg에 response.data(배열)의 값을 던져줌
    })
    .catch(err => console.log(err))
}

// 사진 데이터를 화면에 추가하는 함수
function myMakeImg(data) { // response.data의 값이 data에 담김
    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.img-container');

        // img 태그 생성
        const ADD_DIV = document.createElement('div');
        const ADD_IMG = document.createElement('img');
        const ADD_ID = document.createElement('p');

        ADD_ID.innerHTML = item.id; // src에 item 안의 download_url을 입력 
        ADD_IMG.setAttribute('src', item.download_url); // src에 item 안의 download_url을 입력

        
        ADD_IMG.style = 'width: 100%; height: 90%;';
        ADD_ID.style = 'text-align: center; font-size: 1.5rem;';

        CONTAINER.appendChild(ADD_DIV);
        ADD_DIV.appendChild(ADD_ID);
        ADD_DIV.appendChild(ADD_IMG);
    })
}


// API호출 버튼 이벤트
BTN_API.addEventListener('click', myAxiosGet);

BTN_DEL.addEventListener('click', () => {
    CONTAINER.textContent = '';
});


