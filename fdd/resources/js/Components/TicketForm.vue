<script setup>
import { useForm } from '@inertiajs/vue3';
import FormContainer from '@/Components/FormContainer.vue';
const ticketReq = useForm({
    name: '',
    email: '',
    phone: null,
    from: '',
    to: '',
    selected_service: 'Any Service',
    booking_date: null,
});

const submitForm = () => {
    try {
        ticketReq.post('/ticket-request', ticketReq, {
        onSuccess: () => showalert.value = true,
    });
    form.reset();
    } catch (error) {

    }
}
</script>

<template>
    <FormContainer title="Book your Flight">
        <form @submit.prevent="submitForm" class="mt-6 text-sm">
            <div class="mt-4">
                <label class="block text-gray-700 text-sm font-medium mb-1" for="name">Name</label>
                <input v-model="ticketReq.name" id="name" name="name" type="text"
                    class="w-full md:w-64 px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <div v-if="ticketReq.errors.name" class="text-red-500 mt-1">{{ ticketReq.errors.name }}</div>

            </div>
            <div class="md:flex mt-4 md:space-x-4">
                <div class="md:w-1/2">
                    <label class="block text-gray-700 font-medium mb-1" for="email">Email</label>
                    <input v-model="ticketReq.email" id="email" name="email" type="email" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <div v-if="ticketReq.errors.email" class="text-red-500 mt-1">{{ ticketReq.errors.email }}</div>
                </div>
                <div class="md:w-1/2">
                    <label class="block text-gray-700 font-medium text-xs mb-1" for="phone">Phone (without country code & initial
                        0)</label>
                    <input v-model="ticketReq.phone" id="phone" name="phone" type="tel" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <div v-if="ticketReq.errors.phone" class="text-red-500 mt-1">{{ ticketReq.errors.phone }}</div>
                </div>
            </div>

            <div class="flex mt-4 space-x-4">
                <div class="w-1/2">
                    <label class="block text-gray-700 font-medium mb-1" for="from">From</label>
                    <input v-model="ticketReq.from" id="from" name="from" type="text" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <div v-if="ticketReq.errors.from" class="text-red-500 mt-1">{{ ticketReq.errors.from }}</div>
                </div>
                <div class="w-1/2">
                    <label class="block text-gray-700 font-medium mb-1" for="to">To</label>
                    <input v-model="ticketReq.to" id="to" name="to" type="text" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                    <div v-if="ticketReq.errors.to" class="text-red-500 mt-1">{{ ticketReq.errors.to }}</div>
                </div>
            </div>
            <div class="mt-4">
                <label class="block text-gray-700 font-medium mb-1" for="booking_date">Booking Date</label>
                <input v-model="ticketReq.booking_date" id="booking_date" name="booking_date" type="date" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500">
                <div v-if="ticketReq.errors.booking_date" class="text-red-500 mt-1">{{ ticketReq.errors.booking_date }}
                </div>
            </div>
            <div class="mb-4">
                <label for="product-category" class="block text-gray-700 font-semibold mb-2">Category:</label>
                <select id="product-category" name="product_category" v-model="ticketReq.selected_service"
                    class="w-full px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500" >
                    <option value="">Select a category</option>
                    <option value="PIA">PIA</option>
                    <option value="Air Arabia"> Air Arabia</option>
                    <option value="Air blue">Air blue</option>
                    <option value="Emirates airline">Emirates airline</option>
                    <option value="Any Service">Any Service</option>

                </select>
            </div>
            <button type="submit" :disabled="ticketReq.processing"
                class="w-full bg-blue-500 text-white py-2 mt-6 rounded-lg hover:bg-blue-600 transition duration-300">Submit</button>
        </form>

    </FormContainer>
</template>