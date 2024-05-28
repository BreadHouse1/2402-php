import { createStore } from 'vuex';
import router from './router';

const store = createStore({
    state() {
        return {
            authFlg: document.cookie.indexOf('auth=') >= 0 ? true : false,
            userInfo: localStorage.getItem('userInfo') ? JSON.parse(localStorage.getItem('userInfo')) : null,
            boardData: [],
            moreBoardFlg: true,
        }
    },
    mutations: {
        // 인증 플래그 저장
        setAuthFlg(state, flg) {
            state.authFlg = flg
        },

        //  유저 정보 저장
        setUserInfo(state, userInfo) {
            state.userInfo= userInfo
        },

        // 게시글 초기 삽입
        setBoardData(state, data) {
            state.boardData = data
        },

        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg
        },

        // 게시글 추가
        setMoreBoardData(state, data) {
            state.boardData = [...state.boardData, ...data]
        },

    },
    actions: {
            /**
             * 로그인 처리
             * 
             * @param {store} context
             */
            login(context) {
                const url = '/api/login';
                const form = document.querySelector('#loginForm');
                const data = new FormData(form);

                axios.post(url, data)
                .then(response => {
                    console.log(response.data); // TODO
                    localStorage.setItem('userInfo', JSON.stringify(response.data.data));
                    context.commit('setUserInfo', response.data.data);
                    context.commit('setAuthFlg', true);

                    router.replace('/board');
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('로그인에 실패했습니다. (' + error.response.data.code +')');
                });
            },

            /**
             * 로그아웃 처리
             * 
             */
            logout(context) {
                const url = '/api/logout';

                axios.post(url)
                .then(response => {
                    console.log(response.data) // TODO
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('문제가 발생해 강제 로그아웃합니다. (' + error.response.data.code +')');
                })
                .finally(() => {
                    localStorage.clear();

                    context.commit('setAuthFlg', false);
                    context.commit('setUserInfo', null);

                    router.replace('/login');
                }
                );
            },

            /**
             * 최초 게시글 획득
             * 
             * @param {*} context
             */

            getBoardData(context) {
                const url = '/api/board';

                axios.get(url)
                .then( response => {
                    console.log(response); // TODO
                    context.commit('setBoardData', response.data.data);
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('게시글 습득에 실패했습니다. ( ' + error.response.data.code + ') ');
                });
            },

            /**
             * 추가 게시글 획득
             * 
             * @param {*} context
             */
            getMoreBoardData(context) {
                
                const lastItem = context.state.boardData[context.state.boardData.length -1];
                const url = '/api/board/' + lastItem.id;

                axios.get(url)
                .then(response => {
                    console.log(response); // TODO
                    context.commit('setMoreBoardData', response.data.data);

                    // 더보기 버튼 플래그 갱신
                    if(response.data.data.length < 20) {
                        context.commit('setMoreBoardFlg', false);
                    }
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('추가 게시글 습득에 실패했습니다. ( ' + error.response.data.code + ') ');
                });
            },
        }
});

export default store;
