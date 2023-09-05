<script setup>
import { defineProps } from 'vue';
import ContactInfo from './ContactInfo.vue';
const props=defineProps({
    title:String,
});
</script>

<template>
    <div class="p-10 h-auto flex items-center justify-center shadow-xl rounded-xl ">
        <div class="bg-white shadow-md rounded-lg p-2 w-full md:p-8 md:w-2/3 flex">
            <div class="w-2/3 h-auto p-4">
                <div class="text-lg" v-text="props.title">
                    
                </div>
               <slot/>
            </div>
            <div class="w-1/3">
           <ContactInfo :nav="false"/>

            </div>

        </div>
    </div>
</template>
