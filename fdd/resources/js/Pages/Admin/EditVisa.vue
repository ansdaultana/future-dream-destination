<script setup>
import { useForm, usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';
import { onMounted } from 'vue';
import NewItem from './NewItem.vue';

const page = usePage();
const EditTicket = useForm({
    title: page.props.item.title,
    description: page.props.item.description,
    homepage: 0,
    oldimg:page.props.item.image_base64,
    fee:page.props.item.fee,
    discount:page.props.item.discount,
    images:null


});
onMounted(() => {
    if (page.props.item.homepage === 1) {
        EditTicket.homepage = true;

    }
})

</script>

<template>

    <Head title="Edit Visa"/>
<NewItem :form="EditTicket" :ticket="false" :visa="true" :tour="false" :heading="'Editing Visa'"/>

</template>