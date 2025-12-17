<script setup lang="ts">
import type { PaginationMeta } from '@/types/pagination';

// Define props with TypeScript interface
const props = defineProps<{
    meta: PaginationMeta
}>();

// Define emits with strict typing
const emit = defineEmits<{
    (e: 'navigate', url: string): void
}>();

const handleNavigation = (url: string | null): void => {
    if (url) {
        emit('navigate', url);
    }
};
</script>

<template>
    <div class="grid md:grid-cols-12 grid-cols-1 mt-8">
        <div class="md:col-span-12 text-center">
            <nav aria-label="Page navigation example">
                <ul class="inline-flex items-center -space-x-px">
                    <li v-for="(link, index) in meta.links" :key="index">
                        <button @click="handleNavigation(link.url)" :disabled="!link.url"
                            :aria-current="link.active ? 'page' : undefined"
                            class="size-[40px] inline-flex justify-center items-center border border-gray-100 dark:border-gray-800 transition-all duration-300"
                            :class="[
                                // Rounded corners for first and last items
                                index === 0 ? 'rounded-s-lg' : '',
                                index === meta.links.length - 1 ? 'rounded-e-lg' : '',

                                // Active State
                                link.active
                                    ? 'z-10 text-white bg-primary border-primary'
                                    : 'text-slate-400 bg-white dark:bg-slate-900 hover:text-white hover:border-primary hover:bg-primary dark:hover:bg-primary',

                                // Disabled State (e.g., Previous on page 1)
                                !link.url ? 'opacity-50 cursor-not-allowed' : 'cursor-pointer'
                            ]">
                            <i v-if="link.label.includes('Previous')"
                                class="uil uil-angle-left text-[20px] rtl:rotate-180"></i>

                            <i v-else-if="link.label.includes('Next')"
                                class="uil uil-angle-right text-[20px] rtl:rotate-180"></i>

                            <span v-else v-html="link.label"></span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</template>