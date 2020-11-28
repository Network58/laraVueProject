import Vue from 'vue'
import Router from 'vue-router'

Vue.use (Router)



import home from './components/pages/home.vue'
import signup from './components/pages/signup.vue'
import adminP from './components/pages/adminPage.vue'
import login from './components/pages/login.vue'
import hotels from './components/pages/hotels.vue'
import hotelRoom from './components/pages/hotelRooms.vue'
import addRoom from './components/pages/addRoom.vue'

const routes = [
    //projectroutes

   {
        path:'/',
        component: home,
        name: 'home' 
    },
   {
        path:'/signup',
        component: signup,
        name: 'signup' 
    },
   {
        path:'/admin',
        component: adminP,
        name: 'adminP' 
    },
   {
        path:'/login',
        component: login,
        name: 'login' 
    },
   {
        path:'/hotels/:id',
        component: hotels,
        name: 'hotels' 
    },
   {
        path:'/hotel-room/:id',
        component: hotelRoom,
        name: 'hotelRoom' 
    },
   {
        path:'/add-room/:id',
        component: addRoom,
        name: 'addRoom' 
    },
    
    
]

 export default new Router ({
     mode:'history',
     routes
 })