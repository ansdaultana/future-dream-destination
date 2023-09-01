
<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
import { computed, ref, } from 'vue';
import { useForm } from '@inertiajs/vue3';
import { usePage } from '@inertiajs/vue3';
import {Head} from '@inertiajs/vue3';
import CustomPagination from '@/Components/CustomPagination.vue'
const page = usePage();
const requests = computed(() => page.props.requests);
const form = useForm({
  id: null
});
const getWhatsAppLink = (phoneNumber) => {
  const message = encodeURIComponent('Hello, I am From Future Dream Destination!');
  const whatsappLink = `https://wa.me/${phoneNumber}?text=${message}`;
  window.open(whatsappLink, '_blank');
};

const info = ref({
  currentPage: 1,
  perPage: 10,
  search: ''
});

const totalItems = ref(10);
const totalPages = computed(() => Math.ceil(requests.value.length / info.value.perPage));

const done = (id) => {
  form.post(`/dashboard/ticket-request-responded/${id}`);
}

</script>
<template>
  <AppLayout>
<Head title="Tickets"/>
    <div class="relative flex-col ">

      <div class=" flex justify-between ">
        <div class="flex">
          <div class="text-black text-lg mt-2  ml-5 hover:text-black ">
            Ticket Requests
          </div>

        </div>


      </div>

      <div name="panel" class=" mr-1 absolute  rounded-md border-slate-300 w-full h-full   border-t ">
        <div class=" p-2 bg-slate-50 ">
          <div class="flex bg-blue-400 p-2 border-2  rounded-lg justify-between text-white">
            <div class=" ml-5 w-36 hidden md:block">
              Name
            </div>
        
            <div class="w-36 ">
              to
            </div>
            <div class="w-36 ">
              from
            </div>
            
            <div class="w-36 ">
              Service
            </div>
            <div class="w-40 hidden lg:block">
              Date of Travel
            </div>
            <div class="w-20">
              Actions
            </div>
          </div>
        </div>

        <ul role="list"
          class="divide-y-8 divide-white md:ml-5 m-2 md:mr-5 overflow-y-scroll overflow-x-hidden h-[500px] scrollbar  text-slate-800 font-serif">
          <li v-for="request in requests" :key="request.ID"
            class="cursor-pointer hover:shadow-md items-center rounded-xl bg-slate-100 flex justify-between gap-x-6 py-5 shadow-xl shadow-blue-100 ">

            <div class="flex ml-5 w-36 hidden md:block ">
              <div>
                <img src="/johndoe.png" alt="" class="h-12 rounded-full">
              </div>
              <span v-text="request.name"></span>
            </div>
            <div class="w-36 ml-2 " v-text="request.to">
            </div>
            <div class="w-36 ml-2 " v-text="request.from">
            </div>
            <div class="w-36 ml-2 " v-text="request.selected_service">
            </div>
            <div class="w-40 ml-2 md:pl-8 hidden lg:block">
              {{ request.booking_date }}

            </div>
            <div class="w-20 h-10 text-black hover:text-black justify-between  flex mr-8 ml-2 gap-3">
              <div @click.prevent="getWhatsAppLink(request.phone)"
                class=" rounded-lg p-1 bg-[#06CA00] transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" class="fill-white h-8">
                  <path
                    d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                </svg>

              </div>
              <div @click="done(request.id)"
                class="bg-blue-400 p-2 hover:bg-blue-500 rounded-lg transition-transform hover:scale-105 ease-in-out duration-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" class="w-6 h-6 text-white">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                </svg>
              </div>

            </div>
          </li>
        </ul>

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
}
</style>