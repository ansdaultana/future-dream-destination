<script setup>
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import { defineProps,defineEmits } from 'vue';
const sidebar= defineProps('sidebar');
const emit=defineEmits();
const toggleSidebar=()=>{
    sidebar.value!=sidebar.value
    emit('updateValue',sidebar);
    }
</script>

<template>
    <div class="w-full fixed inset-0 top-32 flex z-50 -mt-20">
        <div class="h-screen w-1/3">

        </div>
        <div class="h-screen w-2/3  bg-blue-300 rounded-xl shadow-lg " >
            <div class="p-2 " @click.prevent="toggleSidebar">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 bg-gray-50 bg-opacity-20 rounded-full  text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="items-center justify-center flex">
                <img src="/GuestLogo.png" class="h-40 animate-bounce" alt="">
            </div>
            <div class=" gap-y-10 mt-10 flex-col" name="options">
                <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span> Home</span> 
                </Link>
                </div>
                <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/Categories/Visa"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span> Visa</span> 
                </Link>
                </div>   <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/Categories/Tourism"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span> Tourism</span> 
                </Link>
                </div>   <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/Categories/Ticket"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span>  Plane Ticket</span> 
                </Link>
                </div>      
            </div>
        </div>
    </div>
   
</template>