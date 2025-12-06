<script setup lang="ts">
import PageTitle from '../components/PageTitle.vue';

</script>
<template>
    <!-- Start Hero -->
    <PageTitle heading="Contact Us" tagline="Boosting Ambitions. Transforming Futures." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'Contact Us', disabled: true }
    ]" />
    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                <div class="text-center px-6 mt-6">
                    <div
                        class="size-20 bg-primary/5 text-primary rounded-xl text-3xl flex align-middle justify-center items-center shadow-xs dark:shadow-gray-800 mx-auto">
                        <i class="uil uil-phone"></i>
                    </div>

                    <div class="content mt-7">
                        <h5 class="title h5 text-xl font-medium">Phone</h5>
                        <p class="text-slate-400 mt-3">We’re here to help! Give us a call at below number, and we’ll
                            be happy to answer your questions.</p>

                        <div class="mt-5">
                            <a href="tel:+919595012654"
                                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-primary hover:text-primary after:bg-primary duration-500 ease-in-out">
                                +91 95950 12654</a>
                        </div>
                    </div>
                </div>

                <div class="text-center px-6 mt-6">
                    <div
                        class="size-20 bg-primary/5 text-primary rounded-xl text-3xl flex align-middle justify-center items-center shadow-xs dark:shadow-gray-800 mx-auto">
                        <i class="uil uil-envelope"></i>
                    </div>

                    <div class="content mt-7">
                        <h5 class="title h5 text-xl font-medium">Email</h5>
                        <p class="text-slate-400 mt-3">We’re here to help! Feel free to reach out with any questions,
                            feedback, or assistance you may need. Our team will get back to you as soon as possible.</p>

                        <div class="mt-5">
                            <a href="mailto:support@apaarsambhavana.com"
                                class="relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-primary hover:text-primary after:bg-primary duration-500 ease-in-out">support@apaarsambhavana.com</a>
                        </div>
                    </div>
                </div>

                <div class="text-center px-6 mt-6">
                    <div
                        class="size-20 bg-primary/5 text-primary rounded-xl text-3xl flex align-middle justify-center items-center shadow-xs dark:shadow-gray-800 mx-auto">
                        <i class="uil uil-map-marker"></i>
                    </div>

                    <div class="content mt-7">
                        <h5 class="title h5 text-xl font-medium">Location</h5>
                        <p class="text-slate-400 mt-3">Nirmal, Bharat Nagar, <br> Nagpur, INDIA</p>

                        <!-- <div class="mt-5">
                            <a href="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                data-type="iframe"
                                class="video-play-icon read-more lightbox relative inline-block font-semibold tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 text-primary hover:text-primary after:bg-primary duration-500 ease-in-out">View
                                on Google map</a>
                        </div> -->
                    </div>
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="container relative md:mt-24 mt-16">
            <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                <div class="lg:col-span-7 md:col-span-6">
                    <img src="/assets/images/contact.svg" alt="">
                </div>

                <div class="lg:col-span-5 md:col-span-6">
                    <div class="lg:ms-5">
                        <div class="bg-white dark:bg-slate-900 rounded-md shadow-sm dark:shadow-gray-800 p-6">
                            <h3 class="mb-6 text-2xl leading-normal font-medium">Get in touch !</h3>

                            <form method="post" name="myForm" id="myForm" onsubmit="return validateForm()">
                                <p class="mb-0" id="error-msg"></p>
                                <div id="simple-msg"></div>
                                <div class="grid lg:grid-cols-12 lg:gap-6">
                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="name" class="font-semibold">Your Name:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="user" class="size-4 absolute top-3 start-4"></i>
                                                <input name="name" id="name" type="text"
                                                    class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0"
                                                    placeholder="Name :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="lg:col-span-6 mb-5">
                                        <div class="text-start">
                                            <label for="email" class="font-semibold">Your Email:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail" class="size-4 absolute top-3 start-4"></i>
                                                <input name="email" id="email" type="email"
                                                    class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0"
                                                    placeholder="Email :">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1">
                                    <div class="mb-5">
                                        <div class="text-start">
                                            <label for="subject" class="font-semibold">Your Question:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="book" class="size-4 absolute top-3 start-4"></i>
                                                <input name="subject" id="subject"
                                                    class="form-input ps-11 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0"
                                                    placeholder="Subject :">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <div class="text-start">
                                            <label for="comments" class="font-semibold">Your Comment:</label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="message-circle"
                                                    class="size-4 absolute top-3 start-4"></i>
                                                <textarea name="comments" id="comments"
                                                    class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0"
                                                    placeholder="Message :"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submit" name="send"
                                    class="py-2 px-5 font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md justify-center flex items-center">Send
                                    Message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->


</template>