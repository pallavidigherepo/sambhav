<script setup lang="ts">
import Header from './components/Layout/Header.vue';
import Footer from './components/Layout/Footer.vue';
import AuthModal from './components/AuthModal.vue';
import { useAuthStore } from './stores/auth';
import { onMounted } from 'vue';

const authStore = useAuthStore();

onMounted(async () => {
  // Attempt to restore session from stored token on app load
  const token = localStorage.getItem('auth_token');
  if (token) {
    await authStore.fetchUser();
  }
});
</script>

<template>
  <Header />
  <RouterView></RouterView>
  <Footer />
  <AuthModal />
</template>

<style scoped>

</style>
