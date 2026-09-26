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
        class="flex justify-center items-center size-9 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md rounded-full shadow-xl hover:shadow-2xl text-slate-800 dark:text-slate-100 hover:text-red-500 hover:scale-110 active:scale-90 transition-all duration-200 z-10 border-2 border-white/60 dark:border-slate-600"
        :class="{ '!text-red-500 bg-red-50 dark:bg-red-950/50 !border-red-400': isBookmarked, 'opacity-50 cursor-wait': isLoading }"
        :title="isBookmarked ? 'Remove Bookmark' : 'Bookmark this contest'"
    >
        <i class="text-base font-bold transition-transform duration-200" :class="isBookmarked ? 'uis uis-bookmark text-red-500 scale-110' : 'uil uil-bookmark text-slate-800 dark:text-slate-100'"></i>
    </button>
</template>
