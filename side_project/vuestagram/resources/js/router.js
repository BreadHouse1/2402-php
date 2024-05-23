import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent';
import BoardComponent from '../components/BoardComponent';
import BoardCreateComponent from '../components/BoardCreateComponent.vue';
import store from './store';

function chkAuth(to, from, next) {
    if(!store.state.authFlg) {
        next('/login');
    }
    next();
}

function chkAuthReturn(to, from, next) {
    if(to.path === '/login' && store.state.authFlg) {
        if(from.path === '/'){
            next('board');
        }
        next(from.path);
    }
    next();
}

const routes = [
    {
        path: '/',
        redirect: '/login',
    },
    {
        path: '/login',
        component: LoginComponent,
        beforeEnter: chkAuthReturn,
    },
    {
        path: '/board',
        component: BoardComponent,
        beforeEnter: chkAuth,
    },
    {
        path: '/create',
        component: BoardCreateComponent,
        beforeEnter: chkAuth,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

export default router;