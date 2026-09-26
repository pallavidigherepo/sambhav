<script setup lang="ts">
import { computed } from 'vue';
import BookmarkButton from './BookmarkButton.vue';

const props = defineProps<{
    comp: any
}>();

const formatDate = (dateString: string) => {
    if (!dateString) return 'N/A';
    return new Date(dateString).toLocaleDateString('en-IN', {
        day: 'numeric', month: 'short', year: 'numeric'
    });
};

const daysRemaining = computed(() => {
    if (!props.comp.registration_deadline) return null;
    const deadline = new Date(props.comp.registration_deadline).getTime();
    const today = new Date().getTime();
    const diffDays = Math.ceil((deadline - today) / (1000 * 3600 * 24));
    return diffDays;
});

const getGradientBackground = computed(() => {
    const id = Number(props.comp.id) || 1;
    const gradients = [
        'linear-gradient(135deg, #1e1b4b 0%, #312e81 40%, #4338ca 100%)',
        'linear-gradient(135deg, #0c4a6e 0%, #0369a1 40%, #0284c7 100%)',
        'linear-gradient(135deg, #78350f 0%, #b45309 40%, #d97706 100%)',
        'linear-gradient(135deg, #064e3b 0%, #047857 40%, #059669 100%)',
        'linear-gradient(135deg, #4a044e 0%, #86198f 40%, #c026d3 100%)',
        'linear-gradient(135deg, #172554 0%, #1e40af 40%, #3b82f6 100%)'
    ];
    return gradients[(id - 1) % gradients.length];
});

const getCategoryIcon = computed(() => {
    const name = (props.comp.category_name || props.comp.name || '').toLowerCase();
    if (name.includes('math') || name.includes('ioqm')) return 'uil-calculator-alt';
    if (name.includes('science') || name.includes('stem')) return 'uil-atom';
    if (name.includes('robot') || name.includes('tech') || name.includes('ai')) return 'uil-robot';
    if (name.includes('spell') || name.includes('speak') || name.includes('debate') || name.includes('voice')) return 'uil-comments';
    if (name.includes('sport')) return 'uil-trophy';
    if (name.includes('finan') || name.includes('quest')) return 'uil-bill';
    return 'uil-star';
});
</script>

