<script setup>
import RequestsView from './RequestsView.vue';
</script>
<template>
    <Head title="Tickets"  />

    <RequestsView :ticket="true" :visa="false" :tour="false" :admin="false" :url="'ticket-request-responded'" :heading="'Ticket Requests'"/>
</template>