<script setup>
import { useForm } from '@inertiajs/vue3';
import ViewItems from './ViewItems.vue';

</script>
<template>
    <Head title="Tours" />
    <ViewItems :ticket="false" :visa="false" :tour="true" :editUrl="'edit-tour'" :deleteUrl="'delete-tour'" />
</template>