<template>
    <div
        class="comp-card group relative rounded-3xl overflow-hidden bg-white dark:bg-slate-900 border border-slate-200/90 dark:border-slate-800 hover:border-primary-500/60 dark:hover:border-primary-500/60 flex flex-col h-full transition-all duration-300">

        <!-- Header / Banner Area with Explicit Proportional Height -->
        <div class="banner-container relative overflow-hidden shrink-0 bg-slate-950">
            <router-link :to="`/competitions/${comp.slug || comp.id}`" class="block w-full h-full relative">
                <!-- Image or Rich Linear Gradient -->
                <img v-if="comp.image" :src="comp.image"
                    class="w-full h-full object-cover transition-transform duration-700 ease-out group-hover:scale-110"
                    alt="">
                <div v-else :style="{ background: getGradientBackground }"
                    class="w-full h-full flex items-center justify-center relative overflow-hidden transition-transform duration-700 ease-out group-hover:scale-105">
                    <!-- Floating Ambient Glass Circles with Subtle Pulse -->
                    <div class="absolute -right-8 -top-8 size-44 rounded-full bg-white/10 blur-2xl ambient-orb-1"></div>
                    <div class="absolute -left-8 -bottom-8 size-44 rounded-full bg-black/30 blur-2xl ambient-orb-2">
                    </div>

                    <div class="relative text-center z-10">
                        <div
                            class="icon-bubble size-10 mx-auto rounded-xl bg-white/20 backdrop-blur-xl border border-white/30 flex items-center justify-center text-white shadow-xl transition-all duration-500 group-hover:scale-110 group-hover:bg-white/30 group-hover:shadow-[0_0_20px_rgba(255,255,255,0.4)]">
                            <i :class="['uil', getCategoryIcon, 'text-lg text-white']"></i>
                        </div>
                    </div>
                </div>

                <!-- Dynamic Diagonal Shine Sweep on Card Hover -->
                <div class="shine-sweep"></div>

                <!-- Dark Overlay for High Contrast -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/25 to-transparent opacity-80 group-hover:opacity-60 transition-opacity duration-300">
                </div>
            </router-link>

            <!-- Overlay Badges Container (Guaranteed Ample Inset Away from Corners) -->
            <div class="absolute inset-0 px-5 py-3 flex flex-col justify-between pointer-events-none z-10">
                <!-- Top Row: Scope Badge & Bookmark -->
                <div class="flex items-center justify-between w-full pointer-events-auto">
                    <span
                        class="badge-scope bg-slate-950/90 backdrop-blur-md text-white text-xs font-black px-4 py-1.5 rounded-full uppercase tracking-wider shadow-xl border-2 border-white/40 flex items-center gap-1.5 transition-transform duration-300 group-hover:scale-105">
                        <span v-if="comp.scope === 'international'">🌐</span>
                        <span v-else-if="comp.scope === 'national'">🇮🇳</span>
                        <span v-else-if="comp.scope === 'state'">📍</span>
                        <span v-else>🏠</span>
                        <span>{{ comp.scope || 'Regional' }}</span>
                    </span>

                    <BookmarkButton type="competition" :id="comp.id" :initial-bookmarked="comp.is_bookmarked" />
                </div>

                <!-- Bottom Row: Fee Tag & Deadline Badge -->
                <div class="flex items-center justify-between w-full pointer-events-auto">
                    <div>
                        <span v-if="!comp.registration_fee || comp.registration_fee == 0"
                            class="badge-fee bg-emerald-600 text-white text-xs font-black px-4 py-1.5 rounded-full shadow-xl border-2 border-emerald-300 flex items-center gap-1.5 tracking-wider transition-all duration-300 group-hover:shadow-emerald-500/50">
                            ⚡ FREE ENTRY
                        </span>
                        <span v-else
                            class="badge-fee bg-gradient-to-r from-amber-500 to-orange-500 text-slate-950 text-xs font-black px-4 py-1.5 rounded-full shadow-xl border-2 border-amber-200 flex items-center gap-1 tracking-wider transition-all duration-300 group-hover:shadow-amber-500/50">
                            ₹{{ comp.registration_fee }}
                        </span>
                    </div>

                    <div v-if="daysRemaining !== null">
                        <span
                            :class="['text-xs font-black px-4 py-1.5 rounded-full shadow-xl border-2 flex items-center gap-1.5 backdrop-blur-md transition-all duration-300', daysRemaining <= 7 ? 'bg-red-600 text-white border-red-300 urgent-pulse' : 'bg-slate-950/90 text-white border-white/40']">
                            <i class="uil uil-clock text-sm"></i>
                            <span>{{ daysRemaining > 0 ? `${daysRemaining} days left` : 'Ends Today' }}</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Body Content -->
        <div
            class="content p-6 relative flex flex-col flex-1 justify-between bg-white dark:bg-slate-900 transition-colors">
            <div>
                <!-- Grade Eligibility & Category Badges -->
                <div class="flex flex-wrap items-center gap-2.5 mb-3.5">
                    <span
                        class="inline-flex items-center gap-2 text-xs font-bold px-4 py-1.5 rounded-xl bg-indigo-50 text-indigo-700 dark:bg-indigo-950/60 dark:text-indigo-300 border border-indigo-200/80 dark:border-indigo-800/80 shadow-xs transition-transform duration-200 group-hover:scale-[1.02]">
                        <i class="uil uil-graduation-cap text-sm"></i>
                        <span>Grades {{ comp.grade_min ?? '1' }} - {{ comp.grade_max ?? '12' }}</span>
                    </span>

                    <span v-if="comp.category_name"
                        class="inline-flex items-center gap-2 text-xs font-bold px-4 py-1.5 rounded-xl bg-purple-50 text-purple-700 dark:bg-purple-950/60 dark:text-purple-300 border border-purple-200/80 dark:border-purple-800/80 shadow-xs line-clamp-1 max-w-[200px] transition-transform duration-200 group-hover:scale-[1.02]"
                        :title="comp.category_name">
                        <i class="uil uil-tag-alt text-sm opacity-70"></i>
                        <span class="truncate">{{ comp.category_name }}</span>
                    </span>
                </div>

                <!-- Competition Title -->
                <router-link :to="`/competitions/${comp.slug || comp.id}`"
                    class="text-lg font-extrabold text-slate-900 dark:text-white group-hover:text-primary transition-colors duration-200 line-clamp-2 min-h-[56px] leading-snug">
                    {{ comp.name }}
                </router-link>

                <!-- Description -->
                <p
                    class="text-slate-600 dark:text-slate-400 mt-2 mb-4 line-clamp-2 text-sm leading-relaxed min-h-[40px]">
                    {{ comp.description }}
                </p>
            </div>

            <!-- Footer Details & Action -->
            <div
                class="pt-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400 mt-auto">
                <div class="flex items-center gap-1.5 font-bold text-slate-700 dark:text-slate-300">
                    <i class="uil uil-calendar-alt text-primary text-sm"></i>
                    <span>Deadline: {{ formatDate(comp.registration_deadline) }}</span>
                </div>

                <router-link :to="`/competitions/${comp.slug || comp.id}`"
                    class="btn-explore px-4 py-2 bg-primary/10 text-primary dark:bg-primary/20 dark:text-primary-300 group-hover:bg-primary group-hover:text-white rounded-xl text-xs font-bold transition-all duration-300 flex items-center gap-1.5 shadow-sm group-hover:shadow-primary/40 group-hover:shadow-md">
                    <span>Explore</span>
                    <i
                        class="uil uil-arrow-right text-sm transform transition-transform duration-300 group-hover:translate-x-1"></i>
                </router-link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.comp-card {
    box-shadow: 0 4px 20px -2px rgba(15, 23, 42, 0.06);
    transition: transform 0.35s cubic-bezier(0.16, 1, 0.3, 1), box-shadow 0.35s cubic-bezier(0.16, 1, 0.3, 1), border-color 0.35s ease;
}

