<script setup> 
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import { router } from '@inertiajs/vue3';
const page=usePage();
const Categories=computed(()=>page.props.category);

const gotoCategory=(name)=>{
    router.get(`/Categories/${name}`);
}
</script>
<template>
    
<div class=" ">
    <div class="flex items-center justify-center mt-16">
        <h1 class="font-bold font-sans text-3xl ">Our Services</h1>
    </div>
    <div class="flex items-center justify-center m-5">
        <h1 class="font-bold font-sans text-sm md:text-xl  ">we provide services for your future dream destination</h1>
    </div>
    <div class="flex flex-col md:flex-row items-center justify-center  gap-x-10">

        <div v-for="category in Categories  " class=" justify-center items-center space-x-3 md:space-x-10 mt-8 mb-10">
            <div @click.prevent="gotoCategory(category.name)">
            <div
                class="w-56 md:w-56 bg-gradient-to-br from-[#DFB161] from-30% via-sky-200 via-50% to-[#3D9ECF] to-70%  rounded-xl px-4 py-7 shadow-lg shadow-orange-200 mb-4 transition-transform hover:scale-105 duration-300 ease-in-out hover:cursor-pointer">
            
                <div class="flex items-center justify-center">
                    <h4 class="mt-2 text-lg text-white  " v-text="category.name"></h4>
                </div>
                <div class="flex items-center justify-center">
                    
                    <img v-if="category.name==='Ticket'"
                        :src="'/planeC.png'"
                        alt="Category Image"
                        class="h-40  py-5  rounded-md animate-bounce">
                        <img v-if="category.name==='Visa'"
                        :src="'/passport1.png'"
                        alt="Category Image"
                        class=" h-40 w-auto  object-cover rounded-md animate-bounce">
                        <img v-if="category.name==='Tourism'"
                        :src="'/tourism22.png'"
                        alt="Category Image"
                        class=" h-40 w-auto  object-cover rounded-md animate-bounce">
                </div>
            </div>
        </div>
            </div>
    </div>

</div>


</template>

<style>

@keyframes bounce {
    0%, 100% {
    transform: translateY(-8%);
    animation-timing-function: cubic-bezier(0.8, 0, 1, 1);
    }
    50% {
    transform: translateY(0);
    animation-timing-function: cubic-bezier(0, 0, 0.2, 1);
    }
    }
    </style>