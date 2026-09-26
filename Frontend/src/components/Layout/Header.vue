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
            <a class="logo flex items-center gap-3.5 group/logo" href="/" style="line-height: normal;">
                <div class="logo-mark-wrapper relative flex items-center justify-center">
                    <!-- Ambient Solar Aura Glow -->
                    <div class="logo-aura absolute inset-0 -m-1.5 rounded-full pointer-events-none"></div>
                    <img src="/assets/images/logo_sunrise-transparent.png" class="logo-img-mark relative object-contain" alt="Apaar Sambhavna">
                </div>
                <div class="flex-col justify-center hidden lg:flex text-left" style="line-height: normal;">
                    <span class="logo-title text-xl font-black tracking-tight transition-colors" style="line-height: 1.1;">Apaar Sambhavna</span>
                    <span class="logo-subtitle text-[10px] font-black tracking-[0.2em] uppercase mt-1 flex items-center gap-1.5" style="line-height: 1;">
                        <span class="size-1.5 rounded-full bg-orange-500 animate-pulse"></span>
                        <span>The Competition Booster</span>
                    </span>
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
                    <li><router-link to="/competitions" class="sub-menu-item">Competitions</router-link></li>
                    <li><router-link to="/events" class="sub-menu-item">Activities</router-link></li>
                    <li><router-link to="/blogs" class="sub-menu-item">Blogs</router-link></li>
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

<style>
/* Ambient sunburst aura glow behind the logo mark */
.logo-aura {
    background: radial-gradient(circle, rgba(251, 146, 60, 0.45) 0%, rgba(245, 158, 11, 0.22) 50%, transparent 75%);
    filter: blur(8px);
    transition: all 0.3s ease;
}

/* Luminous rim-light and warm glow to carve out the dark navy arch and book */
.logo-img-mark {
    height: 50px;
    max-height: 50px;
    width: auto;
    filter: drop-shadow(0 0 1.5px rgba(255, 255, 255, 0.95))
            drop-shadow(0 0 10px rgba(245, 158, 11, 0.55))
            drop-shadow(0 2px 14px rgba(234, 88, 12, 0.3));
    transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
}

.logo:hover .logo-img-mark {
    transform: scale(1.06);
    filter: drop-shadow(0 0 2px rgba(255, 255, 255, 1))
            drop-shadow(0 0 14px rgba(245, 158, 11, 0.8))
            drop-shadow(0 4px 18px rgba(234, 88, 12, 0.45));
}

.logo:hover .logo-aura {
    transform: scale(1.25);
    opacity: 1;
}

.logo-title {
    color: #ffffff;
    transition: color 0.3s ease;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

.logo-subtitle {
    color: #fb923c;
    transition: color 0.3s ease;
    text-shadow: 0 0 10px rgba(249, 115, 22, 0.3);
}

/* When navbar is scrolled down and becomes sticky (white background in light mode) */
#topnav.nav-sticky .logo-title {
    color: #0f172a !important;
    text-shadow: none;
}

#topnav.nav-sticky .logo-subtitle {
    color: #ea580c !important;
    text-shadow: none;
}

#topnav.nav-sticky .logo-aura {
    opacity: 0;
}

#topnav.nav-sticky .logo-img-mark {
    filter: none;
}

/* When navbar is sticky in dark mode (dark background) */
html.dark #topnav.nav-sticky .logo-title,
.dark #topnav.nav-sticky .logo-title {
    color: #ffffff !important;
}

html.dark #topnav.nav-sticky .logo-subtitle,
.dark #topnav.nav-sticky .logo-subtitle {
    color: #fb923c !important;
}

html.dark #topnav.nav-sticky .logo-img-mark,
.dark #topnav.nav-sticky .logo-img-mark {
    filter: drop-shadow(0 0 1.5px rgba(255, 255, 255, 0.95))
            drop-shadow(0 0 10px rgba(245, 158, 11, 0.55));
}
</style>