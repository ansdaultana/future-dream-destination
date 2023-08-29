<script setup>
import { defineProps } from 'vue';
const props=defineProps({
    src:String
});
</script>
<template>
    <img :src="props.src" class="h-14 m-1 rounded-lg  shadow-lg hover:scale-110 hover:cursor-pointer transition-transform duration-200 ease-in-out" alt="">
</template>