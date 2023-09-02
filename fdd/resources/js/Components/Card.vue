<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
// {{ Storage::url($file->file_path) }}
const props=defineProps({
    item:{}
});
</script>
<template>
    <Link href="/tickets">
        <div class="shadow-red-100 items-center bg-white w-40 h-60 lg:h-72 lg:w-60  m-1 rounded-xl shadow-lg hover:scale-105 transition-transform duration-200 hover:cursor-pointer ease-in-out">
            <div class="items-center flex justify-center">
                <img :src="props.item.image_base64" alt="" class="md:h-48 w-auto h-auto rounded-xl p-1 mt-1" :class="{'mt-5 md:h-52':props.item.category==='Ticket'}">
            </div>
            <div class="p-1 h-8 text-lg font-bold items-center flex ml-2" :class="{'justify-center ':props.item.category==='Visa' || props.item.category==='Tourism','justify-center mt-3 text-blue-500':props.item.category==='Ticket'}" >
                <h1 v-text="props.item.title"></h1>
            </div>
            <div class="pl-1 pr-1  text-lg font-bold items-center   justify-between" v-if="props.item.category==='Visa' || props.item.category==='Tourism'">
        <div class="flex justify-between mt-1 ml-2 mr-2"><span class="text-sm text-gray-600 ">Price:</span>  <h1 class="text-sm text-gray-600" v-text="(props.item.fee)"></h1></div>      
             <div class="flex justify-between ml-2 mr-2"><span class="text-lg text-blue-500 font-bold ">Dicounted Price:</span>  <h1 class="text-[17px] font-bold text-gray-900"  v-text="(props.item.fee)-(props.item.discount)"></h1></div> 

            </div>
        </div>
    </Link>
</template>