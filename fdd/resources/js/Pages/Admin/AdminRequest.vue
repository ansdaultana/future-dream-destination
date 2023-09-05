<script setup>
import { useForm } from '@inertiajs/vue3';
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Tickets"  />

    <RequestsView :ticket="false" :visa="false" :tour="false" :admin="true" :url="'admin-yes-responded'" :heading="'Admin Requests'"/>
</template>