// Axios

// HTTP STATUS가 200번대나 300번대가 아닌경우 reject상태로 진입
// 성공할경우 보통 200 반환

// axios.get('https://picsum.photos/v2/list?page=1&limit=5')
// .then(response => { // 위의 처리가 성공적으로 끝나고 나온 값은 모드 response(변수)에 다 담김
//     console.log(response); // 값 출력
//     console.log(response.data); // 값안의 data(배열로 돼 있음)만 출력
// })
// .catch(err => console.log(err)) // get의 처리를 못 했을때
// .finally(() => console.log('파이널리'))
// ;

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
    console.log(data);
    data.forEach(item => {
        // 부모요소 접근
        const CONTAINER = document.querySelector('.img-container');

        // img 태그 생성
        const ADD_IMG = document.createElement('img');
        ADD_IMG.setAttribute('src', item.download_url); // src에 item 안의 download_url을 입력 
        ADD_IMG.style = 'width: 200px; height: 200px;';

        CONTAINER.appendChild(ADD_IMG);
    })
}

// API호출 버튼 이벤트
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', myAxiosGet);