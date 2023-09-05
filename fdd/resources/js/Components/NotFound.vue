<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="flex justify-center bg-slate-100 rounded-xl items-center min-h-full w-full min-w-full mt-20 p-4 md:p-20">
      <div class="flex">
        <div class="text-orange-500 self-start text-5xl px-8 font-bold border-r pb-8 leading-10">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 ">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
          </svg>
        </div>
        <div class="md:px-8 p-1">
          <h1 class="text-2xl md:text-5xl font-bold mb-2">There are No Items</h1>
          <p class="text-gray-400  md:mb-10">Please go to Home and checkout Promos </p>
          <div class="mt-5">
            <Link href="/"
              class="py-2  px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Go back home
            </Link>
          </div>
        </div>
      </div>
    </div>
  </template>
  

  
  <style scoped>
  
  </style>