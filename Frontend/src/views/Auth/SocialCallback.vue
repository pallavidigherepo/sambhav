<script setup lang="ts">
import { onMounted, ref } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { useAuthStore } from '../../stores/auth';

const route = useRoute();
const router = useRouter();
const authStore = useAuthStore();
const error = ref('');

onMounted(async () => {
    const token = route.query.token as string;
    const name = route.query.name as string;
    const errorParam = route.query.error as string;

    if (errorParam === 'google_failed') {
        error.value = 'Google login failed. Please try again or use email/password.';
        setTimeout(() => router.push('/auth/login'), 3000);
        return;
    }

    if (token) {
        // Store the token in localStorage so axios picks it up
        localStorage.setItem('auth_token', token);
        
        // Fetch the user profile now that token is stored
        try {
            await authStore.fetchUser();
            router.push('/dashboard/profile');
        } catch {
            error.value = 'Login succeeded but failed to load your profile.';
            setTimeout(() => router.push('/auth/login'), 3000);
        }
    } else {
        error.value = 'No token received. Redirecting to login...';
        setTimeout(() => router.push('/auth/login'), 2000);
    }
});
</script>

<template>
    <section class="md:h-screen py-36 flex items-center bg-[url('/assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md text-center">
                    <router-link to="/"><img src="/assets/images/logo-icon-64.png" class="mx-auto" alt=""></router-link>
                    
                    <div v-if="!error" class="my-6">
                        <div class="inline-flex items-center justify-center size-16 bg-primary/10 rounded-full mb-4">
                            <svg class="animate-spin size-8 text-primary" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold">Signing you in...</h5>
                        <p class="text-slate-400 mt-2">Please wait while we set up your account.</p>
                    </div>

                    <div v-else class="my-6">
                        <div class="inline-flex items-center justify-center size-16 bg-red-100 rounded-full mb-4">
                            <svg class="size-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </div>
                        <h5 class="text-xl font-semibold text-red-600">{{ error }}</h5>
                        <p class="text-slate-400 mt-2">Redirecting you back...</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
