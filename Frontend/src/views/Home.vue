<script lang="ts" setup>
import { ref, onMounted } from 'vue';
import { useAuthStore } from '@/stores/auth';
import { ApiService } from '../services/api';
import CompetitionCard from '../components/CompetitionCard.vue';

const authStore = useAuthStore();

const competitions = ref<any[]>([]);
const events = ref<any[]>([]);
const leaderboard = ref<any[]>([]);
const posts = ref<any[]>([]);
const loading = ref(true);

onMounted(async () => {
    loading.value = true;
    try {
        const [compRes, eventRes, leadRes, postRes] = await Promise.all([
            ApiService.getCompetitions({ limit: 4 }),
            ApiService.getEvents({ limit: 3 }),
            ApiService.getLeaderboard(3),
            ApiService.getPosts({ limit: 3 })
        ]);
        competitions.value = compRes.data.data || compRes.data;
        events.value = eventRes.data.data || eventRes.data;
        leaderboard.value = leadRes.data;
        posts.value = postRes.data.data || postRes.data;
    } catch (e) {
        console.error("Error fetching homepage data:", e);
    } finally {
        loading.value = false;
    }
});

const formatDate = (dateString: string) => {
    if (!dateString) return 'N/A';
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric', month: 'short', day: 'numeric'
    });
};

const getMedalColor = (index: number) => {
    if (index === 0) return 'text-yellow-400';
    if (index === 1) return 'text-gray-400';
    if (index === 2) return 'text-amber-600';
    return 'text-primary';
};
</script>

