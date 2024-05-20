import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'



const app = createApp(App)

app.use(router)

app.mount('#app')
//Tất cả những gì trong App.vue, khi được khai báo sẽ được map vào index.html
