import  VueRouter from 'vue-router';
import Vue from 'vue';
import dashboard from './components/dashboard';
import login from './components/login';
import register from './components/register';
import profile from './components/profile';
import edit_profile from './components/edit_profile';
import change_password from './components/change_password';



Vue.use(VueRouter);


function guardMyroute(to, from, next)
{
    var isAuthenticated= false;
    //var session = this.$session.get('email');

    if(localStorage.getItem('email'))
      isAuthenticated = true;
    else
        isAuthenticated= false;

    if(isAuthenticated) 
    {
      next(); // allow to enter route
    } 
    else
    {
      next('/'); // go to '/login';
    }
}

const routes = [
    {path:'/dashboard',beforeEnter : guardMyroute, component:dashboard},
    {path:'/', component:login},
    {path:'/register', component:register},
    {path:'/profile', component:profile},
    {path:'/edit-profile', component:edit_profile},
    {path:'/change-password', component:change_password},
    
]

const router = new VueRouter({
    routes
});

export default router