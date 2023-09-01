<script setup>

import { computed, ref, onMounted, } from 'vue';
import { router } from '@inertiajs/vue3';
import AppLayout from '@/Layouts/AppLayout.vue'
import { usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { defineProps } from 'vue';
const page = usePage();
const { form, ticket, visa, heading } = defineProps(['form', 'ticket', 'visa', 'heading']);

onMounted(() => {
    if (page.props.edit === true) {
        imagesurlforview.value.url = page.props.item.image_base64;
    }
})
const deletedImages = ref([]);

const imagesurlforview = ref({});
const acceptedImageTypes = ['image/jpeg', 'image/png',];
const isDragging = ref(false);
const SelectFiles = () => {
    const fileInput = document.getElementById('fileInput');
    fileInput.click();
}


const onDragover = (event) => {
    event.preventDefault()
    isDragging.value = true;
    event.dataTransfer.dropEffect = "copy";

}

const onFileInput = async (event) => {
    const file = event.target.files[0];
    if (!file) {
        return;
    }

    if (acceptedImageTypes.includes(file.type)) {
        const imageUrl = URL.createObjectURL(file);
        const title = file.name.split('.').slice(0, -1).join('.');
        form.images = file; // Replace existing images with the new one
        imagesurlforview.value = { url: imageUrl, title: title };
        ImagesError.value = ''; // Reset error message
    } else {
        ImagesError.value = 'Image is not in Jpeg or Png format.';
    }
};

const onDrop = async (event) => {
    event.preventDefault();
    isDragging.value = false;
    const file = event.dataTransfer.files[0];
    if (!file) {
        return;
    }

    if (acceptedImageTypes.includes(file.type)) {
        const imageUrl = URL.createObjectURL(file);
        const title = file.name.split('.').slice(0, -1).join('.');
        form.images = file; // Replace existing images with the new one
        imagesurlforview.value = { url: imageUrl, title: title };
        ImagesError.value = ''; // Reset error message
    } else {
        ImagesError.value = 'Image is not in Jpeg or Png format.';
    }
};

const deleteUploaded = () => {
    form.images = []; // Remove the uploaded image
    imagesurlforview.value = [];
    deletedImages.value = [];
};



const validationErrors = ref()
const ImagesError = ref()
const isEditTicketPage = router.page.url.includes('/dashboard/edit-ticket/');
const isNewTicketPage = router.page.url.includes('/dashboard/new-ticket');
const isEditVisaPage = router.page.url.includes('/dashboard/edit-visa');
const isNewVisaPage = router.page.url.includes('/dashboard/new-visa');


const AddNewProduct = (url) => {
    form.post(`/dashboard/add/${url}`)
    if (form.errors[0]) {
    }
    else {
        form.reset();
        imagesurlforview.value = {}
    }
}
const EditProduct = (url) => {

    if (form.images === null) {
    }
    form.post(`/dashboard/${url}/${page.props.item.slug}`)
}
const SubmitRequest = () => {
    if (ticket && visa === false) {
        if (isEditTicketPage) {
            EditProduct('edit-ticket')
        }
        else if (isNewTicketPage) {
            AddNewProduct('new-ticket')
        }
    }
    if (ticket === false && visa === true) {
        if (isEditVisaPage) {
            EditProduct('edit-visa')
        }
        else if (isNewVisaPage) {
            AddNewProduct('new-visa')
        }

    }

}

</script>
<template>
    <Head title="New" />
    <AppLayout>
        <div class="">
            <div class="m-2  text-orange-500 font-bold ">
                <span class="bg-slate-200 p-2 rounded-xl mt-2">
                    {{ heading }}

                </span>
            </div>

            <div class=" ml-2 mr-2   rounded-xl ">
                <div class="w-auto  flex  md:p-10 bg-slate-50 rounded-2xl shadow-lg">
                    <div class="sm:w-1/3 md:w-1/4 bg-slate-100 shadow-2xl rounded-xl  md:ml-28 ">
                        <div v-if="ImagesError" class="text-red-800 text-sm font-bold ml-2">
                            {{ ImagesError.value }}
                        </div>
                        <p v-if="form.errors.images" class=" text-red-800 text-sm font-bold p-1 mt-1">
                            {{ form.errors.images }}
                        </p>
                        <div @dragover.prevent="onDragover" @dragleave.prevent="onDragleave" @drop.prevent="onDrop"
                            class="
                            bg-white
                            shadow-md rounded-md
                            transition-transform hover:scale-103 ease-in duration-200
                            m-2 md:ml-10 mt-2 py-5 md:px-12 md:py-24 md:w-60 items-center flex justify-center border-2 border-dashed border-orange-300">
                            <div class="flex-col items-center justify-center  ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="ml-5 text-orange-300 w-12 md:w-24 h-24 md:-mt-10">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                </svg>
                                <div class="flex" v-if="isDragging === false">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="text-orange-500 m-2 w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <p class=" text-xs">Drag & Drop Your photo.or
                                        <span @click="SelectFiles" class="text-orange-500 cursor-pointer">Browse</span>
                                    </p>
                                    <input @change="onFileInput" id='fileInput' type="file" class="hidden" ref="FileInput"
                                        multiple>
                                </div>
                            </div>
                        </div>

                        <div class="text-xs text-orange-400 mt-2 ml-2 flex items-center justify-center">You can upload only
                            1 picture</div>


                        <div v-if="imagesurlforview.url" name="pics " class="mt-2 ">

                            <div
                                class="image border-dashed border-2 h-14 md:h-20 hover:shadow-lg hover:bg-slate-200  transition-transform hover:scale-103 ease-in-out  duration-300  m-1 bg-slate-100  flex justify-between">
                                <div class="flex">
                                    <div class="md:w-24 w-14  m-2  items-center flex">
                                        <img class="md:h-16
                                        "
                                            :src="imagesurlforview.url ? imagesurlforview.url : imagesurlforview.image_url">

                                    </div>

                                </div>
                                <div @click="deleteUploaded(image)"
                                    class=" flex items-center justify-center  md:m-4 text-red-500 hover:text-red-700 rounded-full hover:bg-white md:px-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="cursor-pointer w-6 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="  w-full">
                            <form @submit.prevent="SubmitRequest"
                                class="bg-blue-200 p-4 shadow-lg md:px-14 md:py-14  rounded-md"
                                enctype="multipart/form-data">
                                <div class="mb-4">
                                    <label for="product-title" class="block text-gray-700 font-semibold mb-2">
                                        Title:</label>
                                    <input type="text" id="product-title" name="product_title" v-model="form.title"
                                        class="w-full px-4 py-2 bg-blue-50 border rounded-md focus:outline-none focus:border-orange-500"
                                        required>

                                    <p v-if="form.errors.title" class="text-xs text-red-400 mt-1">
                                        {{ form.errors.title }}
                                    </p>
                                </div>

                                <div class="">
                                    <label for="product-description"
                                        class="block text-gray-700 font-semibold mb-2">Description:</label>
                                    <textarea id="product-description" name="product_description" rows="4"
                                        v-model="form.description"
                                        class="w-full px-4 py-2 border bg-blue-50 rounded-md resize-none focus:outline-none focus:border-orange-500"
                                        required></textarea>
                                    <p v-if="form.errors.description" class="text-xs text-red-400 mt-1">
                                        {{ form.errors.description }}
                                    </p>
                                </div>
                                <div class=" flex justify-between" v-if="visa === true && ticket === false">
                                    <div class="mb-4">
                                        <label for="product-fee"
                                            class="block text-gray-700 font-semibold mb-2">Price</label>
                                        <input type="number" id="product-title" name="product_title" v-model="form.fee"
                                            class="w-full px-4 py-2 bg-blue-50 border rounded-md focus:outline-none focus:border-orange-500"
                                            required>

                                        <p v-if="form.errors.title" class="text-xs text-red-400 mt-1">
                                            {{ form.errors.fee }}
                                        </p>
                                    </div>
                                    <div class="mb-4">
                                        <label for="product-discount"
                                            class="block text-gray-700 font-semibold mb-2">Discount</label>
                                        <input type="number" id="product-title" name="product_title" v-model="form.discount"
                                            class="w-full px-4 py-2 bg-blue-50 border rounded-md focus:outline-none focus:border-orange-500"
                                            required>

                                        <p v-if="form.errors.discount" class="text-xs text-red-400 mt-1">
                                            {{ form.errors.discount }}
                                        </p>
                                    </div>
                                </div>
                                <div class="">
                                    <label for="slidder" class="text-gray-700 text-sm font-semibold mb-2 mr-3">Add To the
                                        HomePage:</label>
                                    <input type="checkbox" v-model="form.homepage">
                                    <p v-if="form.errors.homepage" class="text-xs text-red-400 mt-1">
                                        {{ form.errors.homepage }}
                                    </p>
                                </div>

                                <button :disabled="form.processing" type="submit"
                                    class="mt-2 bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">Submit</button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </AppLayout>
</template>
