<script setup>
import Card from './Card.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
const page=usePage();
const HomePageItems=computed(()=>page.props.homepageitems);
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
            <div class="p-20" v-for="HomePageItem in HomePageItems">

                <Card :item=HomePageItem   />

            </div>
        </div>
    </div>
</template>