<script setup lang="ts">
import { ref, onMounted, watch, computed } from 'vue';
import CompetitionCard from '../components/CompetitionCard.vue';
import Pagination from '../components/Pagination.vue';
import type { PaginationMeta } from '@/types/pagination';
import { ApiService } from '../services/api';
import axiosClient from '../axios';

const competitions = ref<any[]>([]);
const paginationMeta = ref<PaginationMeta | null>(null);
const loading = ref(false);
const searchQuery = ref('');
const activeQuickTag = ref('all');

const parentCategories = ref<any[]>([]);

const filters = ref({
    category: '',
    subcategory: '',
    scope: '',
    grade: '',
    status: '',
    fee: '',
    sortBy: 'newest'
});

const loadCategories = async () => {
    try {
        const response = await axiosClient.get('/get_menu_items');
        if (response.data && response.data.competition) {
            parentCategories.value = response.data.competition;
        }
    } catch (err) {
        console.error("Failed to load categories:", err);
    }
};

const availableSubcategories = computed(() => {
    if (!filters.value.category) return [];
    const selectedParent = parentCategories.value.find(c => c.id == Number(filters.value.category));
    if (!selectedParent || !selectedParent.children) return [];

    const subcats: { id: number; name: string }[] = [];
    const flattenChildren = (items: any[]) => {
        for (const item of items) {
            subcats.push({ id: item.id, name: item.name });
            if (item.children && item.children.length > 0) {
                flattenChildren(item.children);
            }
        }
    };
    flattenChildren(selectedParent.children);
    return subcats;
});

// When main category changes, reset subcategory selection
watch(() => filters.value.category, () => {
    filters.value.subcategory = '';
});

const fetchCompetitions = async (targetUrlOrPage: string | number = 1) => {
    loading.value = true;
    try {
        const queryParams: Record<string, any> = {
            scope: filters.value.scope,
            grade: filters.value.grade,
            status: filters.value.status,
            fee: filters.value.fee,
            sortBy: filters.value.sortBy
        };

        if (filters.value.subcategory) {
            queryParams.category_id = filters.value.subcategory;
        } else if (filters.value.category) {
            queryParams.category_id = filters.value.category;
        }

        if (searchQuery.value.trim()) {
            queryParams.search = searchQuery.value.trim();
        }

        let response;
        if (typeof targetUrlOrPage === 'string' && targetUrlOrPage) {
            response = await axiosClient.get(targetUrlOrPage, { params: queryParams });
        } else {
            queryParams.page = targetUrlOrPage || 1;
            response = await ApiService.getCompetitions(queryParams);
        }

        const data = response.data;
        if (data && data.meta) {
            competitions.value = data.data;
            paginationMeta.value = data.meta;
        } else {
            competitions.value = data.data || data || [];
            paginationMeta.value = null;
        }
    } catch (error) {
        console.error("Error fetching competitions:", error);
    } finally {
        loading.value = false;
    }
};

const handleNavigate = (url: string) => {
    if (url) {
        fetchCompetitions(url);
        window.scrollTo({ top: 350, behavior: 'smooth' });
    }
};

const selectQuickTag = (tag: string) => {
    activeQuickTag.value = tag;
    if (tag === 'all') {
        filters.value.category = '';
        filters.value.subcategory = '';
        filters.value.scope = '';
        filters.value.fee = '';
        searchQuery.value = '';
    } else if (tag === 'free') {
        filters.value.fee = 'free';
    } else if (tag === 'national') {
        filters.value.scope = 'national';
    } else if (tag === 'intl') {
        filters.value.scope = 'international';
    } else if (tag === 'math') {
        // Find Math category if available
        const mathCat = parentCategories.value.find(c => c.name.toLowerCase().includes('math'));
        if (mathCat) {
            filters.value.category = mathCat.id;
        } else {
            searchQuery.value = 'math';
        }
    } else if (tag === 'tech') {
        const techCat = parentCategories.value.find(c => c.name.toLowerCase().includes('science') || c.name.toLowerCase().includes('tech'));
        if (techCat) {
            filters.value.category = techCat.id;
        } else {
            searchQuery.value = 'tech';
        }
    }
    fetchCompetitions(1);
};

const clearAllFilters = () => {
    filters.value = {
        category: '',
        subcategory: '',
        scope: '',
        grade: '',
        status: '',
        fee: '',
        sortBy: 'newest'
    };
    searchQuery.value = '';
    activeQuickTag.value = 'all';
    fetchCompetitions(1);
};

