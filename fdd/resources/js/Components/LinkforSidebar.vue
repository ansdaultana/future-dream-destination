<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { usePage } from '@inertiajs/vue3';
const page=usePage();

const name=page.props.ziggy.location.split('/').pop();  

const props=defineProps(
    {
        href:String,
        name:String,
        url:String
    }
)
</script>
<template>
    <Link :href="props.href">

        <div id="container"
        :class="{ 'bg-blue-200 bg-opacity-40': name === props.url }"
            class="flex  tansition-transform hover:scale-105 duration-200 ease-in hover:bg-blue-100 bg-opacity-10 rounded-md hover:fill-orange-500 hover:text-blue-800 mt-3">
            <div class="bg-orange py-1 w-1" :class="{ 'bg-blue-500 font-bold': name === props.url }">
            </div>
            <div class="md:pl-10 flex p-2">
                <div v-text="props.name" class="lg:ml-8 md:ml-2 block" :class="{ 'text-blue-500 font-bold': name === props.url }">
                    
                </div>

            </div>
        </div>
    </Link>
</template>