<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="font-sans text-white  text-lg font-bold bg-slate-200 z-40">
        <div class="fixed bg-gradient-to-r from-blue-400 from-20% via-sky-400 via-40% to-blue-500 to-60%     shadow-md h-auto rounded-b-md w-full p-1 ">
            <div class="flex justify-between text-sm md:text-lg lg:text-xl">
                <div class="flex">
                    <div class="">
                        <div class="mt-1">
                            <img src="/logo.png" alt="" class=" h-10 animate-bounce">
                        </div>

                    </div>
                    <span
                        class="text-white ml-3 mt-2 hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-400">
                        Future Dream Destination</span>
                </div>
                <div class="md:flex gap-5 hidden " name="options">
                    <Link href="/"  
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">
                        Home
                    </Link>
                    <div
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Visa & Services
                    </div>
                    <div
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        FDD Team
                    </div>
                    <div
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Facilities
                    </div>
                </div>
                <div
                    class="border-white border md:px-4 md:py-2 p-1 rounded-full hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">
                    Contact Us
                </div>
            </div>
        </div>


</div>
</template>