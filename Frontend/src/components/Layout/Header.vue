<script lang="ts" setup>
import feather from 'feather-icons';

import { onMounted, ref } from 'vue';
import axiosClient from "@/axios.ts";
import { useAuthStore } from "@/stores/auth";

const authStore = useAuthStore();
const showUserDropdown = ref(false);

const handleUserIconClick = () => {
    if (authStore.isAuthenticated) {
        showUserDropdown.value = !showUserDropdown.value;
    } else {
        authStore.openModal('login');
    }
};

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

            elements[i].onclick = function (elem: Event) {
                const target = elem.target as HTMLElement;
                if (target && target.getAttribute("href") === "javascript:void(0)") {
                    var submenu = target.nextElementSibling?.nextElementSibling;
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
        <div class="w-full px-4 xl:px-8 relative block" style="max-width: 100%;">
            <!-- Logo container-->
            <a class="logo flex items-center gap-3" href="/" style="line-height: normal;">
                <img src="/assets/images/logo_sunrise-transparent.png" style="height: 48px; max-height: 48px; width: auto;" class="object-contain" alt="Sambhav">
                <div class="flex-col justify-center hidden lg:flex text-left" style="line-height: normal;">
                    <span class="text-xl font-bold tracking-tight text-slate-900 dark:text-white" style="line-height: 1;">Apaar Sambhavna</span>
                    <span class="text-[10px] font-bold text-orange-500 tracking-widest uppercase mt-1" style="line-height: 1;">The Competition Booster</span>
                </div>
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
                <li class="inline mb-0 relative">
                    <!-- Logged IN: avatar + dropdown -->
                    <template v-if="authStore.isAuthenticated">
                        <button @click="showUserDropdown = !showUserDropdown" class="relative size-9 rounded-full overflow-hidden border-2 border-primary/30 hover:border-primary transition">
                            <img v-if="authStore.user?.avatar" :src="authStore.user.avatar" alt="Avatar" class="size-full object-cover">
                            <span v-else class="size-9 inline-flex items-center justify-center bg-primary/10 text-primary font-bold text-sm">
                                {{ authStore.user?.name?.charAt(0)?.toUpperCase() }}
                            </span>
                        </button>
                        <!-- Dropdown -->
                        <div v-if="showUserDropdown" class="absolute end-0 top-12 w-44 bg-white dark:bg-slate-900 shadow-xl dark:shadow-gray-800 rounded-xl border border-gray-100 dark:border-gray-800 py-2 z-50">
                            <div class="px-4 py-2 border-b border-gray-100 dark:border-gray-800">
                                <p class="text-sm font-semibold text-slate-800 dark:text-white truncate">{{ authStore.user?.name }}</p>
                                <p class="text-xs text-slate-400 truncate">{{ authStore.user?.email }}</p>
                            </div>
                            <router-link to="/dashboard/profile" @click="showUserDropdown = false" class="flex items-center gap-2 px-4 py-2 text-sm text-slate-600 dark:text-slate-300 hover:text-primary hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                <i data-feather="user" class="size-3.5"></i> My Profile
                            </router-link>
                            <button @click="authStore.logout(); showUserDropdown = false" class="flex items-center gap-2 w-full px-4 py-2 text-sm text-red-500 hover:bg-red-50 dark:hover:bg-slate-800 transition">
                                <i data-feather="log-out" class="size-3.5"></i> Logout
                            </button>
                        </div>
                    </template>

                    <!-- Logged OUT: icon opens modal -->
                    <template v-else>
                        <button @click="authStore.openModal('login')">
                            <span class="login-btn-primary"><span
                                    class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-primary/5 hover:bg-primary border border-primary/10 hover:border-primary text-primary hover:text-white"><i
                                        data-feather="user" class="size-4"></i></span></span>
                            <span class="login-btn-light"><span
                                    class="size-9 inline-flex items-center justify-center tracking-wide border border-gray-50 align-middle duration-500 text-base text-center rounded-full bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-800 dark:hover:border-gray-700"><i
                                        data-feather="user" class="size-4"></i></span></span>
                        </button>
                    </template>
                </li>
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu nav-light">
                    <!-- <li><a href="/" class="sub-menu-item">Home</a></li> -->
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
                    <li><router-link to="/leaderboard"
                            class="sub-menu-item text-primary font-bold">Leaderboard</router-link></li>
                    <!-- <li><router-link to="/winners" class="sub-menu-item">Winners</router-link></li> -->
                    <li><router-link to="/coaches" class="sub-menu-item">Coaches</router-link></li>
                    <li><router-link to="/contact-us" class="sub-menu-item">Contact</router-link></li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->
</template>