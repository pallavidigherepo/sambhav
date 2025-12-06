<script setup lang="ts">
import Features from '../components/Features.vue';
import PageTitle from '../components/PageTitle.vue';
import Team from '../components/Team.vue';
import VMessage from '../components/VMessage.vue';


</script>
<template>
    <!-- Start Hero -->
    <PageTitle heading="About Us" tagline="Boosting Ambitions. Transforming Futures." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'About Us', disabled: true }
    ]" />

    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-5 md:col-span-6">
                    <div class="grid grid-cols-12 gap-6 items-center">
                        <div class="col-span-6">
                            <div class="grid grid-cols-1 gap-6">
                                <img src="/assets/images/about/ab03.jpg" class="shadow-sm rounded-md" alt="">
                                <img src="/assets/images/about/ab02.jpg" class="shadow-sm rounded-md" alt="">
                            </div>
                        </div>

                        <div class="col-span-6">
                            <div class="grid grid-cols-1 gap-6">
                                <img src="/assets/images/about/ab01.jpg" class="shadow-sm rounded-md" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-7 md:col-span-6">
                    <div class="lg:ms-5">
                        <!-- <div class="flex mb-4">
                            <span class="text-primary text-2xl font-bold mb-0"><span
                                    class="counter-value text-6xl font-bold" data-target="15">1</span>+</span>
                            <span class="self-end font-medium ms-2">Years <br> Experience</span>
                        </div> -->
                        <p class="text-slate-400 max-w-xl">ApaarSambhavana is a digital platform designed to foster
                            holistic student development by promoting competitions, extracurricular activities, and
                            talent discovery across schools. Our mission is to bridge the gap between academic learning
                            & real-world skills by giving students an accessible, inclusive & engaging environment to
                            explore their interests, showcase their talents, and gain recognition beyond the classroom.
                        </p>

                        <div class="mt-6">
                            <router-link to="contact-us"
                                class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md me-2 mt-2"><i
                                    class="uil uil-envelope"></i> Contact us</router-link>
                        </div>
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->
    <Features />

    <!-- Start -->
    <VMessage />
    <!--end section-->
    <!-- End -->

    <!-- Start -->
    <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800 md:pb-0 pb-0">
        <Team />

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center">
                <div class="lg:col-span-5 md:col-span-6 md:order-1 order-2">
                    <div
                        class="relative overflow-hidden after:content-[''] after:absolute after:h-40 after:w-40 after:bg-red-600/5 after:top-5 after:start-0 after:end-0 after:mx-auto after:-z-0 after:rounded-3xl after:animate-[spin_10s_linear_infinite]">
                        <img src="/assets/images/hero2.png" class="relative z-1" alt="">
                    </div>
                </div>

                <div class="lg:col-span-7 md:col-span-6 md:order-2 order-1">
                    <div class="tiny-single-item">
                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/amazon.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Thomas Israel</h6>
                        </div>

                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/google.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Carl Oliver</h6>
                        </div>

                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/lenovo.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Barbara McIntosh</h6>
                        </div>

                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/paypal.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Jill Webb</h6>
                        </div>

                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/shopify.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Dean Tolle</h6>
                        </div>

                        <div class="tiny-slide text-center">
                            <img src="/assets/images/client/spotify.svg" class="h-6 mx-auto" alt="">
                            <p class="text-slate-400 mt-6">" If the distribution of letters and 'words' is random, the
                                reader will not be distracted from making a neutral judgement on the visual impact and
                                readability of the typefaces (typography), or the distribution of text on the page
                                consists of a more or less random series of words or syllables. "</p>
                            <h6 class="text-primary font-semibold mt-3">- Christa Smith</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</template>