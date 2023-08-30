<script setup>
import Navbar from '@/Components/Navbar.vue'
import Footer from '@/Components/Footer.vue';
import { Head } from '@inertiajs/vue3';
import TicketForm from '@/Components/TicketForm.vue';
</script>
<template>
    <Head title="Tickets"/>
    <Navbar/>
    <div class=" mt-14 bg-slate-100 ">
        <div class="text-black flex justify-center items-center text-2xl font-bold pt-10">
            Explore Beyond Boundaries: Your Future Dream Destination Awaits You

        </div>
        <TicketForm/>
    </div>
    <Footer/>
</template>
