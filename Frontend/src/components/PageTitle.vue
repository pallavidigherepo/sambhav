<script setup lang="ts">
interface BreadcrumbLink {
    label: string
    href?: string
    disabled?: boolean
}

const props = defineProps<{
    heading: string
    tagline?: string
    breadcrumbLinks?: BreadcrumbLink[]
}>()

</script>
<template>
    <div class="relative">
        <!-- Start Hero with Royal Dawn Horizon Palette -->
        <section class="relative table w-full py-20 md:py-24 text-white overflow-hidden"
            style="background: linear-gradient(135deg, #1e1b4b 0%, #4a044e 30%, #7c2d12 65%, #c2410c 100%)">
            <!-- Warm Royal Sunrise Glow Orbs -->
            <div class="absolute -top-20 left-1/4 size-96 rounded-full bg-amber-400/25 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-20 right-10 size-96 rounded-full bg-orange-500/30 blur-3xl pointer-events-none"></div>
            <div class="absolute top-1/3 left-10 size-72 rounded-full bg-fuchsia-500/20 blur-3xl pointer-events-none"></div>

            <div class="container relative z-10">
                <div class="grid grid-cols-1 pb-6 text-center mt-6">
                    <h1 class="mb-4 md:text-5xl text-3xl md:leading-normal leading-tight font-black text-white drop-shadow-sm tracking-tight">
                        {{ props.heading }}
                    </h1>

                    <p v-if="props.tagline" class="text-amber-100/90 text-base md:text-lg max-w-2xl mx-auto leading-relaxed font-medium">
                        {{ props.tagline }}
                    </p>
                </div><!--end grid-->
            </div><!--end container-->

            <div v-if="breadcrumbLinks && breadcrumbLinks.length" class="text-center z-10 relative mt-1 mb-2">
                <ul class="tracking-[0.5px] mb-0 inline-flex items-center gap-1.5 px-4 py-1.5 rounded-full bg-black/25 backdrop-blur-md border border-white/20 text-xs shadow-md">
                    <template v-for="(crumb, index) in breadcrumbLinks" :key="index">
                        <li class="inline-block uppercase text-[12px] font-bold duration-300 ease-in-out text-amber-200/90 hover:text-white">
                            <router-link v-if="!crumb.disabled && crumb.href" :to="crumb.href" class="transition-colors">
                                {{ crumb.label }}
                            </router-link>
                            <span v-else aria-current="page" class="text-white">{{ crumb.label }}</span>
                        </li>
                        <li v-if="index < breadcrumbLinks.length - 1" class="inline-block text-xs text-amber-200/50 mx-0.5">
                            <i class="uil uil-angle-right-b"></i>
                        </li>
                    </template>
                </ul>
            </div>
        </section><!--end section-->

        <div class="relative">
            <div
                class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900 pointer-events-none">
                <svg class="w-full h-auto scale-[2.0] origin-top" viewBox="0 0 2880 48" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
        <!-- End Hero -->
    </div>

</template>