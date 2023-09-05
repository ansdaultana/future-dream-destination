<script setup>
import imgforbox from '@/Components/imgforbox.vue'
import { Link } from '@inertiajs/vue3';
import ContactInfo from './ContactInfo.vue';
import ImageSlider from './ImageSlider.vue';
import { inject } from 'vue'
const contact = inject('contact')
const openContact=()=>{
    contact.value=!contact.value;
}
</script>
<template>
    <div class=" ">
        <div class="">
            <!-- <img src="/HomePage.jpg" alt=""
                class=" w-screen h-auto rounded-b-lg"> -->
                <ImageSlider/>
            <div class=" flex items-center justify-center md:-mt-40 " >
                <div class="m-2 w-full md:w-1/2 md:h-44 bg-slate-50 rounded-xl  shadow-lg shadow-blue-300 hover:cursor-pointer animate-bounce">
                    <div class="">
                        <div class="text-lg font-bold p-2 md:p-2">
                            <div class="flex">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-blue-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                  </svg>
                                  
                                  <span class="ml-2">
                                    Facilities
        
                                    </span>
                            </div>
                        </div>
                            <div class="flex justify-between md:ml-5 md:mr-5 p-1 text-gray-600">
                              <Link href="/Categories/Visa" class=" items-center p-1">
                                <imgforbox src="/visaa.jpg"/>
                                <span class="md:ml-2 p-2 md:w-14 animate-pulse">Visas</span>
                              </Link>
                              <Link href="/Categories/Tourism" class=" items-center p-1">
                                <imgforbox src="/tour2.jpg"/>
                                <span class="md:ml-2 p-2 md:w-14">Tours</span>
                              </Link>
                              <div class=" items-center p-1" @click.prevent="openContact">
                                <imgforbox src="/booking2.jpg"/>
                                <span class="md:p-2 md:w-14">Contact</span>
                              </div>
                              <Link href="/Categories/Ticket" class=" items-center p-1">
                                <imgforbox src="/ticket2.jpg"/>
                                <span class=" md:p-2 md:w-14">Tickets</span>
                              </Link>
                            </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div v-if="contact" class="w-1/3 ">
      <ContactInfo :nav="true" />
  
  </div>
</template>

<style>
@keyframes pulse {

    0%,
    100% {
        opacity: 1;
    }

    50% {
        opacity: .7;
    }
}

@keyframes bounce {

  0%,
  100% {
    transform: translateY(-3%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
  }

  50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
  }
}
</style>