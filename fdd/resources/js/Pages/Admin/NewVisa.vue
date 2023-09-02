<script setup> 
import { useForm } from '@inertiajs/vue3';
import NewItem from './NewItem.vue';
const Visaform = useForm({
    title: '',
    description: '',
    images: null,
    homepage: false,
    oldimg: '',
    fee:0,
    discount:0
});

</script>
<template>
    <Head title="Add Visa"/>

<NewItem :form="Visaform" :ticket="false" :visa="true" :tour="false" :heading="'Add new Visa'"/>

</template>