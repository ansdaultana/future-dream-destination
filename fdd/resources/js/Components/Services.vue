<script setup>
import Card from './Card.vue';
</script>
<template>
    <div>
        <div class="flex items-center justify-center mt-16">
            <h1 class="font-bold font-sans text-3xl ">Our Services</h1>
        </div>
        <div class="flex items-center justify-center m-5">
            <h1 class="font-bold font-sans text-xl ">we provide services for your future dream destination</h1>
        </div>
        <div class="w-full h-screen bg-slate-100 grid grid-cols-3 rounded-xl">
            <div class="p-20">
                <Card image="/plane2.jpg" title="Plane Tickets" togo="/tickets" />

            </div>
        </div>
    </div>
</template>