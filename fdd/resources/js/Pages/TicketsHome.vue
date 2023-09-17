<script setup>
import { Head } from '@inertiajs/vue3';
import TicketForm from '@/Components/TicketForm.vue';
import { defineOptions } from 'vue';
import HomeLayout from '@/Layouts/HomeLayout.vue';
defineOptions({
    layout: HomeLayout,
});
</script>
<template>
    <Head title="Tickets"/>
    <div class="  bg-slate-100 ">
        <div class="text-black flex justify-center items-center text-lg md:text-2xl font-bold p-2 pt-10">
            Explore Beyond Boundaries: Your Future Dream Destination Awaits You

        </div>
        <TicketForm/>
    </div>
</template>
