<script setup lang="ts">
import { ref, onMounted, computed, watch } from 'vue';
import { useRoute } from 'vue-router';
import { ApiService } from '../services/api';
import BookmarkButton from '../components/BookmarkButton.vue';
import PageTitle from '../components/PageTitle.vue';
import { useAuthStore } from '../stores/auth';

const route = useRoute();
const authStore = useAuthStore();

const competition = ref<any>(null);
const loading = ref(true);
const activeTab = ref<'overview' | 'rules' | 'prizes' | 'organizer'>('overview');
const showRegistrationModal = ref(false);

const fetchCompetition = async (idOrSlug: string) => {
    loading.value = true;
    try {
        const response = await ApiService.getCompetition(idOrSlug);
        competition.value = response.data.data;
    } catch (e) {
        console.error("Failed to load competition details:", e);
    } finally {
        loading.value = false;
    }
};

onMounted(() => {
    if (route.params.id) {
        fetchCompetition(route.params.id as string);
    }
});

watch(
    () => route.params.id,
    (newId) => {
        if (newId) {
            fetchCompetition(newId as string);
        }
    }
);

const formatDate = (dateStr: string) => {
    if (!dateStr) return 'N/A';
    return new Date(dateStr).toLocaleDateString('en-IN', {
        day: 'numeric',
        month: 'short',
        year: 'numeric'
    });
};

const isDeadlinePassed = computed(() => {
    if (!competition.value?.registration_deadline) return false;
    return new Date(competition.value.registration_deadline) < new Date();
});

const handleApply = () => {
    if (competition.value?.apply_url) {
        window.open(competition.value.apply_url, '_blank');
    } else {
        if (!authStore.isAuthenticated) {
            authStore.openModal('login');
        } else {
            showRegistrationModal.value = true;
        }
    }
};
</script>

