require('./bootstrap');

import{ createApp} from 'vue';
import AppComponent from '../components/AppComponent.vue';
import store from './store';
import router from './router';

createApp({
    components: {
        AppComponent,
    }
})
.use(store)
.use(router)
.mount('#app'); // id가 app인 요소에 위의 설정들을 주입시킴 app은 welcome에 설정돼있음