import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import RegistrationComponent from '../components/RegistrationComponent.vue';
import store from './store';

const routes = [
		{
            path: '/',
            redirect: '/login',
        },
        {
            path: '/login',
            component: LoginComponent,
            beforeEnter: chkAuthon,
        },
        {
            path: '/board',
            component: BoardComponent,
            beforeEnter: chkAuth,
        },
        {
            path: '/board/create',
            component: BoardCreateComponent,
            beforeEnter: chkAuth,
        },
        {
            path: '/registration',
            component: RegistrationComponent,
            beforeEnter: chkAuthon,
        },
        {
            path: '/board/:id',
            component: BoardComponent,
            beforeEnter: (to, from, next) => {
                const id = to.params.id;
                store.dispatch('userBoardPage', id);
                console.log('라우터 : ',id);
                next();
            }
        },
];

function chkAuth(to, from, next) {
    if(store.state.authFlg) {
        next();
    } else {
        alert('로그인이 필요한 서비스입니다.');
        next('/login');
    }
}

function chkAuthon(to, from, next) {
    if(!(store.state.authFlg)) {
        next();
    } else {
        alert('로그인 상태에서는 접속 할 수 없습니다.');
        next('/board');
    }
}

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;