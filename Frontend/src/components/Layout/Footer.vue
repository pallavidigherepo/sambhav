<script lang="ts" setup>
</script>
<template>
    <!-- Footer Start -->
    <footer class="relative bg-slate-900 dark:bg-slate-800 text-gray-200 dark:text-gray-200">
        <div class="container relative">
            <div class="grid grid-cols-12">
                <div class="col-span-12">
                    <div class="py-[60px] px-0">
                        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                            <div class="lg:col-span-4 md:col-span-12">
                                <a href="#" class="text-[22px] focus:outline-none">
                                    <img src="/assets/images/logo.png" alt="" height="24" width="100">
                                </a>
                                <p class="mt-6 text-gray-300">ApaarSambhavana is a digital platform designed to foster
                                    holistic student development by promoting competitions, extracurricular activities,
                                    and talent discovery across schools. Our mission is to bridge the gap between
                                    academic learning & real-world skills by giving students an accessible, inclusive &
                                    engaging environment to explore their interests, showcase their talents, and gain
                                    recognition beyond the classroom.
                                    .</p>
                                <ul class="list-none mt-6">
                                    <li class="inline"><a href="http://linkedin.com/company/shreethemes" target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-linkedin" title="Linkedin"></i></a></li>
                                    <li class="inline"><a href="https://www.facebook.com/share/17qUq2JmHA"
                                            target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-facebook-f align-middle" title="facebook"></i></a></li>
                                    <li class="inline"><a
                                            href="https://www.instagram.com/apaar_sambhavana?igsh=dHR6aTlwc3B0OGNu"
                                            target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                                    <li class="inline"><a href="https://twitter.com/shreethemes" target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-twitter align-middle" title="twitter"></i></a></li>
                                    <li class="inline"><a href="mailto:support@shreethemes.in"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-envelope align-middle" title="email"></i></a></li>
                                    <li class="inline"><a href="https://forms.gle/QkTueCikDGqJnbky9" target="_blank"
                                            class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center border border-gray-800 dark:border-gray-700 text-gray-400 hover:text-white rounded-md hover:border-primary dark:hover:border-primary hover:bg-primary dark:hover:bg-primary"><i
                                                class="uil uil-file align-middle" title="customization"></i></a></li>
                                </ul><!--end icon-->
                            </div><!--end col-->

                            <div class="lg:col-span-2 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Company</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><router-link to="/about-us"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> About us</router-link></li>
                                    <li class="mt-[10px]"><router-link to="/blogs"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Blogs</router-link></li>
                                    <li class="mt-[10px]"><router-link to="/events"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Events</router-link></li>
                                    <li class="mt-[10px]"><router-link to="/winners"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Winners</router-link></li>
                                    <li class="mt-[10px]"><router-link to="/coaches"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Coaches</router-link></li>
                                    <li class="mt-[10px]"><router-link to="/contact-us"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Contact</router-link></li>
                                </ul>
                            </div><!--end col-->

                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Usefull Links</h5>
                                <ul class="list-none footer-list mt-6">
                                    <li><router-link to="/term-of-services"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Terms of Services</router-link></li>
                                    <li class="mt-[10px]"><router-link to="privacy-policy"
                                            class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b"></i> Privacy Policy</router-link></li>

                                </ul>
                            </div><!--end col-->

                            <div class="lg:col-span-3 md:col-span-4">
                                <h5 class="tracking-[1px] text-gray-100 font-semibold">Newsletter</h5>
                                <p class="mt-6 text-gray-300">Sign up and receive the latest tips via email.</p>
                                <form>
                                    <div class="grid grid-cols-1">
                                        <div class="my-3">
                                            <label class="form-label text-gray-300">Write your email <span
                                                    class="text-red-600">*</span></label>
                                            <div class="form-icon relative mt-2">
                                                <i data-feather="mail"
                                                    class="size-4 absolute top-3 start-4 text-gray-100"></i>
                                                <input type="email"
                                                    class="form-input ps-12 rounded w-full py-2 px-3 h-10 bg-gray-800 dark:bg-gray-700 border-0 text-gray-100 focus:shadow-none focus:ring-0 placeholder:text-gray-200 outline-none"
                                                    placeholder="Email" name="email">
                                            </div>
                                        </div>

                                        <button type="submit" id="submitsubscribe" name="send"
                                            class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Subscribe</button>
                                    </div>
                                </form>
                            </div><!--end col-->
                        </div><!--end grid-->
                    </div><!--end col-->
                </div>
            </div><!--end grid-->
        </div><!--end container-->

        <div class="py-[30px] px-0 border-t border-gray-800 dark:border-gray-700">
            <div class="container relative text-center">
                <div class="grid md:grid-cols-2 items-center">
                    <div class="md:text-start text-center">
                        <p class="mb-0 text-gray-100">© {{ new Date().getFullYear() }} ApaarSambhavana.</p>
                    </div>


                </div><!--end grid-->
            </div><!--end container-->
        </div>
    </footer><!--end footer-->
    <!-- Footer End -->
</template>