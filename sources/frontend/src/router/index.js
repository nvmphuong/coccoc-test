/**
 * Created by pc on 14/10/2019.
 */
import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

//Lazy load components
const Home = () => import('@/pages/home')
const Admin = () => import('@/pages/admin')
const Playlist = () => import('@/pages/playlist')
const Medias = () => import('@/pages/medias')

const router = new Router({
    mode: 'history',
    routes: [
        // dynamic segments start with a colon
        {path: '/', name: 'home', component: Home}
        ,{path: '/admin', name: 'admin', component: Admin}
        ,{path: '/medias', name: 'medias', component: Medias}
        ,{path: '/playlist/:id', name: 'playlist', component: Playlist , props: true},
    ],
});
export default router;