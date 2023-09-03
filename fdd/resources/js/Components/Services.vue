<script setup>
import Card from './Card.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import Categories from './Categories.vue';
import NotFound from './NotFound.vue';
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
        
        <div class="w-full h-auto bg-slate-200 grid   pb-5 pt-5 grid-cols-2  justify-center  lg:grid-cols-4 rounded-xl" v-if="HomePageItems.length>0">
            <div class=" p-1 gap-y-4 md:p-10" v-for="HomePageItem in HomePageItems">

                <Card :item=HomePageItem   />

            </div>
        </div>
        <div v-if="HomePageItems.length===0">
            <NotFound/>
        </div>
    </div>
</template>