<template>
    <div>
        <template v-if="loading">
            <div class="min-h-screen flex items-center justify-center py-32">
                <div class="text-center">
                    <div class="inline-block animate-spin rounded-full h-12 w-12 border-4 border-primary border-t-transparent"></div>
                    <p class="mt-4 text-slate-500 font-medium">Loading competition details...</p>
                </div>
            </div>
        </template>

        <template v-else-if="competition">
            <!-- Hero Header -->
            <PageTitle 
                :heading="competition.name" 
                tagline="Student Competition" 
                :breadcrumb-links="[
                    { label: 'Home', href: '/' },
                    { label: 'Competitions', href: '/competitions' },
                    { label: competition.name, disabled: true }
                ]" 
            />

            <section class="relative md:py-24 py-16">
                <div class="container relative">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-8">
                        
                        <!-- Left Main Content Column -->
                        <div class="lg:col-span-8 md:col-span-7">
                            <div class="relative overflow-hidden rounded-xl shadow-md bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800">
                                <!-- Banner Image -->
                                <div class="relative h-64 md:h-80 overflow-hidden bg-slate-100 dark:bg-slate-800">
                                    <img 
                                        :src="competition.image || '/assets/images/portfolio/1.jpg'" 
                                        :alt="competition.name" 
                                        class="w-full h-full object-cover"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
                                    
                                    <!-- Badges over Banner -->
                                    <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                                        <span v-if="competition.category_name" class="bg-primary text-white text-xs font-semibold px-3 py-1.5 rounded-full shadow">
                                            {{ competition.category_name }}
                                        </span>
                                        <span v-if="competition.scope" class="bg-slate-800/90 backdrop-blur-md text-white text-xs font-semibold px-3 py-1.5 rounded-full capitalize">
                                            {{ competition.scope }}
                                        </span>
                                    </div>

                                    <div class="absolute top-4 right-4">
                                        <BookmarkButton 
                                            type="competition" 
                                            :id="competition.id" 
                                            :initial-bookmarked="competition.is_bookmarked" 
                                        />
                                    </div>

                                    <div class="absolute bottom-4 left-4 right-4 text-white">
                                        <span class="text-xs uppercase tracking-wider text-primary-300 font-semibold">Code: {{ competition.code || 'N/A' }}</span>
                                        <h2 class="text-2xl md:text-3xl font-bold mt-1 text-white">{{ competition.name }}</h2>
                                    </div>
                                </div>

                                <!-- Tab Navigation -->
                                <div class="border-b border-gray-100 dark:border-slate-800 bg-gray-50/50 dark:bg-slate-800/50 px-6 py-2">
                                    <div class="flex flex-wrap gap-4 text-sm font-semibold">
                                        <button 
                                            @click="activeTab = 'overview'" 
                                            class="py-2.5 px-4 rounded-lg transition-all"
                                            :class="activeTab === 'overview' ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-primary'"
                                        >
                                            <i class="uil uil-file-alt me-1"></i> Overview
                                        </button>
                                        <button 
                                            @click="activeTab = 'rules'" 
                                            class="py-2.5 px-4 rounded-lg transition-all"
                                            :class="activeTab === 'rules' ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-primary'"
                                        >
                                            <i class="uil uil-clipboard-notes me-1"></i> Rules & Eligibility
                                        </button>
                                        <button 
                                            @click="activeTab = 'prizes'" 
                                            class="py-2.5 px-4 rounded-lg transition-all"
                                            :class="activeTab === 'prizes' ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-primary'"
                                        >
                                            <i class="uil uil-trophy me-1"></i> Prizes & Rewards
                                        </button>
                                        <button 
                                            @click="activeTab = 'organizer'" 
                                            class="py-2.5 px-4 rounded-lg transition-all"
                                            :class="activeTab === 'organizer' ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-400 hover:text-primary'"
                                        >
                                            <i class="uil uil-building me-1"></i> Organizer Info
                                        </button>
                                    </div>
                                </div>

                                <!-- Tab Content Body -->
                                <div class="p-6 md:p-8">
                                    <!-- Tab 1: Overview -->
                                    <div v-if="activeTab === 'overview'" class="space-y-6">
                                        <div>
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">About the Competition</h3>
                                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line">
                                                {{ competition.description || 'No description provided for this competition.' }}
                                            </p>
                                        </div>

                                        <div v-if="competition.location" class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                            <h4 class="font-semibold text-slate-800 dark:text-slate-200 flex items-center gap-2 mb-1">
                                                <i class="uil uil-map-marker text-primary text-lg"></i> Venue / Location
                                            </h4>
                                            <p class="text-slate-600 dark:text-slate-400 text-sm">
                                                {{ competition.location }} {{ competition.city_name ? `(${competition.city_name})` : '' }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Tab 2: Rules & Eligibility -->
                                    <div v-if="activeTab === 'rules'" class="space-y-6">
                                        <div>
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 flex items-center gap-2">
                                                <i class="uil uil-user-check text-primary"></i> Eligibility Criteria
                                            </h3>
                                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line">
                                                {{ competition.eligibility_criteria || `Open to students from Grade ${competition.grade_min || 1} to Grade ${competition.grade_max || 12}.` }}
                                            </p>
                                        </div>

                                        <div class="border-t border-gray-100 dark:border-slate-800 pt-6">
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 flex items-center gap-2">
                                                <i class="uil uil-file-shield-alt text-primary"></i> Rules & Guidelines
                                            </h3>
                                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line">
                                                {{ competition.rules || 'Detailed rules and guidelines will be shared upon registration.' }}
                                            </p>
                                        </div>

                                        <div v-if="competition.judging_criteria" class="border-t border-gray-100 dark:border-slate-800 pt-6">
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 flex items-center gap-2">
                                                <i class="uil uil-balance-scale text-primary"></i> Judging Criteria
                                            </h3>
                                            <p class="text-slate-600 dark:text-slate-400 leading-relaxed whitespace-pre-line">
                                                {{ competition.judging_criteria }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Tab 3: Prizes & Rewards -->
                                    <div v-if="activeTab === 'prizes'" class="space-y-6">
                                        <div>
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3 flex items-center gap-2">
                                                <i class="uil uil-award text-yellow-500"></i> Prizes & Recognition
                                            </h3>
                                            <div class="p-5 rounded-xl bg-gradient-to-r from-amber-50 to-orange-50 dark:from-slate-800 dark:to-slate-800/80 border border-amber-200 dark:border-slate-700">
                                                <p class="text-slate-800 dark:text-slate-200 leading-relaxed whitespace-pre-line font-medium">
                                                    {{ competition.prize || 'Exciting cash prizes, trophies, and certificates for winners and participants!' }}
                                                </p>
                                            </div>
                                        </div>

                                        <div v-if="competition.terms_and_conditions" class="border-t border-gray-100 dark:border-slate-800 pt-6">
                                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Terms & Conditions</h3>
                                            <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed whitespace-pre-line">
                                                {{ competition.terms_and_conditions }}
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Tab 4: Organizer Info -->
                                    <div v-if="activeTab === 'organizer'" class="space-y-6">
                                        <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">Organizer Details</h3>
                                        
                                        <div class="grid sm:grid-cols-2 gap-4">
                                            <div class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                                <span class="text-xs uppercase tracking-wider text-slate-400 block mb-1">Organization</span>
                                                <p class="font-semibold text-slate-900 dark:text-white">{{ competition.organizer_name || 'Sambhav Official' }}</p>
                                            </div>

                                            <div v-if="competition.organizer_email" class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                                <span class="text-xs uppercase tracking-wider text-slate-400 block mb-1">Email</span>
                                                <a :href="`mailto:${competition.organizer_email}`" class="font-semibold text-primary hover:underline">
                                                    {{ competition.organizer_email }}
                                                </a>
                                            </div>

                                            <div v-if="competition.organizer_phone" class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                                <span class="text-xs uppercase tracking-wider text-slate-400 block mb-1">Phone</span>
                                                <p class="font-semibold text-slate-900 dark:text-white">{{ competition.organizer_phone }}</p>
                                            </div>

                                            <div v-if="competition.organizer_website" class="p-4 rounded-lg bg-slate-50 dark:bg-slate-800 border border-slate-100 dark:border-slate-700">
                                                <span class="text-xs uppercase tracking-wider text-slate-400 block mb-1">Website</span>
                                                <a :href="competition.organizer_website" target="_blank" class="font-semibold text-primary hover:underline">
                                                    {{ competition.organizer_website }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Right Sidebar Column -->
                        <div class="lg:col-span-4 md:col-span-5">
                            <div class="sticky top-20 space-y-6">
                                <!-- Registration Summary Card -->
                                <div class="p-6 rounded-xl shadow-md bg-white dark:bg-slate-900 border border-gray-100 dark:border-slate-800">
                                    <div class="mb-6 pb-6 border-b border-gray-100 dark:border-slate-800 text-center">
                                        <span class="text-xs font-bold uppercase tracking-wider text-slate-400 block mb-1">Registration Fee</span>
                                        <div class="text-3xl font-extrabold text-slate-900 dark:text-white">
                                            {{ competition.registration_fee ? `₹${competition.registration_fee}` : 'Free' }}
                                        </div>
                                    </div>

                                    <!-- Quick Details List -->
                                    <div class="space-y-4 mb-6 text-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-slate-500 dark:text-slate-400 flex items-center gap-2">
                                                <i class="uil uil-calendar-alt text-primary"></i> Start Date
                                            </span>
                                            <span class="font-semibold text-slate-900 dark:text-white">{{ formatDate(competition.start_date) }}</span>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <span class="text-slate-500 dark:text-slate-400 flex items-center gap-2">
                                                <i class="uil uil-clock text-primary"></i> End Date
                                            </span>
                                            <span class="font-semibold text-slate-900 dark:text-white">{{ formatDate(competition.end_date) }}</span>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <span class="text-slate-500 dark:text-slate-400 flex items-center gap-2">
                                                <i class="uil uil-stopwatch text-red-500"></i> Deadline
                                            </span>
                                            <span class="font-semibold" :class="isDeadlinePassed ? 'text-red-600' : 'text-emerald-600'">
                                                {{ formatDate(competition.registration_deadline) }}
                                            </span>
                                        </div>

                                        <div class="flex items-center justify-between">
                                            <span class="text-slate-500 dark:text-slate-400 flex items-center gap-2">
                                                <i class="uil uil-graduation-cap text-primary"></i> Grade Level
                                            </span>
                                            <span class="font-semibold text-slate-900 dark:text-white">
                                                Grades {{ competition.grade_min || 1 }} - {{ competition.grade_max || 12 }}
                                            </span>
                                        </div>
                                    </div>

                                    <!-- CTA Button -->
                                    <button 
                                        @click="handleApply" 
                                        :disabled="isDeadlinePassed"
                                        class="w-full py-3 px-6 text-center font-bold text-white rounded-lg shadow-lg transition-all flex items-center justify-center gap-2"
                                        :class="isDeadlinePassed ? 'bg-slate-400 cursor-not-allowed' : 'bg-primary hover:bg-primary-700'"
                                    >
                                        <i class="uil uil-external-link-alt"></i>
                                        <span>{{ isDeadlinePassed ? 'Registration Closed' : (competition.apply_url ? 'Apply via External Site' : 'Register Now') }}</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <!-- Registration Modal (For internal registration) -->
            <div v-if="showRegistrationModal" class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/60 backdrop-blur-sm p-4">
                <div class="bg-white dark:bg-slate-900 rounded-2xl shadow-2xl max-w-md w-full p-6 border border-gray-100 dark:border-slate-800">
                    <div class="flex justify-between items-center pb-4 border-b border-gray-100 dark:border-slate-800">
                        <h3 class="text-lg font-bold text-slate-900 dark:text-white">Confirm Registration</h3>
                        <button @click="showRegistrationModal = false" class="text-slate-400 hover:text-slate-600">
                            <i class="uil uil-times text-xl"></i>
                        </button>
                    </div>
                    <div class="py-6 text-center space-y-3">
                        <div class="size-16 bg-primary/10 text-primary rounded-full flex items-center justify-center mx-auto text-2xl">
                            <i class="uil uil-check-circle"></i>
                        </div>
                        <h4 class="font-bold text-slate-900 dark:text-white text-lg">{{ competition.name }}</h4>
                        <p class="text-slate-600 dark:text-slate-400 text-sm">
                            Would you like to register for this competition with your student profile details?
                        </p>
                    </div>
                    <div class="flex gap-3 pt-4 border-t border-gray-100 dark:border-slate-800">
                        <button @click="showRegistrationModal = false" class="flex-1 py-2.5 rounded-lg border border-slate-200 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-all">
                            Cancel
                        </button>
                        <button @click="showRegistrationModal = false; alert('Registration interest recorded successfully!')" class="flex-1 py-2.5 rounded-lg bg-primary text-white font-semibold hover:bg-primary-700 shadow-md transition-all">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </template>

        <template v-else>
            <div class="min-h-screen flex items-center justify-center py-32">
                <div class="text-center space-y-4">
                    <i class="uil uil-exclamation-triangle text-5xl text-amber-500"></i>
                    <h3 class="text-2xl font-bold text-slate-800 dark:text-white">Competition Not Found</h3>
                    <p class="text-slate-500">The competition you are looking for does not exist or has been removed.</p>
                    <a href="/competitions" class="inline-block py-2.5 px-6 bg-primary text-white rounded-lg font-semibold">Back to Competitions</a>
                </div>
            </div>
        </template>
    </div>
</template>
