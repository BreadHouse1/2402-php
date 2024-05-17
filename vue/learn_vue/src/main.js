import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import  Store  from './store.js'


// createApp(App).mount('#app')
createApp(App).use(router).use(Store).mount('#app')
