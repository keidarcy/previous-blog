import Calendar from '../components/VueRoutes/Calendar.vue';
import Welcome from '../components/VueRoutes/Welcome.vue';
import Login from '../components/VueRoutes/Login.vue';
import Test from '../components/VueRoutes/Test.vue';

export default {
    mode: 'history',
    routes: [{
            path: '/lab/calendar',
            name: 'Calendar',
            component: Calendar,
        },
        {
            path: '/lab/Test',
            name: 'Test',
            component: Test,
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