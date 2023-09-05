
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { computed, ref, } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { router } from '@inertiajs/vue3';
import headerRequestTicket from './headerRequestTicket.vue';
import headerRequestOther from './headerRequestOthers.vue'
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import HeaderRequestAdmin from './headerRequestAdmin.vue';
const openmodal = ref(false)
const request = ref({})
const slugToBeDeleted = ref('')
const page = usePage();
const requests = computed(() => page.props.requests);

const { ticket, visa, tour, heading, url, admin } = defineProps(['ticket', 'visa', 'tour', 'heading', 'url', 'admin']);
const removeInitialZeroAndOpenWhatsApp = (originalPhoneNumber) => {
  const phoneNumber = originalPhoneNumber.replace(/^0/, '');
  getWhatsAppLink(phoneNumber);
};

const getWhatsAppLink = (phoneNumber) => {
  const message = encodeURIComponent('Hello, I am From Future Dream Destination!');
  const whatsappLink = `https://wa.me/${phoneNumber}?text=${message}`;
  window.open(whatsappLink, '_blank');
};


const done = (id) => {
  router.post(`/dashboard/${url}/${id}`);
 
}

const ToggleModal = () => {
  openmodal.value = !openmodal.value;
}
const ViewModal = (temprequest) => {
  ToggleModal()

  if (ticket === false) {
    request.value = temprequest;


  }
  slugToBeDeleted.value = temprequest.slug
}

