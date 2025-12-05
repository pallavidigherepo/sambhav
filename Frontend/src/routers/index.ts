import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import AboutOurJourney from "../views/AboutOurJourney.vue";
import AboutWhoWeAre from "../views/AboutWhoWeAre.vue";
import ContactUs from "../views/ContactUs.vue";

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about-our-journey',
    name: 'AboutOurJourney',
    component: AboutOurJourney
  },
  {
    path: '/about-who-we-are',
    name: 'AboutWhoWeAre',
    component: AboutWhoWeAre
  },
  {
    path: '/contact-us',
    name: 'ContactUs',
    component: ContactUs
  }
  //   {
  //     path: '/about',
  //     name: 'About',
  //     // route level code-splitting
  //     // this generates a separate chunk (about.[hash].js) for this route
  //     // which is lazy-loaded when the route is visited.
  //     component: () => import(/* webpackChunkName: "about" */ '../views/About.vue')
  //   }
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: routes,
  linkActiveClass: 'active',
  linkExactActiveClass: 'active'

})
export default router;