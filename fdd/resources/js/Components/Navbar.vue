<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="font-sans text-white text-lg font-bold bg-slate-200 z-40">
        <div class="bg-slate-300 h-auto rounded-b-md w-full p-4 ">
            <div class="flex justify-between text-sm md:text-lg lg:text-xl">
                <div class="flex">
                    <div class="">
                        <div class="-mt-1">
                            <img src="/logo.png" alt="" class=" h-10 animate-bounce">
                        </div>

                    </div>
                    <span
                        class="text-white ml-3 hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">
                        Future Dream Destination</span>
                </div>
                <div class="flex gap-5 ">
                    <Link href="/"  
                        class="hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">
                        Home
                    </Link>
                    <div
                        class="hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">

                        Visa & Services
                    </div>
                    <div
                        class="hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">

                        Fdd Team
                    </div>
                    <div
                        class="hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">

                        Facilities
                    </div>
                </div>
                <div
                    class="border-orange-400 border-2 px-4 py-2 rounded-full hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-orange-900">
                    Contact Us
                </div>
            </div>
        </div>


</div>
</template>