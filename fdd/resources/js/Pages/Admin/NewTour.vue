<script setup> 
import { useForm } from '@inertiajs/vue3';
import NewItem from './NewItem.vue';
const Tourform = useForm({
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
    <Head title="Add Tour"/>

<NewItem :form="Tourform" :ticket="false" :visa="false" :tour="true" :heading="'Add new Tour'"/>

</template>