// AJAX 처리
// document.querySelector('#btn-chk-email').addEventListener('click', chkEmail);

// async function chkEmail() {

//     try {
//         const email = document.querySelector('#email').value;
//         const url = '/user/chk';
    
//         // form생성
//         const form = new FormData();
//         form.append('email', email);
    
//         // ajax처리
//         const response = await axios.post(url, form);

//         const btnComplete = document.querySelector('#my-btn-complete')
//         const printChkEmail = document.querySelector('#print-chk-email');
//         printChkEmail.innerHTML = '';
//         // 정상 처리
//         if(response.data.emailFlg) {
//             // 중복 이메일
//             printChkEmail.innerHTML = '사용불가';
//             printChkEmail.classList = 'text-danger';
//             btnComplete.setAttribute('disabled', 'disabled');
//         }
//         else {
//             // 사용 가능 이메일
//             printChkEmail.innerHTML = '사용가능';
//             printChkEmail.classList = 'text-success';
//             btnComplete.removeAttribute('disabled');
//         }

//     }
//     catch (error) {
//         console.log(error);
//         alert('회원가입 실패');
//     }
// }

document.querySelector('#btn-chk-email').addEventListener('click', chkEmail);
let ChkEmailPw = {
    emailChk: false
    // ,pwChk: false
    // ,nameChk: false
    // ,pwChk
};

async function chkEmail() {

    try {
        const email = document.querySelector('#email').value;
        const url = '/user/chk';
    
        // form생성
        const form = new FormData();
        form.append('email', email);
    
        // ajax처리
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete')
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger';
            // btnComplete.setAttribute('disabled', 'disabled');

        }
        else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success';
            // btnComplete.removeAttribute('disabled');
            ChkEmailPw.emailChk = true;
        }

    }
    catch (error) {
        console.log(error);
        alert('회원가입 실패');
    }
}

function passwordChk(e) {
    const password = document.querySelector('#password').value;
    const passwordChk = e.value;
    const passwordChkText = document.querySelector('#print-chk-password');
    const btnComplete = document.querySelector('#my-btn-complete');

    if(password !== passwordChk) {
        passwordChkText.innerHTML = "비밀번호가 일치하지 않습니다.<br>";
        passwordChkText.classList = 'text-danger';
        btnComplete.setAttribute('disabled', 'disabled')
    } else {
        passwordChkText.innerHTML = "비밀번호가 일치합니다.<br>";
        passwordChkText.classList = 'text-success';
        if(ChkEmailPw.emailChk) {
            btnComplete.removeAttribute('disabled');
        }
    }
}
        