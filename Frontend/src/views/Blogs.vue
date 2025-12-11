<script setup lang="ts">
import PageTitle from '../components/PageTitle.vue';


</script>
<template>
    <PageTitle heading="Blogs" tagline="Boosting Ambitions. Transforming Futures." :breadcrumb-links="[
        { label: 'Home', href: '/' },
        { label: 'Blogs', disabled: true }
    ]" />
</template>