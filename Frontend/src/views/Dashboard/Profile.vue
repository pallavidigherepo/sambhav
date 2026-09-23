<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useAuthStore } from '../../stores/auth';
import PageTitle from '../../components/PageTitle.vue';

const authStore = useAuthStore();
const activeTab = ref('achievements');

onMounted(() => {
    if (!authStore.profile) {
        authStore.fetchUser();
    }
});
</script>

<template>
    <PageTitle heading="Student Dashboard" tagline="Manage your digital identity, achievements, and bookmarks."
        :breadcrumb-links="[
            { label: 'Home', href: '/' },
            { label: 'Dashboard', disabled: true }
        ]" />

    <section class="relative md:py-24 py-16">
        <div class="container relative">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                
                <!-- Left Sidebar Profile -->
                <div class="col-span-1">
                    <div class="bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md p-6 text-center">
                        <div class="size-24 rounded-full bg-slate-200 dark:bg-slate-700 flex items-center justify-center text-4xl font-bold text-slate-500 mx-auto mb-4">
                            {{ authStore.user?.name?.charAt(0) || 'U' }}
                        </div>
                        <h5 class="text-xl font-semibold">{{ authStore.user?.name || 'Student Name' }}</h5>
                        <p class="text-slate-400 mt-1">{{ authStore.profile?.school || 'No School Set' }}</p>
                        
                        <div class="mt-4 pt-4 border-t border-gray-100 dark:border-gray-800">
                            <h6 class="font-bold text-primary text-2xl">{{ authStore.profile?.total_points || 0 }}</h6>
                            <span class="text-slate-400 text-sm">Total Points</span>
                        </div>

                        <!-- Navigation -->
                        <ul class="text-left mt-6 space-y-2">
                            <li>
                                <button @click="activeTab = 'achievements'" 
                                    class="w-full text-left px-4 py-2 rounded-md transition"
                                    :class="activeTab === 'achievements' ? 'bg-primary text-white' : 'hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300'">
                                    <i class="uil uil-award mr-2"></i> Achievements
                                </button>
                            </li>
                            <li>
                                <button @click="activeTab = 'bookmarks'" 
                                    class="w-full text-left px-4 py-2 rounded-md transition"
                                    :class="activeTab === 'bookmarks' ? 'bg-primary text-white' : 'hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300'">
                                    <i class="uil uil-bookmark mr-2"></i> Saved Events
                                </button>
                            </li>
                            <li>
                                <button @click="activeTab = 'settings'" 
                                    class="w-full text-left px-4 py-2 rounded-md transition"
                                    :class="activeTab === 'settings' ? 'bg-primary text-white' : 'hover:bg-slate-50 dark:hover:bg-slate-800 text-slate-600 dark:text-slate-300'">
                                    <i class="uil uil-setting mr-2"></i> Profile Settings
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Content Area -->
                <div class="col-span-1 md:col-span-3">
                    <div class="bg-white dark:bg-slate-900 shadow dark:shadow-gray-800 rounded-md p-6 min-h-[400px]">
                        
                        <!-- Achievements Tab -->
                        <div v-if="activeTab === 'achievements'">
                            <h4 class="text-xl font-semibold mb-6">Your Achievements</h4>
                            
                            <div v-if="authStore.profile?.achievements?.length" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div v-for="achievement in authStore.profile.achievements" :key="achievement.id" class="p-4 border border-gray-100 dark:border-gray-800 rounded-md flex items-start">
                                    <div class="size-12 rounded bg-primary/10 text-primary flex items-center justify-center text-2xl mr-4 shrink-0">
                                        <i class="uil uil-trophy"></i>
                                    </div>
                                    <div>
                                        <h6 class="font-semibold">{{ achievement.title }}</h6>
                                        <p class="text-sm text-slate-400 mt-1">{{ achievement.description }}</p>
                                        <span class="inline-block mt-2 text-xs font-bold text-primary bg-primary/10 px-2 py-1 rounded">+{{ achievement.points_awarded }} PTS</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div v-else class="text-center py-12 text-slate-400">
                                <i class="uil uil-award text-6xl mb-4 block opacity-50"></i>
                                You haven't earned any achievements yet. Participate in competitions to earn points!
                            </div>
                        </div>

                        <!-- Bookmarks Tab -->
                        <div v-if="activeTab === 'bookmarks'">
                            <h4 class="text-xl font-semibold mb-6">Saved Competitions & Events</h4>
                            <div class="text-center py-12 text-slate-400">
                                <i class="uil uil-bookmark text-6xl mb-4 block opacity-50"></i>
                                Bookmarked items will appear here (Requires API Endpoint)
                            </div>
                        </div>

                        <!-- Settings Tab -->
                        <div v-if="activeTab === 'settings'">
                            <h4 class="text-xl font-semibold mb-6">Profile Settings</h4>
                            <form class="max-w-md">
                                <div class="mb-4">
                                    <label class="form-label font-medium block mb-2">School Name</label>
                                    <input type="text" :value="authStore.profile?.school" class="form-input w-full py-2 px-3 h-10 bg-transparent border border-gray-100 dark:border-gray-800 rounded outline-none focus:border-primary" placeholder="e.g. Delhi Public School">
                                </div>
                                <div class="mb-4">
                                    <label class="form-label font-medium block mb-2">Current Grade</label>
                                    <select :value="authStore.profile?.grade" class="form-input w-full py-2 px-3 h-10 bg-transparent border border-gray-100 dark:border-gray-800 rounded outline-none focus:border-primary">
                                        <option v-for="n in 12" :key="n" :value="n">Grade {{ n }}</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label font-medium block mb-2">City</label>
                                    <input type="text" :value="authStore.profile?.city" class="form-input w-full py-2 px-3 h-10 bg-transparent border border-gray-100 dark:border-gray-800 rounded outline-none focus:border-primary" placeholder="e.g. New Delhi">
                                </div>
                                <button type="button" class="py-2 px-5 inline-block font-semibold tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md mt-2">Save Changes</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>
</template>
