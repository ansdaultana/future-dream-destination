<script setup> 
import { useForm } from '@inertiajs/vue3';
import NewItem from './NewItem.vue';
const Ticketform = useForm({
    title: '',
    description: '',
    images: null,
    homepage: false,
    oldimg: '',
});

</script>
<template>
    <Head title="Add ticket"/>

<NewItem :form="Ticketform" :ticket="true" :visa="false" :tour="false" :heading="'Add new Ticket'" />
</template>