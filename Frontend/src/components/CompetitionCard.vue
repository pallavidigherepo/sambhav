<script setup lang="ts">
import BookmarkButton from './BookmarkButton.vue';

const props = defineProps<{
    comp: any
}>();

const formatDate = (dateString: string) => {
    if (!dateString) return 'N/A';
    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric', month: 'short', day: 'numeric'
    });
};
</script>

<template>
    <div class="group relative rounded-md shadow-sm hover:shadow-lg dark:shadow-gray-800 duration-500 ease-in-out overflow-hidden bg-white dark:bg-slate-900">
        <div class="relative overflow-hidden h-48 bg-slate-100">
            <a :href="`/competitions/${comp.slug || comp.id}`" class="block w-full h-full">
                <img v-if="comp.image" :src="comp.image" class="group-hover:scale-110 duration-500 ease-in-out w-full h-full object-cover" alt="">
                <div v-else class="w-full h-full flex items-center justify-center text-slate-300">
                    <i class="uil uil-image text-4xl"></i>
                </div>
            </a>
            <div class="absolute inset-0 bg-slate-900/50 opacity-0 group-hover:opacity-100 duration-500 ease-in-out pointer-events-none"></div>
            
            <div class="absolute top-4 start-4">
                <span class="bg-primary text-white text-[12px] font-bold px-2.5 py-0.5 rounded h-5 capitalize">{{ comp.scope || 'Regional' }}</span>
            </div>
            
            <div class="absolute top-4 end-4">
                <BookmarkButton type="competition" :id="comp.id" :initial-bookmarked="comp.is_bookmarked" />
            </div>
        </div>

        <div class="content p-6 relative">
            <span class="font-medium block text-primary mb-2">
                Grades {{ comp.grade_min ?? '1' }} - {{ comp.grade_max ?? '12' }}
            </span>
            <a :href="`/competitions/${comp.slug || comp.id}`" class="text-lg font-medium block hover:text-primary duration-500 ease-in-out line-clamp-2">
                {{ comp.name }}
            </a>
            <p class="text-slate-400 mt-3 mb-4 line-clamp-2 text-sm">{{ comp.description }}</p>

            <ul class="pt-4 border-t border-gray-100 dark:border-gray-800 flex items-center justify-between list-none text-slate-400 text-sm">
                <li class="flex items-center">
                    <i class="uil uil-calendar-alt text-lg leading-none me-2 text-slate-900 dark:text-white"></i>
                    <span>Deadline: {{ formatDate(comp.registration_deadline) }}</span>
                </li>
            </ul>

            <div class="absolute -top-7 end-6 z-1 opacity-0 group-hover:opacity-100 duration-500 ease-in-out">
                <a :href="comp.apply_url || '#'" target="_blank" class="flex justify-center items-center size-14 bg-white dark:bg-slate-900 rounded-full shadow-lg dark:shadow-gray-800 text-primary hover:text-white hover:bg-primary transition-all">
                    <i class="uil uil-arrow-right text-xl"></i>
                </a>
            </div>
        </div>
    </div>
</template>