const hasActiveFilters = computed(() => {
    return !!(filters.value.category || filters.value.subcategory || filters.value.scope || filters.value.grade || filters.value.status || filters.value.fee || searchQuery.value);
});

watch([
    () => filters.value.category, 
    () => filters.value.subcategory, 
    () => filters.value.scope, 
    () => filters.value.grade, 
    () => filters.value.status, 
    () => filters.value.fee, 
    () => filters.value.sortBy
], () => {
    fetchCompetitions(1);
});

let searchTimeout: any = null;
watch(searchQuery, () => {
    if (searchTimeout) clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => {
        fetchCompetitions(1);
    }, 400);
});

onMounted(() => {
    loadCategories();
    fetchCompetitions(1);
});
</script>

<template>
    <div>
        <!-- Hero Section with Guaranteed High-Contrast Dark Mesh Backdrop -->
        <section class="relative py-16 md:py-24 text-white overflow-hidden" style="background: linear-gradient(135deg, #090d16 0%, #171938 50%, #090d16 100%)">
            <!-- Background Glow Orbs -->
            <div class="absolute -top-24 left-1/4 size-96 rounded-full bg-indigo-600/30 blur-3xl pointer-events-none"></div>
            <div class="absolute -bottom-24 right-10 size-96 rounded-full bg-purple-600/20 blur-3xl pointer-events-none"></div>
            
            <div class="container relative z-10 text-center max-w-4xl mx-auto px-4">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-bold uppercase tracking-wider text-amber-300 mb-6 shadow-xl">
                    <span>✨ Level Up Your Academic Journey</span>
                </div>
                
                <h1 class="text-3xl md:text-5xl lg:text-6xl font-extrabold tracking-tight text-white mb-4 leading-tight">
                    Find National & International <span style="background: linear-gradient(90deg, #fbbf24 0%, #38bdf8 50%, #c026d3 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Competitions</span>
                </h1>
                
                <p class="text-slate-300 text-base md:text-lg max-w-2xl mx-auto mb-8 leading-relaxed font-normal">
                    Discover handpicked Olympiads, Hackathons, Debates, and Science Contests designed for Grade 1-12 students. Win cash rewards and certificates!
                </p>

                <!-- Interactive Hero Search Bar -->
                <div class="max-w-2xl mx-auto relative shadow-2xl">
                    <div class="flex items-center bg-slate-900/90 rounded-2xl p-2 border-2 border-slate-700/80 focus-within:border-primary-400 transition-all shadow-inner">
                        <i class="uil uil-search text-2xl text-amber-400 ms-3 me-2"></i>
                        <input 
                            v-model="searchQuery" 
                            type="text" 
                            placeholder="Search by topic, e.g. Maths, Science, AI, Debate..." 
                            class="w-full bg-transparent text-white placeholder-slate-400 text-sm md:text-base outline-none py-2 font-medium"
                        />
                        <button v-if="searchQuery" @click="searchQuery = ''" class="p-2 text-slate-400 hover:text-white text-xl">
                            <i class="uil uil-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content Area -->
        <section class="relative md:py-16 py-10 bg-slate-50 dark:bg-slate-950 min-h-screen">
            <div class="container relative">

                <!-- Quick Filter Pill Bar -->
                <div class="flex items-center gap-2.5 overflow-x-auto pb-4 mb-8 no-scrollbar">
                    <button 
                        @click="selectQuickTag('all')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'all' ? 'bg-primary text-white shadow-primary/30' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:border-primary']"
                    >
                        <span>🔥 All Contests</span>
                    </button>

                    <button 
                        @click="selectQuickTag('free')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'free' ? 'pill-free-active' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:border-emerald-500']"
                    >
                        <span>⚡ Free Entry</span>
                    </button>

                    <button 
                        @click="selectQuickTag('national')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'national' ? 'pill-national-active' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:border-blue-500']"
                    >
                        <span>🇮🇳 National</span>
                    </button>

                    <button 
                        @click="selectQuickTag('intl')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'intl' ? 'pill-intl-active' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover:border-purple-500']"
                    >
                        <span>🌐 International</span>
                    </button>

                    <button 
                        @click="selectQuickTag('math')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'math' ? 'pill-math-active' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover-border-amber']"
                    >
                        <span>📐 Math & Olympiad</span>
                    </button>

                    <button 
                        @click="selectQuickTag('tech')"
                        :class="['px-4 py-2 rounded-full text-xs font-bold whitespace-nowrap transition-all flex items-center gap-1.5 shadow-sm', activeQuickTag === 'tech' ? 'pill-tech-active' : 'bg-white dark:bg-slate-900 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-800 hover-border-cyan']"
                    >
                        <span>🤖 Tech & AI</span>
                    </button>
                </div>
                
                <!-- Detailed Horizontal Filter Bar -->
                <div class="bg-white dark:bg-slate-900 shadow-md dark:shadow-slate-950/50 rounded-2xl p-5 md:p-6 mb-8 border border-slate-200/80 dark:border-slate-800">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 items-end">
                        
                        <!-- Category Filter -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-apps text-primary"></i> Category
                            </label>
                            <select v-model="filters.category" class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition">
                                <option value="">All Categories</option>
                                <option v-for="cat in parentCategories" :key="cat.id" :value="cat.id">
                                    {{ cat.name }}
                                </option>
                            </select>
                        </div>

                        <!-- Subcategory Filter -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-sitemap text-primary"></i> Subcategory
                            </label>
                            <select 
                                v-model="filters.subcategory" 
                                :disabled="!filters.category || availableSubcategories.length === 0"
                                class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition disabled:opacity-50 disabled:cursor-not-allowed"
                            >
                                <option value="">{{ availableSubcategories.length > 0 ? 'All Subcategories' : 'No Subcategories' }}</option>
                                <option v-for="sub in availableSubcategories" :key="sub.id" :value="sub.id">
                                    {{ sub.name }}
                                </option>
                            </select>
                        </div>

                        <!-- Region / Scope -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-globe text-primary"></i> Region / Scope
                            </label>
                            <select v-model="filters.scope" class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition">
                                <option value="">All Regions</option>
                                <option value="regional">Regional</option>
                                <option value="state">State</option>
                                <option value="national">National</option>
                                <option value="international">International</option>
                            </select>
                        </div>

                        <!-- Grade Level -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-graduation-cap text-primary"></i> Target Grade
                            </label>
                            <select v-model="filters.grade" class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition">
                                <option value="">All Grades (1 - 12)</option>
                                <option v-for="n in 12" :key="n" :value="n">Grade {{ n }}</option>
                            </select>
                        </div>

                        <!-- Fee Type -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-bill text-primary"></i> Entry Fee
                            </label>
                            <select v-model="filters.fee" class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition">
                                <option value="">All Competitions</option>
                                <option value="free">Free Only (₹0)</option>
                                <option value="paid">Paid Contests</option>
                            </select>
                        </div>

                        <!-- Sort By -->
                        <div>
                            <label class="font-bold text-xs uppercase tracking-wider text-slate-500 dark:text-slate-400 mb-2 flex items-center gap-1">
                                <i class="uil uil-sort text-primary"></i> Sort By
                            </label>
                            <select v-model="filters.sortBy" class="w-full bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 rounded-xl h-11 px-3 outline-none text-slate-800 dark:text-slate-200 text-sm font-semibold focus:border-primary transition">
                                <option value="newest">Newest First</option>
                                <option value="deadline">Closing Soonest</option>
                                <option value="fee_low">Fee: Low to High</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Results Header Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6 px-1">
                    <div class="flex items-center gap-2">
                        <span class="text-sm font-bold text-slate-800 dark:text-slate-200" v-if="paginationMeta">
                            Showing <span class="text-primary font-extrabold">{{ paginationMeta.from || 0 }} - {{ paginationMeta.to || 0 }}</span> of <span class="text-primary font-extrabold">{{ paginationMeta.total || 0 }}</span> Opportunities
                        </span>
                        <span class="text-sm font-bold text-slate-800 dark:text-slate-200" v-else>
                            Showing <span class="text-primary font-extrabold">{{ competitions.length }}</span> Opportunities
                        </span>
                        <span v-if="hasActiveFilters" class="inline-flex items-center gap-1 bg-amber-500/10 text-amber-600 dark:text-amber-400 text-xs font-semibold px-2.5 py-0.5 rounded-full border border-amber-500/20">
                            Filtered
                        </span>
                    </div>

                    <button 
                        v-if="hasActiveFilters" 
                        @click="clearAllFilters" 
                        class="text-xs font-bold text-red-500 hover:text-red-700 dark:hover:text-red-400 flex items-center gap-1 transition-colors"
                    >
                        <i class="uil uil-refresh"></i> Reset All Filters
                    </button>
                </div>

                <!-- Main Cards Grid -->
                <div>
                    <div v-if="loading" class="text-center py-20">
                        <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-primary border-t-transparent"></div>
                        <p class="text-slate-400 mt-4 font-medium">Discovering best opportunities...</p>
                    </div>
                    
                    <div v-else-if="competitions.length === 0" class="text-center py-20 bg-white dark:bg-slate-900 rounded-3xl border border-dashed border-slate-200 dark:border-slate-800 p-8 shadow-sm">
                        <div class="size-20 bg-slate-100 dark:bg-slate-800 text-slate-400 rounded-full flex items-center justify-center mx-auto text-3xl mb-4">
                            <i class="uil uil-search"></i>
                        </div>
                        <h4 class="text-xl font-bold text-slate-900 dark:text-white">No matching competitions found</h4>
                        <p class="text-slate-500 dark:text-slate-400 mt-2 max-w-md mx-auto text-sm">
                            Try searching for something else or reset your filters to explore all available student contests.
                        </p>
                        <button @click="clearAllFilters" class="mt-6 px-6 py-2.5 bg-primary text-white text-sm font-bold rounded-xl shadow-lg hover:bg-primary-700 transition-all">
                            Reset Filters
                        </button>
                    </div>

                    <div v-else>
                        <div class="competitions-grid items-stretch">
                            <!-- Dynamic Competition Cards with Staggered Entrance Animation -->
                            <CompetitionCard 
                                v-for="(comp, idx) in competitions" 
                                :key="comp.id" 
                                :comp="comp" 
                                class="card-stagger-fade"
                                :style="{ animationDelay: `${Math.min(idx * 60, 480)}ms` }"
                            />
                        </div>

                        <!-- Pagination Controls -->
                        <Pagination 
                            v-if="paginationMeta && paginationMeta.last_page > 1" 
                            :meta="paginationMeta" 
                            :class="{ 'opacity-50 pointer-events-none': loading }"
                            @navigate="handleNavigate" 
                        />
                    </div>
                </div>

            </div>
        </section>
    </div>
