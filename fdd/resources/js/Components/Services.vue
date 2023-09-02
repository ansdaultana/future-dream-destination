<script setup>
import Card from './Card.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Categories from './Categories.vue';
const page=usePage();
const HomePageItems=computed(()=>page.props.homepageitems);
</script>
<template>
    <div>
        <div class="flex items-center justify-center  md:mt-16">
            <h1 class="font-bold font-sans text-3xl mt-5">Our Facilities</h1>
        </div>
        <div class="flex items-center justify-center m-1 md:m-5">
            <h1 class="font-bold font-sans text-xm md:text-xl ">Check out our Main Offers!</h1>
        </div>
        
        <div class="w-auto h-auto bg-slate-200 grid m-2 grid-cols-2  justify-center md:grid-cols-3 lg:grid-cols-4 rounded-xl">
            <div class=" p-2 md:p-10" v-for="HomePageItem in HomePageItems">

                <Card :item=HomePageItem   />

            </div>
        </div>
    </div>
</template>