<script lang="ts" setup>
import feather from 'feather-icons';

import { onMounted, ref } from 'vue';
import axiosClient from "@/axios.js";

onMounted(() => {
    // Initialize Feather icons
    feather.replace();

    getMenuItems();

});
const menuItems = ref();
const competitionMenu = ref();
const activityMenu = ref();
const getMenuItems = async () => {
    try {
        const response = await axiosClient.get("/get_menu_items");
        menuItems.value = response.data;
        competitionMenu.value = menuItems.value.competition;
        activityMenu.value = menuItems.value.activity;
    } catch (err) {
        console.log("Failed to Load Menu", err);
    }
};

/**
 * Toggle the open state of the submenu when a menu item is clicked.
 *
 * Listens for clicks on all anchor tags within the element with the id "navigation".
 * If the href attribute of the clicked element is "javascript:void(0)", it is assumed
 * to be a menu item with a submenu and its next sibling's next sibling (the submenu)
 * has the class 'open' toggled.
 */

function toggleSubmenuMenu() {
    const navigation = document.getElementById("navigation");

    if (navigation) {
        var elements = navigation.getElementsByTagName("a");

        for (var i = 0, len = elements.length; i < len; i++) {

            elements[i].onclick = function (elem) {
                if (elem.target.getAttribute("href") === "javascript:void(0)") {
                    var submenu = elem.target.nextElementSibling?.nextElementSibling;
                    if (submenu) {
                        submenu.classList.toggle('open');
                    }
                }
            }
        }
    }
}
</script>
<template>
    <!-- Start Navbar -->
    <nav id="topnav" class="defaultscroll is-sticky">
        <div class="container relative">
            <!-- Logo container-->
            <a class="logo" href="/">
                <span class="inline-block dark:hidden">
                    <img src="/assets/images/logo.png" width="100" class="l-dark" height="24" alt="">
                    <img src="/assets/images/logo.png" width="100" class="l-light" height="24" alt="">
                </span>
                <img src="/assets/images/logo.png" width="100" height="24" class="hidden dark:inline-block" alt="">
            </a>

            <!-- End Logo container-->
            <div class="menu-extras">
                <div class="menu-item">
                    <!-- Mobile menu toggle-->
                    <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                        <div class="lines">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </a>
                    <!-- End mobile menu toggle-->
                </div>
            </div>

            <!--Login button Start-->
            <ul class="buy-button list-none mb-0">
                <li class="inline mb-0">
                    <a href="#">
                        <span class="login-btn-primary"><span
                                class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-primary/5 hover:bg-primary border border-primary/10 hover:border-primary text-primary hover:text-white"><i
                                    data-feather="settings" class="size-4"></i></span></span>
                        <span class="login-btn-light"><span
                                class="size-9 inline-flex items-center justify-center tracking-wide border border-gray-50 align-middle duration-500 text-base text-center rounded-full bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-800 dark:hover:border-gray-700"><i
                                    data-feather="settings" class="size-4"></i></span></span>
                    </a>
                </li>
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-light">
                    <li><a href="/" class="sub-menu-item">Home</a></li>
                    <li><router-link to="/about-us" class="sub-menu-item">About Us</router-link></li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Competitions</a><span
                            class="menu-arrow"></span>
                        <ul class="submenu megamenu">
                            <template v-for="item in competitionMenu" :key="item.id">
                                <li>
                                    <ul>
                                        <li class="megamenu-head"
                                            style="text-size-adjust: inherit; text-wrap-mode: wrap;">{{ item.name }}
                                        </li>
                                        <template v-if="item.children">
                                            <template v-for="submenu in item.children" :key="submenu.id">
                                                <li>
                                                    <router-link :to="submenu.route" class="sub-menu-item">{{
                                                        submenu.name }}</router-link>
                                                </li>
                                            </template>
                                        </template>

                                    </ul>
                                </li>
                            </template>

                        </ul>
                    </li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Activities</a><span
                            class="menu-arrow"></span>
                        <ul class="submenu megamenu">
                            <template v-for="activityItem in activityMenu" :key="activityItem.id">
                                <li>
                                    <ul>
                                        <li class="megamenu-head">{{ activityItem.name }}</li>
                                        <template v-if="activityItem.children">
                                            <template v-for="activitySubmenu in activityItem.children"
                                                :key="activitySubmenu.id">
                                                <li>
                                                    <router-link :to="activitySubmenu.route" class="sub-menu-item">{{
                                                        activitySubmenu.name }}</router-link>
                                                </li>
                                            </template>
                                        </template>

                                    </ul>
                                </li>
                            </template>

                        </ul>
                    </li>

                    <li><router-link to="/blogs" class="sub-menu-item">Blogs</router-link></li>
                    <li><router-link to="/events" class="sub-menu-item">Events</router-link></li>
                    <li><router-link to="/winners" class="sub-menu-item">Winners</router-link></li>
                    <li><router-link to="/coaches" class="sub-menu-item">Coaches</router-link></li>
                    <li><router-link to="/contact-us" class="sub-menu-item">Contact</router-link></li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->
</template>