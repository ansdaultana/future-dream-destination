<script setup>
import Navbar from '../Components/Navbar.vue';
import Footer from '@/Components/Footer.vue'
import { Head } from '@inertiajs/vue3';
import { provide, ref } from 'vue';
import Alert from '@/Components/Alert.vue';
const contact = ref(false);
const alert = ref(true);
provide('contact', contact);
provide('alert',alert)
</script>
<template>
    <Head title="Future Dream Destination" />
    <Navbar>
    </Navbar>
    <slot />
    <Footer />
</template>
