<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../../stores/auth';
import { ApiService } from '../../services/api';

const router = useRouter();
const authStore = useAuthStore();

const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirm = ref('');
const errorMsg = ref('');
const loading = ref(false);

const handleRegister = async () => {
    if (password.value !== passwordConfirm.value) {
        errorMsg.value = 'Passwords do not match.';
        return;
    }

    loading.value = true;
    errorMsg.value = '';
    
    try {
        const response = await ApiService.register({
            name: name.value,
            email: email.value,
            password: password.value,
            password_confirmation: passwordConfirm.value
        });
        
        authStore.user = response.data.user;
        await authStore.fetchUser(); // Ensures profile exists
        
        router.push('/dashboard/profile');
    } catch (error: any) {
        if (error.response?.data?.errors) {
            // Display first validation error
            const errors = error.response.data.errors;
            errorMsg.value = errors[Object.keys(errors)[0]][0];
        } else if (error.response?.data?.message) {
            errorMsg.value = error.response.data.message;
        } else {
            errorMsg.value = 'Registration failed.';
        }
    } finally {
        loading.value = false;
    }
};
</script>

<template>
    <section class="md:h-screen py-36 flex items-center bg-[url('/assets/images/cta.jpg')] bg-no-repeat bg-center bg-cover">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-slate-900"></div>
        <div class="container relative">
            <div class="flex justify-center">
                <div class="max-w-[400px] w-full m-auto p-6 bg-white dark:bg-slate-900 shadow-md dark:shadow-gray-800 rounded-md">
                    <router-link to="/">
                        <img src="/assets/images/logo_sunrise-transparent.png" style="height: 80px; max-height: 80px; width: auto;" class="mx-auto object-contain" alt="">
                    </router-link>
                    <h5 class="my-6 text-xl font-semibold">Signup</h5>
                    
                    <div v-if="errorMsg" class="bg-red-50 text-red-500 p-3 rounded mb-4 text-sm">
                        {{ errorMsg }}
                    </div>

                    <form @submit.prevent="handleRegister" class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="RegisterName">Your Name:</label>
                                <input v-model="name" id="RegisterName" type="text" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Harry" required>
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input v-model="email" id="LoginEmail" type="email" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="name@example.com" required>
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">Password:</label>
                                <input v-model="password" id="LoginPassword" type="password" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Password:" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPasswordConfirm">Confirm Password:</label>
                                <input v-model="passwordConfirm" id="LoginPasswordConfirm" type="password" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Confirm Password:" required>
                            </div>

                            <div class="mb-4">
                                <div class="flex items-center w-full mb-0">
                                    <input class="form-checkbox size-4 appearance-none rounded border border-gray-200 dark:border-gray-800 accent-primary checked:appearance-auto dark:accent-primary focus:border-primary-300 focus:ring-0 focus:ring-offset-0 focus:ring-primary-200 focus:ring-opacity-50 me-2" type="checkbox" id="AcceptT&C" required>
                                    <label class="form-check-label text-slate-400" for="AcceptT&C">I Accept <router-link to="/term-of-services" class="text-primary">Terms And Condition</router-link></label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <button type="submit" :disabled="loading" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md w-full disabled:opacity-50">
                                    <span v-if="loading">Registering...</span>
                                    <span v-else>Register</span>
                                </button>
                            </div>

                            <div class="text-center">
                                <span class="text-slate-400 me-2">Already have an account ? </span> <router-link to="/auth/login" class="text-slate-900 dark:text-white font-bold inline-block">Sign in</router-link>
                            </div>

                            <div class="relative my-4">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                                </div>
                                <div class="relative flex justify-center text-sm">
                                    <span class="px-2 bg-white dark:bg-slate-900 text-slate-400">Or sign up with</span>
                                </div>
                            </div>

                            <div>
                                <a :href="ApiService.getGoogleAuthUrl()" class="flex items-center justify-center gap-3 w-full py-2.5 px-5 border border-gray-200 dark:border-gray-700 rounded-md text-slate-700 dark:text-slate-200 hover:bg-gray-50 dark:hover:bg-slate-800 transition duration-300 font-medium">
                                    <svg class="size-5" viewBox="0 0 24 24">
                                        <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                        <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                        <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                        <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                                    </svg>
                                    Continue with Google
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
