<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
const props=defineProps({
    image:String,
    title:String,
    togo:String
})
</script>
<template>
    <Link :href="props.togo">
        <div class="bg-white lg:h-72 lg:w-60 m-2 rounded-xl shadow-lg hover:scale-105 transition-transform duration-200 hover:cursor-pointer ease-in-out">
            <div class="items-center flex justify-center">
                <img :src="props.image" alt="" class="h-60 rounded-xl p-1 mt-2">
            </div>
            <div class="p-1  text-lg font-bold items-center flex justify-center">
                <h1 v-text="props.title"></h1>
            </div>
        </div>
    </Link>
</template>