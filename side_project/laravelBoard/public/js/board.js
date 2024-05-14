// AJAX 처리
document.querySelectorAll(".my-btn-detail").forEach( item => {
    item.addEventListener('click', () => {
        const url = '/board/' + item.value;
        console.log(url)
        axios.get(url)
        .then(response => {
            const data = response.data;

            const btnDelete = document.querySelector('#my-btn-delete'); // 삭제 버튼
            const modalTitle = document.querySelector('.modal-title'); // 제목 노드
            const modalContent = document.querySelector('.modal-body > p'); // 내용 노드
            const modalImg = document.querySelector('.modal-body > img'); // 이미지 노드

            // 상세 정보 셋팅
            
            modalTitle.textContent = data.title;
            modalContent.textContent = data.content;
            modalImg.src = data.img;
            
            // 삭제 버튼 셋팅

            // auth_id 는 접속중인 id이고 user_id는 글을 등록했을때 저장된 유저id이다
            if(data.auth_id !== data.user_id) {
                btnDelete.classList.add('d-none');
                btnDelete.value = '';
            }
            else {
                btnDelete.classList.remove('d-none');
                btnDelete.value = data.id; 
            }
        })
        .catch(err => console.log(err));
    });
});


// 삭제 처리 (async로 한번 해보자)

// 삭제 버튼을 클릭을 할 때 정보가 myDeleteCard(e)로 넘어감
document.querySelector('#my-btn-delete').addEventListener('click', myDeleteCard );

function myDeleteCard(e) {
    const url = '/board/' + e.target.value; // url
    
    // Ajax 처리
    axios.delete(url)
    .then(response => {
        // 예외 발생
        if(response.data.errorFlg) {
            alert('삭제에 실패 했습니다.');
        }
        else {
            // 정상 처리
            const main = document.querySelector('main');
            const card = document.querySelector('#card' + response.data.deletedId);

            main.removeChild(card);
        }
    })
    .catch();
}
// async function myDeleteCard(e) {
//     // console.log(e.target.value); / 삭제를 누른 해당 카드의 id를 확인할수있다

//     const url = '/board/delete'; // url 설정
//     const data = new FormData(); // form 생성

//     data.append('b_id', e.target.value); // b_id 셋팅

//     try {

//         const response = await axios.post(url, data);
//         // response.data = ['errorFlg': false, 'errorMsg': '', 'b_id' : 16]
//         console.log(response);
//         if(response.data.errorFlg) {
//             // 에러일 경우
//             alert('삭제에 실패 했습니다.');
//         }
//         else {
//             // 정상일 경우
//             const main = document.querySelector('main'); // 부모 요소
//             const card = document.querySelector('#card' + response.data.b_id); // 삭제할 요소
//             main.removeChild(card);
//         }
//     }
//     catch (error) {
//         console.log(error);
//     }
// }
