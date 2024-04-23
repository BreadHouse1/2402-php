// Date 객체

// 요일 한글로 변환
const changeDayToKoreanDay = num => {
    switch(num) {
        case 0:
            return '일요일';
        case 1:
            return '월요일';
        case 2:
            return '화요일';
        case 3:
            return '수요일';
        case 4:
            return '목요일';
        case 5:
            return '금요일';
        case 6:
            return '토요일';
    }
}

// 앞에 0을 추가해주는 함수
const lpadZero = (val, length) => { // val : 가져올 값, length : 붙이고 싶은 0의 갯수
    return String(val).padStart(length, '0')
}

// 현재날짜 / 시간 획득
const NOW = new Date(); // 요일, 월, 일, 년도, 시간 으로 뜸

// getFullYear() : 연도만 가져오는 메소드 (yyyy)
const YEAR = NOW.getFullYear(); // 현재 연도

// getMonth() : 월만 가져오는 메소드, 0 ~ 11을 획득 0 ~ 11 이라 +1을 붙여줘야함
const MONTH = lpadZero(NOW.getMonth() + 1, 2); // 현재 월

// getDate() : 일(날짜)을 가져오는 메소드
const DATE = lpadZero(NOW.getDate(), 2); // 현재 날짜

// getHours() : 시를 가져오는 메소드
const HOUR = lpadZero(NOW.getHours(), 2); // 현재 시

// getMinutes() : 분을 가져오는 메소드
const MINUTE = lpadZero(NOW.getMinutes(), 2); // 현재 분

// getseconds() : 초를 가져오는 메소드
const SECOND = lpadZero(NOW.getSeconds(), 2); // 현재 초

// getMilliseconds() : 미리초를 가져오는 메소드
const MILLISECONDS = NOW.getMilliseconds(); // 현재 미리초

// getDay() : 요일을 가져오는 메소드, 0(일) ~ 6(토)으로 가져옴
const DAY = NOW.getDay();

// 보기 편하게 출력
const FOMAT_DATE = `${YEAR}-${MONTH}-${DATE} ${HOUR}:${MINUTE}:${SECOND}, ${changeDayToKoreanDay(DAY)}`; // 연도 - 월 - 일 시 : 분 : 초 로 나옴

console.log(FOMAT_DATE);

// 현재 날짜(0423)에서 과거날짜(0403)까지 며칠 차이나는지 구하기 
// getTime() : UNIX 타임스탬프를 반환
const TIME = NOW.getTime();

// 일수 차이
const TARGET_DATE = new Date('2024-04-03 00:00:00');

// 1000*60*60*24 = 86400
const DIFF_DATE = Math.floor(Math.abs(TARGET_DATE - NOW) / 86400000);

// 2024-01-01 13:00:00과 2025-05-30 00:00:00은 몇개월 후 입니까
const TEST_TARGET_DATE = new Date('2025-05-30 00:00:00');
const TEST_DATE = new Date('2024-01-01 13:00:00');

const NEW_DIFF_DATE = Math.floor((NEW_TEST_DATE - TEST_DATE) / 2592000000);