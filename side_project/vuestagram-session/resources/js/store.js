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
        setUserBoardsCount(state) {
            state.userInfo.boards_count++;
        },

        // 게시글 초기 삽입
        setBoardData(state, data) {
            state.boardData = [...data]
            console.log(state.userInfo.id);
        },

        // 더보기 버튼 플래그
        setMoreBoardFlg(state, flg) {
            state.moreBoardFlg = flg
        },

        // 게시글 추가
        setMoreBoardData(state, data) {
            state.boardData = [...state.boardData, ...data]
        },
        setUnshiftBoardList(state, data) {
            state.boardData.unshift(data);
        },

        // 게시글 빼기
        setUserBoardData(state, index) {
            console.log(state.boardData)
            state.boardData.splice(index, 1);
            console.log(state.boardData)
        },
        setUserBoardsCountSub(state) {
            state.userInfo.boards_count--;
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
                    // console.log(response.data); // TODO
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
                    context.commit('setBoardData', [])
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
                    // console.log(response); // TODO
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
                    // console.log(response); // TODO
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

            /**
             * 회원가입 처리
             * 
             * @param {*} context 
             * 
             * @return 
             */
            registration(context) {
                const url = '/api/registration';
                const data = new FormData(document.querySelector('#registrationForm'));

                axios.post(url, data)
                .then(response => {
                    console.log(response)

                    router.replace('/login')
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('회원가입에 실패했습니다. ( ' + error.response.data.code + ') ');
                });
            },

            /**
             * 글 작성 처리
             */
            createBoard(context) {
                const url = '/api/createBoard';
                const data = new FormData(document.querySelector('#boardCreateForm'));

                axios.post(url, data)
                .then(response => {
                    // console.log(response)

                    if(context.state.boardData.length > 1) {
                        // 보드리스트의 가장 앞에 작성한 글 정보 추가
                        context.commit('setUnshiftBoardList', response.data.data);
                        // console.log(response.data);
                    }
                    // 유저의 작성글 수 1 증가
                    context.commit('setUserBoardsCount');
                    localStorage.setItem('userInfo', JSON.stringify(context.state.userInfo));

                    router.replace('/board')
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('글 작성에 실패했습니다. ( ' + error.response.data.code + ') ');
                });
            },

            /**
             * 글 삭제 처리
             */
            deleteBtn(context, id) {
                const url = '/api/delete/' + id;

                axios.delete(url)
                .then(response => {
                    console.log(response.data.data)
                    console.log(typeof(response.data.data))

                    context.state.boardData.forEach((item, key) => {
                        if(item.id == response.data.data) {
                            context.commit('setUserBoardData', key)
                            return false;
                        }
                    });
                    
                    // 유저의 작성글 수 1 하락
                    context.commit('setUserBoardsCountSub');
                    localStorage.setItem('userInfo', JSON.stringify(context.state.userInfo));

                    router.replace('/board')
                })
                .catch(error => {
                    console.log(error.response); // TODO
                    alert('글 삭제에 실패했습니다. ( ' + error.response.data.code + ') ');
                });
            },

            /**
             * 좋아요 처리
             */
            // upLike(context, id) {
            //     const url = '/api/like/' + id;

            //     axios.update(url)
            //     .then(response => {
                    
            //     })
            //     .catch()
            // }

            /**
             * 해당 유저 게시글만 가져오기
             */
            async userBoardPage(context, id) {
                const url = '/api/userboard/' + id;
                
                console.log('userBoardPage : ',url)

                axios.get(url)
                .then(response => {
                    console.log(response.data)
                    context.commit('setBoardData', response.data.data);
                })
                .catch();

                // const res = await axios.get(url);
                // console.log('userBoardPage : ',res.data)
                // context.commit('setBoardData', res.data.data);

            }
        }
});

export default store;
