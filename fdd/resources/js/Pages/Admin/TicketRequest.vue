<script setup>
import { useForm } from '@inertiajs/vue3';
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Tickets"  />

    <RequestsView :ticket="true" :visa="false" :tour="false" :url="'ticket-request-responded'"/>
</template>