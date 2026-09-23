<script setup lang="ts">
import { ref, watch } from 'vue';
import { useRouter } from 'vue-router';
import { useAuthStore } from '../stores/auth';
import { ApiService } from '../services/api';

const authStore = useAuthStore();
const router = useRouter();

// ---- Login State ----
const loginEmail = ref('');
const loginPassword = ref('');
const loginError = ref('');
const loginLoading = ref(false);

// ---- Register State ----
const regName = ref('');
const regEmail = ref('');
const regPassword = ref('');
const regPasswordConfirm = ref('');
const regError = ref('');
const regLoading = ref(false);

// Reset errors when switching tabs
watch(() => authStore.modalTab, () => {
    loginError.value = '';
    regError.value = '';
});

const handleLogin = async () => {
    loginLoading.value = true;
    loginError.value = '';
    try {
        const response = await ApiService.login({
            email: loginEmail.value,
            password: loginPassword.value
        });
        localStorage.setItem('auth_token', response.data.token);
        authStore.user = response.data.user;
        await authStore.fetchUser();
        authStore.closeModal();
        if (authStore.redirectAfterLogin) {
            router.push(authStore.redirectAfterLogin);
        }
    } catch (error: any) {
        loginError.value = error.response?.data?.message || 'Invalid email or password.';
    } finally {
        loginLoading.value = false;
    }
};

const handleRegister = async () => {
    if (regPassword.value !== regPasswordConfirm.value) {
        regError.value = 'Passwords do not match.';
        return;
    }
    regLoading.value = true;
    regError.value = '';
    try {
        const response = await ApiService.register({
            name: regName.value,
            email: regEmail.value,
            password: regPassword.value,
            password_confirmation: regPasswordConfirm.value
        });
        localStorage.setItem('auth_token', response.data.token);
        authStore.user = response.data.user;
        await authStore.fetchUser();
        authStore.closeModal();
        router.push('/dashboard/profile');
    } catch (error: any) {
        if (error.response?.data?.errors) {
            const errors = error.response.data.errors;
            regError.value = errors[Object.keys(errors)[0]][0];
        } else {
            regError.value = error.response?.data?.message || 'Registration failed.';
        }
    } finally {
        regLoading.value = false;
    }
};

const onBackdropClick = (e: MouseEvent) => {
    if ((e.target as HTMLElement).id === 'auth-modal-backdrop') {
        authStore.closeModal();
    }
};
</script>

