<script setup lang="ts">
import PageTitle from '../components/PageTitle.vue';


</script>
<template>
    <!-- Start Hero -->
    <PageTitle heading="Competiotns" tagline="Please see the latest competitions posted by Organizers."
        :breadcrumb-links="[
            { label: 'Home', href: '/' },
            { label: 'Competiotions', disabled: true }
        ]" />
    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative md:py-24 py-16 overflow-hidden">
        <div class="container relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c1.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/01.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Calvin Carlo</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Digital Marketing</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Starting
                            SEO as your Home Based Business</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c2.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/02.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Christa Smith</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Engineering</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Java
                            Programming Masterclass for Software</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c3.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/03.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Jani Jangad</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Engineering</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Microsoft
                            Excel - Excel from Beginner to Advanced</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c4.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/04.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">John Cartwright</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Web Development</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Vue - The
                            Complete Guide (w/ Router, Composition API)</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c5.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/05.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Sally Short</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Front-end Design</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">HTML,
                            CSS, Javascripts, and Basic Knowledge about web design</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c6.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/06.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">William Benson</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Back-end Development</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">C
                            Programming For Beginners - Master the C Language</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c7.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/02.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Christa Smith</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Engineering</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Java
                            Programming Masterclass for Software</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c8.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/03.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Jani Jangad</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Engineering</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Microsoft
                            Excel - Excel from Beginner to Advanced</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c9.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/04.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">John Cartwright</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Web Development</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">Vue - The
                            Complete Guide (w/ Router, Composition API)</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->

                <!-- Start Course -->
                <div
                    class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden">
                    <div class="relative overflow-hidden">
                        <img src="/assets/images/course/c10.jpg" class="group-hover:scale-110 duration-500 ease-in-out"
                            alt="">
                        <div
                            class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                        </div>

                        <div
                            class="absolute start-0 bottom-0 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div class="pb-4 ps-4 flex items-center">
                                <img src="/assets/images/client/05.jpg"
                                    class="size-12 rounded-full shadow-md dark:shadow-gray-800 mx-auto" alt="">
                                <div class="ms-3">
                                    <a href="" class="font-semibold text-white block">Sally Short</a>
                                    <span class="text-white/70 text-sm">Professor</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content p-6 relative">
                        <a href="course-detail.html" class="font-medium block text-primary">Front-end Design</a>
                        <a href="course-detail.html"
                            class="text-lg font-medium block hover:text-primary duration-500 ease-in-out mt-2">HTML,
                            CSS, Javascripts, and Basic Knowledge about web design</a>
                        <p class="text-slate-400 mt-3 mb-4">The phrasal sequence of the is now so that many campaign and
                            benefit</p>

                        <ul
                            class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center list-none text-slate-400">
                            <li class="flex items-center me-4">
                                <i
                                    class="uil uil-book-open text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>25 Lectures</span>
                            </li>

                            <li class="flex items-center me-4">
                                <i class="uil uil-clock text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>1h 30m</span>
                            </li>

                            <li class="flex items-center">
                                <i class="uil uil-eye text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                                <span>3012</span>
                            </li>
                        </ul>

                        <div
                            class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                            <div
                                class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary dark:text-white">
                                <span class="font-semibold">$11</span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Course -->
            </div><!--end grid-->

            <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
                <div class="md:col-span-12 text-center">
                    <nav aria-label="Page navigation example">
                        <ul class="inline-flex items-center -space-x-px">
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-s-lg hover:text-white border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">
                                    <i class="uil uil-angle-left text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">1</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">2</a>
                            </li>
                            <li>
                                <a href="#" aria-current="page"
                                    class="z-10 size-[40px] inline-flex justify-center items-center text-white bg-primary border border-primary">3</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">4</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 hover:text-white bg-white dark:bg-slate-900 border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">5</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="size-[40px] inline-flex justify-center items-center text-slate-400 bg-white dark:bg-slate-900 rounded-e-lg hover:text-white border border-gray-100 dark:border-gray-800 hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary">
                                    <i class="uil uil-angle-right text-[20px] rtl:rotate-180 rtl:-mt-1"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="md:flex justify-center">
                <div class="lg:w-2/3 text-center">
                    <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold mb-6">Subscribe our
                        weekly subscription</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Add some text to explain benefits of subscripton on your
                        services. We'll send you the best of our blog just once a weekly.</p>

                    <div class="mt-8">
                        <div class="text-center subcribe-form">
                            <form class="relative mx-auto max-w-xl">
                                <input type="email" id="subemail" name="name"
                                    class="py-4 pe-40 ps-6 w-full h-[50px] outline-none text-slate-900 dark:text-white rounded-full bg-white/70 dark:bg-slate-900/70 border border-gray-100 dark:border-gray-800"
                                    placeholder="Enter your email id..">
                                <button type="submit"
                                    class="py-2 px-5 inline-block font-semibold tracking-wide align-middle duration-500 text-base text-center absolute top-[2px] end-[3px] h-[46px] bg-primary hover:bg-primary-700 border border-primary hover:border-primary-700 text-white rounded-full">Subcribe
                                    Now</button>
                            </form><!--end form-->
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->
</template>