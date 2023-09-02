<script setup>
import { defineProps } from 'vue';

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
            <div
                class="w-1/3 bg-blue-500 h-auto rounded-lg hover:cursor-pointer hover:scale-105 transition-transform duration-200 ease-in">
                <div class="text-white p-2 md:p-4 gap-4">
                    <div class="text-xl">
                        Contact us
                    </div>
                    <div class="mt-4 text-sm flex">
                        <div class="hidden md:block p-2 rounded-full bg-slate-50 bg-opacity-25 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>

                        </div>
                        <div class="mt-2">
                            <span class="font-bold"> Address: </span>
                            Lahore, Punjab, Pakistan
                        </div>

                    </div>
                    <div class="mt-4 text-sm flex">
                        <div class="hidden md:block p-2 rounded-full bg-slate-50 bg-opacity-25 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>

                        </div>
                        <div class="mt-2">
                            <span class="font-bold"> Phone: </span>
                            +123 456 789
                        </div>

                    </div>
                    <div class="mt-4 text-sm flex">
                        <div class="hidden md:block p-2 rounded-full bg-slate-50 bg-opacity-25 mr-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                            </svg>

                        </div>
                        <div class="mt-2">
                            <span class="font-bold"> Email: </span>
                            info@FDD.com
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