<template>
    <Teleport to="body">
        <div
            v-if="authStore.showModal"
            id="auth-modal-backdrop"
            @click="onBackdropClick"
            class="fixed inset-0 flex items-center justify-center p-4"
            style="z-index: 99999; background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(4px);"
        >
            <div class="relative w-full max-w-md bg-white dark:bg-slate-900 rounded-2xl shadow-2xl overflow-hidden">

                <!-- Close button -->
                <button
                    @click="authStore.closeModal()"
                    class="absolute top-4 end-4 z-10 size-8 flex items-center justify-center rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-700 transition"
                >
                    <svg class="size-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                <!-- Logo + Header -->
                <div class="bg-gradient-to-br from-primary/10 via-primary/5 to-transparent pt-8 pb-6 px-6 text-center border-b border-gray-100 dark:border-gray-800">
                    <router-link to="/" @click="authStore.closeModal()" class="inline-block">
                        <img src="/assets/images/logo_sunrise-transparent.png" style="height: 64px; max-height: 64px; width: auto;" class="mx-auto mb-3 object-contain" alt="Sambhav">
                    </router-link>
                    <h4 class="text-lg font-bold text-slate-800 dark:text-white">
                        {{ authStore.modalTab === 'login' ? 'Welcome back!' : 'Join Sambhav' }}
                    </h4>
                    <p class="text-sm text-slate-500 mt-1">
                        {{ authStore.modalTab === 'login'
                            ? 'Log in to access your dashboard and bookmarks'
                            : 'Create your free account to participate in competitions'
                        }}
                    </p>
                </div>

                <!-- Tab Switcher -->
                <div class="flex border-b border-gray-100 dark:border-gray-800">
                    <button
                        @click="authStore.modalTab = 'login'"
                        class="flex-1 py-3 text-sm font-semibold transition border-b-2 -mb-px"
                        :class="authStore.modalTab === 'login'
                            ? 'text-primary border-primary'
                            : 'text-slate-400 border-transparent hover:text-slate-700 dark:hover:text-slate-200'"
                    >Login</button>
                    <button
                        @click="authStore.modalTab = 'register'"
                        class="flex-1 py-3 text-sm font-semibold transition border-b-2 -mb-px"
                        :class="authStore.modalTab === 'register'
                            ? 'text-primary border-primary'
                            : 'text-slate-400 border-transparent hover:text-slate-700 dark:hover:text-slate-200'"
                    >Register</button>
                </div>

                <div class="p-6">

                    <!-- ===== LOGIN FORM ===== -->
                    <form v-if="authStore.modalTab === 'login'" @submit.prevent="handleLogin" class="space-y-4">
                        <div v-if="loginError" class="bg-red-50 dark:bg-red-900/20 text-red-600 text-sm p-3 rounded-lg">
                            {{ loginError }}
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email Address</label>
                            <input
                                v-model="loginEmail"
                                type="email"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                placeholder="name@example.com"
                                required
                            >
                        </div>

                        <div>
                            <div class="flex justify-between items-center mb-1.5">
                                <label class="text-sm font-semibold text-slate-700 dark:text-slate-300">Password</label>
                                <router-link
                                    to="/auth/forgot-password"
                                    @click="authStore.closeModal()"
                                    class="text-xs text-primary hover:underline"
                                >Forgot password?</router-link>
                            </div>
                            <input
                                v-model="loginPassword"
                                type="password"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                placeholder="Your password"
                                required
                            >
                        </div>

                        <button
                            type="submit"
                            :disabled="loginLoading"
                            class="w-full py-2.5 bg-primary hover:bg-primary-700 text-white rounded-lg font-semibold text-sm tracking-wide transition disabled:opacity-60"
                        >
                            <span v-if="loginLoading">Logging in...</span>
                            <span v-else>Login / Sign in</span>
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-xs">
                                <span class="px-3 bg-white dark:bg-slate-900 text-slate-400">Or continue with</span>
                            </div>
                        </div>

                        <!-- Google -->
                        <a
                            :href="ApiService.getGoogleAuthUrl()"
                            class="flex items-center justify-center gap-3 w-full py-2.5 border border-gray-200 dark:border-gray-700 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-gray-50 dark:hover:bg-slate-800 transition text-sm font-medium"
                        >
                            <svg class="size-4" viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Continue with Google
                        </a>

                        <p class="text-center text-sm text-slate-400">
                            Don't have an account?
                            <button type="button" @click="authStore.modalTab = 'register'" class="text-primary font-semibold hover:underline ml-1">Sign Up</button>
                        </p>
                    </form>

                    <!-- ===== REGISTER FORM ===== -->
                    <form v-else @submit.prevent="handleRegister" class="space-y-4">
                        <div v-if="regError" class="bg-red-50 dark:bg-red-900/20 text-red-600 text-sm p-3 rounded-lg">
                            {{ regError }}
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Full Name</label>
                            <input
                                v-model="regName"
                                type="text"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                placeholder="e.g. Rahul Sharma"
                                required
                            >
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email Address</label>
                            <input
                                v-model="regEmail"
                                type="email"
                                class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                placeholder="name@example.com"
                                required
                            >
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Password</label>
                                <input
                                    v-model="regPassword"
                                    type="password"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                    placeholder="Password"
                                    required
                                >
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Confirm</label>
                                <input
                                    v-model="regPasswordConfirm"
                                    type="password"
                                    class="w-full px-4 py-2.5 rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-slate-800 text-slate-800 dark:text-slate-100 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition text-sm"
                                    placeholder="Confirm"
                                    required
                                >
                            </div>
                        </div>

                        <p class="text-xs text-slate-400">
                            By registering you agree to our
                            <router-link to="/term-of-services" @click="authStore.closeModal()" class="text-primary hover:underline">Terms</router-link>
                            and
                            <router-link to="/privacy-policy" @click="authStore.closeModal()" class="text-primary hover:underline">Privacy Policy</router-link>.
                        </p>

                        <button
                            type="submit"
                            :disabled="regLoading"
                            class="w-full py-2.5 bg-primary hover:bg-primary-700 text-white rounded-lg font-semibold text-sm tracking-wide transition disabled:opacity-60"
                        >
                            <span v-if="regLoading">Creating account...</span>
                            <span v-else>Create Account</span>
                        </button>

                        <!-- Divider -->
                        <div class="relative">
                            <div class="absolute inset-0 flex items-center">
                                <div class="w-full border-t border-gray-200 dark:border-gray-700"></div>
                            </div>
                            <div class="relative flex justify-center text-xs">
                                <span class="px-3 bg-white dark:bg-slate-900 text-slate-400">Or sign up with</span>
                            </div>
                        </div>

                        <!-- Google -->
                        <a
                            :href="ApiService.getGoogleAuthUrl()"
                            class="flex items-center justify-center gap-3 w-full py-2.5 border border-gray-200 dark:border-gray-700 rounded-lg text-slate-700 dark:text-slate-200 hover:bg-gray-50 dark:hover:bg-slate-800 transition text-sm font-medium"
                        >
                            <svg class="size-4" viewBox="0 0 24 24">
                                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
                            </svg>
                            Continue with Google
                        </a>

                        <p class="text-center text-sm text-slate-400">
                            Already have an account?
                            <button type="button" @click="authStore.modalTab = 'login'" class="text-primary font-semibold hover:underline ml-1">Sign In</button>
                        </p>
                    </form>

                </div>
            </div>
        </div>
    </Teleport>
</template>

<style scoped>
.modal-fade-in {
    animation: fadeIn 0.2s ease;
}
.modal-scale-in {
    animation: scaleIn 0.25s cubic-bezier(0.16, 1, 0.3, 1);
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}
@keyframes scaleIn {
    from { opacity: 0; transform: scale(0.95) translateY(8px); }
    to { opacity: 1; transform: scale(1) translateY(0); }
}
</style>
