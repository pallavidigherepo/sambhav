<script setup lang="ts">
import { ref, onMounted, watch } from 'vue';
import PageTitle from '../components/PageTitle.vue';
import CompetitionCard from '../components/CompetitionCard.vue';
import { ApiService } from '../services/api';

const competitions = ref<any[]>([]);
const loading = ref(false);

const filters = ref({
    scope: '',
    grade: '',
    status: ''
});

const fetchCompetitions = async () => {
    loading.value = true;
    try {
        const response = await ApiService.getCompetitions(filters.value);
        // Assuming API returns data in response.data.data (Laravel pagination/resource)
        competitions.value = response.data.data || response.data; 
    } catch (error) {
        console.error("Error fetching competitions:", error);
    } finally {
        loading.value = false;
    }
};

watch(filters, () => {
    fetchCompetitions();
}, { deep: true });

onMounted(() => {
    fetchCompetitions();
});

</script>

<template>
    <PageTitle heading="Competitions" tagline="Find the best opportunities tailored for you."
        :breadcrumb-links="[
            { label: 'Home', href: '/' },
            { label: 'Competitions', disabled: true }
        ]" />

    <section class="relative md:py-24 py-16 overflow-hidden">
        <div class="container relative">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar Filters -->
                <div class="lg:w-1/4">
                    <div class="bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md p-6 sticky top-24">
                        <h5 class="text-lg font-semibold mb-4">Filters</h5>
                        
                        <!-- Scope Filter -->
                        <div class="mb-6">
                            <label class="font-medium text-sm text-slate-400 mb-2 block">Region / Scope</label>
                            <select v-model="filters.scope" class="w-full bg-transparent border border-gray-100 dark:border-gray-800 rounded-md h-10 px-3 outline-none">
                                <option value="">All Regions</option>
                                <option value="regional">Regional</option>
                                <option value="national">National</option>
                                <option value="international">International</option>
                            </select>
                        </div>

                        <!-- Grade Filter -->
                        <div class="mb-6">
                            <label class="font-medium text-sm text-slate-400 mb-2 block">Your Grade</label>
                            <select v-model="filters.grade" class="w-full bg-transparent border border-gray-100 dark:border-gray-800 rounded-md h-10 px-3 outline-none">
                                <option value="">Any Grade</option>
                                <option v-for="n in 12" :key="n" :value="n">Grade {{ n }}</option>
                            </select>
                        </div>

                        <!-- Status Filter -->
                        <div class="mb-6">
                            <label class="font-medium text-sm text-slate-400 mb-2 block">Status</label>
                            <select v-model="filters.status" class="w-full bg-transparent border border-gray-100 dark:border-gray-800 rounded-md h-10 px-3 outline-none">
                                <option value="">All</option>
                                <option value="open">Registration Open</option>
                            </select>
                        </div>
                        
                        <button @click="filters = {scope: '', grade: '', status: ''}" class="w-full py-2 bg-gray-100 dark:bg-slate-800 text-slate-900 dark:text-white rounded-md hover:bg-gray-200 transition">
                            Clear Filters
                        </button>
                    </div>
                </div>

                <!-- Main Content Grid -->
                <div class="lg:w-3/4">
                    <div v-if="loading" class="text-center py-10">
                        <i class="uil uil-spinner-alt text-4xl text-primary animate-spin inline-block"></i>
                        <p class="text-slate-400 mt-2">Loading competitions...</p>
                    </div>
                    
                    <div v-else-if="competitions.length === 0" class="text-center py-10 bg-gray-50 dark:bg-slate-800 rounded-md">
                        <i class="uil uil-search text-4xl text-slate-400 inline-block"></i>
                        <h4 class="text-lg font-medium mt-2">No competitions found</h4>
                        <p class="text-slate-400">Try adjusting your filters to find more opportunities.</p>
                    </div>

                    <div v-else class="grid grid-cols-1 md:grid-cols-2 gap-[30px]">
                        <!-- Dynamic Competition Card -->
                        <CompetitionCard v-for="comp in competitions" :key="comp.id" :comp="comp" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>