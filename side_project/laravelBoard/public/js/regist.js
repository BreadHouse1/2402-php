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
    ,pwChk: false
    ,nameChk: false
    ,ChkEmailInput: ""
    ,ChkEmailValue: ""
};

// let ChkEmailInput = "";
// let ChkEmailValue = "";


function emailChk(e) {
    // 형식에 맞으면 중복확인 활성화 
    const btnChkEmail = document.querySelector('#btn-chk-email');
    const printChkEmail = document.querySelector('#print-chk-email-oninput');
    const btnComplete = document.querySelector('#my-btn-complete');
    const chkEmail = /^[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}@[0-9a-zA-Z](?!.*?[\-\_\.]{2})[a-zA-Z0-9\-\_\.]{3,63}\.[a-zA-Z]{2,3}$/;
    const printChkEmailInput = document.querySelector('#print-chk-email');
    ChkEmailPw.ChkEmailValue = e.value;
    
    if(chkEmail.test(e.value)) {
        btnChkEmail.removeAttribute('disabled');
        printChkEmail.innerHTML = '중복확인을 해주세요.<br>';
    }
    else {
        printChkEmail.innerHTML = '이메일 형식에 맞지않습니다.<br>'
        printChkEmail.classList = 'text-danger';
        btnComplete.setAttribute('disabled', 'disabled');
        btnChkEmail.setAttribute('disabled', 'disabled');
    }

    if(ChkEmailPw.ChkEmailValue !== ChkEmailPw.ChkEmailInput) {
        btnComplete.setAttribute('disabled', 'disabled');
        printChkEmailInput.innerHTML = '';
    }
}

async function chkEmail() {

    try {
        const email = document.querySelector('#email').value;
        const url = '/user/chk';
        const printChkEmailInput = document.querySelector('#print-chk-email-oninput');
    
        // form생성
        const form = new FormData();
        form.append('email', email);
    
        // ajax처리
        const response = await axios.post(url, form);

        const btnComplete = document.querySelector('#my-btn-complete');
        const printChkEmail = document.querySelector('#print-chk-email');
        printChkEmail.innerHTML = '';
        // 정상 처리
        if(response.data.emailFlg) {
            // 중복 이메일
            printChkEmail.innerHTML = '사용불가';
            printChkEmail.classList = 'text-danger';
            ChkEmailPw.emailChk = false;
            printChkEmailInput.innerHTML = '현재 사용중인 이메일 입니다.<br>';
            btnComplete.setAttribute('disabled', 'disabled');

        }
        else {
            // 사용 가능 이메일
            printChkEmail.innerHTML = '사용가능';
            printChkEmail.classList = 'text-success';
            printChkEmailInput.innerHTML = '사용가능한 이메일 입니다.<br>';
            printChkEmailInput.classList = 'text-success';
            // btnComplete.removeAttribute('disabled');
            ChkEmailPw.emailChk = true;
            allChk();
        }

    }
    catch (error) {
        console.log(error);
        alert('회원가입 실패');
    }
}

function passwordChk() {
    const password = document.querySelector('#password').value;
    const passwordChk = document.querySelector('#password_chk').value;
    const passwordChkText = document.querySelector('#print-chk-password');
    const btnComplete = document.querySelector('#my-btn-complete');


    if(password !== passwordChk) {
        passwordChkText.innerHTML = "비밀번호가 일치하지 않습니다.<br>";
        passwordChkText.classList = 'text-danger';
        btnComplete.setAttribute('disabled', 'disabled');
    } else {
        passwordChkText.innerHTML = "비밀번호가 일치합니다.<br>";
        passwordChkText.classList = 'text-success';
        ChkEmailPw.pwChk = true;
        if(password === "" && passwordChk === "") {
            passwordChkText.innerHTML = "";
            ChkEmailPw.pwChk = false;
            btnComplete.setAttribute('disabled', 'disabled');
        }
        // btnComplete.removeAttribute('disabled');
        allChk();
    }
}

function nameChk(e) {
    const name = e.value;
    const patternName = /^[가-힣]{1,50}$/u;
    const nameChkText = document.querySelector('#print-chk-name');
    const btnComplete = document.querySelector('#my-btn-complete');

    if (patternName.test(name)) {
        nameChkText.innerHTML = "유효한 이름입니다.<br>";
        nameChkText.classList = 'text-success';
        ChkEmailPw.nameChk = true;
        allChk();
    } else if (!patternName.test(name)) {
        nameChkText.innerHTML = "유효하지 않은 이름입니다.<br>";
        nameChkText.classList = 'text-danger';
        ChkEmailPw.nameChk = false;
        btnComplete.setAttribute('disabled', 'disabled');
    }
}

function allChk() {
    if(ChkEmailPw.pwChk && ChkEmailPw.emailChk && ChkEmailPw.nameChk) {
        const btnComplete = document.querySelector('#my-btn-complete');
        btnComplete.removeAttribute('disabled');
    }
}