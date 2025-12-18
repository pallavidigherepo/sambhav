<script setup lang="ts">
import { onMounted, ref, watch } from 'vue';
import PageTitle from '../components/PageTitle.vue';
import axiosClient from "@/axios.js";
import { useRoute } from "vue-router";

onMounted(() => {
    getItem(route.params.params as string);
    getRecent();
});
const item = ref();
const route = useRoute()
const getItem = async (slug: string) => {
    try {
        const response = await axiosClient.get(`/blogs/${slug}`);
        item.value = JSON.parse(JSON.stringify(response.data.data)); //console.log(item); return false;
    } catch (err) {
        console.log("Failed to Load Menu", err);
    }
};
const items = ref<any[]>([]);
const isLoading = ref<boolean>(true); // Start as true
const getRecent = async () => {
    isLoading.value = true; // Turn on skeleton
    try {
        const url = '/blogs?recent=true';
        const response = await axiosClient.get(url);
        const { data } = JSON.parse(JSON.stringify(response.data));
        items.value = data;
        // Optional: Smooth scroll back to top when page changes
        window.scrollTo({ top: 0, behavior: 'smooth' });
    } catch (err) {
        console.log("Failed to Load Menu", err);
    } finally {
        // Small timeout for better visual transition if the API is too fast
        setTimeout(() => isLoading.value = false, 300);
    }
};

// 2. WATCH for changes to the slug in the URL
watch(
    () => route.params.params,
    (newSlug) => {
        if (newSlug) {
            getItem(newSlug as string);
        }
    }
);
</script>
<template>
    <template v-if="item">
        <!-- Start Hero -->
        <PageTitle heading="Blogs" tagline="`{$item.title}`" :breadcrumb-links="[
            { label: 'Home', href: '/' },
            { label: 'Blogs', disabled: true }
        ]" />
        <!-- End Hero -->

        <!-- Start Section-->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                    <div class="lg:col-span-8 md:col-span-6">
                        <div class="p-6 rounded-md shadow-sm dark:shadow-gray-800">

                            <img :src="item.image_url" :alt="item.title" class="rounded-md">

                            <div class="mt-6" v-html="item.content"></div>
                        </div>

                    </div>

                    <div class="lg:col-span-4 md:col-span-6">
                        <div class="sticky top-20">
                            <h5
                                class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow-sm dark:shadow-gray-800 rounded-md p-2 text-center">
                                Author</h5>
                            <div class="text-center mt-8">
                                <img src="/assets/images/coach/programmer.png"
                                    class="size-24 mx-auto rounded-full shadow-sm mb-4" alt="">

                                <a href="" class="text-lg font-semibold hover:text-primary duration-500">{{ item.creator
                                    }}</a>
                                <p class="text-slate-400">Content Writer</p>
                                <p class="text-slate-400">Posted On: {{ item.created_at }}</p>
                            </div>

                            <h5
                                class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow-sm dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                                Recent post</h5>
                            <template v-if="items">
                                <template v-for="recentBlog in items" :key="recentBlog.id">
                                    <div class="flex items-center mt-8">
                                        <img :src="recentBlog.image_url" :alt="recentBlog.title"
                                            class="h-16 rounded-md shadow-sm dark:shadow-gray-800">

                                        <div class="ms-3">
                                            <router-link
                                                :to="{ name: 'PostDetail', params: { params: recentBlog.slug } }"
                                                class="font-semibold hover:text-primary">{{
                                                    recentBlog.title }}</router-link>
                                            <p class="text-sm text-slate-400">{{ recentBlog.created_at }}</p>
                                        </div>
                                    </div>
                                </template>
                            </template>



                            <!-- <h5
                                class="text-lg font-semibold bg-gray-50 dark:bg-slate-800 shadow-sm dark:shadow-gray-800 rounded-md p-2 text-center mt-8">
                                Tagscloud</h5>
                            <ul class="list-none text-center mt-8">
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Business</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Finance</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Marketing</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Fashion</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Bride</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Lifestyle</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Travel</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Beauty</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Video</a>
                                </li>
                                <li class="inline-block m-2"><a href=""
                                        class="px-3 py-1 text-slate-400 hover:text-white dark:hover:text-white bg-gray-50 dark:bg-slate-800 text-sm hover:bg-primary dark:hover:bg-primary rounded-md shadow-sm dark:shadow-gray-800 duration-500">Audio</a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                </div><!--end grid-->
            </div><!--end container-->

        </section><!--end section-->
        <!-- End -->
    </template>
    <template v-else>
        Please wait while we are loading blogs.
    </template>
</template>