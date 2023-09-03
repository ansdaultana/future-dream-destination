<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="w-full flex top-0 z-50 -mt-20">
        <div class="h-screen w-1/3">

        </div>
        <div class="h-screen w-2/3  bg-blue-300 rounded-xl shadow-lg " >
            <div class=" gap-y-10 mt-32 flex-col" name="options">
                <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span> Home</span> 
                </Link>
                </div>
                <div class="w-56 items-center justify-center flex m-5">
                    <Link href="/Categories/Visa"  
                    class=" bg-opacity-50 hover:bg-slate-50 rounded-md w-full p-2 bg-slate-50 items-center justify-center flex text-blue-600">
                   <span> Visa & Services</span> 
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