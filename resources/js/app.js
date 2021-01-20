import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMeta from 'vue-meta'

import CompaniesIndex from './views/companies-index'
import CompaniesShow from './views/companies-show'


Vue.use(VueRouter)
Vue.use(VueMeta)


const routes = [
    {path: '/companies', component: CompaniesIndex},
    {path: '/companies/:id', component: CompaniesShow},
    {path: '*', redirect: '/companies'}
]


const router = new VueRouter({
    routes // short for `routes: routes`
})

const app = new Vue({
    router
}).$mount('#app')
