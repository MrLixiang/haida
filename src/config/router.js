import Vue from 'vue'
import VueRouter from 'vue-router'

import Login from '../pages/login.vue'
import Register from '../pages/register.vue'
import Home from '../pages/home.vue'
import User from '../pages/user.vue'
import Order from '../pages/order.vue'
import proCategories from '../pages/pro_categories.vue'
import proList from '../pages/pro_list.vue'
import proSearch from '../pages/pro_search.vue'
import proDetails from '../pages/pro_details.vue'
import shopCart from '../pages/shop_cart.vue'
import confirmOrder from '../pages/confirm_order.vue'


Vue.use(VueRouter)

export default new VueRouter({
  routes: [
    {
      path: '/',
      redirect : 'login'
    },
    {
      path: '/login',
      name: 'login',
      component: Login,
    },
    {
      path: '/register',
      name: 'register',
      component: Register,
    },
    {
      path: '/home',
      name: 'home',
      component: Home,
    },
    {
      path: '/user',
      name: 'user',
      component: User,
    },
    {
      path: '/order',
      name: 'order',
      component: Order,
    },
    {
      path: '/proCategories',
      name: 'proCategories',
      component: proCategories,
    },
    {
      path: '/proList',
      name: 'proList',
      component: proList,
    },
    {
      path: '/proSearch',
      name: 'proSearch',
      component: proSearch,
    },
    {
      path: '/proDetails',
      name: 'proDetails',
      component: proDetails,
    },
    {
      path: '/shopCart',
      name: 'shopCart',
      component: shopCart,
    },
    {
      path: '/confirmOrder',
      name: 'confirmOrder',
      component: confirmOrder,
    },
  ]
})
