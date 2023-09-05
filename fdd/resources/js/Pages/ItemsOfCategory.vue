<script setup>
import Navbar from '../Components/Navbar.vue';
import Mainimg from '@/Components/Mainimg.vue';
import ImageSlidder from '@/Components/ImageSlider.vue';
import Footer from '@/Components/Footer.vue'
import Services from '@/Components/Services.vue';
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
