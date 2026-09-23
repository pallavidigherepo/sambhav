<script setup lang="ts">
import { ref } from 'vue';
import { ApiService } from '../services/api';
import { useAuthStore } from '../stores/auth';

const props = defineProps<{
    type: 'competition' | 'event';
    id: number;
    initialBookmarked?: boolean;
}>();

const isBookmarked = ref(props.initialBookmarked || false);
const isLoading = ref(false);
const authStore = useAuthStore();

const toggleBookmark = async () => {
    // Prompt unauthenticated users to login via modal
    if (!authStore.isAuthenticated) {
        authStore.openModal('login');
        return;
    }

    if (isLoading.value) return;
    
    // Optimistic UI update
    isBookmarked.value = !isBookmarked.value;
    isLoading.value = true;

    try {
        await ApiService.toggleBookmark(props.type, props.id);
    } catch (error) {
        console.error("Failed to toggle bookmark", error);
        // Revert UI on failure
        isBookmarked.value = !isBookmarked.value;
    } finally {
        isLoading.value = false;
    }
};
</script>

<template>
    <button 
        @click.prevent="toggleBookmark" 
        :disabled="isLoading"
        class="flex justify-center items-center size-10 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-slate-400 hover:text-red-600 transition-all z-10"
        :class="{ 'text-red-600': isBookmarked, 'opacity-50 cursor-wait': isLoading }"
    >
        <i class="text-xl" :class="isBookmarked ? 'uis uis-bookmark' : 'uil uil-bookmark'"></i>
    </button>
</template>
