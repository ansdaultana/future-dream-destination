<script setup>
import Mainimg from '@/Components/Mainimg.vue';
import Services from '@/Components/Services.vue';
import { Head } from '@inertiajs/vue3';
import Categories from '@/Components/Categories.vue';
import { defineOptions } from 'vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
defineOptions({
    layout: HomeLayout,
});
</script>
<template>
    <Head title="Future Dream Destination" />
    <Mainimg />
    <Categories />

    <div class="md:ml-20 md:mr-20">
        <Services />

    </div>
</template>