.comp-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 22px 35px -8px rgba(79, 70, 229, 0.16), 0 8px 16px -4px rgba(15, 23, 42, 0.08);
}

:global(.dark) .comp-card:hover {
    box-shadow: 0 22px 35px -8px rgba(0, 0, 0, 0.7), 0 0 20px 0 rgba(79, 70, 229, 0.15);
}

/* Explicit Proportional Banner Height */
.banner-container {
    height: 100px;
    min-height: 100px;
}

/* Light Reflection Sweep on Card Hover */
.shine-sweep {
    position: absolute;
    top: 0;
    left: -120%;
    width: 60%;
    height: 100%;
    background: linear-gradient(90deg,
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 0.22) 50%,
            rgba(255, 255, 255, 0) 100%);
    transform: skewX(-22deg);
    pointer-events: none;
    transition: left 0.85s cubic-bezier(0.19, 1, 0.22, 1);
}

.group:hover .shine-sweep {
    left: 180%;
}

/* Floating Icon Animation */
.icon-bubble {
    animation: floatIcon 3.5s ease-in-out infinite alternate;
}

@keyframes floatIcon {
    0% {
        transform: translateY(0px) rotate(0deg);
    }

    100% {
        transform: translateY(-5px) rotate(2deg);
    }
}

/* Urgent Deadline Badge Pulse */
.urgent-pulse {
    animation: gentlePulse 2s ease-in-out infinite;
}

@keyframes gentlePulse {

    0%,
    100% {
        box-shadow: 0 0 0 0 rgba(220, 38, 38, 0.6);
    }

    50% {
        box-shadow: 0 0 0 6px rgba(220, 38, 38, 0);
    }
}

/* Ambient orb background motion */
.ambient-orb-1 {
    animation: orbFloat1 7s ease-in-out infinite alternate;
}

.ambient-orb-2 {
    animation: orbFloat2 8s ease-in-out infinite alternate;
}

@keyframes orbFloat1 {
    0% {
        transform: translate(0, 0) scale(1);
    }

    100% {
        transform: translate(-10px, 12px) scale(1.1);
    }
}

@keyframes orbFloat2 {
    0% {
        transform: translate(0, 0) scale(1);
    }

    100% {
        transform: translate(12px, -10px) scale(1.15);
    }
}
</style>
