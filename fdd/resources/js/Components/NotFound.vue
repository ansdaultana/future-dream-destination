<script setup>
import { Link } from '@inertiajs/vue3';
</script>
<template>
    <div class="flex justify-center bg-slate-100 rounded-xl items-center min-h-full w-full min-w-full mt-20 p-20">
      <div class="flex">
        <div class="text-orange-500 self-start text-5xl px-8 font-bold border-r pb-8 leading-10">404</div>
        <div class="px-8">
          <h1 class="text-5xl font-bold mb-2">There are No Items</h1>
          <p class="text-gray-400  mb-10">Please go to Home and checkout Promos </p>
          <div>
            <Link href="/"
              class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-orange-500 hover:bg-orange-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
              Go back home
            </Link>
          </div>
        </div>
      </div>
    </div>
  </template>
  

  
  <style scoped>
  
  </style>