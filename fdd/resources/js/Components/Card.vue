<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
// {{ Storage::url($file->file_path) }}
const props=defineProps({
    item:{}
});
</script>
<template>
    <Link href="/tickets">
        <div class="shadow-red-100 items-center bg-white w-40 h-60 lg:h-72 lg:w-60  m-1 rounded-xl shadow-lg hover:scale-105 transition-transform duration-200 hover:cursor-pointer ease-in-out">
            <div class="items-center flex justify-center">
                <img :src="props.item.image_base64" alt="" class="md:h-48 w-auto h-auto rounded-xl p-1 mt-1">
            </div>
            <div class="p-1 h-8 text-lg font-bold items-center flex justify-center">
                <h1 v-text="props.item.title"></h1>
            </div>
        </div>
    </Link>
</template>