<template>
    <!-- Start Hero -->
    <section class="relative lg:py-44 py-36 bg-home bg-center bg-cover">
        <div class="absolute inset-0 bg-slate-900/60"></div>
        <div class="container relative z-1">
            <div class="grid grid-cols-1 text-center mt-10">
                <h4 class="font-bold lg:leading-normal leading-normal text-4xl lg:text-5xl mb-5 text-white">India’s Central Hub for <br> Student Competitions</h4>
                <p class="text-white/75 text-lg max-w-2xl mx-auto">Discover your infinite possibilities. Join the ultimate platform for students to participate in competitions, hackathons, and activities across the nation.</p>
            
                <div class="mt-8 flex justify-center gap-4">
                    <a href="/competitions" class="py-3 px-6 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md shadow-lg">Browse Competitions</a>
                    <a href="/events" class="py-3 px-6 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-transparent hover:bg-white border-white text-white hover:text-slate-900 rounded-md shadow-lg transition-all">View Events</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="relative bg-primary py-12">
        <div class="container relative">
            <div class="relative grid md:grid-cols-4 grid-cols-2 items-center gap-[30px]">
                <div class="counter-box text-center">
                    <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="10000">10,000</span>+</h1>
                    <h5 class="counter-head text-xs font-semibold text-white uppercase">Registered Students</h5>
                </div>
                
                <div class="counter-box text-center">
                    <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="500">500</span>+</h1>
                    <h5 class="counter-head text-xs font-semibold text-white uppercase">Competitions Hosted</h5>
                </div>
                
                <div class="counter-box text-center">
                    <h1 class="text-4xl font-bold mb-4 text-white"><span class="counter-value" data-target="200">200</span>+</h1>
                    <h5 class="counter-head text-xs font-semibold text-white uppercase">Partner Schools</h5>
                </div>
                
                <div class="counter-box text-center">
                    <h1 class="text-4xl font-bold mb-4 text-white">₹<span class="counter-value" data-target="5">5</span>M+</h1>
                    <h5 class="counter-head text-xs font-semibold text-white uppercase">Prizes Awarded</h5>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->

    <!-- Main Content -->
    <div v-if="loading" class="text-center py-24">
        <i class="uil uil-spinner-alt text-4xl text-primary animate-spin inline-block"></i>
        <p class="text-slate-400 mt-2">Loading...</p>
    </div>
    <div v-else>
        <!-- Featured Competitions -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="flex justify-between items-end mb-8">
                    <div>
                        <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Featured Competitions</h3>
                        <p class="text-slate-400 max-w-xl mt-2">Explore the top competitions you can participate in right now.</p>
                    </div>
                    <a href="/competitions" class="text-primary hover:text-primary-700 font-medium transition hidden md:block">View All <i class="uil uil-arrow-right"></i></a>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[30px]">
                    <CompetitionCard v-for="comp in competitions.slice(0, 4)" :key="comp.id" :comp="comp" />
                </div>
                
                <div class="mt-8 text-center md:hidden">
                    <a href="/competitions" class="text-primary hover:text-primary-700 font-medium transition">View All Competitions <i class="uil uil-arrow-right"></i></a>
                </div>
            </div>
        </section>

        <!-- Upcoming Events & Leaderboard Section -->
        <section class="relative md:py-24 py-16 bg-gray-50 dark:bg-slate-800">
            <div class="container relative">
                <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                    <!-- Upcoming Events -->
                    <div class="lg:col-span-8 md:col-span-7">
                        <div class="flex justify-between items-end mb-8">
                            <div>
                                <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Upcoming Events</h3>
                                <p class="text-slate-400 max-w-xl mt-2">Join webinars, workshops, and hackathons.</p>
                            </div>
                            <a href="/events" class="text-primary hover:text-primary-700 font-medium transition hidden md:block">View All <i class="uil uil-arrow-right"></i></a>
                        </div>
                        
                        <div class="space-y-6">
                            <div v-for="event in events.slice(0, 3)" :key="event.id" class="flex flex-col md:flex-row bg-white dark:bg-slate-900 rounded-md shadow-sm hover:shadow-md transition overflow-hidden">
                                <div class="md:w-1/3 h-48 md:h-auto bg-slate-100 relative">
                                    <img v-if="event.image" :src="event.image" class="w-full h-full object-cover" alt="">
                                    <div v-else class="w-full h-full flex items-center justify-center text-slate-300">
                                        <i class="uil uil-image text-4xl"></i>
                                    </div>
                                    <div class="absolute top-4 start-4">
                                        <span class="bg-indigo-600 text-white text-[12px] font-bold px-2.5 py-0.5 rounded h-5 uppercase">{{ event.type || 'Event' }}</span>
                                    </div>
                                </div>
                                <div class="p-6 md:w-2/3 flex flex-col justify-center">
                                    <a :href="`/events/${event.slug}`" class="text-xl font-medium hover:text-primary transition line-clamp-1">{{ event.title }}</a>
                                    <p class="text-slate-400 mt-2 line-clamp-2 text-sm">{{ event.description }}</p>
                                    <div class="mt-4 flex items-center text-sm text-slate-500">
                                        <i class="uil uil-calendar-alt text-lg me-2"></i>
                                        <span>{{ formatDate(event.start_date) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8 text-center md:hidden">
                            <a href="/events" class="text-primary hover:text-primary-700 font-medium transition">View All Events <i class="uil uil-arrow-right"></i></a>
                        </div>
                    </div>
                    
                    <!-- Leaderboard -->
                    <div class="lg:col-span-4 md:col-span-5 mt-10 md:mt-0">
                        <div class="mb-8">
                            <h3 class="md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Top Performers</h3>
                            <p class="text-slate-400 max-w-xl mt-2">Leaderboard highlights.</p>
                        </div>
                        
                        <div class="bg-white dark:bg-slate-900 shadow-sm dark:shadow-gray-800 rounded-md overflow-hidden">
                            <ul class="divide-y divide-gray-100 dark:divide-gray-800">
                                <li v-for="(student, index) in leaderboard.slice(0, 3)" :key="student.id" class="p-4 flex items-center hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                                    <div class="w-12 flex justify-center items-center">
                                        <span :class="['text-2xl', getMedalColor(index)]">
                                            <i class="uil uil-medal"></i>
                                        </span>
                                    </div>
                                    <div class="w-10 h-10 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-lg font-bold text-slate-500 shrink-0">
                                        {{ student.name.charAt(0) }}
                                    </div>
                                    <div class="ml-3 flex-grow">
                                        <h5 class="font-semibold text-sm">{{ student.name }}</h5>
                                        <p class="text-xs text-slate-400"><i class="uil uil-building mr-1"></i>{{ student.school }}</p>
                                    </div>
                                    <div class="text-right shrink-0">
                                        <span class="text-xl font-bold text-primary">{{ student.points }}</span>
                                    </div>
                                </li>
                            </ul>
                            <div class="p-4 bg-gray-50 dark:bg-slate-800 text-center border-t border-gray-100 dark:border-gray-800">
                                <a href="/leaderboard" class="text-primary font-medium hover:text-primary-700 transition text-sm">View Full Leaderboard</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Latest Blogs -->
        <section class="relative md:py-24 py-16">
            <div class="container relative">
                <div class="grid grid-cols-1 pb-8 text-center">
                    <h3 class="mb-4 md:text-3xl text-2xl md:leading-normal leading-normal font-semibold">Latest News & Resources</h3>
                    <p class="text-slate-400 max-w-xl mx-auto">Stay updated with the latest tips, tricks, and success stories.</p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 mt-8 gap-[30px]">
                    <div v-for="post in posts.slice(0, 3)" :key="post.id" class="blog relative rounded-md shadow-sm dark:shadow-gray-800 overflow-hidden bg-white dark:bg-slate-900">
                        <img v-if="post.image" :src="post.image" alt="">
                        <div v-else class="h-48 bg-slate-100 w-full flex items-center justify-center text-slate-300">
                            <i class="uil uil-image text-4xl"></i>
                        </div>

                        <div class="content p-6">
                            <a :href="`/blogs/${post.slug}`" class="title h5 text-lg font-medium hover:text-primary duration-500 ease-in-out line-clamp-2">{{ post.title }}</a>
                            <p class="text-slate-400 mt-3 line-clamp-3 text-sm">{{ post.excerpt }}</p>
                            
                            <div class="mt-4">
                                <a :href="`/blogs/${post.slug}`" class="relative inline-block tracking-wide align-middle text-base text-center border-none after:content-[''] after:absolute after:h-px after:w-0 hover:after:w-full after:end-0 hover:after:end-auto after:bottom-0 after:start-0 after:duration-500 font-normal hover:text-primary after:bg-primary duration-500 ease-in-out">Read More <i class="uil uil-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-8 text-center">
                    <a href="/blogs" class="text-primary hover:text-primary-700 font-medium transition">View All Articles <i class="uil uil-arrow-right"></i></a>
                </div>
            </div>
        </section>
    </div>
</template>