import Calendar from '../components/VueRoutes/Calendar.vue';
import Welcome from '../components/VueRoutes/Welcome.vue';
import Login from '../components/VueRoutes/Login.vue';
import SideBar from '../components/VueRoutes/SideBar.vue';

export default {
    mode: 'history',
    routes: [{
            path: '/lab/calendar',
            name: 'Calendar',
            component: Calendar,
        },
        {
            path: '/lab/SideBar',
            name: 'SideBar',
            component: SideBar,
        },
        {
            path: '/lab/login',
            name: 'Login',
            component: Login,
        },
        {
            path: '/lab/Welcome',
            name: 'Welcome',
            component: Welcome,
        },
    ],
};