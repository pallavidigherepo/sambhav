<script setup lang="ts">
import { onMounted, ref } from 'vue';
import PageTitle from '../components/PageTitle.vue';
import axiosClient from "@/axios.js";
import LoadingCard from '../components/LoadingCard.vue';
import type { PaginationMeta } from '@/types/pagination';
import Pagination from '../components/Pagination.vue';

onMounted(() => {
    getItems();
});
const items = ref<any[]>([]);
const paginationMeta = ref<PaginationMeta | null>(null);
const isLoading = ref<boolean>(true); // Start as true

const getItems = async (targetUrl: string = '/blogs'): Promise<void> => {
    isLoading.value = true; // Turn on skeleton
    try {
        const url = targetUrl || '/blogs';
        const response = await axiosClient.get(url);
        const { data, meta } = JSON.parse(JSON.stringify(response.data));
        items.value = data;
        paginationMeta.value = meta; // Contains the links array
        // Optional: Smooth scroll back to top when page changes
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } catch (err) {
        console.log("Failed to Load Menu", err);
    } finally {
        // Small timeout for better visual transition if the API is too fast
        setTimeout(() => isLoading.value = false, 300);
    }
};

</script>
<template>
    <PageTitle heading="Blogs" tagline="Blogs & News." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'Blogs', disabled: true }
    ]" />

    <!-- Start Section-->
    <template v-if="isLoading">
        <LoadingCard v-for="n in 1" :key="n" />
    </template>
    <section class="relative md:py-24 py-16" v-else>
        <div class="container relative">
            <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
                <template v-for="item in items" :key="item.id">
                    <div class="blog relative rounded-md shadow-sm dark:shadow-gray-800 overflow-hidden">
                        <router-link :to="{ name: 'PostDetail', params: { params: item.slug } }">
                            <img :src="item.image_url" :alt="item.title" class="blog-thumb">
                        </router-link>
                        <div class="content p-6">
                            <router-link :to="{ name: 'PostDetail', params: { params: item.slug } }"
                                class="title h5 text-lg font-medium hover:text-primary duration-500 ease-in-out">{{
                                    item.title }}</router-link>
                            <p class="text-slate-400 mt-3">{{ item.title }}</p>

                            <div class="mt-4">
                                <router-link :to="{ name: 'PostDetail', params: { params: item.slug } }"
                                    class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-primary after:bg-primary duration-500 ease-in-out">Read
                                    More <i class="uil uil-arrow-right"></i></router-link>
                            </div>
                        </div>
                    </div>
                </template>
            </div><!--end grid-->
            <Pagination v-if="paginationMeta" :meta="paginationMeta"
                :class="{ 'opacity-50 pointer-events-none': isLoading }" @navigate="getItems" />
        </div><!--end container-->
    </section><!--end section-->
    <!-- End -->
</template>