<script setup>
import { Link } from '@inertiajs/vue3'
import { ref } from 'vue';
import SidebarForHomeVue from './SidebarForHome.vue';
import ContactInfo from './ContactInfo.vue';
import { inject } from 'vue'
const contact = inject('contact')
const sidebar=ref(false);
const openSideBar=()=>{
    sidebar.value=!sidebar.value;
}
const openContact=()=>{
    contact.value=!contact.value;
}

</script>

<template>
    <div class="font-sans  z-0 text-white  text-lg font-bold bg-slate-200 " ref="navbar">
        <div class=" top-0 right-0 left-0 bg-gradient-to-r from-[#DFB161] from-24% via-sky-400 via-50% to-[#3D9ECF] to-70%     shadow-md h-auto  w-full p-2 ">
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
                    <Link href="/Categories/Visa"
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Visa & Services
                    </Link>
                    <Link href="/Categories/Tourism"
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Tourism
                </Link>
                    <Link href="/Categories/Ticket"
                        class="hover:scale-105 hover:bg-opacity-30 hover:bg-slate-50 rounded-full p-2 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">

                        Plane Tickets
                    </Link>
                </div>
                <div @click.prevent="openContact"
                    class="hidden md:block hover:bg-slate-50 hover:opacity-30 border-white border md:px-4 md:py-2 flex justify-center items-center rounded-full hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">
                   <span class="p-1">Contact Us</span> 
                </div>
                <div @click="openSideBar"
                class=" md:hidden hover:bg-slate-50 hover:opacity-30 border-white border md:px-4 md:py-2 flex justify-center items-center rounded-full hover:scale-105 transition-transform duration-200 ease-in-out hover:cursor-pointer hover:text-blue-600">
               <span class="p-1"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
              </svg>
              </span> 
            </div>
            </div>
        </div>


</div>
<div v-if="sidebar">
    <SidebarForHomeVue :sidebar="sidebar" @updateValue="openSideBar"/>

</div>

<div v-if="contact" class="w-1/3 ">
    <ContactInfo :nav="true" />

</div>


</template>