import Posts from '../components/Posts.vue';
import Show from '../components/Show.vue';
import Home from '../components/Home.vue';
import Calendar from '../components/VueRoutes/Calendar.vue';
import Login from '../components/VueRoutes/Login.vue';
import Test from '../components/Test.vue';
import NotFound from '../components/404.vue';

export default {
    mode: 'history',
    routes: [{
            path: '*',
            name: NotFound,
            component: NotFound,
        }, {
            path: '/',
            name: 'Home',
            component: Home,
        },
        {
            path: '/posts/:slug?',
            name: 'Posts',
            component: Posts,
        },
        {
            path: '/show/:slug',
            name: 'Show',
            component: Show,
        },
        {
            path: '/lab/calendar',
            name: 'Calendar',
            component: Calendar,
        },
        {
            path: '/lab/login',
            name: 'Login',
            component: Login,
        },
        {
            path: '/test',
            name: 'Test',
            component: Test,
        },
    ],
};