</template>

<style scoped>
/* Responsive Grid with Guaranteed Generous Gap Between Cards */
.competitions-grid {
    display: grid;
    grid-template-columns: repeat(1, minmax(0, 1fr));
    gap: 30px;
}

@media (min-width: 768px) {
    .competitions-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 30px;
    }
}

@media (min-width: 1024px) {
    .competitions-grid {
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 32px;
    }
}

/* Card Stagger Entrance Animation */
.card-stagger-fade {
    animation: cardFadeInUp 0.45s cubic-bezier(0.16, 1, 0.3, 1) both;
}

@keyframes cardFadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px) scale(0.97);
    }
    100% {
        opacity: 1;
        transform: translateY(0) scale(1);
    }
}

.pill-free-active {
    background-color: #059669 !important;
    color: #ffffff !important;
    border: 1px solid #059669 !important;
    box-shadow: 0 4px 14px rgba(5, 150, 105, 0.35) !important;
}

.pill-national-active {
    background-color: #2563eb !important;
    color: #ffffff !important;
    border: 1px solid #2563eb !important;
    box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35) !important;
}

.pill-intl-active {
    background-color: #7c3aed !important;
    color: #ffffff !important;
    border: 1px solid #7c3aed !important;
    box-shadow: 0 4px 14px rgba(124, 58, 237, 0.35) !important;
}

.pill-math-active {
    background-color: #d97706 !important;
    color: #ffffff !important;
    border: 1px solid #d97706 !important;
    box-shadow: 0 4px 14px rgba(217, 119, 6, 0.35) !important;
}

.pill-tech-active {
    background-color: #0891b2 !important;
    color: #ffffff !important;
    border: 1px solid #0891b2 !important;
    box-shadow: 0 4px 14px rgba(8, 145, 178, 0.35) !important;
}

.hover-border-amber:hover {
    border-color: #d97706 !important;
}

.hover-border-cyan:hover {
    border-color: #0891b2 !important;
}
</style>