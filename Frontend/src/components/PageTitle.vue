<script setup lang="ts">
interface BreadcrumbLink {
    label: string
    href?: string
    disabled?: boolean
}

const props = defineProps<{
    heading: string
    tagline: string
    breadcrumbLinks: BreadcrumbLink[]
}>()

</script>
<template>
    <div>
        <!-- Start Hero -->
        <section class="relative table w-full py-36 bg-about-us bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-slate-900 opacity-75"></div>
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center mt-10">
                    <h3 class="mb-6 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">{{
                        props.heading }}
                    </h3>

                    <p class="text-slate-300 text-lg max-w-xl mx-auto">{{ props.tagline }}</p>
                </div><!--end grid-->
            </div><!--end container-->

            <div class="absolute text-center z-10 bottom-5 start-0 end-0 mx-3">
                <ul class="tracking-[0.5px] mb-0 inline-block">
                    <template v-for="(crumb, index) in breadcrumbLinks" :key="index">
                        <li
                            class="inline-block uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white">
                            <router-link v-if="!crumb.disabled && crumb.href" :to="crumb.href">
                                {{ crumb.label }}
                            </router-link>
                            <span v-else aria-current="page" class="disabled">{{ crumb.label }}</span>
                        </li>
                        <li v-if="!crumb.disabled && crumb.href"
                            class="inline-block text-base text-white/50 mx-0.5 ltr:rotate-0 rtl:rotate-180"><i
                                class="uil uil-angle-right-b"></i></li>
                    </template>
                </ul>
            </div>
        </section><!--end section-->
        <div class="relative">
            <div
                class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
                <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Hero -->
    </div>

</template>