const YesAdmin=(id)=>
{
  router.post(`/dashboard/${url}/${id}`);
}
const NotAdmin=(id)=>
{
  router.post(`/dashboard/admin-no-responded/${id}`);
}
</script>
<template>
  <AppLayout>

    <Head title="Tickets" />
    <div class="relative flex-col ">

      <div class=" flex justify-between ">
        <div class="flex">
          <div class="text-black text-lg mt-2  ml-5 hover:text-black " v-text="heading">
          </div>

        </div>


      </div>

      <div name="panel" class=" mr-1 absolute  rounded-md border-slate-300 w-full h-full   border-t ">
        <div class=" p-2 bg-slate-50 ">
          <div v-if="ticket === true">
            <headerRequestTicket />
          </div>
          <div v-if="(ticket === false &&  admin === false) && (visa === true || tour === true )">
            <headerRequestOther />

          </div>
          <div v-if="admin === true">
            <HeaderRequestAdmin />

          </div>

        </div>

        <div class="p-4 h-20" v-if="requests.length === 0">
          <div class="flex justify-center bg-slate-100 rounded-xl items-center w-full   mt-20 p-4 md:p-20">
            <div class="flex">
              <div class="text-orange-500 self-start text-5xl px-8 font-bold border-r pb-8 leading-10">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20 ">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 16.318A4.486 4.486 0 0012.016 15a4.486 4.486 0 00-3.198 1.318M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                </svg>
                
              </div>
              <div class="md:px-8 p-1">
                <h1 class="text-2xl md:text-5xl font-bold mb-2">There are No Requests</h1>
                <div class="mt-5">
                </div>
              </div>
            </div>
          </div>
        </div>
        <ul role="list"
          class="divide-y-8 divide-white md:ml-5 m-2 md:mr-5 overflow-y-scroll overflow-x-hidden h-[500px] scrollbar  text-slate-800 font-serif">
          <li v-for="request in requests" :key="request.ID"
            class="cursor-pointer hover:shadow-md items-center rounded-xl bg-slate-100 flex justify-between gap-x-6 py-5 shadow-xl shadow-blue-100 ">
            <div class=" ml-5 w-36 hidden md:flex " v-if="ticket === true">
              <div>
                <img src="/johndoe.png" alt="" class="h-12 rounded-full">
              </div>
              <div class="flex items-center ml-2">
                <span v-text="request.name"></span>
              </div>
            </div>
          
            <div class=" ml-5 w-36 flex " v-if="ticket === false">
              <div>
                <img src="/johndoe.png" alt="" class="h-12 rounded-full">
              </div>
              <div class="flex items-center ml-4">
                <span v-text="request.name"></span>
              </div>
            </div>    
          
            <div class="w-40" v-if="admin===true">
              <span v-text="request.email"></span>

          </div>
            <div class="w-36 ml-2 " v-text="request.to" v-if="ticket === true">
            </div>
            <div class="w-36 ml-2 " v-text="request.from" v-if="ticket === true">
            </div>
            <div class="w-36 ml-2 " v-text="request.selected_service" v-if="ticket === true">
            </div>
            <div class="w-40 ml-2 md:pl-8 hidden lg:block" v-if="ticket === true">
              {{ request.booking_date }}

            </div>
            <div class="w-48 h-10 text-black hover:text-black   flex md:mr-8 md:ml-2 gap-3" v-if="admin === false"
              :class="{ 'justify-end': ticket === true, 'justify-between': tour === true || visa === true }">
              <div @click.prevent="ViewModal(request)" v-if="ticket === false"
                class="shadow-lg bg-white md:px-6 md:py-2 py-2 px-1 rounded-xl transition-transform hover:scale-105 flex">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 mr-2">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>

                <span>
                  View
                </span>
              </div>
              <div @click.prevent="removeInitialZeroAndOpenWhatsApp(request.phone)"
                class="shadow-lg rounded-lg p-1 bg-[#06CA00] transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="fill-white h-8">
                  <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>

              </div>
              <div @click.prevent="done(request.id)"
                class="shadow-lg bg-blue-400 p-2 hover:bg-blue-500 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
              </div>

            </div>
            <div class="w-32 h-10 text-black hover:text-black   flex md:mr-8 md:ml-2 gap-3" v-if="admin === true"
              :class="{ 'justify-end': ticket === true, 'justify-between': tour === true || visa === true }">

              <div @click="YesAdmin(request.id)"
                class="shadow-lg bg-blue-400 p-2 hover:bg-blue-500 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
              </div>
              <div @click="NotAdmin(request.id)"
                class="shadow-lg bg-red-400 p-2 hover:bg-red-500 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

              </div>
            </div>
          </li>
        </ul>

      </div>


    </div>

    <div v-if="openmodal" id="popup-modal" tabindex="-1" class="
    transition-opacity duration-800 
    z-50  p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
      :class="{ 'opacity-100 pointer-events-auto': openmodal, 'opacity-0 pointer-events-none': !openmodal }">
      <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-slate-300 rounded-lg shadow ">
          <button @click="ToggleModal" type="button"
            class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-hide="popup-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
          <div class="p-6 text-center">
            <svg div class="mx-auto mb-4  w-12 h-12 text-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
            </svg>

            <h3 class="mb-5 text-lg font-normal text-gray-700 " v-if="ticket === true"> Are You sure you want to delete
              this?</h3>
            <div class="w-80 m-4 h-40 overflow-y-scroll">
              <span class="w-full" v-text="request.message">

              </span>
            </div>
            <div v-if="ticket === true">
              <button @click.prevent="deleteItem()" data-modal-hide="popup-modal" type="button"
                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                Yes, I'm sure
              </button>
              <button @click="ToggleModal" data-modal-hide="popup-modal" type="button"
                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                cancel</button>
            </div>
            <div v-if="visa === true || tour === true" class="flex items-center justify-center gap-x-5">
              <div @click.prevent="removeInitialZeroAndOpenWhatsApp(request.phone)"
                class=" rounded-lg px-5 py-2 bg-[#06CA00] transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="fill-white h-8">
                  <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>

              </div>
              <div @click="done(request.id)"
                class="bg-blue-400 px-5 py-3 hover:bg-blue-500 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
              </div>

            </div>

          </div>
        </div>
      </div>
    </div>


  </AppLayout>
</template>
<style>
.rotate-svg:hover .now-rotate-svg {
  transform: rotate(-90deg);
}

/* Hide the scroll bar */
.scrollbar::-webkit-scrollbar {
  width: 0.2em;
  background-color: transparent;
}




/* Optional: Add a custom color for the thumb */
.scrollbar::-webkit-scrollbar-thumb {
  background-color: silver;
}

/* Optional: Add hover styles for the thumb */
.scrollbar::-webkit-scrollbar-thumb:hover {
  background-color: slategray;
}

#popup-modal {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  backdrop-filter: blur(1px);
  display: flex;
  align-items: center;
  justify-content: center;
}</style>