<script lang="ts" setup>
import feather from 'feather-icons';

import { onMounted } from 'vue';

onMounted(() => {
    // Initialize Feather icons
    feather.replace();
});

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
            <a class="logo" href="index.html">
                <span class="inline-block dark:hidden">
                    <img src="/assets/images/logo-dark.png" class="l-dark" height="24" alt="">
                    <img src="/assets/images/logo-light.png" class="l-light" height="24" alt="">
                </span>
                <img src="/assets/images/logo-light.png" height="24" class="hidden dark:inline-block" alt="">
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
                    <a href="/">
                        <span class="login-btn-primary"><span class="size-9 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full bg-primary/5 hover:bg-primary border border-primary/10 hover:border-primary text-primary hover:text-white"><i data-feather="settings" class="size-4"></i></span></span>
                        <span class="login-btn-light"><span class="size-9 inline-flex items-center justify-center tracking-wide border border-gray-50 align-middle duration-500 text-base text-center rounded-full bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-800 dark:hover:border-gray-700"><i data-feather="settings" class="size-4"></i></span></span>
                    </a>
                </li>
            </ul>
            <!--Login button End-->

            <div id="navigation">
                <!-- Navigation Menu-->   
                <ul class="navigation-menu nav-light">
                    <li><a href="/" class="sub-menu-item">Home</a></li>
                    <li class="has-submenu parent-menu-item" @click.prevent="toggleSubmenuMenu()">
                        <a href="javascript:void(0)">About</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="ui-components.html" class="sub-menu-item">Our Journey </a></li>
                            <li><a href="documentation.html" class="sub-menu-item">Who We are</a></li>
                        </ul>
                    </li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Competitions</a><span class="menu-arrow"></span>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li class="megamenu-head">Academic Portfolio</li>
                                    <li><a href="portfolio-modern-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-modern-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-modern-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-modern-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-modern-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>

                            <li>
                                <ul>
                                    <li class="megamenu-head"> Classic Portfolio</li>
                                    <li><a href="portfolio-classic-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-classic-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-classic-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-classic-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-classic-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>

                            <li>
                                <ul>
                                    <li class="megamenu-head">Creative Portfolio</li>
                                    <li><a href="portfolio-creative-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-creative-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-creative-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-creative-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-creative-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <ul>
                                    <li class="megamenu-head">Masonry Portfolio</li>
                                    <li><a href="portfolio-masonry-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-masonry-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-masonry-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-masonry-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-masonry-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <ul>
                                    <li class="megamenu-head">Portfolio Detail</li>
                                    <li><a href="portfolio-detail-one.html" class="sub-menu-item">Portfolio One</a></li>
                                    <li><a href="portfolio-detail-two.html" class="sub-menu-item">Portfolio Two</a></li>
                                    <li><a href="portfolio-detail-three.html" class="sub-menu-item">Portfolio Three</a></li>
                                    <li><a href="portfolio-detail-four.html" class="sub-menu-item">Portfolio Four</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="has-submenu parent-parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Activities</a><span class="menu-arrow"></span>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li class="megamenu-head">Academic Portfolio</li>
                                    <li><a href="portfolio-modern-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-modern-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-modern-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-modern-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-modern-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>

                            <li>
                                <ul>
                                    <li class="megamenu-head"> Classic Portfolio</li>
                                    <li><a href="portfolio-classic-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-classic-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-classic-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-classic-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-classic-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>

                            <li>
                                <ul>
                                    <li class="megamenu-head">Creative Portfolio</li>
                                    <li><a href="portfolio-creative-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-creative-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-creative-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-creative-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-creative-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <ul>
                                    <li class="megamenu-head">Masonry Portfolio</li>
                                    <li><a href="portfolio-masonry-two.html" class="sub-menu-item">Two Column</a></li>
                                    <li><a href="portfolio-masonry-three.html" class="sub-menu-item">Three Column</a></li>
                                    <li><a href="portfolio-masonry-four.html" class="sub-menu-item">Four Column</a></li>
                                    <li><a href="portfolio-masonry-five.html" class="sub-menu-item">Five Column</a></li>
                                    <li><a href="portfolio-masonry-six.html" class="sub-menu-item">Six Column</a></li>
                                </ul>
                            </li>
                            
                            <li>
                                <ul>
                                    <li class="megamenu-head">Portfolio Detail</li>
                                    <li><a href="portfolio-detail-one.html" class="sub-menu-item">Portfolio One</a></li>
                                    <li><a href="portfolio-detail-two.html" class="sub-menu-item">Portfolio Two</a></li>
                                    <li><a href="portfolio-detail-three.html" class="sub-menu-item">Portfolio Three</a></li>
                                    <li><a href="portfolio-detail-four.html" class="sub-menu-item">Portfolio Four</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li><router-link to="/blogs" class="sub-menu-item">Blogs</router-link></li>

                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Events</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="portfolio-modern-two.html" class="sub-menu-item">Two Column</a></li>
                            <li><a href="portfolio-modern-three.html" class="sub-menu-item">Three Column</a></li>
                            <li><a href="portfolio-modern-four.html" class="sub-menu-item">Four Column</a></li>
                            <li><a href="portfolio-modern-five.html" class="sub-menu-item">Five Column</a></li>
                            <li><a href="portfolio-modern-six.html" class="sub-menu-item">Six Column</a></li>
                        </ul>
                    </li>

                    <li><router-link to="/winners" class="sub-menu-item">Winners</router-link></li>

                    <li class="has-submenu parent-menu-item">
                        <a href="javascript:void(0)" @click.prevent="toggleSubmenuMenu()">Coaches</a><span class="menu-arrow"></span>
                        <ul class="submenu">
                            <li><a href="portfolio-modern-two.html" class="sub-menu-item">Two Column</a></li>
                            <li><a href="portfolio-modern-three.html" class="sub-menu-item">Three Column</a></li>
                            <li><a href="portfolio-modern-four.html" class="sub-menu-item">Four Column</a></li>
                            <li><a href="portfolio-modern-five.html" class="sub-menu-item">Five Column</a></li>
                            <li><a href="portfolio-modern-six.html" class="sub-menu-item">Six Column</a></li>
                        </ul>
                    </li>

                    <li><router-link to="/contact-us" class="sub-menu-item">Contact</router-link></li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
    </nav><!--end header-->
    <!-- End Navbar -->
 </template>