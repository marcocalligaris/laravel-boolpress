//* Importazione di vue + vue router
import Vue from 'vue'
import VueRouter from 'vue-router'

//* Importazione componenti delle pagine
import HomePage from './components/pages/HomePage.vue';
import AboutPage from './components/pages/AboutPage.vue';
import ContactsPage from './components/pages/ContactsPage.vue';
import NotFoundPage from './components/pages/NotFoundPage.vue';
import PostPage from './components/pages/PostPage.vue';

//* Vue usa router
Vue.use(VueRouter)

//* Definizione delle rotte
const routes = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        { path: '/', component: HomePage, name: 'home'},
        { path: '/about', component: AboutPage, name: 'about'},
        { path: '/contacts', component: ContactsPage, name: 'contacts'},
        { path: '/posts/:id', component: PostPage, name: 'post-details'},
        
        // Questa va importata per  ultima altrimenti blocca tutto ciò che viene dopo
        { path: '*', component: NotFoundPage, name: 'not_found'},
    ],
});

export default routes;
