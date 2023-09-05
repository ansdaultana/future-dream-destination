<script setup>
import { Head } from '@inertiajs/vue3';
import { defineOptions } from 'vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
defineOptions({
    layout: HomeLayout,
});
</script>
<template>
    <Head title="Future Dream Destination" />
    <div class="md:ml-20 md:mr-20 ">
        <Services />

    </div>
</template>
