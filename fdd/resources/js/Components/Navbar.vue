<script setup>
import { Link } from '@inertiajs/vue3'
</script>

<template>
    <div class="font-sans  z-10 text-white  text-lg font-bold bg-slate-200 " ref="navbar">
        <div class="fixed top-0 right-0 left-0 bg-gradient-to-r from-[#DFB161] from-24% via-sky-400 via-50% to-[#3D9ECF] to-70%     shadow-md h-auto rounded-b-lg w-full p-2 ">
            <div class="flex justify-between text-sm md:text-lg lg:text-xl">
                <div class="flex">
                    <div class="">
                        <div class="mt-1">
                            <img src="/logo.png" alt="" class=" h-10 animate-bounce">
                        </div>

                    </div>
                    <Link href="/"
                        class="hover:text-blue-600 hover:scale-105 hover:bg-opacity-30 rounded-full p-2  text-white ml-3   transition-transform duration-200 ease-in-out hover:cursor-pointer ">
                        Future Dream Destination</Link>
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
                    <Link href="/tickets"
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Plane Tickets
                    </Link>
                </div>
                <div
                    class="hover:bg-slate-50 hover:opacity-30 border-white border md:px-4 md:py-2 p-1 rounded-full hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">
                    Contact Us
                </div>
            </div>
        </div>


</div>
</template>