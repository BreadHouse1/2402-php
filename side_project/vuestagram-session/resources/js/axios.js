import axios from 'axios';

const axiosInstance = axios.reate ({
    // 기본 헤던 설정
    headers: {
        'X-CSRF = TOKEN': document.querySelector('meta[name="csrf-token"]').getAttrivute('content'),
    },
    // axios로 API요청 할 때, 세션쿠키가 포함되도록하는 설정
    withCredentials: true,
});