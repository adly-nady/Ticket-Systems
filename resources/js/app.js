require('./bootstrap');

window.Vue = require('vue').default;


import VueRouter from 'vue-router';
Vue.use(VueRouter);


const router = new VueRouter({ routes:[
    {
        path:'/',
        component:require('./components/ExampleComponent4.vue').default
    },
    {
        path:'/Create-user',
        component:require('./components/create_user.vue').default
    },
    {
        path:'/Create-ticket',
        component:require('./components/create_ticket.vue').default
    },
    {
        path:'/List-Tickets',
        component:require('./components/all_ticket.vue').default
    },
    {
        path:'/My-Information',
        component:require('./components/my_information.vue').default
    }
]});

const app = new Vue({
    el: '#app',router
});
