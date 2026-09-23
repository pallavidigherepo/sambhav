<script setup lang="ts">
import { ref } from 'vue';
import { ApiService } from '../../services/api';
import PageTitle from '../../components/PageTitle.vue';

const email = ref('');
const message = ref('');
const errorMsg = ref('');
const loading = ref(false);

const handleForgotPassword = async () => {
    loading.value = true;
    errorMsg.value = '';
    message.value = '';
    
    try {
        const response = await ApiService.forgotPassword({ email: email.value });
        message.value = response.data.status || 'If the email exists, a password reset link has been sent.';
    } catch (error: any) {
        if (error.response?.data?.email) {
            errorMsg.value = error.response.data.email;
        } else {
            errorMsg.value = 'Failed to send reset link.';
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
                    <h5 class="my-6 text-xl font-semibold">Recover Password</h5>
                    
                    <div class="grid grid-cols-1">
                        <p class="text-slate-400 mb-6">Please enter your email address. You will receive a link to create a new password via email.</p>
                        
                        <div v-if="errorMsg" class="bg-red-50 text-red-500 p-3 rounded mb-4 text-sm">
                            {{ errorMsg }}
                        </div>
                        
                        <div v-if="message" class="bg-green-50 text-green-600 p-3 rounded mb-4 text-sm">
                            {{ message }}
                        </div>
                        
                        <form @submit.prevent="handleForgotPassword" v-if="!message" class="text-start">
                            <div class="grid grid-cols-1">
                                <div class="mb-4">
                                    <label class="font-semibold" for="LoginEmail">Email Address:</label>
                                    <input v-model="email" id="LoginEmail" type="email" class="form-input mt-3 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-primary dark:border-gray-800 dark:focus:border-primary focus:ring-0" placeholder="name@example.com" required>
                                </div>

                                <div class="mb-4">
                                    <button type="submit" :disabled="loading" class="py-2 px-5 inline-block tracking-wide border align-middle duration-500 text-base text-center bg-primary hover:bg-primary-700 border-primary hover:border-primary-700 text-white rounded-md w-full disabled:opacity-50">
                                        <span v-if="loading">Sending...</span>
                                        <span v-else>Send Reset Link</span>
                                    </button>
                                </div>

                                <div class="text-center">
                                    <span class="text-slate-400 me-2">Remember your password ? </span> <router-link to="/auth/login" class="text-slate-900 dark:text-white font-bold inline-block">Sign in</router-link>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
