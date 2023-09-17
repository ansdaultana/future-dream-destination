<script setup>
import { Link } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import LinkforSidebar from './LinkforSidebar.vue';
const page = usePage();
const name = page.props.ziggy.location.split('/').pop();
const travel = ref(false);
const tourism = ref(false)
const request = ref(false)
const admin = ref(false)

const toggleTravel = () => { travel.value = !travel.value }
const toggleTourism = () => { tourism.value = !tourism.value }
const toggleRequests = () => { request.value = !request.value }
const toggleAdmin = () => { admin.value = !admin.value }

</script>
<template>
    <div class="w-1/6 h-screen text-xs md:text-lg   bg-slate-100 text-black">
        <div class="flex  md:pt-6  md:pl-4">
            <img src="/logo.png" alt="" class="h-12">

            <h1 class="text-sm font-bold lg:pl-5 p-2 text-orange-500 hidden md:block ">Future dream destination</h1>

        </div>
        <div>

            <div>

                <div id="container" @click.prevent="toggleTravel"
                    class="flex p-2 hover:cursor-pointer bg-slate-200 bg-opacity-80 tansition-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md hover:fill-orange-500  mt-3">

                    <div class="pl-4 flex p-2 justify-between">
                        <div class="flex">
                            <svg class="animate-bounce fill-blue-400" xmlns="http://www.w3.org/2000/svg" height="1.25em"
                                viewBox="0 0 640 512">
                                <path
                                    d="M381 114.9L186.1 41.8c-16.7-6.2-35.2-5.3-51.1 2.7L89.1 67.4C78 73 77.2 88.5 87.6 95.2l146.9 94.5L136 240 77.8 214.1c-8.7-3.9-18.8-3.7-27.3 .6L18.3 230.8c-9.3 4.7-11.8 16.8-5 24.7l73.1 85.3c6.1 7.1 15 11.2 24.3 11.2H248.4c5 0 9.9-1.2 14.3-3.4L535.6 212.2c46.5-23.3 82.5-63.3 100.8-112C645.9 75 627.2 48 600.2 48H542.8c-20.2 0-40.2 4.8-58.2 14L381 114.9zM0 480c0 17.7 14.3 32 32 32H608c17.7 0 32-14.3 32-32s-14.3-32-32-32H32c-17.7 0-32 14.3-32 32z" />
                            </svg>
                            <div class="lg:ml-8 ml-2 hidden md:block">
                                Travel
                            </div>
                        </div>

                        <div class="lg:ml-10 hidden md:block">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 mt-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <transition name="fade" mode="out-in">
                <div v-if="travel" key="ticket-dropdown">
                    <LinkforSidebar :href="route('dashboard.tickets')" url="tickets" name="Tickets" />

                    <LinkforSidebar :href="route('dashboard.visas')" url="visas" name="Visa & services" />
                </div>
            </transition>

            <div>

                <div id="container" @click.prevent="toggleTourism"
                    class="flex p-2 hover:cursor-pointer hover:cursor-pointer bg-slate-200 bg-opacity-80  tansition-transform hover:scale-105 duration-200 ease-in  hover:bg-white rounded-md  mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-orange-500': name === 'app.users' }">

                    </div>
                    <div class="pl-4 flex p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-500 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.115 5.19l.319 1.913A6 6 0 008.11 10.36L9.75 12l-.387.775c-.217.433-.132.956.21 1.298l1.348 1.348c.21.21.329.497.329.795v1.089c0 .426.24.815.622 1.006l.153.076c.433.217.956.132 1.298-.21l.723-.723a8.7 8.7 0 002.288-4.042 1.087 1.087 0 00-.358-1.099l-1.33-1.108c-.251-.21-.582-.299-.905-.245l-1.17.195a1.125 1.125 0 01-.98-.314l-.295-.295a1.125 1.125 0 010-1.591l.13-.132a1.125 1.125 0 011.3-.21l.603.302a.809.809 0 001.086-1.086L14.25 7.5l1.256-.837a4.5 4.5 0 001.528-1.732l.146-.292M6.115 5.19A9 9 0 1017.18 4.64M6.115 5.19A8.965 8.965 0 0112 3c1.929 0 3.716.607 5.18 1.64" />
                        </svg>


                        <div class="lg:ml-6 ml-2 hidden md:block">
                            Tourism
                        </div>
                    </div>
                    <div class="lg:ml-6 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mt-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                </div>
            </div>

            <transition name="fade" mode="out-in">
                <div v-if="tourism" key="ticket-dropdown">
                    <LinkforSidebar :href="route('dashboard.tour')" url="tour" name="Tours" />
                </div>
            </transition>

            <div>

                <div id="container" @click.prevent="toggleRequests"
                    class="flex p-2 hover:cursor-pointer bg-slate-200 bg-opacity-80 tansition-transform hover:scale-105 duration-200 ease-in hover:bg-white rounded-md   mt-3">
                    <div class="bg-orange py-1 w-1" :class="{ 'bg-blue-500': name === 'app.products' }">

                    </div>
                    <div class="pl-4 flex p-2 ">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-blue-500 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                        </svg>
                        <div class="lg:ml-6 ml-2 hidden md:block" :class="{ 'text-orange-500': name === 'app.products' }">
                            Requests
                        </div>

                    </div>
                    <div class="flex justify-end items-center hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mt-2 ml-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                </div>


            </div>
            <transition name="fade" mode="out-in">
                <div v-if="request" key="ticket-dropdown">
                    <LinkforSidebar :href="route('dashboard.view.tickets.requests')" url="tickets-request" name="Tickets" />
                    <LinkforSidebar :href="route('dashboard.view.visa.requests')" url="visa-request" name="Visa" />
                    <LinkforSidebar :href="route('dashboard.view.tour.requests')" url="tour-request" name="Tour" />

                </div>
            </transition>
            <div>

                <div id="container" @click.prevent="toggleAdmin"
                    class="flex p-2  hover:cursor-pointer bg-slate-200 bg-opacity-80  tansition-transform hover:scale-105 duration-200 ease-in  hover:bg-white rounded-md  mt-3">
                    <div class="bg-orange py-1 w-1">

                    </div>
                    <div class="pl-4 flex p-2">
                        <svg fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            class="w-6 h-6 text-blue-500 animate-bounce">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                        </svg>


                        <div class="lg:ml-6 ml-2 hidden md:block">
                            Admin
                        </div>

                    </div>
                    <div class="lg:ml-6 hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mt-2 ml-3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </div>

                </div>
            </div>
            <transition name="fade" mode="out-in">
                <div v-if="admin" key="ticket-dropdown">
                    <LinkforSidebar :href="route('dashboard.view.admin.requests')" url="admin-request" name="Requests" />

                </div>
            </transition>
        </div>
    </div>
</template>
<style>
#container:hover .bg-orange {
    background-color: rgb(12, 150, 255);
}

.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}</style>
