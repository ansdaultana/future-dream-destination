<script setup>
import { Link } from '@inertiajs/vue3';

</script>

<template>
    <div class="w-full bg-slate-100 h-16 overflow-y-hidden ">
        <div class="flex justify-between">
            <div>

                
            </div>
            <div class="flex ">
                <div id="userinfo"
                    class="cursor-pointer z-50 userinfo w-40 mt-2 flex bg-white rounded-full p-1 hover:bg-orange-500 hover:text-white transition duration-300 ease-in-out  ">
                    <img class="w-11 h-11 rounded-full" src="/johndoe.png" alt="Bonnie Green avatar">
                    <div class="items-center justify-between flex ml-4 mr-2" v-text=" $page.props.auth.user.name "></div>
                    <div class="items-center justify-between flex ">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5 ">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>

                    </div>
                    <div
                        class="dropdown absolute hidden top-14 text-black w-40 bg-white border  transition duration-300 ease-in-out border-gray-300 rounded-md  p-2 z-40  ">

                    
                        <div class="flex items-center hover:text-orange-500">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                            </svg>

                            <Link :href="route('logout')" method="post" as="button">
                               <span class="py-2 px-4 cursor-pointer ">Logout </span>
                            </Link>
                        </div>
                    </div>
                </div>

                <div
                    class=" hidden lg:flex bg-orange-500 ml-8   rounded-lg  text-white items-center mt-3 mr-2 px-1 cursor-pointer hover:bg-orange-600 h-10 transition-transform ease-in-out duration-300 hover:scale-105">
                    <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                    </svg>

               
                    
                    <Link :href="route('logout')" method="post" as="button">
                        <span class="py-2 px-4 cursor-pointer ">Logout </span>
                     </Link>
                </div>
            </div>

        </div>


    </div>
</template>
<style>
.userinfo:hover .dropdown {
    display: block;
    /* Show the dropdown when hovering over userinfo */
}</style>
  