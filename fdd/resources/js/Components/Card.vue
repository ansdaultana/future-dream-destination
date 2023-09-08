<script setup>
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';
const props = defineProps({
    item: {}
});
const generateLink = (category, slug) => {
    let slugSegment;
    if (category === 'Ticket') {
        slugSegment = 'tickets';
    } else if (category === 'Visa') {
        slugSegment = 'visas';
        return `/${slugSegment}/${slug}`;

    } else {
        slugSegment = 'tourism';
        return `/${slugSegment}/${slug}`;

    }
    // Include the slug in the URL
    return `/${slugSegment}`;
};
</script>

<template>
    <Link :href="generateLink(props.item.category, props.item.slug)">

    <div
        class="shadow-[#61dfdf9c] items-center ml-1 bg-white w-44 h-60 md:h-80 md:w-60   rounded-xl shadow-lg hover:scale-105 transition-transform duration-200 hover:cursor-pointer ease-in-out">
        <div class="items-center flex justify-center">
            <img :src="props.item.image_base64" alt="" class="md:h-48 w-auto h-32 rounded-xl p-1 mt-1 hover:scale-110 transition-transform ease-in-out duration-300 "
                :class="{ 'mt-5 md:h-60': props.item.category === 'Ticket','p-2 ': props.item.category === 'Visa' || props.item.category === 'Tourism', }">
        </div>
        <div class="p-1 h-8 text-lg font-bold items-center flex ml-2 animate-bounce"
            :class="{ 'justify-center ': props.item.category === 'Visa' || props.item.category === 'Tourism', 'justify-center mt-3 text-blue-500': props.item.category === 'Ticket' }">
            <h1 v-text="props.item.title"></h1>
        </div>
        <div class="pl-1 pr-1  text-lg font-bold items-center   justify-between" v-if="props.item.category === 'Tourism'">
            <div class="flex justify-between mt-1 ml-2 mr-2" v-if="props.item.discount"><span
                    class="text-xs md:text-sm text-gray-600 ">Price:</span>
                <h1 class="text-xs md:text-sm text-gray-600" v-text="'AED ' + (props.item.inside_country_fee)"></h1>
            </div>
            <div class="flex justify-between ml-2 mr-2" v-if="props.item.discount"><span
                    class="text-xs md:text-sm text-gray-600 ">Dicount: </span>
                <h1 class="text-xs md:text-sm text-gray-600" v-text="'AED -' + props.item.discount"></h1>
            </div>
            <div class="flex justify-between m-1 md:ml-2 md:mr-2" :class="{ 'mt-6': props.item.discount === 0 }"><span
                    class="text-xs  md:text-sm text-blue-500 font-bold animate-bounce">Payable
                    Amount:</span>
                <h1 class=" text-xs md:text-[16px] font-bold text-gray-900 md:mt-1"
                    v-text="'AED ' + ((props.item.inside_country_fee) - (props.item.discount))"></h1>
            </div>


        </div>
        <div class="pl-1 pr-1  text-lg font-bold items-center   justify-between" v-if="props.item.category === 'Visa'">
            <div class="flex justify-between mt-1 ml-2 mr-2" v-if="props.item.discount"><span
                    class="text-xs md:text-sm text-gray-600 ">Price:</span>
                <h1 class="text-xs md:text-sm text-gray-600" v-text="'AED ' + (props.item.fee)"></h1>
            </div>
            <div class="flex justify-between ml-2 mr-2" v-if="props.item.discount"><span
                    class="text-xs md:text-sm text-gray-600 ">Dicount: </span>
                <h1 class="text-xs md:text-sm text-gray-600" v-text="'AED -' + props.item.discount"></h1>
            </div>
            <div class="flex justify-between m-1 md:ml-2 md:mr-2" :class="{ 'mt-6': props.item.discount === 0 }"><span
                    class="text-xs  md:text-sm text-blue-500 font-bold animate-bounce">Payable
                    Amount:</span>
                <h1 class=" text-xs md:text-[16px] font-bold text-gray-900 md:mt-1"
                    v-text="'AED ' + ((props.item.fee) - (props.item.discount))"></h1>
            </div>


        </div>
    </div>
    </Link>
</template>