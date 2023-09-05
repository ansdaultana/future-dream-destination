<script setup>
import { inject,onMounted,defineProps } from 'vue'
const alert = inject('alert')
const {showalert}=defineProps('show')
onMounted(()=>{
    setTimeout(() => {
        alert.value=false;
    }, 2000);
})
</script>

<template>
    <div class="bg-white border-2  shadow-lg to-70%  rounded-xl w-60 h-16 bottom-10 right-5 fixed" v-if="alert || showalert">
        <div class="flex items-center justify-between mt-2">
            <div class=" flex items-center bg-slate-100 m-1 p-2 rounded-full hover:cursor-pointer ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-green-600">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>

            </div>
            <div class="p-2 text-sm font-bold text-green-700">
                Successfully Performed!
            </div>
        </div>
    </div>
</template>