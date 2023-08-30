<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
const page=usePage();
const name=page.props.ziggy.location.split('/').pop();  

</script>
<template>
    <div class="w-1/6 h-screen    bg-slate-100 text-black">
        <div class="flex  md:pt-6 mt-3 md:pl-4">
            <img src="/logo.png" alt="" class="h-12">

            <h1 class="text-sm font-bold lg:pl-5 p-2 text-orange-500 hidden md:block ">Future dream destination</h1>

        </div>
        <div>
            <Link :href="route('dashboard')">

            <div id="container"
                class="flex   tansition-transform hover:scale-105-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md  hover:text-orange-500 mt-3">
                <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'dashboard' }">
                </div>
                <div class="pl-4 flex p-2">
                    <svg :class="{ 'text-orange-500': name === 'dashboard' }" fill="none" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    <div class="lg:ml-8 ml-2 hidden md:block" :class="{ 'text-orange-500': name === 'dashboard' }">
                        DashBoard
                    </div>

                </div>
            </div>
            </Link>
            <router-link :to="{ name: 'app.products' }">

                <div id="container"
                    class="flex  tansition-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md hover:fill-orange-500 hover:text-orange-500 mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'app.products' }">

                    </div>
                    <div class="pl-4 flex p-2">
                      
                        <svg  :class="{ 'text-orange-500': name === 'Travel' }" class="" xmlns="http://www.w3.org/2000/svg" height="1.25em" viewBox="0 0 640 512"><path d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z"/></svg>
                        <div class="lg:ml-8 ml-2 hidden md:block" :class="{ 'text-orange-500': name === 'app.products' }">
                            Travel
                        </div>

                    </div>
                </div>
            </router-link>
            <Link :href="route('dashboard.tickets')">

                <div id="container"
                    class="flex  tansition-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md hover:fill-orange-500 hover:text-orange-500 mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'tickets' }">

                    </div>
                    <div class="pl-10 flex p-2">
                        <div class="lg:ml-8 ml-2 block" :class="{ 'text-orange-500': name === 'tickets' }">
                            Tickets
                        </div>

                    </div>
                </div>
            </Link>
            <Link :href="route('dashboard.visas')">
            

                <div id="container"
                    class="flex  tansition-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md hover:fill-orange-500 hover:text-orange-500 mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'visas' }">

                    </div>
                    <div class="pl-10 flex p-2">
                        <div class="lg:ml-8 ml-2 block" :class="{ 'text-orange-500': name === 'visas' }">
                            Visa
                        </div>

                    </div>
                </div>
            </Link>
            <router-link :to="{ name: 'app.users' }">

                <div id="container"
                    class="flex  tansition-transform hover:scale-105 duration-200 ease-in  hover:bg-white rounded-md hover:text-orange-500 mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'app.users' }">

                    </div>
                    <div class="pl-4 flex p-2">
                        <svg :class="{ 'text-orange-500': name === 'app.users' }" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>


                        <div class="lg:ml-8 ml-2 hidden md:block" :class="{ 'text-orange-500': name === 'app.users' }">
                            Tourism
                        </div>

                    </div>
                </div>
            </router-link>
           

        </div>
    </div>
</template>
<style>
#container:hover .bg-orange {
    background-color: rgb(255, 119, 0);
}
</style>