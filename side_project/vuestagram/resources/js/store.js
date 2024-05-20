import { createStore } from 'vuex';

const store = createStore({
    state() {
        return {

        }
    },
    mutations: {
        
    },
    actions: {
        //--------
        // 인증관련
        //--------
        /**
         * 
         * @param {*} context 
         * @param {*} userInfo 
         */

        // store의 객체가 들어옴, 우리가 보낸 데이터
        login(context, userInfo) {
            console.log(JSON.stringify(userInfo));
            const url = '/api/login';
        }
    }
});

export default store;