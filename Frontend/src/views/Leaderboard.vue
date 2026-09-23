<script setup lang="ts">
import { ref, onMounted } from 'vue';
import PageTitle from '../components/PageTitle.vue';
import { ApiService } from '../services/api';

const leaderboard = ref<any[]>([]);
const loading = ref(false);

const fetchLeaderboard = async () => {
    loading.value = true;
    try {
        const response = await ApiService.getLeaderboard(10);
        leaderboard.value = response.data;
    } catch (error) {
        console.error("Failed to fetch leaderboard", error);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    fetchLeaderboard();
});

const getMedalColor = (index: number) => {
    if (index === 0) return 'text-yellow-400'; // Gold
    if (index === 1) return 'text-gray-400'; // Silver
    if (index === 2) return 'text-amber-600'; // Bronze
    return 'text-primary';
};
</script>

<template>
    <PageTitle heading="Leaderboard" tagline="See the top performing students across India."
        :breadcrumb-links="[
            { label: 'Home', href: '/' },
            { label: 'Leaderboard', disabled: true }
        ]" />

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            
            <div v-if="loading" class="text-center py-12">
                <i class="uil uil-spinner-alt text-4xl text-primary animate-spin inline-block"></i>
                <p class="text-slate-400 mt-2">Loading ranks...</p>
            </div>

            <div v-else class="max-w-3xl mx-auto bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md overflow-hidden">
                <div class="bg-primary p-6 text-center text-white">
                    <h3 class="text-2xl font-bold">Top 10 Students</h3>
                    <p class="opacity-80">Ranked by total achievement points</p>
                </div>
                
                <ul class="divide-y divide-gray-100 dark:divide-gray-800">
                    <li v-for="(student, index) in leaderboard" :key="student.id" class="p-6 flex items-center hover:bg-gray-50 dark:hover:bg-slate-800 transition">
                        
                        <!-- Rank Number & Medal -->
                        <div class="w-16 flex justify-center items-center">
                            <span v-if="index < 3" :class="['text-3xl', getMedalColor(index)]">
                                <i class="uil uil-medal"></i>
                            </span>
                            <span v-else class="text-xl font-bold text-slate-400">#{{ index + 1 }}</span>
                        </div>

                        <!-- Avatar -->
                        <div class="w-12 h-12 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-xl font-bold text-slate-500 shrink-0">
                            {{ student.name.charAt(0) }}
                        </div>

                        <!-- Student Details -->
                        <div class="ml-4 flex-grow">
                            <h5 class="text-lg font-semibold">{{ student.name }}</h5>
                            <p class="text-sm text-slate-400"><i class="uil uil-building mr-1"></i>{{ student.school }}</p>
                        </div>

                        <!-- Points -->
                        <div class="text-right shrink-0">
                            <span class="text-2xl font-bold text-primary">{{ student.points }}</span>
                            <span class="text-sm text-slate-400 block -mt-1">PTS</span>
                        </div>
                    </li>
                </ul>

                <div v-if="leaderboard.length === 0" class="p-12 text-center text-slate-400">
                    No points have been awarded yet. Start competing!
                </div>
            </div>

        </div>
    </section>
</template>
