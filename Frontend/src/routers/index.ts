import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import AboutUs from "../views/AboutUs.vue";
import ContactUs from "../views/ContactUs.vue";
import Winners from "../views/Winners.vue";
import Coaches from "../views/Coaches.vue";
import Events from "../views/Events.vue";
import Posts from "../views/Posts.vue";

import Competition from "../views/Competition.vue";
import Activity from "../views/Activity.vue";
import PostDetail from '../views/PostDetail.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/about-us',
    name: 'AboutUs',
    component: AboutUs
  },
  {
    path: '/contact-us',
    name: 'ContactUs',
    component: ContactUs
  },
  {
    path: '/events',
    name: 'Events',
    component: Events
  },
  {
    path: '/winners',
    name: 'Winners',
    component: Winners
  },
  {
    path: '/coaches',
    name: 'Coaches',
    component: Coaches
  },
  {
    path: '/competition/:params',
    name: 'Competition',
    component: Competition
  },
  {
    path: '/activity/:params',
    name: 'Activity',
    component: Activity
  },
  {
    path: '/blogs',
    name: 'Posts',
    component: Posts,
    props: true
  },
  {
    // The :slug parameter matches the 'slug' field generated in Filament
    path: '/blog/:params',
    name: 'PostDetail',
    component: PostDetail,
    props: true
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