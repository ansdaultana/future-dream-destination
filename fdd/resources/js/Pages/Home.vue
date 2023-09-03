<script setup>
import Navbar from '../Components/Navbar.vue';
import Mainimg from '@/Components/Mainimg.vue';
import ImageSlidder from '@/Components/ImageSlider.vue';
import Footer from '@/Components/Footer.vue'
import Services from '@/Components/Services.vue';
import { Head } from '@inertiajs/vue3';
import Categories from '@/Components/Categories.vue';
</script>
<template>
    <Head title="Future Dream Destination" />
    <Navbar>
    </Navbar>
    <!-- <ImageSlidder /> -->
    <Mainimg />
    <Categories />

    <div class="md:ml-20 md:mr-20">
        <Services />

    </div>
    <Footer />
</template>
