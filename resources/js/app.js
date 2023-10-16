import { createApp } from 'vue'
import App from './components/App.vue'
import { createRouter, createWebHistory } from 'vue-router'
import userRoutes from './routes/usersRoutes'
import companyRoutes from './routes/companiesRoutes'
import VueTheMask from 'vue-the-mask'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    ...userRoutes,
    ...companyRoutes
  ]
})

createApp(App)
  .use(router)
  .use(VueTheMask)
  .mount('#app')
