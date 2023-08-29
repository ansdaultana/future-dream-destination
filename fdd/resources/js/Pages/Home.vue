<script setup>
import Navbar from '../Components/Navbar.vue';
import Mainimg from '@/Components/Mainimg.vue';
import ImageSlidder from '@/Components/ImageSlider.vue';
import Footer from '@/Components/footer.vue'
import Services from '@/Components/Services.vue';
import { Head } from '@inertiajs/vue3';

</script>
<template>
    <Head title="Future Dream Destination" />
    <Navbar>
    </Navbar>
    <!-- <ImageSlidder /> -->
    <Mainimg />
    <Services />
    <Footer />
</template>
