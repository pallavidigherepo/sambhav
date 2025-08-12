<script lang="ts" setup>

</script>

<template>
  <!-- Start Hero -->
        <section class="relative lg:py-44 py-36 bg-home bg-center bg-cover">
            <div class="absolute inset-0 bg-slate-900/50"></div>
            <div class="container relative z-1">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center mt-10 gap-[30px]">
                    <div class="lg:col-span-7 md:col-span-6">
                        <div class="md:me-6">
                            <h4 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-white">Your Donation Can <br> Change the World</h4>
                            <p class="text-white/75 text-lg max-w-xl">Start working with Techwind that can provide everything you need to generate awareness, drive traffic, connect.</p>
                        
                            <div class="mt-6">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                    </div><!--end col-->

                    <div class="lg:col-span-5 md:col-span-6">
                        <div class="p-6 rounded-lg border-t-8 border-primary bg-white dark:bg-slate-900 shadow-lg dark:shadow-gray-800">
                            <div class="mb-6 text-center">
                                <h4 class="font-bold lg:leading-normal leading-normal text-3xl mb-3">Make a Donation</h4>
                                <p class="text-slate-400">Your $40.00 monthly donation can give 12 people clean water every year. 100% funds water projects.</p>
                            </div>

                            <form>
                                <div class="grid grid-cols-1">
                                    <div>
                                        <div class="grid md:grid-cols-2 gap-5">
                                            <div class="mb-5">
                                                <label class="form-label font-medium">Your Name : <span class="text-red-600">*</span></label>
                                                <input type="text" class="form-input mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Name" name="name" required="">
                                            </div>
        
                                            <div class="mb-5">
                                                <label class="form-label font-medium">Your Email : <span class="text-red-600">*</span></label>
                                                <input type="email" class="form-input mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label font-medium">I Want to Donate for</label>
                                        <select class="form-select form-input mt-2 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0">
                                            <option value="Donate For Food">Donate For Food</option>
                                            <option value="Food For Orphan">Food For Orphan</option>
                                            <option value="Home For Homeless">Home For Homeless</option>
                                            <option value="Holyday Gifts In Kind">Holyday Gifts In Kind</option>
                                            <option value="For clean Water in Africa">For clean Water in Africa</option>
                                            <option value="Health and Rights">Health and Rights</option>
                                        </select>
                                    </div>

                                    <div class="mb-5">
                                        <label class="form-label font-medium">How much do you want to donate ?</label>
                                        <div class="relative mt-2">
                                            <span class="absolute top-0.5 start-0.5 size-9 text-xl bg-gray-100 dark:bg-slate-800 inline-flex justify-center items-center text-slate-900 dark:text-white rounded" id="basic-addon1"><i class="uil uil-usd-circle"></i></span>
                                            <input type="number" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" min="1" max="1000" placeholder="Enter Amount" id="amount" aria-describedby="inputGroupPrepend" required>
                                        </div>
                                    </div><!--end col--> 

                                    <div class="mb-5">
                                        <div class="flex items-center w-full mb-0">
                                            <input class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-primary checked:appearance-auto dark:accent-primary focus:border-primary-300 focus:ring-0 focus:ring-offset-0 focus:ring-primary-200 focus:ring-opacity-50 me-2" type="checkbox" value="" id="AcceptT&C">
                                            <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <a href="" class="text-primary">Terms And Condition</a></label>
                                        </div>
                                    </div>

                                    <div class="mb-5">
                                        <input type="submit" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md w-full" value="Donate Now">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <section class="relative bg-primary py-12">
            <div class="container relative">
                <div class="relative grid md:grid-cols-4 grid-cols-2 items-center gap-[30px]">
                    <div class="counter-box text-center">
                        <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="100">1</span>M</h1>
                        <h5 class="counter-head text-xs font-semibold text-white">PEOPLE FACING FOOD INSECURITY</h5>
                    </div><!--end counter box-->
                    
                    <div class="counter-box text-center">
                        <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="152">2</span>M</h1>
                        <h5 class="counter-head text-xs font-semibold text-white">PEOPLE WFP AIMS TO REACH IN 2022</h5>
                    </div><!--end counter box-->
                    
                    <div class="counter-box text-center">
                        <h1 class="text-4xl font-bold mb-4 text-white">$<span class="counter-value" data-target="1500">0</span>M</h1>
                        <h5 class="counter-head text-xs font-semibold text-white">WFP'S FUNDING NEEDS IN 2022</h5>
                    </div><!--end counter box-->
                    
                    <div class="counter-box text-center">
                        <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="29">0</span>M</h1>
                        <h5 class="counter-head text-xs font-semibold text-white">MEALS DISTRIBUTED WORLDWIDE</h5>
                    </div><!--end counter box-->
                </div>
            </div>
        </section>
        <!-- End Hero -->

        <!-- Start -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 items-center gap-[30px]">
                    <div class="md:col-span-6">
                        <div class="lg:me-8">
                            <img src="/assets/images/charity/about.jpg" class="rounded-full shadow-lg dark:shadow-gray-800" alt="">
                        </div>
                    </div>

                    <div class="md:col-span-6">
                        <div class="lg:ms-8">
                            <h6 class="text-primary text-sm font-bold uppercase mb-2">About Us</h6>
                            <h3 class="mb-3 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Our Highest Ambition <br> is to Help People</h3>
                            <h3 class="mb-4 text-lg leading-normal font-semibold">Our programs contribute to peace and development through volunteerism worldwide. Take part in changing the lives of young people across the world.</h3>

                            <p class="text-slate-400 max-w-xl mb-6">We’re focused on providing affordable volunteer travel experiences that are responsible. Our programs heighten global awareness and cultural understanding through the skills and expertise taken by volunteers to their host communities, and through the experiences and lessons that volunteers take back to their own countries and cultures.</p>

                            <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                        </div>
                    </div>
                </div><!--end row-->
            </div><!--end container-->

            <div class="container relative md:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Our Causes</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Start working with Techwind that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div><!--end grid-->

                <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause01.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">Donate For Food</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->

                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause02.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">Food For Orphan</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->

                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause03.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">Home For Homeless</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->

                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause04.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">Holyday Gifts In Kind</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->

                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause05.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">For clean Water in Africa</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->

                    <div class="group relative rounded hover:-mt-1 shadow-sm hover:shadow-md dark:shadow-gray-800 overflow-hidden duration-300">
                        <div class="relative overflow-hidden">
                            <img src="/assets/images/charity/cause06.jpg" alt="">

                            <div class="absolute p-4 start-0 end-0 text-center bg-slate-900/80 -bottom-24 group-hover:bottom-0 duration-300">
                                <a href="" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md">Donate Now</a>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <a href="" class="hover:text-primary text-lg font-semibold">Health and Rights</a>
                            <p class="text-slate-400 mt-2">If you use this site regularly and would like to help keep the site on the Internet</p>

                            <div class="mt-3">
                                <div class="flex justify-between mb-2">
                                    <span class="text-slate-400">Progress</span>
                                    <span class="text-slate-400">45%</span>
                                </div>
                                <div class="w-full bg-gray-100 dark:bg-gray-800 rounded-full h-[6px]">
                                    <div class="bg-primary h-[6px] rounded-full" style="width: 45%"></div>
                                </div>
                                <ul class="flex list-none justify-between mt-3 mb-2">
                                    <li class="font-semibold">
                                        <span class="text-primary">Raised: </span>
                                        <span>$4500</span>
                                    </li>
                                    <li class="text-primary font-semibold">
                                        <span>Goal: </span>
                                        <span>$10000</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div><!--end content-->
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Start -->
        <section class="py-20 w-full table relative bg-[url('/assets/images/charity/cta.jpg')] bg-top bg-no-repeat bg-cover">
            <div class="absolute inset-0 bg-slate-900/70"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 text-center">
                    <h3 class="mb-4 md:text-3xl text-2xl text-white font-medium">Senior Citizen Program</h3>

                    <p class="text-white/80 max-w-xl mx-auto">Start working with Techwind that can provide everything you need to generate awareness, drive traffic, connect.</p>
                
                    <a href="#!" data-type="youtube" data-id="S_CGed6E610" class="lightbox size-20 rounded-full shadow-lg dark:shadow-gray-800 inline-flex items-center justify-center bg-white dark:bg-slate-900 text-primary mx-auto mt-10">
                        <i class="mdi mdi-play inline-flex items-center justify-center text-2xl"></i>
                    </a>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->

        <!-- Start -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Meet Our Volunteers</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div><!--end grid-->

                <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
                    <div class="lg:col-span-3 md:col-span-6">
                        <div class="group text-center">
                            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                                <img src="/assets/images/client/04.jpg" class="" alt="">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900 size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                                <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                                </ul><!--end icon-->
                            </div>

                            <div class="content mt-3">
                                <a href="" class="text-lg font-semibold hover:text-primary duration-500">Jack John</a>
                                <p class="text-slate-400">Volunteer</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-3 md:col-span-6">
                        <div class="group text-center">
                            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                                <img src="/assets/images/client/05.jpg" class="" alt="">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900 size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                                <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                                </ul><!--end icon-->
                            </div>

                            <div class="content mt-3">
                                <a href="" class="text-lg font-semibold hover:text-primary duration-500">Krista John</a>
                                <p class="text-slate-400">Volunteer</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-3 md:col-span-6">
                        <div class="group text-center">
                            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                                <img src="/assets/images/client/06.jpg" class="" alt="">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900 size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                                <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                                </ul><!--end icon-->
                            </div>

                            <div class="content mt-3">
                                <a href="" class="text-lg font-semibold hover:text-primary duration-500">Roger Jackson</a>
                                <p class="text-slate-400">Volunteer</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="lg:col-span-3 md:col-span-6">
                        <div class="group text-center">
                            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                                <img src="/assets/images/client/07.jpg" class="" alt="">
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900 size-52 rounded-full opacity-0 group-hover:opacity-100 duration-500"></div>

                                <ul class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 duration-500">
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="facebook" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="instagram" class="size-4"></i></a></li>
                                    <li class="inline"><a href="" class="size-8 inline-flex items-center justify-center tracking-wide align-middle duration-500 text-base text-center rounded-full border border-primary bg-primary hover:border-primary hover:bg-primary text-white"><i data-feather="linkedin" class="size-4"></i></a></li>
                                </ul><!--end icon-->
                            </div>

                            <div class="content mt-3">
                                <a href="" class="text-lg font-semibold hover:text-primary duration-500">Johnny English</a>
                                <p class="text-slate-400">Volunteer</p>
                            </div>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
            <!-- team -->

            <div class="container relative md:mt-24 mt-16">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-6 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Blog Or News</h3>

                    <p class="text-slate-400 max-w-xl mx-auto">Start working with Tailwind CSS that can provide everything you need to generate awareness, drive traffic, connect.</p>
                </div><!--end grid-->

                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
                    <div class="blog relative rounded-md shadow-sm dark:shadow-gray-800 overflow-hidden">
                        <img src="/assets/images/blog/01.jpg" alt="">

                        <div class="content p-6">
                            <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-primary duration-500 ease-in-out">Design your apps in your own way</a>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-4">
                                <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-primary after:bg-primary duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="blog relative rounded-md shadow-sm dark:shadow-gray-800 overflow-hidden">
                        <img src="/assets/images/blog/02.jpg" alt="">

                        <div class="content p-6">
                            <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-primary duration-500 ease-in-out">How apps is changing the IT world</a>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-4">
                                <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-primary after:bg-primary duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="blog relative rounded-md shadow-sm dark:shadow-gray-800 overflow-hidden">
                        <img src="/assets/images/blog/03.jpg" alt="">

                        <div class="content p-6">
                            <a href="blog-detail.html" class="title h5 text-lg font-medium hover:text-primary duration-500 ease-in-out">Smartest Applications for Business</a>
                            <p class="text-slate-400 mt-3">The phrasal sequence of the is now so that many campaign and benefit</p>
                            
                            <div class="mt-4">
                                <a href="blog-detail.html" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-primary after:bg-primary duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End -->
</template>