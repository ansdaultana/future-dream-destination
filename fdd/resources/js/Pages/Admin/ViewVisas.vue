<script setup>
import { useForm } from '@inertiajs/vue3';
import ViewItems from './ViewItems.vue';

</script>
<template>
    <Head title="Tickets" />
    <ViewItems :ticket="false" :visa="true" :tour="false" :editUrl="'edit-visa'" :deleteUrl="'delete-visa'"/>
</template>