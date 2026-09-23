<script setup lang="ts">
import { ref, onMounted } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { ApiService } from '../../services/api';
import PageTitle from '../../components/PageTitle.vue';

const route = useRoute();
const router = useRouter();

const token = ref('');
const email = ref('');
const password = ref('');
const passwordConfirm = ref('');
const message = ref('');
const errorMsg = ref('');
const loading = ref(false);

onMounted(() => {
    // Expected URL format: /auth/reset-password?token=XYZ&email=abc@example.com
    token.value = (route.query.token as string) || '';
    email.value = (route.query.email as string) || '';
});

const handleResetPassword = async () => {
    if (password.value !== passwordConfirm.value) {
        errorMsg.value = 'Passwords do not match.';
        return;
    }

    loading.value = true;
    errorMsg.value = '';
    message.value = '';
    
    try {
        await ApiService.resetPassword({ 
            email: email.value,
            password: password.value,
            password_confirmation: passwordConfirm.value,
            token: token.value
        });
        
        message.value = 'Password reset successfully. Redirecting to login...';
        
        setTimeout(() => {
            router.push('/auth/login');
        }, 2000);
        
    } catch (error: any) {
        if (error.response?.data?.errors?.email) {
            errorMsg.value = error.response.data.errors.email[0];
        } else {
            errorMsg.value = 'Failed to reset password. The link may have expired.';
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
                    <h5 class="my-6 text-xl font-semibold">Create New Password</h5>
                    
                    <div v-if="errorMsg" class="bg-red-50 text-red-500 p-3 rounded mb-4 text-sm">
                        {{ errorMsg }}
                    </div>
                    
                    <div v-if="message" class="bg-green-50 text-green-600 p-3 rounded mb-4 text-sm">
                        {{ message }}
                    </div>

                    <form @submit.prevent="handleResetPassword" v-if="!message" class="text-start">
                        <div class="grid grid-cols-1">
                            <div class="mb-4">
                                <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                <input v-model="email" id="LoginEmail" type="email" class="form-input mt-3 w-full py-2 px-3 h-10 bg-gray-50 border border-gray-100 rounded text-slate-500" readonly>
                            </div>

                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPassword">New Password:</label>
                                <input v-model="password" id="LoginPassword" type="password" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="New Password:" required>
                            </div>
                            
                            <div class="mb-4">
                                <label class="font-semibold" for="LoginPasswordConfirm">Confirm New Password:</label>
                                <input v-model="passwordConfirm" id="LoginPasswordConfirm" type="password" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="Confirm Password:" required>
                            </div>

                            <div class="mb-4">
                                <button type="submit" :disabled="loading" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md w-full disabled:opacity-50">
                                    <span v-if="loading">Resetting...</span>
                                    <span v-else>Reset Password</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
