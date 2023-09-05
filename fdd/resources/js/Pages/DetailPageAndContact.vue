<script setup>
import Navbar from '@/Components/Navbar.vue';
import Footer from '@/Components/Footer.vue';
import ContactInfo from '@/Components/ContactInfo.vue';
import { computed } from 'vue';
import { usePage } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
const page = usePage();
const item = computed(() => page.props.item)
const about = computed(() => page.props.about)
const form = useForm({
    name: '',
    email: '',
    phone: null,
    message: '',
    about: about
})

const submitForm = (slug) => {
    form.post(`/submit-user-request/${slug}`);
}
</script>


<template>
    <Navbar />

    <Head title="FDD" />


    <div class="h-full    bg-slate-200 m-4 md:m-10 rounded-xl">

        <div class="w-full flex ">
            <div class="w-2/3">
                <div class="flex">

                    <div class=" mt-4 ml-4 md:m-10">
                        <img :src="item.image_base64" alt="" class="rounded-xl md:h-96 md:w-96 w-40 h-40">
                    </div>
                    <div>
                        <div class="mt-4  md:mt-10 md:mb-5 text-2xl font-bold">
                            <span class="" v-text="item.title"></span>
                            <div class="text-lg">
                                Fee:
                                <span class="text-blue-500" v-text="item.fee"></span>
                                <span class="text-blue-500"> AED</span>
                            </div>
                            <div class="text-lg">
                                Discount:
                                <span class="text-blue-500" v-text="item.discount"></span>
                                <span class="text-blue-500"> AED</span>
                            </div>

                        </div>
                        <div class="w-40 md:w-96">
                            <span class="mt-4    text-xs md:text-[16px] " v-text="item.description">

                            </span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="w-auto m-4 md:m-10">
                <ContactInfo />

            </div>
        </div>

        <div class="flex text-sm md:text-lg items-center justify-center md:p-10 py-3">
            <div class=" bg-white h-full w-[90%] mt-4 shadow-lg  rounded-xl">
                <div class="mt-5 ml-5">
                    <span class="mt-5  text-blue-500">
                        If you have any Question, Regarding this service fill the form and we will contact you! </span>
                </div>
                <form @submit.prevent="submitForm(item.slug)" class="m-6 text-sm">
                    <div class="mt-4">
                        <label class="block text-gray-700 font-medium mb-1" for="name">Name</label>
                        <input v-model="form.name" id="name" name="name" type="text"
                            class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        <div v-if="form.errors.name" class="text-red-500 mt-1">{{ form.errors.name }}</div>

                    </div>
                    <div class=" grid-cols-1 md:grid-cols-2 grid  mt-4  ">
                        <div class="w-1/2">
                            <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
                            <input v-model="form.email" id="email" name="email" type="email" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <div v-if="form.errors.email" class="text-red-500 mt-1">{{ form.errors.email }}</div>
                        </div>
                        <div class="w-1/2 ">
                            <label class="block text-gray-700 text-xs md:text-sm  mt-1 font-medium mb-1" for="phone">Phone
                                (without country code & initial
                                0)</label>
                            <input v-model="form.phone" id="phone" name="phone" type="tel" required
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                            <div v-if="form.errors.phone" class="text-red-500 mt-1">{{ form.errors.phone }}</div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <label class="block text-gray-700 font-medium mb-1" for="booking_date">Your Message:</label>
                        <textarea v-model="form.message" rows="5" id="booking_date" type="text" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                        </textarea>
                        <div v-if="form.errors.message" class="text-red-500 mt-1">{{ form.errors.message }}
                        </div>
                    </div>
                    <div class="flex items-center justify-end">
                        <button type="submit" :disabled="form.processing"
                            class="w-32 bg-blue-500 text-white py-2 mt-6 text-lg rounded-lg hover:bg-blue-600 transition duration-300 ">Submit</button>

                    </div>
                </form>
            </div>
        </div>

    </div>

    <Footer />
</template>