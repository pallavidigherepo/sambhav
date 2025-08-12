<script setup lang="ts">
import Header from './components/Layout/Header.vue';
import Footer from './components/Layout/Footer.vue';
//import Switcher from './components/Layout/Switcher.vue';
</script>

<template>
  <Header />
  <RouterView></RouterView>
  <Footer />
  <!-- <Switcher /> -->
</template>

<style scoped>

</style>
